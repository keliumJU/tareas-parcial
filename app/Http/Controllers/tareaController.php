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
        $list_tar = tarea::where("confirmed","=",0)->get();
        $list_eco = tarea::where("confirmed","=",1)->get();
        return view("Tareas.index", compact('list_tar', 'list_eco'));
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
        $validateData = $request->validate([
            'name' => 'required|max: 100'
        ]);

        $tar = new tarea();
        $tar->name = $request->input('name');
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
        /*
        corregir aqui
        $validateData = $request->validate([
            'name' => 'required|max: 100'
        ]);*/

        $tar=tarea::where('id', $id)->first();

        if($request->input('name') != null){                   
            $tar->name = $request->input('name');
        }else{
            $tar->confirmed = 1;
        }

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
