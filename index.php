<?
// ----------------------------------------------------------
// 아웃카운터
// ----------------------------------------------------------
$install_dir = "mall/"; //가가몰이 설치된 폴더 (끝에 / 필수)

include $install_dir."func_ini.php";
session_start();
include $install_dir."session.php";
include $install_dir."func_security.php";

// 로그인 접속 경로를 알기 위해서
$morning_sreferer = getenv("HTTP_REFERER");
$_SESSION['morning_sess_referer'] = $morning_sreferer;

include $install_dir."counter.php";

$Qs=$_SERVER["QUERY_STRING"];
$Qs=(strlen($Qs)>0)? "?".$Qs:"";

Header( "HTTP/1.1 301 Moved Permanently" ); 
// ----------------------------------------------------------
// 모바일접속
// ----------------------------------------------------------
if ( preg_match('/iPhone|Android/',$_SERVER['HTTP_USER_AGENT'])) { 
	if($Qs){
		$Qs .= "&ps_mobile=on";
	}else{
		$Qs .= "?ps_mobile=on";
	}
}

Header( "Location:".$install_dir."index.php".$Qs ); 
exit;
?>