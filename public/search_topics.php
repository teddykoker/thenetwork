<?php

// configuration
require("../includes/config.php");

if(isset($_GET["query"]) && !empty($_GET["query"]))
{
  $query = $_GET["query"].'%';
  $rows = Lib::query("SELECT name FROM topics WHERE name LIKE ?", $query);
  $results = [];
  foreach ($rows as $row) {
    $results[] = $row["name"];
  }
  header("Content-type: application/json");
  print json_encode($results);

}
?>
