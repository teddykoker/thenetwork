<?php

    // configuration
    require("../includes/config.php");

    $rows = Lib::query("SELECT * FROM posts");
    $posts = [];

    foreach ($rows as $row) {
        $users = Lib::query("SELECT * FROM users WHERE id = ?", $row["user_id"]);
        $user = $users[0]; //first and only user

        $votes = Lib::query("SELECT * FROM votes WHERE post_id = ?", $row["id"]);
        $numberLikes = count($votes);

        $userVotes = Lib::query("SELECT * FROM votes WHERE post_id = ? AND user_id = ?", $row["id"], $_SESSION["id"]);
        $liked = false;
        if(count($userVotes) == 1){
            $liked = true;
        }


        $posts[] = [
            "id" => $row["id"],
            "user" => $user,
            "date" => $row["date"],
            "text" => $row["text"],
            "likes" => $numberLikes,
            "liked" => $liked
        ];

    }

    render("home.php", ["title" => "Home", "posts" => $posts]);

?>
