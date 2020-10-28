<?php 
print "<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
        <title>Document</title>
        <style>
        body{
            background-image: linear-gradient(-45deg,rgb(71, 145, 215),rgb(37, 164, 196),rgb(30, 215, 160));
            animation: back 10s ease-in-out infinite;
        }
    
    
    #send{
        width: 10%;
        padding: 1% 1%;
        border: none;
        float: right;
    }.bf{
      display: inline;
    }.messages {
        height:90%;
    
        font:16px/26px Georgia, 
        Garamond, Serif;overflow:auto;
      }
    .bottomin{

        padding: 1% 1%;
        font-size: 120%;
        color: whitesmoke;
        text-decoration: none;
        background-color: rgb(99, 97, 97);
        border: none;
    
    }.bottomin[type=text]{
        width: 92%;
    }.bottomin[type=button]{
        width: 5%;
    }.every{
        border: none;


    }
    </style>
    </head>
    <body>

        <div class='messages'>
        <ul id='messages'>
        </ul>
        </div>
        <div class='every'>
    <div class='bf'>
        <input type='text' class='bottomin' id='myMessage' >
        <button class='bottomin' id='sendbutton'>send</button>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {
        
            var socket = io.connect('http://139.162.144.244:8080/');
        
            socket.on('connect', function() {
                //document.getElementById('state').innerHTML = 'Online'
                //socket.send('User has connected!');
            });
        
            socket.on('message', function(msg) {
                $('#messages').append('<li>'+msg+'</li>');
                console.log('Received message');
            });
        
            $('#sendbutton').on('click', function() {
                if (document.getElementById('myMessage').value == ''){
                    console.log('nothing')
                }else{
                socket.send($('#myMessage').val());
                $('#myMessage').val('');}
            });
        
        });
        </script>
    </body>
    
    
</html>";
?>


