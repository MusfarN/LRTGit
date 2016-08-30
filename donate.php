<!DOCTYPE html>
<?php
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $donorName = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "donor_Name"));
    $donorEmail = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "donor_Email"));
    $donorContact = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "donor_Contact"));
    $donorAddress = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "donor_Address"));
    $donorMessage = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "donor_Message"));
    $bookName = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "book_Name"));
    $bookAuthor = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "book_Author"));
    $bookEdition = mysqli_real_escape_string($connect , filter_input(INPUT_POST, "book_Edition"));
    
  $query_Donor = "INSERT INTO donor(donor_NAME , donor_EMAIL , donor_CONTACT , donor_ADDRESS , donor_MESSAGE) 
      VALUES('{$donorName}' , '{$donorEmail}' , '{$donorContact}' , '{$donorAddress}' , '{$donorMessage}')";
      
      $donor_Entry_Result = mysqli_query($connect, $query_Donor);     
     
  $query_Book = "INSERT INTO book(book_NAME , book_AUTHOR , book_EDITION , book_DONOR_ID)
        VALUES('{$bookName}' , '{$bookAuthor}' , '{$bookEdition}' , (SELECT book_DONOR_ID FROM donor WHERE donor_EMAIL = '$donorEmail'))";
        
        $book_Entry_Result = mysqli_query($connect, $query_Book);
        
        if($donor_Entry_Result && $book_Entry_Result){
            $printing_Message = "Thanks For Your Donation JazakALLAH.";
            echo"<script>alert('$printing_Message')</script>";
        }
        
        else{
            die("Cannot Connect to Database Server.");
        }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>DONATE | LET'S READ TOGETHER</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="headerSection text-right">
        <div class="row"> 
            <div class="container">
          <!-- First Column Starts-->
          <div class="col-sm-3"> <img class="mainLogo img-responsive" src="assets/img/logo.png"> </div>
          <!-- First Column Ends--> 
          
          <!-- Second Column Starts-->
          <div class="col-sm-9">
            <nav class="navProperties">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">HOME</a></li>
                <li><a class="active" href="donate.php">DONATE</a></li>
                <li><a href="search.php">SEARCH</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
            </div>
          </div>
          </nav>
          </div>
        </div>
      </div>
    
    

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
        <div class="donateThem">
            <div class="row">
                <div class="container">
                    <div class="col-sm-12">
                        <h2>Share With Them</h2>
                        <h5>Great satisfaction comes from sharing with others. Let's share happiness, share books.
                            <br><span style="font-style: italic;">Fill out the form and put your part in this great initiative. Place your book in our shelves and we'll share your trust to needy ones.</span>
                        </h5>
                    </div>
                   
                </div>
            </div>
            
            
            <div class="row">
                <div class="container">
                    <div class="col-sm-12">
                        <form action="donate.php" method="post">
                        <h5>Complete Name</h5>
                        <input class="form-control" type="text" placeholder="Donor's Name" name="donor_Name" required>
                        
                        <h5>Donating Book's Name</h5>
                        <input class="form-control" type="text" placeholder="Book's Name" name="book_Name" required>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Donating Book's Author</h5>
                                <input class="form-control" type="text" placeholder="Author's Name" name="book_Author" required>
                            </div>
                            <div class="col-sm-6">
                                <h5>Donating Book's Edition</h5>
                                <input class="form-control" type="text" placeholder="Book's Edition" name="book_Edition" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Email Address</h5>
                                <input class="form-control" type="email" placeholder="Donor's Email Address" name="donor_Email" required>
                            </div>
                            <div class="col-sm-6">
                                <h5>Contact Number</h5>
                                <input class="form-control" type="tel" placeholder="Donor's Contact Number" name="donor_Contact" required>
                            </div>
                        </div>
                        
                        <h5>Residential Address</h5>
                        <textarea class="form-control" placeholder="Donor's Residential Address" rows="5" name="donor_Address" required>
                        </textarea>
                        
                        <h5>Message</h5>
                        <textarea class="form-control" placeholder="Type Your Message, So We'll Focus On It." rows="5" name="donor_Message" required>
                        </textarea>
                        
                        <button class="btn btn-block" type="submit">SUBMIT</button>
                        </form>
                    </div>
                   
                </div>
            </div>
            
        </div>
	<!-- *****************************************************************************************************************
	 SERVICE LOGOS
	 ***************************************************************************************************************** -->
	 
	 
	<!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
	
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Some Ave, 987,<br/>
		 				23890, New York,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
  </body>
</html>
