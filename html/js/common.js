function script()
{
	var highLightWord = decodeURIComponent(location.hash.substr(1));
	if(highLightWord.length > 0)
	{
		console.log('Found');
		var singleElement;
		var snameElements = document.getElementsByTagName("sname");
		for(var i =0; i < snameElements.length; i++)
		{
			singleElement = snameElements[i].innerHTML;
			if(singleElement.search(highLightWord) >= 0)
			{
				snameElements[i].innerHTML = singleElement.replace(highLightWord, '<span class="snameHighlight" id="'+highLightWord+'">' + highLightWord + '</span>');
			}
		}
		
		var verseElements = document.getElementsByClassName("verse");
		for(var i =0; i < verseElements.length; i++)
		{
			singleElement = verseElements[i].innerHTML;
			if(singleElement.search(highLightWord) >= 0)
			{
				verseElements[i].innerHTML = singleElement.replace(highLightWord, '<span class="snameHighlight" id="'+highLightWord+'">' + highLightWord + '</span>');
			}
		}
		
		var authorlineElements = document.getElementsByClassName("authorline");
		for(var i =0; i < authorlineElements.length; i++)
		{
			singleElement = authorlineElements[i].innerHTML;
			if(singleElement.search(highLightWord) >= 0)
			{
				authorlineElements[i].innerHTML = singleElement.replace(highLightWord, '<span class="snameHighlight" id="'+highLightWord+'">' + highLightWord + '</span>');
			}
		}
		
		document.location.hash = highLightWord;
		var x = document.getElementsByClassName("header_top");
		x[0].style.position = "relative";

		$(document).ready(function() {
			$('html, body').animate({
			    scrollTop: $('.snameHighlight').offset().top - '100'
			}, 'slow');
		});
	}
}