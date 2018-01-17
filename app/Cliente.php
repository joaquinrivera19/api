<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 16/1/18
 * Time: 21:11
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'cliente';

    protected $primaryKey = 'cli_id';

    public $timestamps = false;
    public $fillable = ['cli_id','cli_apellido','cli_nombre','cli_dni','cli_email'];

    /** Seteo el campo cli_apellido para que se almacene con mayuscula */

    public function setCliApellidoAttribute($value)
    {
        $this->attributes['cli_apellido'] = strtoupper($value);
    }

    /** Seteo el campo cli_nombre para que se almacene con mayuscula */

    public function setCliNombreAttribute($value)
    {
        $this->attributes['cli_nombre'] = strtoupper($value);
    }

}