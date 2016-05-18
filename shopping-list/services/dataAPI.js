shoppingList.service('dataAPI', function( $http ) {
	return {
		getIngredients: function() {

			// Make the call to our ingredients JSON
			return $http.get( 'js/json/ingredients.json' ).then(function( response ) {

				// Return the data in a map so we can explicitly reference the data
				return response.data.map(function( ingredient ) {
					console.log(ingredient.recipes.name);					
					return {
						name: ingredient.name,
						quantity: ingredient.quantity,
						option: ingredient.option,
						recipes: ingredient.recipes.name
					};
				});
			});
		}
	}
});