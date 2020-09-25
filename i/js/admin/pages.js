$(document).ready(
	function()
	{
		is_edit = false;
		
		if(typeof $("input[name=page_name]").val() != "undefined"){
			$('#redactor_content').redactor();
		}
		
		/***
		*страница admin/pages/create_edit_page 
		***/

               var can_change_text_link = true;
               
               $("input[name=page_name]").keyup(function(){
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
			var page_name 		= $("input[name=page_name]").val();
			var page_link 		= $("input[name=page_link]").val();
			var page_title 		= $("input[name=page_title]").val();
			var page_keywords 	= $("input[name=page_keywords]").val();
			var page_desc 		= $("textarea[name=page_desc]").val();
			var page_text 		= $("textarea[name=page_text]").val();
			var add_or_edit		= $("input[name=add_or_edit]").val();
			var approve			= $("select[name=approve]").val();
			var page_id			= $("input[name=page_id]").val();

			if (page_name == ''){
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

			if(is_edit === true || add_or_edit == "1")
			{
				is_edit = true;
				url = "/admin/pages/create_edit_page&action=edit";
			}
			else
			{
				url = "/admin/pages/create_edit_page&action=create";
			}

			$.ajax({
				type: "POST",
				url: url,
				data: {page_name: page_name,
						page_link: page_link,
						page_title: page_title,
						page_keywords: page_keywords,
						page_desc: page_desc,
						page_text: page_text,
						status: approve,
						page_id: page_id},
				success: function(msg){
					if(msg != "Err" && is_edit === false)
					{
						var n = noty({
							text: 'Страница создана',
							type: 'success',
							layout: 'bottom',
							timeout: 3000
						});
						is_edit = true;
					}
					else if(is_edit === true)
					{
						var n = noty({
							text: 'Страница отредактирована',
							type: 'success',
							layout: 'bottom',
							timeout: 3000
						});
					}
					else
					{
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
             *  /admin/pages/index
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
	*страница admin/pages/create_edit_page 
	***/
	
	function DelPage(id){
		$("#page_"+id).hide();
		
		$.ajax({
				type: "POST",
				url: "/admin/pages/index",
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
