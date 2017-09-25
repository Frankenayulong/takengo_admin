app.controller('carListController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', function($scope, $timeout, $http, $rootScope, ENV){
    $scope.delete = (id) => {
        $.confirm({
            theme: 'modern',
            title: 'Are you sure you want to delete this car?',
            content: 'All of your work will be erased :(',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: function () {
                    $http.post(ENV.API_URL + 'admin/cars/' + id + '/delete', {
                        
                    })
                    .then((data)=>{
                        console.log(data.data); 
                        location.reload()
                        $scope.digest();
                    }, (data)=>{
                        console.log(data.data)
                        
                        $scope.digest();
                    });
                },
                cancel: function () {
                    
                }
            }
        });
    }
}])

app.controller('carNewController', ['$scope', '$timeout', '$http', '$rootScope', 'NgMap', function($scope, $timeout, $http, $rootScope, NgMap){
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
        $scope.lc.lat = pos.lat();
        $scope.lc.long = pos.lng();
        console.log($scope.lc);
        $scope.digest();
    }

    $scope.lc = {
        lat: -37.800426,
        long: 144.9352466
    }
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
        $.confirm({
            theme: 'modern',
            title: 'Are you sure you want to delete this picture?',
            content: 'You will not be able to recover this again',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: function () {
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
                },
                cancel: function () {
                    
                }
            }
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