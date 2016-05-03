<?php

  // configuration
  require("../includes/config.php");

  if (empty($_GET["topic"]))
  {
    $rows = Lib::query("SELECT * FROM posts");
    $posts = formPosts($rows);
    render("home.php", ["title" => "Home", "posts" => $posts]);
  }
  else
  {

  }

?>
