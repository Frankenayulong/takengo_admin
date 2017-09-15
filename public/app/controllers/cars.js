app.controller('carListController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
    
}])

app.controller('carNewController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
    $scope.mileage = {
        unlimited: '0',
        limit: ''
    }

    $scope.$watch('mileage.unlimited', (newVal)=>{
        console.log(newVal)
        if(newVal == '1'){
            $scope.mileage.limit = '';
        }
    })
}])

app.controller('carViewController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
    $scope.mileage = {
        unlimited: '0',
        limit: ''
    }

    $scope.$watch('mileage.unlimited', (newVal)=>{
        if(newVal == '1'){
            $scope.mileage.limit = '';
        }
    })
}])

app.controller('carPictureController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', function($scope, $timeout, $http, $rootScope, ENV){
    $scope.cid = '';
    $scope.digest(()=>{
        console.log($scope.cid);
        $scope.slim = {
            api_url: ENV.API_URL + 'admin/cars/'+$scope.cid+'/picture/upload',
            // called when slim has initialized
            init: function (data, slim) {
                // slim instance reference
                console.log(slim);
        
                // current slim data object and slim reference
                console.log(data);
            },
            upload: function (error, data, response) {
                console.log(error, data, response);
            }
        } 
    })
}])