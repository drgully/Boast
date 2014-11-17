<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>2 column Google maps, foursquare (outer scroll)</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        
        <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/gmaps.js"></script>
           
	</head>
	<body>
<!-- begin template -->
<div class="navbar navbar-custom navbar-fixed-top">
 <div class="navbar-header"><a class="navbar-brand" href="#">Brand</a>
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
            <input type="text" name="search" class="form-control" placeholder="Search">
          </div>
        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </span>
          </div>
        </div>-->
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form>
    </div>
</div>

<div id="map-canvas"></div>
<div class="container-fluid" id="main">
  <div class="row">
  	<div class="col-xs-8" id="left">
    
      <h2>Bootstrap Google Maps Demo</h2>
      
      
      
			<?php 

		// Connect to the database server
		$hostname = "mysql.boast-app.org";   // eg. mysql.yourdomain.com (unique)
		$username = "boastapp";   // the username specified when setting-up the database
		$password = "Boast-App.Org";   // the password specified when setting-up the database
		$database = "boast";   // the database name chosen when setting-up the database (unique)
		$link = mysql_connect($hostname,$username,$password);
		mysql_select_db($database) or die("Unable to select database");

		$statement = $_GET['search'];
		$sql = "SELECT name, full_address, stars, latitude, longitude FROM business WHERE name LIKE '%" . stripslashes($statement) . "%'";

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
			$result=mysql_query($sql); 
			?>
            <!-- item list -->
            <div class="panel panel-default">
            	<div class="panel-heading"><?php print "Displaying " . mysql_num_rows($result) . " results for:  $statement"; ?></div>
            </div>
            <table class="table"> 
			<?php $numberfields = mysql_num_fields($result); ?>
            	<tr> 
                <?php for ($i=0; $i<$numberfields-2; $i++) 
                      {
						  $name = mysql_field_name($result, $i);
                          print "<td><b>$name</b></td>";
					  }
                      print "</tr>";
                      while($row = mysql_fetch_row($result))
					  {
						  ?><tr> 
                          <!--for ($i=0;$i<sizeof($row);$i++)-->
						  <?php for ($i=0;$i<3;$i++)
						  		{
						  			if ($row[$i]!==NULL) print "<td>$row[$i]</td>";
									else print "<td>NULL</td>";
								}
                          ?>
                          </tr>
  			    <?php } ?>
			</table>
            
        <?php
		} 
		else print " <br> Invalid SQL statement input";
		     
	 ?>
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
    
    <script type="text/javascript">
	$(document).ready(function(){
		
      var map1 = new GMaps({
        div: '#map-canvas',
        lat: 36.114647,
        lng: -115.172813,
        zoom: 12,    
            });
    
	  map1.addMarker({
       lat: 51.503324,
       lng: -0.119543,
       title: 'London Eye',
       infoWindow: {
           content: '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames in London, England. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' 
        }
      });
          
     map1.addMarker({
      lat: 51.5007396,
       lng: -0.1245299,
       icon: 'Big_Ben-icon.png',
       title: 'Big Ben',
       infoWindow: {
         content: '<p>Big Ben is the nickname for the great bell of the clock at the north end of the Palace of Westminster in London, and often extended to refer to the clock and the clock tower, officially named Elizabeth Tower.</p>'
        }
      }); 

   for (var i=3;i<=10;i++)
    { 

    map1.addMarker({
      lat: 51.5007396+i,
      lng: -0.1245299+i,
      title: ""+i,
     }); 

    }
	
	<?php
		$result=mysql_query($sql);
		while($row = mysql_fetch_row($result)) { ?>
			map1.addMarker({
					lat: <?php echo $row[3]; ?>,
					lng: <?php echo $row[4]; ?>,
					title: '<?php echo $row[0]; ?>',
					infoWindow: {content: '<p><?php echo $row[1]; ?></p>'}
			});
	<?php } ?>
	
    });

</script>
  </div>
</div>
	</body>
</html>