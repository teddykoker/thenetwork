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
    <?php
        foreach ($posts as $post)
        {
            print("<li class='list-group-item' id='post-".$post["id"]."'>");
                print("<span class='badge'>");
                    print("<span class='votes'>".$post["votes"]."</span>");
                print("</span>");
                print("<div><a href='user.php?id=".$post["user"]["id"]."'><strong>".$post["user"]["username"]."</strong></a> <small>". date_format(date_create($post["date"]),"n/j/y, g:ia")."</small></div>");
                print("<div>".$post["text"]."</div>");
                print("<div>");
                    if(!$post["liked"])
                    {
                        print("<a href='like.php?id=".$post["id"]."'>Like <span class='glyphicon glyphicon-thumbs-up'></span></a>");
                    }
                    else
                    {
                        print("<a href='like.php?id=".$post["id"]."'>Unlike</a>");
                    }     
                print("</div>");
            print("</li>");
        }
    ?>
</ul>