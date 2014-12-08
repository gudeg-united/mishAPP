<?php
  foreach ($disaster->items as $item) {
    $values[] = array($item->geometry->coordinates[1], $item->geometry->coordinates[0]);
  }
?>
<div id="map-global"></div>
<div class="row">
  <div class="columns">
    <div class="disaster-detail">
      <div class="text-center">
        <table style="width: 100%">
          <thead>
            <tr>
              <th>Type</th>
              <th>Place</th>
              <th>Magnitude</th>
              <th>Potential Tsunami</th>
              <th>Time</th>
              <th>Source</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($disaster->items as $item): ?>
              <tr>
                <td><?php echo $item->properties->type; ?></td>
                <td>
                  <a href="<?php echo Uri::create('disasters/detail', array(), array('id' => $item->id)); ?>">
                    <?php echo isset($item->properties->title) ? $item->properties->title : $item->properties->country; ?>
                  </a>
                </td>
                <td><?php echo isset($item->properties->mag) ? $item->properties->mag : ''; ?></td>
                <td><?php echo isset($item->properties->tsunami) ? $item->properties->tsunami : '-'; ?></td>
                <td>
                  <?php
                    if ($item->source == 'usgs'){
                      echo isset($item->properties->time) ? date('r', $item->properties->time/1000) : '-';
                    }else if($item->source == 'gdacs'){
                      echo isset($item->properties->date) ? $item->properties->date : '-';
                    }
                  ?>
                </td>
                <td><?php echo isset($item->source) ? $item->source : 'unknown'; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="pagination">
        <?php #echo $pagination->render(); ?>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  var values = <?php echo json_encode($values); ?>;
</script>
