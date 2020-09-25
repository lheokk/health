<? if (!empty($err)) : ?>
<?= MsgErrAdmin(implode('<br />', $err)) ?>
<? endif; ?>
<? if (!is_null($msg)) : ?>
<?= MsgOkAdmin($msg) ?>
<? endif; ?>
<div class="box">
    <div class="tab-header light">Новости</div>
    <div class="padded">
        <p></p>
        <form class="fill-up" action="<?= GetCurUrl() ?>" method="POST" enctype="multipart/form-data">
            <div class="input">
                <? if ($id) : ?>
                    <input type="hidden" value="<?= $id ?>" name="id" />
                <? endif; ?>
                <input type="text" value="<?= ($id) ? $_news->name : '' ?>" name="head" placeholder="Заголовок">
            </div>
            <div class="input">
                <input type="text" id="datetimepicker" value="<?= ($id) ? date("m/d/Y", $_news->time) : '' ?>" name="date" placeholder="Дата (можно оставить пустым, чтобы опубликовать сегодняшним числом)">
            </div>
            <textarea name="text" id="redactor"><?= ($id) ? $_news->text : '' ?></textarea>
            <p></p>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_news->title : '' ?>" name="title" placeholder="Title" />
            </div>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_news->description : '' ?>" name="description" placeholder="Description" />
            </div>
            <p>
                Изображение размером 380x280
            </p>
            <div class="input">
                <input type="file" name="image" />
            </div>
            <div class="input">
                <input type="submit" value="Сохранить" name="save" class="btn btn-success" />
            </div>
        </form>
    </div>
</div>
<div class="box">
    <div class="tab-header light">ВСЕ ЗАПИСИ</div>
    <table class="table table-striped data-table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Date</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <? foreach ($data as $key => $val) : ?>
            <tr>
                <td><?= $val['id'] ?></td>
                <td><?= $val['name'] ?></td>
                <td><?= date("d.m.Y", $val['time']) ?></td>
                <td>
                    <div class="btn-group">
                        <a href="/admin/news/index?a=edit&id=<?= $val['id'] ?>" class="btn btn-info">Редактировать</a>
                        <a href="/admin/news/index?a=delete&id=<?= $val['id'] ?>" class="btn btn-danger">Удалить</a>
                    </div>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    CKEDITOR.replace( 'redactor', {
        height: '400px'
    });
</script>