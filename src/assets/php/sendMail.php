<?php
header('Content-type: text/html; charset=iso-8859-1');

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato@soacy.com', 'SoacyAuto');
    $mail->addAddress('pereirakawan07@gmail.com', 'kawan'); 
    $mail->addAddress('joaovictorcarmindo@gmail.com', 'joao');    //Add a recipient


    //Attachments


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Bem-vindo ao SoacyAuto - Capacitando seu estoque de veículos e jornada de vendas!";
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
<body style="margin: 0; padding: 0;font-family: \'Inter\';
font-style: normal;font-weight: 600;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="500"
     style="color: #000000;background-color: #F5F5F7;">
        <tr style="background-color: #004FFF;">
            <td height="25">
                <img height="35" style="display: block;" src="https://soacy.com/arquivos/logos/Logo%20Branco/Logo%20Branco/logo%20branca%20texto.png" alt="logo da soacy">
            </td>
        </tr>
        <tr style="background-color: #004FFF; color: #ffffff;">
            <td align="center" height="100">
                <p style="text-transform: uppercase; font-weight: 700; font-size: 20px;">Agora somos um time!</p>
            </td>
        </tr>
        <tr>
         <td height="450" style="padding: 0px 30px 2px;font-weight: 500;font-size: 15px;line-height: 18px;">
          <p>
            Olá João Victor,<br>
            Bem-vindo à Soacy! Estamos entusiasmados em tê-lo como um cliente valioso e em apresentá-lo ao nosso 
            sistema abrangente baseado na Web para gerenciar o estoque de veículos e impulsionar o sucesso de vendas. <br>
          </p>
          <p align="center">
          <a href="http://localhost/sistemadecarro/src/dashboard/auth/getstarted/" style="text-decoration:none;text-transform:none;display:inline-block;background-color:#004fff;color:#ffffff;padding:10px 40px;border-radius:5px;text-align:center;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://soacy.com&amp;source=gmail&amp;ust=1685616174861000&amp;usg=AOvVaw1t5wlIKG-5lJPYmRD7Ckav">Entrar</a>
          </p>
            
          <p>
            Para acessar sua conta SoacyAuto, clique no botão a cima e para criar suas credenciais de login.<br><br>
             
             Obrigado por escolher o SoacyAuto como sua solução confiável.<br>
              Atenciosamente, <br><br>
            Equipe SoacyAuto.
          </p>
         </td>
        </tr>
        <tr height="50">
            <td align="center" style="border-top: 1px solid rgb(178, 178, 178);
            color: rgb(155, 155, 155);
            font-style: normal;
            font-weight: 700;
            font-size: 13px;
            line-height: 20px;">
                Se precisar de assistência técnica, entre em contato com a Soacy.
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
margin
