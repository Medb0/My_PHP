<?php

$filename = $_GET['file'];  // GET으로 받은 파일명을 넣어준다.

$filepath = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$filename;  // 서버에 저장된 파일 경로를 넣어준다.


/*
is_file() 함수의 경우 파일의 확인이 가능하고 디렉토리를 확인할 경우 무조건 false 반환
file_exists() 함수를 사용해서 해당 파일이 존재하는지의 여부를 체크한다.
file_exists() 함수는 파일 및 경로의 유무를 확인 후 불리언으로 반환한다.
*/
if(!is_file($filepath) || !file_exists($filepath)){
  echo "파일이 존재하지 않습니다.";
  exit;
}

// 브라우저 체크
if(preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])){
  header("contant-type: doesn/matter");
  header("contant-length: ".filesize('$filepath'));
  header("content-disposition: attachment; filename=\"$filename\"");
  header("content-transfer-encoding: binary");
}else{
  header("contant-type: file/unknown");
  header("contant-length: ".filesize('$filepath'));
  header("content-disposition: attachment; filename=\"$filename\"");
  header("content-transfer-encoding: php generated data");
}

header("pragma: no-cache");
header("expires: 0");

// fopen() 함수는 외부 파일을 열어주는 역할을 한다. 열고 싶은 파일의 경로와 파일 모드 설정 내용을 인자로 받음, 파일 모드는 반드시 설정해야만 한다.
$fp = fopen($filepath, 'rb');

// feof() 함수는 파일 포인터를 읽어 들인 위치가 끝인지 아닌지를 체크하는 함수이다. while문을 사용해서 파일이 끝이 아니라면 계속 반복한다.
while (!feof($fp)) {

  // fread() 함수는 파일의 처음부터 끝까지 지정한 크기만큼 읽어 들이는 함수이다. 여기에서 echo는 읽어 들인 파일의 전송을 의미한다.
  echo fread($fp, 100*1024);
}

// fopen() 함수로 파일을 영어서 사용한 다음에는 반드시 fclose() 함수로 파일을 닫아주어야 한다. 전송이 완료되면 파일을 닫는다.
fclose($fp);
