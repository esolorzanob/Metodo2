<?php namespace ResourceApp\Http\Controllers;
use Illuminate\Http\Request;
use ResourceApp\Http\Requests;
use ResourceApp\Recurso;
class RecursoController extends Controller
{
    private $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Recurso::all();
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
        $input = $this->request->all();
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
        $recurso->nombre = $this->request->nombre('nombre');
        if (!$recurso->save()) {
            abort(500, "Saving failed");
        }
        return $recurso;
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