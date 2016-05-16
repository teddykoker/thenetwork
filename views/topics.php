<form action="topics.php" method="post">
  <fieldset>
    <div class="form-group">
      <input autocomplete="off" class="form-control" name="name" placeholder="New Topic" type="text"/>
    </div>
    <div class="form-group">
      <input autocomplete="off" class="form-control" name="description" placeholder="Description" type="text"/>
    </div>
    <div class="form-group">
      <button class="btn btn-default" type="submit">
        <span aria-hidden="true" class="glyphicon glyphicon-plus"></span>
        Create
      </button>
    </div>
  </fieldset>
</form>
<ul class="list-group">
  <?php foreach ($topics as $topic):?>
    <a href="/topics.php?shortname=<?=$topic["shortname"]?>"class="list-group-item">
      <span class='badge'><?=$topic["num_followers"]?></span>
      <h4 class="list-group-item-heading"><?=htmlspecialchars($topic["name"])?></h4>
      <p class="list-group-item-text"><?=htmlspecialchars($topic["description"])?></p>
    </a>
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