<?php

// 배열 선언을 정석으로 하는 방법
$array1 = array(
  "apple" => "사과",
  "strawberry" => "딸기"
);

// 축약형으로 생성하는 방법
$array2 = ["apple"=>"사과", "strawberry" => "딸기"];

echo "\$array1 = ";
print_r($array1);
echo "<br>\$array2 = ";
print_r($array2);
