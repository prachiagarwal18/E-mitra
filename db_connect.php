<?php
$c = mysql_connect("localhost","root","root");
if (!$c)
{
   die('Could not connect: '.mysql_error());
}
$service=$_POST['service'];
switch($service)
{
    case "ration card":mysql_select_db("temporary", $c);
                       select_district();
                       break;
    case "bhamashah card":mysql_select_db("temporary1", $c);
                       select_district();
                       break;                   
}
function select_district()
{
    if(isset($_POST["submit"]))
    {
        $service=$_POST['service'];
        $district=$_POST['district'];
        mysql_query("INSERT INTO data (service,district) VALUES('$service','$district')");
    }    
        $a1=mysql_query("SELECT apply,issue FROM info");
        $a2=mysql_num_rows($a1);
        $arr=array();
        $arr_1=mysql_fetch_array(mysql_query("SELECT apply,issue FROM info"));

     if (isset($_POST['submit'])) {
        include 'index.php';
    } else {
        include 'db_connect.php';
    }
       if($district=="all" )
        {   
            for($j=0;$j<$a2;$j++)
            {
                $arr[]=$arr_1;
            }
        $query=mysql_query("SELECT issue,apply FROM info WHERE info.district='AJMER'");
        $rows=mysql_num_rows($query);
       $s1 = array();
while ($s2 = mysql_fetch_array($query)) 
{
    $s1[] = $s2;
}
$sum1=0;
for($i=0;$i<$rows;$i++)
{  echo '<pre>';
$date_1=$s1[$i][0];
$date_2=$s1[$i][1];
    $start=strtotime($date_1);
    $end=strtotime($date_2);
    $datediff=$start-$end;
     $value=round($datediff/86400);
     $sum1=$sum1+$value;
     
}
$avg1=round($sum1/$rows);
printf("Average no. of days for Ajmer=%d ",$avg1);
$query1=mysql_query("SELECT issue,apply FROM info WHERE info.district='JAIPUR'");
        $rows1=mysql_num_rows($query1);
        $p1 = array();
while ($p2 = mysql_fetch_array($query1)) {
    $p1[] = $p2;
}
$sum2=0;
for($i=0;$i<$rows1;$i++)
{  echo '<pre>';
$date_1=$p1[$i][0];
$date_2=$p1[$i][1];
    $start=strtotime($date_1);
    $end=strtotime($date_2);
    $datediff=$start-$end;
     $value=round($datediff/86400);
     $sum2=$sum2+$value;
 }
$avg2=round($sum2/$rows1);
printf("Average no. of days for JAIPUR=%d ",$avg2);
$dataPoints = array
( 
    array("y" => $avg1, "label" => "jaipur" ),
    array("y" => $avg2, "label" => "ajmer" )
);
$dataPoints1 = array
( 
    array("y" => 30, "label" => "jaipur" ),
    array("y" => 30, "label" => "ajmer" )
);
?>
<!DOCTYPE html>
<html>
<head>
<script>
window.onload = function() {
 var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    backgroundColor:"#F5DEB3",
    title:{
        text: "delay time"
    },
    axisY: {
        title: "delay (in days)"
    },
    data: [{
        type: "column",
        name:"Average delay(in days)",
        indexLabel:"{y}",
        indexLabelPlacement:"inside",
        indexLabelFontWeight:"bolder",
        indexLabelFontColor:"white",
        yValueFormatString: "##0 days",
        showInLegend: true,
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    },
    {
        type:"column",
        name:"Govt. specified time",
        indexLabel:"{y}",
        indexLabelPlacement:"inside",
        indexLabelFontWeight:"bolder",
        indexLabelFontColor:"white",
         yValueFormatString: "##0 days",
         showInLegend: true,
         dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
function toggleDataSeries(e)
{
    if(typeof(e.dataSeries.visible)==="undefined"||e.dataSeries.visible )
    {
        e.dataSeries.visible=false;
    }
    else
    {
        e.dataSeries.visible=true;
    }
    chart.render();
}
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js" ></script>
</body>
</html>                              
<?php
}
else if($district=="ajmer")
{   $d1=mysql_query("SELECT issue,apply FROM info WHERE district='AJMER'");
    $d2=mysql_num_rows($d1);
    $q1 = array();
while ($q2 = mysql_fetch_array($d1)) 
{
    $q1[] = $q2;
}
$sim=0;
$temp=array();

for($l=0;$l<$d2;$l++)
{ 
$date_5=$q1[$l][0];

$ys =date('Y', strtotime($date_5));
    $temp[]=$ys;
     
     }
  //----year wise distribution 
     $count=-1;
     $u=0;
    for($z=0;$z<$d2;$z++)
     {  
      $count++;
      
       if($temp[$z]>="2008" && $temp[$z]<="2013")
        {  $u++;
            echo '<pre>';
        $date_5=$q1[$count][0];
        $date_6=$q1[$count][1];
    $start2=strtotime($date_5);
    $end2=strtotime($date_6);
    $datediff2=$start2-$end2;
     $roun2=round($datediff2/86400);
     $sim=$sim+$roun2;
     } 
   }
   $avg4=round($sim/$u);
   printf(" AVERAGE FOR THE YEAR 2008-2013 IS: %d",$avg4);
$count1=-1;
     $u1=0;
     $stm=0;
    for($z=0;$z<$d2;$z++)
     {  
      $count1++;
      
       if($temp[$z]>="2014" && $temp[$z]<="2018")
        {  $u1++;
            
        $date_7=$q1[$count1][0];
        $date_8=$q1[$count1][1];
    $start3=strtotime($date_7);
    $end3=strtotime($date_8);
    $datediff3=$start3-$end3;
     $roun3=round($datediff3/86400);
    
     $stm=$stm+$roun3;
     } 
   }
   $avg5=round($stm/$u1);
   echo '<pre>';
   printf(" AVERAGE FOR THE YEAR 2013-2018 IS: %d",$avg5);
   $dataPoints = array( 
   
    array("y" => $avg4, "label" => "2008-2013" ),
    array("y" => $avg5, "label" => "2014-2018" )
);

?>





<!DOCTYPE html>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    backgroundColor:"#F5DEB3",
    title:{
        text: "Year-wise delay of Ajmer"
    },
    axisY: {
        title: "delay (in days)"
    },
    data: [{
        type: "column",
        indexLabelPlacement:"inside",
        indexLabelFontWeight:"bolder",
        indexLabelFontColor:"white",
        indexLabel:"{y}",
        yValueFormatString: "##0 days",
        
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js" ></script>
</body>
</html>                              
 <?php  

}
else
{

      $f1=mysql_query("SELECT issue,apply FROM info WHERE district='JAIPUR'");
    $f2=mysql_num_rows($f1);
    $v1 = array();
while ($v2 = mysql_fetch_array($f1)) 
{
    $v1[] = $v2;
}
$slm=0;
$temp1=array();

for($l=0;$l<$f2;$l++)
{ 
$date_7=$v1[$l][0];

$ys1 =date('Y', strtotime($date_7));
    $temp1[]=$ys1;
     
     }
  //----year wise distribution 
     $count=-1;
     $u1=0;
    for($z=0;$z<$f2;$z++)
     {  
      $count++;
      
       if($temp1[$z]>="2008" && $temp1[$z]<="2013")
        {  $u1++;
            echo '<pre>';
        $date_7=$v1[$count][0];
        $date_8=$v1[$count][1];
    $start3=strtotime($date_7);
    $end3=strtotime($date_8);
    $datediff3=$start3-$end3;
     $roun3=round($datediff3/86400);
     $slm=$slm+$roun3;
     } 
   }
   $avg6=round($slm/$u1);
   printf(" AVERAGE FOR THE YEAR 2008-2013 IS: %d",$avg6);
$count1=-1;
     $u2=0;
     $skm=0;
    for($z=0;$z<$f2;$z++)
     {  
      $count1++;
      
       if($temp1[$z]>="2014" && $temp1[$z]<="2018")
        {  $u2++;
            
        $date_9=$v1[$count1][0];
        $date_10=$v1[$count1][1];
    $start4=strtotime($date_9);
    $end4=strtotime($date_10);
    $datediff4=$start4-$end4;
     $roun4=round($datediff4/86400);
    
     $skm=$skm+$roun4;
     } 
   }
   $avg7=round($skm/$u2);
   echo '<pre>';
   printf(" AVERAGE FOR THE YEAR 2013-2018 IS: %d",$avg7);
   $dataPoints = array( 
   
    array("y" => $avg6, "label" => "2008-2013" ),
    array("y" => $avg7, "label" => "2014-2018" )
);

?>





<!DOCTYPE html>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    backgroundColor:"#F5DEB3",
    title:{
        text: "Year-wise average delay of Jaipur"
    },
    axisY: {
        title: "delay (in days)"
    },
    data: [{
        type: "column",
        indexLabelPlacement:"inside",
        indexLabelFontWeight:"bolder",
        indexLabelFontColor:"white",
        indexLabel:"{y}",
        yValueFormatString: "##0 days",
        
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js" ></script>
</body>
</html>                              
 <?php

}
}
?>









