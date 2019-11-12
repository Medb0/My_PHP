<?php

namespace Day03\GnuStudy;

class Student
{
  protected $_name;

  function __construct($_name)
  {
    $this->_name = $_name;
  }

  public function name()
  {
    return $this->_name;
  }
}


namespace Day03\PhpStudy;

class Student
{
  protected $_name;

  public function __construct($_name)
  {
    $this->_name = $_name;
  }

  public function name()
  {
    return $this->_name;
  }
}

$gnuWiz = new \Day03\GnuStudy\Student("Gnu");
echo $gnuWiz->name()."<br>";

$phpStudy = new \Day03\PhpStudy\Student("PHP");
echo $phpStudy->name()."<br>";
