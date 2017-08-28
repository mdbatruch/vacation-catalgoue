<?php
    $config->pageTitle = '404 No Found';
    $config->siteTitle = 'Vacation Spot App';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        
        <title>
            <?php echo $config->pageTitle;?> - <?php echo $config->siteTitle;?>
        </title>
        
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/font-awesome.css" />
        
        <!-- HTML5Shiv: adds HTML5 tag support for older IE browsers -->
        <!--[if lt IE 9]>
	    <script src="js/html5shiv.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
    
        <main>
            <section id="contain_404">
                
                <h1>Oops!</h1>
                
                <ul>
                    <li>4</li>
                    <li>
                        <div class="noFound_loader"></div>
                    </li>
                    <li>4</li>
                </ul>
                
                <h2>Uh-oh...something is wrong here.</h2>
                
                <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                
<!--BACK TO HOMEPAGE ??-->
                <a href="">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                    Return to Home Page
                </a>
                
            </section>
        </main>
    
    </body>
</html>