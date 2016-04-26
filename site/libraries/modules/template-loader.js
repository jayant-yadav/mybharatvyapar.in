ManifestoFramework.prototype.modules.templateLoader = function (app, globalPluginParams) {
    'use strict';
    
    var TEMPLATES_LOADER = function () {
        var self = this;
        var templates = $('script[type="text/ons-template"]');
        
        for (var i = 0; i < templates.length; i++) {
            var template = $(templates[i]);            
            var id = $(template)[0].id;
            if (typeof id === 'string') {
                app.templateCache.push({id : $(template)[0]});
            }
        }
        return this;
    };
    
    /*app.templateLoader = (function () {
        return new TEMPLATES_LOADER();
    })();*/
    
    new TEMPLATES_LOADER();
    
    //return this;
};