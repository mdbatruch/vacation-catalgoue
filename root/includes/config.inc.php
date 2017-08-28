<?php

    //set the timezome to EST
    date_default_timezone_set('America/Toronto');

    //site title for whole site
    define( 'SITE_TITLE', 'Vacation Spot');

    
    //database configuration
    define( 'DB_HOST',      'localhost' );
    define( 'DB_USER',      'vacationcatalog' );
    define( 'DB_PASSWORD',  'Humber-WDDM' );
    define( 'DB_NAME',      'vacationcatalog' );

//    // pam
//    define( 'DB_HOST',      'db685357870.db.1and1.com' );
//    define( 'DB_USER',      'dbo685357870' );
//    define( 'DB_PASSWORD',  '1234567' );
//    define( 'DB_NAME',      'db685357870' );

    //avatar upload configuration
    define( 'AVATAR_FOLDER', '../images/uploads/avatar/' );
    define( 'AVATAR_FOLDER_THUMBNAIL', '../images/uploads/avatar-thumbnail/' );
    define( 'AVATAR_SIZE_THUMBNAIL', 100);
    define( 'AVATAR_SIZE_SMALL', 300);
    define( 'IMAGE_GALLERY_FOLDER', '../images/uploads/gallery_images/');
    define( 'IMAGE_GALLERY_FOLDER_SMALL', '../images/uploads/gallery_images_small/' );
    define( 'IMAGE_GALLERY_SMALL', 300);
    define( 'IMAGE_GALLERY_MEDIUM', 600);
    define( 'MAX_FILE_SIZE', 5242880);
    define( 'RANDOMIZE_FILENAMES', true);
    define( 'ALLOWED_FILE_TYPES', "image/jpeg,image/png,image/gif" );
    define( 'IMAGE_QUALITY', 8);



    define( 'SITE_ROOT', '/');

//    if( strcmp( $_SERVER[ 'SERVER_NAME' ], 'mike-batruch.ca' ) == 0 ){
//        define( 'DB_HOST',      'localhost' );
//        define( 'DB_USER',      'world-app-user' );
//        define( 'DB_PASSWORD',  'Humber-WDDM' );
//        define( 'DB_NAME',      'world-app-db' );
//		define( 'SITE_ROOT', 	'/world-app/');
//    } else {
//        // mamp
//        define( 'DB_HOST',      'localhost' );
//        define( 'DB_USER',      'root' );
//        define( 'DB_PASSWORD',  'root' );
//        define( 'DB_NAME',      'world-app-db' );
//		define( 'SITE_ROOT', 	'/');
//    }

    
    //check if logged in or not
    define( 'LOGGED_IN', 'fdsfdasfsfsawfgarggnrns');