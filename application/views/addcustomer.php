
<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>Quichunon - Form</title>
        <meta name="description" content="A Template by Gozha.net"> 
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="/ci/scripts/css/gozha-nav.css" rel="stylesheet" />
        <!-- Select -->
        <link href="/ci/scripts/css/external/jquery.selectbox.css" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="/ci/scripts/css/style.css?v=1" rel="stylesheet" />

        <!-- Modernizr -->
        <script src="/ci/scripts/js/external/modernizr.custom.js"></script>
    
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
                    <a href="movie-page-left.html#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                        </span>
                        </span>
                    </a>

                    <!-- Link navigation -->

                </nav>

                <!-- Additional header buttons / Auth and direct link to booking-->
				<?php include('salespersonhead.php');?>

            </div>
        </header>
        
        <!-- Search bar -->
       
        
        <!-- Main content -->
      

        <div class="contact-form-wrapper">
            <div class="container">
                <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <form id='contact-form' class="form row" method='post' novalidate="" action="/ci/index.php/salesperson/send">
                        <p class="form__title">Add New Customer</p>
                        <div class="col-sm-6">
                            <input type='text' placeholder='First Name' name="user-fname" class="form__mail">
                        </div>
						 <div class="col-sm-6">
                            <input type='text' placeholder='Last Name' name='user-lname' class="form__mail">
                        </div>
                        <div class="col-sm-6">
                            <input type='email' placeholder='email' name='user-email' class="form__mail">
                        </div>
						 <div class="col-sm-6">
                            <input type='date' placeholder='Date of Birth' name='user-dob' class="form__mail">
                        </div>
                        <div class="col-sm-12">
							<input type='text' placeholder='Address' name='user-address' class="form__mail">
                        </div>
                        <div class="col-sm-12">
							<input type='text' placeholder='(*) Phone Number' name='user-number' class="form__mail">
                        </div>
                        <button type="submit" class='btn btn-md btn--danger'>Add Customer</button>
                    </form>
                </div>
            </div>
        </div>

      
        
        <div class="clearfix"></div>

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
    </div>

    <!-- open/close -->
       

            </section>
        </div>

	<!-- JavaScript-->
        <!-- jQuery 1.9.1--> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/ci/scripts/js/external/jquery-1.10.1.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="/ci/scripts/js/external/jquery-migrate-1.2.1.min.js"></script>
        <!-- Bootstrap 3--> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <!-- Mobile menu -->
        <script src="/ci/scripts/js/jquery.mobile.menu.js"></script>
         <!-- Select -->
        <script src="/ci/scripts/js/external/jquery.selectbox-0.2.min.js"></script>

        <!--*** Google map  ***-->
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script> 
        <!--*** Google map infobox  ***-->
        <script src="/ci/scripts/js/external/infobox.js"></script>

        <!-- Form element -->
        <script src="/ci/scripts/js/external/form-element.js"></script>
        <!-- Form validation -->

		<script type="text/javascript">
            $(document).ready(function() {
                init_Contact ();
            });
		</script>

</body>
</html>
