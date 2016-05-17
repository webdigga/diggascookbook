var shoppingList = angular.module('shoppingList', []);

shoppingList.controller('ShoppingListController', ['$scope', '$http', 'dataAPI', function( $scope, $http, dataAPI ) {
		
	console.log(dataAPI.getIngredients());
	$scope.ingredients = dataAPI.getIngredients();

	
}]);