<div id="logo">
    <img src="/assets/img/logo.png" />
</div>
<h1 class="text-center">
  <?php echo $title; ?><small>We can't find that! <a href="/">back</a></small>
</h1>
<ul class="submit-btns" id="buttons">
    <input type="hidden" value="" id="latitude">
    <input type="hidden" value="" id="longitude">    
    <?php if (!empty($buttons)) : ?>
        <?php foreach ($buttons as $button) : ?>
            <a title="Earthquake" class="enabled report-disaster"
                href="<?php echo Uri::create('report/disaster', array('type' => $button->id), array('type' => ':type')); ?>">
                <?php echo $button->name; ?>
                <img src="/assets/img/icon-earthquake.png" />
            </a>        
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
<ul class="submit-btns" id="messageButtons">
    <li><p>Getting your location.</p></li>
</ul>
