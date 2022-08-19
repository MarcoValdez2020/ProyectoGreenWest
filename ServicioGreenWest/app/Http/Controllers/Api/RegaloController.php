<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Regalo;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class RegaloController extends Controller
{
    public function verRegalos(){
        $datos = Regalo::all();
        return response()->json($datos);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregarRegalo(Request $request){
        $request -> validate([
            'nombre'=> 'required',
            'imagen'=> 'required',
            'costePuntos'=> 'required',
            'cantidad'=> 'required'
        ]);
        $datosRegalo = new Regalo();

        if($request->hasFile('imagen')){
            $nombreArchivoOriginal = $request->file('imagen')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp."_".$nombreArchivoOriginal;
            $carpetaDestino ='./upload/';
            $request->file('imagen')->move($carpetaDestino,$nuevoNombre);
        }
        $datosRegalo->nombre=$request->nombre;   
        $datosRegalo->imagen=ltrim($carpetaDestino,'.').$nuevoNombre;
        $datosRegalo->costePuntos=$request->costePuntos;
        $datosRegalo->cantidad=$request->cantidad;
        $datosRegalo->save();
        return response()->json([
            "status"=>1,
            "msg"=>"Registro de regalo existoso",
        ]);
    }

    public function verRegalo($id_regalo){
        $datosRegalo = new Regalo;
        $datosE= $datosRegalo->find($id_regalo);
        return response()->json($datosE);
    }

    public function eliminarRegalo($id){

        $regalo = Regalo::find($id);
        
        if($regalo){
            $rutaArchivo=base_path('public').$regalo->imagen;
            if(fileExists($rutaArchivo)){
                unlink($rutaArchivo);
            }
            $regalo->delete();
        }
        return response()->json([
            "status"=>1,
            "msg"=>"Regalo eliminado correctamente!",
        ]);
    }

    public function actualizarRegalo(Request $request,$id){
        $datosRegalo=Regalo::find($id);

        if($request->hasFile('imagen')){
            if($datosRegalo){
                $rutaArchivo=base_path('public').$datosRegalo->imagen;
                if(fileExists($rutaArchivo)){
                    unlink($rutaArchivo);
                }
                $datosRegalo->delete();
            }

            $nombreArchivoOriginal = $request->file('imagen')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp."_".$nombreArchivoOriginal;
            $carpetaDestino ='./upload/';
            $request->file('imagen')->move($carpetaDestino,$nuevoNombre);
            $datosRegalo->imagen=ltrim($carpetaDestino,'.').$nuevoNombre;
            $datosRegalo->nombre=isset($request->nombre) ? $request->nombre: $datosRegalo->nombre;   
            $datosRegalo->costePuntos=isset($request->costePuntos) ? $request->costePuntos: $datosRegalo->costePuntos;
            $datosRegalo->cantidad=isset($request->cantidad) ? $request->cantidad: $datosRegalo->cantidad;
            $datosRegalo->save();
            return response()->json([
                "status"=>1,
                "msg"=>"Regalo actualizado correctamente1",
            ]);
        }else{
            $datosRegalo->nombre=isset($request->nombre) ? $request->nombre: $datosRegalo->nombre;   
            $datosRegalo->costePuntos=isset($request->costePuntos) ? $request->costePuntos: $datosRegalo->costePuntos;
            $datosRegalo->cantidad=isset($request->cantidad) ? $request->cantidad: $datosRegalo->cantidad;
            $datosRegalo->save();
            return response()->json([
                "status"=>1,
                "msg"=>"Regalo actualizado correctamente2",
            ]);
        }
        
    }
}
