<?php

// configuration
require("../includes/config.php");

if(isset($_POST["id"]))
{
  $rows = Lib::query("SELECT * FROM followers WHERE user_id = ? AND topic_id = ?", $_SESSION["id"], $_POST["id"]);

  //if already followed, unfollow
  if( count($rows) > 0)
  {
    $result = Lib::query("DELETE FROM followers WHERE user_id = ? AND topic_id = ?", $_SESSION["id"], $_POST["id"]);
  }
  //else follow it
  else
  {
   $result = Lib::query("INSERT IGNORE INTO followers (user_id, topic_id) VALUES (?, ?)", $_SESSION["id"], $_POST["id"]);
  }
}
?>
