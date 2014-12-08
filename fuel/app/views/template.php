<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MishApp - <?php echo $title; ?></title>
    <?php echo Asset::css('all.css'); ?>
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;amp;language=en" type="text/javascript" data-turbolinks-track="true"></script>
</head>
<body>
    <div id="mapbg"></div>
    <div id="wrapper">
        <?php echo $content; ?>
        <?php echo $footer; ?>
    </div>
    <?php echo Asset::js('all.js'); ?>
    <?php echo Asset::js('gmap3.js'); ?>
    <?php echo Asset::js('site.js'); ?>
    <?php echo Asset::js('main.js'); ?>
</body>
</html>
