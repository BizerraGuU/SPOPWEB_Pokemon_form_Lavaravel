<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class CadastrarPokemonController extends Controller
{
    public function salvar_pokemon(Request $request){
        $request->validate([
            "nome" => "required|min:3|max:12",
            "altura" => "required|decimal:2",
            "fase_evolutiva" => "required|integer|min:1",
            "primeira_geracao" => "required|boolean",
            "geracao" => "required|in:Kanto,Johto,Hoenn,Sinnoh,Unova,Kalos,Alola,Galar,Paldea",
        ],
        [
            'nome.required' => "O campo 'Nome' deve ser preenchido",
            'nome.min' => "O campo 'Nome' deve ter no mínimo 3 caracteres",
            'nome.max' => "O campo 'Nome' deve ter no máximo 12 caracteres",

            'altura.required' => "O campo 'Altura' deve ser preenchido",
            'altura.numeric' => "O campo 'Altura' deve ser um número",
            'altura.between' => "O campo 'Altura' deve estar entre 0.01 e 99.99",

            'fase_evolutiva.required' => "O campo 'Fase Evolutiva' deve ser preenchido",
            'fase_evolutiva.integer' => "O campo 'Fase Evolutiva' deve ser um número inteiro",
            'fase_evolutiva.min' => "O campo 'Fase Evolutiva' deve ser no mínimo 1",

            'primeira_geracao.required' => "O campo 'Primeira Geração' deve ser selecionado",
            'primeira_geracao.boolean' => "O valor do campo 'Primeira Geração' deve ser verdadeiro ou falso",

            'geracao.required' => "O campo 'Geração' deve ser selecionado",
            'geracao.in' => "O campo 'Geração' deve ser uma das opções válidas",
        ]);

        // Converter para os nomes do banco de dados
        $pokemonData = [
            'Nome' => $request->nome,
            'Altura' => $request->altura,
            'Fase Evolutíva' => $request->fase_evolutiva,
            'É da primeira geração?' => $request->primeira_geracao,
            'Geração' => $request->geracao,
        ];

        $pokemon = new Pokemon();
        $pokemon->fill($pokemonData);
        $pokemon->save();

        return view('pokemonsalvo');
    }
}