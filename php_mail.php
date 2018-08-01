<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("PHPMailer_5.2.0/class.phpmailer.php");

 $nome_empresa = $_Post['nome_empresa'];
 $nome_empresario = $_Post['nome_empresario'];
 $email_empresa = $_Post['email_empresa'];
 $telefone_empresa = $_Post['telefone_empresa'];
 $cnpj = $_Post['cnpj'];
 $funcao_pretende_orcar = $_Post['funcao_pretende_orcar'];
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail->Host = 'servidor'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = porta; //  Usar 587 porta SMTP
     $mail->Username = 'email@email.org'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'senha'; // Senha do servidor SMTP (senha do email usado)
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('remetente@email.org'); //Seu e-mail
     $mail->AddReplyTo('remetente@email.org', 'Suporte'); //Seu e-mail
     $mail->Subject = 'teste';//Assunto do e-mail
	 //$mail->Body = $corpo;
	 //$mail->AltBody = $corpo;
 
	 $corpo = "$nome_empresa $nome_empresario $telefone_empresa";
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('destinarario@dominio.org', 'Envio de email para vagas');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.org', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.org', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
	
	$envia = "$corpo $Subject $SetFrom From $AddReplyTo";
    
	//Define o corpo do email
     $mail->MsgHTML($envia); 
				   
 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('teste.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>
