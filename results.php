<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Boast | Results</title>
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
        <!--<li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>-->
        <li>&nbsp;</li>
      </ul>
      <form class="navbar-form" role="search" action="<?php print "results.php" ?>" method="get">
        <div class="form-group" style="display:inline;">
            <input type="text" name="keyword" class="form-control" placeholder="Keyword">
            <input type="text" name="city" class="form-control" placeholder="City">
            <input type="hidden" name="stars" value="1.0">
        	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </form>
    </div>
</div>

<div id="map-canvas"></div>
<div class="container-fluid" id="main">
  <div class="row">
  	<div class="col-xs-8" id="left">
    
      <h2>Search Results</h2>
      
      <h4>Filter minimum stars:</h4>
		<?php
			$keyword = $_GET['keyword'];
			$keyword = str_replace("'s", '', $keyword);
			$keyword = str_replace("'", '', $keyword);
			$city = $_GET['city'];
			$limit = $_GET['stars'];
        ?>

<p>
<div class="button-container">
<form role="search" action="<?php print "results.php" ?>" method="get">
<div>
<button type="submit" class="btn btn-warning btn-sm">
  <span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span>
  <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
  <input type="hidden" name="city" value="<?php echo $city; ?>">
  <input type="hidden" name="stars" value="5.0">
</button>
</div>
</form>

<form role="search" action="<?php print "results.php" ?>" method="get">
<div>
<button type="submit" class="btn btn-warning btn-sm">
  <span class="fa fa-star " aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span>
  <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
  <input type="hidden" name="city" value="<?php echo $city; ?>">
  <input type="hidden" name="stars" value="4.0">
</button>
</div>
</form>

<form role="search" action="<?php print "results.php" ?>" method="get">
<div>
<button type="submit" class="btn btn-warning btn-sm">
  <span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span>
  <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
  <input type="hidden" name="city" value="<?php echo $city; ?>">
  <input type="hidden" name="stars" value="3.0">
</button>
</div>
</form>

<form role="search" action="<?php print "results.php" ?>" method="get">
<div>
<button type="submit" class="btn btn-warning btn-sm">
  <span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span>
  <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
  <input type="hidden" name="city" value="<?php echo $city; ?>">
  <input type="hidden" name="stars" value="2.0">
</button>
</div>
</form>

<form role="search" action="<?php print "results.php" ?>" method="get">
<div>
<button type="submit" class="btn btn-warning btn-sm">
  <span class="fa fa-star" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span><span class="fa fa-star-o" aria-hidden="true"></span>
  <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
  <input type="hidden" name="city" value="<?php echo $city; ?>">
  <input type="hidden" name="stars" value="1.0">
</button>
</div>
</form>
</div>
</p>
     
<?php 
		include 'connection.php';

		$sql = "SELECT name, full_address, stars, latitude, longitude, review_count, business_id FROM business WHERE (name LIKE '%" . stripslashes($keyword) . "%' OR categories LIKE '%" . stripslashes($keyword) . "%') AND full_address LIKE '%" . stripslashes($city) . "%' AND stars >= $limit ORDER BY review_count DESC";

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
			$query_count = mysql_query($sql);
			$per_page = 10;	//define how many results for a page
			$count = mysql_num_rows($query_count);
			$pages = ceil($count/$per_page);

			if($_GET['page']==""){
				$page="1";
			}else{
				$page=$_GET['page'];
			}
			$start = ($page - 1) * $per_page;
			$sql = $sql." LIMIT $start,$per_page";			
			
			// create JSON for map
			$sth = mysql_query($sql);
			$rows = array();
			while($r = mysql_fetch_assoc($sth)) {
				$rows[] = $r;
			}
			$json = json_encode($rows);
			//print $json;
			
			$result = mysql_query($sql);
			
			?>
            
            <!-- item list -->
            <div class="panel panel-default">
            	<div class="panel-heading"><?php print "$count results for:  <b>$keyword</b> in <b>$city</b> rated <b>$limit</b>"; if($limit > 1.0) print " stars"; else print " star"; if($limit < 5) print " and above"; ?></div>
            </div><p>
            <table class="table">
            <tr><th>Name</th><th>Address</th></tr> 
			<?php $numberfields = mysql_num_fields($result);
                	  while($row = mysql_fetch_row($result))
					  {
						  ?><tr> 
                          <!--for ($i=0;$i<sizeof($row);$i++)-->
						  <?php 
								if ($row[0]!==NULL)
								{
									// 0 = name, 1 = address, 2 = rating
									print "<td><a href=\"details.php?id=$row[6]\">$row[0]</a>";
									if($row[2] == 1)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 1.5)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 2)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 2.5)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 3)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 3.5)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 4)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 4.5)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i> $row[5] reviews</td>";
									}
									else if($row[2] == 5)
									{
										print "<br><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i> $row[5] reviews</td>";
									}
									print "<td>".nl2br($row[1])."</td>";
								}
								else print "<td>NULL</td>";
                          ?>
                          </tr>
  			    <?php } ?>
			</table>
        <?php
		} 
		else print " <br> Invalid SQL statement input";
		     
	 ?>

     <nav>
     <ul class="pagination">
     <li><a href="results.php?keyword=<?php echo $keyword;?>&city=<?php echo $city;?>&stars=<?php echo $limit ?>&page=<?php if($page > 1){echo $page-1;}else{echo 1;}?>" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
		<?php
        //Show page links
		$first = 1;
		if($page > 10) $first = floor(($page-1) / 10) * 10 + 1;
		if($first + 9 < $pages) $last = $first + 9;
		else $last = $pages;
		
        for ($i = $first; $i <= $last; $i++)
          {?>
          <li class="<?php if($i == $page){echo "active";}?>" id="<?php echo $i;?>"><a href="results.php?keyword=<?php echo $keyword;?>&city=<?php echo $city;?>&stars=<?php echo $limit ?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
          <?php           
          }
        ?>
        <li><a href="results.php?keyword=<?php echo $keyword;?>&city=<?php echo $city;?>&stars=<?php echo $limit ?>&page=<?php if($page < $pages){echo $page+1;}else{echo $pages;}?>"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
      </ul>
      </nav>
  <hr>
	  <p>
      <a href="http://www.valdosta.edu" target="_ext" class="center-block btn btn-primary">&copy; 2014, Valdosta State University</a>
      </p>    

    </div>
    <div class="col-xs-4"><!--map-canvas will be postioned here--></div>
       
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
<script src="js/gmaps.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var results = <?php echo $json ?>;		
		var lati = "36.114647";
		var long = "-115.172813";
		var bounds = new google.maps.LatLngBounds();
		
		if(results.length > 2)
		{
			lati = results[0].latitude;
			long = results[0].longitude;
		}
		
		var map = new GMaps({
			div: '#map-canvas',
			lat: lati,
			lng: long,
			zoom: 12,    
		});
		
		for (var i=0; i<10; i++)
		{
			var bus = results[i].business_id;
			var tit = results[i].name;
			var inf = results[i].full_address.replace(/"/g, "");
			inf = inf.replace(/(?:\r\n|\r|\n)/g, '<br />');
			inf = "<p><b><a href=\"details.php?id=" + bus + "\">" + tit + "</a></b><br />" + inf + "</p>";
			
			map.addMarker({
				lat: results[i].latitude,
				lng: results[i].longitude,
				title: tit,
				infoWindow: {
					content: inf
				}
			});
			
			var latlng = new google.maps.LatLng(results[i].latitude, results[i].longitude);
			bounds.extend(latlng);
		}
		
		map.fitBounds(bounds);
		
	
	});
</script>
   
  	</div>
	</div>
	</body>
</html>