<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="IE=edge" http-equiv="X-UA-Compatible">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <title>Index</title>
      <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
      <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
	  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	  <script src="html2canvas.js"></script>
	<style>
	body
	{
		background:#ddd;
	}

	input[type="file"] {
		display: none;
	}
	.custom-file-upload {
		border: 1px solid #ccc;
		display: inline-block;
		padding: 6px 12px;
		cursor: pointer;
	}

	
	.logo-div
	{
		position: absolute;
		width: 80px;
		height: 80px;
		z-index: 999999;
		top: 46px;
		margin-left: 100px;
	}
	
	
	
	.mb-5
	{
		margin-bottom:5px;
		padding-bottom:20px;
	}
	
	#cover-div
	{
		width:290px;
		height:480px;
		background:white;
		border-radius:50px;
		overflow:hidden;
	}
	.img-div
	{
		width:290px;
		height:480px;
		background:url('white_flat.png');
		background-size:cover;
		background-position:center;
		background-repeat:no-repeat;
		border-radius:50px;
		overflow:hidden;
		position:absolute;
		top:0px;
	}
	
	.upper-curve
	{
		width:100px;
		height:100px;
		border-radius:50%;
		background:white;
		margin:auto;
		margin-top:-80px;
		margin-left:90px;
		position:relative;
	}
	
	.lower-curve
	{
		width:100px;
		height:100px;
		border-radius:50%;
		background:white;
		margin:auto;
		margin-top:438px;
		margin-left:90px;
		position:relative;
	}
	
	</style>
   </head>
   <body>
       
      <!--Header-bottom--> 
      <div class="container">
         <div class="wrapper">
            <!--Our Specialist--> 
            <div class="container-fluid section-space">
               <div class="row">
                  <div class="row section-title">
                     <div class="col-md-12">
                        <h2 class="text-center">Upload Photo</h2>
						<hr/>
                     </div>
                  </div>
				  <div class="col-md-6">
						<div id="cover-div">
							<div class="img-div" id="img-div"></div>
							<div class="upper-curve"></div>
							<div class="lower-curve"></div>
							<div class="logo-div" id="logo-div" ></div>
						</div>
                  </div>
				  
				  
				  <div class="col-md-6">
					<div class="col-md-12 col-sm-12 mb-5">
						<input type="range" min="0" max="1" value="1" step="0.1" id="range">
					</div>
					<div class="col-md-5">
						<label for="upload" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i>  Upload Background 
						</label>
						<input id="upload" type="file"/>
					</div>
					<div class="col-md-4" id="logo-browse-div" style="display:none">
						<label for="upload1" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i> Upload Logo
						</label>
						<input id="upload1" type="file"/>
					</div>
					<div class="col-md-12"> <br/>
						<input type="radio" value="no_logo" name="show_logo" class="radio-btn" checked> No Logo &nbsp 
						<input type="radio" value="browse_logo" name="show_logo" class="radio-btn" > &nbsp Custom Logo
						<input type="radio" value="show_default" name="show_logo" class="radio-btn"  >  &nbsp Default Logo
						<br/>
					</div>
					<div class="col-md-12 ">
						<br/>
						<button class="btn btn-default" id="download">
							<i class="fa fa-cloud-upload"></i> Download
						</button>
					</div>
					
					
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="jquery.js"></script>
	  <script src="bootstrap.min.js"></script>
   </body>
</html>
<script>

function readURL(input,id) 
{
	if (input.files && input.files[0]) 
	{
		var reader = new FileReader();
		reader.onload = function(e) 
		{
			var imageUrl = e.target.result ;
			$("#"+id).css({
			   'background' : "url(" + imageUrl + ")",
			   'background-size' : 'cover',
			   'background-repeat' : 'no-repeat',
			   'background-position' : 'center',
			});
			
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$(document).ready(function () 
{
	$("#upload").change(function() 
	{
		readURL(this,"img-div");
	});
	
	$("#upload1").change(function() 
	{
		readURL(this,"logo-div");
	});
});

$("#range").on("change",function()
{
	var v = $(this).val();
		
	$(".img-div").css({
	   'opacity' : v,
	});
});


document.getElementById("download").addEventListener("click", function() {
html2canvas(document.getElementById("cover-div"),
	{
		allowTaint: true,
		useCORS: true,
		scrollX: 0,
		scrollY: -window.scrollY
	}).then(function (canvas) {
		var anchorTag = document.createElement("a");
		document.body.appendChild(anchorTag);
		anchorTag.download = "download";
		anchorTag.href = canvas.toDataURL();
		anchorTag.target = '_blank';
		anchorTag.click();
	});
});


$(".radio-btn").on("change",function()
{
	var v = $(this).val();
	if(v=="no_logo")
	{
		$(".logo-div").css("display","none");
		$("#logo-browse-div").css("display","none");
	}
	if(v=="browse_logo")
	{
		$(".logo-div").css("display","block");
		$(".logo-div").css("background","white");
		$("#logo-browse-div").css("display","block");
	}
	if(v=="show_default")
	{
		$(".logo-div").css("display","block");
		$(".logo-div").css({
		   'background' : "url('logo.png')",
		   'background-size' : 'cover',
		   'background-repeat' : 'no-repeat',
		   'background-position' : 'center',
		});
		$("#logo-browse-div").css("display","none");
	}
	
});
</script>