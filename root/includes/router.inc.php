<?php


if( !isset( $_GET[ 'action' ] ) ){
	$_GET['action'] = 'home';
}

switch( $_GET[ 'action' ] ){


	case 'home':

		//check_login();

		$result = get_review( $database );
		break;

	case 'article':
		$id = $_GET["journalid"];
		$_SESSION["journal_id"] = $id;

		articleChange($id);

		break;

	case 'addUser':

		if( isset( $_POST[ 'userName' ] ) ){
			$errors = addUser(

				$database,
				$_POST[ 'userName' ],
				$_POST[ 'email' ],
				$_POST[ 'password']
			);

		}
		$result = get_review( $database );
		break;

	case 'avatarUpload':
		$errors = avatarUpload(
			$database
		);

		break;
        
    case 'imageUpload':
		$errors = imageUpload(
			$database
		);

		break;

	case 'addReview':

		if( isset( $_POST[ 'title' ] ) ){

			$result = addReview($database, 
								$_POST[ 'title' ], 
								$_POST[ 'city' ], 
								$_POST[ 'author' ], 
								$_POST[ 'description' ], 
								$_POST[ 'star' ]);

			/* Ajax journal submission code

			if( is_array( $result ) ){
				// there was a submission error
				$json = array(
					'status' => 'fail',
					'errors' => $result
				);
			} else {
				// submission success
				$json = array(
					'status' => 'success'
				);
			}

			header( 'Content-Type: application/json');
			echo json_encode( $json );
			exit();
*/

		}
		break;

	case 'delete':

		// Get delete variable from URL
		$delete_id = $_GET["delete-id"];

		// Redirect variable for homepage
		//$redir = $_GET["redir"];

		delete_journal($database, $delete_id);

		break;

	case 'add_comment':

		//		check_login();

		if( isset( $_POST[ 'username' ] ) ){

			$username = $_POST[ 'username'];
			$review_comment = $_POST[ 'review_comment'];
			$review_id = $_POST[ 'review_id' ];

		}

		$result = add_comment( $database, $username, $review_comment, $review_id );

		break;

	case 'login':

		$template = 'sign-up.tpl.php';

		if ( isset( $_POST[ 'userName' ] ) ){
			$result = login(
				$database,
				$_POST[ 'userName' ],
				$_POST[ 'password' ]
			);

			if( is_array( $result ) ){
				// there was a login error
				$json = array(
					'status' => 'fail',
					'errors' => $result
				);
			} else {
				// user was logged in
				$json = array(
					'status' => 'success'
				);
			}

			header( 'Content-Type: application/json' );
			echo json_encode( $json );
			exit();
		}
		break;

	case 'logout':

		logout();
		break;

	default:

		$template = '404.tpl.php';
		// William: Was giving me index.php 404 not found on homepage
		//header( 'HTTP/1.0 404 Not Found' );
		break;

}