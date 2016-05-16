<?php if(count($posts) == 0): ?>
  <div class="alert alert-info">Start following some <a class="alert-link" href="/topics.php">topics</a> to see posts!</div>
<?php else: ?>
  <?php require('posts_list.php') ?>
<?php endif; ?>