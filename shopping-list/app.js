var shoppingList = angular.module('shoppingList', []);

shoppingList.controller('ShoppingListController', ['$scope', '$http', 'dataAPI', function( $scope, $http, dataAPI ) {
	
	// Set the scope variable to an empty array
	$scope.ingredientsList = [];

	// Run the get ingredients function returning ingredientsList as the reference
	dataAPI.getIngredients().then(function( ingredientsList ) {

		// Now assign all the ingredients into our empty array
		$scope.ingredientsList = ingredientsList;
	})
}]);