<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  $rows = Lib::query("SELECT * FROM topics");
  render("topics.php", ["title" => "Topics", "topics" => $rows]);

}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["name"]))
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

  // TODO: redirect to "/index.php?topic=" + $shortname
  redirect("/");

}
?>
