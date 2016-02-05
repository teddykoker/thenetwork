<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- http://getbootstrap.com/ -->
  <link href="/css/bootstrap.min.css" rel="stylesheet"/>

  <link href="/css/styles.css" rel="stylesheet"/>

  <?php if (isset($title)): ?>
    <title>The Network: <?= htmlspecialchars($title) ?></title>
  <?php else: ?>
    <title>The Network</title>
  <?php endif ?>

  <!-- https://jquery.com/ -->
  <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>

  <!-- http://getbootstrap.com/ -->
  <script src="/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="/js/scripts.js" type="text/javascript"></script>

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li><a href="logout.php">Log Out</a></li>
          <?php endif ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <div id="main">
