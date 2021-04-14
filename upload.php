<?php
$data['result'] = "N";

$record=fopen('text.txt','a+');
fputs($record,$_POST['text']."\r\n");
fclose($record);

if (!empty($_FILES['file']['tmp_name'])) { 
	$path = $_SERVER['DOCUMENT_ROOT']."/uploads/".$_FILES['file']['name']; 

	if (copy($_FILES['file']['tmp_name'], $path)){ 
		$file_name = $_FILES['file']['name'];
        $data['result'] = "Y";
	}
}

echo json_encode($data);
?>