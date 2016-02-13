<?php

// configuration
require("../includes/config.php");

if(isset($_POST["to"]) && !empty($_POST["to"]) && isset($_POST["message"]) && !empty($_POST["message"]))
{
  $result = Lib::query("INSERT INTO messages (to_user, from_user, message) VALUES(?, ?, ?)", $_POST["to"], $_POST["text"], $_SESSION["id"]);

  if ($result == 0) //INSERT fails
  {
    alert("Message failed", "danger");
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