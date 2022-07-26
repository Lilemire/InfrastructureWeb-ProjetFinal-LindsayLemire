<ul>
    <?php foreach ($nouvelles as $nouvelle) { ?>
    <li><h1>(<?=$nouvelle->titre?>)</h1>
        <p>(<?= $nouvelle->description_courte ?>)<p>
    <p>(<?=$nouvelle->date_nouvelle?>)</li><p>
    <?php } ?>
</ul>