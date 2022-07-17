<ul>
    <?php foreach ($nouvelles as $nouvelle) { ?>
    <li><?= $nouvelle->actif ?> (<?= $nouvelle->nouvelle ?>)</li>
    <?php } ?>
</ul>