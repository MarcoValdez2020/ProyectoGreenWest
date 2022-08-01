<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request -> validate([
            'name'=> 'required',
            'apellidoPaterno'=> 'required',
            'apellidoMaterno'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
            'id_rol'=> 'required',
        ]);

        $user = new User();
        $user -> name = $request->name;
        $user -> apellidoPaterno = $request->apellidoPaterno;
        $user -> apellidoMaterno = $request->apellidoMaterno;
        $user -> telefono = $request->telefono;
        $user -> email = $request->email;
        $user -> password = Hash::make($request->password);
        $user -> id_rol = $request->id_rol;
        $user ->save();

        return response()->json([
            "status"=>1,
            "msg"=>"Registro de usuario existoso",
        ]);
    }

    public function login(Request $request){
        $request -> validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $user = User::where("email","=",$request->email)->first();

        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                //creamos token
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status"=>1,
                    "msg"=>"Usuario Logueado exitosamente!",
                    "access_token"=>$token,
                ]);
            }else{
                return response()->json([
                    "status"=>0,
                    "msg"=>"Contraseña incorrecta!",
                ],404);
            }
        }else{
            return response()->json([
                "status"=>0,
                "msg"=>"Usuario no registrado!",
            ],404);
        }
    }
    public function userProfile(){
        return response()->json([
            "status"=>1,
            "msg"=>"Datos del usuario!",
            "data"=>auth()->user(),
        ]);
    }
    public function logout(){
        //descomentar para eliminar el token
        //auth()->user()->tokens()->delete();
        return response()->json([
            "status"=>1,
            "msg"=>"Cierre de sesión exitoso!",
        ]);
    }

    public function updateUser(Request $request){
        $id= auth()->user()->id;
            
            $user = User::find($id);
            $user->name = isset($request->name) ? $request->name: $user->name;
            $user -> apellidoPaterno = isset($request->apellidoPaterno) ? $request->apellidoPaterno : $user->apellidoPaterno;
            $user -> apellidoMaterno = isset($request->apellidoMaterno) ? $request->apellidoMaterno : $user->apellidoMaterno;
            $user -> telefono = isset($request->telefono) ? $request->telefono : $user -> telefono;
            $user -> email = isset($request->email) ? $request->email: $user -> email;
            $user -> password =Hash::make(isset($request->password)) ?Hash::make($request ->password) : Hash::make($user->password);
            $user -> id_rol = $user->id_rol;
            $user ->save();

            return response()->json([
                "status"=>1,
                "msg"=>"Usuario actualizado correctamente!",
                "data"=>auth()->user(),
            ]);
        
    }

    public function deleteUser(){
        $id= auth()->user()->id;
        $user = User::find($id);
        $user ->delete();
        //auth()->user()->tokens()->delete();
        return response()->json([
            "status"=>1,
            "msg"=>"Usuario eliminado correctamente!",
        ]);
    }
}
