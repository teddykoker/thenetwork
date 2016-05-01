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
<ul class="list-group">
  <?php foreach ($posts as $post):?>
    <li class='list-group-item' id='post-<?=$post["id"]?>'>
      <span class='badge'>
        <span class='likes' id='likes-<?=$post["id"]?>'><?=$post["likes"]?></span>
      </span>
      <div>
        <a href='user.php?id=<?=$post["user"]["id"]?>'><strong><?=$post["user"]["username"]?></strong></a> <small><?=$post["date"]?></small>
      </div>
      <div>
        <?=$post["text"]?>
      </div>
      <div>
      <?php if(!$post["liked"]): ?>
          <a class='like-button' id='like-button-<?=$post["id"]?>'href='/like.php?id=<?=$post["id"]?>'>Like <span class='glyphicon glyphicon-thumbs-up'></span></a>
      <?php else: ?>
          <a class='unlike-button' id='unlike-button-<?=$post["id"]?>'href='/like.php?id=<?=$post["id"]?>'>Unlike</a>
      <?php endif ?>
      </div>
    </li>
  <?php endforeach ?>
</ul>