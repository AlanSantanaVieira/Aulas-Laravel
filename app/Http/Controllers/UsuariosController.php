<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\FormRequestUsuarios;

// hash de Autorização - necessário para criptografar a senha
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }           

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUser = $this->user->getFiltrosPaginate(search: $pesquisar ?? "");

        return view('pages.usuarios.index', compact('findUser'));
    }

    public function delete($idUser)
    {
        $buscaRegistro = User::find($idUser);
        $buscaRegistro->delete();

        return back(); 
    }

    public function create(FormRequestUsuarios $request)
    {
        //condicional para entendimento de envio dos dados para o banco de dados
        if ($request->method() == "POST"){
            $data = $request->all();
            User::create(
             [
                "permissao_do_usuario" => $data['permissao_do_usuario'],
                "name" => $data['name'],
                "email" => $data['email'],
                "password" => Hash::make($data['password']),
                ]
            );
            return redirect('/usuarios');
        }

        return view('pages.usuarios.create');
    }
}
