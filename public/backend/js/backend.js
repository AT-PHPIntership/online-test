$('div.alert').delay(time).slideUp();

$(document).ready(function () {
    $('#list_admins').DataTable();
    $('#list_cities').DataTable();
    $('#list_business').DataTable();
    $('#list_users').DataTable();
    $('#list_categories').DataTable();
    $('#list_counties').DataTable();

    $('a.delete').click(function () {
        var name = $(this).attr("name");
        var url = $(this).attr("url");
        swal({
            title: messages.confirm_delete_title,
            text: messages.confirm_delete_text + name,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: messages.delete,
            closeOnConfirm: false
        }, function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'text',
                success: function (result) {
                    swal({
                        title: result,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: messages.ok,
                    }, function(){
                        location.reload();
                    });
                }
            });    
        });
    });

    $('a.active').click(function () {
        var url = this.id;
        swal({
            title: messages.business_active,
            text: messages.question_active,
            type: "info",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,
        },
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: url,
                type: "PUT",
                dataType: 'text',
                success: function (result) {
                    if (result == messages.updated) {
                            location.reload();
                    }
                }
            });

        });
    });
});
