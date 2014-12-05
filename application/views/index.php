<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="/ci/scripts/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='/ci/scripts/fonts.googleapis.com/css.css' rel='stylesheet' type='text/css'>
        <!-- Open Sans -->
        <link href='/ci/scripts/fonts.googleapis.com/css_2.css' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="/ci/scripts/css/gozha-nav.css" rel="stylesheet" />
        <!-- Select -->
        <link href="/ci/scripts/css/external/jquery.selectbox.css" rel="stylesheet" />

        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="/ci/scripts/rs-plugin/css/settings.css" media="screen" />
    
        <!-- Custom -->
        <link href="/ci/scripts/css/style.css" rel="stylesheet" />


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
                    <a href="index.php#" id="navigation-toggle">
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
                      <a href="/ci/index.php/login" class="btn btn--sign ">Sign in</a>
                     <a href="/ci/index.php/login/logout" class="btn btn--sign ">Log out</a>
                </div>

            </div>
        </header>

        <!-- Slider -->
          <div class="bannercontainer" style="overflow: visible;">
            <div class="banner revslider-initialised tp-simpleresponsive" id=
            "revslider-156" style="height: 220px;"></div>
        </div><!--end slider, need to keep this but of no use Chun -->
        <!-- Main content -->

        <section class="container">
            <div class="movie-best">
                <div class="col-sm-10 col-sm-offset-1 movie-best__rating">
                    Our Latest Release
                </div>
                 <div class="col-sm-12 change--col">
					 <?php 
						if(isset($Hits)) {
							foreach($Hits as $row) {
								echo "<div class=\"movie-beta__item hidden-xs\">";
								echo "<img alt='' src=\"". $row['PictureURL']. "\" height=\"300\" width=\"190\">";
								echo "<ul class=\"movie-beta__info\">";
								echo "<li>";
								echo "<p class=\"movie__time\">" . $row['Duration'] ."</p>";
								echo "<p>" . $row['Genre'] . "</p>";
								echo "</li>";
								echo "<li class=\"last-block\">";
								echo "<a href=\"/ci/index.php/movies/index/" . $row['MovieID']. "\" class=\"slide__link\">more</a>";
								echo "</li>";
								echo "</ul>";
								echo "</div>";
						
							}
						}

					 ?>
                 </div>
                <div class="col-sm-10 col-sm-offset-1 movie-best__check">check all movies available for rent</div>
            </div>

            <div class="col-sm-12">
                <div class="mega-select-present mega-select-top mega-select--full">
                    <div class="mega-select-marker">
                        <div class="marker-indecator location">
                            <p class="select-marker"><span>movie to rental now</span> <br>in pittsburgh</p>
                        </div>

                    </div>
                      <div class="mega-select pull-right">
                          <span class="mega-select__point">Search by</span>
                          <ul class="mega-select__sort">
                              <li class="filter-wrap mega-select__filter filter--active" data-filter='location'>Movie Name</li>
                            
                          </ul>

						  <form method="post" action="/ci/index.php/welcome/findmovie" >
                          <input name="inputMovie" type='text' class="select__field">
                          
                          <div class="select__btn">
                            <button class="btn btn-md btn--danger location">find your Movie</button>
                          </div>
						  </form>
                      </div>
                  </div>
            </div>
            
            <div class="clearfix"></div>

            <h2 id='target' class="page-heading heading--outcontainer">What everyone is renting</h2>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 col-md-9">
					 <?php 
						$right = 0;
						$color = 0;
						$leftRight = ['movie--test--left'];
						$darkLight = ['movie--test--dark', 'movie--test--light', "movie--test--light", "movie--test--dark"];
						if(isset($Ratings)) {
							foreach($Ratings as $row) {
								echo "<div class=\"movie movie--test ". $darkLight[$color%4] . " " . $leftRight[0] ."\">";
									echo "<div class=\"movie__images\">";
										echo "<a href=\"/ci/index.php/movies/index/" .$row['MovieID']. "\" class=\"movie-beta__link\">";
                                        	echo "<img alt='' src=\"". $row['PictureURL']."\" height=\"212\" width=\"212\">";
										echo "</a>";
									echo "</div>";
									echo "<div class=\"movie__info\">";
										echo "<a href=\"/ci/index.php/movies/index/" .$row['MovieID']. "\" class=\"movie__title\">" . $row['Title'] . "</a>";
										echo "<p class=\"movie__time\">" . $row['Duration'] . "</p>";
										echo "<p class=\"movie__option\">" . $row['Genre'] . "</p>";
									echo "</div>";
								echo "</div>";
								$color +=1;
							}
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
        <script src="/ci/scripts/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/ci/scripts/js/external/jquery-1.10.1.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="/ci/scripts/js/external/jquery-migrate-1.2.1.min.js"></script>
        <!-- Bootstrap 3--> 
        <script src="/ci/scripts/netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <!-- jQuery REVOLUTION Slider -->
        <script type="text/javascript" src="/ci/scripts/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="/ci/scripts/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Mobile menu -->
        <script src="/ci/scripts/js/jquery.mobile.menu.js"></script>
         <!-- Select -->
        <script src="/ci/scripts/js/external/jquery.selectbox-0.2.min.js"></script>
        <!-- Stars rate -->
        <script src="/ci/scripts/js/external/jquery.raty.js"></script>
        
        <!-- Form element -->
        <script src="/ci/scripts/js/external/form-element.js"></script>
        <!-- Form validation -->
        <script src="/ci/scripts/js/form.js"></script>

        <!-- Twitter feed -->
        <script src="/ci/scripts/js/external/twitterfeed.js"></script>

        <!-- Custom -->
        <script src="/ci/scripts/js/custom.js"></script>
		
	      <script type="text/javascript">
              $(document).ready(function() {
                init_Home();
              });
		    </script>

</body>
</html>
