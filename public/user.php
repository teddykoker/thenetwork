<?php
		/**
		* This file is just a test! TODO: merger with user.php with home.php and index.php as
		* to not copy the same code.
		*/

		// configuration
		require("../includes/config.php");

		if(isset($_GET["id"]) && !empty($_GET["id"]))
		{
				$rows = Lib::query("SELECT * FROM posts WHERE user_id = ?", $_GET["id"]);
				$posts = [];

				$users = Lib::query("SELECT * FROM users WHERE id = ?", $_GET["id"]);
				$user = $users[0]; //first and only user

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
		else
		{
				redirect("/");
		}

?>
