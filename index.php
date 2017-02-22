		<?php
		include_once('simple_html_dom.php');
		// Create DOM from URL or file
		
		if(isset($_GET['url']) && isset($_GET['url']))
		{
			$html = file_get_html(html_entity_decode($_GET['url']));
		}	

		//echo $html->plaintext; 
		// Find all images 
		//foreach($html->find('img') as $element) 
		//       echo $element->src . '<br>';

		// Find all links 
		   ?>
		  <!DOCTYPE html>
			<html lang="en">

			<head>

			    <meta charset="utf-8">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta name="viewport" content="width=device-width, initial-scale=1">
			    <meta name="description" content="Scrap anything from any website by using Web Scrapper tool.">
			    <meta name="author" content="Pawan Mall">
				<title>Web Scrapper by Pawan Mall</title>
		   		<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
				<!-- Custom CSS -->
			    <style>
				    /* Sticky footer styles
					-------------------------------------------------- */
					html {
					  position: relative;
					  min-height: 100%;
					}
					body {
					  background-color: #2a2a2a;	
					  /* Margin bottom by footer height */
					  margin-bottom: 0px;
					  padding-top: 0px;
				        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
					}
					.footer {
						color: #fff !important;
					  position: absolute;
					  bottom: 0;
					  width: 100%;
					  /* Set the fixed height of the footer here */
					  /* height: 60px; */
					  background-image: -webkit-linear-gradient(top,#3c3c3c 0,#222 100%);
				    background-image: -o-linear-gradient(top,#3c3c3c 0,#222 100%);
				    background-image: -webkit-gradient(linear,left top,left bottom,from(#3c3c3c),to(#222));
				    background-image: linear-gradient(to bottom,#3c3c3c 0,#222 100%);
				    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff3c3c3c', endColorstr='#ff222222', GradientType=0);
				    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
				    background-repeat: repeat-x;
				    border-radius: 4px;
					}


					/* Custom page CSS
					-------------------------------------------------- */
					/* Not required for template or sticky footer method. */

					body > .container {
					  padding: 60px 15px 0;
					}
					.container .text-muted {
				  		margin: 20px 0;
					}

					.footer > .container {
						  padding-right: 15px;
						  padding-left: 15px;
					}

					code {
					  	font-size: 80%;
					}
					textarea{
						width:100% !important;
						height:485px !important;
					}
					.ftext{
						padding-top: 9px;
					}
					a{
						color:#fff;
					}
			    </style>
			    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			    <!--[if lt IE 9]>
			        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			    <![endif]-->
		   </head>
		   <body>
			   <!-- Navigation -->
		    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		        <div class="container">
		            <!-- Brand and toggle get grouped for better mobile display -->
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Tool by Pawan Mall!">Web Scrapper | v1.0</a>
		            </div>
		            <!-- Collect the nav links, forms, and other content for toggling -->
		            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	
		            	<form action="index.php" method="get" style="margin-top: 10px;">
		            		<div class="form-group row">
		            		  <div class="col-md-4">
							  	<input type="text" class="form-control" name="url" placeholder="http://www.abc.com/url" style="width:100%;" value="<?php if(isset($_GET['url'])){ echo $_GET['url']; } ?>" data-toggle="tooltip" data-placement="bottom" title="Please paste URL here!" />	
							  </div>
							  <div class="col-md-3">
							  	<input type="text" class="form-control" name="rule" placeholder="a.class or a#id" style="width:100%;" value="<?php if(isset($_GET['rule'])){ echo $_GET['rule']; } ?>" data-toggle="tooltip" data-placement="bottom" title="Please paste selector here!"  />	
							  </div>
							  <div class="col-md-2">
							  	<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Click here to get results!">Fetch Results</button>
							  </div>
					  		</div>
		            	</form>
			            <!-- /.navbar-collapse -->
			       	</div>
		        <!-- /.container -->
		    </nav>

		    <!-- Page Content -->
				<div class="container">
				<?php if(isset($_GET['url'])){ ?>
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-pills nav-justified">
						  <li role="presentation" <?php if($_GET['rule'] == 'a'){ echo 'class="active"'; }?>><a href="?url=<?php echo $_GET['url']; ?>&rule=a">Get Links</a></li>
						  <li role="presentation" <?php if($_GET['rule'] == 'text' ){ echo 'class="active"'; }?>><a href="?url=<?php echo $_GET['url']; ?>&rule=text">Get Plain Texts</a></li>
						  <li role="presentation" <?php if($_GET['rule'] == 'img'){ echo 'class="active"'; }?>><a href="?url=<?php echo $_GET['url']; ?>&rule=img">Get Images</a></li>
						  <li role="presentation" <?php if($_GET['rule'] == 'h1' || $_GET['rule'] == 'h2' || $_GET['rule'] == 'h3' || $_GET['rule'] == 'h4' || $_GET['rule'] == 'h5' || $_GET['rule'] == 'h6'){ echo 'class="active"'; }?>><a href="?url=<?php echo $_GET['url']; ?>&rule=h1">Get Headings</a></li>
						</ul>
					</div>
				</div>
				<?php } else{ echo "<br />"; } ?>
				<div class="row">
	            <div class="col-md-12 text-center">
					  <textarea class='form-control' onclick="this.focus();this.select()" placeholder="Result will be display here..." data-toggle="tooltip" data-placement="top" title="Your result will be appears here!"><?php
							if(isset($html))
							{
								if(isset($_GET['rule']) ){ $rule = $_GET['rule']; }else{ $rule = 'a'; }
									foreach($html->find($rule) as $element) {
										if($_GET['rule'] == 'a'){
											echo str_replace(" ", "", $element->href). "\n";
										}else if($_GET['rule'] == 'text'){
											echo str_replace(" ", "", $element->plaintext). "\n";
										}else if($_GET['rule'] == 'img'){
											echo str_replace(" ", "", $element->src). "\n";
										}else if($_GET['rule'] == 'h1' || $_GET['rule'] == 'h2' || $_GET['rule'] == 'h3' || $_GET['rule'] == 'h4' || $_GET['rule'] == 'h5' || $_GET['rule'] == 'h6'){
											echo $element->plaintext. "\n";
										}else{
											echo str_replace(" ", "", $element->plaintext). "\n";
										}
								}
							}
						?>  
					</textarea>
					</div>
					</div>
					</div>
					<footer class="footer">
				      <div class="container">
				        <p class="text-center ftext">Tool is developed by <a href="http://www.pawanmall.net/">Pawan Mall</a></p>
				      </div>
				    </footer>
					<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
					<script src="copyme.js"></script>
					<script>
					$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip(); 	

					$('textarea').click(function(){

					  $('textarea').copyme();
					});

					$('#copy').click(function(){

					  $('textarea').copyme();
					});

					});
					</script>
				
				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>			
		   </body>
		   </html> 