<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $title ?></title>

<link rel="shortcut icon" href="favicon.png">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/styles.css" rel="stylesheet">
</head>

<body>
<header>
    <!-- navigation	menu -->
    <nav id="navfix" class="navbar navbar-inverse" role="navigation">
        <a class="navbar-brand" href="index.php"><img class="img img-responsive" src="favicon.png"/> Key Distribution
            System</a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- Tempory navigation for different site functions -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($logged == 1) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user pull-left"></span><span
                                    class="user-name-style"> <?php echo $user->getProfile() ?></span> <span
                                    class="sr-only">(current)</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php">Account Settings <span class="fa fa-cogs pull-right"></span></a>
                            </li>
                        </ul>
                    </li>
                <?php } else if ($logged == 0) { ?>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?logout=1" class="text-muted"> Register <span
                                        class="fa fa-keys pull-right"></span></a></li>
                    </ul>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- <hr class="shadow"> -->
    </nav>
    <!-- <div id="forfixednav">
    </div> -->
</header><!-- Header end, Wrapper Start -->
<div class="wrapper">
