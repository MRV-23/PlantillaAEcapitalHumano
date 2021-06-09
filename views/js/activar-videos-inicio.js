function toggleMute() {

    var video=document.getElementById("video-covid");
  
    if(video.muted){
      video.muted = false;
    } else {
      debugger;
      video.muted = true;
      video.play()
    }
  
  }
  
  $(document).ready(function(){
    setTimeout(toggleMute,2000);
  })