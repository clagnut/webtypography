// Intercept Amazon links to set preferred store

// URL components for the different affiliate schemes
var amz_schemes = new Array("uk", "ca", "com");
var amz_affil = new Array();
amz_affil["uk"] = new Array(".co.uk", "jalfrezi-21", "UK and the rest of Europe");
amz_affil["ca"] = new Array(".ca", "clagnut0d-20", "Canada");
amz_affil["com"] = new Array(".com", "clagnut-20", "US and the rest of the world");

function initLinks() {
	// Test for cookies
	if (testCookies()) { // if cookies are enabled
		// Get existing store setting
		var amz_dest = readCookie("amz_dest");
		var allLinks = document.getElementsByTagName('a');
		for (var i=0; i < allLinks.length; i++) { // loop through all links on page
			var aLink = allLinks[i];
			var url = aLink.href;
			var amzMatch = url.search(/amazon\./);
			if (amzMatch > -1) { // crude check for link to Amazon
				if (amz_dest) {
					// If store is set then rebuild link
					var country = amz_affil[amz_dest][0];
					var affil = amz_affil[amz_dest][1];

					// Change all possible urls to the desired country and affil
					for (var j=0; j<amz_schemes.length; j++) {
						c2 = amz_affil[amz_schemes[j]][0];
						a2 = amz_affil[amz_schemes[j]][1];
						url = url.replace(c2,country);
						url = url.replace(a2,affil);
					}

					aLink.href = url

				} else { // store is not set
					aLink.onclick = function(e) {
						return interceptAmzLinks(this);
					}
				}
			}
		}
	}
}

function interceptAmzLinks(theLink) {
	// create new div
	var div = document.createElement("div");

	// create new img
	var amzimg = document.createElement("img");
	amzimg.src = "/i/amz.gif";
	amzimg.setAttribute("alt","Amazon");

	// create new p
	var para1 = document.createElement("p");
	para1.appendChild(amzimg);
	var para1txt = document.createTextNode("You are about to follow a link to Amazon. Which store would you prefer to visit?");
	para1.appendChild(para1txt);
	para1.className = "first";
	div.appendChild(para1);

	// create new ul
	var ul = document.createElement("ul");

	// build list of links
	var i, scheme, country, afil, desc, key, func, url, li, litxt, a, atxt;

	for (i=0; i < amz_schemes.length; i++) {

		scheme = amz_schemes[i];
		country = amz_affil[scheme][0];
		affil = amz_affil[scheme][1];
		desc = amz_affil[scheme][2];

		li = document.createElement("li");
		a = document.createElement("a");
		a.setAttribute("title","Go to product page on Amazon"+country);
		a.setAttribute("onclick","setAmzDest('"+scheme+"')");

		url = theLink.href;
		url = url.replace(/\.co\.uk/,country);
		url = url.replace(/jalfrezi-21/,affil);
		a.href = url;

		atxt = document.createTextNode("Amazon" + country);
		a.appendChild(atxt);
		li.appendChild(a);

		litxt = document.createTextNode(" - " + desc);
		li.appendChild(litxt);
		ul.appendChild(li);
	}

	div.appendChild(ul);

	// style box
	div.className = "amzbox";

	// position box
	viewportHeight=getInnerHeight();
	viewportWidth=getInnerWidth();
	downScroll = getVertScroll();
	rightScroll = getHorizScroll();

	topPos = ((viewportHeight - 200) / 2) + downScroll;
	leftPos = ((viewportWidth - 500) / 2) + rightScroll;
	div.style.left = leftPos+"px";
	div.style.top = topPos+"px";

	// create new p
	var para2 = document.createElement("p");
	var para2txt = document.createTextNode("You will only be bothered with this once.");
	para2.appendChild(para2txt);
	div.appendChild(para2);

	// attach div to body
	document.body.appendChild(div);

	return false;
}

function setAmzDest(amz_dest) {
	createCookie("amz_dest",amz_dest,"365");
	initLinks();
	return true;
}

function changeLink(theLink) {

}
