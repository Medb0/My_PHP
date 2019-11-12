<?php

//설정 시작
$upload_dir = './uploads';
$allowed_ext = array('jpg','jpeg','png','gif');
$field_name = 'myfile';

// uploads 디렉토리가 없다면 생성
if(!is_dir($upload_dir)){
    if(!mkdir($upload_dir,0777))
    {
      die("업로드 드렉토리 생성에 실패 했습니다.");
    };
}

if(!isset($_FILES[$field_name]))
{
  die("업로드된 파일이 없습니다.");
}

// 변수 정리
$error = $_FILES[$field_name]['error'];
$name = $_FILES[$field_name]['name'];

// 오류 확인
if($error != UPLOAD_ERR_OK){
  switch ($error) {
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
      echo "파일이 너무 큽니다. ($error)";
      break;
    case UPLOAD_ERR_PARTIAL:
      echo "파일이 부분적으로 첨부되었습니다. ($error)";
      break;
    case UPLOAD_ERR_NO_FILE:
      echo "파일이 첨부되지 않았습니다. ($error)";
      break;
    case UPLOAD_ERR_NO_TMP_DIR:
      echo "임시파일을 지정할 디렉토리가 없습니다. ($error)";
      break;
    case UPLOAD_ERR_CANT_WRITE:
      echo "임시파일을 생성할 수 없습니다.($error)";
      break;
    case UPLOAD_ERR_EXTENSION:
      echo "업로드 불가능한 파일이 첨부 되었습니다.($error)";
      break;
    default:
      echo "파일이 제대로 업로드되지 않았습니다.($error)";
  }
  exit;
}

$upload_file = $upload_dir.'/'.$name;   // 저장될 디렉토리 및 파일명
$fileinfo = pathinfo($upload_file);   // 첨부파일의 정보를 가져옴
$ext = strtolower($fileinfo['extension']);

$i = 1;

while (is_file($upload_file))
{
  $name = $fileinfo['filename']."-{$i}.".$fileinfo['extension'];
  $upload_file = $upload_dir.'/'.$name;
  $i++;
}

if(!in_array($ext,$allowed_ext))  // 확장자 확인
{
  echo "허용되지 않는 확장자 입니다.";
  exit;
}

if(!move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_file))  // 파일 이동
{
  echo "파일이 업로드 되지 않았습니다.";
  exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>File Upload</title>
  </head>
  <body>
    <h1>File Upload Example</h1>
      <h2>파일 정보</h2>
      <ul>
        <li>파일명: <?php echo $name; ?></li>
        <li>확장자명: <?php echo $ext; ?></li>
        <li>파일형식: <?php echo $_FILES[$field_name]['size']; ?></li>
        <li>파일크기: <?php echo number_format($_FILES [$field_name]['size']); ?> 바이트</li>
      </ul>
      <a href="./file_download.php?file=<?php echo $name; ?>">다운로드</a>
  </body>
</html>
