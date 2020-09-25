<? if (!empty($err)) : ?>
<?= MsgErrAdmin(implode('<br />', $err)) ?>
<? endif; ?>
<? if (!is_null($msg)) : ?>
<?= MsgOkAdmin($msg) ?>
<? endif; ?>
<script>
    $(document).ready(function(){
        $("#generate_link").click(function(){
            $("input[name=link]").val(translit($("input[name=head]").val()));
        });
        $("#change_link").click(function(){
            $("input[name=link]").attr("disabled", false);
            $("#save").attr("disabled", true);
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
                <input type="text" id="datetimepicker" value="<?= ($id) ? date("m/d/Y", $_news->time) : '' ?>" name="date" placeholder="Date">
            </div>
            <div class="input">
                <div class="span8">
                    <div class="input">
                        <input type="text" value="<?= ($id) ? $_news->link : '' ?>" name="link" placeholder="Ссылка" />
                    </div>
                </div>
                <div class="span4">
                    <div class="btn-group">
                        <a href="javascript:void(0);" class="btn btn-info" id="generate_link">Генерировать</a>
                        <a href="javascript:void(0);" class="btn btn-danger" id="change_link">Изменить</a>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
            <textarea name="text" id="redactor"><?= ($id) ? $_news->text : '' ?></textarea>
            <p></p>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_news->title : '' ?>" name="title" placeholder="Title" />
            </div>
            <div class="input">
                <input type="text" value="<?= ($id) ? $_news->description : '' ?>" name="description" placeholder="Description" />
            </div>
            <input type="file" name="image" />
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
                        <a href="/admin/articles/index?a=edit&id=<?= $val['id'] ?>" class="btn btn-info">Редактировать</a>
                        <a href="/admin/articles/index?a=delete&id=<?= $val['id'] ?>" class="btn btn-danger">Удалить</a>
                    </div>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    CKEDITOR.replace( 'redactor', {
        height: '400px',
        filebrowserUploadUrl: '/admin/articles/upload',
    });
</script>