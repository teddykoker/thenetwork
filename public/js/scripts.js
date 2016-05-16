
function login(data)
{
  $.ajax({
    url: "login.php",
    type: "POST",
    data: data,
    success: function(response) {
      if(response == "OK"){
        window.location.replace("/");
      } else {
        $("#error").html("<div class='alert alert-danger'>" + response + "</div>");
      }
    }
  });
}
function unlike(postID)
{
  $.ajax({
    url: "like.php",
    data: "id=" + postID,
    type: "POST",
    success: function(){
      var likes = parseInt($('#likes-' + postID).text());
      $('#likes-' + postID).html(likes - 1);
      $('#unlike-button-' + postID).replaceWith("<a class='like-button' id='like-button-" + postID +"'href='#'>Like <span class='glyphicon glyphicon-thumbs-up'></span></a>");
    }
  });
}
function like(postID)
{
  $.ajax({
    url: "like.php",
    data: "id=" + postID,
    type: "POST",
    success:function(){
      var likes = parseInt($('#likes-' + postID).text());
      $('#likes-' + postID).html(likes + 1);
      $('#like-button-' + postID).replaceWith("<a class='unlike-button' id='unlike-button-" + postID + "'href='#'>Unlike</a>");
    }
  });
}
function follow(topicID)
{
  $.ajax({
    url: "follow.php",
    data: "id=" + topicID,
    type: "POST",
    success:function(){
      $('#follow-' + topicID).replaceWith("<a id='unfollow-" + topicID + "' class='unfollow btn btn-default' href='#'>Unfollow</a>");
    }
  });
}
function unfollow(topicID)
{
  $.ajax({
    url: "follow.php",
    data: "id=" + topicID,
    type: "POST",
    success:function(){
      $('#unfollow-' + topicID).replaceWith("<a id='follow-" + topicID + "' class='follow btn btn-primary' href='#'>Follow</a>");
    }
  });
}


$(document).ready(function(){

  $('#login-form').submit(function(event){
    login($(this).serialize());
    event.preventDefault();
  });
  $('.post').on('click', '.like-button', function(){
    postID = $(this).attr('id').replace('like-button-', '');
    like(postID);
    return false;
  });
  $('.post').on('click', '.unlike-button', function(){
    postID = $(this).attr('id').replace('unlike-button-', '');
    unlike(postID);
    return false;
  });
  $('.topic-header').on('click', '.follow', function(){
    topicID = $(this).attr('id').replace('follow-', '');
    follow(topicID);
    return false;
  });
  $('.topic-header').on('click', '.unfollow', function(){
    topicID = $(this).attr('id').replace('unfollow-', '');
    unfollow(topicID);
    return false;
  });

});
