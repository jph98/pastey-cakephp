var setup = false;
var ieDOM = false, nsDOM = false;
var stdDOM = document.getElementById; 

// get object by specific method
function getObject(objectId) {
	if (stdDOM) return document.getElementById(objectId);
	if (ieDOM) return document.all[objectId];
	if (nsDOM) return document.layers[objectId];
}

// Determine if password changed
function passwordChanged(passField) {
	
	if (!setup)  {
	
		// Determine the browser support for the DOM
		if( !stdDOM ) {
			ieDOM = document.all;
			if( !ieDOM ) {
				nsDOM = ((navigator.appName.indexOf('Netscape') != -1) && (parseInt(navigator.appVersion) ==4));
			}
		}	
	}

	//var superstrong = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
	
	// Define a strong password as having 8 alphanumeric characters
	var strong = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
	
	// Define a medium password as having 6 alphanumeric characters
	var medium = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
	
	// Define a weak password as having 4 characters
	var weak = new RegExp("(?=.{4,}).*", "g");

	var password = passField.value;
	
	if(strong.test(password)) {
		getObject("strength").src = "/images/goodpwd.png";
	}
	else if(medium.test(password)){ 
		getObject("strength").src = "/images/medpwd.png";
	}
	else if(weak.test(password)) {
		getObject("strength").src = "/images/badpwd.png";
	}
	else {
		getObject("strength").src = "/images/nopwd.png";
	}
}