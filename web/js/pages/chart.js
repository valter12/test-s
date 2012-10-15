function getProjectKeywords(project_hash, keyword_id) {
    $.ajax({
        url: ajax_url,
        data: "todo=get_project_keywords&hash="+project_hash+'&keyword_id='+keyword_id,
        type: "get",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#keywords_placeholder').html(data_return);
        }
    });
}

function getKeywordCompetitors(hash) {
    if(!hash) {
        return;
    }
    $.ajax({
        url: ajax_url,
        data: "todo=get_project_keyword_competitors&hash="+hash,
        type: "get",
        async: false,
        beforeSend: function(){
        },
        success: function(data_return){
            $('#competitor_list_placeholder').html(data_return);
        }
    });
}