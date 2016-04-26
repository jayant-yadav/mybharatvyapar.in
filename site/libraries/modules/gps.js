ManifestoFramework.prototype.modules.gps = function (app, globalPluginParams) {
    'use strict';
    
    var GPS = function () {
        var self = this;
        
        this.getReverseGeoCodingData = function(position, callback) {
            return {
                get : function() {
                    var lat = position.coords.latitude, lng = position.coords.longitude;
                    
                    var instance = {};
                    $.extend(true, instance, position)
                    
                    var defer = $.Deferred();
                    defer.promise( app.gps );
                    
                    app.gps.done(function(r) {
                        callback(r);
                        return r;
                    });
                    
                    var latlng = new google.maps.LatLng(lat, lng);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                        if (status == 'OK') {
                            var addresses = TAFFY(results[0].address_components);
                            instance.country = addresses({types:{like:"country"}}).select("long_name")[0];
                            instance.state = addresses({types:{like:"administrative_area_level_1"}}).select("long_name")[0];
                            instance.district = addresses({types:{like:"administrative_area_level_2"}}).select("long_name")[0];
                            instance.city = addresses({types:{like:"locality"}}).select("long_name")[0];            
                            instance.area = addresses({types:{like:"sublocality"}}).select("long_name")[0]; //TODO
                            instance.postal = addresses({types:{like:"postal_code"}}).select("long_name")[0];
                            instance.formatted_address = results[0].formatted_address;
                            defer.resolve( instance );
                        } else {
                            defer.resolve( instance );
                        }
                    });
                }
            }
        };
        
        this.errorHandler = function(err) {            
            if(err.code == 1) {
               alert("Error: Access is denied!");
            }else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
        
        // TODO - If callback is null
        this.getGEOLocation = function(successCallback, failureCallback) {
            if(!app.params.gps.support) {
                failureCallback({                    
                    code: 0,
                    message: "Not configured by application"
                });
                return false;
            }
            
            if(!navigator.onLine) {
                failureCallback({                    
                    code: 1,
                    message: "You are OFFLINE"
                });
                return false;
            }
            
            if(navigator.geolocation) {
                if(!failureCallback) {
                    failureCallback = app.gps.error;
                }                
                navigator.geolocation.getCurrentPosition(successCallback, failureCallback, $.extend(true, app.params.gps, {}));
            }  else {
                app.logger.fatal("GPS not supported");
                failureCallback({                    
                    code: 2,
                    message: "GPS not supported"
                });
                return false;
            }
        };
        
        this.getGEOLocationDetails = function(successCallback, failureCallback) {
            app.gps.getCurrentLocation(function(position) {                
                app.gps.getReverseGEO(position, successCallback).get();                
            }, failureCallback);
        };
        
        return {
            getCurrentLocation : this.getGEOLocation,
            getCurrentLocationDetails : this.getGEOLocationDetails,
            getReverseGEO : this.getReverseGeoCodingData,
            error: this.errorHandler
        }
        
        return this;
    };
    
    app.gps = (function () {
        return new GPS();
    })();
    
    //return this;
};