 <!DOCTYPE html>
<html>
<style>
	.graphs {
		
		margin:auto;
	}
	.bar {
		fill: white;
		transition: fill .3s ease;
		cursor: pointer;

		text{
			fill: blue;
		}
	}
	.bar:hover,
	.bar:focus {
		fill: red !important;

		text {
			fill: white;
		}
	}
	#descr {
		visibility: hidden;
	}
	#graph
	{
		margin:auto;
		position: absolute;
		left:300px;
	}
	.forblock{
		display:block;
		height: 600px;
	}	
</style>
<script>
  function graphDescr() {
	document.getElementById("descr").style.visibility = "visible";
  }
  function registerHandlers7() {
	document.getElementById("ClickRect").addEventListener("click",graphDescr,false);
  }
</script>
<body onload="registerHandlers7()"> 
<div id="visualization" class="tab-pane fade">
<div class="forblock">
  <h3>Visualization</h3>
  <div id="graph">
  <svg class="graphs" width="900" height="600" version="1.1" xmlns="http://www.w3.org/2000/svg">
  			<rect x="20" y="20" rx="10" ry="0" width="550" height="535" fill="white" stroke="black" stroke-width="2" />
			<rect x="45" y="60" rx="0" ry="0" width="500" height="400" fill="#1BE4BC" stroke="black" stroke-width="3"/>
			<text x="85" y="45" font-family="arial rounded MT bold" font-size="20" fill="red">Enrollment over the past 10 years: EdCamps</text>
			<g transform="translate(0, 500) scale(1, -1)">    
  				<rect class="bar" width="50" height="0" x="80" y="42" fill="white">
  					<animate begin="ClickRect.click" attributeName="height" from="0" to="60" dur="1s" fill="freeze"></animate>    
				</rect>
				<rect class="bar" width="50" height="0" x="200" y="42" fill="white">
   					<animate begin="ClickRect.click" attributeName="height" from="0" to="80" dur="1s" fill="freeze"></animate>    
				</rect>
				<rect class="bar" width="50" height="0" x="320" y="42" fill="white">
					<animate begin="ClickRect.click" attributeName="height" from="0" to="150" dur="1s" fill="freeze"></animate>    
				</rect>
				<rect class="bar" width="50" height="0" x="440" y="42" fill="white">
					<animate begin="ClickRect.click" attributeName="height" from="0" to="300" dur="1s" fill="freeze"></animate>
				</rect>
			</g>
			<g id="percent">
				<text x="455" y="450" font-family="arial rounded MT bold" font-size="15" fill="white">80</text>
				<text x="215" y="450" font-family="arial rounded MT bold" font-size="15" fill="white">30</text>
				<text x="335" y="450" font-family="arial rounded MT bold" font-size="15" fill="white">55</text>
				<text x="95" y="450" font-family="arial rounded MT bold" font-size="15" fill="white">25</text>
			</g>
			<text x="90" y="490" font-family="arial rounded MT bold" font-size="13" fill="red">2000</text>
			<text x="210" y="490" font-family="arial rounded MT bold" font-size="13" fill="red">2005</text>
			<text x="330" y="490" font-family="arial rounded MT bold" font-size="13" fill="red">2010</text>
			<text x="450" y="490" font-family="arial rounded MT bold" font-size="13" fill="red">2015</text>
			<text x="165" y="515" font-family="arial rounded MT bold" font-size="13" fill="black">Click <tspan id="ClickRect" fill="blue">HERE</tspan> To See Enrollment Statistics</text>
			<text x="180" y="540" font-family="arial rounded MT bold" font-size="13" fill="gray">Scroll over the bars to see the stats!</text>
<g id="descr">
			<text x="75" y="580" font-family="arial rounded MT bold" font-size="15" fill="black">Enrollment at Camp Santa Cruz increased from 25 kids to 80 since 2000!</text>
</g>
	</svg>
</div>
</div>
<?php
  include("footer.php");
?>
</div>

</body>
</html>
