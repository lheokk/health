$(document).ready(
	function()
	{
		/***
		*форма регистрации
		***/

		$("#registration").click(function(){
			var mail 			= $("input[name=mail]").val();
			var pass 			= $("input[name=pass]").val();
			var pass_confirm 	= $("input[name=passConfirm]").val();
			var first_name 		= $("input[name=firstName]").val();
			var last_name 		= $("input[name=lastName]").val();

			if (mail == ''){
				var n = noty({
						text: 'Заполните поле Email',
						type: 'error',
						layout: 'bottom',
						timeout: 3000
				});
				return false;
			}
			if (pass == ''){
				var n = noty({
						text: 'Введите пароль',
						type: 'error',
						layout: 'bottom',
						timeout: 3000
				});
				return false;
			}
			if (pass_confirm == ''){
				var n = noty({
						text: 'Введите подтверждение пароля',
						type: 'error',
						layout: 'bottom',
						timeout: 3000
				});
				return false;
			}
			if (pass != pass_confirm){
				var n = noty({
						text: 'Пароли не совпадают',
						type: 'error',
						layout: 'bottom',
						timeout: 3000
				});
				return false;
			}

			$.ajax({
				type: "POST",
				url: "/user/registration",
				data: {mail: mail,
					    pass: pass,
						pass_confirm: pass_confirm,
						first_name: first_name,
						last_name: last_name
					},
				success: function(msg){
					if(msg == "Ok")
					{
						$("#registration_page").hide();
						var n = noty({
							text: 'Спасибо за регистрацию',
							type: 'success',
							layout: 'bottom',
							timeout: 3000
						});
						$("#succes_registration").show();
					}
					else
					{
						var n = noty({
							text: msg,
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
	}
);