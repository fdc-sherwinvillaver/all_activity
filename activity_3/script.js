var myApp = angular.module('myApp', ['ngRoute']);
// create the controller and inject Angular's $scope
myApp.config(function($routeProvider){
	$routeProvider.

	when('/',{
		templateUrl : "pages/home.html",
		controller : "mainController"
	}).
	when('/add',{
		templateUrl : "pages/addProduct.html",
		controller : "addController"
	}).
	when('/update',{
		templateUrl : "pages/updateProduct.html",
		controller : "updateController"
	})
});


myApp.controller('addController', function($scope) {
	$scope.message = "Everyone come and see how good I look add!";
});

myApp.controller('updateController', function($scope) {
	$scope.message = "Everyone come and see how good I look update!";
});

myApp.controller('mainController', function($scope) {
	$scope.message = "Everyone come and see how good I look home!";
});    
