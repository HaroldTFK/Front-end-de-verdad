<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = $this->traer('modules');
        return view('Modules.Index', compact('modules'));
    }

    public function create()
    {
        $teachers = $this->traer('teachers');
        return view('Modules.Create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $respuesta = $this->api()->post('modules', $request->except('_token'));

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('modules.index')->with('success', 'Módulo creado.');
    }

    public function show(int $id)
    {
        $module = $this->traer('modules/' . $id);
        abort_if(empty($module), 404);

        return view('Modules.Show', compact('module'));
    }

    public function edit(int $id)
    {
        $module = $this->traer('modules/' . $id);
        abort_if(empty($module), 404);

        $teachers = $this->traer('teachers');
        return view('Modules.Edit', compact('module', 'teachers'));
    }

    public function update(Request $request, int $id)
    {
        $respuesta = $this->api()->put('modules/' . $id, $request->except('_token', '_method'));

        if ($respuesta->failed()) {
            return $this->volverConError($respuesta);
        }

        return redirect()->route('modules.index')->with('success', 'Módulo actualizado.');
    }

    public function destroy(int $id)
    {
        $this->api()->delete('modules/' . $id);
        return redirect()->route('modules.index')->with('success', 'Módulo eliminado.');
    }
}
