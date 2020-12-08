

    <input name="name1" type="text" id="name">
    <button id="send">отправить</button>


<script>
    $(document).ready(function(){
        $("#send").click(function(){
            $.ajax({
               url:"/test",
               type: "POST",
               data:"name="+$("input[name=name1]").val(),
               success: function(msg){
                   alert(msg);
               },
               error: function(msg){}
            });
            return false;
        });
    });
</script>
