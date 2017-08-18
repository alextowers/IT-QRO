<?php

namespace App\Http\Controllers;

use App\Position;
use App\Http\Requests\StorePosition;
use App\Http\Requests\UpdatePosition;
use Illuminate\Http\Request;

class PositionController extends Controller
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
        $positions = Position::paginate(10);

        return view('positions.index')
            ->with('positions', $positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePosition $request)
    {
        $position = new Position;

        $position->name = $request->input('name');

        $position->save();

        return redirect()
            ->route('positions.index')
            ->with('success', 'Puesto guardado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $position = Position::find($position->id);

        return view('positions.show')
            ->with('position', $position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $position = Position::find($position->id);

        return view('positions.edit')
            ->with('position', $position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePosition $request, Position $position)
    {
        $position = Position::find($position->id);

        $position->name = $request->input('name');

        $position->save();

        return redirect()
            ->route('positions.index')
            ->with('success', 'Puesto actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position = Position::find($position->id);
        $position->delete();

        return redirect()
            ->route('positions.index')
            ->with('success', 'Puesto eliminado satisfactoriamente');
    }
}
