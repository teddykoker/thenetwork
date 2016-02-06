<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  // else render form
  render("login_form.php", ["title" => "Log In"]);
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  // validate submission
  if (empty($_POST["username"]))
  {
    alert("Please enter a username.", "danger");
  }
  else if (empty($_POST["password"]))
  {
    alert("Please enter a password.", "danger");
  }

  // query database for user
  $rows = Lib::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

  // if we found user, check password
  if (count($rows) == 1)
  {
    // first (and only) row
    $row = $rows[0];
    if ($row["active"] == 0)
    {
      alert("Please verify your email first.", "warning");
    }
    // compare hash of user's input against hash that's in database
    elseif (password_verify($_POST["password"], $row["hash"]))
    {
      // remember that user's now logged in by storing user's ID in session
      $_SESSION["id"] = $row["id"];

      // redirect to home
      redirect("/");
    }
    //password wrong
    else
    {
      alert("Incorrect username or password.", "danger");
    }
  }
  //no user exists under name
  else
  {
   alert("Incorrect username or password.", "danger");
  }
}

?>