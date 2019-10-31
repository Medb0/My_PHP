<?php

define("CONSTANT_BOOL",true);
define("CONSTANT_INT",1);
define("CONSTANT_FLOAT",3.14);
define("CONSTANT_STRING","문자열도 가능");
const OTHER = "상수 선언 방법에는 define() , const로 가능하다.";

echo "CONSTANT_BOOL : ". CONSTANT_BOOL."<br>";
echo "CONSTANT_BOOL : ". CONSTANT_INT."<br>";
echo "CONSTANT_BOOL : ". CONSTANT_FLOAT."<br>";
echo "CONSTANT_BOOL : ". CONSTANT_STRING."<br>";
echo OTHER."<br>";
echo "상수는 선언할때 정해진 값을 변경할 수 없음";
