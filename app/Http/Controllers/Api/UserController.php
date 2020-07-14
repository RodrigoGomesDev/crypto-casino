<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Código de sucesso
    public $successStatus = 200;

    public function __construct(ModelsUser $user)
    {

        //Desestruturando o model User em uma váriavel
        $this->ModelsUser = $user;
    }
    

    public function index() {
        //Requerindo todos os usuários
        $user = $this->ModelsUser->all();

        //Exibindo os usuários em tela
        return response()->json($user);
    }

    public function show($id) {

        //Procurando um usuário por id
        $user = $this->ModelsUser->find($id);

        //Fazendo uma validação para saber se o usuário existe
        $alreadyRegisteredId = ModelsUser::where('id', $user);
        if ($alreadyRegisteredId = $user) {
            return response()->json($user);
        }
        else {
            return response()->json(['msg' => "O usuário não existe, veja se o id está correto"]);
        }
    }

    
    public function update($id, Request $request) {
        //Váriavel para requerir todos os itens
        $update_users = $request->all();    

        //Requerindo um usuário pelo seu id
        $user = $this->ModelsUser->find($id);

        //Juntando as duas váriaveis para atualizar as informações de usuário
        $user->update($update_users);

        //Mensagem de sucesso
        return response()->json(["msg" => "O dados do usuário foram atualizados com sucesso!"]);
    }
    
    /*
    *  DELETE
    */

    public function delete($id) {
        //Criando uma váriavel que puxa o model User e destroy ele por id
        $delete_users = $this->ModelsUser->destroy($id);
        
        $alreadyDeletedId = ModelsUser::where('id', $delete_users);
        //Mensagem de sucesso
        if ($alreadyDeletedId) {
            return response()->json(["msg" => "O usuário foi deletado com sucesso"]);
        }
        //Mensagem de erro
        else {
            return response()->json(["msg" => "O id do usuário não foi encontrado, veja se esta correto"]);
        }
    }



    public function login(Request $request) {
        
        //Verificando se o email e senha existem
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            //Depois de passar da autenticação
            $user = auth()->user();
            $user->api_token = '60529034';            
            $user->save();

            //Se o usuário estiver autenticado
            if(Auth::check()) {
                //Retorna uma mensagem de sucesso
                return response()->json(["msg" => "Usuário logado com sucesso"]);

                //Para ver o usuário logado 
                // return auth()->user();
            }
        }
        
        //Se ocorrer algum erro, ele mostra esta mensagem de erro
        return response()->json([
            'error' => 'As credencias do usuário estão incorretas',
            'code' => 401,
        ], 401);
    }


    public function register(Request $request) 
    { 

    //Criando um validador, para validar todos os campos de usuário
    $validator = Validator::make($request->all(), [ 
        'name' => 'required', 
        'email' => 'required|email', 
        'password' => 'required', 
        'password_confirmation' => 'required|same:password', 
    ]);

        //Se o usuário for registrar, e ocorrer alguma falha nas credencias, cairá neste if
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }


            //Criando uma váriavel para requerir os campos específicos
            $input = $request->only('name', 'email', 'password', 'password_confirmation'); 

            /*
            * Dando valor aos campos requeridos
            */

            //Colocando bcrypt no password
            $input['password'] = bcrypt($input['password']); 

            //Validação para ver se o email do usuário cadastrado, já não existe
            $alreadyRegisteredEmail = ModelsUser::where('email', $input['email'])->first();
            if ($alreadyRegisteredEmail) {
                return response()->json(['error' => 'Este email já foi registrado'], 401);
            }



            //Criando o usuário, puxando a váriavel que tem todos os campos
            $user = ModelsUser::create($input); 

            //Retornando uma mensagem de sucesso ao cadastrar
            return response()->json(['sucesso' => 'Usuário registrado com sucesso'], $this-> successStatus); 
        }
    }

