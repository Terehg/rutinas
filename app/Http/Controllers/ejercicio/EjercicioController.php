<?php

namespace App\Http\Controllers\ejercicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //PREFERIBLEMENTE QUE LA FUNCIÓN TENGA EL MISMO NOMBRE DE LA VISTA
    public function index(Request $request)
    {
        if($request->ajax()){
            $ejercicios = DB::select('CALL GetEjercicio()');
            return DataTables::of($ejercicios)
            ->addColumn('action', function($ejercicios){
                $acciones ='<a href="javascript:void(0)" onclick="editarEjercicio('.$ejercicios->id.')" class="btn btn-info btn-sm">Editar</a>';
                $acciones .='&nbsp;&nbsp;<button type="button" name="delete" id="'.$ejercicios->id.'" class="delete btn btn-danger btn-sm">Eliminar</button>';
                $acciones .='&nbsp;&nbsp;<button type="button" name="add" id ="" class="btn btn-success btn-sm">Agregar a rutina</button>';
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        //dd($ejercicios);

        return view('index');
        //se debe crear ruta de esto en web php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::select('CALL CrearEjercicio(?,?)',
                                [$request->nombre,$request->recomendacion]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ejercicio = DB::select('CALL EditarEjercicio(?)',[$id]);
        return response()->json($ejercicio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::select('CALL ActualizarEjercicio(?,?,?)',
                                [$request->id,$request->nombre,$request->recomendacion]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       DB::select('CALL EliminarEjercicio(?)', [$id]);
       return back();
    }
}
