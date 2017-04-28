function confirmDelete(msg){
    if(window.confirm(msg)){
        return true;
    }
      return false;
}
 $(document).ready(function(){
    var count_question = $('#item').find('.question_id').val();
    $('.add_to_question').click(function(){
      count_question = parseInt(count_question) + 1;
      var x = $('#item').clone().attr('id', 'row2'+count_question).appendTo('#add_question');
      $('#row2'+count_question).find('.question_id').val(count_question);
      $('.delete_question').click(function(){
        $(this).closest('tr').remove();  
      });
    });
});