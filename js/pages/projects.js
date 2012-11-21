jQuery(document).ready(function(){
    jQuery('.dropdown-toggle').dropdown();
});
function showModifyModal(project_hash) {
    $.ajax({
        url: ajax_url,
        data: "todo=project_modify_data&hash="+$.trim(project_hash),
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

function addProjectModal() {
    $.ajax({
        url: ajax_url,
        data: "todo=project_create",
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

function getCompetitorStats(hash) {
    if(!hash) {
        return;
    }
    $.ajax({
        url: ajax_url,
        data: "todo=get_competitor_stats&hash="+hash,
        type: "get",
        async: false,
        beforeSend: function(){
        },
        success: function(data_return){
            jQuery('#competitor_overview').html(data_return);
        }
    });
}