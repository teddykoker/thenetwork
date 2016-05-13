<?php

// configuration
require("../includes/config.php");

if (isset($_POST["text"]) && !empty($_POST["topic"]))
{
  $result = Lib::query("INSERT INTO posts (text, user_id, topic_id) VALUES(?, ?, ?)", $_POST["text"], $_SESSION["id"], $_POST["topic"]);

  if ($result == 0) //INSERT fails
  {
    alert("Post failed", "danger");
    exit;
  }

  $topics = Lib::query("SELECT * FROM topics WHERE id = ?", $_POST["topic"]);
  $topic = $topics[0];
  redirect("/topics.php?shortname=" . $topic["shortname"]);

}
else
{
  redirect("/");
}

?>