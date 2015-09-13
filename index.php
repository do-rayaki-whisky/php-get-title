<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Get Title from Webpage</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<SCRIPT TYPE="text/javascript">

		function getTitle(){
			var url = $("#url").val();

			if (url) {

				$.ajax({
				url: 'get_title.php',
				type: 'POST',
				data: 'URL='+url,
				success:function(res){
						$("#title").text(res);
					}
				});	

			} else {

				$("#title").text('No Url Enter.');

			} ;
				
		}

		function clearUrl(){
			$('#url').val("");
			$("#title").text('');
		}

	</SCRIPT>
	<p></p>
	<div class="container">	
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<div class="panel panel-success">
					<div class="panel-heading">Paste Url</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<div class="col-md-2">
									<label for="url">Url : </label>
								</div>
								<div class="col-md-10">
									<input type="text" id="url" class="form-control" onclick='clearUrl()' placeholder="http:www.simple.com">
								</div>
							</div>							
						</form>
						<div class="col-md-2 col-md-offset-5">
								<div class="form-group">
									<input class="btn btn-default" type="button" id="sendbtn" onclick="getTitle()" value="Get Title">
								</div>
							</div>	
					</div>
				</div>
			</div>

			<div class="row">
				<div class="panel panel-info">
					<div class="panel-heading">Page Title</div>
					<div class="panel-body">
						<div id="title"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>