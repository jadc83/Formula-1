<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePilotoRequest;
use App\Http\Requests\UpdatePilotoRequest;
use App\Models\Licencia;
use App\Models\Piloto;
use App\Models\Probador;
use App\Models\Reserva;
use App\Models\Titular;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilotos = Piloto::with('trofeos')->get();

        return view('pilotos.index', ['pilotos' => $pilotos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pilotos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePilotoRequest $request)
    {
        $piloto = new Piloto();
        $piloto->nombre = $request->nombre;
        $piloto->apellido = $request->apellido;
        $piloto->nacionalidad = $request->nacionalidad;
        $piloto->nacimiento = $request->nacimiento;

        if ($request->status === 'titular'){

            $licencia = new Licencia();
            $licencia->codigo = "S1";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $titular = new Titular();
            $titular->save();

            $piloto->asignable()->associate($titular);

        } elseif ($request->status === 'reserva') {

            $licencia = new Licencia();
            $licencia->codigo = "S2";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $reserva = new Reserva();
            $reserva->save();

            $piloto->asignable()->associate($reserva);

        } else {

            $licencia = new Licencia();
            $licencia->codigo = "S3";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $probador = new Probador();
            $probador->area = $request->area;

            $probador->save();

            $piloto->asignable()->associate($probador);
        }

            $piloto->save();

        return redirect()->route('pilotos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Piloto $piloto)
    {
        return view('pilotos.show', ['piloto' => $piloto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piloto $piloto)
    {
        return view('pilotos.edit', ['piloto' => $piloto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePilotoRequest $request, Piloto $piloto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piloto $piloto)
    {
        $piloto->delete();

        return redirect()->route('pilotos.index');
    }

    public function cambiar(Request $request, Piloto $piloto)
    {
        if ($request->status === 'titular'){

            $licencia = new Licencia();
            $licencia->codigo = "S1";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $titular = new Titular();
            $titular->save();
            $piloto->asignable()->dissociate();
            $piloto->asignable()->associate($titular);

        } elseif ($request->status === 'reserva') {

            $licencia = new Licencia();
            $licencia->codigo = "S2";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $reserva = new Reserva();
            $reserva->save();

            $piloto->asignable()->dissociate();
            $piloto->asignable()->associate($reserva);

        } else {

            $licencia = new Licencia();
            $licencia->codigo = "S3";
            $licencia->tipo = $request->status;
            $licencia->save();
            $piloto->licencia_id = $licencia->id;

            $probador = new Probador();
            $probador->area = 'Default';

            $probador->save();
            $piloto->asignable()->dissociate();
            $piloto->asignable()->associate($probador);
        }

            $piloto->save();

        return redirect()->route('pilotos.index');
    }
}
