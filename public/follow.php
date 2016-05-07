<?php

// configuration
require("../includes/config.php");

if(isset($_GET["id"]))
{
  $rows = Lib::query("SELECT * FROM followers WHERE user_id = ? AND topic_id = ?", $_SESSION["id"], $_GET["id"]);

  //if already followed, unfollow
  if( count($rows) > 0)
  {
    $result = Lib::query("DELETE FROM followers WHERE user_id = ? AND topic_id = ?", $_SESSION["id"], $_GET["id"]);
  }
  //else like it
  else
  {
   $result = Lib::query("INSERT IGNORE INTO followers (user_id, topic_id) VALUES (?, ?)", $_SESSION["id"], $_GET["id"]);
  }
}
redirect("/");
?>
