// JavaScript Document
/*
* Author : Akinniyi Bolade
* Email : boladebode@gmail.com
* Website : http://www.cedarcliffng.net
* Subject : Using Ajax with PHP/MySQL
*/


//add feed

function add_feed() {

	// initialisation
	var url = 'add_feed.php';
	var method = 'POST';
	var params = 'name='+document.getElementById('name').value;
	params += '&email='+document.getElementById('email').value;
	params += '&phone='+document.getElementById('phone').value;
	params += '&body='+document.getElementById('body').value;
	var container_id = 'sending' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
	 
}


/*########################################################*/

// add_member function

function add_member() {
	// initialisation
	var url = 'add_member.php';
	var method = 'POST';
	var params = 'surname='+document.getElementById('surname').value;
		params += '&other='+document.getElementById('other').value;
			params += '&gender='+document.getElementByName('gender').value;
	params += '&email='+document.getElementById('email').value;
	params += '&phone='+document.getElementById('phone').value;
		params += '&dob='+document.getElementById('dob').value;
			params += '&address='+document.getElementById('address').value;
				params += '&username='+document.getElementById('username').value;
					params += '&password='+document.getElementById('password').value;
					
	var container_id = 'list_container' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// delete_member function
function delete_member(id) {
	if (confirm('Are you sur to delete this member ?')) {
		// initialisation
		var url = 'delete_member.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
		    alert("Not supported!");
		}
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
							       document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
							       document.getElementById(container_id).innerHTML = loading_text;
							   }
						   	}
	xhr.open(method, url, true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send(params);
}

