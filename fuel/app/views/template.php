<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('all.css'); ?>
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;amp;language=en" type="text/javascript" data-turbolinks-track="true"></script>
</head>
<body>
    <div id="mapbg"></div>
    <div id="wrapper">
      <div class="row">
        <div class="columns">
          <?php echo $content; ?>
          <div class="home-footer">
            <ul>
              <li>
                <a href="#">Latest disasters at my location</a>
              </li>
              <li>
                <a href="#">Survival tips</a>
              </li>
              <li>
                <a href="#">Missing people</a>
              </li>
              <li>
                <a href="#">Food supplies</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php echo Asset::js('all.js'); ?>
    <?php echo Asset::js('gmap3.js'); ?>
    <?php echo Asset::js('site.js'); ?>
</body>
</html>
