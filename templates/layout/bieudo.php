       <div class="span_2">
            <div class="span1_2">
                <!-- line chart canvas element -->       
                <div style="text-align:center; font-size:25px; height:40px; line-height:30px; font-weight:bold; color:#090">Members in the world</div>
                <canvas id="buyers" width="550" height="550"></canvas>       
            </div>
       
           <div class="span1_2">
              <!-- pie chart canvas element -->     
               <div style="text-align:center; font-size:25px; height:40px; line-height:30px; font-weight:bold; color:#090; margin-bottom:19px;">
                   Country:
                   <span style="color:#878BB6; font-size:22px">USA,</span>
                   <span style="color:#4ACAB4; font-size:22px">CANADA,</span>
                   <span style="color:#FF8153; font-size:22px">BRITAIN,</span>
                   <span style="color:#C90; font-size:22px">INDIA,</span>
                   <span style="color:#F00; font-size:22px">OTHER</span>
               </div>       
               <canvas id="countries" width="500" height="500" ></canvas>
           </div>
           
       </div>
        
 <script src="./js/Chart.min.js"></script>   
<script>

	// line chart data
	var buyerData = {
		labels : ["January","February","March","April","May","June","July","August"],
		datasets : [
		{
				fillColor : "rgba(172,194,132,0.4)",
				strokeColor : "#ACC26D",
				pointColor : "#fff",
				pointStrokeColor : "#000",
				data : [5008,8116,11999,14651,19205,26347,30197,36771]
			}
		]
	}
	
	// get line chart canvas
	var buyers = document.getElementById('buyers').getContext('2d');

	// draw line chart
	new Chart(buyers).Line(buyerData);
	
	// pie chart data
	var pieData = [
		{
			value: 30,
			color:"#878BB6",
						
		},
		{
			value : 21,
			color : "#4ACAB4",
			
			
		},
		{
			
			value : 22,
			color : "#FF8153",
			
			
		},
		{
			value : 9,
			color : "#C90",
			
			
		},
		{
			value : 18,
			color : "#F00",
			
			
		}
		
	];
	
	// pie chart options
	var pieOptions = {
		segmentShowStroke : false,
		animateScale : true,
		
	}
	
	// get pie chart canvas
	var countries= document.getElementById("countries").getContext("2d");
	
	// draw pie chart
	new Chart(countries).Pie(pieData, pieOptions);
	
	

</script>
    