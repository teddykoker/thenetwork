
function unlike(postID)
{
	$.ajax({
		url: "like.php",
		data: "id=" + postID,
		type: "GET",
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
		type: "GET",
		success:function(){
			var likes = parseInt($('#likes-' + postID).text());
			$('#likes-' + postID).html(likes + 1);
			$('#like-button-' + postID).replaceWith("<a class='unlike-button' id='unlike-button-" + postID + "'href='#'>Unlike</a>");
		}
	});
}


/*
$(document).ready(function(){


	$('.like-button').on('click', function(){
		postID = $(this).attr('id').replace('like-button-', '');
		like(postID);
		return false;
	});

	$('.unlike-button').on('click', function(){
		postID = $(this).attr('id').replace('unlike-button-', '');
		unlike(postID);
		return false;
	});


});
*/