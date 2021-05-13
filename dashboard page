<?php
    session_start();
    if(!isset($_SESSION["email"])) 
    {
        header("Location: login.php");
        exit();
    }
?>

<html>

<head>

<style>

body
{
    background-image:url("1.jpeg");
    background-size:cover;
}

#videoelement
{
background-color:white;
border:5px solid black;
width:800px;
height:550px;
}
#start
{
margin-top:30px;
width:150px;
border:3px solid black;
font-size:23px;
outline:none;
cursor:pointer;
}

#stop
{
margin-left:50px;
margin-top:30px;
width:150px;
font-size:23px;
border:3px solid black;
outline:none;
cursor:pointer;
}

</style>

</head>

<body>

    <center>

    <div >
        <p>Welcome,
        <?php 
        echo $_SESSION["email"];
        ?>!
        </p>
        <p> You are now in dashboard page!! </p>
        <p><a href="logout.php">Logout</a></p>

    </div>
<div > 
<video autoplay="true" id="videoElement">
</video> 
</div>

<button id="start">Start</button>
<button id="stop">Stop </button>

</center>

<script>
   
    var video = document.querySelector("#videoElement");
    var stopVideo = document.querySelector("#stop");
    var sta = document.querySelector("#start");
   
    
    sta.onclick=function(){
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          video.srcObject = stream;
        })
        .catch(function (err0r) {
          console.log("Something went wrong!");
        });
    }

    stopVideo.addEventListener("click", stop, false);

    function stop(e) {
      var stream = video.srcObject;
      var tracks = stream.getTracks();

      for (var i = 0; i < tracks.length; i++) {
        var track = tracks[i];
        track.stop();
      }

      video.srcObject = null;
    }
  </script>


</body>

</html>
