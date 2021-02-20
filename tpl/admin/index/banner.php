<div class="box">
    <div class="tab-header light">Баннер</div>
    <div class="padded">
        <p></p>
        <form class="fill-up" action="<?= GetCurUrl() ?>" method="POST" enctype="multipart/form-data">
            <p>
                Изображение размером 1140х594
            </p>
            <div class="input">
                <input type="file" name="image" />
            </div>
            <div class="input">
                <input type="submit" value="Сохранить" name="save" class="btn btn-success" />
            </div>
        </form>
        <p>
            Текущее изображение:
        </p>
        <img src="/<?= $banner['value'] ?>" />
    </div>
</div>