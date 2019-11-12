<?php

/**
 *
 */
class StaticTest
{

  public static $gun = "static으로 선언된 변수입니다.<br>";

  public static function shoot()
  {
    $gun = "static으로 선언된 메소드입니다.<br>";
    echo $gun;
  }
}

echo StaticTest::$gun;
StaticTest::shoot();
