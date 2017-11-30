<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous">
		</script>
    <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.js"></script>
		<title>F.Bayon Forte</title>
		<style>
		      .dev-fixed-footer{position:fixed;bottom:0px;left:0px;height:100px;overflow-y:scroll;border:solid 1px #ccc;}
          .scroller{ padding:10px;line-height:2.2;height:200px;max-height:200px;background-color:#333;border:5px solid #000;border-radius:5px; color:orange;overflow:hidden;overflow-y:scroll;margin-bottom:30px;margin-top:15px;}
          #repo_list a{color:orange;text-decoration:none;}
          #repo_list a:hover{color:green;}
          ul{list-style:none;}
          .pg-content input, .pg-content button{width:100%;  margin-top:5px;}
          @media (min-width: 0px) and (max-width: 768px) {
            h1{font-size:24px;}
          }
		</style>
	</head>

	<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar" >
						<div class="navbar visible-desktop">
							<div class="navbar-inner ">
 									<ul class="nav navbar-nav">
										<li>
											<a class="navbar-brand" href="dashboard.php?c=dashboard&m=home" style="color:#fff !important;">F.Bayon Forte</a>
										</li>
										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
    										<ul class="dropdown-menu">
        										<li> <a id='public1' href='?c=public&m=public1'> GitHub API </a></li>
        										<li> <a id='public2' href='?c=public&m=public2'> Responsive Design </a></li>
        										<li> <a id='public3' href='?c=public&m=public3'> jQuery </a></li>
                            <li> <a id='public3' href='?c=public&m=public3'> Bootstrap </a></li>
    										</ul>
										</li>
									</ul>
 							</div>
						</div>
					</div>
			</nav>
	    <div class="container">
	       <?php $heightOfNavigation = "65px"; ?>
	       <div class="row pg-content" style="margin-top:<?php echo($heightOfNavigation); ?>;">
	           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	              <h1>GitHub Repo Viewer</h1>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left" style="padding:0;">
                    <input id="gitHubUser" type="text" name="user" placeholder="Git Hub Username" value="bayon"/>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right margin" style="padding:0;">
                    <button id="btn_get_repos">view</button>
                </div>
                <div class="scroller col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <ul id="repo_list"></ul>
                </div>
	           </div>
	       </div>
	    </div>

		<script>
		$(document).ready(function(){
      $("#btn_get_repos").click(function() {
        var username = $("#gitHubUser").val();
          $.ajax({
              type: "GET",
              url: "https://api.github.com/users/"+username+"/repos",
              dataType: "json",
              success: function(result) {
                  for(var i in result ) {
                      $("#repo_list").append(
                          "<li><a href='" + result[i].html_url + "' target='_blank'>" +
                          result[i].name + "</a></li>"
                      );
                  }
              }
          });
      });
		});
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
