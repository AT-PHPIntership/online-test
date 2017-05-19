var timeReading = 4500;
function timerReading() {
  var days        = Math.floor(timeReading/24/60/60);
  var hoursLeft   = Math.floor((timeReading) - (days*86400));
  var hours       = Math.floor(hoursLeft/3600);
  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
  var minutes     = Math.floor(minutesLeft/60);
  var remainingSeconds = timeReading % 60;
  if (remainingSeconds < 10) {
      remainingSeconds = "0" + remainingSeconds; 
  }
  document.getElementById('countdown-reading').innerHTML =  hours+ " :" + minutes + " :" + remainingSeconds;
   if (timeReading == 60) {
      document.getElementById('countdown-reading').innerHTML = "Bạn còn 60s để kết thúc bài thi! Vui lòng submit !!! ";}
      
   if (timeReading == 0) {
      clearInterval(countdownTimer);
      $('.end-test').trigger('click');

  } else {
      timeReading--;
  }
}
var countdownTimer = setInterval('timerReading()', 1000);