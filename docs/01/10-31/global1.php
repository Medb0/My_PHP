<?php

$red = "red";
$blue = "blue";

function echoColor()
{

  echo $red;

  global $blue;
  echo $blue;
}
echo "변수는 사용 가능한 유효범위가 있다. 변수의 유효범위는 지역변수로 제한되므로<br>";
echo "함수 밖에서 정의된 변수는 함수 안에서는 사용할 수 없다.<br>";
echo echoColor();
