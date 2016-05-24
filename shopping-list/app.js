var shoppingList = angular.module('shoppingList', []);

shoppingList.controller('ShoppingListController', ['$scope', '$http', 'dataAPI', function( $scope, $http, dataAPI ) {
	
	// Set the scope variable to an empty array
	$scope.ingredientsList = [];

	// Run the get ingredients function returning ingredientsList as the reference
	dataAPI.getIngredients().then(function( ingredientsList ) {

		// Now assign all the ingredients into our empty array
		$scope.ingredientsList = ingredientsList;
	})

	/*
	$scope.itemClicked =  function(item) {
		console.log(item);
		$scope.selected = item; 
	}	

	$scope.isActive = function(item) {
		console.log(item);
	    return $scope.selected === item;
	};
	*/
}]);