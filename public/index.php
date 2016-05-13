<?php

  // configuration
  require("../includes/config.php");

  $limit = 1;

  $counts = Lib::query("SELECT COUNT(*) AS count FROM posts");
  $count = (int) $counts[0]["count"];

  $info = pageInfo($limit, $count);

  $rows = Lib::query("SELECT * FROM posts ORDER BY id DESC LIMIT " . $info["start"] . ", " . $limit);
  $posts = formPosts($rows);

  render("home.php", ["title" => "Home", "posts" => $posts, "page" => $info["page"], "last" => $info["last"]]);

?>
