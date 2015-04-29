    // create the module and name it vaultdApp
    var vaultdApp = angular.module('vaultdadminapp', ['ngRoute']);
    var base = "https://vaultdstorage.com/admin/";

    // configure our routes
    vaultdApp.config(function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'pages/orders.php',
                controller: 'ordersController'
            })
            .when('/qr', {
                templateUrl: 'pages/qr.php',
                controller: 'qrController'
            })
            .when('/dropoff', {
                templateUrl: 'pages/dropoff.php',
                controller: 'dropoffController'
            })
            .when('/pickup', {
                templateUrl: 'pages/pickup.php',
                controller: 'pickupController'
            })
            .when('/users', {
                templateUrl: 'pages/users.php',
                controller: 'usersController'
            })
            .when('/boxes', {
                templateUrl: 'pages/boxes.php',
                controller: 'boxesController'
            })
            .when('/items', {
                templateUrl: 'pages/items.php',
                controller: 'itemsController'
            })
            .when('/orders', {
                templateUrl: 'pages/orders.php',
                controller: 'ordersController'
            });

        $locationProvider.html5Mode(true);
    });

    vaultdApp.controller('usersController', function($scope, $http) {
        $scope.message = 'users';
        $scope.users = null;

        $http.get(base + 'api/users')
            .then(function(res) {
                $scope.users = res.data;
            });


    });

    vaultdApp.controller('boxesController', function($scope, $http) {
        $scope.message = 'boxes';
        $scope.boxes = null;

        $http.get(base + 'api/boxes')
            .then(function(res) {
                $scope.boxes = res.data;
            });


    });

    vaultdApp.controller('itemsController', function($scope, $http) {
        $scope.message = 'items';
        $scope.items = null;

        $http.get(base + 'api/items')
            .then(function(res) {
                $scope.items = res.data;
            });


    });

    vaultdApp.controller('ordersController', function($scope, $http) {
        $scope.message = 'orders';
        $scope.message = 'orders';
        $scope.orders = null;

        $http.get(base + 'api/orders')
            .then(function(res) {
                $scope.orders = res.data;
                console.log(res);
            });
    });


    vaultdApp.controller('qrController', function($scope, $http) {
        $scope.message = 'qr';
        $scope.boxid = 0;
        $scope.email = '';
        $scope.oldemail = '';
        $scope.contents = '';
        $scope.userid = '';

        $scope.updateEmail = function(email) {
            $http.get('https://www.vaultdstorage.com/admin/useridfromemail.php?email=' + $scope.email)
                .then(function(res) {
                    $scope.userid = res.data;
                    $scope.update($scope.boxid, $scope.email);
                    console.log($scope.userid);
                });
        }

        function canvasToImg() {
            var dataURL = canvas.toDataURL();
            document.getElementById('canvasImg').src = dataURL;
            // console.log(dataURL);
        }

        $scope.update = function(boxid, email) {
            // console.log(boxid + ' ' + email);

            if (email != $scope.oldemail) {
                $scope.updateEmail(email);
                $scope.oldemail = email;
            }
            
            // clear the canvas
            document.getElementById('canvas');
            canvas.width = canvas.width;

            $scope.contents = "";
            if (email != '') {
                $scope.contents += "Vaultd User: " + $scope.userid + "\n";
            }
            $scope.contents += "Vaultd Box: " + boxid;

            $("#canvas").qrcode({
                "size": 200,
                "color": "#3a3",
                "text": $scope.contents
            });

            canvasToImg();
        }

        $scope.update($scope.boxid, $scope.email);
    });

     vaultdApp.controller('dropoffController', function($scope, $http) {
        $scope.message = 'dropoff';
        
    });