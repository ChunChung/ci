<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Rates</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="/ci/scripts/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome_5.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='/ci/scripts/fonts.googleapis.com/css_6.css' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="/ci/scripts/css/gozha-nav_5.css" rel="stylesheet" />
        <!-- Select -->
        <link href="/ci/scripts/css/external/jquery.selectbox_5.css" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="/ci/scripts/css/style_5.css" rel="stylesheet" />

        <!-- Modernizr --> 
        <script src="/ci/scripts/js/external/modernizr.custom_5.js"></script>
    
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
                <a href='/ci/index.php/' class="logo">
                    <img alt='logo' src="/ci/scripts/images/logo.png">
                </a>
                
                <!-- Main website navigation-->
                <nav id="navigation-box">
                    <!-- Toggle for mobile menu mode -->
                    <a href="index.html#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                            </span>
                        </span>
                    </a>
                    
                    <!-- Link navigation -->
                    
                </nav>
                
                <!-- Additional header buttons / Auth and direct link to booking-->
				<?php include('salespersonhead.php'); ?>

            </div>
        </header>
<hr>
        <hr>

        <div class="search-wrapper">
            <div class="container container--add">
                <form id="search-form" method="post" class="search" action ="moviebycustomer">
                    <input type="text" name="mobileNumber" class="search__field" placeholder="Enter customer phone number">
                    <button type="submit" class="btn btn-md btn--danger search__button">search customer</button>
                </form>
            </div>
        </div>
        <!-- Search bar -->
        <hr><hr>
        <!-- Main content -->
        <section class="container">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="page-heading">Transactions</h2>

                        <div class="rates-wrapper rates--full">
                            
                            <table>
                                <colgroup class="col-width">
                                <colgroup class="col-width">
                                <colgroup class="col-width-lg">
                                <colgroup class="col-width">



<tr class="rates rates--top">
	<td class="rates__head"> Customer Name</td>
	<td class="rates__head">Borrow Date</td>
	<td class="rates__head">Movies</td>
	<td class="rates__result">Confirm</td>
								</tr>



								<?php 
									if(isset($Transactions)) {
										foreach ($Transactions as $row) {
											echo "<tr class=\"rates rates--top\">";
											echo "<form method=\"post\" action=\"/ci/index.php/salesperson/returnm\">";
                                    echo "<td class=\"rates__vote\"><a href=\"rates-full.html#\" class=\"rates__obj-name\">" . $row['Name']. "</a></td>";
									echo "<td class=\"rates__vote\">" .	$row['BorrowDate']."</td>";
									echo "<td class=\"rates__vote\" >";
										foreach($row['Movies'] as $Movie) {
											echo "<p>".$Movie."</p>";
										}
									echo "</td>";
									echo "<td class=\"rates__result\">
										<input type=\"hidden\" name=\"TID\"value=\"".$row['TID']."\">
										<button class=\"btn\">Return</button></td>";
									echo "</form>";
											echo "</tr>";
										
										}
									
									}
								?>
                               

                            </table>
                        </div>

                 
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


	<!-- JavaScript-->
        <!-- jQuery 1.9.1--> 
        <script src="/ci/scripts/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min_5.js"></script>
        <script>window.jQuery || document.write('<script src="js/external/jquery-1.10.1.min_5.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="/ci/scripts/js/external/jquery-migrate-1.2.1.min_5.js"></script>
        <!-- Bootstrap 3--> 
        <script src="/ci/scripts/netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min_5.js"></script>

        <!-- Mobile menu -->
        <script src="/ci/scripts/js/jquery.mobile.menu_5.js"></script>
         <!-- Select -->
        <script src="/ci/scripts/js/external/jquery.selectbox-0.2.min_5.js"></script>
        <!-- Stars rate -->
        <script src="/ci/scripts/js/external/jquery.raty_4.js"></script>

        <!-- Form element -->
        <script src="/ci/scripts/js/external/form-element_5.js"></script>
        <!-- Form validation -->
        <script src="/ci/scripts/js/form_5.js"></script>

        <!-- Custom -->
        <script src="/ci/scripts/js/custom_5.js"></script> 
		
		<script type="text/javascript">

            $(document).ready(function() {
                init_Rates();
            });
		</script>

</body>
</html>
