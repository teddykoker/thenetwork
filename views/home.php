<form action="post.php" method="post">
  <fieldset>
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
<?php require('posts_list.php')?>