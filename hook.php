<?php
$hook = shell_exec("git pull -u origin master 2>&1");

$user = exec('whoami');
echo '<pre>';
print_r("PHP User: ".$user."\r\n\r\n");
print_r($hook);
echo '</pre>';