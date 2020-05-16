<?php

namespace App\Http\Controllers;

use App\User;
use App\TipoIdentificacion;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $rs = DB::table('users')
        ->join('roles','users.roles_id', '=', 'roles.id')
        ->join('tipo_identificaciones','users.tipo_identificaciones_id','=', 'tipo_identificaciones.id')
        ->select('users.*','roles.nombre_rol','tipo_identificaciones.nombre_identificacion')
        ->get();

        return response()->json([
            'data'=>$rs
        ],200);
    }

    public function authenticate(Request $request)
    {
      
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

  
        return response()->json(compact('token'));
    }

    
    public function create()
    {
        //
    }

     
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'telefono' => 'required|string|max:45',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'sexo' => 'required|',
            'numero_identificacion' => 'required|string|max:45',
            'tipo_identificaciones_id' => 'required|integer',
            'roles_id'=> 'required|integer'
          


        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'sexo' => $request->get('sexo'),
            'tipo_identificaciones_id' => $request->get('tipo_identificaciones_id'),
            'numero_identificacion' => $request->get('numero_identificacion'),
            'roles_id' => $request->get('roles_id'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);


    }

    
    public function getAuthenticatedUser()
            {
                    try {

                            if (! $usuario = JWTAuth::parseToken()->authenticate()) {
                                    return response()->json(['user_not_found'], 404);
                            }

                    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                            return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                            return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                            return response()->json(['token_absent'], $e->getStatusCode());

                    }

                    return response()->json(compact('usuario'));
            }

       
            
            public function show(Usuario $usuario)
            {
                //
            }
        
            
            public function edit(Usuario $usuario)
            {
                //
            }
        
            public function update(Request $request, Usuario $usuario)
            {
                //
            }
        
           
            public function destroy(Usuario $usuario)
            {
                //
            }

}
