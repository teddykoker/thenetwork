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
    <a class="list-group-item">
      <h4 class="list-group-item-heading"><?=$topic["name"]?></h4>
      <p class="list-group-item-text"><?=$topic["description"]?></p>
    </a>
  <?php endforeach; ?>
</ul>