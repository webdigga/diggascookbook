var shoppingList = angular.module('app', []);

shoppingList.controller('ShoppingListController', [
	'$scope',
	'$http',
	function($scope, $http) {
		
		$http.get('js/json/fruit-veg.json').then(function(data) {

			console.log(data);

			// TODO - get the map working as per,
			// https://github.com/shanly-suepaul/angular-flight-site/blob/master/src/services/dataAPI.js
		});






	}
]);