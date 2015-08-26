<?php
	interface figureMethods {
		public function draw();
		public function move();
		public function scaling();
		public function calcArea();
	}
	abstract class figure implements figureMethods {
		protected $coorX,$coorY;
		abstract public function draw();
		abstract public function move();
		abstract public function scaling();
		abstract public function calcArea();
	}
	class Triangle extends figure {
		public function draw()	{
			list($coorX, $coorY, $lenValue) = func_get_args();
			header('Content-type: image/png');
			$im = imagecreatetruecolor($lenValue, $lenValue);
			$triArr = [ $coorX, $coorY,
						 ($coorX + $lenValue), $coorY,
						 (($coorX + $lenValue)/2), ($coorY + $lenValue)];
			$bg   = imagecolorallocate($im, 255, 255, 255);
			$blue = imagecolorallocate($im, 0, 0, 255);
			imagefilledrectangle($im, 0, 0, $lenValue - 1, $lenValue - 1, $bg);
			imagefilledpolygon($im, $triArr, 3, $blue);
			imagepng($im);
			imagedestroy($im);
		}
		public function move() {}
		public function scaling() {}
		public function calcArea() {
			$lenValue = func_get_args();
			$area = 0;
			$area = (($lenValue * 3) / 2) * (($lenValue) / (2 * sqrt(3)));
			return $area;
		}
	}
	class Rectangle extends figure {
		public function draw()	{
			list($coorX, $coorY, $lenValue, $lenValue1) = func_get_args();
			header('Content-type: image/png');
			$im = imagecreatetruecolor($lenValue, $lenValue1);
			$bg = imagecolorallocate($im, 0, 0, 255);
			imagefilledrectangle($im, 0, 0, $lenValue - 1, $lenValue1 - 1, $bg);
			imagepng($im);
			imagedestroy($im);
		}
		public function move() {}	
		public function scaling() {}
		public function calcArea() {
			list($lenValue, $lenValue1) = func_get_args();
			$area = $lenValue * $lenValue1;
			return $area;
		}	
	}		
	class Circle extends figure {
		public function draw() {	
			list($coorX, $coorY, $lenValue) = func_get_args();
			header('Content-type: image/png');
			$im = imagecreatetruecolor($lenValue, $lenValue);
			$bg = imagecolorallocate($im, 0, 0, 255);
			imageellipse($im,$coorX,$coorY,$lenValue,$lenValue,$bg);
			imagepng($im);
			imagedestroy($im);
		}	
		public function move() {}	
		public function scaling() {}
		public function calcArea() {
			$lenValue = func_get_args();
			$area = pow($lenValue, 2) * M_PI;
			return $area;
		}
	}		
	if ($_POST['figType'] == "Triangle") {
		$newFig = new Triangle;
		$newFig->draw(0, 0, (int)($_POST['lenValue']));
		echo $newFig->calcArea($_POST['lenValue']);
	}
	if ($_POST['figType'] == "Rectangle") {
		$newFig = new Rectangle;
		$newFig->draw(0, 0, (int)($_POST['lenValue']), (int)($_POST['lenValue1']));
		echo $newFig->calcArea((int)($_POST['lenValue']),(int)($_POST['lenValue1']));
	}
	if ($_POST['figType'] == "Circle") {
		$newFig = new Circle;
		$newFig->draw(0, 0, (int)($_POST['lenValue']));
		echo $newFig->calcArea((int)($_POST['lenValue']));
	}
?>
