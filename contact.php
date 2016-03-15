<?php
require 'lib/PHPMailer/class.phpmailer.php';

$PHPMailer = new PHPMailer();

$PHPMailer->IsSMTP();
$PHPMailer->Host = "ssl://smtp.googlemail.com";
$PHPMailer->SMTPAuth = true;
//$PHPMailer->SMTPSecure = "tls";
$PHPMailer->SMTPDebug = false;
$PHPMailer->Port = "465";
$PHPMailer->Username = "282lemap@gmail.com";
$PHPMailer->Password = "Ricardolindo24";
$PHPMailer->From = $_POST['contact_email'];
$PHPMailer->FromName = $_POST['contact_names'];

$PHPMailer->SetFrom($PHPMailer->From, $PHPMailer->FromName);
$PHPMailer->AddAddress('douglas@282lemap.com.br');

$PHPMailer->IsHTML(true);
$PHPMailer->CharSet = 'UTF-8';

if(isset($_POST['contact_produto']))
{
    $PHPMailer->Subject = 'NOVO PEDIDO VIA SITE';

    $message = 'Novo pedido no site, seguem os dados:

        Nome: '.$_POST['contact_names'].'
        CPF/CNPJ: '.$_POST['contact_cpf'].'
        E-mail: '.$_POST['contact_email'].'
        Telefone: '.$_POST['contact_telefone'].'
        Local de entrega: '.$_POST['contact_local'].'
        Produto: '.$_POST['contact_produto'].'
        Veículo/Modelo/Ano: '.$_POST['contact_veiculo'];
}
else if(isset($_POST['contact_message']))
{
    $PHPMailer->Subject = 'NOVO CONTATO VIA SITE';

    $message = 
        'Nome: '.$_POST['contact_names'].'
        E-mail: '.$_POST['contact_email'].'
        Mensagem: 
        '.$_POST['contact_message'];
}

$PHPMailer->Body = nl2br($message);
$PHPMailer->AltBody = $message;

$send = $PHPMailer->Send();

$PHPMailer->ClearAllRecipients();
$PHPMailer->ClearAttachments();

//return $PHPMailer->ErrorInfo;

if ($send) { ?>
	<script language="javascript" type="text/javascript">
		alert('Agradecemos sua mensagem. Entraremos em contato em breve.');
		window.location = 'index.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		window.location = 'index.html';
	</script>
<?php
}
?>