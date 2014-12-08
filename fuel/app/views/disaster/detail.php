<div id="map"></div>
<div class="row">
    <div class="columns">
        <div class="disaster-detail">
            <div class="text-center">
                <h1>
                    <?php echo ucfirst(strtolower($disaster->properties->type)); ?>
                </h1>
                <h2>
                    <?php if (isset($disaster->properties->country)) : ?>
                        <?php echo ucfirst(strtolower($disaster->properties->country)); ?>
                    <?php elseif (isset($disaster->properties->place)) : ?>
                        <?php echo $disaster->properties->place; ?>
                    <?php else: ?>

                    <?php endif; ?>
                    
                    <?php if (isset($disaster->properties->date)) : ?>
                        <?php echo date('M dS, Y h:i A', strtotime($disaster->properties->date)); ?>
                    <?php elseif (isset($disaster->properties->time)): ?>
                        <?php echo date('M dS, Y h:i A', $disaster->properties->time); ?>
                    <?php else: ?>

                    <?php endif; ?>
                </h2>
                <a class="button radius small" href="<?php echo Uri::create('/disasters/tips', array(), array('type' => $event->id)); ?>">Survival Tips</a>
                <h3>
                    Community's reports
                </h3>
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th>
                                IP Address
                            </th>
                            <th>
                                Time
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($community_report) > 0) : ?>
                            <?php foreach ($community_report as $report) : ?>
                                <tr>
                                    <td>
                                        <?php echo long2ip($report->ip_address) ?>
                                        <?php if ($report->uid == $this->getUserUuid()) : ?>
                                            <span class="label radius">this is you</span>
                                        <?php endif; ?>

                                        <?php if (!$report->is_verify) : ?>
                                            <span class="label radius alert">not verified</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo date('M dS, Y h:i A', strtotime($report->created_at)); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2">
                                    <em>No any report from community about this event.</em>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?php list($lon, $lat) = $disaster->geometry->coordinates; ?>
    var customLat = '<?php echo $lat; ?>';
    var customLon = '<?php echo $lon; ?>';
</script>