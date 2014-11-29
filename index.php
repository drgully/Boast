<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Boast</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        
	</head>
	<body>
<!-- begin template -->
<div class="navbar navbar-custom navbar-fixed-top">
 <div class="navbar-header"><a class="navbar-brand" href="/">Boast</a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li>&nbsp;</li>
      </ul>
      <form class="navbar-form" role="search" action="<?php print "results.php" ?>" method="get">
        <div class="form-group" style="display:inline;">
          <!--<div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Category 1</a></li>
                <li><a href="#">Category 2</a></li>
                <li><a href="#">Category 3</a></li>
                <li><a href="#">Category 4</a></li>
                <li><a href="#">Category 5</a></li> 
              </ul>
            </div>-->
            <input type="text" name="keyword" class="form-control" placeholder="Keyword">
            <input type="text" name="city" class="form-control" placeholder="City">
            <input type="hidden" name="stars" value="1.0">
          
        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </span>
          </div>
        </div>-->
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </form>
    </div>
</div>

<div id="map-canvas"></div>
<div class="container-fluid" id="main">
  <div class="row">
  	<div class="col-xs-8" id="left">
    
      <h2>Bootstrap Google Maps Demo</h2>
      
      <!-- item list -->
      <div class="panel panel-default">
        <div class="panel-heading"><a href="">Item heading</a></div>
      </div>
            
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>
      
      <hr>
      
      <div class="panel panel-default">
        <div class="panel-heading"><a href="">Item heading</a></div>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>
      
      <hr>
      
      <div class="panel panel-default">
        <div class="panel-heading"><a href="">Item heading</a></div>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>
      
      <hr>
      
      <div class="panel panel-default">
        <div class="panel-heading"><a href="">Item heading</a></div>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>
      
      <hr>
      <!-- /item list -->
      
      <p>
      <a href="http://www.bootply.com/render/129229">Demo</a> | <a href="http://bootply.com/129229">Source Code</a>
      </p>
      
      <hr> 
        
      <p>
      <a href="http://bootply.com" target="_ext" class="center-block btn btn-primary">More Bootstrap Snippets on Bootply</a>
      </p>
        
      <hr>      

    </div>
    <div class="col-xs-4"><!--map-canvas will be postioned here--></div>
    
  </div>
</div>
<!-- end template -->

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/gmaps.js"></script>
        
		<script type="text/javascript">
		$(document).ready(function(){
      var map = new GMaps({
        div: '#map-canvas',
        lat: 34.849754,
        lng: -113.637838,
        zoom: 7 ,    
            });
     
    });

		</script>
	</body>
</html>