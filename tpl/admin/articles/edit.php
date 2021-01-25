<? if (!empty($err)) : ?>
<?= MsgErrAdmin(implode('<br />', $err)) ?>
<? endif; ?>
<? if (!is_null($msg)) : ?>
<?= MsgOkAdmin($msg) ?>
<? endif; ?>
<script>
    $(document).ready(function(){
        $("input[name=head_ru]").on("change", function(){
            $("input[name=link_ru]").val(translit($("input[name=head_ru]").val()));
        });
    });
    
    function translit(val){
            var res = '';
            A = new Array();
            A["Ё"]="yo";A["Й"]="i";A["Ц"]="ts";A["У"]="u";A["К"]="k";A["Е"]="e";A["Н"]="n";A["Г"]="g";A["Ш"]="sh";A["Щ"]="sch";A["З"]="z";A["Х"]="h";A["Ъ"]="";
            A["ё"]="yo";A["й"]="i";A["ц"]="ts";A["у"]="u";A["к"]="k";A["е"]="e";A["н"]="n";A["г"]="g";A["ш"]="sh";A["щ"]="sch";A["з"]="z";A["х"]="h";A["ъ"]="";
            A["Ф"]="f";A["Ы"]="i";A["В"]="v";A["А"]="a";A["П"]="p";A["Р"]="r";A["О"]="o";A["Л"]="l";A["Д"]="d";A["Ж"]="zh";A["Э"]="e";
            A["ф"]="f";A["ы"]="i";A["в"]="v";A["а"]="a";A["п"]="p";A["р"]="r";A["о"]="o";A["л"]="l";A["д"]="d";A["ж"]="zh";A["э"]="e";
            A["Я"]="ya";A["Ч"]="ch";A["С"]="s";A["М"]="m";A["И"]="i";A["Т"]="t";A["Ь"]="";A["Б"]="b";A["Ю"]="yu";
            A["я"]="ya";A["ч"]="ch";A["с"]="s";A["м"]="m";A["и"]="i";A["т"]="t";A["ь"]="";A["б"]="b";A["ю"]="yu";A[" "]="_";

            A["A"]="A";A["B"]="B";A["C"]="C";A["D"]="D";A["E"]="E";A["F"]="F";A["G"]="G";A["H"]="H";A["I"]="I";A["J"]="J";A["K"]="K";A["L"]="L";A["M"]="M";
            A["N"]="N";A["O"]="O";A["P"]="P";A["Q"]="Q";A["R"]="R";A["S"]="S";A["T"]="T";A["U"]="U";A["V"]="V";A["W"]="W";A["X"]="X";A["Y"]="Y";A["Z"]="Z";
            A["a"]="a";A["b"]="b";A["c"]="c";A["d"]="d";A["e"]="e";A["f"]="f";A["g"]="g";A["h"]="h";A["i"]="i";A["j"]="j";A["k"]="k";A["l"]="l";A["m"]="m";
            A["n"]="n";A["o"]="o";A["p"]="p";A["q"]="q";A["r"]="r";A["s"]="s";A["t"]="t";A["u"]="u";A["v"]="v";A["w"]="w";A["x"]="x";A["y"]="y";A["z"]="z";
            
            A["-"]="-";A["-"]="—";A["_"]="_";

            res = val.replace(/./g,
                function (str) {
                    if (A[str] != undefined){return A[str];}
                    else {return ''}
                }
            );

            return res;
       }
</script>
<div class="box">
    <div class="tab-header light">СОЗДАНИЕ / РЕДАКТИРОВАНИЕ СТРАНИЦЫ</div>
    <div class="padded">
        <p></p>
        <form class="fill-up" action="<?= GetCurUrl() ?>" method="POST" enctype="multipart/form-data">
            <? if ($id) : ?>
                <input type="hidden" value="<?= $id ?>" name="id" />
            <? endif; ?>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_page->head : '' ?>" name="head_ru" placeholder="Заголовок">
            </div>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_page->link : '' ?>" name="link_ru" placeholder="Ссылка" />
            </div>
            <div style="clear:both;"></div>
            <div>
                <label>Тест страницы</label>
                <textarea name="text_ru" id="redactor_ru"><?= ($id) ? $_page->text : '' ?></textarea>
            </div>
            <p></p>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_page->title : '' ?>" name="title_ru" placeholder="Title RUS" />
            </div>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_page->description : '' ?>" name="description_ru" placeholder="Description RUS" />
            </div>
            <div class="input">
                <input type="submit" value="Сохранить" name="save" class="btn btn-success" />
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'redactor_ru', {
        height: '400px',
        filebrowserUploadUrl: '/admin/articles/upload',
    });
</script>

<!-- modal window -->
<div id="modal-gallery" class="black-box modal modal-gallery  fade">
<div class="modal-header tab-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<span class="modal-title"></span>
</div>
<div class="modal-body"><div class="modal-image"></div></div>
<div class="modal-footer">
<div class="pull-left">Изображение в шапке текущей страницы</div>
<div class="pull-right">
<a class="button blue modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
<a class="button gray modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
<a class="button green modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
</div>
</div>
</div>
<!-- END: modal window -->