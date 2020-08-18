<!doctype html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="jquery-ui-1.12.1/jquery-ui.js"></script>
	<link href="jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

	<link href="w2ui-1.4.3/w2ui-1.4.3.css" rel="stylesheet" >
	<script src="w2ui-1.4.3/w2ui-1.4.3.min.js"></script>

	<link href="codemirror/lib/codemirror.css" rel="stylesheet" >
	<script src="codemirror/lib/codemirror.js"></script>
	<script src="codemirror/mode/xml/xml.js"></script>
	<script src="codemirror/mode/stex/stex.js"></script>
	<script src="codemirror/addon/selection/active-line.js"></script>

	<link href="spectrum/spectrum.css" rel="stylesheet" >
	<script src="spectrum/spectrum.js"></script>

	<link href="fmath/editor.css" rel="stylesheet" >
	<script src="fmath/lang/en.js"></script>
	<script src="fmath/fonts/fmathFormulaFonts.js"></script>
	<script src="fmath/fmathEditorC.js"></script>
	<script src="fmath/fmathEditorJQuery.js"></script>

</head>
<body>
<button id="abc" onclick="abc()">copy image link</button>
<input type="button" onclick="getPng()" value="Get Image Png"/>
<br/>

<br/>
Image:<input id="text"/><br/>
<img id="image"/>
<center>
	<div id="editor1"></div>
	<br/>
</center>

<script>
	var e1 = $( "#editor1" ).mathEditor({ width: 1000, height:400});
	e1.mathEditor("setSaveCallback", clientSaveMethod);
	//e1.mathEditor("setMathML","<math mathsize='40'><mi>X</mi><mo>+</mo><mi>Y</mi></math>");

	function clientSaveMethod(){
		// get info from editor ex: get image
		getPng();
	}


	function getPng(){
		if(e1 !=null){
			var img = document.getElementById("image");
			var elem = document.getElementById("text");
			img.src = e1.mathEditor("getImage","png");
			elem.value = img.src;
		}
	}
	function abc(){
		var imageurl = document.getElementById("text").value;
		$.ajax({
			url: 'saveimage.php',
			data:{imageurl:imageurl},
			type:"POST",
			success:function(data){
			if(data !=0)
				{ 
				document.getElementById("text").value = data;
				  var copyText = document.getElementById("text");

		  				/* Select the text field */
		 				 copyText.select();
		 				 copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		 				 /* Copy the text inside the text field */
		 				 document.execCommand("copy");

		  				/* Alert the copied text */
		  				alert("Copied the text: " + copyText.value);

			}
		}
		});
	}


</script>
</body>
</html>