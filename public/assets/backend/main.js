 // view user details
 $(document).ready(function() {
    
    $('.user_view').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: './userview/' + id,
            method: 'GET',
            data: { user_view:id },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var tr = '<table class="table table-bordered">'+
                            '<tr>'+
                                '<td>Full Name</td>'+
                                '<td>'+response.fullname+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Username</td>'+
                                '<td>'+response.username+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Mobile</td>'+
                                '<td>'+response.phone+'</td>'+
                            '</tr>'+
                            
                            '<tr>'+
                                '<td>Email</td>'+
                                '<td>'+response.email+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Address</td>'+
                                '<td>'+response.address+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>User Status</td>'+
                               /* '<td>';
                                    if(response[0].user_role == '1'){
                                        tr += 'Activated';
                                    }else{
                                        tr += 'Blocked';
                                    }
                        tr += '</td>'+*/
                            '</tr>'+
                        '</table>';
                $('#exampleModal .modal-body').append(tr);
                $('#exampleModal').modal('show');
            }
        });
    });

//order completed code-------------------------------------------------------------------------------------
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$('.order_complete').click(function(e){
        e.preventDefault();
       var order_id = $(this).data('id');
       //alert(order_id);

           $.ajax({
            url: './update/' + order_id,
            type: 'post',
            data: {
                _method: 'PUT',
                delivery: 1
            },
            dataType: 'json',
            success: function (response) {
                  console.log(response);
                alert('Order marked as delivered!');
                location.reload();
            }
       });
    });
});