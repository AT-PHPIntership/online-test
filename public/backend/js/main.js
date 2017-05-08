function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
      return false;
}
$(document).ready(function(){
  $(document).on("click",".btn-add",function() {
    var $container = $(this).parents('table').find('.add_question');
    var $template = $('#template-add-question').clone().removeClass('#template-add-question');
    $container.append($template);
  });
});

$(document).ready(function(){
  $('.add-img').on('click', function(){
    var $container = $(this).parent('div');
    var $template = $('#item-img').clone().removeClass('#item-img');
    $container.append($template);
  });
});