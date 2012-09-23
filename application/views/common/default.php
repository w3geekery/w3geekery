<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,700' rel='stylesheet' type='text/css'>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en-us" />

    <title><?php echo $meta_title ?> | W3Geekery</title>

    <meta name="description" content="<?php echo $meta_description ?>" />
    <meta name="keywords" content="<?php echo $meta_keywords ?>" />
    <meta name="copyright" content="Copyright 2010 - <?= date('Y'); ?> W3Geekery. All Rights Reserved." />

    <link rel="shortcut icon"  href="favicon.ico" />

<?php  foreach ($styles as $file => $type) echo "    ".HTML::style($file, array('media' => $type)), "\n"; ?>

<?php  foreach ($scripts as $file) echo "    ".HTML::script($file), "\n"; ?>

    <!--[if lt IE 8]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
    <![endif]-->

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="/media/css/ie.css?v=<?php echo time(); ?>" />
    <![endif]-->

</head>
<body<?php echo ($body_class)?' class="'.$body_class.'"':''; ?>>
<div id="page-top">

    <?php include 'top-nav.php'; ?>

</div>
<div id="page-body" class="container">

    <?php echo $content ?>

</div>

<?php include 'footer.php' ?>



<?php foreach ($footer_scripts as $file) echo "    ".HTML::script($file), "\n"; ?>

<?php include 'ga-tracking.php' ?>

</body>
</html>
