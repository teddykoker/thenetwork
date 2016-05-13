#Notes

##TODO:
 - server and ssl
 - fix new lines in posts
 - error check emails
 - different encoding on authentication
 - pagers at bottom of posts
 - sortable posts
 - sortable topics
 - upload links
 - upload pictures

##Pages

####Login (/login.php)

####Register (/register.php)

####Home (/)
 - show posts in topics that the user is following
 - dropdown to sort by likes, time
 - pagers at bottom of page to flip back and forth

####Topics (/topics.php -> /topics)
 - form at top to create new topics 
 - lists all topics -> by popularity?
 - Can click to follow/unfollow topics
 - pagers at bottom

####Specific Topic (/topics.php?shortname=topic -> /topic)
 - shows posts like home lets users follow or post there

####User (/users.php?username=name -> /users/name)
 - see page of specific user
 - see what they follow and what they have posted

####Me (/users.php?username=myname -> /users/myname)
 - see followed topics and posts if privacy allows

####Settings (/settings.php)
 - change password
 - change privacy settings

##Scraps

```javascript
$('#form').submit(function(event) {   
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: data,
        success: function(result) {
            $('warning').html(result);
        }
    });
    event.preventDefault();
});
```
