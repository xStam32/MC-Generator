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
$text = file_get_contents('gene.txt');
$textArray = explode("\n", $text);
$randArrayIndexNum = array_rand($textArray);
$randPhrase = $textArray[$randArrayIndexNum];
          $captcha=$_POST['g-recaptcha-response'];
if(!isset($captcha))
{
echo '<center><h2>Please check the the captcha form.</h2></center>';
$url='http://likeyflaky.net/index.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
exit;
        }
 if(!$captcha){
          echo '<center><h2>Please check the the captcha form.</h2></center>';
$url='http://likeyflaky.net/index.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lem8hITAAAAAEXWvdidfpGlarRwPiYjuOZsHGRl&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
?>
<div class="container">
  <form action="genemc.php" method="post">
<center><h1><?php echo $randPhrase; ?></h1></center>
<center><h4>Click Get Account</h4></center>
<center><input type="submit" class="btn btn-success" value="Get account"></center><br>
<center><div class="g-recaptcha" data-sitekey="6Lem8hITAAAAAL8XyM7yxQFfIrmxQB0P_cNRXCLF"></div></center>
<center><b><h3><kbd>Total users in database: 503</kbd><h3></b></center>
<center><b><h5><code>Want check that account: <a href="http://likeyflaky.net/checker.html" target="_blank">Click</a></code></b></h5>
  </form>
<?php } ?>
</div>
<p style="font-size: 5cm;">Built by xStam</p>
</body>
</html>
