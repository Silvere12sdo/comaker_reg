<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Gebruiker as Gebruiker;
use DB;
use Session;

class GebruikerController extends Controller
{
  public function checkSession(){
    if(Session::has('id')){
      if(Session::get('rol')=='student'){
        return View('student', array(
          'email'    =>  Session::get('email'),
          'id'  =>  Session::get('id'),
        ));
      }elseif(Session::get('rol')=='docent'){
        return View('docent', array(
          'email'    =>  Session::get('email'),
          'id'  =>  Session::get('id'),
        ));
      }  
    }else{
      return redirect()->to('/login');
    }
  }
  public function loguit(){
    Session::forget('id');
    Session::forget('email');
    $msg = "U bent nu uitgelogd";
    
    return View('login', array(
      'msg'    =>  $msg,
    ));
  }
  //toon register
  public function create(){
    return view('register');
  }
  //maak gebruiker aan
  public function store(Request $request)
  {
    if($request->input('email') != '' OR $request->input('wachtwoord') != ''){
      $email = $request->input('email');
      $emailurl = explode("@", $email);
      if($emailurl[1] === 'student.windesheim.nl' or $emailurl[1] === 'docent.windesheim.nl'){
        $wachtwoord= $request->input('wachtwoord');
        $wachtwoord = hash('sha256',$wachtwoord);
        $persNummer = $emailurl[0];
        if (Gebruiker::where('email', '=', $email)->exists()) {
          // user found
          $msg = "E-mailadress is al in gebruik";
          return View('login', array(
            'msg'    =>  $msg,
          ));
       }else{
        DB::table('gebruiker')->insert(
          ['pers_nummer'=>$persNummer,'email'=>$email, 'wachtwoord'=>$wachtwoord, 'temp_wachtwoord'=>0]
        );
        $msg = "Registratie succesvol u kunt nu inloggen.";
        return View('login', array(
          'msg'    =>  $msg,
        ));
        }
      }else{
        $msg = "U moet gebruik maken van een Windesheim e-mailadres";
        return View('register', array(
          'msg'    =>  $msg,
        ));
      }
    }else{
      create();
    }
  }
  public function resetpass(){
    
  }
  //logt gebruiker in
  public function inlog(Request $request){
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
      return redirect()->to('/login');
    }
    if(isset($user)){
      $email = explode('@', $email);
      $emailrol = explode('.', $email[1]);
      if($emailrol[0] == 'student'){
        Session::put('rol', 'student');
        return View('student', array(
          'email'    =>  Session::get('email'),
          'id'  =>  Session::get('id'),
          '_token' => Session::get('_token'),
          'rol' => Session::get('rol')
        ));
      }else if($emailrol[0] == 'docent'){
        Session::put('rol', 'docent');
        return View('docent', array(
          'email'    =>  Session::get('email'),
          'id'  =>  Session::get('id'),
          '_token' => Session::get('_token'),
          'rol' => Session::get('rol')
        ));
      }
      
    }else{
      return redirect()->to('/login');
    }
  }
}
