function showModifyCompetitorModal(id, hash) {
    if(!id) {
        return;
    }
    $.ajax({
        url: ajax_url,
        data: "todo=project_competitor_modify&id="+$.trim(id)+"&hash="+hash,
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

function addProjectCompetitorModal(hash) {
    $.ajax({
        url: ajax_url,
        data: "todo=project_competitor_create&hash="+hash,
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}