<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
</head>
<body>
	<?php 
	mb_internal_encoding('utf-8');
	error_reporting(0);
	include "functions.php";
	if(empty($_POST['yesdel'])){ 
		echo ("вы ничего не выбрали"); 
	} 
	else
	{ 
		$del=$_POST['yesdel']; 
		$j=count($del); 
		echo "<p>Файлы: </p>";
		for ($i=0;$i<$j;$i++)
		{ 
			if(!empty($del[$i])) 
			{
				if (substr($del[$i], -4) == "json")
				{
					echo ($del[$i]." : удаление...\n"."<br>"); 
					unlink("data/".$del[$i]);
				}
				else
				{
					echo ($del[$i]." : этот файл не может быть удалён\n"."<br>");
				}
			}
		} 
		
		if (chek_del($del,$id))
		{
	 		echo "<p><b>Выбранные файлы удалены!</b></p>";
	 	}
		else
		{
			echo "<p><b>Не удалось удалить эти файлы!</b></p>";
		}
	}
?>

<form action="admin.php">
	<p><input type="submit" value="Вернуться к файлам"></p>
</form>
</body>
</html>
