<?php namespace ResourceApp\Http\Controllers;
use Illuminate\Http\Request;
use ResourceApp\Http\Requests;
use ResourceApp\Aula;
class AulaController extends Controller
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
        $aulas = Aula::all();
        return $aulas;
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
        $aula = new Aula($input);
        if (!$aula->save()) {
            abort(500, "Saving failed.");
        }
        return $aula;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Aula::find($id);
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
        $aula = Aula::find($id);
        $aula->nombre = $this->request->nombre('nombre');
        if (!$aula->save()) {
            abort(500, "Saving failed");
        }
        return $aula;
    }
    
    public function updateAll()
    {
        $response = new \stdClass();
        $aula = Aula::find($this->req->aula['id']);   
        $aula->numero = $this->req->aula['numero'];
        $aula->edificio = $this->req->aula['edificio'];
        $aula->aireAcondicionado = $this->req->aula['aireAcondicionado'];
        $aula->proyector = $this->req->aula['proyector'];
        $aula->computadora = $this->req->aula['computadora'];        
         if (!$aula->save()) {
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
        return Aula::destroy($id);
    }
}