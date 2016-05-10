<h1><?=$topic["name"]?></h1>
<p>
  <a class="btn btn-default" href="#">Follow</a>
</p>
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