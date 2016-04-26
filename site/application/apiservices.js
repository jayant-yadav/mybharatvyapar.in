var apiservices = {};
apiservices.version = 'v0.1';
apiservices.channel = "APP";

//apiservices.url = 'http://192.168.1.100/isavelives.in/api/';
//apiservices.url = 'http://localhost/isavelives.in/api/';
  apiservices.url = 'http://localhost/isavelife.in/api/';
//apiservices.url = 'http://192.168.1.130/isavelives.in/api/';
//apiservices.url = 'http://redapi.duredemos.com/rest/';
//apiservices.url = 'http://www.isavelives.in/redapi/';


apiservices.oneSignalCreateNotification = function(instance, callback) {
    //console.log(instance);
    var requestEnvelope = {
		url : 'https://onesignal.com/api/v1/notifications',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
        headers : {
            'Authorization' : 'Basic ' + onesignalAPI.restAPI
        },
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};


apiservices.saveRequestObject = function(instance, callback) {
    instance.page_type = "";
    var requestEnvelope = {
		url : apiservices.url + 'requests/save',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};

apiservices.saveResponseObject = function(instance, callback) {
    instance.page_type = "";
    var requestEnvelope = {
		url : apiservices.url + 'response/save',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};

apiservices.updateResponseObject = function(instance, callback) {
    instance.page_type = "edit";
    var requestEnvelope = {
		url : apiservices.url + 'response/save',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};



apiservices.saveUser = function(instance, callback) {	
    instance.page_type = "";	
    var requestEnvelope = {
		url : apiservices.url + 'users/save',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {            
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};

apiservices.updateUser = function(instance, callback) {	
    console.log(instance);
    instance.updated_at = moment().format('YYYY-MM-DD HH:mm:ss');
    instance.page_type = "edit";	
    var requestEnvelope = {
		url : apiservices.url + 'users/save',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {            
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};


apiservices.getUsersNearMe = function(instance, callback) {
    var requestEnvelope = {
		url : apiservices.url + 'users/getUsersNearMe',
		type : 'POST',
		contentType : 'application/json; charset=utf-8',
		data : JSON.stringify(instance),
        success : function (data, textStatus, jqXHR) {
            callback(data)
        }
	};
	$.ajax(requestEnvelope);
};
