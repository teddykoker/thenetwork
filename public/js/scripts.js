function vote(postID)
{
	$.ajax({
		url: "vote.php",
		data: "id=" + postID,
		type: "POST",
		success: function(){
			var votes = parseInt($('#votes-' + postID).val());
			$('#votes-' + postID).val(votes + 1);
		}
	});
}
function like(postID)
{
	$.ajax({
		url: ""
	});
}