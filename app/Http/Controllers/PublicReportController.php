<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class PublicReportController extends Controller
{
    public function view(Report $report)
    {
        return view('reports.view', compact('report'));
    }

    // Muestra el formulario para crear un reporte
    public function create()
    {
        return view('reports.create');
    }

    // Almacena el reporte en la base de datos
    public function store(Request $request)
    {
        try {
            // Validación de datos
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'priority' => 'required|in:low,medium,high',
                'type' => 'required|string',
                'photo' => 'nullable|image|max:2048',
            ]);

            // Subir la foto (si existe)
            if ($request->hasFile('photo')) {
                $validated['photo_path'] = $request->file('photo')->store('photos', 'public');
            }

            // Crear el reporte
            Report::create($validated);

            // Devolver respuesta JSON
            return response()->json(['message' => '¡Reporte enviado con éxito!'], 200);
        } catch (\Exception $e) {
            // Devolver respuesta JSON con el error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
