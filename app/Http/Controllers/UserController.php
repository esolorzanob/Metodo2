<?php namespace ResourceApp\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ResourceApp\Http\Requests;
use ResourceApp\User;
use Tymon\JWTAuth\JWTAuth;
use Mail;

class UserController extends Controller
{
    private $req;
    private $user;
    private $jwtAuth;

    function __construct(Request $request, User $user, ResponseFactory $responseFactory, JWTAuth $jwtAuth)
    {
        $this->req = $request;
        $this->user = $user;
        $this->res = $responseFactory;
        $this->jwtAuth = $jwtAuth;
    }

    /**
     * Log a user in.
     *
     * @return Response
     */
    public function login()
    {
        $user = $this->user->authenticate(
            $this->req->input('email'), $this->req->input('password'));
        if (!$user) {
            return $this->res->json([
                'code' => null,
                'message' => 'Login failed',
                'description' => 'Wrong username/password.'

            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user['token'] = $this->jwtAuth->fromUser($user);
        return $this->res->json($user, Response::HTTP_OK);
    }

    /**
     * Get a user by the token from the header.
     *
     * @return Response
     */
    public function getByToken()
    {
        return $this->jwtAuth->parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $users = User::all();
       return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User($this->req->all());
        if (!$user->save()) {
            abort(500, 'Could not save user.');
        }
        $user['token'] = $this->jwtAuth->fromUser($user);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function updateAll()
    {
        $response = new \stdClass();
        $user = User::find($this->req->usuario['id']);   
        $user->rol = $this->req->usuario['rol'];
        $user->nombre = $this->req->usuario['nombre'];
        $user->apellido1 = $this->req->usuario['apellido1'];
        $user->apellido2 = $this->req->usuario['apellido2'];
        $user->email = $this->req->usuario['email'];
        $user->genero = $this->req->usuario['genero'];
        $user->carnet = $this->req->usuario['carnet'];
        $user->carrera = $this->req->usuario['carrera'];
         if (!$user->save()) {
             $response->message = "Error al salvar información";
        }else{
            $response->message = "La información fue guardada con éxito";
                      
        }
         return json_encode($response); 
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function delete()
    {
        $user = User::find($this->req->userId);
        $user->delete();
        
    }
    
     public function getByEmail(){
        $email = $this->req->email;        
        $user = $user = User::where('email',$email)->get();          
        return $user;
    }
    
     public function resetPassword(){
       $pass = $this->req->password; 
       $user = User::find($this->req->userId);       
      $this->updatePassword($user, $pass);
           
        $data = array('pass' => $pass);
        if (Mail::send('password-view', ['pass' => $pass], function($message) use ($data)
        {
        $message->to('esolorzano@renovatiocloud.com', 'Admin')->subject('Password Reset');
        })){
            $response = new \stdClass();
            $response->message = "La contraseña temporal se ha enviado a su correo";
           return json_encode($response); 
        }else {
           $response = new \stdClass();
            $response->message = "Se produjo un error al enviar la contraseña, por favor revise el email escrito";
           return json_encode($response); 
        }
       
    }
    
      public function updatePassword($user, $pass)
    {   
        $user->change_password = "Yes";
        $user->password = \Hash::make($pass);
        if (!$user->save()) {
            abort(500, "Saving failed");
        }
        return $user;  
    }
    
      public function changePassword(){
        $id = $this->req->userId;
        $pass = $this->req->password;
        $user = User::find($id);
        $user->password = \Hash::make($pass);
        $user->change_password = "No";
         if (!$user->save()) {
           $response = new \stdClass();
            $response->message = "Se produjo un error al cambiar su contraseña.";
           return json_encode($response); 
        }else{
             $response = new \stdClass();
            $response->message = "Su contraseña se cambió con éxito, pronto será redirigido.";
           return json_encode($response);
        }
        
    }
    
    

}
