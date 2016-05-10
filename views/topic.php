<div class="jumbotron topic-header">
  <h1><?=$topic["name"]?></h1>
  <p><?=$topic["description"]?></p>
  <p>
    <?php if($followed): ?>
      <a id="unfollow-<?=$topic["id"]?>" class="unfollow btn btn-default" href="#">Unfollow</a>
    <?php else: ?>
      <a id="follow-<?=$topic["id"]?>" class="follow btn btn-primary" href="#">Follow</a>
    <?php endif; ?>
  </p>
</div>
<form action="post.php" method="post">
  <fieldset>
    <input type="hidden" name="topic" value="<?=$topic["id"]?>" />
    <div class="form-group">
      <textarea autocomplete="off" autofocus class="form-control" name="text" placeholder="New Post" type="text"/></textarea>
    </div>
    <div class="form-group">
      <button class="btn btn-default" type="submit">
        Post
      </button>
    </div>
  </fieldset>
</form>
<?php require('posts_list.php') ?>