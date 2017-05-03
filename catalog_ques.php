<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="utf-8"/>
<title>The Quiz</title>
<style>


#wrapper1
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
#topic{
	text-align: center;
}

#box1
{
	background-color: #fff2e6;
	width: 300px;
	height: 350px;
	margin: auto;
	visibility: hidden;
	text-align: center;
	border-radius: 25px;
}


.images2{
	margin-left: 80px;
	margin-top: 20px;
	width: 170px;
	height: 170px;
	margin-right: 70px;
	border-radius: 15px;
}

#endquiz{
	float: right;
}
</style>

<script src="catalogquestandansw.js"></script>

<script>
var topic = "San Francisco";
var rand;
var count;
var score;
function showQuestion(){	
		// Randomly select a topic from the subject array
		// Get the image and display it
		// Change the title and button labels
		// Display the question
		// Make the display area of the image and question visible
		count=0;
		score=0;
		rand = sfcity[Math.floor(Math.random() * sfcity.length)];
		document.getElementById("box1").style.visibility = "visible"; 
		document.getElementById("answer1").style.visibility = "visible";
		document.getElementById("nextquest").style.visibility = "visible";
		document.getElementById("answer1").value = "";
		document.getElementById("topic").innerHTML = topic;
		document.getElementById("images").src = rand.image;
		document.getElementById("images").alt = rand.alt;
		document.getElementById("questions").innerHTML = rand.questions[0].quest;
		document.getElementById("startquiz").value = "Next Topic";
		document.getElementById("nextquest").value = "Next Question"; 
}


function nextQuestion(){
		// Show the next question on the current topic
		//alert(rand.questions.length);
		if(checkAnswer() == 1)
		{
			count++;
			if(count<rand.questions.length)
			{
				document.getElementById("questions").innerHTML= rand.questions[count].quest;	
				document.getElementById("answer1").value = "";
			}
			else if(count == (rand.questions.length))
			{
				displayscores();
			}
    	}
}

function displayscores()
{
		document.getElementById("questions").innerHTML = "Your score for "+document.getElementById("images").alt+" is "+score+"!";
		document.getElementById("answer1").style.visibility = "hidden";
		document.getElementById("nextquest").style.visibility = "hidden";

}

function checkAnswer(){
	// Get the user input from the text field and compare it with the 
	// correct answer in the data array
	var answer3 = document.getElementById("answer1").value;
	var answer2 = answer3.toLowerCase();
	var wrong;
	for (var i = 0; i < sfcity.length; i++) {
    	for(var m = 0; m < sfcity[i].questions.length; m++)
    	{
   			if(answer2 == sfcity[i].questions[m].answer)
   			{
   				wrong=2;
   				score++;
   			}
   			else if(answer2 == "" || answer2 == null)
   			{
   				alert("Answer the question!");
   				return false;
   			}
    	}
	}
	if(wrong != 2)
	{
		alert("Wrong!");
	}
	return 1;
}



</script> 

</head>
<body>
<div id="wrapper1">
   <form name="forms1">
	<h2 id="topic">Test Your Knowledge About San Francisco! Show and Quiz! </h2>
	<div id="box1">
			<img id="images" class="images2" src="noimage.jpg" alt="No picture" />
			<p id="questions"></p>
			<input id="answer1" type="text" name="answer" >
			<br/>
	        <input name="button" id="nextquest" type="button" value=" " onclick="nextQuestion()" />

	</div>
	<input name="button" id="startquiz" type="button" value="Start Quiz"  onclick="showQuestion()"/>
	<input name="button" id="endquiz" type="button" value="End Quiz"  onclick="displayscores()"/>

   </form>
</div>


</body>
</html>

