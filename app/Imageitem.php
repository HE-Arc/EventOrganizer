<?php
/**
 * Created by PhpStorm.
 * User: aurelie.debrot
 * Date: 14.12.2016
 * Time: 13:05
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Imageitem extends Model
{

    protected $fillable=['url'];

    //Rajouter des méthodes une fois qu'on a la clé étrangère
}