<div class="box">
    <div class="tab-header light">ТЕКСТ ФУТЕРА</div>
    <div class="padded">
        <p></p>
        <form class="fill-up" action="<?= GetCurUrl() ?>" method="POST" enctype="multipart/form-data">
            <? if (Get('edit', false)) : ?>
            <input type="hidden" value="<?= $footer->id ?>" name="id" />
            <? endif; ?>
            <div class="input">
                <textarea name="footer" id="footer"><?= (!empty($footer) && is_object($footer)) ? $footer->text : '' ?></textarea>
            </div><br />
            <div>
                <input type="submit" value="Сохранить" name="people" class="button green" />
            </div>
        </form>
    </div>
</div>
<script>CKEDITOR.replace( 'footer' );</script>