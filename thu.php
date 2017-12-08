<html>
	<head>
		<link rel="stylesheet" href="css/flipclock.css">

		<script src="js/jquery.min.js"></script>

		<script src="js/flipclock.min.js"></script>		
	</head>
	<body>
		<div class="clock" style="margin:2em;"></div>

		<script type="text/javascript">
			var clock;
			
			$(document).ready(function() {
				clock = $('.clock').FlipClock({
					clockFace: 'TwelveHourClock'
				});
			});
		</script>
		
	</body>
</html>