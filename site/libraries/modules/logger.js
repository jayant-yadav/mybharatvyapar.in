ManifestoFramework.prototype.modules.logger = function (app, params) {
    'use strict';
    
    var LOGGER = function () {
        var self = this;
        
        this.log = function(text) {
            if(params.log) {
                console.log(app.params.name + " - LOG - " +text);
            }            
        }
        
        this.debug = function(text) {
            if(params.debug) {
                console.debug(app.params.name + " - DEBUG - " +text);
            }            
        }
        
        this.info = function(text) {
            if(params.info) {
                console.info(app.params.name + " - INFO - " +text);
            }            
        }
        
        this.warn = function(text) {
            if(params.warn) {
                console.warn(app.params.name + " - WARN - " +text);
            }            
        }
        
        this.error = function(text) {
            if(params.error) {
                console.error(app.params.name + " - ERROR - " +text);
            }            
        }
        
        this.fatal = function(text) {
            if(params.fatal) {
                console.error(app.params.name + " - FATAL - " +text);
            }            
        }
        
        
        return this;
    };
        
    app.logger = (function () {
        return new LOGGER();
    })();
    
    return this;
};