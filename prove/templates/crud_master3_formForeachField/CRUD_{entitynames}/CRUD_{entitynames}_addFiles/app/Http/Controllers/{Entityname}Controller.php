<?php

namespace App\Http\Controllers;

use App\Models\Objs\{Entityname};
use Illuminate\Http\Request;

class {Entityname}Controller extends Controller
{
   
	private $validation_rules = [
            //'ente_nome' => 'required',
            //'ente_codice_comune' => 'required',
        ];
	
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_objs = {Entityname}::all();
        return view('tmpl_crud_objs.{entityname}.index',compact('list_objs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model_obj = app({Entityname}::class);
        return view('tmpl_crud_objs.{entityname}.create',compact('model_obj'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->validation_rules);

        {Entityname}::create($request->all());

        return redirect()->route('{entityname}.index')
            ->with('message','{Entityname} created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show({Entityname} ${entityname})
    {
        $model_obj = ${entityname};
        return view('tmpl_crud_objs.{entityname}.show',compact('model_obj'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit({Entityname} ${entityname})
    {
        $model_obj = ${entityname};
        return view('tmpl_crud_objs.{entityname}.edit',compact('model_obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, {Entityname} ${entityname})
    {
        $request->validate($this->validation_rules);
        ${entityname}->update($request->all());

        return redirect()->route('{entityname}.index')
            ->with('message','{Entityname} updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy({Entityname} ${entityname})
    {

        ${entityname}->delete();

        return redirect()->route('{entityname}.index')
            ->with('message','{Entityname} deleted successfully');
    }
}

