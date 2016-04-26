(function($) {
    
    $(function() {
        
        var application = new ManifestoFramework({
            name: "REDConnect",
            gps:{
                support:true
            }            
        });
        
        if($('.header-holder')) {
            $(".header-holder").load("header.html", function() {
                $('.button-collapse').sideNav({
                    //menuWidth: 300, // Default is 240
                    //edge: 'left', // Choose the horizontal origin
                    closeOnClick: true
                });
            });
        }
        
        if($('.footer-holder')) {
            $(".footer-holder").load("footer.html", function() {
                $('select').material_select();
            });
        }
        
        $('select').material_select();
        $('.parallax').parallax();
        $('.slider').slider({full_width: true});
        
  /*      
        var d= new Date();
        var fy= d.getFullYear();
        var da= d.getDate();
        var mo= d.getMonth();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: true, // Creates a dropdown of 15 years to control year
           /* min: new Date(),
            max: new Date(++fy,mo,da),*/
            closeOnSelect: true
        });
        */
        function generateUUID() {
            var d = new Date().getTime();
            var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = (d + Math.random()*16)%16 | 0;
                d = Math.floor(d/16);
                return (c=='x' ? r : (r&0x3|0x8)).toString(16);
            });
            return uuid;
        };
        
        sendBloodRequest = function(params) {
            var notificationContext = {};
            
            apiservices.oneSignalCreateNotification(onesignalAPI.createNotification({
                "include_player_ids" : params.playerIDs,
                "headings": {
                    "en":"REDConnect Blood Request" // Urgent | Scheduled
                },
                "contents":{
                    "en":  "Blood Request for B+ve. Kindly do the needful."
                },
                "data" : notificationContext
            }), function(r) {
                console.log(r);
            });            
        }
        
        
        
        $('.trigger-raise-request').off('click');
        $('.trigger-raise-request').on('click', function() {
            
            if(!validateForm()){
                return false;
            }
            else{
            
            application.gps.getCurrentLocationDetails(function(response,a) {
                console.log(response);
                console.log(a);
                
                //1. USERObject
                var userObject = {};
                userObject.user_id = generateUUID();
                userObject.first_name = $('#first_name').val();
                userObject.last_name = $('#last_name').val();
                userObject.display_name = userObject.last_name + ", " + userObject.first_name;
                userObject.is_donor = a; // TODO
                userObject.country = response.country;
                userObject.state = response.state;
                userObject.district = response.district;
                userObject.city = userObject.city;
                userObject.area = response.area;
                userObject.postal = response.postal;
                userObject.reverse_geo = response.formatted_address;
                userObject.latitude = response.coords.latitude;
                userObject.longitude = response.coords.longitude;
                userObject.is_verified = "0";
                userObject.created_at = moment().format('YYYY-MM-DD HH:mm:ss');
                console.log(userObject);
                apiservices.saveUser(userObject, function(r1) {                    
                    r1 = JSON.parse(r1);
                    console.log(r1);
                    if(r1.status == "SUCCESS") {
                        Materialize.toast('User subscribed as DONOR!', 4000); // If DONOR and on success
                        userObject = r1.instance;
                        
                        //2. REQUESTObject
                        var requestObject = {};
                        requestObject.country = response.country;
                        requestObject.state = response.state;
                        requestObject.district = response.district;
                        requestObject.city = userObject.city;
                        requestObject.area = response.area;
                        requestObject.postal = response.postal;
                        requestObject.reverse_geo = response.formatted_address;
                        requestObject.latitude = response.coords.latitude;
                        requestObject.longitude = response.coords.longitude;
                        requestObject.blood_group = $('#blood_group').val();
                        requestObject.units = $('#units').val() || "0";
                        requestObject.location = $('#hospital').val();
                        requestObject.created_at = moment().format('YYYY-MM-DD HH:mm:ss');
                        requestObject.requested_at = moment().format('YYYY-MM-DD HH:mm:ss');
                        requestObject.created_by = userObject.user_id;
                        requestObject.channel = "WEB";
                        requestObject.type = "URGENT";
                        console.log(requestObject);
                        apiservices.saveRequestObject(requestObject, function(r2) {
                            r2 = JSON.parse(r2);
                            console.log(r2);
                            
                            if(r2.status == "SUCCESS") {
                                Materialize.toast('Request Sent to Server!', 4000);
                                
                                //3. Get Nearme Donors
                                var nmRequest = {};
                                nmRequest.latitude = response.coords.latitude; //"13.7500";
                                nmRequest.longitude = response.coords.longitude; //"100.4833";
                                nmRequest.distance = 50;
                                nmRequest.limit = 100;
                                nmRequest.bloodGroup = $('#blood_group').val();
                                apiservices.getUsersNearMe(nmRequest, function(r3) {
                                    r3 = JSON.parse(r3);
                                    console.log(r3);                                    
                                    Materialize.toast(r3.length + ' Donors Found!', 4000);
                                    
                                    // 4. Iterate and Save Response
                                    var playerIDs = [];
                                    $(r3).each(function(i, e) {
                                        console.log(e);
                                        if(e.player_id) {
                                            playerIDs.push(e.player_id);
                                        }
                                    });
                                    console.log(playerIDs);
                                    
                                    playerIDs = ["d8b2dcea-2bbd-11e5-aef2-9b7bd2316146"];
                                    if(playerIDs.length > 0) {
                                        //5. Send Push Envelope
                                        sendBloodRequest({
                                            playerIDs : playerIDs
                                        });
                                    }
                                    
                                    
                                });
                                
                            }
                            
                        })
                        
                        
                    }
                });
                
            }, function(e) {
                alert(e);
            });
            
            }
            
            
            
            // SAVE USER            
            
            
            //console.log($("#request-form").serializeJSON());
            
            //1. User - DONOR
            //2. Request
            // 3.1 - GPS & get Users
            //3. #Notifications - response
            //4. Push Notifications
            
            
            //Materialize.toast('Request submitted successfully', 4000);
        });        
        
  }); // end of document ready
})(jQuery); // end of jQuery name space



function validateForm() {
//    var x = document.forms["request_form"]["first_name"].value;
    var x = $('#first_name').val();
    var y = $('#blood_group').val();
    var z = $('#phone').val();
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
    
    else if(y==null || y==""){
        alert("Blood Group is a mandatory field"); 
        return false;
    }
    else if(z==null || z==""){
        alert("Phone no is is required");
        return false;
    }
    else return true;
}


if($('#first_name').hasClass("invalid")){
    console.log("invalid hai bhaiya!");      // not working TODO
}

var a;
function checking() {
                        
                    if (document.getElementById('is_donor').checked) {
                        a = "1";
                        console.log(a);
                    } else {
                         a = "0";
                        }
                }