<?php namespace ResourceApp\Http\Controllers;
use Illuminate\Http\Request;
use ResourceApp\Http\Requests;
use ResourceApp\Solicitud;
use Mail;
class SolicitudController extends Controller
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
        $solicitudes = Solicitud::all();
        return $solicitudes;
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
        
        $solicitud = new Solicitud($input);
        
        if (!$solicitud->save()) {
            abort(500, "Saving failed.");
        }        
       
         $data = array('input' => $input);
        if (Mail::send('solicitudCreate-view', ['input' => $input], function($message) use ($data)
        {
        $message->to('esteban.solorzanolds@gmail.com', 'Admin')->subject('Solicitud Aceptada');
        })){
            $response = new \stdClass();
            $response->message = "Su solicitud fue aceptada";
           return json_encode($response); 
        }else {
           $response = new \stdClass();
            $response->message = "Se produjo un error al aceptar su solicitud";
           return json_encode($response); 
        }
        
        
        return $solicitud;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Solicitud::find($id);
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
        $solicitud = Solicitud::find($id);
        $solicitud->nombre = $this->request->nombre('nombre');
        if (!$solicitud->save()) {
            abort(500, "Saving failed");
        }
        return $solicitud;
    }
    
    public function updateAll()
    {
        $response = new \stdClass();
        $solicitud = Solicitud::find($this->req->solicitud['id']);   
        $solicitud->solicitante = $this->req->solicitud['solicitante'];
        $solicitud->fecha_inicio = $this->req->solicitud['fecha_inicio'];
        $solicitud->fecha_devolucion = $this->req->solicitud['fecha_devolucion'];
        $solicitud->recurso = $this->req->solicitud['recurso'];
        $solicitud->recursoId = $this->req->solicitud['recursoId'];
        $solicitud->aula = $this->req->solicitud['aula'];     
        $solicitud->estado = $this->req->solicitud['estado'];
         if (!$solicitud->save()) {
             $response->message = "Error al guardar información";
        }else{
            $response->message = "La información fue guardada con éxito";
                      
        }
        if ($solicitud->estado == "Rechazada"){
           $data = array('solicitud' => $solicitud);
        if (Mail::send('solicitudRechazada-view', ['solicitud' => $solicitud], function($message) use ($data)
        {
        $message->to('esteban.solorzanolds@gmail.com', 'Admin')->subject('Solicitud Rechazada');
        })){
           
        }else {
          
        }  
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
        return Solicitud::destroy($id);
    }
}