function showModifyModal(category_id) {
    $.ajax({
        url: ajax_url,
        data: "todo=project_category_modify&category_id="+$.trim(category_id),
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

function addProjectCategoryModal() {
    $.ajax({
        url: ajax_url,
        data: "todo=project_category_create",
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}