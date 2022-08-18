<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\centrocanje;
use App\Models\Cuenta;
use App\Models\Regalo;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CentroCanjeController extends Controller
{
    public function pruebaFecha(){
        $fecha = Carbon::now()->format('d-m-Y');
        return $fecha;
    }

    public function consultarCanjes($id_cuenta){
       $canjes = centrocanje::where("id_usuario",$id_cuenta)->get();
       return $canjes;

    }

    public function consultarPuntos($id_cuenta){
        $cuenta = Cuenta ::find($id_cuenta);
        $puntos= $cuenta->puntos;
        return $puntos;
    }

    public function consultarPrecio($id_regalo){
        $regalo = Regalo ::find($id_regalo);
        $costePuntos= $regalo->costePuntos;
        return $costePuntos;
        //$this->consultarPuntos();
    }

    public function consultarCantidad($id_regalo){
        $regalo = Regalo ::find($id_regalo);
        $cantidad= $regalo->cantidad;
        return $cantidad;
        //$this->consultarPuntos();
    }

    public function descontarCantidad($id_regalo){
        $regalo = Regalo ::find($id_regalo);
        $cantidad= $regalo->cantidad;
        $nuevaCantidad = $cantidad-1;
        $regalo->cantidad=$nuevaCantidad;
        $regalo->save();
        return $regalo->cantidad;
    }

    public function descontarPuntos($id_cuenta,$puntosADescontar){
        $cuenta = Cuenta ::find($id_cuenta);
        $puntos= $cuenta->puntos;
        $nuevosPuntos = $puntos - $puntosADescontar;
        $cuenta->puntos=$nuevosPuntos;
        $cuenta->save();
        return $cuenta->puntos;
    }

    public function Canjear($id_cuenta, $id_regalo){
        $Canje = new centrocanje();
        if($this->consultarPuntos($id_cuenta)>$this->consultarPrecio($id_regalo)){
                $puntosADescontar=$this->consultarPrecio($id_regalo);
                $this->descontarPuntos($id_cuenta,$puntosADescontar);
                $this->descontarCantidad($id_regalo);
                $Canje->id_usuario=$id_cuenta;
                $Canje->id_regalo=$id_regalo;
                $Canje->fechaCanje=Carbon::now()->format('Y-m-d');
                $Canje->save();
                return response()->json([
                    "status"=>1,
                    "msg"=>"Canje Realizado con Exito",
                    "data"=>$Canje,
                ]);
        } else{
            return response()->json([
                "status"=>0,
                "msg"=>"No tienes puntos suficientes para este regalo",
            ]);
        }
    }

}
