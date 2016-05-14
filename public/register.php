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
    alert("Please enter a username.", "danger");
  }
  else if($_POST["email"] == "")
  {
    alert("Please enter an email.", "danger");
  }
  else if($_POST["password"] == "")
  {
    alert("Please enter a password.", "danger");
  }
  else if($_POST["confirm"] != $_POST["password"])
  {
    alert("Passwords do not match.", "danger");
  }
    else //valid input
  {
    $rows = Lib::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
    if (count($rows) != 0)
    {
      alert("Username already exits.", "danger");
      exit;
    }

    $rows = Lib::query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
    if (count($rows) != 0)
    {
      alert("An account already exists with this email.", "danger");
      exit;
    }
    $token = md5(uniqid(rand(), true));
    $result = Lib::query("INSERT IGNORE INTO users (username, hash, email, token) VALUES(?, ?, ?, ?)",
    $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"], $token);

    if ($result == 0) //INSERT fails
    {
      alert("Something went wrong. Please try again later.", "danger");
    }
    else
    {
      $message = '<html><head><title>Email Verification</title></head><body>';
      $message .= '<p>Welcome to The Network. <a href="http://'."localhost".'/activate.php?token=' . $token . '">Click here to activate your account</a>.</p>';
      $message .= '<p><i>If you do not know what this email is for just ignore it.</i></p>';
      $message .= "</body></html>";


      $sent = lib::sendEmail($_POST["email"],"The Network Verification",$message);
      if($sent == true)
      {
        alert("Account successfully created. Please check your email and click the link to activate", "success");
      }
    }
  }
}

?>