<?php

// configuration
require("../includes/config.php");

if (isset($_POST["text"]) && !empty($_POST["topic"]))
{
  $result = Lib::query("INSERT INTO posts (text, user_id, topic_id) VALUES(?, ?, ?)", $_POST["text"], $_SESSION["id"], $_POST["topic"]);

  if ($result == 0) //INSERT fails
  {
    alert("Post failed", "danger");
  }
  else
  {
    redirect("/");
  }
}
else
{
  redirect("/");
}

?>