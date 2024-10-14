<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        $users = User::all();

        $userID = env('API_IDENTIFIER');
        $key = env('API_KEY');
        $urlresa = 'https://acuityscheduling.com/api/v1/appointments.json';
        $urlpack = 'https://acuityscheduling.com/api/v1/certificates';
        $urlorders = 'https://acuityscheduling.com/api/v1/orders';

        $responseResa = Http::withBasicAuth($userID, $key)->get($urlresa);
        $responsePack = Http::withBasicAuth($userID, $key)->get($urlpack);
        $responseOrders = Http::withBasicAuth($userID, $key)->get($urlorders);

        // Reservations
        if ($responseResa->successful()) {
            $resultResa = $responseResa->body();
        } else {
            // Handle the error accordingly
            $resultResa = json_encode([]);
        }

        // Packs
        if ($responsePack->successful()) {
            $resultPack = $responsePack->body();
        } else {
            // Handle the error accordingly
            $resultPack = json_encode([]);
        }

        // Orders
        if ($responseOrders->successful()) {
            $resultOrders = $responseOrders->body();
        } else {
            // Handle the error accordingly
            $resultOrders = json_encode([]);
        }

        $cours = json_decode($resultResa, true);
        $packs = json_decode($resultPack, true);
        $orders = json_decode($resultOrders, true);

        return view('dashboard', compact('users', 'cours', 'packs' , 'orders'));
    }

    public function maintenance(Request $request){

        if($request->keyAccess == env('MAINTENANCE_KEY')) {

            if ($request->down == 1) {
                Artisan::call('down', ['--secret' => env('MAINTENANCE_KEY')]);
                return response()->json(['message' => 'Le site est à présent en maintenance'], 200);
            } else {
                Artisan::call('up');
                return response()->json(['message' => 'Le site est de nouveau en ligne'], 200);
            }
        }
        return response()->json(['message' => 'Clé d\'accès invalide'], 422);
    }
}
