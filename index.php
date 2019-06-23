<?php
mb_internal_encoding('utf-8');
include_once  'functions.php';
include_once   'header.php';
include   'config.php';


$errors=[];

switch(getenv('REQUEST_METHOD'))
{
	case 'GET':
		if(isset($_GET['success']))
		{
			include 'templates/answer.php';	//форма отправлена
			exit;
		}
		include 'templates/request.php' ;
		break;
	
	
	case 'POST' :
		if(!empty($_POST))
		{
			$fields=[
				'name' => trim(array_get($_POST,'name', '')),
				'lastname'=> trim(array_get($_POST,'lastname', '')),
				'age'=> trim(array_get($_POST,'age', '')),
				'city'=>trim(array_get($_POST,'city', '')),
				'phone'=> trim(array_get($_POST,'phone', '')),
				'email'=> trim(array_get($_POST,'email', '')),
				'tema'=> trim(array_get($_POST,'tema', '')),
				'pay'=> trim(array_get($_POST,'pay', '')),
				'agree'=> trim(array_get($_POST,'agree', '')),
				
			];
			
			$filename =date('Ymd_His') . '-' . rand(100,999) . '.json';	//даем уникальное имя файлам ,в которые будем сохранять
			$errors=check_error($fields);	//проверки введенных данных
			if($errors)//проверки окончены ,смотрим есть ли ошибки
			{		
					echo '<div class="errors">'.'ФОРМА НЕ ОТПРАВЛЕНА. ИСПРАВЬТЕ ОШИБКИ! </div>';
					include 'templates/request.php';
			}
			else
			{
				//массив заполненных данных
				
				$contents=json_encode([
					'name' =>$fields['name'],
					'lastname'=>$fields['lastname'],
					'age' =>$fields['age'],
					'city' => $fields['city'],
					'phone' => $fields['phone'],
					'email' => $fields['email'],
					'tema' => $fields['tema'],
					'pay' => $fields['pay'],
					'agree' => $fields['agree'],
					]);

				
				save_json($config['data_dir'] . $filename, $contents);
				file_put_contents('data/' . $filename, $contents);
				include 'templates/answer.php';	//форма отправлена
				exit;
				
			}
		}
}



?>
