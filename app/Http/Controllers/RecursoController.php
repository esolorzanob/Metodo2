<?php namespace ResourceApp\Http\Controllers;
use Illuminate\Http\Request;
use ResourceApp\Http\Requests;
use ResourceApp\Recurso;
class RecursoController extends Controller
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
        $recursos = Recurso::all();
        return $recursos;
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
        $recurso = new Recurso($input);
        if (!$recurso->save()) {
            abort(500, "Saving failed.");
        }
        return $recurso;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Recurso::find($id);
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
        $recurso = Recurso::find($id);
        $recurso->nombre = $this->req->nombre('nombre');
        if (!$recurso->save()) {
            abort(500, "Saving failed");
        }
        return $recurso;
    }
    
    public function updateAll()
    {
        $response = new \stdClass();
        $recurso = Recurso::find($this->req->recurso['id']);   
        $recurso->nombre = $this->req->recurso['nombre'];
        $recurso->numeroSerie = $this->req->recurso['numeroSerie'];
        $recurso->descripcion = $this->req->recurso['descripcion'];
        $recurso->estado = $this->req->recurso['estado'];
        $recurso->comentarios = $this->req->recurso['comentarios'];        
         if (!$recurso->save()) {
             $response->message = "Error al guardar información";
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
    public function destroy($id)
    {
        return Recurso::destroy($id);
    }
}