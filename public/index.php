<?php

  // configuration
  require("../includes/config.php");

  $rows = Lib::query("SELECT * FROM posts");
  $posts = formPosts($rows);
  render("home.php", ["title" => "Home", "posts" => $posts]);

?>
