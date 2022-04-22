<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Category;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("modelos.index", [
            'modelos' => Modelo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modelos.create',[
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelo = Modelo::create([
            'manufacturer' => $request->manufacturer,
            'model' => $request->model,
            'photo_id' => $request->photo_id,
            'category_id' => $request->category_id,
            'price' => $request->price,

        ]);
        return redirect()->route('modelos.show', $modelo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        $modelo = Modelo::find($modelo->id);
        if ($modelo) {
            return view("modelos.show", [
                "modelo" => $modelo
            ]);
        } else {
            return redirect() ->route("modelos.index")
            ->with('error' , 'ERROR indexing category: category doesnt exist');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        return view('modelos.edit', [
            "modelo" => $modelo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        $modelo = Modelo::find($modelo->id);
        $modelo->update(['manufacturer'=>$request->manufacturer]);
        $modelo->update(['model'=>$request->model]);
        $modelo->update(['photo_id'=>$request->photo_id]);
        $modelo->update(['category_id'=>$request->category_id]);
        $modelo->update(['price'=>$request->price]);


        return redirect()->route('modelos.index',$modelo)
            ->with('succes', 'modelo succesfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return redirect()->route('modelos.index',$modelo)
            ->with('succes', 'modelo succesfully deleted');
    }
}
