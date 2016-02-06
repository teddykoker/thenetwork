<?php
  /**
  * This file is just a test! TODO: merger with user.php with home
  * .php and index.php as
  * to not copy the same code.
  */

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
    $posts = [];

    foreach ($rows as $row) {

      $votes = Lib::query("SELECT * FROM votes WHERE post_id = ?", $row["id"]);
      $numberVotes = count($votes);

      $posts[] = [
        "name" => $user["username"],
        "date" => $row["date"],
        "text" => $row["text"],
        "votes" => $numberVotes
      ];

    }
    render("user.php", ["title" => $user["username"], "username"=> $user["username"], "posts" => $posts]);
  }

?>
