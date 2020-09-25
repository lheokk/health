<!--Модальное окно-->
<div id="modal" class="black-box modal hide fade">
  <div class="modal-header tab-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <span>Some modal title</span>
  </div>
  <div class="modal-body separator">
    <h4>Text in a modal</h4>
    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>
  </div>
  <div class="modal-footer">
    <div class="inner-well">
      <a class="button mini rounded light-gray" data-dismiss="modal">Close</a>
      <a class="button mini rounded blue">Save changes</a>
    </div>
  </div>
</div>

<!--Всплывающее окно, которое появляется когда заходишь на страницу-->
<script type="text/javascript">
    $(function(){
        Notifications.push({
            imagePath: "../../image/cloud.png",
            text: "<p><b>Welcome to the Plastique theme!</b></p><div>Be sure to check out all the features!</div>",
            autoDismiss: 10
        });
    });
</script>