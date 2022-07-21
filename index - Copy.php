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
	.rangeslider,
input[type='range'] {
  max-width: 400px;
}

.rangeslider__ruler {
  cursor: pointer;
  font-size: .7em;
  margin: 20px 3px 0 3px;
  position: relative;
  top: 100%;
  text-align: justify;
}

.rangeslider__ruler:after {
  content: "";
  display: inline-block;
  width: 100%;
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

	.sample-div
	{
		width:278px;
		height:470px;
		background:url('White_shadow.png');
		background-repeat:no-repeat;
		background-size:cover;	
		background:#000;
		margin:auto;
		overflow:hidden;
		border:solid thin #ddd;
	}
	.bg-div
	{
		width:197px;
		height:325px;
		background:url('white_flat.png');
		background-repeat:no-repeat;
		background-size:cover;	
		margin:auto;
	}
	
	.logo_div,#logo-div
	{
		width:90px;
		height:90px;
		background-color:red;
		margin:0px auto;
		border-radius:50%;
		z-index:999;
		position:relative;
		
	}
	.logo_div
	{
		top:88px;
	}
	#logo-div
	{
		padding-top:0px;
	}
	.overlay-div
	{
		width:360px;
		height:600px;
		position:absolute;
	}
	.mb-5
	{
		margin-bottom:5px;
		padding-bottom:20px;
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
						<div class="sample-div" id="sample-div">
							<div class="bg-div" id="bg-div">
								<div class="overlay-div"></div>
								<div class="logo_div">
									<div id="logo-div"></div>
								</div>
							</div>
							
						</div>
                  </div>
				  <div class="col-md-6">
					<div class="col-md-12 col-sm-12 mb-5">
						<input type="range" min="0" max="0.9" value="1" step="0.1" id="range">
					</div>
					<div class="col-md-5">
						<label for="upload" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i>  Upload Background 
						</label>
						<input id="upload" type="file"/>
					</div>
					<div class="col-md-4 ">
						<label for="upload1" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i> Upload Logo
						</label>
						<input id="upload1" type="file"/>
					</div>
					<div class="col-md-12 ">
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
		readURL(this,"sample-div");
	});
	
	$("#upload1").change(function() 
	{
		readURL(this,"logo-div");
	});
});

$("#range").on("change",function()
{
	var v = $(this).val();
		
	$(".overlay-div").css({
	   'background-color' : 'white',
	   'opacity' : v,
	});
});


document.getElementById("download").addEventListener("click", function() {
html2canvas(document.getElementById("sample-div"),
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

</script>