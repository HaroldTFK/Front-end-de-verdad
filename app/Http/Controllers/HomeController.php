<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        $students = $this->traer('students');
        $teachers = $this->traer('teachers');
        $modules  = $this->traer('modules');

        return view('Home.Inicio', compact('students', 'teachers', 'modules'));
    }
}
