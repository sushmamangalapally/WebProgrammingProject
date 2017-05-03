<!DOCTYPE html>
<html>
<head>
	<title>Guessing Number</title>
	<style>
	#wrapper2
	{
		margin: auto;
		width: 600px;
		color: black;
		background-color: #ffcc99; 
		margin-top: 80px;
		font-family: 'Fjalla One', sans-serif, Times New Roman;
		padding: 30px;
		border-radius: 25px;
	}

	#box2
	{
		background-color: #fff2e6;
		width: auto;
		height: auto;
		margin: auto;
		visibility: hidden;
		text-align: center;
		border-radius: 25px;
		padding: 50px;
	}
	</style>
	<script>
		var randnum;
		var guessnum;
		function refresh1()
		{
			document.getElementById("box2").style.visibility = "visible"; 
			document.getElementById("displaytext").style.visibility = "visible"; 
			document.getElementById("guess").style.visibility = "visible"; 
			document.getElementById("changetext").innerHTML="Choose a number between 1 and 100";
			document.getElementById("displaytext").value="";
			randnum = Math.floor((Math.random() * 100) + 1);
			document.getElementById("refresh").value = "Refresh";
		}

		function emptytext()
		{
			if(document.forms2.numbetween.value == "" || document.forms2.numbetween.value == null)
			{
				alert("Guess your number in the text field!");
				return false;
			}
		}

		function guessyournum()
		{
			guessnum = document.getElementById("displaytext").value;
			if(emptytext() == false)
			{
				return false;
			}
			else if(guessnum > randnum)
			{
				document.getElementById("changetext").innerHTML="Oh no! "+guessnum+" is too high! Try again!";
				guessyournum();
			}
			else if(guessnum<randnum)
			{
				document.getElementById("changetext").innerHTML="Oh no! "+guessnum+" is too low! Try again!";
				guessyournum();
			}
			else if(guessnum==randnum)
			{
				document.getElementById("changetext").innerHTML="Congrats! Your guess "+guessnum+" is correct!";
				finishgame();
			}
		}

		function finishgame()
		{
			document.getElementById("displaytext").style.visibility="hidden";
			document.getElementById("guess").style.visibility="hidden";
		}


	</script>
</head>

<body >
	<div id="wrapper2">
	   <form name="forms2">
		<h2>Guessing Game</h2>
		<div id="box2">
				<h3 id="changetext">Choose a number between 1 and 100</h3>
				</br>
				<input type="text" id="displaytext" name="numbetween">
				</br>
		        <input name="button" id="guess" onclick="guessyournum()" type="button" value="Keep Guessing!"  />
		</div>
		<input name="button" id="refresh" onclick="refresh1()" type="button" value="Play!"  />
	   </form>
	</div>
</body>
</html>