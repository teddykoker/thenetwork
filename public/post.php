<?php

// configuration
require("../includes/config.php");

if (isset($_POST["text"]))
{
  $result = Lib::query("INSERT INTO posts (text, user_id, topic_id) VALUES(?, ?, ?)", $_POST["text"], $_SESSION["id"], "0");

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