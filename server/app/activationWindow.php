<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="description" content="TWINDER <?php echo $meta_description ;?>	" />
<meta name="keywords" content="TWINDER  <?php echo $meta_keywords; ?> " /> 


<link href="../css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/jquery.timepicker.css" rel="stylesheet" media="screen">
 	<link rel="stylesheet" href="../packages/dist/sweetalert.css">
<link href="../css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="../css/font-awesome.min.css">

<link href="../style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="../style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="../style/custom.css"  media="screen" />
<title><?php echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="../css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="../css/pink.css" rel="stylesheet" type="text/css" />';
  }
  
?>

	<link rel="stylesheet" href="../src/update.css" />
<!-- js -->			
<script src="../style/jquery.js" type="text/javascript"></script>
<link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" /> 
<script src="../src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $('a[rel*=facebox]').facebox({
      loadingImage : '../src/loading.gif',
      closeImage   : '../src/closelabel.png'
    })
  })
</script> 

  </head>
<body class="body_class">
 
	<div class="mainBeedyContainer"> 
<?php// include ('../'.INCLUDES_PATH . DS .'header.cbt.php');  ?>
	
<!--top menu -->
<div class="topMenu"> 
  
				 
	 <font style="color:darkblue; font:bold 24px 'cambria';"><i class="icon-table"></i>SOFTWARE ACTIVATION WINDOW	</font>
	 <input type="text" style="  background:white; border:none; font-size:16px;  font-weight:bolder;  " class="clock" id="clock" />
	
<nav class="navbar navbar-static-top pull-right" role="navigation"> 
<div> 
<ul class="nav navbar-nav">
 
<!-- <li><a href="../?pid=1&action=default">Home</a></li>    -->
  <li><a href="../log/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
</ul>
</div>
</nav>

</div>
<!--top menu -->
<div class="row"> 
 <div class="col-md-12" > 

 <?php  
				include($arr_pages[$pid]['view'] . ".php");
		 
			?>
</div>
</div>



</div>
<script src="../packages/dist/sweetalert.min.js"></script>
<script type="text/JavaScript" src="../style/bootstrap.min.js"></script>
<script type="text/JavaScript" src="../style/respond.min.js"></script>
<script type="text/JavaScript" src="../style/beedy.js"></script>
<script type="text/JavaScript" src="../style/beedyScript.js"></script>
  

 <script language="javascript" type="text/javascript"> 
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.getElementById("clock").value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() { 
stopclock();
showtime();
}
 startclock();
// End -->
</SCRIPT>
  
</body>
</html>