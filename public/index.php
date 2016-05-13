<?php

  // configuration
  require("../includes/config.php");

  $limit = 25;

  $followed = Lib::query("SELECT * FROM followers WHERE user_id = ?", $_SESSION["id"]);
  $followed = array_column($followed, "topic_id");
  $followed = implode(", " , $followed);

  $counts = Lib::query("SELECT COUNT(*) AS count FROM posts  WHERE topic_id IN (" . $followed . ")");
  $count = (int) $counts[0]["count"];

  $info = pageInfo($limit, $count);

  $rows = Lib::query("SELECT * FROM posts WHERE topic_id IN (" . $followed . ") ORDER BY id DESC LIMIT " . $info["start"] . ", " . $limit);
  $posts = formPosts($rows);

  render("home.php", ["title" => "Home", "posts" => $posts, "page" => $info["page"], "last" => $info["last"]]);

?>
