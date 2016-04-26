var onesignalAPI = {};

onesignalAPI.appID = 'a89499e6-13e8-11e5-950e-ff29452328a4';
onesignalAPI.restAPI = 'YTg5NDlhNjgtMTNlOC0xMWU1LTk1MGYtNWJmMzk1N2IxOWZk';
onesignalAPI.googleProjectNumber = "592047154006";

onesignalAPI.createNotification = function(params) { //headings, contents, include_player_ids, actions, data
    var requestObject = {
        "app_id":onesignalAPI.appID,
        "isIos":true,
        "isAndroid":true,
        "headings": {
            "en":"REDConnect Title"
        },
        "contents":{
            "en":"REDConnect Message"
        },        
        "ios_sound":"default"
    };
    //"content_available":1
    
    for (var param in params) {
        requestObject[param] = params[param];
    }
    
    //console.log(requestObject);
    return requestObject;
}
