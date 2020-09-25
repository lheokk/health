$(document).ready(function(){

/*
 * /admin/menus
 */

    $("#new-menu-block").click(function(){
        $(".create-new-menu-block").slideToggle();
    });
    $("#save-new-menu-block").click(function(){
        var new_name = $("input[name=new_menu_block_name]").val();

        if (new_name == ''){
			Notifications.push({
					imagePath: "/i/image/admin/error.png",
					text: "<div>Поле имени нового блока меню не должно быть пустым</div>",
					autoDismiss: 10
				  });
            return false;
        }

        $.ajax({
            type: "POST",
            url: "/admin/menus/edit_menu_block",
            data: "type=add&name="+new_name,
            success: function(msg){
				Notifications.push({
					imagePath: "/i/image/admin/ok.png",
					text: "<div>Новый блок меню успешно создан</div>",
					autoDismiss: 10
				  });
                $("#menu_blocks").append($(".dedicated-text").eq(0).clone());
                $(".dedicated-text:last")
                    .attr("id", msg)
                    .find(".link-to-edit-menu-block")
                    .attr("href", "/admin/menus/menu_list?menu_block="+msg)
                    .text(new_name);
                $(".create-new-menu-block").slideToggle();
            },
            error: function(){
				Notifications.push({
					imagePath: "/i/image/admin/error.png",
					text: "<div>Неизвестная ошибка</div>",
					autoDismiss: 10
				  });
            }
        });
    });

    $(".link-to-delete-menu-block").live("click", function(){
        var id = $(this).parents("div.dedicated-text").attr("id");

        var n = noty({
                text: 'Вы уверены в том, что хотите удалить блок меню?',
                type: 'confirm',
                layout: 'bottom',
                timeout: 3000,
                buttons: [{
                    addClass: 'btn btn-primary', text: 'Да', onClick: function($noty) {
                    $noty.close();
                    $.ajax({
                        type: "POST",
                        url: "/admin/menus/edit_menu_block",
                        data: "type=delete&id="+id,
                        success: function(msg){
							Notifications.push({
								imagePath: "/i/image/admin/ok.png",
								text: "<div>Блок меню успешно удален</div>",
								autoDismiss: 10
							  });

                            $("div#"+id).remove();
                        },
                        error: function(){
                            Notifications.push({
								imagePath: "/i/image/admin/error.png",
								text: "<div>Неизвестная ошибка</div>",
								autoDismiss: 10
							  });
                        }
                    });
                  }
                },{
                addClass: 'btn btn-danger', text: 'Нет', onClick: function($noty) {
                    $noty.close();
					Notifications.push({
						imagePath: "/i/image/admin/ok.png",
						text: "<div>Удаление отменено</div>",
						autoDismiss: 10
					  });
                }}]
        });
    });

    $(".link-to-edit-name-menu-block").live("click", function(){
        return_changes();
        var inp = document.createElement('input');
            inp.className = 'edit-menu-block-input';
            inp.setAttribute('type', 'text');
            inp.setAttribute('value', $(this).parents(".dedicated-text").find(".link-to-edit-menu-block").text());

        var but = document.createElement('input');
            but.setAttribute('type', 'button');
            but.setAttribute('value', 'Сохранить');
            but.setAttribute('style', 'padding: 0 7px; height: 25px;');
            but.className = 'confirm-menu-block-name';

        $(this).parents(".dedicated-text")
            .append(inp)
            .append(but)
            .find(".link-to-edit-menu-block")
            .hide();
            
        $(this).hide();
        $(this).parents(".dedicated-text").find(".link-to-end-edit-name-menu-block").show();

        $(this).parents(".dedicated-text").css("padding", "2px");
        $(".edit-menu-block-input").css("height", "13px");
    });

    $(".confirm-menu-block-name").live("click", function(){
        var id = $(this).parents(".dedicated-text").attr("id");
        var name = $(".edit-menu-block-input").val();

        $(this)
            .parents(".dedicated-text")
            .find(".link-to-edit-menu-block")
            .show()
            .text($(".edit-menu-block-input").val());
        $(".link-to-edit-name-menu-block").show();

        $(".edit-menu-block-input").remove();
        $(".confirm-menu-block-name").remove();
        $(".dedicated-text").css("padding", "6px");

		Notifications.push({
				imagePath: "/i/image/admin/ok.png",
				text: "<div>Пожалуйста подождите. Идет сохранение нового имении</div>",
				autoDismiss: 10
			  });
        $.ajax({
            type: "POST",
            url: "/admin/menus/edit_menu_block",
            data: "type=rename&id="+id+"&name="+name,
            success: function(){
				Notifications.push({
				imagePath: "/i/image/admin/ok.png",
				text: "<div>Имя успешно изменено</div>",
				autoDismiss: 10
			  });
            },
            error: function(){
				Notifications.push({
				imagePath: "/i/image/admin/error.png",
				text: "<div>Неизвестная ошибка</div>",
				autoDismiss: 10
			  });
            }
        });
    });


    $(".link-to-end-edit-name-menu-block").live("click", function(){
        return_changes();
    });

    /*
     * ф-я отменяет не сохраненные изменения
     **/

    function return_changes() {
        $(".link-to-end-edit-name-menu-block").hide();
        $(".dedicated-text").each(function(){
            $(this).find(".link-to-edit-menu-block").show();
            $(this).find(".link-to-edit-name-menu-block").show();
            $(this).find(".edit-menu-block-input").remove();
            $(this).find(".confirm-menu-block-name").remove();
            $(this).css("padding", "6px");
        });
    }

    /*
     * admin/menus/menu_list
     */
    $(".menu-selector").sortable({
        connectWith: ".menu-selector",
        dropOnEmpty: true,
        placeholder: "ui-state-highlight"
    });

    $(".save-menu").click(function(){
        var position = null;
        var parent = 0;
        var data = '';
        $(".menu-edit-box li").each(function(i){
            if($(this).parents("ul").length == 1){
                parent = 0;
            } else {
                parent = $(this).parents("li").attr("id");
            }
            position = $(this).prevAll("li").length;
            data += $(this).attr("id") + '-' + position + '-' + parent + ',';
        });
        $.ajax({
            type: "POST",
            url: "/admin/menus/save_structure",
            data: "data="+data,
            success: function(msg){
				Notifications.push({
				imagePath: "/i/image/admin/ok.png",
				text: "<div>Структура меню успешно сохранена</div>",
				autoDismiss: 10
			  });
            },
            error: function(){
                Notifications.push({
				imagePath: "/i/image/admin/error.png",
				text: "<div>Неизвестная ошибка</div>",
				autoDismiss: 10
			  });
            }
        });
    });

    /*
     * admin/menus/edit_menu
     */

    $(".save-new-menu").click(function(){
        var id = $("input[name=id]").val();
        var link = $(".new-menu-link :selected").val();
        var name = $("input[name=name]").val();
        var menu_block = $(".hidden-input-menu-block-id").val();
        var edit_data = (id == undefined) ? '' : '&edit_menu_id='+id;
        var action = (id == undefined) ? '&action=new' : '&action=edit';
        if (name == ''){
				Notifications.push({
				imagePath: "/i/image/admin/error.png",
				text: "<div>Имя нового пункта меню не может быть пустым</div>",
				autoDismiss: 10
			  });
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/admin/menus/edit_menu",
            data: "name="+name+"&menu_block="+menu_block+"&link="+link+edit_data+action,
            success: function(msg){
				Notifications.push({
				imagePath: "/i/image/admin/ok.png",
				text: "<div>Структура меню успешно сохранена</div>",
				autoDismiss: 10
			  });
            },
            error: function(){
				Notifications.push({
				imagePath: "/i/image/admin/error.png",
				text: "<div>Неизвестная ошибка</div>",
				autoDismiss: 10
			  });
            }
        });
    });

});