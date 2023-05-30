<?php
header('Content-type: text/html; charset=iso-8859-1');
session_start();
$_SESSION['msgSucess'] = 'msg';
require '../../../assets/php/PHPMailer/src/Exception.php';
require '../../../assets/php/PHPMailer/src/PHPMailer.php';
require '../../../assets/php/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato@soacy.com'; 
    $mail->Password   = 'email_soacy7971';                     //SMTP username
    // $mail->Password   = 'nrzdewlnwiazocoq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato@soacy.com', 'SoacyAuto');
    $mail->addAddress('pereirakawan07@gmail.com', 'kawan'); 
    $mail->addAddress('joaovictorcarmindo@gmail.com', 'joao');    //Add a recipient


    //Attachments


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Redefinicao de senha para conta SoacyAuto";
    $mail->Body    = '
    
    <!DOCTYPE html>
    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <!--[if mso]> 
    <noscript> 
    <xml> 
    <o:OfficeDocumentSettings> 
    <o:PixelsPerInch>96</o:PixelsPerInch> 
    </o:OfficeDocumentSettings> 
    </xml> 
    </noscript> 
    <![endif]-->
        <style>
            table, td, div, h1, p {font-family: inter, sans-serif;}
            table, td {}
        </style>
    </head>
<body style="margin: 0; padding: 0;font-family: "Inter";
font-style: normal;font-weight: 600;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="500"
     style="color: #000;">
        <tr style="background-color: #004FFF;">
            <td align="center" height="125">
                <img height="55"  src="https://soacy.com/arquivos/logos/Logo%20Branco/Logo%20Branco/logo%20branca.png" alt="logo da soacy">
            </td>
        </tr>
        
        <tr >
         <td height="450" style="padding: 0px 10px 5px;font-weight: 500;
         font-size: 15px;
         line-height: 18px;">
          <p >
            Olá [Querido usuário],<br><br>
            Se você não pediu essa alteração, pode ignorar este e-mail tranquilamente. <br><br>
            Você está recebendo este e-mail porque solicitou a redefinição da senha para sua conta SoacyAuto. <br><br>
            Para escolher uma senha nova e concluir sua solicitação, acesse o link abaixo: <br>
          </p>
          <p style="padding: 35px 0;">
            <b>http://localhost/sistemadecarro/src/dashboard/auth/esqueceu-a-senha/</b>
          </p>
          <p>
            Se não puder clicar nele, copie e cole a URL na barra de endereços do seu navegador. <br><br>
            Abraços !<br>
            A Equipe SoacyAuto
          </p>
         </td>
        </tr>
        <tr height="50">
            <td align="center" style="border-top: 1px solid rgba(111, 112, 114, 0.49);font-family: "Inter";
            color: #6F7072;
            font-style: normal;
            font-weight: 500;
            font-size: 13px;
            line-height: 20px;
            padding: 15px 0">
                Se precisar de assistência técnica, entre em contato com a SoacyAuto.
            </td>
        </tr>
       </table>
   </body>
</html>
    
    
                    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location: http://localhost/sistemadecarro/src/dashboard/auth/singin/');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>