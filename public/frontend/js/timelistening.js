var timeListening = 2700;
function timerListening() {
  var days        = Math.floor(timeListening/24/60/60);
  var hoursLeft   = Math.floor((timeListening) - (days*86400));
  var hours       = Math.floor(hoursLeft/3600);
  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
  var minutes     = Math.floor(minutesLeft/60);
  var remainingSeconds = timeListening % 60;
  if (remainingSeconds < 10) {
      remainingSeconds = "0" + remainingSeconds; 
  }
  document.getElementById('countdown').innerHTML =  minutes + " :" + remainingSeconds;
   if (timeListening == 60) {
      document.getElementById('countdown').innerHTML = "Bạn còn 60s để kết thúc bài thi! Vui lòng submit !!! ";}
      
   if (timeListening == 0) {
      clearInterval(countdownTimer);
      $('.next-question').trigger('click');

  } else {
      timeListening--;
  }
}
var countdownTimer = setInterval('timerListening()', 1000);

