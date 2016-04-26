ManifestoFramework.prototype.modules.pubsub = function (app, globalPluginParams) {
    'use strict';
    
    var PUBSUB = function () {
        var self = this;
        
        var topics = []; //Storage for topics that can be broadcast or listened to
        var subUid = -1; //An topic identifier
        
        /*Publish or broadcast events of interest with a specific topic name and arguments such as the data to pass along*/
        this.publish = function( topic, args ) {
            app.logger.info("Published on " + topic);
            app.logger.info(args);
            if ( !topics[topic] ) {
                return false;                
            }
            
            var subscribers = topics[topic], len = subscribers ? subscribers.length : 0;
            
            while (len--) {
                subscribers[len].func( topic, args );
            }
            return this;
        };
        
        /*Subscribe to events of interest with a specific topic name and a callback function, to be executed when the topic/event is observed*/
        this.subscribe = function( topic, func ) {
            app.logger.info("Subscribed for " + topic)
            if (!topics[topic]) {
                topics[topic] = [];
            }
            
            var token = ( ++subUid ).toString();
            topics[topic].push({
                token: token,
                func: func
            });
            
            return token;
        };

        /*Unsubscribe from a specific topic, based on a tokenized reference to the subscription*/
        this.unsubscribe = function( token ) {
            app.logger.info("UnSubscribed on " + token)
            for ( var m in topics ) {
                if ( topics[m] ) {
                    for ( var i = 0, j = topics[m].length; i < j; i++ ) {
                        if ( topics[m][i].token === token ) {
                            topics[m].splice( i, 1 );
                            return token;
                        }
                    }
                }
            }
            return this;
        };
        
        return {
            publish : this.publish,
            subscribe : this.subscribe,
            unsubscribe : this.unsubscribe            
        }
        
        
    };
    
    app.pubSub = (function () {
        return new PUBSUB();
    })();
    
    //return this;
};