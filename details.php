<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Boast | Details</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

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
        <li><a href="#">About</a></li>
        <li>&nbsp;</li>
       <!-- <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li>&nbsp;</li>-->
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
    
      
      
	  <?php
      	include 'connection.php';
		$business = $_GET['id'];
		
		$sql = "SELECT * FROM business WHERE business_id = '$business';";
		
		if(!(strpos($sql,"create")===false)||!(strpos($sql,"CREATE")===false))
		{
			?> <br> CREATE STATEMENT IS PROHIBITED <?php
        }
		elseif (!(strpos($sql,"drop")===false)||!(strpos($sql,"DROP")===false))
		{
			?> <br> DROP STATEMENT IS PROHIBITED <?php
		}
		elseif (!(strpos($sql,"insert")===false)||!(strpos($sql,"INSERT")===false))
		{
			mysql_query($sql) or die("query error£¡");
			printf("%d row inserted\n", mysql_affected_rows());
		}
		elseif (!(strpos($sql,"delete")===false)||!(strpos($sql,"DELETE")===false))
		{
			mysql_query($sql) or die("query error£¡");
			printf("%d rows deleted\n", mysql_affected_rows());
		}
        elseif(!(strpos($sql,"update")===false)||!(strpos($sql,"UPDATE")===false))
        {
			mysql_query($sql) or die("query error£¡"); print " Table Updated\n"; 
		}
        elseif(!(strpos($sql,"select")===false)||!(strpos($sql,"SELECT")===false))
        {
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
		} 
		else print " <br> Invalid SQL statement input";
				
		$sql_hours = "SELECT * FROM hours WHERE business_id = '$business';";
		
		$result_hours = mysql_query($sql_hours);
		$row_hours = mysql_fetch_row($result_hours);
      ?>
      <h2><?php echo $row[2] ?></h2>
      
      <div class="panel panel-default">
        <div class="panel-heading">
        <?php
            if($row[11] == 1)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 1.5)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 2)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 2.5)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 3)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 3.5)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 4)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 4.5)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i> $row[12] reviews";
			}
			else if($row[11] == 5)
			{
				print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i> $count reviews";
			}
		?>
        </div>
      </div>
      
      <table class="table">
      <tr><th><b>Address</b></th><th><b>Hours</b></th></tr>
      	<tr>
        	<td><?php echo nl2br($row[4]) ?></td>
            <td><table>
            	<tr><td>Mon:</td><td><?php echo $row_hours[1]; ?> - <?php echo $row_hours[2]; ?></td></tr>
            	<tr><td>Tues:</td><td><?php echo $row_hours[3]; ?> - <?php echo $row_hours[4]; ?></td></tr>
                <tr><td>Wed:</td><td><?php echo $row_hours[5]; ?> - <?php echo $row_hours[6]; ?></td></tr>
                <tr><td>Thur:</td><td><?php echo $row_hours[7]; ?> - <?php echo $row_hours[8]; ?></td></tr>
                <tr><td>Fri:</td><td><?php echo $row_hours[9]; ?> - <?php echo $row_hours[10]; ?></td></tr>
                <tr><td>Sat:</td><td><?php echo $row_hours[11]; ?> - <?php echo $row_hours[12]; ?></td></tr>
                <tr><td>Sun:</td><td><?php echo $row_hours[13]; ?> - <?php echo $row_hours[14]; ?></td></tr>
            </table></td>
        </tr>
      </table>
      <!-- item list -->
      
      
      <?php
      	$sql_reviews = "SELECT stars, date, text FROM review WHERE business_id = '$business' ORDER BY stars DESC";
		
		$query_count = mysql_query($sql_reviews);
		$per_page = 10;	//define how many results for a page
		$count = mysql_num_rows($query_count);
		$pages = ceil($count/$per_page);

		if($_GET['page']==""){
			$page="1";
		}else{
			$page=$_GET['page'];
		}
		$start = ($page - 1) * $per_page;
		$sql_reviews = $sql_reviews." LIMIT $start,$per_page";
		
		$result_reviews = mysql_query($sql_reviews);
      ?>
      
      <p>
      	<table class="table">
        <?php $numberfields = mysql_num_fields($result_reviews);
			$rcount = $start;
			  while($rrow = mysql_fetch_row($result_reviews))
			  {
				  $rcount++;	  
				?>
					<?php echo "<tr><td><div class=\"panel panel-default\"><div class=\"panel-heading\">$rcount. ";
					
					if($rrow[0] == 1)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 1.5)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 2)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 2.5)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 3)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 3.5)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 4)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i>";
					}
					else if($rrow[0] == 4.5)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i>";
					}
					else if($rrow[0] == 5)
					{
						print "<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i>";
					}
					
					// The Regular Expression filter
					$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
					// The Text you want to filter for urls
					$text = nl2br($rrow[2]);
					// Check if there is a url in the text
					if(preg_match($reg_exUrl, $text, $url)) {
						   // make the urls hyper links
						   $review = preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);
					} else {
						   // if no urls in the text just return the text
						   $review = $text;
					}
						
					print ", ".$rrow[1]."</div></div><p>".$review."</p></td></tr>"; ?>
		<?php } ?>
		</table>
     <nav>
     <ul class="pagination">
     <li><a href="details.php?id=<?php echo $business;?>&page=<?php if($page > 1){echo $page-1;}else{echo 1;}?>" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
		<?php
         //Show page links
		$first = 1;
		if($page > 10) $first = floor(($page-1) / 10) * 10 + 1;
		if($first + 9 < $pages) $last = $first + 9;
		else $last = $pages;
		
        for ($i = $first; $i <= $last; $i++)
          {?>
          <li class="<?php if($i == $page){echo "active";}?>" id="<?php echo $i;?>"><a href="details.php?id=<?php echo $business;?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
          <?php           
          }
        ?>
        <li><a href="details.php?id=<?php echo $business;?>&page=<?php if($page < $pages){echo $page+1;}else{echo $pages;}?>"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
      </ul>
      </nav>
      </p>
      
      <hr>
      
      <p>
      <a href="http://www.valdosta.edu" target="_ext" class="center-block btn btn-primary">&copy; 2014, Valdosta State University</a>
      </p>
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
				var lati = Number(<?php echo $row[7]; ?>);
				var long = Number(<?php echo $row[8]; ?>);
							
				var map = new GMaps({
					div: '#map-canvas',
					lat: lati,
					lng: long,
					zoom: 5,    
				});
     
				map.addMarker({
					lat: lati,
					lng: long,
					title: '',
					infoWindow:
					{
					   content: '<p></p>' 
					}
				});
				
				GMaps.geolocate({
					success: function(position){
						map.setCenter(position.coords.latitude, position.coords.longitude);
						map.drawRoute({
							origin: [position.coords.latitude, position.coords.longitude],
							destination: [lati, long],
							travelMode: 'driving',
							strokeColor: '#131540',
							strokeOpacity: 0.6,
							strokeWeight: 6
						});
					},
					error: function(error){
						alert('Geolocation failed: '+error.message);
					},
					not_supported: function(){
						alert("Your browser does not support geolocation");
					}
				});
			});
		</script>    
	</body>
</html>