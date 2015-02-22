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

	vaultdApp.controller('profileController', function($scope) {
		$scope.message = 'profile page';
	});

	vaultdApp.controller('boxesController', function($scope, $http) {
		$scope.message = 'boxes page';
		$scope.boxes = null;

    	$http.get('../api/boxes')
         	.success(function (data) {
             	$scope.boxes = data;
         	})
         	.error(function (data, status, headers, config) {
             	//  Do some error handling here
         	});

        
	});

	vaultdApp.controller('orderController', function($scope) {
		$scope.message = 'order page';
	});