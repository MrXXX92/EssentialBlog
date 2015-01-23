function hideComments(articleId)
{
	var elementId = "comment" + articleId;
	var comments = document.getElementsByClassName(elementId);
	var i;
	for (i = 0; i < comments.length; i++) {
		comments[i].style.visibility = "hidden";
		comments[i].style.display = "none";
	}
	
	document.getElementById("ShowComment" + articleId).style.visibility = "visible";
	document.getElementById("ShowComment" + articleId).style.display = "block";
	document.getElementById("HideComment" + articleId).style.visibility = "hidden";
	document.getElementById("HideComment" + articleId).style.display = "none";
}

function showComments(articleId)
{
	var elementId = "comment" + articleId;
	var comments = document.getElementsByClassName(elementId);
	var i;
	if (comments.length > 0) {
		for (i = 0; i < comments.length; i++) {
			comments[i].style.visibility = "visible";
			comments[i].style.display = "block";
		}
		
		document.getElementById("ShowComment" + articleId).style.visibility = "hidden";
		document.getElementById("ShowComment" + articleId).style.display = "none";
		document.getElementById("HideComment" + articleId).style.visibility = "visible";
		document.getElementById("HideComment" + articleId).style.display = "block";
	}
}