function hideComments(articleId)
{
	var prefix = "comment";
	var comments = document.getElementsByClassName(prefix.concat(articleId));
	var i;
	for (i = 0; i < comments.length; i++) {
		comments[i].hide()
	}
	
	var prefix = "HideComment";
	document.getElementById(prefix.concat(articleId)).hide()
	var prefix = "ShowComment";
	document.getElementById(prefix.concat(articleId)).show()
}

function showComments(articleId)
{
	alert("showCommentsEntered");
	alert("articleId: " + articleId);
	
	var elementId = "comment" + articleId;
	alert("elementId: " + elementId);
	
	var comments = document.getElementsByClassName(elementId);
	var i;
	for (i = 0; i < comments.length; i++) {
		alert("Show element nr " + (i+1));
		comments[i].show()
	}
	
	document.getElementById("ShowComment" + articleId).hide()
	document.getElementById("HideComment" + articleId).show()
	
	alert("showCommentsLeft");
}