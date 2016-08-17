<?php namespace ResourceApp\Http\Controllers;
use Illuminate\Http\Request;
use ResourceApp\Http\Requests;
use ResourceApp\Mensaje;
class MensajeController extends Controller
{
    private $request;
    function __construct(Request $request)
    {
        $this->req = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mensajes = Mensaje::all();
        return $mensajes;
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
        $input = $this->req->all();
        $mensaje = new Mensaje($input);
        if (!$mensaje->save()) {
            abort(500, "Saving failed.");
        }
        return $mensaje;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Mensaje::find($id);
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
    public function update($id)
    {
        $mensaje = Mensaje::find($id);
        $mensaje->nombre = $this->req->nombre('nombre');
        if (!$mensaje->save()) {
            abort(500, "Saving failed");
        }
        return $mensaje;
    }
    
    public function updateAll()
    {
        $response = new \stdClass();
        $mensaje = Mensaje::find($this->req->mensaje['id']);  
        $mensaje->estado = "Leído";              
         if (!$mensaje->save()) {
             $response->message = "Error al guardar información";
        }else{
            $response->message = "El mensaje ha sido marcado como leído";
                      
        }
         return json_encode($response); 
    }   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Mensaje::destroy($id);
    }
}