<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,300,100'>

  <!-- http://getbootstrap.com/ -->
  <link href="/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="/css/custom.css" rel="stylesheet"/>

  <?php if (isset($title)): ?>
    <title>The Network: <?= htmlspecialchars($title) ?></title>
  <?php else: ?>
    <title>The Network</title>
  <?php endif ?>

</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">The Network</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php if (!empty($_SESSION["id"])): ?>
            <li><a href="topics.php">Topics</a></li>
            <li><a href="logout.php">Log Out</a></li>
          <?php else: ?>
            <li><a href="login.php">Log In</a></li>
          <?php endif ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <div id="main">
