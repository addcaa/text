<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>聊天室</title>
</head>
<body>
<input type="text" id="text">
<input type="submit" id="sub" vlaue="发送">
<p id="p"></p>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
   var ws = new WebSocket("ws://character.com:9502");
    ws.onopen=function(){
        $(function(){
        $("#sub").click(function(){
            var text=$("#text").val();
            // alert(text);
            var data={
                type:"message",
                text:text,
                id:2,
                data:Date.now()
            }
            ws.send(JSON.stringify(data));
        })
    })
    }

    ws.onmessage=function(d){
         // alert(d.data);
         var str = d.data;
        var suffix = str.substr(26);
        var arr = suffix.split(";");
        // console.log(arr[0]);
        // $("#a").append(arr[0]).append('<br>');
        $("#p").append(arr[0]).append('<br>');
    }
</script>
