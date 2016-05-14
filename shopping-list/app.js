var shoppingList = angular.module('app', []);

shoppingList.controller('ShoppingListController', [
	'$scope',
	'$http',
	function($scope, $http) {
		
		$http.get('js/json/ingredients.json').then(function( ingredients ) {
			$scope.ingredients = ingredients.data;		

			// TODO - get the map working as per,
			// https://github.com/shanly-suepaul/angular-flight-site/blob/master/src/services/dataAPI.js
		});






	}
]);