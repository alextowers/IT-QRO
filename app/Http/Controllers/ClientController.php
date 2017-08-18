<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreClient;
use App\Http\Requests\UpdateClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);

        return view('clients.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = \App\Branch::all();

        return view('clients.create')
            ->with('branches', $branches);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $client = new Client;

        $client->name = $request->input('name');
        $client->rfc = $request->input('rfc');
        $client->contact = $request->input('contact');

        $branch = \App\Branch::find($request->input('branch'));
        $client->branch()
            ->associate($branch);

        $client->save();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente guardado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $client = Client::find($client->id);

        return view('clients.show')
            ->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $branches = \App\Branch::all();
        $client = Client::find($client->id);

        return view('clients.edit')
            ->with('branches', $branches)
            ->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClient $request, Client $client)
    {
        $client = Client::find($client->id);

        if ($request->has('name')) {
            $client->name = $request->input('name');
        }
        if ($request->has('rfc')) {
            $client->rfc = $request->input('rfc');
        }
        if ($request->has('contact')) {
            $client->contact = $request->input('contact');
        }
        if ($request->has('branch')) {
            if ($request->input('branch') != 0) {
                $branch = App\Branch::find($request->input('branch'));
                $client->branch()
                    ->associate($branch);
            }
        }
        
        $client->save();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client = Client::find($client->id);
        $client->delete();

        return redirect()
            ->with('success', 'Cliente eliminado satisfactoriamente');
    }
}
