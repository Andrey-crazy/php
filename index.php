<html>
 <head>
	<meta charset="utf-8">
	<title> Тest PHP</title>
 </head>
 <body>
	<form action="action.php" method="post">
		<p>Выберите фигуру:<select size="1" name="figType">
		<option value="Triangle">Треугольник</option>
		<option value="Rectangle">Прямоугольник</option>	
		<option value="Circle">Круг</option>
	</select></p>
	<p>Введите значение 1(для всех фигур):<input type="text" name="lenValue">
	<p>Введите значение 2(только для прямоугольника):<input type="text" name="lenValue1">
	<input type="submit"></p>
	</form>
 </body>
</html>
