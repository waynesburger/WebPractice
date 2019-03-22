function openTab(evt, tabName){
	//Variables
	var i;
	var tabContent;
	var tabLinks;
	
	//Get all elements with class tabcontent and hide them
	tabContent = document.getElementsByClassName("tabcontent");
	for(i=0; i < tabContent.length; i++){
		tabContent[i].style.display = "none";
	}
	
	//Get all elements with the class tablinks and "deactivate" them
	tabLinks = document.getElementsByClassName("tablinks");
	for(i=0; i < tabLinks.length; i++){
		tabLinks[i].className = tabLinks[i].className.replace(" active", "");
	}
	
	//Show the current tab ans "activate" the button that opened the tab
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}
