
<?php 

include_once  'functions.php';
include  'config.php';

mb_internal_encoding('utf-8');

$fields=[];
$errors=[];

switch(getenv('REQUEST_METHOD'))
{
	case 'GET':
		if(!empty($_GET['id']))
		{
			$id=str_replaсe(['..','/'],$_GET['id']);
			$filename=$config['data_dir'] . $id . '.json';
			$json=$config['data_dir'] . $id . '.json';
			$file=file_get_contents(($config['data_dir'] . $id . '.json'));
			$fields=json_decode($file,true);
			$_POST=$data;
			include 'admin-edit.php';
		}
		else
		{
			$files =glob($config['data_dir'] . '*.json');
			$data=[];
			foreach($files as $file)
			{
				$id=basename($file, '.json');	 //Возвращает имя файла из указанного пути
				$data[$id]=json_decode(file_get_contents($file),true);
			}
			include '/templates/admin-edit.php';
		}
		break;
	
	case 'POST' :
	if (!empty($_POST))
	{
		$name = isset($_POST['name']) ? trim($_POST['name']) : null;
		$lastname = isset($_POST['last_name']) ? trim($_POST['last_name']) : null;
		$email = isset($_POST['email']) ? trim($_POST['email']) : null;
		$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
		$topic = isset($_POST['tema']) ? trim($_POST['tema']) : null;
		$pay = isset($_POST['pay']) ? trim($_POST['pay']) : null;
		$agree =isset($_POST['agree']) ? trim($_POST['agree']) : null;
		foreach (['name', 'lastname', 'email', 'phone', 'tema','pay','agree'] as $key) 
		{
			if(empty($$key))
			{
				$error[$key] = true;
			}
		}
		$contents = '<?php' . "\n"   
				. 'return'
				. var_export([
					'name' => $name,
					'lastname' => $lastname,
					'email' => $email,
					'tema' => $topic, 
					'pay' => $pay,
					'agree' => $agree,
				], true);
		$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.json';
		file_put_contents("data\\".$filename, $contents);
		header('Location: header.php');
		include '/templates/admin-edit.php';
		exit;
	}
}
