<!doctype html>
<html>
     <head>
     </head>
     <body>
		<?php
			$ip = $_SERVER['REMOTE_ADDR'];
			echo "adres ip= ".$ip."<br>";
			$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
			$ipInfo = json_decode($ipInfo);
			if($ipInfo->status = "fail"){
				echo date_default_timezone_get();
			}else{
				$timezone = $ipInfo->timezone;
				date_default_timezone_set($timezone);
			}
			echo "<br>".date('Y/m/d H:i:s');
?>
     </body>
</html>

