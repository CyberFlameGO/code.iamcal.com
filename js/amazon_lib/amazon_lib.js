//
// Amazon(tm) library
//
// (C)2000-2003 Cal Henderson <cal@iamcal.com>
//

//////////////////////////////////////////////////////////////
//
// First some essential stuff
//

var theSiteIds = new Array();
var theSiteNames = new Array();
var theSiteURLs = new Array();
var lastArgs = new Array();
var linkWaiting = false;

//////////////////////////////////////////////////////////////
//
// Configurable options next
//

var theCookieName = 'amazonlib_1';

AmazonAddSite('uk','Amazon.co.uk','http://www.amazon.co.uk/exec/obidos/ASIN/#ASIN#/myreferrername');
AmazonAddSite('us','Amazon.com','http://www.amazon.com/exec/obidos/ASIN/#ASIN#/myreferrername');

//////////////////////////////////////////////////////////////
//
// And now for some code...
//

function amazon_saveCookie(name,value,days){
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000))
		var expires = "; expires="+date.toGMTString()
	}else expires = "";
	document.cookie = name+"="+value+expires+"; path=/"
}

function amazon_readCookie(name){
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i<ca.length;i++){
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function Amazon(){
	lastArgs = new Array();
	linkWaiting = false;

	var bake = amazon_readCookie(theCookieName);
	if ((bake == '') || (bake == null)){
		for(i=0;i<arguments.length;i++){
			lastArgs[i] = arguments[i];
		}
		linkWaiting = true;
		AmazonGetCookie();
		return;
	}
	var i=0;
	for(i=0;i<arguments.length;i+=2){
		if (arguments[i] == bake){
			window.open(AmazonURL(bake,arguments[i+1]));
			return;
		}
	}
	if (confirm('We couldn\'t find this product in your favourite site.\n\nDo you want to go to an alternative site?')){
		window.open(AmazonURL(arguments[0],arguments[1]));
	}
}

function AmazonURL(site,asin){
	for(i=0;i<theSiteIds.length;i++){
		if (site == theSiteIds[i]){
			var url = theSiteURLs[i];
			var a = url.indexOf('#ASIN#');
			return url.substr(0,a) + asin + url.substr(a+6,url.length);
		}
	}	
}

function AmazonGetCookie(){
	var hWnd = window.open('amazon_choose.htm','amazon_choose','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=200');
	if ((document.window != null) && (!hWnd.opener)) hWnd.opener = document.window;
}

function AmazonSetCookie(site){
	amazon_saveCookie(theCookieName,site,365);
	window.opener.redoLink();
	window.close();
}

function AmazonAddSite(id,name,url){
	var i = theSiteIds.length;
	theSiteIds[i] = id;
	theSiteNames[i] = name;
	theSiteURLs[i] = url;
}

function GenerateAmazonList(){
	for(i=0;i<theSiteIds.length;i++){
		var id = theSiteIds[i];
		var name = theSiteNames[i];
		document.write('<a href="Javascript:AmazonSetCookie(\''+id+'\');">'+name+'</a><br>'+"\n");
	}
}

function redoLink(){
	if (linkWaiting == true){
		var temp = lastArgs.join('\',\'');
		temp = 'Amazon(\''+temp+'\');';
		eval(temp);
	}
}
