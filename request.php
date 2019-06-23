
<form action='/' method="POST" >
	<!--со звкздочкой обязательные поля-->
	<label> Имя*</label>
	<br>
	<input type="text" name ="name" value="<?= e(array_get($_POST,'name'))?>">
	<span><?=array_get($errors, 'name')?></span>
	<br>
	
	
	<label> Фамилия: *</label>
	<br>
	<input type="text" name ="lastname" value="<?= e(array_get($_POST,'lastname')) ?>">
	<span><?=array_get($errors, 'lastname')?></span>
	<br>
	
	<label> Возраст: </label>
	<br>
	<input type="text" name ="age" value="<?=e(array_get($_POST,'age'))?>">
	<br>
	
	<label> E-mail:* </label>
	<br>
	<input type="text" name ="email" value="<?=e(array_get($_POST,'email'))?>">
	<span><?=array_get($errors, 'email')?></span>
	<br>
	
	<label> Город </label>
	<br>
	<select name="city">
		<option value="irk">Иркутск</option>
		<option value="ang">Ангарск</option>
		<option value="she">Шелехов</option>
		<option value="bra">Братск</option>
		<option value="msk">Москва</option>
		<option value="eka">Екатиренбург</option>
	</select> 
	<br>
	
	<br>
	<label> Телефон: </label>
	<br>
	<input type="text" name ="phone" value="<?=e(array_get($_POST,'phone'))?>">
	<span><?=array_get($errors, 'phone')?></span>
	<br>
	<br>
	<label> Тематика конференции: </label>
	<br>
		<select name="tema"> 
			<optgroup label="Тема"> 
				<option value="bus" name="bus">Бизнес</option> 
				<option value="tex" name="tex">Технологии</option>
				<option value="RM" name="RM">Реклама и Маркетинг</option>
			</optgroup> 
		</select>
	<br>
	<br>
	<label> Предпочитаемый метод оплаты участия: </label>
	<br>
	<select name="pay"> 
		<optgroup label="Оплата"> 
			<option value="WM" name="W">WebMoney</option> 
				<option value="YM" name="ya">Yandex.money</option>
				<option value="PP" name="PP">PayPal</option>
				<option value="CC" name="cc">Credit card</option>
		</optgroup> 
	</select>
	<br>
	<br>
	<label> Хотите получать рассылку о конференции? </label>
	<!--<input type="checkbox" name="jel"></p>-->
	<br>
	<select name="agree"> 
		<optgroup label="Согласие"> 
			<option value="yes" name="yes">Да</option> 
			<option value="no" name="no">Нет</option>
		</optgroup> 
	</select>
	<br>
	<br>
	
	
	
	<button type="submit">Отправить</button>
	<br>
</form>

<form action="admin.php">
		<p><input type="submit" value="Админ"></p>
</form>
