<?php
$qGet = $mysqli->query('
        SELECT token, name, path, score
        FROM photos
        ORDER BY RAND()
        LIMIT 2');
while ($dGet = $qGet->fetch_object())
    $rows[] = $dGet;
?>
<div class="faces">
    <img src="<?php echo htmlspecialchars($rows[0]->path); ?>" class="photos" alt="<?php echo htmlspecialchars($rows[0]->name); ?>" data-token="<?php echo $rows[0]->token; ?>" data-score="<?php echo $rows[0]->score; ?>" width="266" height="400" />
    <ul>
        <li><?php echo htmlspecialchars($rows[0]->name); ?></li>
        <li>Score: <?php echo number_format($rows[0]->score, 0, ',', ' '); ?></li>
    </ul>
</div>
<p id="middle">OR</p>
<img src="loader.gif" alt="Chargement..." width="64" height="64" id="loader" />
<div class="faces">
    <img src="<?php echo htmlspecialchars($rows[1]->path); ?>" class="photos" alt="<?php echo htmlspecialchars($rows[1]->path); ?>" data-token="<?php echo $rows[1]->token; ?>" data-score="<?php echo $rows[1]->score; ?>" width="266" height="400" />
    <ul>
        <li><?php echo htmlspecialchars($rows[1]->name); ?></li>
        <li>Score: <?php echo number_format($rows[1]->score, 0, ',', ' '); ?></li>
    </ul>
</div>