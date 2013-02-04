<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title;
?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="restaurant simulation">
        <meta name="author" content="<?php echo $author; ?>">

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-lightbox.min.css" rel="stylesheet">
<link href="css/bootstrap-lightbox.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo $title;?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <!--INSERT NEW LINKS HERE-->
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>