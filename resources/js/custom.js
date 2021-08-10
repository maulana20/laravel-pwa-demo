const { find } = require("lodash");

var general = {
    init: function() {
        general.serviceWorker();
    },
    
    hideOfflineWarning: function() {
        if (document.getElementById("offline") != null) document.getElementById("offline").remove();
    },
    
    showOfflineWarning: function () {
        var offlineMessageElement = document.createElement("div");
        offlineMessageElement.setAttribute("id", "offline");
        offlineMessageElement.innerHTML = "Please check your connection settings.";
        document.getElementById("main").appendChild(offlineMessageElement);
    },
    
    serviceWorker: function () {
        window.addEventListener('offline', function(e) {
            console.log("You are offline");
            
            general.showOfflineWarning();
        }, false);
        
        window.addEventListener('online', function(e) {
            console.log("You are online");
            
            general.hideOfflineWarning();
        }, false);
        
        if (!navigator.onLine) general.showOfflineWarning();
    }
}

$(document).ready(function () {
    general.init();
});
