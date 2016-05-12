<?php

  // configuration
  require("../includes/config.php");

  $page = isset($_GET["page"]) && (intval($_GET["page"]) > 1) ? $_GET["page"] : 1;
  $start = ($page-1) * 10;

  $rows = Lib::query("SELECT * FROM posts ORDER BY id DESC LIMIT " . $start . ", 10");
  $posts = formPosts($rows);
  render("home.php", ["title" => "Home", "posts" => $posts]);

?>
