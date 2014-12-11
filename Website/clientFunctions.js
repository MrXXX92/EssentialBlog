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
	var prefix = "comment";
	var comments = document.getElementsByClassName(prefix.concat(articleId));
	var i;
	for (i = 0; i < comments.length; i++) {
		comments[i].show()
	}
	
	var prefix = "ShowComment";
	document.getElementById(prefix.concat(articleId)).hide()
	var prefix = "HideComment";
	document.getElementById(prefix.concat(articleId)).show()
}