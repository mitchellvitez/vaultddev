	// create the module and name it vaultdApp
	var vaultdApp = angular.module('vaultdapp', ['ngRoute']);

	// configure our routes
	vaultdApp.config(function($routeProvider, $locationProvider) {
		$routeProvider
			.when('/profile', {
				templateUrl : 'pages/profile.php',
				controller  : 'profileController'
			})
			.when('/boxes', {
				templateUrl : 'pages/boxes.php',
				controller  : 'boxesController'
			})
			.when('/order', {
				templateUrl : 'pages/order.php',
				controller  : 'orderController'
			});

		$locationProvider.html5Mode(true);
	});








	vaultdApp.controller('profileController', function($scope, $http) {
		$scope.message = 'profile page';
        $scope.user = null;

        $http.get('../api/user')
            .success(function (data) {
                console.log (data);
                $scope.user = data[0];
            })
            .error(function (data, status, headers, config) {
                //  Do some error handling here
            });
	});







	vaultdApp.controller('boxesController', function($scope, $http) {
		$scope.message = 'boxes page';
		$scope.boxes = null;
        $scope.pending = false;
        $scope.orders = null;
        $scope.items = null;



    	$http.get('../api/boxes')
         	.success(function (data) {
                console.log (data);
                if (data.order === "pending") {
             	    $scope.boxes = Array();
                    $scope.pending = true;
                    $scope.orders = data;
                    $scope.boxnum = data[0].box_num;
                    $scope.itemnum = data[0].item_num;
                }
                else {
                    $scope.boxes = data;
                }
         	})
         	.error(function (data, status, headers, config) {
             	//  Do some error handling here
         	});

        $http.get('../api/items')
            .success(function (data) {
                console.log (data);
                if (data.order === "pending") {
                    $scope.items = Array();
                    $scope.pending = true;
                    $scope.orders = data;
                    $scope.itemnum = data[0].item_num;
                }
                else {
                    $scope.items = data;
                }
            })
            .error(function (data, status, headers, config) {
                //  Do some error handling here
            });

	});








	vaultdApp.controller('orderController', function($scope) {
		$scope.message = 'order page';

		$scope.boxNum = 0;
		$scope.itemNum = 0;

		$scope.boxSubtotal = 0;
		$scope.itemSubtotal = 0;
		$scope.total = 0;
        $scope.discount = 0;

		$scope.update = function(boxNum, itemNum) {
        	// console.log(boxNum);
        	// console.log("update: (" + boxNum + ", " + itemNum + ")");
        	$scope.boxSubtotal = 10 * boxNum;
        	$scope.itemSubtotal = 20 * itemNum;
            //var firstTotal = $scope.boxSubtotal + $scope.itemSubtotal;
            $scope.discount = .25 * ($scope.boxSubtotal + $scope.itemSubtotal);
        	// $scope.total = firstTotal - discount;
            $scope.total = /* .75 * */ ($scope.boxSubtotal + $scope.itemSubtotal);
        }

        $scope.update($scope.boxNum, $scope.itemNum);
	});