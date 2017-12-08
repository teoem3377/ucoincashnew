<?php
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("quantri");
$sql="select * from table_product order by id asc limit 0,1";
$query=mysql_query($sql,$conn);
$i=0;
$row=mysql_fetch_array($query);

$arr=array();

$arr[$i]=$row["maso"];

$s21="Update table_product set ghichu=0";
$r21=mysql_query($s21,$conn);
while(count($arr)>0)
{
$n=count($arr)-1;

$s1="select * from table_product where quanly='".$arr[$n]."' and ghichu=0 limit 0,1";
//echo $s1;
$r1=mysql_query($s1,$conn);
$d=mysql_num_rows($r1);
//echo $d;
$m=mysql_fetch_array($r1);
$s2="Update table_product set ghichu=1 where maso='".$arr[$n]."'";
$r2=mysql_query($s2,$conn);
if ($d>0)
{ 
array_push($arr,$m["maso"]);
}
else { 
$i++;
array_pop($arr);
}

}
echo $i;
?>