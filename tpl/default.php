<? IncludeCom('tpl_coms/default/menu') ?>

<div class='full blue-line'> 
    <div class="container ">
        <div class="row">
            <div class="col">
                <div style="" class="mobile-covid">
                    COVID-19. Тестирование на коронавирус с выездом на дом и предприятие. <a href="#" class="underline">Читать подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>

<? IncludeCom('tpl_coms/default/main_banner') ?>

<style>
    .triangle {position: absolute; bottom: 0;}
    .slide-box {position: absolute; left: 150px; top: 0;}

</style>
<script>
    $(document).ready(function () {
        $(document).on("scroll", function () {
            triangle();
        });
        triangle();
    });
    function triangle() {
        var offsetTop = $(document).scrollTop();
        var y = (550 - offsetTop < 0) ? 0 : 550 - offsetTop;
        $("#triangle").attr("points", "0," + y + " 0,550 1059,550 1059,550");
        $(".slide-box").css("top", -(300 - y));
    }
</script>
<div class='container'>    
    <div class='row'>
        <div class='col-lg-6'>
            <div class="slide-box">
                <div class="tabl-down">
                    Основатель компании Владислав Подвойски, всегда на рабочем месте для решения важных вопросов
                </div>
                <div class="easely">
                    Намного проще, чем кажется.
                </div>
                <div class='bell'>
                    <a href="#">
                        Заказать обратный звонок
                    </a>
                </div>
            </div>
        </div>
        <div class='col-lg-6 under-triangle'>
            <div class="ooo">
                ООО «РУСМЕДЗДРАВ» предоставляет полный пакет услуг согласно Приказу Министерства здравоохранения и социального развития РФ от 12.04.2011№ 302 н «Об утверждении перечней вредных и (или) опасных производственных факторов, при выполнении которых проводятся обязательные предварительные и периодические осмотры (обследования)»
            </div>
        </div>
    </div>
</div>

<div class='bg-F7'>
    <div class="space35"></div>
    <div class="container">

        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="list-img" style="margin-right: 10px;"></div>
                            <!--<div class="med-book left">Медицинские справки</div>-->
                            <div class="art-head-h3">
                                <h3>
                                    <span>
                                        Медицинские книжки
                                    </span>
                                </h3>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="garant">
                               У нас вы можете заказать оформление и продление Медицинской книжки. Мы гарантируем, что...
                            </div>
                            
                            <div class="read"> <a href="#"> Читать полностью </a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class=""></div>
                <div class="doctor-img"></div>
                <div class="low"> Дешевле, чем у конкурентов</div>
            </div>
        </div>
    </div>
    <div class="space50"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class=""></div>
                <div class="doctor-img"></div>
                <div class="low"> Дешевле, чем у конкурентов</div>
            </div>
            <div class="col-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="list-img" style="margin-right: 10px;"></div>
                           <!-- <div class="med-book right">Медицинские справки</div>-->
                           <div class="art-head-h3">
                                <h3>
                                    <span>
                                        Медицинские справки
                                    </span>
                                </h3>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="garant">
                                Мы обладаем медицинской лицензией МинЗдрава РФ и предоставляет только официальные документы...
                            </div>
                            <div class="space50"></div>
                            <div class="read"> <a href="#"> Читать полностью </a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty"></div>
</div>
<div class="star_big"></div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="success its">Наш успех заключается не только в качестве и в максимальном комфорте для организаций и частных лиц. В первую очередь - <a href="#">это приятные цены.</a></div>
            <div> <a class="prices" href="#"> Развернуть цены на услуги + </a></div>
        </div> 
    </div> 
</div> 

<div class="bg-v">
    <div style="width: 100%; height: 15px;"></div>
    <div id="contact-slide" class="cs-crop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="online">Оставить онлайн заявку</div>
                    <div class="free">
                        Чтобы получить бесплатную консультацию физическому или 
                        юридическому лицу,&nbsp;необходимо заполнить форму или 
                        обратиться к нашим специалистам по телефону<br />
                        + 7 (926) 047-71-70. </div>
                </div>


                <div class="col-md-6">
                    <div class="form" style='margin-top: 10px;'>
                        <input type="text" value="" name="first_name"  placeholder="Имя" class="form-input" />
                    </div>
                    <div class="form ">
                        <input type="text" value="" name="second_name" placeholder="Фамилия" class="form-input" />
                    </div>
                    <div class="form">

                        <input type="text" value="" name="email"  placeholder="Электронная почта" class="form-input" />
                    </div>

                    <div class="form ">
                        <input type="text" value="" name="title"  placeholder="Заголовок" class="form-input" />
                    </div>
                    <div class="form">
                        <input type="text" value="" name="company"  placeholder="Компания" class="form-input" />
                    </div>
                    <div class="form">
                        <textarea type="text" value="" name="message"  placeholder="Сообщение" class="form-input"></textarea>
                    </div>
                    <div class="form" style="border-bottom: none;">
                        <input type="submit" id="send" name="send" value="Отправить" class="form-input" />
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script>
        $(document).ready(function(){
            $("input[name=send]").click(function(){
                var fillForm = false;
                if ($("input[name=first_name]").val() != "" && $("input[name=second_name]").val() != "" && $("input[name=email ]").val() != "" && $("input[name=title]").val() != "" && $("textarea[name=message]").val() != ""  ){
                  fillForm = true;
                  $("input[name=send]").attr("value", "Отправляется...");
                $("input[name=send]").attr("name", "sending");
                }
                else {
                    if ($("input[name=first_name]").val() == "") {
                        $("input[name=first_name]").parent(".form").css("border-bottom","1px solid red");
                    }
                    else {
                        $("input[name=first_name]").parent(".form").css("border-bottom","1px solid red");
                    }
                    if ($("input[name=second_name]").val() == "") {
                         $("input[name=second_name]").parent(".form").css("border-bottom","1px solid red");
                    }
                    if ($("input[name=title]").val() == "") {
                         $("input[name=title]").parent(".form").css("border-bottom","1px solid red");
                    }
                   if ($("input[name=email]").val() == "") {
                         $("input[name=email]").parent(".form").css("border-bottom","1px solid red");
                    }
                    if ($("input[name=company]").val() == "") {
                         $("input[name=company]").parent(".form").css("border-bottom","1px solid red");
                    }
                    if ($("textarea[name=message]").val() == "") {
                         $("textarea[name=message]").parent(".form").css("border-bottom","1px solid red");
                    }
                }
                
                if (fillForm) {
                   $.ajax({
                    url:"/SendMail",
                    type: "POST",
                    data:"first_name="+$("input[name=first_name]").val()+"&second_name="+$("input[name=second_name]").val()+"&email="+$("input[name=email]").val()+"&title="+$("input[name=title]").val()+"&company="+$("input[name=company]").val()+"&message="+$("textarea[name=message]").val(),
                    success: function(msg){                      
                        if(msg == 'ok'){
                             $("input[name=sending]").attr("name", "send");
                             $("input[name=first_name]").val('');
                             $("input[name=second_name]").val('');
                             $("input[name=title]").val('');
                             $("input[name=email]").val('');
                             $("input[name=company]").val('');
                             $("textarea[name=message]").val('');
                             $("input[name=send]").attr("value", "Отправлено");
                             $("input[name=first_name]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             $("input[name=second_name]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             $("input[name=email]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             $("input[name=title]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             $("input[name=company]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             $("textarea[name=message]").parent(".form").css("border-bottom","1px solid rgba(255, 255, 255, 0.53)");
                             
                             setTimeout(switch_button_value, 15000);
                        }
                    },
                    error: function(msg){}
                 }); 
                 
                }
                
        
                return false;
            });
        });
        
        function switch_button_value() {
             $("input[name=send]").attr("value", "Отправить");
        }
        
    </script>
    <div style="width: 100%; height: 100px;">
        <button class='expand down' id="contact-slide-arrow">
            <svg width="11" height="5.5">
            <use xlink:href="#icon--arrow">
            <svg viewBox="0 0 12.1 7.1" aria-labelledby="aicon--arrow-title" id="icon--arrow" xmlns="http://www.w3.org/2000/svg">
            <title id="aicon--arrow-title">arrow</title>
            <path class="ast0" d="M6 7.1l-6-6L1.1 0 6 5l5-5 1.1 1.1z"></path>
            </svg>
            </use>
            </svg>
        </button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#contact-slide-arrow").click(function () {
            if ($("#contact-slide").hasClass('cs-crop')) {
                $("#contact-slide").removeClass('cs-crop').addClass('cs-full');
                $("#contact-slide-arrow").removeClass('down').addClass('up');
            } else {
                var h = $("#contact-slide").height();
                $(".cs-full").css("height", h);
                $("#contact-slide").removeClass('cs-full').addClass('cs-crop').removeAttr("style");
                $("#contact-slide-arrow").removeClass('up').addClass('down');
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="sales">
                Для организаций предусмотрена гибкая система скидок
            </div>
        </div>                    

        <div class="col-md-6">
            <div class="want">Хотите сэкономить до 30%? Получить надежного партнера,  избавиться от головных болей и всегда знать о том, что ваши сотрудники будут иметь необходимые документы на руках?</div>
            <div class="offer"><a href="#">Читать индивидуальное предложение</a></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="us">
                С нами работали:
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="owl-carousel owl-theme">
                <div class="item" style="width:285px"><img src="/i/image/metropol.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/okay.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/hotel.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/globus.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/cosmic.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/moscow.jpg"></div>
    <!--        <div class="item" style="width:285px"><img src="/i/image/ukraine.png"></div>-->
                <div class="item" style="width:285px"><img src="/i/image/procons.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/line.jpg"></div>
                <div class="item" style="width:285px"><img src="/i/image/work.jpg"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        var owl = $(".owl-carousel");
        owl.owlCarousel({
            margin: 10,
            loop: true,
            autoWidth: false,
            items: 4,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                770: {
                    items: 3
                },
                1215: {
                    items: 4
                }
            }
        });
        owl.trigger('owl.play', 1000);
    });
</script>


<div class="bg-F7">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="image_left" style="background: transparent url(/i/image/procent.png) center left no-repeat ;"></div>
                    <div class="v_text_16">Акция</div>
                </div>
                <div class="rectangle">
                    <img src="/upl/flatironbg.jpg" />
                </div>
                <div class="rectangle-down-big">
                    Полная водительская медкомиссия для ГИБДД <br> Заказать: 3000 руб. 
                </div>
                <div class="space20"></div>
                <div class="rectangle-down-small">
                    Официально и быстро. Для Москвы и Московской области...
                </div></div>
            <div class="col-md-4">

                <div class="image_left" style="background: transparent url(/i/image/doc.png) center left no-repeat ;"></div>                <div class="v_text_16">Статья</div>
                <div class="rectangle">
                    <img src="/upl/flatironbg.jpg" />
                </div>
                <div class="rectangle-down-big">
                    Как бороться с COVID-19?                            </div>
                <div class="space20"></div>
                <div class="rectangle-down-small" >
                    Статья рассказывает о методах сопротивления вирусу...
                </div></div>

            <div class="col-md-4">
                <div class="image_left" style="background: transparent url(/i/image/stop.png) center left no-repeat ;"></div>
                <div class="v_text_16">Новости</div>
                <div class="rectangle">
                    <img src="/upl/flatironbg.jpg" />
                </div>
                <div class="rectangle-down-big">
                    Мы открыли новый филиал                            </div>
                <div class="space20"></div>
                <div class="rectangle-down-small">
                    Совершенно недавно у нас открылся новый филиал в Москве...
                </div> </div>

        </div>
    </div>
    <div style="width: 100%; height: 200px;"></div>
</div>

<style>
    .index-text ul li:before {
        content: "-"; /* Добавляем желаемый символ перед элементом списка */ 
    }
    .index-text ul li {
        list-style: none; /* Убираем исходные маркеры */ 
    }

    

</style>

</div>    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="star_big2"></div>
        </div>
    </div>  

    <div class="row">
        <div class="col">
            <div class="index-text">
                <?= $data['text'] ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="cookie">
                Cookie/обработка данных
            </div>
        </div>

        <div class="col-md-8">

            <div class="f-star"></div>
            <div class="f-rusmed">РУСМЕДЗДРАВ</div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <ul class="footer footer-first">
                <li><a href="#">Справка для водителей</a></li>
                <li><a href="#">Справка на оружие</a></li>
                <li><a href="#">Справка для бассейна и фитнеса</a></li>
                <li><a href="#">Справка в ВУЗ</a></li>
                <li><a href="#">Справка в для госслужбы</a></li>

            </ul>
        </div>
        <div class="col-sm-4">
            <ul class="footer">
                <li><a href="#">Профосмотры</a></li>
                <li><a href="#">Медкнижки</a></li>
                <li><a href="#">Выездные профосмотры</a></li>
                <li><a href="#">Психиатричесое свидетельство</a></li>
                <li><a href="#">Справки для госслужбы</a></li>

            </ul>
        </div>
        <div class="col-sm-4">
            <ul class="footer">

                <li><a href="#">Отзывы</a></li>
                <li><a href="#">Документы</a></li>
                <li><a href="#">Партнеры</a></li>
                <li><a href="#">Структура</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>   
        </div>
    </div>
</div>