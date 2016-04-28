<?php

// configuration
require("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  render("topics.php", ["title"] => "Topics");
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && !empty($_POST["name"]))
{
  $shortname = shortname($_POST["name"])
  $rows = Lib::query("SELECT * FROM topics WHERE (name = ? OR shortname = ?)", $_POST["name"], $shortname);
  if (count($rows) != 0)
  {
    alert("This topic already exists.", "warning");
    exit;
  }
  $result = Lib::query("INSERT IGNORE INTO topics (name, shortname) VALUES(?, ?)", $_POST["name"], $shortname);
  if ($result == 0) //INSERT fails
  {
    alert("Something went wrong. Please try again later.", "danger");
    exit;
  }

  // TODO: redirect to "/index.php?topic=" + $shortname
  redirect("/")


}
?>
