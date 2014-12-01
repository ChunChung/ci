<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Login</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
		<meta http-equiv="refresh" content="5;url=http://localhost:8888/ci/index.php/" />

    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="/ci/scripts/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome_4.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='/ci/scripts/fonts.googleapis.com/css_5.css' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="/ci/scripts/css/gozha-nav_4.css" rel="stylesheet" />
        <!-- Select -->
        <link href="/ci/scripts/css/external/jquery.selectbox_4.css" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="/ci/scripts/css/style_4.css" rel="stylesheet" />

        <!-- Modernizr --> 
        <script src="/ci/scripts/js/external/modernizr.custom_4.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>		
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        <!-- Banner -->
     
        <!-- Header section -->
            <header class="header-wrapper header-wrapper--home">
            <div class="container">
                <!-- Logo link-->
                <a href='/ci/index.php' class="logo">
                    <img alt='logo' src="/ci/scripts/images/logo.png">
                </a>
                
                <!-- Main website navigation-->
                <nav id="navigation-box">
                    <!-- Toggle for mobile menu mode -->
                    <a href="/ci/index.php" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                            </span>
                        </span>
                    </a>
                    
                    <!-- Link navigation -->
                    
                </nav>
                
                <!-- Additional header buttons / Auth and direct link to booking-->
                <div class="control-panel">
                  
                      <a href="/ci/index.php/login" class="btn btn--sign login-window">Sign in</a>
                </div>

            </div>
        </header>
        
 <hr><hr><hr>
        <!-- Main content -->
		<div class='login'>
		<p class="login__title"><?php echo $type;?> <br><span class="login-edition"><?php echo $message;?></span></p>
		</div>
        <div class="clearfix"></div>
    </div>

     <footer class="footer-wrapper">
            <section class="container">
                <div class="col-xs-12 col-md-12">
                    <div class="footer-info">
                        <p class="heading-special--small">Quichunom<br><span class="title-edition">A Movie Rental Startup right in the heart of Pittsburgh</span></p>
                        
                        <div class="clearfix"></div>
                        <p class="copy">&copy; Quichunom Movie Rentals, 2014. Done by Omar Akhtar</p>
                    </div>
                </div>
            </section>
        </footer>

	<!-- JavaScript-->
        <!-- jQuery 1.9.1--> 
        <script src="/ci/scripts/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min_4.js"></script>
        <script>window.jQuery || document.write('<script src="js/external/jquery-1.10.1.min_4.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="/ci/scripts/js/external/jquery-migrate-1.2.1.min_4.js"></script>
        <!-- Bootstrap 3--> 
        <script src="/ci/scripts/netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min_4.js"></script>

        <!-- Mobile menu -->
        <script src="/ci/scripts/js/jquery.mobile.menu_4.js"></script>
         <!-- Select -->
        <script src="/ci/scripts/js/external/jquery.selectbox-0.2.min_4.js"></script>
        <!-- Form element -->
        <script src="/ci/scripts/js/external/form-element_4.js"></script>
        <!-- Form validation -->
        <script src="/ci/scripts/js/form_4.js"></script>

        <!-- Custom -->
        <script src="/ci/scripts/js/custom_4.js"></script>
        

</body>
</html>
