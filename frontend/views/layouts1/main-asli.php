
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="">
        <meta name="author" content="Djava UI">
        <title>PTSP DKI</title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->
        <link href="../../../../img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="../../../../img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="../../../../img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="../../../../img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="../../../../img/ico/html/apple-touch-icon.png" rel="shortcut icon">
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="../../../../assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="../../../../assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../../../assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="../../../../assets/frontend/start-page/css/start-page.css" rel="stylesheet">
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../../../assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
    <!--/ END HEAD -->

    <!--

    |=========================================================================================================================|
	|  TABLE OF CONTENTS (Use search to find needed section)                                                                  |
	|=========================================================================================================================|
    |  01. @HEAD                        |  Container for all the head elements                                                |
	|  02. @META SECTION                |  The meta tag provides metadata about the HTML document                             |
	|  03. @FAVICONS                    |  Short for favorite icon, shortcut icon, website icon, tab icon or bookmark icon    |
	|  04. @FONT STYLES                 |  Font from google fonts                                                             |
	|  05. @GLOBAL MANDATORY STYLES     |  The main 3rd party plugins css file                                                |
	|  06. @PAGE LEVEL STYLES           |  Specific 3rd party plugins css file                                                |
	|  07. @THEME STYLES                |  The main theme css file                                                            |
	|  08. @IE SUPPORT                  |  IE support of HTML5 elements and media queries                                     |
	|=========================================================================================================================|
	|  09. @BODY                        |  Contains all the contents of an HTML document                                      |
	|  10. @LOADING ANIMATION           |  Loading animation when the page reload                                             |
	|  11. @WRAPPER                     |  Wrapping page section                                                              |
	|  12. @TOP BAR                     |  Top navigation contains logo and link sign                                         |
	|  13. @BANNER                      |  Banner landing page section                                                        |
	|  14. @TOP REASONS                 |  Top reasons feature page section                                                   |
	|  15. @BLANKON VERSIONS            |  Blankon versions page section                                                   |
	|  16. @BEAUTIFUL DESIGN            |  Feature 1 beautiful design                                                         |
	|  17. @RESPONSIVE LAYOUT           |  Feature 2 100% responsive layout                                                   |
	|  18. @PAGE INCLUDE                |  Feature 3 120+ page include                                                        |
	|  19. @COLOR SCHEMES               |  Feature 4 27 color schemes, 6 colors navbar and 6 colors sidebar                   |
	|  20. @FEATURES                    |  All feature blankon                                                                |
	|  21. @SUPPORTED RESOLUTIONS       |  Devices list supported resolutions                                                 |
	|  22. @SUMMARY                     |  Summary landing page section                                                       |
	|  23. @FOOTER                      |  Footer landing page section                                                        |
	|  24. @BACK TOP                    |  Element back to top and action                                                     |
	|=========================================================================================================================|
	|  25. @CORE PLUGINS                |  The main 3rd party plugins script file                                             |
	|  26. @PAGE LEVEL PLUGINS          |  Specific 3rd party plugins script file                                             |
	|  27. @PAGE LEVEL SCRIPTS          |  The main theme script file                                                         |
	|=========================================================================================================================|

    START @BODY
    |=========================================================================================================================|
	|  TABLE OF CONTENTS (Apply to body class)                                                                                |
	|=========================================================================================================================|
    |  01. page-boxed                   |  Page into the box is not full width screen                                         |
	|  02. page-sound                   |  For playing sounds on user actions and page events                                 |
	|=========================================================================================================================|

	-->
    <body class="page-sound">

        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @WRAPPER -->
        <div id="wrapper">

            <!-- START @TOP BAR -->
            <div id="top-bar">
                <div class="inner">
                    <nav class="navbar" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle btn-sm" data-toggle="collapse" data-target="#navbar-sign">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="index.html"><img src="../../../../img/logo/html/logo-white.png" alt="..."/></a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-sign">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../../../admin/html/page-signup.html">Sign up</a></li>
                                    <li><a href="../../../admin/html/page-signin.html">Sign in</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
            <!--/ END TOP BAR -->

            <!-- START @TOP REASONS -->
            <div id="top-reasons">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-12">
                            <article>
                                <h2>Achieve more productivity in your web development</h2>
                                <p class="text-muted">
                                    Blankon included are multiple example pages, elements styles, and javascript widgets to get your project started.
                                </p>
                            </article>
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                                    <i class="fa fa-heart fa-5x"></i>
                                    <span>Beautiful Design</span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                                    <i class="fa fa-mobile fa-5x"></i>
                                    <span>100% Responsive</span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                                    <i class="fa fa-files-o fa-5x"></i>
                                    <span>120+ Page Include</span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                                    <i class="fa fa-tint fa-5x"></i>
                                    <span>25+ Color Schemes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END TOP REASONS -->

            <!-- START @BLANKON VERSIONS -->
            <div id="blankon-versions">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-12">
                            <article>
                                <h2>Blankon versions all within bundle</h2>
                                <p class="text-muted">
                                    New package contains <b>8</b> versions
                                </p>
                            </article>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/html-version.png" alt="html version"/>
                                    <h3>HTML Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/angularjs-version.png" alt="angularjs version"/>
                                    <h3>AngularJS Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/yii-version.png" alt="yii version"/>
                                    <h3>Yii2 Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/laravel-version.png" alt="laravel version"/>
                                    <h3>Laravel Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/ajax-version.png" alt="ajax version"/>
                                    <h3>AJAX Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/php-version.png" alt="php version"/>
                                    <h3>PHP Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/codeigniter-version.png" alt="codeigniter version"/>
                                    <h3>Codeigniter Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <span class="label-version label label-danger">New</span>
                                    <img src="../../../../img/showcase/yeoman-version.png" alt="yeoman version"/>
                                    <h3>Yeoman + GruntJS Version</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img src="../../../../img/showcase/material-design-version.gif" alt="material design version"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END BLANKON VERSIONS -->

            <!-- START @BEAUTIFUL DESIGN -->
            <div class="feature">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-5">
                            <article>
                                <h2>Beautiful Design</h2>
                                <p>Beautifully designed, lovingly coded and absolutely bursting with functionality.</p>
                            </article>
                        </div>
                        <div class="col-md-7">
                            <img src="../../../../img/showcase/beutiful-design.jpg" class="img-responsive" alt="beautiful design"/>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END BEAUTIFUL DESIGN -->

            <!-- START @RESPONSIVE LAYOUT -->
            <div class="feature">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-5">
                            <article>
                                <h2>100% Responsive</h2>
                                <p>It`s suitable for any user interface and for any devices – from desktop to mobile devices.</p>
                            </article>
                        </div>
                        <div class="col-md-7">
                            <img src="../../../../img/showcase/100-responsive.jpg" class="img-responsive" alt="responsive layout"/>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END RESPONSIVE LAYOUT -->

            <!-- START @PAGE INCLUDE -->
            <div class="feature">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-5">
                            <article>
                                <h2>120+ Page Include</h2>
                                <p>There are a lot of page design that supports the development of a websites or web applications.</p>
                            </article>
                        </div>
                        <div class="col-md-7">
                            <img src="../../../../img/showcase/50-Include.jpg" class="img-responsive" alt="page include"/>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END PAGE INCLUDE -->

            <!-- START @COLOR SCHEMES -->
            <div class="feature">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-5">
                            <article>
                                <h2>25+ Color Schemes</h2>
                                <p>Include 25+ different theme. Soft style design, full colors and good color combination on each element.</p>
                            </article>
                        </div>
                        <div class="col-md-7">
                            <img src="../../../../img/showcase/color-schemes.jpg" class="img-responsive" alt="color schemes"/>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END COLOR SCHEMES -->

            <!-- START @FEATURES -->
            <div id="features">
                <div class="inner">
                    <article>
                        <h2>Get more features. Get more done.</h2>
                        <p class="text-muted">Blankon offers more useful features, powerful page builder and advanced theme options. So you can do more to customize the experience, organize your projects, and optimize your productivity.</p>
                    </article>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-edit fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Built Using Bootstrap 3</h4>
                                        <p class="text-muted">A front-end toolkit for creating websites. It is a collection of CSS, HTML and other interface components, as well as optional Javascript extensions.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-code fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Using LESS & SASS</h4>
                                        <p class="text-muted">Blankon easy to use and re-developed because blankon admin developed using LESS & SASS, there are variables, mixins, operations and functions of CSS.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-thumbs-up fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Code Quality</h4>
                                        <p class="text-muted">Quality source Code nicely formatted and commented to make editing this template as easy as possible so Blankon is very user friendly.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-dropbox fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Blankon Versions <span class="label label-success">New</span></h4>
                                        <p class="text-muted">Blankon versions all within bundle, available 8 versions <b>Static HTML</b>, <b>AngularJS</b>, <b>Yii2</b> and <b>More</b>. Blankon packages that will help you in your awesome project.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-briefcase fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Bower Package Manager</h4>
                                        <p class="text-muted">Web sites are made of lots of things frameworks, libraries, assets, utilities, and rainbows. Bower manages all these things for you.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-maxcdn fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">CDN Library</h4>
                                        <p class="text-muted">An open source CDN for Javascript and CSS sponsored by CloudFlare that hosts everything from jQuery and Modernizr to Bootstrap.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-cubes fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">40+ JQuery Plugins</h4>
                                        <p class="text-muted">Blankon includes custom plugins, forms, validations, charts, tables, datatables, notifications, text editors, maps and much more plugins powered by JQuery.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-magic fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">5+ Widget Types</h4>
                                        <p class="text-muted">
                                            5 Widget types available on this template. like as overview, social, blog, weather and miscellaneous widget. this is very functionaly for your website production.
                                        </p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-paw fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">5 Icon Types</h4>
                                        <p class="text-muted">5 Kind of icons available on this template. Glyphicons Pro (<strong>save $59</strong>), Glyphicons, Font Awesome, etc. More than 3000+ icons which can to be use for this template.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-cogs fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Easy to Customize</h4>
                                        <p class="text-muted">Blankon admin is a simple design and very user friendly. In each section of the script we provide some comments to help determine all of the parts to be edited.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-music fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Playing Sounds</h4>
                                        <p class="text-muted">
                                            Today websites are full of events (new mail, new chat-message, content update etc.). Often it is not enough to indicate this events only visually to get user attention.
                                        </p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-html5 fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Valid HTML5 & CSS3 Code</h4>
                                        <p class="text-muted">All design code Blankon have been tested valid HTML5 and CSS3 code, thus later providing a powerful quality code for your website.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-book fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Well Documentation</h4>
                                        <p class="text-muted">Blankon documentation summarized well and clearly. Documentation about base style, javascript plugins, license resource, color schemes and many more. <a href="../../../../documentation/admin/html/live-preview-documentation.html" target="_blank">Let's Read</a></p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-life-ring fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">Fully Support</h4>
                                        <p class="text-muted">Services template bug issues raised by buyers quickly and we continue to develop templates to be more feature and better than ever.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-smile-o fa-2x"></i>
                                </div>
                                <div class="media-body">
                                    <article>
                                        <h4 class="media-heading">And More ++</h4>
                                        <p class="text-muted">WOW! That is all the features blankon and many more you do not know . so if you want to know more let's go to <a href="../../../admin/html/dashboard.html" target="_blank">live preview</a> BLANKON ...</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END FEATURES -->

            <!-- START @SUPPORTED RESOLUTIONS  -->
            <div id="supported-resolutions" class="hidden-sm hidden-xs">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-12">
                            <article>
                                <h2>SUPPORTED RESOLUTIONS</h2>
                                <p class="text-muted">Blankon support for any devices - from desktop to mobile devices. CHECK IT!</p>
                            </article>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-scrollable">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Desktops <strong>(11)</strong></h3>
                                            </div>
                                            <div class="pull-right">
                                                <i class="fa fa-desktop fa-2x"></i>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">10" Netbook</h4>
                                                            <small class="text-muted">1024 x 600</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1024x600&quot; data-version=&quot;10&quot; data-icon=&quot;notebook&quot; class=&quot;active&quot;&gt;10" Netbook&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">12" Netbook</h4>
                                                            <small class="text-muted">1024 x 768</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1024x768&quot; data-version=&quot;12&quot; data-icon=&quot;notebook&quot; class=&quot;active&quot;&gt;12" Netbook&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">13" Notebook</h4>
                                                            <small class="text-muted">1024 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1024x800&quot; data-version=&quot;13&quot; data-icon=&quot;notebook&quot; class=&quot;active&quot;&gt;13" Netbook&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">15" Notebook</h4>
                                                            <small class="text-muted">1366 x 768</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1366x768&quot; data-version=&quot;15&quot; data-icon=&quot;notebook&quot; class=&quot;active&quot;&gt;15" Netbook&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">17" Notebook</h4>
                                                            <small class="text-muted">1024 x 768</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1024x768&quot; data-version=&quot;17&quot; data-icon=&quot;notebook&quot; class=&quot;active&quot;&gt;17" Notebook&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">19" Desktop</h4>
                                                            <small class="text-muted">1440 x 900</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1440x900&quot; data-version=&quot;19&quot; data-icon=&quot;tv&quot; class=&quot;active&quot;&gt;19" Desktop&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">20" Desktop</h4>
                                                            <small class="text-muted">1600 x 900</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1600x900&quot; data-version=&quot;20&quot; data-icon=&quot;tv&quot; class=&quot;active&quot;&gt;20" Desktop&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">22" Desktop</h4>
                                                            <small class="text-muted">1680 x 1050</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1680x1050&quot; data-version=&quot;22&quot; data-icon=&quot;tv&quot; class=&quot;active&quot;&gt;22" Desktop&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">23" Desktop</h4>
                                                            <small class="text-muted">1920 x 1080</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1920x1080&quot; data-version=&quot;23&quot; data-icon=&quot;tv&quot; class=&quot;active&quot;&gt;23" Desktop&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">24" Desktop</h4>
                                                            <small class="text-muted">1920 x 1200</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;1920x1200&quot; data-version=&quot;24&quot; data-icon=&quot;tv&quot; class=&quot;active&quot;&gt;24" Desktop&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">30" Apple Cinema Display</h4>
                                                            <small class="text-muted">2560 x 1600</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="try" href='javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;2560x1600&quot; data-version=&quot;30&quot; data-icon=&quot;display&quot; class=&quot;active&quot;&gt;30" Apple Cinema Display&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));'><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-scrollable">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Tablets <strong>(10)</strong></h3>
                                            </div>
                                            <div class="pull-right">
                                                <i class="fa fa-tablet fa-2x"></i>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">ALCATEL ONE TOUCH T20</h4>
                                                            <small class="text-muted">600 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;600x1024&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;ALCATEL ONE TOUCH T20&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Amazon Kindle Fire</h4>
                                                            <small class="text-muted">600 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;600x1024&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Amazon Kindle Fire&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Amazon Kindle Fire HD</h4>
                                                            <small class="text-muted">800 x 1280</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;800x1280&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Amazon Kindle Fire HD&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Apple iPad (2-3rd, mini)</h4>
                                                            <small class="text-muted">768 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;768x1024&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Apple iPad (2-3rd, mini)&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Asus Eee 1000</h4>
                                                            <small class="text-muted">600 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;600x1024&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Asus Eee 1000&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Asus Google Nexus 7</h4>
                                                            <small class="text-muted">600 x 960</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;600x960&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Asus Google Nexus 7&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HP TouchPad</h4>
                                                            <small class="text-muted">768 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;768x1024&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;HP TouchPad&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Lenovo IdeaTab A2109</h4>
                                                            <small class="text-muted">800 x 1280</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;800x1280&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Lenovo IdeaTab A2109&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Samsung Galaxy Tab</h4>
                                                            <small class="text-muted">400 x 683</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;400x683&quot; data-icon=&quot;small-tablet&quot; class=&quot;active&quot;&gt;Samsung Galaxy Tab&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sony Xperia Tablet S</h4>
                                                            <small class="text-muted">800 x 1280</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;800x1280&quot; data-icon=&quot;tablet&quot; class=&quot;active&quot;&gt;Sony Xperia Tablet S&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-scrollable">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Mobile <strong>(27)</strong></h3>
                                            </div>
                                            <div class="pull-right">
                                                <i class="fa fa-mobile-phone fa-2x"></i>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Apple iPhone, iPod Touch</h4>
                                                            <small class="text-muted">320 x 480</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x480&quot; data-icon=&quot;iphone&quot; class=&quot;active&quot;&gt;Apple iPhone, iPod Touch&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Apple iPhone 5</h4>
                                                            <small class="text-muted">320 x 480</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x568&quot; data-version=&quot;5&quot; data-icon=&quot;iphone&quot; class=&quot;active&quot;&gt;Apple iPhone 5&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">BlackBerry Torch</h4>
                                                            <small class="text-muted">480 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x800&quot; data-icon=&quot;blackberry&quot; class=&quot;active&quot;&gt;BlackBerry Torch&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">BlackBerry Bold Touch 9900</h4>
                                                            <small class="text-muted">480 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x640&quot; data-icon=&quot;blackberry&quot; class=&quot;active&quot;&gt;BlackBerry Bold Touch 9900&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">BlackBerry Curve</h4>
                                                            <small class="text-muted">480 x 360</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x360&quot; data-icon=&quot;blackberry&quot; class=&quot;active&quot;&gt;BlackBerry Curve&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HTC Desire</h4>
                                                            <small class="text-muted">320 x 533</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x533&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;HTC Desire&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HTC One X</h4>
                                                            <small class="text-muted">360 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;360x640&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;HTC One X&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HTC Touch Diamond</h4>
                                                            <small class="text-muted">480 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x640&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;HTC Touch Diamond&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HTC Touch HD</h4>
                                                            <small class="text-muted">480 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x800&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;HTC Touch HD&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">HTC Sensation</h4>
                                                            <small class="text-muted">540 x 960</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;540x960&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;HTC Sensation&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">LG Optimus One</h4>
                                                            <small class="text-muted">320 x 480</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x480&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;LG Optimus One&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">LG Optimus 3D</h4>
                                                            <small class="text-muted">480 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x800&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;LG Optimus 3D&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">LG Optimus 4X HD</h4>
                                                            <small class="text-muted">720 x 1280</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;720x1280&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;LG Optimus 4X HD&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Motorola Mobility Milestone</h4>
                                                            <small class="text-muted">320 x 570</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x570&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Motorola Mobility Milestone&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Motorola Mobility RAZR i</h4>
                                                            <small class="text-muted">360 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;360x640&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Motorola Mobility RAZR i&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Nokia E6</h4>
                                                            <small class="text-muted">480 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x640&quot; data-icon=&quot;handy&quot; class=&quot;active&quot;&gt;Nokia E6&lt;/a&gt;&lt;script src=&quoquot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Nokia Lumia</h4>
                                                            <small class="text-muted">480 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x800&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Nokia Lumia&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Nokia Lumia 920</h4>
                                                            <small class="text-muted">768 x 1280</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;768x1280&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Nokia Lumia 920&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Samsung Galaxy Ace</h4>
                                                            <small class="text-muted">320 x 480</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;320x480&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Samsung Galaxy Ace&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Samsung Nexus</h4>
                                                            <small class="text-muted">360 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;360x640&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Samsung Nexus&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Samsung Galaxy S</h4>
                                                            <small class="text-muted">480 x 800</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x800&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Samsung Galaxy S&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sharp SX862</h4>
                                                            <small class="text-muted">480 x 854</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x854&quot; data-icon=&quot;handy&quot; class=&quot;active&quot;&gt;Sharp SX862&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sharp 941SH</h4>
                                                            <small class="text-muted">480 x 1024</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x1024&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Sharp 941SH&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sharp IS03</h4>
                                                            <small class="text-muted">640 x 960</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;640x960&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Sharp IS03&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sony Ericsson Satio</h4>
                                                            <small class="text-muted">360 x 640</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;360x640&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Sony Ericsson Satio&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sony Ericsson U</h4>
                                                            <small class="text-muted">480 x 854</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;480x854&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Sony Ericsson U&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="list-group-item">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-check"></i>
                                                        </li>
                                                        <li>
                                                            <h4 class="no-margin">Sony Ericsson P</h4>
                                                            <small class="text-muted">540 x 960</small>
                                                        </li>
                                                        <li>
                                                            <a data-text="Try" href="javascript:void((function(d){if(self!=top||d.getElementById(&#039;toolbar&#039;)&amp;&amp;d.getElementById(&#039;toolbar&#039;).getAttribute(&#039;data-Try&#039;))return false;d.write(&#039;&lt;!DOCTYPE HTML&gt;&lt;html style=&quot;opacity:0;&quot;&gt;&lt;head&gt;&lt;meta charset=&quot;utf-8&quot;/&gt;&lt;/head&gt;&lt;body&gt;&lt;a data-viewport=&quot;540x960&quot; data-icon=&quot;mobile&quot; class=&quot;active&quot;&gt;Sony Ericsson P&lt;/a&gt;&lt;script src=&quot;http://lab.maltewassermann.com/viewport-resizer/resizer.min.js&quot;&gt;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;&#039;)})(document));"><span>&harr; Try</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END SUPPORTED RESOLUTIONS  -->

            <!-- START @SUMMARY -->
            <div id="summary">
                <div class="inner">
                    <p><i class="fa fa-heart fg-red"></i> MADE IN <span class="fg-blue">J</span><span class="fg-red">O</span><span class="fg-yellow">O</span><span class="fg-blue">G</span><span class="fg-green">J</span><span class="fg-red">A</span></p>
                </div>
            </div>
            <!--/ END SUMMARY -->

            <!-- START @FOOTER -->
            <div id="footer">
                <div class="inner">
                    <div class="copyright">
                        &copy; Blankon 2015 ·
                        <a href="http://djavaui.com/about-us" target="_blank">About us</a>·
                        <a href="mailto:maildjavaui@gmail.com" target="_blank">Contact us</a>·
                        <a href="http://djavaui.com/" target="_blank">Our website</a>·
                    </div>
                </div>
            </div>
            <!--/ END FOOTER -->

        </div>
        <!--/ END WRAPPER -->

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse">
            <i class="fa fa-angle-up"></i>
        </div>
        <!--/ END BACK TOP -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="../../../../assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="../../../../assets/global/plugins/bower_components/jquery-waypoints/waypoints.min.js"></script>
        <script src="../../../../assets/global/plugins/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="../../../../assets/frontend/start-page/js/blankon.start-page.js"></script>
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRPCm5Ee%2bm%2b0MCfbn%2fkCGS%2fLej842hcpx0aOGAkX%2bnhjYTzvTVWNgsy2Y%2f%2flA%2buOypqRhZdUXg%2b6%2fmVuUIMGQbjZ%2b3WuzaMERB2mTQembeZHBuGv27rKA8qwGz%2bdo7nNzvkMXzgZRYqaQ0qp3SHlm9PQg2tHt3C02e293ubw8I3CHFUU%2fhMIlpOt%2bTicyWEdZZJCmIImmyGvm%2f5cQlZjish5SIwccmaburxA%2fR0jF5GuGPysoZQClYqCuDwn0yDPr%2bPjd3KV90UJbLJPxRnGsFW39sfj%2f2f61WENebhc%2fmKOvf07wQGxiY8yVcBx0eMIgeHid1oZ2ulg%2faBwBqc3w9TkoibqVr3Cu5%2bofMRTRB8Ukdx8hMG3IZU%2b%2bghaqUBYKvZzm53vao3%2fNqwJ%2fQguTAUQJEisTDUuq3uemSlPAwt4kGQgZmcurVH8%2bt4WNychTq69cu%2fgRGwQEDKtcTKMrf%2fOT5fJK7lz5cKRVNN80lWURESaLyBjig%2bQ8qPfV2gWMw3LsEhV2qM5WkpNVX1XU0Dk2idvlQPcf9fZ7B%2bv3YRNgV7vsgjxoQq0Fl8L2NPmPxW66nIrFTBfSenxGd4BFqyxQxdXflKaye%2bHoqEkQ7sV3jAPB4hKcR3w%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    <!--/ END BODY -->

</html>