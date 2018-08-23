jQuery(document).ready(function($) {

    // DATA TABLES
    var usersDataTable = $('#users-table').DataTable({
        "ajax": {
            url : 'users/datatable',
            type : 'GET'
        },
    })
    var categoriesDataTable = $('#categories-table').DataTable({
        "ajax": {
            url : 'datatable/slider',
            type : 'GET'
        },
    })

    // Delete Category Button
    $(document).on('click', '.btnCategoryDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        bootbox.confirm({ 
            size: "small",
            title: "Delete Category",
            message: "Are you sure you want to delete this category?", 
            callback: function(result){ 
                if (result) {
                 
                    $.ajax({
                        type: "POST",
                        url: "delete",
                        data: { id : id },
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            if (response.success) {
                                toastr.success(response.message);
                                categoriesDataTable.ajax.reload();
                            }else{
                                toastr.error(response.message);
                                categoriesDataTable.ajax.reload();
                            }
                        }
                    });
                    
                }
            }
          })
    })


    $(document).on('click', '.cancel-btn', function(e) {
    	$('form').attr('id', 'add-category');
        $('.add-btn').removeClass('visible-print');
        $('.edit-btn').addClass('visible-print');
        $('.cancel-btn').addClass('visible-print');
        $('#add-category').trigger('reset');
        $('#edit-category').trigger('reset');
    })

    // FORMS
    $('.add-btn').on('click', function(e) {
        e.preventDefault();
        var data = $('#add-category').serialize();
        var errors = "";

        bootbox.confirm({ 
            size: "small",
            title: "Add Category",
            message: "Are you sure you want to add this category?", 
            callback: function(result){ 
                if (result) {
                    
                    $.ajax({
                        type: "POST",
                        url: "save",
                        data: data,
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            if (response.success) {
                                toastr.success(response.message);
                                // Clear all input on the Add user Form
                                $('#add-category').find('input:text, input:password, select, textarea').val('');
                                $('#add-category').find('input:radio, input:checkbox').prop('checked', false);
                                categoriesDataTable.ajax.reload(); // Reload Users DataTable
                            }else{
                                if (response.validation_errors) {
                                    console.log(response.validation_errors);
                                    toastr.error(response.validation_errors);
                                }else{
                                    toastr.error(response.message);
                                }
                            }
                        }
                    });
                    
                }
            }
          })

    })

    function editCategory() {
    	$('#edit-category').on('submit', function(e) {
    	console.log(this);
        e.preventDefault();
        var data = $(this).serialize();

        bootbox.confirm({ 
            size: "small",
            title: "Edit Category",
            message: "Are you sure you want to update this category?", 
            callback: function(result){ 
                if (result) {
                    
                    $.ajax({
                        type: "POST",
                        url: "update",
                        data: data,
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            if (response.success) {
                                toastr.success(response.message);
                                // Clear all input on the Add user Form
                                $('#edit-user').find('input:text, input:password, select, textarea').val('');
                                $('#edit-user').find('input:radio, input:checkbox').prop('checked', false);
                                categoriesDataTable.ajax.reload(); // Reload Users DataTable
                            }else{
                                if (response.validation_errors) {
                                    console.log(response.validation_errors);
                                    toastr.error(response.validation_errors);
                                }else{
                                    toastr.error(response.message);
                                }
                            }
                        }
                    });
                    
                }
            }
          })

    });
}
    // Edit Category  Button
    $(document).on('click', '.btnCategoryEdit', function(e) {
        e.preventDefault();
        $('form').attr('id', 'edit-category');
        $('.add-btn').addClass('visible-print');
        $('.edit-btn').removeClass('visible-print');
        $('.cancel-btn').removeClass('visible-print');
        editCategory();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "edit",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                if (response.success) {
                    $('#edit-category input[name=name]').val(response.category.name);
                    $('#edit-category input[name=slug]').val(response.category.term_slug);
                    $('#edit-category input[name=categoryId]').val(response.category.id);
                    $('#edit-category select[name=parent_category]').val(response.category.parent_category);
                    $('#edit-category textarea[name=desc]').val(response.category.description);

                }else{
                    toastr.error(response.message);
                    categoriesDataTable.ajax.reload();
                }
            }
        });

    });

    // Toastr Options
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

})
