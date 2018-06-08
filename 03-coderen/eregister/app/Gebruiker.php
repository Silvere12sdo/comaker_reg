<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    public $timestamps = false;
    //Selecteer table
    protected $table = 'gebruiker';
    protected $fillable = ['temp_wachtwoord','wachtwoord','email'];
}
