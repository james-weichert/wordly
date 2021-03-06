<!DOCTYPE html>
<html>
<head>
	<title>Wordly</title>

<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="Assets/dots.ico"/>
<!--<link rel="shortcut icon" type="image/png" href="flagFavicon.ico"/>-->

<meta charset="utf-8"/>

<script type="text/javascript">

    var proficiency = 2;
    var language = 2;
    var barColor = 0;
    var returning = "false";

    function loadAtStart() {

        returning = localStorage.getItem('returnStatus');

        if(returning == "false") {
            localStorage.setItem('returnStatus', 'true');

            document.getElementById('rightSide').style.visibility = "visible";

        } else {
        }

        barColor = localStorage.getItem("barColor");
        
        if(barColor == 0) {
            document.getElementById('centerBar').style.color = "#D16666";
        } else if (barColor == 1) {
            document.getElementById('centerBar').style.color = "#3BC66E";
        } else if (barColor == 2) {
            document.getElementById('centerBar').style.color = "#357DED";
        }

        barColor++;
        if (barColor == 3) {
            barColor = 0;
        }

        localStorage.setItem("barColor", barColor);


        if(window.innerWidth < 700) {
            document.getElementById('main').style.width = "80%";
            document.getElementById('field').style.width = "90%";

            document.getElementById('header').style.width = "70%";
            document.getElementById('logo').style.width = "40vw";

            document.getElementById('rightSide').style.visibility = "hidden";
        } else {
            document.getElementById('footer').style.visibility = "visible";
        }
    }
</script>

<style type="text/css">

/*Red - #D16666*/
/*Green - #3BC66E*/
/*Blue - #357DED*/

body {
	overflow-x: hidden;
    overflow-y: hidden;
	font-family: 'Ubuntu', sans-serif;
    color: #6C6C6C;

    -webkit-user-select: none;  
    -moz-user-select: none;    
    -ms-user-select: none;      
    user-select: none; 

    
}
#header {
    text-align: center;

    width: 50%;
    margin: 0 auto;
    margin-top: 1vh;
}
#logo {
    
    width: 20vw;
}
h2 {
    font-size: 1.25em;
}
#feedLink:hover {
    color: rgba(209, 102, 102, 0.9);
}
#bankLink:hover {
    color: rgba(53, 124, 237, 0.8);
}
#centerBar {
    color: #3BC66E;
}
#main {
    width: 60%;
    margin: 0 auto;
    text-align: center;
}
#field {
    width: 60%;
    margin: 0 auto;

    border-radius: 0.2vw;
	box-shadow: 0px 0.5px 2.5px  #CCC;

    border-color:rgba(53, 124, 237, 0.6);
    border-style: solid;
    border-width: 0.5em;
    border-radius: 0.5em;

    padding: 1vw;

    -webkit-user-select: text;  
    -moz-user-select: text;    
    -ms-user-select: text;      
    user-select: text
}

#practiceButton {
    color: #FFF;
	background-color: #3BC66E;
	display: inline-block;

	border-radius: 0.4vw;

	font-size: 4vh;
	line-height: 5vh;
	font-weight: 300;

	-webkit-box-shadow: 1px 1px 2px #aaa;
    -moz-box-shadow: 1px 1px 2px #aaa;
    box-shadow: 1px 1px 2px #aaa;
}
#practiceButton:hover {
    background: rgb(57, 170, 99);

    -webkit-box-shadow: inset 0px 0px 4px #aaa;
    -moz-box-shadow: inset 0px 0px 4px #aaa;
    box-shadow: inset 0px 0px 4px #aaa;

    cursor: pointer;
}
#practice {
	padding-left: 2vw;
	padding-right: 2vw;
	line-height: 0.5vh;
}
#difficulties {
    font-weight: 300;
}
.proficiencyCircles {
    height: 2vh;
}

#languageTable {
	display: inline-block;
	height: 5vh;
    border-collapse: collapse;
}
#languageTable td {
	width: 15vh;
}
#languageTable p {
	width: 10vh;
	margin-left: auto;
	margin-right: auto;
}
#tdSpanish {
	border-top-left-radius: 0.4vw;
	border-bottom-left-radius: 0.4vw;
	background-color: rgba(209, 102, 102, 0.9);
	color: #FFF;
}
#tdSpanish:hover {
	background-color: #D16666;
    cursor: pointer;
}
#tdGerman {
    border-top-right-radius:  0.4vw;
    border-bottom-right-radius: 0.4vw;
    background-color: rgba(53, 124, 237, 0.9);
	color: #FFF;
}
#tdGerman:hover {
    background-color: #357DED;
    cursor: pointer;
}

#rightSide {
    position: absolute;
    right: 0;
    bottom: 0;
    visibility: hidden;
}
#fox {
    width: 15vw;
    margin-right: 2vw;
    margin-bottom: -1.5vh;
}
#dialogueBox {
    width: 13vw;
    margin-bottom: 30vh;
    margin-right: -2vw;
}

#footer {
    visibility: hidden;
	color: #6C6C6C;
    position: absolute;
    width: 60vw;
    left: 0;
    margin-left: 20vw;
	bottom: 0;
	text-align: center;
	font-size: 2vh;
	font-weight: 300;
	z-index: -1;
}


</style>

</head>

<body onload="loadAtStart()">
    <div id="header">
        <img id="logo" src="Assets/wordlyLogo.svg"/>
        <h2><a id="feedLink">Your Feed</a> <span id="centerBar">|</span> <a id="bankLink">Word Bank</a></h2>
    </div>

    <div id="main">
        <h1>Your Feed:</h1>
        <div id="field">
            <p>Click 'Practice' to reveal a new <span id="languageWord">German</span> word.</p>
            <h1 id="wordSpot">???</h1>
            <h1 id="meaningSpot">???
            </h1>
            <div id="practiceButton" onclick="getAlt()"><p id="practice">Practice</p></div>
            <div id="difficulties">
                <p>Proficiency: Beginner <img id="redCircle" class="proficiencyCircles" onclick="changeProficiency(1)" src="Assets/redCircle.svg"/> Intermediate <img id="greenCircle" class="proficiencyCircles" onclick="changeProficiency(2)" src="Assets/greenCheck.svg"/> Advanced <img id="blueCircle" class="proficiencyCircles" onclick="changeProficiency(3)" src="Assets/blueCircle.svg"/></p>
            </div>
        </div>
        <br />
        <div id="languages">
            <table id="languageTable">
                <tr>
                    <td id="tdSpanish" onclick="changeLanguage(1)">
                        <p>Spanish</p>
                    </td>
                    <td id="tdGerman" onclick="changeLanguage(2)">
                        <p>German</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="rightSide" onclick="dialogueChange()">
        <img id="dialogueBox" src="Assets/welcome.svg"/>
        <img id="fox" src="Assets/FoxAlt.svg"/>
    </div>


    <div id="footer">
            <p>Home | About</p>
            <p>Wordly by James Weichert. All Rights Reserved.</p>
    </div>
   

    <script type="text/javascript">
    function changeProficiency(a) {
        if(a == 1) {
            document.getElementById('redCircle').src = "Assets/redCheck.svg";
            document.getElementById('greenCircle').src = "Assets/greenCircle.svg";
            document.getElementById('blueCircle').src = "Assets/blueCircle.svg";

            proficiency = 1;
        } else if (a == 2) {
            document.getElementById('greenCircle').src = "Assets/greenCheck.svg";
            document.getElementById('redCircle').src = "Assets/redCircle.svg";
            document.getElementById('blueCircle').src = "Assets/blueCircle.svg";

            proficiency = 2;
        } else if (a == 3) {
            document.getElementById('blueCircle').src = "Assets/blueCheck.svg";
            document.getElementById('greenCircle').src = "Assets/greenCircle.svg";
            document.getElementById('redCircle').src = "Assets/redCircle.svg";

            proficiency = 3;
        }
    }
    function changeLanguage(a) {
        if(a == 1) {
            document.getElementById('field').style.borderColor = "rgba(209, 102, 102, 0.6)";
            document.getElementById('languageWord').innerHTML = "Spanish";

            language = 1;
        } else if (a == 2) {
            document.getElementById('field').style.borderColor = "rgba(53, 124, 237, 0.6)";
            document.getElementById('languageWord').innerHTML = "German";

            language = 2;
        }
    }
    function dialogueChange() {
        document.getElementById('dialogueBox').src = "Assets/getStarted.svg";
    }

    function getAlt() {
        alert(thisWord);
    }

    function getWord() {
        if (language == 1) {
            if (proficiency == 1) {

            } else if (proficiency == 2) {

            } else if (proficiency == 3) {

            }
        } else if (language == 2) {
            if (proficiency == 1) {

            } else if (proficiency == 2) {
                if (window.XMLHttpRequest) {
                    //IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    //IE5/6
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('wordSpot').innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","index.php",true);
                xmlhttp.send();
                //alert("Done");
                
            } else if (proficiency == 3) {
    
            }
        }
    }
    </script>
</body>
</html>