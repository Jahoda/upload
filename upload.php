<?php 

$data = str_replace("data:;base64,", "", urldecode($_POST['data']));
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);

// Uložení samostatné části pro případné sestavení, kdyby selhal upload
file_put_contents("data/" . $_POST['filename'] . ".part" . $_POST['chunk'], $data);

// Připsání do souboru
file_put_contents("data/" . $_POST['filename'], $data, FILE_APPEND);
