<?php
function alert($message, $redirect_to_href) {
    echo "
		<script>
			alert('$message');
			window.location.href='$redirect_to_href';
		</script>
		";
    exit();
}

if(!$sql_connection = mysqli_connect("localhost","root","","yunbooks"))
{
	die("錯誤: 資料庫連線失敗" . mysqli_connect_error());
}

function mysqli_query_assoc($sql_command)
{
	global $sql_connection;

	$result = mysqli_query($sql_connection, $sql_command);
	if(!is_bool($result) && mysqli_num_rows($result) > 0)
	{
		$res = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$res[] = $row;
		}

		return $res;
	}

	return false;
}

function is_logged_in()
{
	if(!empty($_SESSION['SES']) && is_array($_SESSION['SES'])){
		if(!empty($_SESSION['SES']['id']))
			return true;
	}

	$cookie = $_COOKIE['SES'] ?? null;
	if($cookie && strstr($cookie, ":")){
		$parts = explode(":", $cookie);
		$token_key = $parts[0];
		$token_value = $parts[1];

		$sql_command = "SELECT * FROM users WHERE token_key = '$token_key' limit 1";
		$row = mysqli_query_assoc($sql_command);
		if($row)
		{
			$row = $row[0];
			if($token_value == $row['token_value'])
			{
				$_SESSION['SES'] = $row;
				return true;
			}
		}
	}

	return false;
}

function header_to($destination) {
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . 'yunbooks/';

	header("Location: $base_url$destination");
}