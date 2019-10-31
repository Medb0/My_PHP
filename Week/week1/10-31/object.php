<?php

/**
 *
 */
class Object_test
{
//변수 선언, 생성, 호출에 대한 간단한 코드
  public $name = "PHPstudy";
  public $year = 2019;

  public function phpStudy()
  {
    echo "변수 name은 {$this->name} 입니다. <br>";
    echo "변수 year은 {$this->year} 입니다. <br>";
    echo $this->name . $this->year . "<br>";
  }
}

$object = new Object_test();
$object->phpStudy();
