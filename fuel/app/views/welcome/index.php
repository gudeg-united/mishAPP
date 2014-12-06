<div id="logo">
  <img src="/assets/img/logo.png" />
</div>
<h1 class="text-center">
  Report a disaster
</h1>
<ul class="submit-btns">
  <?php if (!empty($buttons)) : ?>
  <?php foreach ($buttons as $button) : ?>
  <a title="Earthquake" class="enabled" class="btn btn-primary btn-lg report-disaster" 
     href="<?php echo Uri::create('report/disaster', array('type' => $button->id), array('type' => ':type')); ?>">
    <?php echo $button->name; ?>
    <img src="/assets/img/icon-earthquake.png" />
  </a>        
  <?php endforeach; ?>
  <?php endif; ?>
</ul>
