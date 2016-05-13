<ul class="list-group">
  <?php foreach ($posts as $post):?>
    <li class='post list-group-item' id='post-<?=$post["id"]?>'>
      <span class='badge'>
        <span class='likes' id='likes-<?=$post["id"]?>'><?=$post["likes"]?></span>
      </span>
      <div>
        <a href='user.php?name=<?=$post["user"]["username"]?>'><strong><?=$post["user"]["username"]?></strong></a>
        <small><?=$post["date"]?> in <a href="/topics.php?shortname=<?=$post["topic"]["shortname"]?>"><?=$post["topic"]["name"]?></a></small>
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
<nav>
  <ul class="pager">
    <?php if($page == 1): ?>
      <li class="previous disabled"><a href="#">Previous</a></li>
    <?php else: ?>
      <li class="previous"><a href="?page=<?=$page-1?>">Previous</a></li>
    <?php endif; ?>
    <?php if($last): ?>
      <li class="next disabled"><a href="#">Next</a></li>
    <?php else: ?>
      <li class="next"><a href="?<?=pageQuery($page + 1)?>">Next</a></li>
    <?php endif; ?>
  </ul>
</nav>