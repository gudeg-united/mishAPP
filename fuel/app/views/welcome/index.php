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
  <li><a title="<?php echo $button->name; ?>" class="disabled report-disaster"
         href="<?php echo Uri::create('report/disaster', array('type' => $button->id), array('type' => ':type')); ?>">
      <img src="/assets/img/icon-earthquake.png" />
  </a></li>        
  <?php endforeach; ?>
  <?php endif; ?>
</ul>
<ul class="submit-btns" id="messageButtons">
  <li><p>Getting your location.</p></li>
</ul>
