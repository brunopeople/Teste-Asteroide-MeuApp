<?php
namespace App\Http\Controllers;

use App\Estudante;
use Illuminate\Http\Request;

class EstudanteController
{
    public function index()
    {
        return Estudante::all();
    }
}