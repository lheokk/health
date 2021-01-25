<div class="box">
    <div class="tab-header light">ВСЕ СТРАНИЦЫ САЙТА</div>
    <table class="table table-striped data-table">
        <thead>
            <tr>
                <td>#</td>
                <td>Заголовок</td>
                <td>Date</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <? foreach ($data as $key => $val) : ?>
            <tr>
                <td><?= $val['id'] ?></td>
                <td><?= $val['head'] ?></td>
                <td><?= date("d.m.Y", $val['stamp']) ?></td>
                <td>
                    <div class="btn-group">
                        <a href="/admin/articles/edit?a=edit&id=<?= $val['id'] ?>" class="btn btn-info">Редактировать</a>
                        <a href="/admin/articles/edit?a=delete&id=<?= $val['id'] ?>" class="btn btn-danger">Удалить</a>
                    </div>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</div>