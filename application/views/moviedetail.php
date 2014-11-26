<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Movie page</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="/ci/scripts/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome_2.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='/ci/scripts/fonts.googleapis.com/css_3.css' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->
        <!-- jQuery UI --> 
        <link href="/ci/scripts/code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

        <!-- Mobile menu -->
        <link href="/ci/scripts/css/gozha-nav_2.css" rel="stylesheet" />
        <!-- Select -->
        <link href="/ci/scripts/css/external/jquery.selectbox_2.css" rel="stylesheet" />
        <!-- Swiper slider -->
        <link href="/ci/scripts/css/external/idangerous.swiper.css" rel="stylesheet" />
        <!-- Magnific-popup -->
        <link href="/ci/scripts/css/external/magnific-popup.css" rel="stylesheet" />

    
        <!-- Custom -->
        <link href="/ci/scripts/css/style_2.css" rel="stylesheet" />

        <!-- Modernizr --> 
        <script src="/ci/scripts/js/external/modernizr.custom_2.js"></script>  
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>		
    <![endif]-->
</head> 

<body>
    <div class="wrapper">

        <!-- Header section -->
        <header class="header-wrapper">
            <div class="container">
                <!-- Logo link-->
                <a href='/ci/index.php/' class="logo">
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
                <div class="control-panel">
                    <a href="/ci/index.php/login" class="btn btn--sign login-window">Sign in</a>
                </div>

            </div>
        </header>



        <!-- Main content -->
        <section class="container">
            <div class="col-sm-8 col-md-9">
                <div class="movie">
				<h2 class="page-heading"><?php if(isset($Title)) echo $Title;?></h2>

                    <div class="movie__info">
                        <div class="col-sm-6 col-md-4 movie-mobile">
                            <div class="movie__images">
							<img alt='' src="<?php if(isset($PictureURL)) echo $PictureURL?>">
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-8">
						<p class="movie__time"><?php if(isset($Duration)) echo $Duration;?> min</p>
                            <!--<p class="movie__option"><strong>Year: </strong><a>2012</a>
                            </p> -->

							<p class="movie__option"><strong>Release date: </strong><?php if(isset($ReleaseData)) echo $ReleaseData;?></p>
							<p class="movie__option"><strong>Director: </strong><a><?php if(isset($DirectorName)) echo $DirectorName;?></a>
                            </p>
							<p class="movie__option"><strong>Actors: </strong><a >

							<?php 
								if (isset($Actors)) {
									echo implode(", ", $Actors);
								}


							?></a><a >...</a>
                            </p>

                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h2 class="page-heading">The plot</h2>

					<p class="movie__describe"><?php echo $Description; ?></p>

       </div>


                <h2 class="page-heading">Available Stores </h2>
                <div class="choose-container">


                    <div class="clearfix"></div>
					<div class="time-select">
            

					<?php
					foreach( $Stores as $row) {
						echo "<div class=\"time-select__group\">";
						echo "<div class=\"col-sm-4\">";
                        echo "<p class=\"time-select__place\">". $row['Address'] ."</p>";
						echo "</div>";
						echo "<ul class=\"col-sm-8 items-wrap\">";
						echo "<li class=\"time-select__item\" data-time='" . $row['Quantity'] ."'>". $row['Quantity'] ."</li>";
						echo "</ul>";
						echo "</div>";
					
					}
					?>
                   	</div> 
                </div>
            </div>

        </section>

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
   

	<!-- JavaScript-->
        <!-- jQuery 1.9.1--> 
        <script src="/ci/scripts/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min_2.js"></script>
        <script>window.jQuery || document.write('<script src="/ci/scripts/js/external/jquery-1.10.1.min_2.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="/ci/scripts/js/external/jquery-migrate-1.2.1.min_2.js"></script>
        <!-- jQuery UI -->
        <script src="/ci/scripts/code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <!-- Bootstrap 3--> 
        <script src="/ci/scripts/netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min_2.js"></script>

        <!-- Mobile menu -->
        <script src="/ci/scripts/js/jquery.mobile.menu_2.js"></script>
         <!-- Select -->
        <script src="/ci/scripts/js/external/jquery.selectbox-0.2.min_2.js"></script>

        <!-- Stars rate -->
        <script src="/ci/scripts/js/external/jquery.raty_2.js"></script>
        <!-- Swiper slider -->
        <script src="/ci/scripts/js/external/idangerous.swiper.min.js"></script>
        <!-- Magnific-popup -->
        <script src="/ci/scripts/js/external/jquery.magnific-popup.min.js"></script>  

        <!--*** Google map  ***-->
        <script src="/ci/scripts/maps.google.com/maps/api/js.JS"></script> 
        <!--*** Google map infobox  ***-->
        <script src="/ci/scripts/js/external/infobox.js"></script> 

        <!-- Share buttons -->
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="http://amovie.designzway.com/s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525fd5e9061e7ef0"></script>

        <!-- Form element -->
        <script src="http://amovie.designzway.com/js/external/form-element_2.js"></script>
        <!-- Form validation -->
        <script src="http://amovie.designzway.com/js/form_2.js"></script>

        <!-- Custom -->
        <script src="http://amovie.designzway.com/js/custom_2.js"></script>
		
		<script type="text/javascript">
            $(document).ready(function() {
                init_MoviePage();
            });
		</script>

</body>
</html>
