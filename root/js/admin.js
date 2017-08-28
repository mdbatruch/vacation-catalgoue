
// User Review Submit in Admin Panel "Post"
/*

$(document).ready(function(){
	
	// prevents form submission
	$( 'input[name="reviewSubmit"]' ).click( function( z ){
		
		z.preventDefault();
		
		// submit using ajax instead
		var formData = {};
		formData.star = $('input[name="star"]:checked').val();
		formData.cityEntry = $('#city-entry').val();
		formData.journalTitle = $('#journal-title').val();
		formData.cityDescription = $('#city-description').val();
		
		// calls 'addReview' in router.inc.php
		
		// Ajax not posting ?
		
		$.post( '../views/admin.php?action=addReview', formData, function( response ){
			
			if( response.status == 'success' ){
					
				location.reload();
			} else {
				
				var errors = '';
				
				if( response.errors.star ){
					errors +=  response.errors.star;
				}
				
				if( response.errors.cityEntry ){
					errors +=  response.errors.cityEntry;
				}
				
				if( response.errors.journalTitle ){
					errors +=  response.errors.journalTitle;
				}
				
				if( response.errors.cityDescription ){
					errors +=  response.errors.cityDescription;
				}
				
				
				$( '#submit-error' ).html( errors );
			}
		} , 'json' );
		
	});
});
*/