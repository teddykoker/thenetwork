<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  // if specific topic is requested
  if(isset($_GET["shortname"]) && !empty($_GET["shortname"]))
  {
    $topics = Lib::query("SELECT * FROM topics WHERE shortname = ?", $_GET["shortname"]);
    if(count($topics) == 0)
    {
      alert("This topic does not exist", "warning");
      exit;
    }
    $topic = $topics[0];
    $limit = 15;

    $userFollows = Lib::query("SELECT * FROM followers WHERE user_id = ? AND topic_id = ?", $_SESSION["id"], $topic["id"]);
    $followed = false;
    if(count($userFollows) == 1){
      $followed = true;
    }
    $counts = Lib::query("SELECT COUNT(*) AS count FROM posts WHERE topic_id = ?", $topic["id"]);
    $count = (int) $counts[0]["count"];

    $info = pageInfo($limit, $count);

    $rows = Lib::query("SELECT * FROM posts WHERE topic_id = ? ORDER BY id DESC LIMIT " . $info["start"] . ", " . $limit, $topic["id"]);
    $posts = formPosts($rows);

    render("topic.php", ["title" => $topic["name"],"topic" => $topic, "followed" => $followed, "posts" => $posts, "page" => $info["page"], "last" => $info["last"]]);
  }
  // else render main topics page
  else
  {
    $rows = Lib::query("SELECT * FROM topics");
    render("topics.php", ["title" => "Topics", "topics" => $rows]);
  }
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(empty($_POST["name"]))
  {
    alert("Please name your new topic.", "danger");
    exit;
  }
  if(empty($_POST["description"]))
  {
    alert("Please describe your new topic", "danger");
    exit;
  }
  $shortname = shortname($_POST["name"]);
  $rows = Lib::query("SELECT * FROM topics WHERE (name = ? OR shortname = ?)", $_POST["name"], $shortname);
  if (count($rows) != 0)
  {
    alert("This topic already exists.", "warning");
    exit;
  }
  $result = Lib::query("INSERT IGNORE INTO topics (name, shortname, description) VALUES(?, ?, ?)", $_POST["name"], $shortname, $_POST["description"]);
  if ($result == 0) //INSERT fails
  {
    alert("Something went wrong. Please try again later.", "danger");
    exit;
  }

  // TODO: redirect to "/topics.php?shortname=" + $shortname
  redirect("/topics.php?shortname=" . $shortname);

}
?>
