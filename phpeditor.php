<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gabbar IDE</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
    <!-- Add custom CSS here -->
    <style>
    body {
        margin-top: 60px;
		
		 
    }
	#htmleditor , #phpeditor ,#jseditor{ 
        
		height:350px;
		width:100%;
		border:1px solid #c9c9c9;
    }
	#htmlinput , #phpinput , #jsinput{
	 Display:none;
	}
	#htmlbutton{
		
	
	}
	
	#htmlresult ,#phpresult , #jsresult{
	height:346px;
	border: 1px solid #d9d9d9;
	margin-top:45px;
	padding-left:30px;
	overflow: auto;
	padding-top:20px;
	
	}
    </style>	
</head>

<body>


    <div class="container">

        <div class="row" >
          
			
			 
		
		
<div class="container" >

		<div class="row" style="background-color:#f3fff3;padding-bottom:30px;">
			<div class="col-md-6">
				<div style="margin-top:10px;">
				<form method=POST>
				<input type="Button" value="Run Code" class="btn btn-primary pull-right push-bottom" onclick="RunPHP()" id="phpbutton"/>
				<textarea name="phpinput" id="phpinput" onblur="RunPHP()" data-editor="html" rows="15" cols="50"></textarea><br />
				</form>
				</div>
				
				
				<div id="phpeditor">&lt;?php
echo "Hello World";				
php?&gt;
				</div>
				
				
			</div>
			
			
			
			
			<div class="col-md-6">
				<div id="phpresult" style="background-color:#c9e6ff;" >
				</div>
				
				
				
				
			</div>
		</div>
		</div>
    <!-- /.container -->
	 
	
	    </div>

	        </div>
	
    <!-- JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="src/ace.js" type="text/javascript"></script>
	<script>
    var phpeditor = ace.edit("phpeditor");
    phpeditor.setTheme("ace/theme/cobalt");
    phpeditor.getSession().setMode("ace/mode/php");
	
	function RunPHP() {
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
                document.getElementById('phpresult').innerHTML = xhr.responseText;
            }
        }
    }
	document.getElementById("phpinput").value = phpeditor.getSession().getValue();
    xhr.open('POST', 'PHPparser.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("phpinput=" + phpeditor.getSession().getValue());
}
	</script>
	
		

</body>

</html>

