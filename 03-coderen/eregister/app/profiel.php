<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiel extends Model
{
    public $timestamps = false;
    //Selecteer table
    protected $table = 'profiel';
    protected $fillable =['naam','tussenvoegsel','achternaam','postcode','plaats','straat','straatnummer','land'];
}
