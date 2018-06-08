<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QRCode;
use Illuminate\Support\Facades\Hash;
use App\Gebruiker as Gebruiker;
use App\registratie as Registratie;
use DB;
use Session;
use Carbon\Carbon;
class DocentController extends Controller
{
  //
  public function index(){
      return view('docent');
  }
  public function RegisterInlog(Request $request){
    if(isset($request)){
      $email = $request->input('email');
      $password = $request->input('password');
      $password = hash('sha256',$password); 
      $user = Gebruiker::where('email', $email)->where('wachtwoord',$password)->first();
      if($user['temp_wachtwoord'] == '1'){
        $msg = 'Maak eerst een nieuwe wachtwoord aan.';
        return View('wachtwoordReset', array(
          'email' => $user['email'],
          'id' => $user['id'],
          'msg' =>  $msg
        ));
      }else{
        Session::put('email', $user['email']);
        Session::put('id', $user['ID']);
        Session::put('_token', $user['_token']);
      }
    }else{
      return view('lesRegisterLogin');
    }
    if(isset($user)){
      return redirect()->to('/studentLogin');
    }else{
      return view('lesRegisterLogin');
    }
  }   
  public function lesLogin(){
    return view('lesRegisterLogin');
  }
  
  public function registerLes(){
    if(Session::get('email') == ""){
      return view('lesRegisterLogin');
    }else{
      $vak = rand(1,2);
      $gebruiker = Session::get('id');
      $token = Session::get('_token');
      $datum = Carbon::now();
      $insert = DB::table('registratie')->insert(
        ['vak_ID'=>1, 'profiel_ID'=>$gebruiker,'datum'=>$datum , 'token'=>$token]
      );
      if($insert){
        $msg = "Je bent nu succesvol geregistreerd voor het huidige college.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
       return redirect('/student');
      }
    }
  }
}
