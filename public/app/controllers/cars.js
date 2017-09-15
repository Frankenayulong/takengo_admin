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
    $scope.slim = {
        api_url: '',

        init: (data, slim) => {
            // slim instance reference
            console.log(slim);
    
            // current slim data object and slim reference
            console.log(data);
        },
        will_request: function(xhr){
            
        },
        upload: (error, data, response, slim) => {
            console.log(slim);
            slim.remove();
            console.log(response);
            $scope.pictures.push(response);
            $scope.digest();
        }
    }
    $scope.digest(()=>{
        $scope.slim.api_url = ENV.API_URL + 'admin/cars/'+$scope.cid+'/picture/upload';
    })

}])

app.controller('carMapController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', 'NgMap', function($scope, $timeout, $http, $rootScope, ENV, NgMap){
    $scope.cid = '';
    $scope.gmap = {};
    NgMap.getMap().then(function(map) {
        console.log(map)
        $scope.gmap.map = map;
    }).catch(err => {
        console.log(err)
    });

    $scope.setCurrentLocation = function() {
        var pos = this.getPosition();
        console.log(pos.lat(),pos.lng());
        $scope.change_location(pos.lat(), pos.lng());
    }

    $scope.change_location = (lat = null, long = null) => {
        $http.post(ENV.API_URL + 'admin/cars/' + $scope.cid + '/update-location', {
            'latitude': lat,
            'longitude': long
        })
        .then((data)=>{
            console.log(data.data); 
            
            $scope.digest();
        }, (data)=>{
            console.log(data)
            
            $scope.digest();
        });
    }
}])