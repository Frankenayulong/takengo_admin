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
            $scope.pictures = [...$scope.pictures, response];
            console.log($scope.pictures);
            $scope.digest(_=>{
                $('#js-grid-juicy-projects').cubeportfolio('destroy');
                $scope.digest(_=>{
                    initPortfolio();
                })
                
            });
        }
    }
    $scope.digest(()=>{
        $scope.slim.api_url = ENV.API_URL + 'admin/cars/'+$scope.cid+'/picture/upload';
    })

    $scope.deletePicture = (pic_name) => {
        console.log(pic_name)
        $http.post(ENV.API_URL + 'admin/cars/' + $scope.cid + '/delete-picture', {
            'image_name': pic_name
        })
        .then((data)=>{
            console.log(data.data); 
            if(data.data.status == 'OK'){
                $scope.pictures = $scope.pictures.filter(obj=>{
                    return obj.pic_name != pic_name;
                })
                $scope.digest(_=>{
                    $('#js-grid-juicy-projects').cubeportfolio('destroy');
                    initPortfolio()
                });
            }
            console.log($scope.pictures)
            
            $scope.digest();
        }, (data)=>{
            console.log(data)
            
            $scope.digest();
        });
    }

    var initPortfolio = () => {
        $('#js-grid-juicy-projects').cubeportfolio({
            layoutMode: 'grid',
            defaultFilter: '*',
            gapHorizontal: 35,
            gapVertical: 10,
            gridAdjustment: 'responsive',
            mediaQueries: [{
                width: 1500,
                cols: 5
            }, {
                width: 1100,
                cols: 4
            }, {
                width: 800,
                cols: 3
            }, {
                width: 480,
                cols: 2
            }, {
                width: 320,
                cols: 1
            }],
            caption: 'overlayBottomReveal',
            displayType: 'sequentially',
            displayTypeSpeed: 80,
        });
    }

    $scope.digest(_=>{
        initPortfolio();
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