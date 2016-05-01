<?php

/**
 * Alerts to user with message.
 */
function alert($message, $type) //$type = "success", "info", "warning", or "danger"
{
  render("alert.php", ["message" => $message, "type" => $type]);
}

/**
 * Logs out current user, if any.  Based on Example #1 at
 * http://us.php.net/manual/en/function.session-destroy.php.
 */
function logout()
{
    // unset any session variables
  $_SESSION = [];

  // expire cookie
  if (!empty($_COOKIE[session_name()]))
  {
    setcookie(session_name(), "", time() - 42000);
  }

  // destroy session
  session_destroy();
}

/**
 * Redirects user to location, which can be a URL or
 * a relative path on the local host.
 *
 * http://stackoverflow.com/a/25643550/5156190
 *
 * Because this function outputs an HTTP header, it
 * must be called before caller outputs any HTML.
 */
function redirect($location)
{
  if (headers_sent($file, $line))
  {
    trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
  }
  header("Location: {$location}");
  exit;
}

/**
 * Renders view, passing in values.
 */
function render($view, $values = [])
{
  // if view exists, render it
  if (file_exists("../views/{$view}"))
  {
    // extract variables into local scope
    extract($values);

    // render view (between header and footer)
    require("../views/header.php");
    require("../views/{$view}");
    require("../views/footer.php");
    exit;
  }

  // else error
  else
  {
    trigger_error("Invalid view: {$view}", E_USER_ERROR);
  }
}

/**
 * Converts string into something that is
 * more url-friendly
 */
function shortname($string)
{
  $string = strtolower($string);
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
  $string = preg_replace("/[\s-]+/", " ", $string);
  //$string = preg_replace("/[\s_]/", "-", $string);
  // No dashes for now
  $string = preg_replace("/[\s_]/", "", $string);
  return $string;
}

?>