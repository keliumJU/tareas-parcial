<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tarea;

class tareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_tar = tarea::all();
        return view("Tareas.index", compact('list_tar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tar = new tarea();
        $tar->name = $request->input('name');
        $tar->confirmed = 0;
        $tar->save();
        return redirect('/tareas');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = tarea::find($id);
        return view('Tareas.editar_tareas', ['tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tar=tarea::where('id', $id)->first();
 
        // Si existe
           // Seteamos un nuevo titulo
           $tar->name = $request->input('name');
           $tar->confirmed = $request->input('check');
        
           // Guardamos en base de datos
           $tar->save();
        return redirect('/tareas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tarea::destroy($id);
        return redirect('/tareas');
    }
}
