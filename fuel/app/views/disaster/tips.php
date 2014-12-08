<div class="row">
  <div class="columns">
    <div id="logo">
      <img src="/assets/img/logo.png" />
    </div>
    <h1 class="text-center">Disaster Tips</h1>
  </div>
</div>
<div class="row">
  <div class="columns">
    <div class="tips">
      <?php foreach($tips as $tip): ?>
      <h1><?php echo ucfirst($event("name", $tip->events)); ?></h1>
      <?php echo html_entity_decode($tip->content); ?>
      <?php endforeach;?>
    </div>
  </div>
</div>
