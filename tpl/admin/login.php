<div class="container" style="margin-bottom: 30px;">
  <div class="login-wrapper" style="margin-top: 120px">
    <div style="text-align: center">
      <i class="icon-magic logo-icon"></i>
    </div>

    <div id="login-manager">
      <div id="login" class="login-wrapper animated">
        <form action="<?= SiteRoot('admin/login') ?>" method="post">
		<input type="hidden" name="is_chk" value="1">
          <div class="input-group">
            <input type="text" placeholder="email" class="input-transparent" id="email" name="admin_login" />
            <input type="password" placeholder="password" class="input-transparent" name="admin_pwd"/>
          </div>
          <button id="login-submit" type="submit" class="login-button">Login</button>
        </form>
      </div>

      <!--<div id="register" class="login-wrapper animated" style="display: none;">
        <form action="../dashboard/stats.html" method="get">
          <div class="input-group">
            <input type="text" placeholder="email" class="input-transparent" />
            <input type="text" placeholder="first name" class="input-transparent"/>
            <input type="text" placeholder="last name" class="input-transparent"/>
            <input type="email" placeholder="confirm password" class="input-transparent"/>
            <input type="password" placeholder="password" class="input-transparent"/>
          </div>
          <button id="register-submit" type="submit" class="login-button">Register</button>
        </form>
      </div>

      <div id="forgot" class="login-wrapper animated" style="display: none;">
        <form action="../dashboard/stats.html" method="get">
          <div class="input-group">
            <input type="text" placeholder="email" class="input-transparent" />
          </div>
          <button id="forgot-submit" type="submit" class="login-button">Recover</button>
        </form>
      </div>

      <div class="inner-well" style="text-align: center; margin: 20px 0;">
        <a href="#" id="login-link" class="button mini rounded gray"><i class="icon-signin"></i> Login</a>
        <a href="#" id="register-link" class="button mini rounded gray"><i class="icon-plus"></i> Register</a>
        <a href="#" id="forgot-link" class="button mini rounded gray"><i class="icon-question-sign"></i> Forgot Password?</a>
      </div>-->
    </div>
  </div>
</div>
<script type="text/html" id="template-notification">
  <div class="notification animated fadeInLeftMiddle fast{{ item.itemClass }}">
    <div class="left">
      <div style="background-image: url({{ item.imagePath }})" class="{{ item.imageClass }}"></div>
    </div>
    <div class="right">
      <div class="inner">{{ item.text }}</div>
      <div class="time">{{ item.time }}</div>
    </div>

    <i class="icon-remove-sign hide"></i>
  </div>
</script>
<script type="text/html" id="template-notifications">
  <div class="container">
    <div class="row" id="notifications-wrapper">
      <div id="notifications" class="{{ bootstrapPositionClass }} notifications animated">
        <div id="dismiss-all" class="dismiss-all button blue">Dismiss all</div>
        <div id="content">
          <div id="notes"></div>
        </div>
      </div>
    </div>
  </div>
</script>
<script src="<?= Root('i/js/admin/application.js')?>" type="text/javascript"></script>
<script src="<?= Root('i/js/admin/docs.js')?>" type="text/javascript"></script>
<script src="<?= Root('i/js/admin/docs_charts.js')?>" type="text/javascript"></script>