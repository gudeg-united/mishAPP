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
      <?php 
     if($tips){
         if(isset($_GET['type']) && !empty($_GET['type']) ){
           echo "<h1>".ucfirst($event("name", $tips->events))."</h1>";
           echo html_entity_decode($tips->content);
         }else{
           foreach($tips as $tip){
             echo "<h1>".ucfirst($event("name", $tip->events))."</h1>";
             echo html_entity_decode($tip->content);
           }
         }
     }else{
         echo '<h4 class="text-center">Not Found</h4>';
     }
     ?>
</div>
</div>
</div>
