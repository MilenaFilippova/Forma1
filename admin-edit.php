<?php include_once  'functions.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title> 
	<meta charset ="utf-8">
	<meta name="robots" content ="noindex,nofollow">
	
</head>
<body>
	<header>
		<table border=1>	
			<thead>
				<tr>
					<th>file</th>
					<th>name</th>
					<th>lastname</th>
					<th>phone</th>
					<th>age</th>
					<th>city</th>
					<th>tema</th>
					<th>pay</th>
					<th>agree</th>
					<th>delite</th>
				</tr>
			</thead>
			<tbody>
			<form action="admindel.php" method="POST">
				<?php foreach ($data as $filename=>$fields): ?>
					<tr>
							<td><? echo ($filename.'.json')?></td>
							<td><? echo e($fields['name']) ?></td>
							<td><? echo e($fields['lastname']) ?></td>
							<td><? echo e($fields['phone']) ?></td>
							<td><? echo e($fields['age'])?></td>
							<td><? echo e($fields['city']) ?></td>
							<td><? echo e($fields['tema']) ?></td>
							<td><? echo e($fields['pay']) ?></td>
							<td><? echo e($fields['agree']) ?></td>
							<td><?php echo ("<input type='checkbox' name='yesdel[]' value=".$filename.".json".">". "del")?></td>
						</tr>
				<?php endforeach;?>
			</tbody>
			</table>
			<p><input type="submit" value="Удалить данные"></p> 

		</form>  

	<p><a href="/index.php">Вернутся к форме для заполнения</a></p>

</body>
<html> 
