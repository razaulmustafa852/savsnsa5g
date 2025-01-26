<?php
// error_reporting(0);
$array_video = array(1=>'nV_hd6bLXmw',2=>'JMbBjKnUoC4',3=>'jAa58N4Jlos',4=>'9ZfN87gSjvI',5=>'9jrP7460a4o',6=>'oh904_HdkwY',7=>'LXb3EKWsInQ',8=>'CHSnz0bCaUk',9=>'pSnB7Uh8dvQ',10=>'9GvTYd5hG_g',11=>'VMs0yEVC00A',12=>'OHOpb2fS-cM', 13=>'aqz-KE-bpKQ',14=>'puLAJaabJh0');

$run = $array_video[$_GET['v']];

?>
<?php
if(isset($_GET['submit'])){?>
	
	<html>
  <body>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<style>
    body { width: 100%; height: 100%; }

    
</style>    
<script src="jquery-3.6.0.min.js"></script>

    <script>
	
	
     
      var video='<?php echo $run;?>';
      var eid='<?php echo $_GET['case'];?>';
      var c =1;
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '1080',
          width: '1920',
          autoplay:1,
          videoId: video,
          playerVars: {
            'playsinline': 1
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
        event.target.setPlaybackQuality('hd2160'); 
      }



      function stopVideo() {
        player.stopVideo();
      }


    function onStateChange(event) {
    
    //this will be saved to database for analyzing the video ***************************
    var starQuality = player.getPlaybackQuality()+ ",";
    // alert(starQuality);
    var intStatus = player.getPlayerState()+ ",";
    //alert(youTubePlayerStateValueToDescription(intStatus));
    var strTime = player.getCurrentTime();
 var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
     $.post("save_events.php",{time:time,c:c,video:video,starQuality:starQuality,intStatus:intStatus,strTime:strTime,eid:eid},function(data){
    //   alert(data);
      // document.getElementById("options").innerHTML=data;
      });


    }




function youTubePlayerDisplayInfos() {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

        var current = player.getCurrentTime();
        var duration = player.getDuration();
        var videoBytesDownloaded=player.getVideoLoadedFraction();
        var totalBytes=player.getVideoBytesTotal();
        var currentPercent = (current && duration
                              ? current*100/duration
                              : 0);

        var fraction = (player.hasOwnProperty('getVideoLoadedFraction')
                        ? player.getVideoLoadedFraction()
                        : 0);

  

        // alert(url);
        // alert('Raza');
        var c_quality = player.getPlaybackQuality();
		document.getElementById("vid").innerHTML=c_quality;
        var loaded_percentage = (fraction*100).toFixed(1);
        var available_qualities = player.getAvailableQualityLevels();
        // var video='M7lc1UVf-VE';
         $.post("save.php",{time:time,c:c,video:video,c_quality:c_quality,videoBytesDownloaded:videoBytesDownloaded,loaded_percentage:loaded_percentage,available_qualities:available_qualities,eid:eid},function(data){
        //   alert(data);
         // document.getElementById("options").innerHTML=data;
        });
}



(function () {
    'use strict';

    function init() {
        // Load YouTube library


        // Set timer to display infos
        setInterval(youTubePlayerDisplayInfos, 1000);
        // setInterval(WriteToFile, 1000);

    }


    if (window.addEventListener) {
        window.addEventListener('load', init);
    } else if (window.attachEvent) {
        window.attachEvent('onload', init);
    }
}());
    </script>
    <div class="framed" style="text-align:center;">
      <div id="player"></div>
      <div id="YouTube-player-progress"></div>
      
      <!-- <h1>Seqencial Information </h1> -->
      <div id="YouTube-player-infos"></div>
      <div id="YouTube-player-errors"></div>
      <div id="YouTube-player-fixed-infos"></div>
    </div>

<!-- Here I put player information -->
<!-- <hr> -->
<!-- <h1>Whole History of Session</h1> -->
    <div id="iFrameData">

    </div>
<div id="vid"></div>
  </body>
</html>
<?php }

?>
<?php
echo "VIDEO IS: ". $_GET['v']; echo "<br>";
?>

<div style="text-align:center">
<form method="get" action="">
Case: <input style="margin-right:10px;" type="text" name="case" value="<?php if(isset($_GET['case'])){ echo $_GET['case'];} else{ echo "";} ?>"> 
Video: <select name="v" style="margin-right:10px; width:100px;"><?php  for($i=1; $i<=10;$i++){ if($i== $_GET['v']){ $select = "selected";} else{ $select="";} ?><option  <?php echo $select; ?> value="<?=$i;?>"><?=$i;?></option><?php }?></select>
<input type="submit" name="submit" value="RUN">
</form>
</div>
