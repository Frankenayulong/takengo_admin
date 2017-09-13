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