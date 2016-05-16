<?php

// configuration
require("../includes/config.php");

if(isset($_GET["username"]))
{

  // query database for user
  $rows = Lib::query("SELECT * FROM users WHERE username = ? AND active = 0", $_GET["username"]);

  // if we found user, check password
  if (count($rows) == 1)
  {
    $token = md5(uniqid(rand(), true));

    $message = '<html><head><title>Email Verification</title></head><body>';
    $message .= '<p>Welcome to The Network. <a href="http://'. $_SERVER["SERVER_ADDR"] .'/activate.php?token=' . $token . '">Click here to activate your account</a>.</p>';
    $message .= '<p><i>If you do not know what this email is for just ignore it.</i></p>';
    $message .= "</body></html>";


    $sent = lib::sendEmail($rows[0]["email"],"The Network Verification",$message);
    if($sent)
    {
      Lib::query("UPDATE users SET token = ? WHERE username = ?", $token, $_GET["username"]);

      alert("Email sent. Please check your email and click the link to activate", "success");
    }

  }
}

?>