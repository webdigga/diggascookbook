shoppingList.service('dataAPI', function( $http ) {
	return {
		getIngredients: function() {
			return $http.get( 'js/json/ingredients.json' ).then(function( ingredients ) {
				return ingredients.data;
			});
		}
	}
});