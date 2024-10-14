<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function index()
    {
        function getFolderTree($dir)
        {
            $tree = [];
            $subfolders = Storage::disk('public')->directories($dir);
            $files = Storage::disk('public')->files($dir);

            foreach ($subfolders as $subfolder) {
                $tree[basename($subfolder)] = getFolderTree($subfolder);
            }

            foreach ($files as $file) {
                $tree['files'][] = basename($file);
            }

            return $tree;
        }

        $folderTree = getFolderTree('/');
        /* dd($folderTree); */
        return view('file-viewer', compact('folderTree'));
    }

    public function uploadFile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:2048',
            'directory' => 'nullable|string',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $directory = $request->input('directory', '/');
        $file = $request->file('file');
        $file->storeAs('public/' . $directory, $file->getClientOriginalName());

        return response()->json(['message' => 'Fichier upload avec succès !'], 200);
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string',
            'parent_folder' => 'nullable|string',
        ]);

        $folderName = $request->input('folder_name');
        $parentFolder = $request->input('parent_folder', '');

        Storage::disk('public')->makeDirectory($parentFolder . '/' . $folderName);


        return response()->json(['message' => 'Dossier créé avec succès !'], 200);
    }

    public function deleteFile(Request $request)
    {
        $request->validate([
            'file_path' => 'required|string',
        ]);

        $filePath = $request->input('file_path');

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return redirect()->back()->with('success', 'Fichier supprimé avec succès !');
        }

        return redirect()->back()->with('error', 'Le fichier n\'existe pas.');
    }

    public function deleteFolder(Request $request)
    {
        $request->validate([
            'folder_path' => 'required|string',
        ]);

        $folderPath = $request->input('folder_path');

        if (Storage::disk('public')->exists($folderPath)) {
            if (Storage::disk('public')->allFiles($folderPath) || Storage::disk('public')->allDirectories($folderPath)) {
                return redirect()->back()->with('error', 'Le dossier n\'est pas vide.');
            }

            Storage::disk('public')->deleteDirectory($folderPath);
            return redirect()->back()->with('success', 'Dossier supprimé avec succès !');
        }

        return redirect()->back()->with('error', 'Le dossier n\'existe pas.');
    }
}
