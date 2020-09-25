<div class="sc-contacts">
    <? if (Post('send', false)) : ?>
    <div class="msg-ok">
        Ваше сообщение отправлено!
    </div>
    <? endif; ?>
    <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div>
            <input type="text" name="name" value="" placeholder="Введите ваше имя" />
        </div>
        <div>
            <input type="text" name="email" value="" placeholder="Введите ваш адрес электронной почты" />
        </div>
        <div>
            <textarea name="message" placeholder="Введите сообщение"></textarea>
        </div>
        <div>
            <input type="submit" name="send" value="Отправить" />
        </div>
    </form>
</div>
<style>
    .sc-contacts {margin-top: 20px;}
    .sc-contacts .msg-ok {margin: 20px 0; font-size: 18px; color: green; text-align: center;}
    .sc-contacts form > div {margin: 10px 0;}
    .sc-contacts form > div > input[type=text] {width: 500px; font-size: 18px; padding: 3px 7px; border: 1px solid lightgray; outline: none; border-radius: 3px;}
    .sc-contacts form > div > textarea {width: 500px; font-size: 18px; padding: 3px 7px; height: 120px; border: 1px solid lightgray; outline: none; border-radius: 3px;}
</style>