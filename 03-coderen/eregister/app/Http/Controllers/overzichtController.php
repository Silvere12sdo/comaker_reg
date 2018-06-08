<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registratie as Registraties;
use DB;
use Session;

class overzichtController extends Controller
{
    
    //
    public function docentOverzicht(){
        // $registraties = Registraties::get();
        $registraties = DB::table('registratie')
                        ->leftjoin('gebruiker', 'gebruiker.ID', '=', 'registratie.profiel_ID')
                        ->leftjoin('vak', 'vak.ID','=','registratie.vak_ID')
                        ->get();
        //$queries = DB::getQueryLog();
        //$last_query = end($queries);
        //var_dump($last_query);
        // die();
        //echo "<pre>";
        //var_dump($registraties);
        //echo"</pre>";
        return View('docentOverzicht', array(
        'registraties' => $registraties,
        ));
          
    }
    public function studentOverzicht(){
        $id = Session::get('id');
        $registraties = DB::table('registratie')
                        ->leftjoin('gebruiker', 'gebruiker.ID', '=', 'registratie.profiel_ID')
                        ->leftjoin('vak', 'vak.ID','=','registratie.vak_ID')
                        ->where('registratie.profiel_ID',$id)
                        ->get();
        return View('studentOverzicht', array(
            'registraties' => $registraties,
        ));
    }
}
