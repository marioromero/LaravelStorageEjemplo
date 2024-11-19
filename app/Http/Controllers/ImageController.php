<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'user_id' => 'required|integer',
            'image' => 'required|file|mimes:jpeg,png|max:20480', // Máximo 20MB
        ]);

        // Obtener ID del usuario
        $user_id = $request->input('user_id');
        $extension = $request->file('image')->getClientOriginalExtension();

        // Buscar el próximo número de archivo disponible
        $counter = 1;
        do {
            $filename = 'img' . $user_id . 'n' . $counter . '.' . $extension;
            $filePath = 'uploads/' . $filename;
            $counter++;
        } while (Storage::disk('public')->exists($filePath));

        // Guardar la imagen en el disco público
        $path = $request->file('image')->storeAs('uploads', $filename, 'public');

        return back()->with([
            'success' => 'Imagen subida correctamente.',
            'filename' => $filename,
        ]);
    }
}

