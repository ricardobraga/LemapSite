<?php

$field_contact_name = $_POST['contact_name'];

$field_contact_email = $_POST['contact_email'];

$field_contact_cpf = $_POST['contact_cpf'];

$field_contact_telefone = $_POST['contact_telefone']

$field_contact_local = $_POST['contact_local']

$field_contact_produto = $_POST['contact_produto']

$field_contact_veiculo = $_POST['contact_veiculo']

                           
                            
$mail_to = 'douglas@282lemap.com.br';

$subject = 'NOVO PEDIDO NO SITE'.$field_first_name;

$body_message = 'From: '.$field_first_name."\n";

$body_message .= 'E-mail: '.$field_email."\n";

	

$headers = 'From: '.$field_email."\r\n";

$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);


if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		//alert('Thank you for the message. We will contact you shortly.');
		window.location = 'index.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		//alert('Message failed. Please, send an email to gordon@template-help.com');
		window.location = 'index.html';
	</script>
<?php
}
?>