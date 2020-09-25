<div class="box">
    <div class="tab-header light">ВСЕ ВАРИАНТЫ ФУТЕРА</div>
    <table class="table table-striped data-table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Текст</td>
                <td>Действия</td>
            </tr>
        </thead>
        <tbody>
            <? foreach ($list as $key => $val) : ?>
            <tr>
                <td style="width: 25px;"><?= $val['id'] ?></td>
                <td><?= $val['text'] ?></td>
                <td style="width: 160px;">
                    <div class="btn-group">
                        <a href="<?= SiteRoot('admin/footer/add&edit=' . $val['id']) ?>" class="button green">Изменить</a>
                        <a href="<?= SiteRoot('admin/footer/delete&id=' . $val['id']) ?>" class="button red">Удалить</a>
                    </div>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</div>