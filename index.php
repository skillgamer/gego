<?
print '''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-eoom</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function() {
        
            var socket = io.connect("http://127.0.0.1:5000");
        
            socket.on("connect", function() {
                document.getElementById("state").innerHTML = "Online"
                //socket.send("User has connected!");
            });
        
            socket.on("message", function(msg) {
                $("#messages").append("<li>"+msg+"</li>");
                console.log("Received message");
            });
        
            $("#sendbutton").on("click", function() {
                socket.send($("#myMessage").val());
                $("#myMessage").val("");
            });
        
        });
        </script>
        <center><h1 id="state">offline</h1></center>
        <ul id="messages"></ul>
        <input type="text" id="myMessage">
        <button id="sendbutton">Send</button>
</body>
</html>
''';


?>