<?php namespace ResourceApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Recurso extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'numeroSerie', 'descripcion', 'estado', 'comentarios'];

   
}
