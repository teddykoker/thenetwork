<h1><?=$username?></h1>
<ul class="list-group">
  <?php
  foreach ($posts as $post)
  {
    print("<li class='list-group-item'>");
    print("<span class='badge'>".$post["votes"]."</span>");
    print("<div><strong>".$post["name"]."</strong> <small>". date_format(date_create($post["date"]),"n/j/y, g:ia")."</small></div>");
    print("<div>".$post["text"]."</div>");
    print("</li>");
  }
  ?>
</ul>