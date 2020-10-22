<div class="container">
    <div class="row">
        <div class="col">
            <div style="float: left; margin-top: 8px;">
                <div class="star" style="float: left; margin-right: 15px; "></div>
                <div class='rusmed' style="line-height: 50px; float: left; font-weight: bold; letter-spacing: 5px;">РУСМЕДЗДРАВ</div>
                <div style="clear: both;"></div>
            </div>


            <div class="menu-container desktop" style="float: left; margin-left: 45px; margin-top: 5px; ">
                <div class="menu">
                    <ul>
                        <li><a href="#" style="font-weight: 400;">О центре</a></li>
                        <li><a href="#" style="font-weight: 400;">Услуги</a></li>
                        <li><a href="#" style="font-weight: 400;">Акции</a></li>
                        <li><a href="#" style="font-weight: 400;">Партнерство</a></li>
                    </ul>
                    <div style="clear: both;"></div>
                </div>
            </div>


            <div class="menu-container" style="float: right; margin-right: 35px; margin-top: 5px; margin-bottom: 10px;">
                <div class="menu ">
                    <ul>
                        <li class="mobile">
                            <div class="star" style="float: left; margin-right: 15px; "></div>
                            <div class='rusmed-mobile' style="line-height: 50px; float: left; font-weight: bold; letter-spacing: 5px;">РУСМЕДЗДРАВ</div>
                            <div style="clear: both;"></div>
                        </li>
                        <li class="mobile"><a href="#">О центре</a></li>
                        <li class="mobile">
                            <a href="#">Услуги</a>
                            <ul>
                                <li class="small"><a href="#" >Медициские книжки</a></li>
                                <li class="small"><a href="#">Медициские справки</a></li>
                                <li class="small"><a href="#">Медициские осмотры</a></li>
                            </ul>
                        </li>
                        <li class="mobile"><a href="#">Акции</a></li>
                        <li class="mobile"><a href="#">Партнерство</a></li>
                        <li class="small"><a href="#" style="border-bottom: none; font-weight: 400;">Карьера </a></li>
                        <li class="small"><a href="#" style="border-bottom: none; font-weight: 400;">Блог</a></li>
                        <li class="small mobile" style="border-bottom:none">
                            <div class="insta"></div>
                            <div class="right-insta"><a href="#" style="border-bottom: none;">О нас</a></div>
                            <div class="right-insta"><a href="#" style="border-bottom: none;"> Контакт</a></div>
                        </li>
                    </ul>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div> 
    </div>
</div>
<div class='full blue-line'> 
    <div class="container ">
        <div class="row">
            <div class="col">
                <div style="padding: 15px 0; font-size: 18px;">
                    COVID-19. Тестирование на коронавирус с выездом на дом и предприятие. <a href="#" class="underline">Читать подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="med"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1120 520" preserveAspectRatio="none" class="triangle">
            <polygon id="triangle" points="0,520 0,520 1120,520 1120,445" fill-rule="nonzero" fill="#fff"></polygon>
            </svg>
        </div>
    </div>
</div>
<style>
    .triangle {position: absolute; bottom: 0;}
    .slide-box {position: absolute; left: 150px; top: 0;}
    .easely {font-size: 47px;}
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
        var y = (520 - offsetTop < 0) ? 0 : 520 - offsetTop;
        $("#triangle").attr("points", "0," + y + " 0,520 1120,520 1120,445");
        $(".slide-box").css("top", -(300 - y));
    }
</script>
<div class='container'>    
    <div class='row'>
        <div class='col-lg-6'>
            <div class="slide-box">
                <div class="easely">
                    Намного проще, чем кажется.
                </div>
                <div class='bell'>
                    Заказать обратный звонок
                </div>
            </div>
        </div>
        <div class='col-lg-6 under-triangle'>
            <div style="padding: 0 20px;">
                ООО «РУСМЕДЗДРАВ» предоставляет полный пакет услуг согласно Приказу Министерства здравоохранения и социального развития РФ от 12.04.2011№ 302 н «Об утверждении перечней вредных и (или) опасных производственных факторов, при выполнении которых проводятся обязательные предварительные и периодические осмотры (обследования)»
            </div>
        </div>
    </div>
</div><link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" />

<div class='bg-F7'>
    <div class="space50"></div>
    <div class="container">

        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="list-img" style="float:left; margin-right: 10px;"></div>
                            <div class="med-book left">Медицинские справки </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="garant">
                                Мы обладаем медицинской лицензией МинЗдрава РФ и предоставляет только официальные документы...
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
                            <div class="list-img" style="float:left; margin-right: 10px;"></div>
                            <div class="med-book right">Медицинские справки</div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="garant">
                                Мы обладаем медицинской лицензией МинЗдрава РФ и предоставляет только официальные документы...
                            </div>
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
            <div class="success">Наш успех заключается не только в качестве и в максимальном комфорте для организаций и частных лиц. В первую очередь - это приятные цены.</div>
            <div> <a class="prices" href="#"> Развернуть цены на услуги + </a></div>
        </div> 
    </div> 
</div> 

<div class="bg-v">
    <div style="width: 100%; height: 60px;"></div>
    <div id="contact-slide" class="cs-crop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="online">Оставить онлайн заявку</div>
                    <div class="free">
                        Чтобы получить бесплатную консультацию физическому или 
                        юридическому лицу,&nbsp;необходимо заполнить форму или 
                        обратиться к нашим специалистам по телефону<br />
                        + 7 (495) 666-0-00. </div>
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
                        <input type="text" value="" name="Company"  placeholder="Компания" class="form-input" />
                    </div>
                    <div class="form">
                        <input type="text" value="" name="message"  placeholder="Сообщение" class="form-input">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='down' id="contact-slide-arrow"></div>
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
            <div class="offer">Читать индивидуальное предложение</div>
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
    $(document).ready(function(){

        var owl = $(".owl-carousel");
        owl.owlCarousel({
            margin: 10,
            loop: true,
            autoWidth: false,
            items: 4,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                770: {
                    items: 2
                },
                1215: {
                    items: 4
                }
            }
        });
        owl.trigger('owl.play',1000);
    });
</script>


<div class="bg-F7">
    <div class="space100"></div>
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
                    Полная водительская медкомиссия для ГИБДД Заказать: 3000 руб. 
                </div>
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
                <div class="rectangle-down-small">
                    Совершенно недавно у нас открылся новый филиал в Москве...
                </div> </div>

        </div>
    </div>
    <div style="width: 100%; height: 250px;"></div>
</div>

</div>    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="star_big2"></div>
        </div>
    </div>  

    <div class="row">
        <div class="col">
            <div class="index-text"><h1>МЕДИЦИНСКИЙ ЦЕНТР, МЕДИЦИНСКИЕ СПРАВКИ, МЕДИЦИНСКИЕ ОСМОТРЫ</h1></div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="indexe"><h2>1. МЕДИЦИНСКИЙ ЦЕНТР РУСМЕДЗДРАВ</h2></div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="index-text"><p>РУСМЕДЗДРАВ - компания, которая успешно зарекомендовавшая себя на рынке предоставления медицинских услуг. Мы предлагаем услуги по проведению предварительных и периодических медицинских осмотров для сотрудников вашей организации, а так же все виды справок, сертификаты нарколога и психиатра. 
                </p><p>Согласно действующему законодательству Российской Федерации, отдельные работники, поступающие на работу, обязаны пройти предварительный медицинский осмотр. Лиц, не достигших возраста 21 года и граждан, занятых на работах с вредными и/или опасными условиями труда, предусмотрены ежегодные периодические медицинские осмотры (для остальных профессий в возрасте старше 21 года - не реже, чем 1 раз в 2 года). <p></div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="index-text"><h3>1.1.  ЗАЧЕМ НУЖНЫ МЕДИЦИНСКИЕ ОСМОТРЫ?</h3></div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="index-text"><p>Данная процедура направлена на своевременное выявление заболеваний, делающих невозможным исполнение работником его должностных обязанностей, а также состояний, являющихся факторами риска для жизни как самого трудящегося, так и окружающих его людей.</p><p>

                    Здоровье потенциальных и действующих работников представляет собой обоюдовыгодный интерес, поскольку сам работник получает возможность совершить детальное обследование своего организма, а работодатель обретает уверенность в том, что его команда представляет собой крепкий, работоспособный коллектив, который сможет функционировать без сбоев и не станет отвлекаться от рабочего процесса по состоянию здоровья. 
                </p></div>
        </div>
    </div>
    <style>
        .s:before {
            content: "-"; /* Добавляем желаемый символ перед элементом списка */ 
        }
        .s {
            list-style: none; /* Убираем исходные маркеры */ 
        }



    </style>
    <div class="row">
        <div class="col">
            <div class="ul_class ">
                <strong>Мы предлагаем:</strong>    
                <ul> 
                    <li class="s">проведение всех видов муниципальных осмотров;</li>
                    <li class="s">абсолютную безопасность в условиях напряженой обстановки по covid-19;</li>
                    <li class="s">обследование у высококвалификационных, узконаправленных специалистов;</li>
                    <li class="s">скорость и точность своей работы;</li>
                    <li class="s">грамотное составление сопутсвующей медицинской документации;</li>
                    <li class="s">новейшее оборудование;</li>
                    <li class="s">удобное расположение;</li>
                    <li class="s">высокое качество сервиса</li>
                    <li class="s">гибкую систему скидок для постоянных и корпоративных клиентов;</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="ul_class ">
                <strong>Наши задачи:</strong>
                <ul>
                    <li class="s">определить соотвествие здоровья;</li>
                    <li class="s">установить производственные факторы, негативно влияющие на организм человека;</li>
                    <li class="s">выявить общие заболевания, не относящиеся к числу профессиональных, и делающие невозможным прием работника на определенную должность или невозможность для него продолжать трудовую деятельность на данной профессии</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="indexe"><h2>2. ЗДОРОВЬЕ РАБОЧЕГО КОЛЛЕКТИВА</h2></div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="index-text"><p>Каждый работодатель заинтересован в здоровом, во всех отношениях, коллективе, который поможет поддерживать бесперебойный производственный процесс и выполнять, возложенные на него, обязанности. Иметь в своей команде здоровых работников - значит не тратить время на и деньги на больничные, а сконцентрироваться лишь на поставленных целях. Кроме того, суметь своевременно выявить негативные факторы производства, влияющие на здоровье людей, значит иметь возможность устранить или минимизировать их влияние на ваших подчинённых. Сотрудничая с РУСМЕДЗДРАВ, вы получаете неизменно высокое качество предоставляемых услуг по данным направлениям с минимальными временными затратами. <p></div>
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

        <div class="col-md-1">

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