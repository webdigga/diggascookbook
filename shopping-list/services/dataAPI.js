shoppingList.service('dataAPI', function( $http ) {
	return {
		getIngredients: function() {

			// Make the call to our ingredients JSON
			return $http.get( 'js/json/ingredients.json' ).then(function( response ) {
				return response.data;				
			});
		}
	}
});