var fixedDom = getElementsByTagNames('h1,h2,h3,h4,h5', document.getElementsByClassName('post-content cf')[0]);
var FormerDom_num,LatterDom_num,FormerDom,LatterDom;
window.addEventListener('scroll', winScroll);

function winScroll(e) {
	var top;
	for (var i = 0; i < fixedDom.length; i++) {
		top = getElementViewTop(fixedDom[i]);
	if (top > -127 && top < -50){
		
		if(FormerDom_num != undefined){
			FormerDom_num = 'directory' + FormerDom_num.toString();
			FormerDom = document.getElementById(FormerDom_num);
			FormerDom.classList.remove('active');
		}
		LatterDom_num = 'directory' + i.toString();
		LatterDom = document.getElementById(LatterDom_num);
		LatterDom.classList.add('active');
		FormerDom_num = i;
}
	}
	
}
function changeFormerDom(i){

}

function getElementViewTop(element) {　　　　
	var actualTop = element.offsetTop,
		elementScrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);　　　　
	return actualTop - elementScrollTop;　　
}

function getElementsByTagNames(list, obj) {
	if (!obj) var obj = document;
	var tagNames = list.split(',');
	var resultArray = new Array();
	for (var i = 0; i < tagNames.length; i++) {
		var tags = obj.getElementsByTagName(tagNames[i]);
		for (var j = 0; j < tags.length; j++) {
			resultArray.push(tags[j]);
		}
	}
	var testNode = resultArray[0];
	if (!testNode) return [];
	if (testNode.sourceIndex) {
		resultArray.sort(function(a, b) {
			return a.sourceIndex - b.sourceIndex;
		});
	} else if (testNode.compareDocumentPosition) {
		resultArray.sort(function(a, b) {
			return 3 - (a.compareDocumentPosition(b) & 6);
		});
	}
	return resultArray;
}