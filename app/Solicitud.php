<?php namespace ResourceApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Solicitud extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idGrupoSolicitudes', 'idSolicitante','idHorario','idAdmin','idAula','tipo'];//password se llena solo. Los demás son los atributos de la tabla. 

}
