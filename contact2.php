<?php

$url = 'https://api.sendgrid.com/';
$user = 'ricardobraga';
$pass = 'r33562023';

$field_contact_name = $_POST['contact_name'];

$field_contact_email = $_POST['contact_email'];

$field_contact_cpf = $_POST['contact_cpf'];

$field_contact_telefone = $_POST['contact_telefone']

$field_contact_local = $_POST['contact_local']

$field_contact_produto = $_POST['contact_produto']

$field_contact_veiculo = $_POST['contact_veiculo']

                           
                            
$mail_to = 'douglas@282lemap.com.br';

$subject = 'NOVO PEDIDO NO SITE';

$body_message = 'De: '.$field_contact_name."\n";

$body_message .= 'Email: '.$field_contact_email."\n";

$body_message .= 'CPF/CNPJ: ' .$field_contact_cpf."\n";

$body_message .= 'Telefone/Celular: ' .$field_contact_telefone."\n";

$body_message .= 'Local de entrega: ' .$field_contact_local."\n";

$body_message .= 'Produto: ' .$field_contact_produto."\n";

$body_message .= 'Modelo veículo: ' .$field_contact_veiculo."\n";

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => $mail_to,
    'subject'   => $subject,
    'text'      => $body_message,
    'from'      => $field_contact_email,
  );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
//print_r($response);

?>