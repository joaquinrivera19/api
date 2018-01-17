<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 16/1/18
 * Time: 21:15
 */

namespace App\Repositories;

use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository
{

    /** La siguiente funcion me retorna todos los clientes */

    public function getListClients()
    {
        return Cliente::all();
    }

    public function getListClient($id)
    {
        return Cliente::where('cli_id','=',$id)->get();
    }

}