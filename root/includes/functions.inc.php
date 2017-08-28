<?php

function redirect( $url ){
    header( 'Location: ' . $url );
    die( "Redirect to <a href=\"$url\">$url</a>" );
}

function sanitize( $database, $data ){
    $data = trim($data);
    $data = strip_tags($data);
    $data = mysqli_real_escape_string($database, $data);

    return $data;
}

function addUser( $database, $signup_username, $signup_email, $signup_password ) {

    $errors = array();


    /* Check if user/email/password are available */


    // Sets up query to fetch data where username matches
    $query = "SELECT id, userName FROM worldappaccount WHERE userName='$signup_username'";

    // Sends query to db server and wait for result
    $result = mysqli_query($database, $query)
        or die(mysqli_error($database.'Database could not send query properly.'));

    // If Username Exists
    if(mysqli_num_rows($result) > 0 ){

        include('../templates/sign-up.tpl.php');

        echo "<span class='login-error-msg'>Username '$signup_username' has already been taken!</span>";

    }
    // Username available
    else if(mysqli_num_rows($result)==0){

        // Encrypt password using password_hash
        $encrypted_password = password_hash($signup_password, PASSWORD_DEFAULT)
            or die ("<html><script language='Javascript'>alert('Unable to register. Please try again.')</script></html>");

        /* Create a prepared statement */

        if($stmt=mysqli_prepare($database, "INSERT INTO worldappaccount(userName, email, password) VALUES(?,?,?)")){

            mysqli_stmt_bind_param($stmt, "sss", $signup_username, $signup_email, $encrypted_password);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            redirect( '../../views/admin.php' );

        }

    }
    else{
        redirect('../views/404.php');
    }

    // Free result set
    mysqli_free_result($result);

    // Closes connection
    mysqli_close($database);
}

function articleChange($id){
    //redirect('../views/city-description.php');
}

function get_review ( $database ){

    $review_addition = 'SELECT
                              id,
                              journal_header,
                              city_name,
                              author_name,
                              journal_description,
                              star_rating
                                        FROM worldappreview';

    $result = mysqli_query( $database, $review_addition )
        or die( 'HERE!' . mysqli_error ( $database ) );

    return $result;
}

function addReview( $database, $journal_header, $city_name, $author_name, $journal_description, $star_rating ){

    /* Create a prepared statement */
    if($stmt=mysqli_prepare($database, "INSERT INTO worldappreview(journal_header, city_name, author_name, journal_description, star_rating) VALUES(?,?,?,?,?)")){

        mysqli_stmt_bind_param($stmt, "ssssi", $journal_header, $city_name, $author_name, $journal_description, $star_rating);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        redirect('admin.php#post');

    }else{
        redirect('../views/404.php');
    }

    // Closes connection
    mysqli_close($database);
}

function delete_journal($database, $delete_id, $redir){

    // Query to database
    $sql = "DELETE FROM worldappreview WHERE id=$delete_id";

    if(mysqli_query($database,$sql)){
        redirect($_SERVER['PHP_SELF']);

    }else{
        echo ("Error deleting record:".mysqli_error($database));
    }

    // Ends database connection
    mysqli_close($database);
}

function add_comment( $database, $username, $review_comment, $review_id ){

    /* check if comment is valid */
    if(strlen($review_comment)<5){
        // Add ajax error
        end();
    }else{

        /* Create a prepared statement */
        if($stmt=mysqli_prepare($database, "INSERT INTO reviewcomments(username, review_comment, review_id) VALUES(?,?,?)")){

            mysqli_stmt_bind_param($stmt, "ssi", $username, $review_comment, $review_id);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

        }else{

            redirect('../views/404.php');
        }

        // Free result set
        mysqli_free_result($result);

        // Closes connection
        mysqli_close($database);

        redirect('city-description.php');
    }
}

function get_comment( $database, $review_id ) {

    $review_comment_addition = "SELECT
                                      id,
                                      username,
                                      review_comment,
                                      date_submitted
                                            FROM reviewcomments
                                     WHERE review_id = {$review_id}";

    $result = mysqli_query( $database, $review_comment_addition )
        or die( mysqli_error ( $database ) );

    return $result;
}

function getAvatar( $database ){

    if(!isset($_SESSION['user_id'])){

        $query = "SELECT avatar FROM
                    worldappaccount
                    WHERE avatar='default-avatar.png'" ;
    }
    else{

        $query = "SELECT avatar FROM
                    worldappaccount
                    WHERE id={$_SESSION['user_id']}" ;
    }




    $result = mysqli_query( $database, $query )
        or die( $query . ' error: ' . mysqli_error( $database ) );

    $row = mysqli_fetch_assoc( $result );

    return $row[ 'avatar' ];
}

function avatarUpload( $db ){


    //IF THE FILE HAS BEEN SUBMITTED, THEN RUN THIS CODE
    if( isset( $_POST[ 'submitted' ] ) ){

        //CHECK IF THERE IS A FILENAME SUBMITTED
        if( strlen( $_FILES[ 'avatar-icon' ][ 'name' ] ) > 0 ){

            $temp_location = $_FILES[ 'avatar-icon' ][ 'tmp_name' ];

            if( ($_FILES[ 'avatar-icon' ][ 'size' ] > MAX_FILE_SIZE ) 
               or ($_FILES[ 'avatar-icon' ][ 'error' ] == UPLOAD_ERR_INI_SIZE )
              ){

                $maxSize = round( MAX_FILE_SIZE / 1024 );
                //file is too big
                $errors[ 'size' ] = "<p class=\"error\">
                                    File size is too large! Must be less than {$maxSize} KB.
                                    </p>";
            }

            //select uploaded file
            $info = getimagesize( $temp_location );
            //if file type is an image
            if( !$info 
               or ( strpos( ALLOWED_FILE_TYPES, $info[ 'mime' ] ) === false )  ){
                //file is either corrupted or not the correct file type, then run the following code
                $errors[ 'type' ] = "<p class=\"error\">
                                    Incorrect File type, please try with any of the following(JPEG, PNG, GIF)
                                    </p>";
            }



            if( count( $errors ) == 0 ){

                if (RANDOMIZE_FILENAMES){

                    //unique hash for the filename
                    $hash = sha1( microtime() );

                    // get the original extension
                    $extension = explode ( '.', $_FILES[ 'avatar-icon' ][ 'name' ] );
                    $extension = array_pop( $extension );

                    //combine it all together
                    $final_location = "../images/uploads/avatar/{$hash}.{$extension}";
                }
                else {
                    $final_location = 'AVATAR_FOLDER' . $_FILES[ 'avatar-icon' ][ 'name' ];
                }


                if( move_uploaded_file( $temp_location, $final_location ) ){

                    //regular
                    resize_to_fit( $final_location,
                                  AVATAR_FOLDER,
                                  AVATAR_SIZE_SMALL,
                                  IMAGE_QUALITY );
                    //thumbnail
                    resize_to_fit( $final_location,
                                  AVATAR_FOLDER_THUMBNAIL,
                                  AVATAR_SIZE_THUMBNAIL,
                                  IMAGE_QUALITY );

                    //insert into database
                    $filename = explode( '/', $final_location );
                    $filename = array_pop( $filename );


                    //query the database
                    $query = "UPDATE
                                worldappaccount
                                SET avatar = '$filename'
                                WHERE id={$_SESSION['user_id']}" ;

                    $result = mysqli_query( $db, $query )
                        or die( $query . '<br />' . mysqli_error( $db ) );


                } else {
                    //COULD NOT MOVE FILE
                    $preview = false;

                }
            }

        } else {

            $errors[ 'file' ] = "<p class=\"error\">Please insert a proper file type</p>";
        }
    }
}

function getImage( $database ){

    $query = "SELECT image FROM
                        imagegalleries
                        WHERE id={$_SESSION['user-id']}";

    $result = mysqli_query( $database, $query )
        or die( $query . ' error: ' . mysqli_error( $database ) );

    $row = mysqli_fetch_assoc( $result );

    return $row[ 'image' ];

}

function imageUpload( $db ) {

    //IF THE FILE HAS BEEN SUBMITTED, THEN RUN THIS CODE
    if( isset( $_POST[ 'submitted' ] ) ){

        //CHECK IF THERE IS A FILENAME SUBMITTED
        if( strlen( $_FILES[ 'gallery-image' ][ 'name' ] ) > 0 ){

            $temp_location = $_FILES[ 'gallery-image' ][ 'tmp_name' ];

            if( ($_FILES[ 'gallery-image' ][ 'size' ] > MAX_FILE_SIZE ) 
               or ($_FILES[ 'gallery-image' ][ 'error' ] == UPLOAD_ERR_INI_SIZE )
              ){

                $maxSize = round( MAX_FILE_SIZE / 1024 );
                //file is too big
                $errors[ 'size' ] = "<p class=\"error\">
                                    File size is too large! Must be less than {$maxSize} KB.
                                    </p>";
            }

            //select uploaded file
            $info = getimagesize( $temp_location );
            //if file type is an image
            if( !$info 
               or ( strpos( ALLOWED_FILE_TYPES, $info[ 'mime' ] ) === false )  ){
                //file is either corrupted or not the correct file type, then run the following code
                $errors[ 'type' ] = "<p class=\"error\">
                                    Incorrect File type, please try with any of the following(JPEG, PNG, GIF)
                                    </p>";
            }



            if( count( $errors ) == 0 ){

                if (RANDOMIZE_FILENAMES){

                    //unique hash for the filename
                    $hash = sha1( microtime() );

                    // get the original extension
                    $extension = explode ( '.', $_FILES[ 'gallery-image' ][ 'name' ] );
                    $extension = array_pop( $extension );

                    //combine it all together
                    $final_location = "../images/uploads/gallery_images/{$hash}.{$extension}";
                }
                else {
                    $final_location = 'IMAGE_GALLERY_FOLDER' . $_FILES[ 'gallery-image' ][ 'name' ];

                }

                if( move_uploaded_file( $temp_location, $final_location ) ){

                    //medium
                    resize_to_fit( $final_location,
                                  IMAGE_GALLERY_FOLDER,
                                  IMAGE_GALLERY_MEDIUM,
                                  IMAGE_QUALITY );
                    //small
                    resize_to_fit( $final_location,
                                  IMAGE_GALLERY_FOLDER_SMALL,
                                  IMAGE_GALLERY_SMALL,
                                  IMAGE_QUALITY );

                    //insert into database
                    $filename = explode( '/', $final_location );
                    $filename = array_pop( $filename );

                    //query the database
                    $query = "INSERT into 
                                    imagegalleries(
                                        id,
                                        image,
                                        title,
                                    review_id_image)
                        VALUES($user_id,
                                '$filename', 
                                '$title')" ;

                    $result = mysqli_query( $db, $query )
                        or die( $query . '<br />' . mysqli_error( $db ) );


                } else {
                    //COULD NOT MOVE FILE
                    $preview = false;

                }
            }

        } else {

            $errors[ 'file' ] = "<p class=\"error\">Please insert a proper file type</p>";
        }
    }
}

function resize_to_fit( $image_filepath, $destination_folder, $dimensions, $quality ){

    $info = getimagesize( $image_filepath );

    //get the type of image it is
    $type = $info[ 'mime' ];

    //get original image width
    $original_width = $info[ 0 ];

    //get original image height
    $original_height = $info[ 1 ];

    //read the image into the web server's memory
    switch( $type ){

        case 'image/png':
            $original_image = imagecreatefrompng( $image_filepath );
            break;

        case 'image/gif':
            $original_image = imagecreatefromgif( $image_filepath );
            break;

        case 'image/jpeg':
        case 'image/jpg':
            $original_image = imagecreatefromjpeg( $image_filepath );
            break;

        default:
            return false;
            break;
    }

    //disable the blending of the alpha channel which would only create opaque pixels
    imagealphablending( $original_image, false );
    //enable the complete alpha channel so you can get translucent pixels
    imagesavealpha( $original_image, true );

    //calculate aspect ratio
    $aspect_ratio = $original_height / $original_width;

    //calculate resized width & height
    if ( $aspect_ratio > 1 ){
        //portrait image
        $resized_height = $dimensions;
        $resized_width = $resized_height / $aspect_ratio;
    } else {
        //landscape or square image
        $resized_width = $dimensions;
        $resized_height = floor($resized_width * $aspect_ratio);
    }

    //create an empty image in memory to match resized dimensions
    $resized_image = imagecreatetruecolor( $resized_width,
                                          $resized_height );

    $transparent =imagecolorallocatealpha( $resized_image, 
                                          0,
                                          0,
                                          0,
                                          127 );

    //fill the image with transparency
    imagefill( $resized_image, 0, 0, $transparent );

    //disable the blending of the alpha channel which would only create opaque pixels
    imagealphablending( $resized_image, false );
    //enable the complete alpha channel so you can get translucent pixels
    imagesavealpha( $resized_image, true );

    //copy and resample pixels from large image to small
    imagecopyresampled ( $resized_image,
                        $original_image,
                        0, 0, 0, 0,
                        $resized_width,
                        $resized_height,
                        $original_width,
                        $original_height
                       );

    //explode function breaks up a string
    $filename = explode( '/', $image_filepath );

    //array_pop takes last part of the array variable (actual file name and extension) and put it in the $filename variable
    $filename = array_pop( $filename );

    //append filename to desired destination folder
    $resized_filepath = $destination_folder . $filename;

    //write the resized image to the destination folder
    switch( $type ){

        case 'image/png':
            //convert 0 to 10 -> 9 to 0
            $png_quality = 9 - ( ( $quality / 10 ) * 9);
            imagepng( $resized_image, $resized_filepath, $png_quality );
            break;

        case 'image/gif':
            imagegif( $resized_image, $resized_filepath );
            break;

        case 'image/jpeg':
        case 'image/jpg':
            imagejpeg( $resized_image, $resized_filepath, $quality * 10 );
            break;

        default:
            return false;
            break;
    }

    //free up memory after the task is completed
    imagedestroy( $original_image );
    imagedestroy( $resized_image );

    return $resized_filepath;


}

function login( $database, $login_username, $login_password ){

    $errors = array();

    if( strlen( $login_username ) < 1 ){

        $errors[ 'userName' ] = '<p class="error"> Plase enter a valid username </p>';
    }

    if( strlen( $login_password ) < 1 ) {

        $errors[ 'password' ] = '<p class="error"> Please enter a valid password. </p>';
    }

    if( count( $errors ) == 0 ){

        $login_username = sanitize( $database, $login_username );

        $fetch_cred = "SELECT 
                            id,
                            userName,
							email,
                            password
                                FROM worldappaccount
                                WHERE userName ='$login_username'
                                LIMIT 1";

        $result = mysqli_query( $database, $fetch_cred )
            or die( mysqli_error( $database ) );

        if( mysqli_num_rows( $result ) > 0 ){

            $row = mysqli_fetch_assoc( $result );

            // If username and password are correct
            if( password_verify( $login_password, $row[ 'password' ] ) ){

                $_SESSION[ 'login_token' ] = LOGGED_IN;
                $_SESSION[ 'user_id' ] = $row[ 'id' ];
                $_SESSION[ 'userName' ] = $row[ 'userName' ];
                $_SESSION[ 'email' ] = $row[ 'email' ];

                return true;
            } else {

                $errors[ 'password' ] = '<p class="error"> Incorrect Password. Please Try Again. </p>';
            } 

        } else {

            $errors[ 'userName' ] = '<p class="error"> Incorrect Username. Please Try Again. </p>';
        }
    }
    return $errors;
}

function check_login(){

    if( strcmp( $_SESSION[ 'login_token' ], LOGGED_IN ) != 0 ){
        if( REWRITE_URLS ){
            redirect( SITE_ROOT . 'login' );
        } else {
            redirect( SITE_ROOT . '?action=login' );
        }
    }
}

function logout(){

    $_SESSION[ 'login_token' ] = null;
    $_SESSION[ 'user_id'] = null;
    $_SESSION[ 'userName' ] = null;
    $_SESSION[ 'email' ] = null;

    unset( $_SESSION[ 'login_token' ] );
    unset( $_SESSION[ 'user_id' ] );
    unset( $_SESSION[ 'userName' ] );
    unset( $_SESSION[ 'email' ] );


    redirect( SITE_ROOT );
}



//function check_signUp ( $database, $userName, $email, $password, $confirmPassword ) {
//    
//    $errors = array();
//    
//    if ( strlen($email)<1 ) {
//        $errors['signUp_email'] = '<p class="error">
//                                      Please enter a valid email.
//                                   </p>';
//    }
//    
//    if ( strlen($password)<3 ) {
//        $errors['signUp_password'] = '<p class="error">
//                                         Please enter a password more then three charactors.
//                                      </P>';
//    }
//    
//    if ( strlen($confirmPassword)<3 and strlen($errors['signUp_password'])==0 ) {
//        $errors['confirm_password'] = '<p class="error">
//                                         Please enter your password again to confirm you still remember it.
//                                      </P>';
//    }
//    
//    if ( count($errors)==0 ) {
//        
//    }
//}