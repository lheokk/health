
    <ul class="pagination">
        <?php if (empty($arrowLeft)):?>
            <li class="disabled"><span>&laquo;</span></li>
        <?php else:?>
            <a href="<?= $arrowLeft?>"><li>&laquo;</li></a></a>
        <?php endif;?>

        <?php foreach($pagesLeft as $p):?>
            <a href="<?= $p["href"]?>"><li><?= $p["page"]?></li></a>
        <?php endforeach;?>

        <?php if (!empty($pagesLeft)):?>
            <li><span>..</span></li>
        <?php endif;?>


        <?php foreach($pagesCenter as $p):?>
            <?php if ($p["is_active"]):?>
                <li class="active"><span><?= $p["page"]?></span></li>
            <?php else:?>
                <a href="<?= $p["href"]?>"><li><?= $p["page"]?></li></a>
            <?php endif;?>
        <?php endforeach;?>


        <?php if (!empty($pagesRight)):?>
            <li><span>..</span></li>
        <?php endif;?>

        <?php foreach($pagesRight as $p):?>
            <a href="<?= $p["href"]?>"><li><?= $p["page"]?></li></a>
        <?php endforeach;?>

        <?php if (empty($arrowRight)):?>
            <li class="disabled"><span>&raquo;</span></li>
        <?php else:?>
            <a href="<?= $arrowRight?>"><li>&raquo;</li></a>
        <?php endif;?>
    </ul>
<style>
    ul.pagination li {float: left; margin: 0 5px; list-style: none; color: lightgray;}
    ul.pagination a li {color: black;}
</style>