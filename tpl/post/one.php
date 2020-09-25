<h1><?= $data['name'] ?></h1>
<div style="font-size: 10px; margin-left: 25px;"><?= date("d", $data['time']) ?> <?= RusMonth($data['time'], true) ?> <?= date("Y", $data['time']) ?></div>
<div>
    <?= $data['text'] ?>
</div>
<style>
    .block_cont_part1_left > div img {width: 100% !important; height: auto !important;}
</style>