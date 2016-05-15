<?php

// configuration
require("../includes/config.php");

if(isset($_GET["token"]))
{

  // query database for user
  $rows = Lib::query("SELECT * FROM users WHERE token = ?", $_GET["token"]);

  // if we found user, check password
  if (count($rows) >= 1)
  {

    Lib::query("UPDATE users SET active = 1, token = NULL WHERE token = ?", $_GET["token"]);

    alert("Congratulations, your account is complete. You can now login", "success");
  }
}
alert("Link is no longer valid.", "info");

?>