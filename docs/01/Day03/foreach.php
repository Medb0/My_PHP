<?php

$fulits = [
  "apple" => "사과",
  "banana" => "바나나",
  "strawberry" => "딸기"
];

echo "값만 사용 <br>";
foreach ($fulits as $fulit) {
  echo "{$fulit}<br>";
}

echo "키와 값 모두 사용<br>";
foreach ($fulits as $eng => $kor) {
  echo "{$eng} => {$kor}<br>";
}
