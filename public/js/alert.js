window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var name = button.data('name')
    var category = button.data('category')
    var modal = $(this)
    if(category == 'role'){
        modal.find('.modal-body p').text('Are you sure you want to delete Role '+name+' ?')
    }
    else if(category == 'user'){
        modal.find('.modal-body p').text('Are you sure you want to delete User '+name+' ?')
    }
    else if(category == 'form'){
        modal.find('.modal-body p').text('Are you sure you want to delete Form '+name+' ?')  
    }
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #category').val(category)
})

$('#statusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var name = button.data('name')
    var category = button.data('category')
    var action = button.data('action')
    var modal = $(this)
    if(action == 'approve'){
        modal.find('.modal-header h5').text('Confirmation for '+name+' Approval')
        modal.find('.modal-body p').text('Are you sure you want to approve the '+name+'  ?')
        modal.find('.modal-body #reject').html("")
    }
    else if(action == 'reject'){
        modal.find('.modal-header h5').text('Confirmation for '+name+' Rejection')
        modal.find('.modal-body p').text('Are you sure you want to reject the '+name+'? Please fill in the reason below.')
        modal.find('.modal-body #reject').html('<textarea rows="2" name="reason" autofocus class="form-control" placeholder="Your Reason for Rejection" required="required"></textarea>')
    }
    else {
        modal.find('.modal-header h5').text('Mark '+name+' as Pending')
        modal.find('.modal-body p').text('Are you sure you want to mark the '+name+' as Pending?')
    }
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #action').val(action)
    modal.find('.modal-body #category').val(category)
})

$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});