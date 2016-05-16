<?php

    // configuration
require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
        // else render form
  render("register_form.php", ["title" => "Register"]);
}

    // else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if($_POST["username"] == "")
  {
    echo("Please enter a username.");
  }
  if(preg_match("/^[a-zA-Z0-9_]{1,20}$/", $_POST["username"]) == 0)
  {
    echo("Usernames must have a max of 20 characters and only contain letters, numbers, and underscores.");
  }
  else if($_POST["email"] == "")
  {
    echo("Please enter an email.");
  }
  else if($_POST["password"] == "")
  {
    echo("Please enter a password.";
  }
  else if($_POST["confirm"] != $_POST["password"])
  {
    echo("Passwords do not match.");
  }
  else //valid input
  {
    $rows = Lib::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
    if (count($rows) != 0)
    {
      echo("Username already exits.");
      exit;
    }

    $rows = Lib::query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
    if (count($rows) != 0)
    {
      echo("An account already exists with this email.");
      exit;
    }
    $token = md5(uniqid(rand(), true));

    $message = '<html><head><title>Email Verification</title></head><body>';
    $message .= '<p>Welcome to The Network. <a href="http://'."localhost".'/activate.php?token=' . $token . '">Click here to activate your account</a>.</p>';
    $message .= '<p><i>If you do not know what this email is for just ignore it.</i></p>';
    $message .= "</body></html>";


    $sent = lib::sendEmail($_POST["email"],"The Network Verification",$message);
    if($sent === true)
    {
      //registration complete
      Lib::query("INSERT IGNORE INTO users (username, hash, email, token) VALUES(?, ?, ?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"], $token);
      echo("OK");
    }
    else
    {
      echo("Verification email could not be sent. Please double check your email and try again.");
    }
  }
}

?>