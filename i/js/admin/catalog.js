$(document).ready(function(){
    // admin/catalog/index
    $("#ques-item-cat").click(function(){
        $("#ans-item-cat").slideToggle();
    });

    $("#save-new-cat").click(function(){
        if ($("#new-cat-name").val() == ''){
            message('Название категории товара не может быть пустым','error');
            return false;
        }
    });

    $(".delete-category").click(function(){
        var id = $(this).parents(".dedicated-text").attr("id");
        var n = noty({
                text: 'Вы уверены в том, что хотите удалить категорию товара?',
                type: 'confirm',
                layout: 'bottom',
                timeout: 3000,
                buttons: [{
                    addClass: 'btn btn-primary', text: 'Да', onClick: function($noty) {
                    $noty.close();
                    $.ajax({
                        type: "POST",
                        url: "/admin/catalog/edit_category",
                        data: "type=delete&id="+id,
                        success: function(msg){
                            message('Блок меню успешно удален', 'success');
                            $("div#"+id).remove();
                        },
                        error: function(){
                            message('Неизвестная ошибка','error');
                        }
                    });
                  }
                },{
                addClass: 'btn btn-danger', text: 'Нет', onClick: function($noty) {
                    $noty.close();
                    message('Удаление отменено', 'success');
                }}
            ]
        });
    });

    $(".color-pic li").click(function(){
        $(".color-pic li").each(function(){
            $(this).attr("class", "").find("img").css("display", "inline-block");
        });
        $(this).attr("class", "selected");
        $(this).find("img").hide();
        var bg = "url(" + $(this).find("img").attr("src").replace("color_pic_", "color_pic_selected_")+") no-repeat center center";
        $(this).css("background", bg)
    });

    // admin/catalog/items_list

    $("#add-item-variety").click(function(){
        var desc = $("#new-item-desc").val();
        if (desc == ''){
            message('Заполните описание товара', 'error');
            return false;
        }
        var name = $("#new-item-name").val();
        if (name == ''){
            message('Укажите название товара', 'error');
            return false;
        }
        var size = $("#new-item-size").val();
        if (size == ''){
            message('Укажите размер разновидности', 'error');
            return false;
        }

        var color = $(".color-pic li.selected").find("img").attr("src").replace("/i/image/catalog/color_pic_","").replace(".png", "");
        var male = $("#new-item-male").val();
        var spec = $("#spec-cost").val();
        var art = $("#new-item-art").val();
        var count = $("#new-item-count").val();

        var img = document.createElement("img");
            img.setAttribute("src", "/i/image/catalog/empty_image.jpg");
            img.setAttribute("style", "margin-bottom: 12px;");
        $(".upload").each(function(){
            $(this).parents(".catalog-item-box").find("span").html('');
        });

        if ($("#new-items").html() == ''){
            $("#new-items").html('<p>' + desc + '</p>');
            $("#empty-new-items-box").hide();

            $("#new-item-desc").attr("disabled", "disabled");
            $("#new-item-name").attr("disabled", "disabled");
            $("#new-item-cost").attr("disabled", "disabled");
            $("#new-item-category").attr("disabled", "disabled");

            var inp = document.createElement("input");
                inp.setAttribute('type', 'hidden');
                inp.className = 'new-item-data-inp';
                inp.setAttribute("value", color+"|"+size+"|"+spec+"|"+art);

            var col = document.createElement("div");
                col.style.width = "20px";
                col.style.height = "21px";
                col.style.cssFloat = "left";
                col.style.marginRight = "20px";
                col.style.backgroundImage = "url(/i/image/catalog/color_pic_selected_"+color+".png)";

            var div = document.createElement("div");
                div.className = 'catalog-item-box';
                div.innerHTML = '<p style="text-align: center; margin: 0 0 3px 0; font-weight: bold; font-size: 14px;">'+name+' ('+ art + ')</p>';
                div.innerHTML += '<span><div class="upload"></div></span><br />';
                div.appendChild(col);
                div.innerHTML += ' (' + $("#new-item-male :selected").text() + ') ';
                div.innerHTML += size;
                div.innerHTML += ' <b>' + $("#new-item-cost").val() + ' руб.</b>';
                div.appendChild(inp);
            $("#new-items").append(div);
        } else {
            var inp = document.createElement("input");
                inp.setAttribute('type', 'hidden');
                inp.className = 'new-item-data-inp';
                inp.setAttribute("value", color+"|"+size+"|"+spec+"|"+art);
                
            var col = document.createElement("div");
                col.style.width = "20px";
                col.style.height = "21px";
                col.style.cssFloat = "left";
                col.style.marginRight = "20px";
                col.style.backgroundImage = "url(/i/image/catalog/color_pic_selected_"+color+".png)";

            var div = document.createElement("div");
                div.className = 'catalog-item-box';
                div.innerHTML = '<p style="text-align: center; margin: 0 0 3px 0; font-weight: bold; font-size: 14px;">'+name+'</p>';
                div.innerHTML += '<span><div class="upload"></div></span><br />';
                div.appendChild(col);
                div.innerHTML += ' (' + $("#new-item-male :selected").text() + ') ';
                div.innerHTML += size;
                div.innerHTML += ' <b>' + $("#new-item-cost").val() + ' руб.</b>';
                div.appendChild(inp);
			var divParent = document.createElement("div");
				divParent.className = 'added_image';
				divParent.style.marginTop = '10px';
				divParent.appendChild(div);
			var clear = document.createElement("div");
				clear.style.cssClear = 'both';
            $("#new-items").append(divParent).append(clear);
        }
        activate_upload();
    });

    $(".delete-variety").live("click", function(){
        var id = $(this).parents(".new-variety-area").attr("id");
        var t = $(this);

        $.ajax({
           type: "POST",
           url: "/admin/catalog/delete_item",
           data: "id="+id,
           success: function(){
               message("Успешно удалено", "success");
               t.parents(".new-variety-area").remove();
               if ($(".new-variety-area").length == 0){
                   location.replace("/admin/catalog/index");
               }
           },
           error: function(){
               message("Неизвестная обшибка", "errors");
           }
        });
    });

    $("#update-all-items").click(function(){
        var data = {};
            data.name   = $("#new-item-name").val();
            data.desc   = $("#new-item-desc").val();
            data.cost   = $("#new-item-cost").val();
            data.cat    = $("#new-item-category").val();
			data.subcat = $("#new-item-category-children").val();
            data.id     = $("#item-id").val();

        var variety = {};

        $(".new-item-data-inp").each(function(i){
            variety[i] = $(this).val();
        });

        data = JSON.stringify(data);
        variety = JSON.stringify(variety);

        $.ajax({
            type: "POST",
            url: "/admin/catalog/update_item",
            data: "type=save&data="+data+"&variety="+variety,
            success: function(){
                $("#save-all-items").attr("disabled", "disabled");
                message("Сохранено успешно", 'success');
                return false;
            },
            error: function(){
                message("Неизвестная ошибка", 'error');
            }
        });
    });

    $("#save-all-items").click(function(){
        if ($("#new-items").html() == ''){
			Notifications.push({
					imagePath: "/i/image/admin/error.png",
					text: "<div>Добавьте, как минимум, одну разновидность товара</div>",
					autoDismiss: 10
				  });
            return false;
        }

       /* var sport = '';
        if ($("input[name=football]").attr("checked") == 'checked'){
            sport += 'football,';
        }
        if ($("input[name=basketball]").attr("checked") == 'checked'){
            sport += 'basketball,';
        }
        if ($("input[name=fight]").attr("checked") == 'checked'){
            sport += 'fight,';
        }
        if ($("input[name=gym]").attr("checked") == 'checked'){
            sport += 'gym,';
        }
		
		var special_offers = '';
        if ($("input[name=free_shipping]").attr("checked") == 'checked'){
            special_offers += 'free_shipping,';
        }
        if ($("input[name=return_item]").attr("checked") == 'checked'){
            special_offers += 'return_item,';
        }
        if ($("input[name=percent_prepayment]").attr("checked") == 'checked'){
            special_offers += 'percent_prepayment,';
        }
        if ($("input[name=payment_on]").attr("checked") == 'checked'){
            special_offers += 'payment_on,';
        }*/
		
        var data = {};
            data.name   = $("#new-item-name").val();
            data.desc   = $("#new-item-desc").val();
            data.cost   = $("#new-item-cost").val();
            data.cat    = $("#new-item-category").val();
			data.subcat = $("#new-item-category-children").val();
            /*data.sport  = sport;
			data.special_offers  = special_offers;*/
		if($("#partner_checkbox").is(':checked'))
		{
			var for_partners = '2';
		}
		else
		{
			var for_partners = '1';
		}
		if($("#new_item_checkbox").is(':checked'))
		{
			var new_item_checkbox = '1';
		}
		else
		{
			var new_item_checkbox = '0';
		}
		data.status = for_partners;
		data.new_lable = new_item_checkbox;
		
        var variety = {};

        $(".new-item-data-inp").each(function(i){
            variety[i] = $(this).val();
        });
            
        data = JSON.stringify(data);
        variety = JSON.stringify(variety);

        $.ajax({
            type: "POST",
            url: "/admin/catalog/new_item",
            data: "type=save&data="+data+"&variety="+variety,
            success: function(){
                $("#save-all-items").attr("disabled", "disabled");
                message("Сохранено успешно", 'success');
                return false;
            },
            error: function(){
                message("Неизвестная ошибка", 'error');
            }
        });
    });

    /*
     * admin/catalog/edit_item
     */
    $("#update-item-variety").click(function(){
        var id 		= $("#item-id").val();
        var desc 	= $("#new-item-desc").val();
        var name 	= $("#new-item-name").val();
        var cost 	= $("#new-item-cost").val();
        var cat    = $("#new-item-category").val();
		var subcat = $("#new-item-category-children").val();
		if($("#partner_checkbox").is(':checked'))
		{
			var for_partners = '2';
		}
		else
		{
			var for_partners = '1';
		}
		if($("#new_item_checkbox").is(':checked'))
		{
			var new_item_checkbox = '1';
		}
		else
		{
			var new_item_checkbox = '0';
		}
		
        $.ajax({
            type: "POST",
            url: "/admin/catalog/edit_item",
            data: "type=upd_desc&"+"id="+id+"&desc="+desc+"&name="+name+"&cost="+cost+"&cat="+cat+"&subcat="+subcat+"&for_partners="+for_partners+"&lable_new="+new_item_checkbox,
            success: function(msg){
                message("Описание товара сохранено","success");
            },
            error: function(){
                message("Неизвестная ошибка","error");
            }
        });
    });

    $(".update-item-variety").live("click",function(){
        var o = $(this).parents(".new-variety-area");
        var src = $(this).parents(".new-variety-area").find("input[name=images]").val();
		
        var color = o.find(".color-td").find("img").attr("src").replace("/i/image/catalog/color_pic_selected_","").replace(".png","");
        var male = o.find(".item-male").val();
        var size = o.find(".item-size").val();
        var cost = o.find(".item-spec-cost").val();
        var art = o.find(".item-articul").val();
        var count = o.find(".item-count").val();
        var id = o.attr("id");

        $.ajax({
            type: "POST",
            url: "/admin/catalog/edit_item",
            data: "type=upd_variety&src="+src+"&color="+color+"&male="+male+"&size="+size+"&id="+id+"&spec_cost="+cost+"&art="+art+"&count="+count,
            success: function(msg){
                message("Успешно сохранено", "success");
            },
            error: function(){
                message("Неизвестная ошибка", "error");
            }
        });
    });

    $(".show-upload-place").live("click", function(){
        $(this).parent().hide();
        var div = document.createElement("div");
            div.className = "update-img";
        $(this).parents(".new-img-block").find(".new-img-place").append(div);
        $(".update-img").mfupload({
            type		: 'jpg,png,jpeg',
            maxsize		: 2,
            post_upload         : "/admin/catalog/upload",
            folder		: "",
            ini_text            : "Перетащите файл изображения сюда или кликните по этой области",
            over_text           : "Отпустите здесь",
            over_col            : 'black',
            over_bkcol          : '#a5ffa7',

            init		: function(){},
            start		: function(result){},
            loaded		: function(result){
                $(".new-img-button").each(function(){
                    if ($(this).css("display") == "none"){
                        $(".update-img").remove();
						var src = result.src;
                        var o = $(this).parents(".new-variety-area");
                        var img = document.createElement("img");
							img.setAttribute("src", result.src);
							img.setAttribute("style", "margin-bottom: 10px;");
						var div = document.createElement("div");
							div.style.cssFloat = 'left';
							div.className = 'img_div';
						var i = document.createElement("i");
							i.className = 'icon-remove';
							i.style.position = 'absolute';
							i.style.color = 'red';
							div.appendChild(i);
							div.appendChild(img);
						var images = o.find("input[name=images]").val();
							o.find("input[name=images]").val(images+';'+src+';');
                        o.find(".edit_img").append(div);
                        o.find(".new-img-button").show();
                    }
                });
            },
            progress            : function(result){},
            error		: function(error){},
            completed           : function(){}
        });
    });
	
    $(".color-pic-edit li").live("click",function(){
        var src = $(this).find("img").attr("src").replace("color_pic_", "color_pic_selected_");
        $(this).parents(".new-variety-area").find(".color-td img").attr("src", src);
    });

    $("#add-new-variety-edit").click(function(){
        var new_item = $(".new-variety-area:first").eq(0);
        $("#new-items").append("<div class='new-variety-area'>" + new_item.html() + "</div>");

        $(".new-variety-area:last")
            .find(".edit_img .img_div").remove();
        $(".new-variety-area:last")
            .find(".item-size")
            .val('');
        $(".new-variety-area:last")
            .find(".item-spec-cost")
            .val(0);
        $(".new-variety-area:last")
            .find(".update-item-variety")
            .removeClass("update-item-variety")
            .addClass("insert-item-variety");
        $(".new-variety-area:last")
            .find(".delete-variety")
            .removeClass("delete-variety")
            .addClass("delete-new-item-variety");
		 var val_img = $(".new-variety-area:last")
			.find("input[name=images]");
			val_img.val('');
    });

    $(".delete-new-item-variety").live("click", function(){
        $(this).parents(".new-variety-area").remove();
    });

    $(".insert-item-variety").live("click", function(){
        var o = $(this).parents(".new-variety-area");
        var src = o.find("input[name=images]").val();
        var color = o.find(".color-td").find("img").attr("src").replace("/i/image/catalog/color_pic_selected_","").replace(".png","");
        var male = o.find(".item-male").val();
        var size = o.find(".item-size").val();
        var cost = o.find(".item-spec-cost").val();
        var art = o.find(".item-articul").val();
        var count = o.find(".item-count").val();
        var id = $("#item-id").val();

        $.ajax({
            type: "POST",
            url: "/admin/catalog/insert_item",
            data: "type=upd_variety&src="+src+"&color="+color+"&male="+male+"&size="+size+"&id="+id+"&spec_cost="+cost+"&art="+art+"&count="+count,
            success: function(msg){
                message("Успешно сохранено", "success");
                o
                    .find(".insert-item-variety")
                    .removeClass("insert-item-variety")
                    .addClass("update-item-variety");
                o
                    .find(".delete-new-item-variety")
                    .removeClass("delete-new-item-variety")
                    .addClass("delete-variety");
            },
            error: function(){
                message("Неизвестная ошибка", "error");
            }
        })
    });
	
	$(".edit_img .icon-remove").live("click", function(){
		var o = $(this).parents(".new-variety-area div .img_div");
		var src = o.find("img").attr("src");
		o.hide();
		var images = $(this).parents(".new-variety-area").find("input[name=images]").val();
		$(this).parents(".new-variety-area").find("input[name=images]").val(images.replace(src, ''));
	});
});

function activate_upload(){
    $('.upload').mfupload({
            type		: 'jpg,png,jpeg',
            maxsize		: 2,
            post_upload         : "/admin/catalog/upload",
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
                $(".catalog-item-box:last").parents(".added_image").append(img);
                $(".catalog-item-box:last").find(".new-item-data-inp").val($(".catalog-item-box:last").find(".new-item-data-inp").val()+'|'+result.src);
            },
            progress            : function(result){},
            error		: function(error){},
            completed           : function(){}
    });
}