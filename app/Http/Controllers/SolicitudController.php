<?php namespace ResourceApp\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ResourceApp\Http\Requests;
use ResourceApp\Solicitud;

class SolicitudController extends Controller
{

    private $request;
    private $solicitud;

    function __construct(Request $request, Solicitud $solicitud, ResponseFactory $responseFactory)
    {
        $this->req = $request;
        $this->solicitud = $solicitud;
        $this->res = $responseFactory;
    }


    /** 
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Solicitud::all();
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
        $solicitud = new Solicitud($input);
        if (!$solicitud->save()) {
            abort(500, "Saving failed.");
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
        $solicitud->body = $this->request->input('body');
        if (!$solicitud->save()) {
            abort(500, "Saving failed");
        }
        return $solicitud;
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
