<?php

// configuration
require("../includes/config.php");

if(isset($_POST["id"]))
{
  $rows = Lib::query("SELECT * FROM votes WHERE user_id = ? AND post_id = ?", $_SESSION["id"], $_POST["id"]);

  //if already liked, unlike
  if( count($rows) > 0)
  {
    $result = Lib::query("DELETE FROM votes WHERE user_id = ? AND post_id = ?", $_SESSION["id"], $_POST["id"]);
  }
  //else like it
  else
  {
   $result = Lib::query("INSERT IGNORE INTO votes (user_id, post_id) VALUES (?, ?)", $_SESSION["id"], $_POST["id"]);
  }
}

?>
