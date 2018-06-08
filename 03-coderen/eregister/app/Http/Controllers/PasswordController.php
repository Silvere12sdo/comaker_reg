<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Gebruiker as Gebruiker;
use DB;
use Session;

class PasswordController extends Controller
{
    //
    public function reset(){
        return view('resetpass');
    }
    public function mailTemp(){
       
    }
    public function mailNewPass(Request $request){
        $email = $request->email;
        $emailurl = explode("@", $email);
        if($emailurl[1] === 'student.windesheim.nl' or $emailurl[1] === 'docent.windesheim.nl'){
            $subject = "Wachtwoord vergeten";
            $txt = '
            <!doctype html>
            <html>

            <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Wachtwoord vergeten</title>
                <style>

                    img {
                        border: none;
                        -ms-interpolation-mode: bicubic;
                        max-width: 100%;
                    }

                    body {
                        background-color: #f6f6f6;
                        font-family: sans-serif;
                        -webkit-font-smoothing: antialiased;
                        font-size: 14px;
                        line-height: 1.4;
                        margin: 0;
                        padding: 0;
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                    }

                    table {
                        border-collapse: separate;
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        width: 100%;
                    }

                    table td {
                        font-family: sans-serif;
                        font-size: 14px;
                        vertical-align: top;
                    }

                    .body {
                        background-color: #f6f6f6;
                        width: 100%;
                    }

                    .container {
                        display: block;
                        Margin: 0 auto !important;
                        /* makes it centered */
                        max-width: 580px;
                        padding: 10px;
                        width: 580px;
                    }

                    .content {
                        box-sizing: border-box;
                        display: block;
                        Margin: 0 auto;
                        max-width: 580px;
                        padding: 10px;
                    }
                    .main {
                        background: #ffffff;
                        border-radius: 3px;
                        width: 100%;
                    }

                    .wrapper {
                        box-sizing: border-box;
                        padding: 20px;
                    }

                    .content-block {
                        padding-bottom: 10px;
                        padding-top: 10px;
                    }

                    .footer {
                        clear: both;
                        Margin-top: 10px;
                        text-align: center;
                        width: 100%;
                    }

                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                        color: #999999;
                        font-size: 12px;
                        text-align: center;
                    }

                    h1,
                    h2,
                    h3,
                    h4 {
                        color: #000000;
                        font-family: sans-serif;
                        font-weight: 400;
                        line-height: 1.4;
                        margin: 0;
                        Margin-bottom: 30px;
                    }

                    h1 {
                        font-size: 35px;
                        font-weight: 300;
                        text-align: center;
                        text-transform: capitalize;
                    }

                    p,
                    ul,
                    ol {
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        margin: 0;
                        Margin-bottom: 15px;
                    }

                    p li,
                    ul li,
                    ol li {
                        list-style-position: inside;
                        margin-left: 5px;
                    }

                    a {
                        color: #3498db;
                        text-decoration: underline;
                    }

                    .btn {
                        box-sizing: border-box;
                        width: 100%;
                    }

                    .btn>tbody>tr>td {
                        padding-bottom: 15px;
                    }

                    .btn table {
                        width: auto;
                    }

                    .btn table td {
                        background-color: #ffffff;
                        border-radius: 5px;
                        text-align: center;
                    }

                    .btn a {
                        background-color: #ffffff;
                        border: solid 1px #3498db;
                        border-radius: 5px;
                        box-sizing: border-box;
                        color: #3498db;
                        cursor: pointer;
                        display: inline-block;
                        font-size: 14px;
                        font-weight: bold;
                        margin: 0;
                        padding: 12px 25px;
                        text-decoration: none;
                    }

                    .btn-primary table td {
                        background-color: #3498db;
                    }

                    .btn-primary a {
                        background-color: #3498db;
                        border-color: #3498db;
                        color: #ffffff;
                    }

                    .last {
                        margin-bottom: 0;
                    }

                    .first {
                        margin-top: 0;
                    }

                    .align-center {
                        text-align: center;
                    }

                    .align-right {
                        text-align: right;
                    }

                    .align-left {
                        text-align: left;
                    }

                    .clear {
                        clear: both;
                    }

                    .mt0 {
                        margin-top: 0;
                    }

                    .mb0 {
                        margin-bottom: 0;
                    }

                    .preheader {
                        color: transparent;
                        display: none;
                        height: 0;
                        max-height: 0;
                        max-width: 0;
                        opacity: 0;
                        overflow: hidden;
                        mso-hide: all;
                        visibility: hidden;
                        width: 0;
                    }

                    .powered-by a {
                        text-decoration: none;
                    }

                    hr {
                        border: 0;
                        border-bottom: 1px solid #f6f6f6;
                        Margin: 20px 0;
                    }

                    @media only screen and (max-width: 620px) {
                        table[class=body] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important;
                        }
                        table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                            font-size: 16px !important;
                        }
                        table[class=body] .wrapper,
                        table[class=body] .article {
                            padding: 10px !important;
                        }
                        table[class=body] .content {
                            padding: 0 !important;
                        }
                        table[class=body] .container {
                            padding: 0 !important;
                            width: 100% !important;
                        }
                        table[class=body] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important;
                        }
                        table[class=body] .btn table {
                            width: 100% !important;
                        }
                        table[class=body] .btn a {
                            width: 100% !important;
                        }
                        table[class=body] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important;
                        }
                    }

                    @media all {
                        .ExternalClass {
                            width: 100%;
                        }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;
                        }
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important;
                        }
                        .btn-primary table td:hover {
                            background-color: #34495e !important;
                        }
                        .btn-primary a:hover {
                            background-color: #34495e !important;
                            border-color: #34495e !important;
                        }
                    }
                    .small{
                        font-size:9px!important;
                    }
                </style>
            </head>
            <body class="">
                <table border="0" cellpadding="0" cellspacing="0" class="body">
                    <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                            <div class="content">
                                <span class="preheader">
                                U heeft een nieuw wachtwoord aangevraagd voor uw E-register account, via de onderstaande link kunt u deze aanpassen.
                                </span>
                                <table class="main">
                                    <tr>
                                        <td class="wrapper">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>
                                                        <p>Goedendag,</p>
                                                        <p>U heeft een nieuw wachtwoord aangevraagd voor uw E-register account, via de onderstaande link kunt u deze aanpassen.</p>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="https://project4.bakiyuksel.nl/public/passreset/'.$email.'" target="_blank">Reset uw wachtwoord</a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p class="small">Werkt de button niet? kopieer en plak de volgende link in uw browser:<br>
                                                        <a href="https://project4.bakiyuksel.nl/public/passreset/'.$email.'">https://project4.bakiyuksel.nl/public/passreset/'.$email.'</a></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <!-- END MAIN CONTENT -->
                                </table>

                                <!-- START FOOTER -->
                                <div class="footer">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="content-block powered-by">
                                                Powered by
                                                <a href="https://project4.bakiyuksel.nl/public/">Eregister</a>.
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </body>

            </html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to =$email;
            Gebruiker::where('email', '=', $email)->update(array('temp_wachtwoord' => 1));
            $headers .= 'From: Eregister Windesheim<info@eregister.windesheim.nl>' . "\r\n";
            mail($to, $subject,$txt,$headers);
            return view('login');

        }else{
            echo 'Gebruik een geldig Windesheim email.';
        }
    }
    public function updatePass($email){
        $user = Gebruiker::where('email', $email)->first();
        if($user->temp_wachtwoord == '1'){
        return view('wachtwoordReset', array(
            'email'=>$email
        ));
        }else{
            return redirect('/login');
        }
    }
    public function newpass(Request $r){
        $email = $r->email;
        $pass = $r->wachtwoord;
        $user = Gebruiker::where('email', $email)->first();

        if($user->temp_wachtwoord == '1'){
            $pass = hash('sha256',$pass); 
            Gebruiker::where('email', '=', $email)->update(['temp_wachtwoord' => 0,'wachtwoord'=>$pass]);
            return redirect('/login');
        }else{
            return redirect('/login');
        }
    }
    
}
