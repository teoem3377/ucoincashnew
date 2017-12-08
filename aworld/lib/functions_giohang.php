<?
	  	
	function get_product_name($pid,$lang){
		global $d,$row,$row1;
		
		$sql = "select ten_vi,ten_en from #_nghe where id=".$pid;
		$d->query($sql);
		$row = $d->fetch_array();		
		
		
		return $row['ten_'.$lang];
	}
	
	function get_price($pid){
		global $d,$row;	
		$kq=0; 
		 
		$sql = "select gia  from table_nghe  where id=".$pid;
		$d->query($sql);		
		$row = $d->fetch_array();
		
				
		return $row['gia']; 
	}
	
	function get_masox($pid){
		global $d,$row;	
		$kq=0; 
		 
		$sql = "select maso  from table_nghe  where id=".$pid;
		$d->query($sql);		
		$row = $d->fetch_array();
		
				
		return $row['maso']; 
	}
	function get_bunos($pid){
		global $d,$row;	
		$kq=0; 
		 
		$sql = "select gia1  from table_nghe  where id=".$pid;
		$d->query($sql);		
		$row = $d->fetch_array();
				
		return $row['gia1']; 
	}
	function get_pin($pid){
		global $d,$row;	
		$kq=0; 
		 
		$sql = "select pin  from table_nghe  where id=".$pid;
		$d->query($sql);		
		$row = $d->fetch_array();
				
		return $row['pin']; 
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	
	
	function get_order_total1(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_bunos($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function get_order_total2(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_pin($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	
	function get_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$sum+=$q;
		}
		return $sum;
	}
	
	
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>