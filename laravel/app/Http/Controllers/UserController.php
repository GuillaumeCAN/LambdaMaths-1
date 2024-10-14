<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    private function setConnection(string $uri, string $method, array $clientData){
        $userID = env('API_IDENTIFIER');
        $key = env('API_KEY');
        $url = 'https://acuityscheduling.com/api/v1/'.$uri;

        $responseAPI = Http::withBasicAuth($userID, $key)->$method($url, $clientData);

        if ($responseAPI->successful()) {
            $resultAPI = $responseAPI->body();
        } else {
            // Handle the error accordingly
            $resultAPI = json_encode([]);
        }

        $acuity = json_decode($resultAPI, true);
        return $acuity;
    }


    public function list(){
        $users = User::all();
        $clients = $this->setConnection('clients', 'get', []);
        return view('components.ui.user-table', compact('users', 'clients'));
    }



    public function create(Request $request){

        $user = new User();

        // Validation personnalisée
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            // Renvoie une réponse JSON avec les erreurs
            return response()->json(['errors' => $validator->errors()], 422);
        }

            // Création du client sur Acuity
            $clientData = [
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
            ];

            // Ecriture sur Acuity
            $this->setConnection('clients', 'post', $clientData);

            // Ecriture en base
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role_id = $request->role_id;
            $user->password = Hash::make($request->password);

            if(isset($request->subscribed)){
                $user->subscribed = $request->subscribed;
            }else{
                $user->subscribed = 0;
            }

            // Retour avec succès
            $user->save();
            return response()->json(['message' => 'Nouvel utilisateur enregistré avec succès !'], 200);

    }



    public function userById($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }



    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        // Validation personnalisée
        $rules = [
                    'firstname' => 'required|string|max:32',
                    'lastname' => 'required|string|max:32',
                    'phone' => 'required',
                    'role_id' => 'required'
                ];

        if($request->email != $user->email){
            $rules['email'] = 'required|unique:users|max:255|string';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Renvoie une réponse JSON avec les erreurs
            return response()->json(['errors' => $validator->errors()], 422);
        }


        // Update du client sur Acuity
        $url = 'clients?firstName='.$user->firstname.'&lastName='.$user->lastname;
        $client = $this->setConnection(
            $url,
            'put',
        [
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        // Ecriture en base
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        if(isset($request->subscribed)){
            $user->subscribed = $request->subscribed;
        }else{
            $user->subscribed = 0;
        }

        // Sauvegarde et retour
        $user->save();
        return response()->json(['message' => 'Modifications enregistrées avec succès !'], 200);
    }



    public function delete($id){
        $user = User::findOrFail($id);

        // Suppression du client sur Acuity
        $url = 'clients?firstName='.$user->firstname.'&lastName='.$user->lastname;
        $client = $this->setConnection($url, 'delete', []);

        $user->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès !'], 200);
    }

    public function register(Request $request) {
        if(Auth::check()) {
            return redirect()->route('home');
        }

        // Validation personnalisée
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            // Renvoie une réponse JSON avec les erreurs
            return back()->withErrors($validator);
        }

        // Création du client sur Acuity
        $clientData = [
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        $clients = $this->setConnection('clients', 'post', $clientData);

        // Ecriture en base
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role_id = 4;
            $user->password = Hash::make($request->password);

            $user->save();
            return redirect('/se-connecter')->with('statut', 'Votre compte à bien été créer !');
    }

    public function updateByUser(Request $request, $id){
        $user = User::findOrFail($id);
        // Validation personnalisée
        $rules = [
                    'firstname' => 'required|string|max:32',
                    'lastname' => 'required|string|max:32',
                    'phone' => 'required',
                    'password' => 'required',
                ];

        if($request->email != $user->email){
            $rules['email'] = 'required|unique:users|max:255|string';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Renvoie une réponse JSON avec les erreurs
            return back()->withErrors($validator);
        }

        if(Hash::check($request->password, $user->password)){
            // Update du client sur Acuity
            $url = 'clients?firstName=' . $user->firstname . '&lastName=' . $user->lastname;
            $client = $this->setConnection(
                $url,
                'put',
                [
                    'firstName' => $request->firstname,
                    'lastName' => $request->lastname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

            // Ecriture en base
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;

            // Sauvegarde et retour
            $user->save();
            return redirect('/espace-membre')->with('statut', 'Modifications enregistrées avec succès !');
        }else{
            return back()->with('error', 'Le mot de passe est incorrect !');
        }
    }
}

