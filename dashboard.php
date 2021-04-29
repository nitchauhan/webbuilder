<html>
<?php
session_start();


?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
		body
		{

			background-color: black;
		}



		.vl 
		{
			border-left: 6px solid green;
			height: 500px;
		}

		.panel
		{
			width:20%;
			border: 1px solid white;
			float:left;
			clear:right;
			height:520px;
			margin-left:0px;
			border-radius:5px;
			background-color:black;

		}

		.frame
		{
			height:520px;
			width:78%;
			margin-left:10px;
			padding:5px;
			border:1px solid white;
			float:right;
			box-shadow:  0 0 10px 5px white;				
			border-radius:5px;
			margin-right:10px;
		}

		.header
		{
			width:100%;
			background-color:#0e204a;
			height:80px;
			color:white;
			font-family:verdana;
			font-size:20px;
			margin-bottom:20px;
			padding:10px;
			opacity:0.75;
			border-bottom:5px solid white;

		}

		.myiframe
		{
			width:100%;
			height:100%;
		}

		.form1
		{
			width:500px;
			height:500px;
			margin-left:100px;
			border: 10px solid blue;
			float:left;

		}





		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			background-color: gray;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}

		/* The Close Button */
		.close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
			position:relative;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}


		.button {
			display: inline-block;
			position: relative;
			width: 50px;
			height: 50px;
			margin: 10px;
			cursor: pointer;
		}

		.button span {
			display: block;
			position: absolute;
			width: 50px;
			height: 50px;
			padding: 0;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			-o-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			border-radius: 100%;
			background: #eeeeee;
			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
			transition: ease .3s;
		}

		.button span:hover {
			padding: 10px;
		}

		.teal .button span {
			background: #009688;
		}

		.red .button span {
			background: red;
		}

		.black .button span {
			background: black;
		}

		.blue .button span {
			background: #2196F3;
		}

		.layer {
			display: block;
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background: transparent;
			/*transition: ease .3s;*/
			z-index: -1;
		}

		input {
			display: none;
		}
	</style>
	<link href="conductor.css" rel="stylesheet">
</head>

<body>				
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				WEBEASY
			</div>
			<div class="col-md-1">
				<form method="post" action="zip-download.php">
					<input type="hidden" id="dir_path" name="dir_path">
					<input type="submit" class="btn btn-default" name="submit" value="Download">
				</form>
			</div>

			<div class="col-md-1">
				<a class="btn btn-default" id="preview_btn" target="_blank"> Preview </a>
			</div>

			<div class="col-md-2">
				<a class="btn btn-default" id="preview_btn" href="changepass.php"> Change Password </a>
			</div>

			<div class="col-md-1">
				<a class="btn btn-default" id="preview_btn" href="lp.php"> Logout </a>
			</div>
		</div>
	</div>

	<div id="img_modal" class="modal">
		<div class="modal-content">
			<span class="close" id="close_btn">&times;</span>
			<div class="form-group">
				<form action="del_img.php" method="post" id="del_img" enctype="multipart/form-data">
					<input type="hidden" name="destid" id="del_img_destid">
					<input type="hidden" name="filename" id="filename_di">
					<input type="hidden" name="imgdataname" id="imgdataname">
					
					Chaneg Image : <input type="file" name="image">
					<br/>
					<button type="submit" class="btn btn-default" name="submit">Delete</button>
					<button type="submit" class="btn btn-default" name="image">Change Image</button>

				</form>
			</div>
		</div>
	</div>

	
	<div id="myModal" class="modal">
		<div class="modal-content">
			<!-- This will remain hidden always  -->
			<form style="display: none;" action="add_new_text.php" method="post" id="add_text">
				<input type="hidden" name="destid" id="add_text_destid">
				<input type="hidden" name="filename" id="filename_at">

			</form>

			<form style="display: none;" action="add_new_img.php" method="post" id="add_img">
				<input type="hidden" name="destid" id="add_img_destid">
				<input type="hidden" name="filename" id="filename_ai">

			</form>


			<form style="display: none;" action="add_new_vdo.php" method="post" id="add_vdo">
				<input type="hidden" name="destid" id="add_vdo_destid">
				<input type="hidden" name="filename" id="filename_av">

			</form>





			<!-- end -->



			<span class="close" id="close_btn" data-dismiss="modal">&times;</span>
			<form action="change.php" method="post">
				<input type="hidden" id="hidden_destid" name="destid">					
				<input type="hidden" id="hidden_olddata" name="olddata">					
				<input type="hidden" id="hidden_fontcolor_new" name="newfontcolor">
				<input type="hidden" id="hidden_fontfamily_new" name="newfontname">
				<input type="hidden" id="hidden_filename" name="filename">
				<input type="hidden" id="hidden_endtag" name="endtag">


				<div class="form-group">
					<label for="email">Text:</label>
					<input type="text" class="form-control" id="h_form_1" name="newdata" onblur="text_change('h_form_1','header_preview')">
				</div>
				<div class="form-group">
					<label for="pwd">Font :</label>
					<select onchange="font_change(this)">
						<option> Comic Sans Ms </option>
						<option> Times New Roman </option>
						<option> Verdana </option>
						<option> Open Sans </option>
					</select>
				</div>

				<div class="form-group col-md-12">
					<div class="row">
						<div class="col-md-1">
							<label for="pwd">Color :</label>
						</div>
						<div class="col-md-2">
							<input type="color" class="form-control" id="head" name="head" value="#ffffff" onchange="color_change('h_form_1','header_preview',this)"> 
						</div>
					</div>
				</div>
				<br/>
				<!-- <input type="color" name="color" value="#e66465" onchange="color_change('h_form_1','header_preview',this)"> -->
				<!-- <div>
					<label class="teal">
						<input type="radio" name="color" value="teal" onchange="color_change('h_form_1','header_preview',this)">
						<div class="layer"></div>
						<div class="button"><span></span></div>
					</label>

					<label class="white">
						<input type="radio" name="color" value="white" onchange="color_change('h_form_1','header_preview',this)">
						<div class="layer"></div>
						<div class="button"><span></span></div>
					</label>

					<label class="blue">
						<input type="radio" name="color" value="blue" onchange="color_change('h_form_1','header_preview',this)">
						<div class="layer"></div>
						<div class="button"><span></span></div>
					</label>

					<label class="red">
						<input type="radio" name="color" value="red" onchange="color_change('h_form_1','header_preview',this)">
						<div class="layer"></div>
						<div class="button"><span></span></div>
					</label>
				</div> -->
				<br/>
				<label for="pwd">Preview :</label>
				<p id="header_preview" style="font-size:24px;"></p>
				<button type="submit" class="btn btn-default" name="submit">Submit</button>
				<button type="submit" class="btn btn-default" name="submit_del">Delete </button>
			</form>
			<!-- 	<form>
					Current Value : <input type="text" value="" id="h_form_1">
					Font : <select onchange="font_change(this)">
							<option> Comic Sans Ms </option>
							<option> Times New Romen </option>
							</select>
							
					<br/>
					Preview : <p id="header_preview"></p>
				</form> -->
			</div>
		</div>


		<div class="panel">
			<table class="table" style="color:white;width:100%;border:1px solid white;">
				<thead>
					<tr style="border:1px solid white;">
						<th colspan="2" style="text-align: center;">Text</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border:1px solid white;"><i class="material-icons" style="font-size:48px;text-align: center;" draggable="true" ondragstart="addmetocookie('text')" >title</i> <br/>Header</td>
						<td><i class="material-icons" style="font-size:48px;text-align: center;" ondragstart="addmetocookie('text')" draggable="true">format_align_left</i> <br/>Paragraph</td>
					</tr>
				</tbody>
				<tr>

				</tr>
				
				<thead>
					<tr style="border:1px solid white;">
						<th colspan="2" style="text-align: center;">Media</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border:1px solid white;"><i class="material-icons" style="font-size:48px;text-align: center;" ondragstart="addmetocookie('img')" draggable="true">crop_original</i> <br/>Image</td>
						<td><i class="material-icons" style="font-size:48px;text-align: center;" ondragstart="addmetocookie('vdo')" draggable="true">movie_creation</i> <br/>Video</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="frame">
			<iframe src="<?php echo $_SESSION['sitepathname']?>" class="myiframe">
			</iframe>
		</div>
		
		<script>
			function update_preview_text(dest,text,fn,fc)
			{
				var pre_txt = document.getElementById(dest);
				pre_txt.innerHTML = text;
				pre_txt.style.color = fc;
				pre_txt.style.fontFamily = fn;
			}

			function color_change(source,dest,f_color)
			{

				var text = document.getElementById(source);
				var para = document.getElementById(dest);
				para.innerHTML = text.value;
				para.style.color = f_color.value;
				var font_color	 = document.getElementById("hidden_fontcolor_new");
				font_color.value = f_color.value;
				console.log(font_color.value);
				
			}
			
			function text_change(source,dest)
			{

				var text = document.getElementById(source);
				var para = document.getElementById(dest);
				para.innerHTML = text.value;				
			}

			function font_change(a)
			{				
				var text = document.getElementById('h_form_1');
				var para = document.getElementById('header_preview');
				para.innerHTML = text.value;
				para.style.fontFamily = a.value;
				var font_family	 = document.getElementById("hidden_fontfamily_new");
				font_family.value = a.value;
				
			}


			function del_img_view(destid,fname,src_data)
			{
				var f = document.getElementById('img_modal');
				f.style.display = "block";
				var destid_field = document.getElementById('del_img_destid');
				var filename_att = document.getElementById('filename_di');
				var imgdataname_att = document.getElementById('imgdataname');
				
				destid_field.value = destid;
				filename_att.value = fname;
				imgdataname_att.value = src_data;

				// var f1 = document.getElementById('filename_at');
				// f1.value = filename;
				// alert(destid_field.value);
				// f.submit();
			}


			function popup_view(a,b,c,fontname,fontcolor,filename,tag)
			{
				// <!-- alert(a +" - " + b + " - " + c + " - " +  + " - " ); -->
				var x = document.getElementById("h_form_1");
				x.value = c;
				var x1 = document.getElementById("myModal");
				x1.style.display = "block";
				update_preview_text('header_preview',c,fontname,fontcolor);
				var destid = document.getElementById("hidden_destid");
				destid.value = a;
				var olddata	 = document.getElementById("hidden_olddata");
				olddata.value = c;
				var font_family	 = document.getElementById("hidden_fontfamily_new");
				font_family.value = fontname;
				var font_color	 = document.getElementById("hidden_fontcolor_new");
				font_color.value = fontcolor;
				var fname = document.getElementById("hidden_filename");
				fname.value = filename;
				var tagname = document.getElementById("hidden_endtag");
				tagname.value = tag;
				
				// <!-- alert(font_family.value); -->
				// <!-- alert(font_color.value); -->
				
				
				
			}

			function add_new_text(destid,fname)
			{
				var f = document.getElementById('add_text');
				var destid_field = document.getElementById('add_text_destid');
				var filename_att = document.getElementById('filename_at');
				destid_field.value = destid;
				filename_att.value = fname;

				// var f1 = document.getElementById('filename_at');
				// f1.value = filename;
				// alert(destid_field.value);
				f.submit();
			}

			function add_new_img(destid,fname)
			{
				var f = document.getElementById('add_img');
				var destid_field = document.getElementById('add_img_destid');
				var filename_att = document.getElementById('filename_ai');
				destid_field.value = destid;
				filename_att.value = fname;

				// var f1 = document.getElementById('filename_at');
				// f1.value = filename;
				// alert(destid_field.value);
				f.submit();
			}


			function add_new_vdo(destid,fname)
			{
				var f = document.getElementById('add_vdo');
				var destid_field = document.getElementById('add_vdo_destid');
				var filename_att = document.getElementById('filename_av');
				destid_field.value = destid;
				filename_att.value = fname;

				// var f1 = document.getElementById('filename_at');
				// f1.value = filename;
				// alert(destid_field.value);
				f.submit();
			}

		</script>
		
		<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementById("close_btn");

		

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>

	<script type="text/javascript">
		
		function get_curr_folder(folder)
		{
			$('#dir_path').val(folder);
			console.log($('#dir_path').val());
		}

		function get_preview_path(path)
		{
			$('#preview_btn').attr('href',path);
			console.log($('#preview_btn'));
		}		


		function setCookie(cname, cvalue, exdays)
		{
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+ d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname)
		{
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function addmetocookie(a)
		{
			setCookie("ew_dad_cn",a,1);
			console.log(getCookie("ew_dad_cn"));
				//alert(getCookie("ew_dad_cn"));
			}
		</script>

	</body>
	</html>