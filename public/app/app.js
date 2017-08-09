var app = angular.module('takeNGoAdmin', [])
.constant('API_URL', 'http://api.takengo.dev/');
//.constant('API_URL', 'http://api.takengo.io/');

app.controller('mainController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
    $scope.digest = function(a) {
        var waitForRenderAndDoSomething = function() {
            if ($http.pendingRequests.length > 0) {
                $timeout(waitForRenderAndDoSomething); // Wait for all templates to be loaded
            } else {
                if (a) {
                    return a();
                }
            }
        };
        return $timeout(waitForRenderAndDoSomething);
    };
}])