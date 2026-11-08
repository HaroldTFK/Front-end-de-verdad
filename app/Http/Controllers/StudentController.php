<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = $this->traer('students');
        return view('Estudiantes.Index', compact('students'));
    }

    public function create()
    {
        $modules = $this->traer('modules');
        return view('Estudiantes.Create', compact('modules'));
    }

    public function store(Request $request)
    {
        $peticion = $this->api()->asMultipart();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $peticion->attach('foto', file_get_contents($foto->getRealPath()), $foto->getClientOriginalName());
        }

        $respuesta = $peticion->post('students', $request->except('foto', '_token'));

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('students.index')->with('success', 'Estudiante creado.');
    }

    public function show(int $id)
    {
        $student = $this->traer('students/' . $id);
        abort_if(empty($student), 404);

        return view('Estudiantes.Show', compact('student'));
    }

    public function edit(int $id)
    {
        $student = $this->traer('students/' . $id);
        abort_if(empty($student), 404);

        $modules = $this->traer('modules');
        return view('Estudiantes.Edit', compact('student', 'modules'));
    }

    public function update(Request $request, int $id)
    {
        $peticion = $this->api()->asMultipart();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $peticion->attach('foto', file_get_contents($foto->getRealPath()), $foto->getClientOriginalName());
        }

        // PHP no lee archivos enviados por PUT, por eso se envía POST con _method=PUT
        $datos = $request->except('foto', '_token', '_method');
        $datos['_method'] = 'PUT';

        $respuesta = $peticion->post('students/' . $id, $datos);

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado.');
    }

    public function destroy(int $id)
    {
        $this->api()->delete('students/' . $id);
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado.');
    }
}
