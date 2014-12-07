<?php
   $active = function($button){
    $data = new \stdClass;
    if($button->is_available){
        $data->class = "enabled";
        $data->href = Uri::create('report/disaster', array('type' => $button->id), array('type' => ':type'));
    }
    else{
        $data->class = "disabled";
        $data->href = "javascript:;";
    };

    return $data;
};
?>

<div class="row">
  <div class="columns">
    <div id="logo">
      <img src="/assets/img/logo.png" />
    </div>
    <h1 class="text-center">
      Report a disaster
    </h1>
    <ul class="submit-btns" id="buttons">
      <input type="hidden" value="" id="latitude">
      <input type="hidden" value="" id="longitude">    
      <?php if (!empty($buttons)) : ?>
      <?php foreach ($buttons as $button) : ?>
      <li><a title="<?php echo $button->name; ?>" class="<?php echo $active($button)->class; ?> report-disaster"
             href="<?php echo $active($button)->href; ?>">
          <img src="/assets/img/icon-earthquake.png" />
      </a></li>        
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>
    <ul class="submit-btns" id="messageButtons">
      <li><p>Getting your location.</p></li>
    </ul>
  </div>
</div>
