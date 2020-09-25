<div>
    <? foreach ($data as $key => $val) : ?>
    <div>
        <img src="/upl/<?= $val['img'] ?>" alt="<?= $val['title'] ?>" title="<?= $val['title'] ?>" style="float: left; margin-right: 15px;">
        <div>
            <h3><a href="/post/<?= $val['link'] ?>" style="text-decoration: none;"><?= $val['name'] ?></a></h3>
            <div style="margin-top: -15px; font-size: 10px;"><?= date("d", $val['time']) ?> <?= RusMonth($val['time'], true) ?> <?= date("Y", $val['time']) ?></div>
            <div>
                <div style="margin-top: 10px; line-height: 16px;">
                    <?= ReturnNSymbols($val['text'], 350) ?>
                </div>
                <div style="text-align: right; margin-right: 25px;">
                    <a href="/post/<?= $val['link'] ?>">Читать далее >></a>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <hr />
    <? endforeach; ?>
    <div style="text-align: center;">
        <a href="/post/list">Все статьи</a>
    </div>
</div>
<style>
    
</style>