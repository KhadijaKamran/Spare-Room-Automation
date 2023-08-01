<?php include "../validate_session.php" ?>

<?php
$conn = new mysqli("localhost","root","","nyphonenet");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>