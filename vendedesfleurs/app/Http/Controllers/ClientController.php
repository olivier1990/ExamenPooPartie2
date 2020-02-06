<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('index',['variables'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'bail|required|between:3,20|alpha',
            'prenom' => 'bail|required|max:75',
            'rue' => 'bail|required|max:75',
            
            'numero' => 'bail|required|numeric',
            'boite' => 'bail|required|max:5',
            'codepostal' => 'bail|required|numeric',
            'ville' => 'bail|required|max:75',
            'telephone' => 'bail|required|max:20',
            'email' => 'bail|required|max:20'
        ]);

        $client = new Client;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->rue = $request->rue;
        $client->numero = $request->numero;
        $client->boite = $request->boite;
        $client->codepostal = $request->codepostal;
        $client->ville = $request->ville;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->save();
        return $this->show($client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
