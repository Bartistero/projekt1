<!doctype html>
<html>
     <head>
     </head>
     <body>
		<?php
			//Pozostawiene logów -> zapis do pliku
			$log_dir ='/tmp/';
			$file= @fopen($log_dir.'/nowe_logi.log','a'); 
			@flock($file, 2);
			$string = "Bartosz Sterniczuk port=80";
			
			@fwrite($file, $string."\n");
			@flock($file, 3); 
			@fclose($file);

			//Pobranie adresu IP odwiedzającego
			$ip = $_SERVER['REMOTE_ADDR'];
			
			//Wypisanie adresu IP
			echo "adres ip= ".$ip."<br>";
			
			//Wykorzystanie zewnętrznego API po JSON ;)
			$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
			
			//Konwersja JSON 
			$ipInfo = json_decode($ipInfo);
			
			//Sprawdzenie czy status nie jest fail, zabezpieczenie na wypadek localhost
			if($ipInfo->status = "fail"){
				//ustawienie strefy czasowej serwera, gdy jest to localhost
				echo date_default_timezone_get();
			}else{
				//Ustawienie strefy czasowej 
				$timezone = $ipInfo->timezone;
				date_default_timezone_set($timezone);
			}
			//Wydrukowanie strefy czasowej i czsu
			echo "<br>".date('Y/m/d H:i:s');
		?>
    </body>
</html>
