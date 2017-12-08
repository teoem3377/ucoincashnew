<?php


	@session_start();
	$session=session_id();


function levelTree($n,$Root)
{
  $conn=mysql_connect("localhost","root","");
  $db=mysql_select_db("g8");
  $grr[0]=$n;
  $i=0;
  while ($grr[0]<>$Root)
  {
   $v=count($grr)-1;
   $sql="select * from table_product where maso='".$grr[$v]."'";
   $query=mysql_query($sql,$conn);
   $row=mysql_fetch_array($query);
   $num=mysql_num_rows($query);
   
   if($row["quanly"]<>"")
   {
    array_pop($grr);
	$i++;
    array_push($grr,$row["quanly"]);
   }
  }
  return ($i);
  }

 
$conn=mysql_connect("localhost","root","");
 $db=mysql_select_db("g8");
 mysql_query("SET NAMES utf8");
$str="select * from table_product where maso='".$_SESSION['mazo']."'";
	$q=mysql_query($str,$conn);
	$r=mysql_fetch_array($q);
	$arr=array();
	$arr[0]=$r["maso"]."/#/0/".$r["hoten"];
	$data_points = array();
	while(count($arr)>0){
	
	   $x=explode("/",$arr[0]);
	   $str1="select * from table_product where quanly='".$x[0]."' order by id asc";
	   $q1=mysql_query($str1,$conn);
	   $n1=mysql_num_rows($q1);
	   if($n1>0)
	   {
	     while ($r1=mysql_fetch_array($q1))
		 {
		    array_push($arr,$r1["maso"]."/".$r1["quanly"]."/".($x[2]+1)."/".$r1["hoten"]);
			
		 }
	   }
	     $delete=array_shift($arr);
		 $k=explode("/",$delete);
		  $point = array("id" => $k[0],"parent" => $k[1] ,"text" =>$k[0]."-". $k[3]."",
		  "state"=>array("opened"=>"true"));
	      array_push($data_points, $point);   
	   
	
	
	     
	}
	echo json_encode($data_points);
	
?>