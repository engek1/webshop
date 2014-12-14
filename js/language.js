/**
 * set cookie to identifier the user language
 */
function setLanguage(value) {
	var date = new Date();
	date.setTime(date.getTime()+(1000*60*60*24));
	var lang = "lang=" + value + ";";
	var expires = "expires=" + date.toGMTString() + ";";
	document.cookie = lang + expires;
}