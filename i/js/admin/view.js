$(document).ready( 
	function()
	{
		is_edit = false;
		activate_upload();
                /*
		if(typeof $("input[name=page_name]").val() != "undefined"){
			$('#redactor_content').redactor();
		}
		*/
		/***
		*страница admin/view/create_edit_page 
		***/

               var can_change_text_link = true;
               /*
               setInterval(function(){
                   if ($("input[name=page_name]").val() != ''){
                       $("#change-link").show();
                   } else {
                       if (can_change_text_link)
                           $("#change-link").hide();
                   }
                   if (can_change_text_link){
                       $("input[name=page_link]").val(translit($("input[name=page_name]").val()));
                       $("#transit-link-text").text(translit($("input[name=page_name]").val()));
                   }
               }, 500);
               $("input[name=page_name]").change(function(){
                   if ($(this).val() != ''){
                       $("#change-link").show();
                   } else {
                       if (can_change_text_link)
                           $("#change-link").hide();
                   }
                   if (can_change_text_link){
                       $("input[name=page_link]").val(translit($(this).val()));
                       $("#transit-link-text").text(translit($(this).val()));
                   }
               });
               $("#change-link").click(function(){
                   $("#change-link-block").css("display", "table");
                   $("#change-link-area").hide();
               });*/
            $("#generate_link").click(function(){
                $("input[name=page_link]").val(translit($("input[name=page_name]").val()));
            });
            
               $("#confirm-change-link").click(function(){
                   var link = $("input[name=page_link]").val();

                   if (link == ''){
                       var n = noty({
                                text: 'Поле "Ссылка на страницу" не может быть пустым',
                                type: 'error',
                                layout: 'bottom',
                                timeout: 3000
                       });
                       return false;
                   }

                   var regexp = /^[a-z_1-9]+$/i;
                   if (!regexp.test(link)){
                       var n = noty({
                                text: 'Недопустимые символы в поле.',
                                type: 'error',
                                layout: 'bottom',
                                timeout: 3000
                       });
                   } else {
                       $("#change-link-block").hide();
                       $("#change-link-area").show();
                       $("#transit-link-text").text(link);
                       can_change_text_link = false;
                   }
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
                    
                    res = val.replace(/./g,
                        function (str) {
                            if (A[str] != undefined){return A[str];}
                            else {return ''}
                        }
                    );
                    
                    return res;
               }

		$("#create_page").click(function(){
                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                    var page_name 	= $("input[name=page_name]").val();
                    var page_link 	= $("input[name=page_link]").val();
                    var page_text 	= $("#redactor_content").val();
                    var add_or_edit	= $("input[name=add_or_edit]").val();
                    var approve		= $("select[name=approve]").val();
                    var page_id		= $("input[name=page_id]").val();
                    var main_image	= $("input[name=main_image]").val();
                    var preview_image	= $("input[name=preview_image]").val();
                    var time		= $("input[name=post_date]").val();
                    
                    var prev_post_link  = $("input[name=prev_post_link]").val();
                    var prev_post_name  = $("input[name=prev_post_name]").val();
                    var next_post_link  = $("input[name=next_post_link]").val();
                    var next_post_name  = $("input[name=next_post_name]").val();

                    if (page_name == '') {
                        var n = noty({
                            text: 'Поле названия страницы не должно быть пустым',
                            type: 'error',
                            layout: 'bottom',
                            timeout: 3000
                        });
                        return false;
                    }
                    
                    if (page_link == ''){
                        var n = noty({
                            text: 'Введите ссылку на страницу',
                            type: 'error',
                            layout: 'bottom',
                            timeout: 3000
                        });
                        return false;
                    }

                    if(is_edit === true || add_or_edit == "1"){
                        is_edit = true;
                        url = "/admin/view/create_edit_page&action=edit";
                    } else {
                        url = "/admin/view/create_edit_page&action=create";
                    }

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: { page_name: page_name,
                                page_link: page_link,
                                page_text: page_text,
                                main_image: main_image,
                                preview_image: preview_image,
                                status: approve,
                                page_id: page_id,
                                time: time,
                                prev_post_link: prev_post_link,
                                prev_post_name: prev_post_name,
                                next_post_link: next_post_link,
                                next_post_name: next_post_name
                        },
                        success: function(msg) {
                            if(msg != "Err" && is_edit === false) {
                                var n = noty({
                                        text: 'Страница создана',
                                        type: 'success',
                                        layout: 'bottom',
                                        timeout: 3000
                                });
                                is_edit = true;
                            } else if(is_edit === true) {
                                var n = noty({
                                        text: 'Страница отредактирована',
                                        type: 'success',
                                        layout: 'bottom',
                                        timeout: 3000
                                });
                            } else {
                                var n = noty({
                                        text: 'Страница с такой ссылкой существует',
                                        type: 'error',
                                        layout: 'bottom',
                                        timeout: 3000
                                });
                            }					
                        },
                        error: function(){
                            var n = noty({
                                text: 'Неизвестная ошибка',
                                type: 'error',
                                layout: 'bottom',
                                timeout: 3000
                            });
                        }
                    });
		});
            /*
             *  /admin/view/index
             */

            // удаляет страницу, запрашивая подтверждение
            $(".link-to-delete-page").click(function(){
                var id = $(this).parents("tr").attr("id").replace('page_', '');
                var n = noty({
                        text: 'Вы уверены в том, что хотите удалить страницу?',
                        type: 'confirm',
                        layout: 'bottom',
                        timeout: 3000,
                        buttons: [{
                            addClass: 'btn btn-primary', text: 'Да', onClick: function($noty) {
                            $noty.close();
                            DelPage(id);
                          }
                        },{
                        addClass: 'btn btn-danger', text: 'Нет', onClick: function($noty) {
                            $noty.close();
                            noty({
                                    text: 'Удаление отменено',
                                    type: 'success',
                                    layout: 'bottom',
                                    timeout: 3000
                            });
                        }}]
                });
            });
	}
        
);


	/***
	*страница admin/view/create_edit_page 
	***/
	
	function DelPage(id){
		$("#page_"+id).hide();
		
		$.ajax({
				type: "POST",
				url: "/admin/view/index",
				data: {action: "del_page",
						page_id: id},
				success: function(msg){
					if(msg == "Ok")
					{
						var n = noty({
							text: 'Страница удалена',
							type: 'success',
							layout: 'bottom',
							timeout: 3000
						});
					}
					else
					{
						var n = noty({
								text: 'Ошибка удаления',
								type: 'error',
								layout: 'bottom',
								timeout: 3000
						});
					}
				},
				error: function(){
					var n = noty({
							text: 'Неизвестная ошибка, обратитесь в тех. отдел',
							type: 'error',
							layout: 'bottom',
							timeout: 3000
					});
				}
		});
	}

	function activate_upload(){
		$('.upload').mfupload({
				type		: 'jpg,png,jpeg',
				maxsize		: 5,
				post_upload         : "/admin/view/upload",
				folder		: "",
				ini_text            : "Перетащите файл изображения сюда или кликните по этой области",
				over_text           : "Отпустите здесь",
				over_col            : 'black',
				over_bkcol          : '#a5ffa7',

				init		: function(){},
				start		: function(result){},
				loaded		: function(result){
					
					var img = document.createElement("img");
						img.setAttribute("src", result.src);
						img.setAttribute("style", "margin-bottom: 10px; float: left;");
					$(".upload").html(img);
					$("input[name=main_image]").val(result.src);
				},
				progress            : function(result){},
				error		: function(error){},
				completed           : function(){activate_upload_archive()}
		});
	}
	function activate_upload_archive(){
    $('.upload_archive').mfupload({
            type		: 'jpg,png,jpeg',
            maxsize		: 5,
            post_upload         : "/admin/view/upload_preview",
            folder		: "",
            ini_text            : "Перетащите файл изображения сюда или кликните по этой области",
            over_text           : "Отпустите здесь",
            over_col            : 'black',
            over_bkcol          : '#a5ffa7',

            init		: function(){},
            start		: function(result){},
            loaded		: function(result){
                //$('.upload').remove();
                var img = document.createElement("img");
                    img.setAttribute("src", result.src);
                    img.setAttribute("style", "margin-bottom: 10px; float: left;");
                $(".upload_archive").html(img);
                $("input[name=preview_image]").val(result.src);
            },
            progress            : function(result){},
            error		: function(error){},
            completed           : function(){}
    });
}