<?php
$length = 4;
$width = 3;

$area = $length * $width;
echo  "Area = ".$area ."<br>";

 $rectangle = 2*($length + $width);
 echo "Rectangle = ".$rectangle ."<br>";

 //2

 $amount = 589;
 $vat = ($amount * 15)/100;
 echo "VAT = ".$vat ."<br>";

 //3

 $number1 = 3;
if($number1 %2==0)
{
    echo $number1." is EVEN" ."<br>";
}
else
{
    echo $number1." is ODD" ."<br>";
}

$number2 = 4;
if($number2 %2==0)
{
    echo $number2." is EVEN" ."<br>";
}
else
{
    echo $number2." is ODD" ."<br>";
}

//4
$num1 = 73;
$num2 = 135;
$num3 = 43;

if($num1 > $num2)
{
    if($num1 > $num3)
    {
        echo $num1." is largest" ."<br>";
    }
    else
    {
        echo $num3." is largest" ."<br>";
    }
}
else if($num2 > $num1)
{
    if($num2 > $num3)
    {
        echo $num2." is largest" ."<br>";
    }
    else
    {
        echo $num3." is largest" ."<br>";
    }
}

//5

for($i = 10; $i <100; $i++)
{
    if($i%2 != 0)
    {
        echo $i." ";
    }
}
echo "<br>";

//6

$num = 6;
$numbers = [65, 34, 6, 45, 89];
for($i = 0; $i < 5; $i++)
{
    if($numbers[$i]==$num)
    {
        echo $num." is found in ".$i." index";
    }
}
echo "<br>";

//7
for($ver=1;$ver<=3;$ver++)
{
   for ($hor=1;$hor<=$ver;$hor++)
    {
	 echo "*";
	    if($hor< $ver)
		 {
		   echo " ";
		 }
     }
 echo "<br>";
}

for($ver=3;$ver>=1;$ver--)
{
   for ($hor=$ver;$hor>=1;$hor--)
    {
	 echo $hor;
	    if($hor> $ver)
		 {
		   echo " ";
		 }
     }
 echo "<br>";
}

/*for($ver=1;$ver<=3;$ver++)
{
   for ($hor=1;$hor<=$ver;$hor++)
    {
	 echo "";
     
	    if($hor< $ver)
		 {
		   echo " ";
		 }
     }
 echo "<br>";
}
*/
//8
$array2 = [
            [1,2, 3, 'A'],
            [1, 2, 'B', 'C'],
            [1, 'D', 'E', 'F'],
          ];
echo $array2[1][2];