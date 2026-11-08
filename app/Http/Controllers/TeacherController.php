<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = $this->traer('teachers');
        return view('Profesores.Index', compact('teachers'));
    }

    public function create()
    {
        $modules = $this->traer('modules');
        return view('Profesores.Create', compact('modules'));
    }

    public function store(Request $request)
    {
        $datos = $request->except('_token');
        $datos['module_id'] = $request->input('module_id', []);

        $respuesta = $this->api()->post('teachers', $datos);

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('teachers.index')->with('success', 'Profesor creado.');
    }

    public function show(int $id)
    {
        $teacher = $this->traer('teachers/' . $id);
        abort_if(empty($teacher), 404);

        return view('Profesores.Show', compact('teacher'));
    }

    public function edit(int $id)
    {
        $teacher = $this->traer('teachers/' . $id);
        abort_if(empty($teacher), 404);

        $modules = $this->traer('modules');
        return view('Profesores.Edit', compact('teacher', 'modules'));
    }

    public function update(Request $request, int $id)
    {
        $datos = $request->except('_token', '_method');
        // Si no se marca ningún módulo, se envía vacío para quitarlos todos
        $datos['module_id'] = $request->input('module_id', []);

        $respuesta = $this->api()->put('teachers/' . $id, $datos);

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('teachers.index')->with('success', 'Profesor actualizado.');
    }

    public function destroy(int $id)
    {
        $this->api()->delete('teachers/' . $id);
        return redirect()->route('teachers.index')->with('success', 'Profesor eliminado.');
    }
}
