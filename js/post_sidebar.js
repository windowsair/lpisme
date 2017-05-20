var fixedDom = getElementsByTagNames('h1,h2,h3,h4,h5', document.getElementsByClassName('post-content cf')[0]);
var FormerDom_num,LatterDom_num,FormerDom,LatterDom;
window.addEventListener('scroll', winScroll);

function winScroll(e) {
	var top = new Array();
	var Min = 0;
	for (var i = 0; i < fixedDom.length; i++) {
		top[i] = getElementViewTop(fixedDom[i]);
		if(i != 0 && top[i] < 0 && top[i] > top[i-1])Min = i ; //查找当前在下方且离顶部最近的元素
	}

		if(FormerDom_num != undefined){
			FormerDom_num = 'directory' + FormerDom_num.toString();
			FormerDom = document.getElementById(FormerDom_num);
			FormerDom.classList.remove('active');
		}
            LatterDom_num = 'directory' + Min.toString();
            LatterDom = document.getElementById(LatterDom_num);
            LatterDom.classList.add('active');
		FormerDom_num = Min;
	
	
}

function getElementViewTop(element) {　　　　
	var actualTop = element.offsetTop,
		elementScrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);　　　　
	return actualTop - elementScrollTop;　　// >0则元素在上方
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