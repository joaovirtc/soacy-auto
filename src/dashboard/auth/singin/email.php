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
    $mail->setFrom('contato@soacy.com', 'kawan');
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
            table, td, div, h1, p {font-family: Arial, sans-serif;}
            table, td {}
        </style>
    </head>
<body style="margin: 0; padding: 0;font-family: "Inter";
font-style: normal;font-weight: 600;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="500"
     style="background-color: #121316;color: #fff;">
        <tr style="background-color: #004FFF;">
            <td>
                <img height="30" src="https://soacy.com/arquivos/logos/Logo%20Branco/Logo%20Branco/logo%20branca%20texto.png" alt="logo da soacy">
            </td>
        </tr>
        <tr  height="100" valign="top" style="background-color: #004FFF; ">
            <td><h1 align="center" style="font-size: 25px;">
                REDEFINIÇÃO DE SENHA</h1></td>
        </tr>
        <tr>
         <td>
          <p style="padding: 0px 30px;font-weight: 400;
          font-size: 15px;
          line-height: 15px;">
            [Querido usuário],<br>
Recebemos uma solicitação para redefinir sua senha para sua conta SoacyAuto. Entendemos que manter sua conta segura é de extrema importância e estamos aqui para ajudá-lo nesse processo.
<br><br> Para prosseguir com a redefinição de senha, siga as instruções abaixo: <br>
• Visite a página de redefinição de senha do SoacyAuto clicando no seguinte link: <b>https://soacy.com</b>. <br>
• Defina uma nova senha para sua conta SoacyAuto seguindo as orientações fornecidas. Certifique-se de escolher uma senha forte, única e difícil de adivinhar. <br>
• Depois de definir sua nova senha com sucesso, você poderá fazer login na sua conta SoacyAuto usando suas credenciais atualizadas. <br> <br>
Se você não iniciou esta solicitação de redefinição de senha ou acredita que seja um erro, ignore este e-mail. Tenha certeza de que sua conta permanece segura.
Se você encontrar alguma dificuldade ou precisar de mais assistência, sinta-se à vontade para entrar em contato com nossa equipe de suporte em  <b>suporte@soacy.com</b>. Nossa equipe está pronta para ajudá-lo a resolver quaisquer problemas prontamente. <br>
Obrigado por sua atenção a este assunto.
<br><br>
Atenciosamente,<br><br>

Equipe de suporte da Soacy
          </p>
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