<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    /** La siguiente funcion retorna el listado de todos los clientes */

    public function index()
    {

        $clients = $this->clienteRepository->getListClients();

        if (count($clients) == 0) {

            return Response()->json(['status' => 'No se ha cargado ningun cliente','data' => '']);

        } else {

            return Response()->json(['status' => 'success', 'data' => $clients]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** La siguiente funcion realizar el alta de cliente */

    public function store(Request $request)
    {

        $validate = Validator::make($request->input(), [
            'cli_apellido' => 'required|min:3|max:100',
            'cli_nombre' => 'required|min:3|max:100',
            'cli_dni' => 'required|min:3|max:20',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors'=>$validate->errors()]);
        }

        $client = New Cliente();
        $client->cli_apellido = $request->input('cli_apellido');
        $client->cli_nombre = $request->input('cli_nombre');
        $client->cli_dni = $request->input('cli_dni');
        $client->cli_email = $request->input('cli_email');
        $client->save();

        if ($client->save()) {

            return Response()->json(['status' => 'success', 'data' => 'Se guardaron los datos correctamente']);

        } else {

            return Response()->json(['status' => 'error', 'data' => 'Error - No se pudieron guardar los datos ']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** La siguiente funcion retorna los datos del cliente que tiene el id seleccionado */

    public function show($id)
    {
        $client = $this->clienteRepository->getListClient($id);

        if (count($client) == 0) {

            return Response()->json(['status' => 'No existe ningun cliente con ese id','data' => '']);

        } else {

            return Response()->json(['status' => 'success', 'data' => $client]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** La siguiente funcion realizar la modificacion de los datos del cliente */

    public function update(Request $request, $id)
    {

        $validate = Validator::make($request->input(), [
            'cli_apellido' => 'required|min:3|max:100',
            'cli_nombre' => 'required|min:3|max:100',
            'cli_dni' => 'required|min:3|max:20',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors'=>$validate->errors()]);
        }

        $client = Cliente::find($id);
        $client->cli_apellido = $request->input('cli_apellido');
        $client->cli_nombre = $request->input('cli_nombre');
        $client->cli_dni = $request->input('cli_dni');
        $client->cli_email = $request->input('cli_email');
        $client->save();

        if ($client->save()) {

            return Response()->json(['status' => 'success', 'data' => 'Se guardaron los datos correctamente']);

        } else {

            return Response()->json(['status' => 'error', 'data' => 'Error - No se pudieron guardar los datos ']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** La siguiente funcion realizar la baja de un cliente */

    public function destroy($id)
    {

        Cliente::destroy($id);

        return Response()->json(['status' => 'success', 'data' => 'Se elimino el cliente']);

    }
}
