<?php

  // configuration
  require("../includes/config.php");

  $users = [];

  // look for user via id
  if(isset($_GET["id"]) && !empty($_GET["id"]))
  {
    $users = Lib::query("SELECT * FROM users WHERE id = ?", $_GET["id"]);
  }
  // look for user via name
  else if(isset($_GET["name"]) && !empty($_GET["name"]))
  {
    $users = Lib::query("SELECT * FROM users WHERE username = ?", $_GET["name"]);
  }

  if(count($users) == 0){
      alert("User not found", "danger");
  }
  else
  {
    $user = $users[0]; //first and only user

    $rows = Lib::query("SELECT * FROM posts WHERE user_id = ?", $user["id"]);
    $posts = formPosts($rows);

    render("user.php", ["title" => $user["username"], "username"=> $user["username"], "posts" => $posts]);
  }

?>
