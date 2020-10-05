
var routes = window.Laravel.routes;

module.exports = function(){
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();

    if(routes[name] === undefined) {
        console.log('Route not found', name);
    } else {
        return window.Laravel.baseUrl + '/' + window.Laravel.locale + '/' + routes[name]
                        .split('/')
                        .map(s => s[0] == '{' ? args.shift(): s)
                        .join('/');
    }
}