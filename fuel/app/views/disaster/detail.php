<div id="map"></div>
<div class="row">
    <div class="columns">
        <div class="disaster-detail">
            <div class="text-center">
                <h1>
                    <?php echo ucfirst(strtolower($disaster->properties->type)); ?>
                </h1>
                <h2>
                    <?php echo (isset($disaster->properties->country)) ? ucfirst(strtolower($disaster->properties->country)) . ', ': '' ; ?>
                    <?php echo date('M dS, Y h:i A', strtotime($disaster->properties->date)); ?>
                </h2>
                <a class="button radius small" href="survival.html">Survival Tips</a>
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
                                        127.0.0.1 <span class="label radius">this is you</span> <span class="label radius alert">not varified</span>
                                    </td>
                                    <td>
                                        10:30PM
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