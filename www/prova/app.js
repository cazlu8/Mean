var app = angular.module('app',[]);

app.controller('myController',myController);

function myController($scope){
	$scope.firstName='lucas';
	$scope.lastName='siqueira';
};