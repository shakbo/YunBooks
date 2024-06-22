<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

$sql_connection = require_once(ROOT . 'app/config/database.php');

if (isset($_GET["id"])) {
  $sql_command = "DELETE FROM users WHERE id=" . $_GET["id"];
  mysqli_query($sql_connection, $sql_command);

  echo "
		<script>
			window.location.href='../../../../index.php?controller=admin&page=accounts';
		</script>
		";
  exit();
}
