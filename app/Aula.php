<?php namespace ResourceApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Aula extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aulas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['numero', 'edificio', 'aireAcondicionado', 'proyector', 'computadora'];

   
}
