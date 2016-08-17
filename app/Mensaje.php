<?php namespace ResourceApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Mensaje extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mensajes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario', 'idUsuario', 'mensaje', 'estado', 'acerca_de'];

   
}
