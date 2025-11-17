<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class XmlController extends Controller
{
    public function gerarXML(){
        $dados = Pokemon::all();
        
        return response()->view('data-xml', ['registro' => $dados])->header('Content-Type', 'application/xml');
    }
}