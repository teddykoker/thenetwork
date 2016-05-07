<ul class="list-group">
  <?php foreach ($posts as $post):?>
    <li class='post list-group-item' id='post-<?=$post["id"]?>'>
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
          <a class='like-button' id='like-button-<?=$post["id"]?>'href='#'>Like <span class='glyphicon glyphicon-thumbs-up'></span></a>
      <?php else: ?>
          <a class='unlike-button' id='unlike-button-<?=$post["id"]?>'href='#'>Unlike</a>
      <?php endif; ?>
      </div>
    </li>
  <?php endforeach; ?>
</ul>