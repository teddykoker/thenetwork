<?php

// configuration
require("../includes/config.php");

if(isset($_GET["id"]))
{
  $id = intval(base64_decode($_GET["id"]));

  // query database for user
  $rows = Lib::query("SELECT * FROM users WHERE id = ?", $id);

  // if we found user, check password
  if (count($rows) == 1)
  {
    // first (and only) row
    $row = $rows[0];

    //if user is already active
    if ($row["active"] == 1)
    {
      alert("Email is already active", "info");
    }
    else
    {
      Lib::query("UPDATE users SET active = 1 WHERE id = ?", $id);

      alert("Congratulations, your account is complete. You can now login", "success");
    }
  }
}


?>