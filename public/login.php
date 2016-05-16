<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  // if user is already logged in
  if(!empty($_SESSION["id"]))
  {
    // redirect to home
    redirect("/");
  }
  else
  {
    // else render form
    render("login_form.php", ["title" => "Log In"]);
  }
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  // validate submission
  if (empty($_POST["username"]))
  {
    echo("Please enter a username.");
    exit;
  }
  if (empty($_POST["password"]))
  {
    echo("Please enter a password.");
    exit;
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
      echo("Please verify your email first. Didn't get an email? <a class='alert-link' href='/resend.php?username=" . $row["username"] . "'> Resend it!</a");
    }
    // compare hash of user's input against hash that's in database
    elseif (password_verify($_POST["password"], $row["hash"]))
    {
      // remember that user's now logged in by storing user's ID in session
      $_SESSION["id"] = $row["id"];

      // redirect to home
      echo("OK");
    }
    //password wrong
    else
    {
      echo("Incorrect username or password.");
    }
  }
  //no user exists under name
  else
  {
   echo("Incorrect username or password.");
  }
}

?>