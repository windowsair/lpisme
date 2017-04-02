function addclass(){
	var aLi = document.getElementsByTagName("pre");
	
	var i = 0;
	for (i = 0; i < aLi.length; i++){
		
			aLi[i].className += ' line-numbers';
			
			
	}
}
addclass();
