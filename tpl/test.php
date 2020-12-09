

    <input name="name1" type="text" id="name">
    <button id="send">отправить</button>


<script>
    $(document).ready(function(){
        $("#send").click(function(){
            $.ajax({
               url:"/test",
               type: "POST",
               data:"name="+$("input[name=first_name]").val()+"&second_name="+$("input[name=second_name]").val()+"&name="+$("input[name=email]").val()+"name="+$("input[name=title]").val()"name="+$("input[name=Company]").val()"name="+$("input[name=message]").val()
               success: function(msg){
                   alert(msg);
               },
               error: function(msg){}
            });
            return false;
        });
    });
</script>
