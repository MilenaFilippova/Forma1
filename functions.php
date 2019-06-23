<?php

	function array_get($array,$key,$default = null)
	{
		return $array[$key];
	}
	
	function e($value)
	{
		return htmlspecialchars($value);
	}
	
	
	function get_from_request($keys)
	{
		$data=[];
		foreach($keys as $key)
		{
			$data[$key]=trim(array_get(get_post(),$key,''));
		}
		return $data;
	}
	
	
	function save_json($path,$array)
	{
		return save_file($path,json_encode($array));
	}
	
	function save_file($path,$contents)
	{
		$dir = dirname($path);
		if (!file_exists($dir))
		{
			mkdir($dir,0777,true);
		}
		file_put_contents($path,$contents);
	}
	
	
	
	function check_error($fields)
	{
			
		//проверки имени
			if(!$fields['name'])
			{
				$errors['name'] = 'Не указано имя!';
			}
			
			//проверки фамилии
			if(!$fields['lastname'])
			{
				$errors['lastname'] = 'Не указана фамилия!' ;
			}
			
			//проверки телефона
			if(!$fields['phone'])
			{
				$errors['phone'] = 'Не указан телефон!' ;
			}
			else if(strlen($fields['phone'])<11)
			{
				$errors['phone'] = 'Неверно указан телефон!' ;
			}
			else if(!(ctype_digit($fields['phone'])))	//проверяет, являются ли все символы в строке phone цифровыми.
			{
				$errors['phone'] = 'Неверно указан телефон,вводите только цифры!' ;
			}
			
			/*if(!(substr($phone,0)=='8'))	//проверяет, чтобы телефон начинался на 8
			{
				$errors['phone'] = 'Неверно указан телефон !' ;
			}*/
			
			//проверки e-mail
			if(!$fields['email'])
			{
				$errors['email'] = 'Не указан e-mail!' ;
				
			}
			else if(strpos($email, '@'))
			{
				$errors['email'] ='Неправильный e-mail! ';
			}
			
			return $errors;
	}

	
	function chek_del($del,$id)
	{
		$filelist = glob("date/*.json");	//список всех файлов
		$flag = 0;
		foreach ($filelist as $filename) 
		{
			if(is_file("date/".$del[$filename]))
			{
				$flag++;
			}
		}
		if ($flag == 0)
		{
			return true;
		}
		return false;
	}
