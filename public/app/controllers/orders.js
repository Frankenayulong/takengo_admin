app.controller('orderListController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
    
}])

app.controller('orderMapController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', 'NgMap', function($scope, $timeout, $http, $rootScope, ENV, NgMap){
    $scope.cid = '';
    $scope.active = false;
    $scope.started = false;
    $scope.gmap = {};
    NgMap.getMap().then(function(map) {
        console.log(map)
        $scope.gmap.map = map;
    }).catch(err => {
        console.log(err)
    });

    $scope.last_location = {
        lat: 51.5033640,
        long: -0.1276250
    }

    $scope.paths_completed=[
        [6.1751, -106.8650]
    ];

    var simulatePosition = () => {
        var r = 100/111300 // = 100 meters
        , y0 = $scope.paths_completed[$scope.paths_completed.length - 1][0]
        , x0 = $scope.paths_completed[$scope.paths_completed.length - 1][1]
        , u = Math.random()
        , v = Math.random()
        , w = r * Math.sqrt(u)
        , t = 2 * Math.PI * v
        , x = w * Math.cos(t)
        , y1 = w * Math.sin(t)
        , x1 = x / Math.cos(y0)
      
      newY = (y0 * 1) + y1
      newX = (x0 * 1) + x1

      $scope.paths_completed.push([
          newY, newX
      ]);
      $scope.last_location = {
          lat: $scope.paths_completed[$scope.paths_completed.length - 1][0],
          long: $scope.paths_completed[$scope.paths_completed.length - 1][1]
      }
      $scope.change_location($scope.last_location.lat, $scope.last_location.long)
      $scope.digest(_=>{
        setTimeout(() => {
          simulatePosition();
        }, 5000);
      });
        
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

    $scope.digest(_=>{
        $scope.paths_completed = [[$scope.before_location.lat, $scope.before_location.long], ...$scope.paths.map(function(obj){
            return [obj.lat, obj.long];
        })];
        console.log($scope.last_location)
        console.log($scope.paths_completed);
        if($scope.active == '1' && $scope.started == '1'){
            simulatePosition()
        }
        
    })

}])