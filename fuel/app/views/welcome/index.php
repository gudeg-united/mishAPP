<?php
  $active = function($button) {
    $data = new \stdClass;
    if ($button->is_available) {
      $data->class = "enabled";
      $data->href = Uri::create('report/disaster', array('type' => $button->id), array('type' => ':type'));
    } else {
      $data->class = "disabled";
      $data->href = "javascript:;";
    };

    return $data;
  };
?>

<div class="row">
  <div class="columns">
    <div id="logo"><?php echo Asset::img('logo.png'); ?></div>
    <h1 class="text-center">
      Report a disaster
    </h1>

    <input type="hidden" value="" id="latitude">
    <input type="hidden" value="" id="longitude">

    <ul class="submit-btns" id="buttons">
      <?php if (!empty($buttons)) : ?>
        <?php foreach ($buttons as $button) : ?>
          <li>
            <a title="<?php echo $button->name; ?>" class="<?php echo $active($button)->class; ?> report-disaster" href="<?php echo $active($button)->href; ?>">
              <?php echo Asset::img('icon-' . strtolower($button->name) . '.png') ?>
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>

    <p class="loading text-center">Please wait while we're getting your location.</p>
  </div>
</div>
