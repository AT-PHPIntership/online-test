function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
      return false;
}
$(function () {
  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();
});