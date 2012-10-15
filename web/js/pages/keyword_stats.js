function addCompetitor(competitor_id) {
    if($("#competitors option").length == 0) {
        return;
    }
    if(competitor_id) {
        if($("#competitors option[value='"+competitor_id+"']").length == 0) {
            return;
        }
        var competitor_name = $("#competitors option[value='"+competitor_id+"']").text();
    } else {
        var competitor_id = $('#competitors').val();
        var competitor_name = $("#competitors option:selected").text();
    }
    var html = '<span class="label label-info" style="margin-left:5px;"><span class="option_id" rel="'+competitor_id+'"></span><input type="hidden" value="'+competitor_id+'" name="competitor_ids[]"><span class="option_text">'+competitor_name+'</span> <a href="javascript:;" onclick="removeCompetitor(this)"><i class="icon-remove-sign"></i></a></span>';
    $('#competitor_containter').append(html);
    $("#competitors option[value='"+competitor_id+"']").remove();
}

function removeCompetitor(obj) {
    var option_value = $(obj).parent().find('.option_id').attr('rel');
    var option_text = $(obj).parent().find('.option_text').text();
    
    $('#competitors').append('<option value="'+option_value+'">'+option_text+'</option>');
    $(obj).parent().remove();
}

function getChangesModal(id, c_id) {
    $.ajax({
        url: ajax_url,
        data: "todo=get_track_changes&track_id="+id+"&c_id="+c_id,
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

function notes(keyword_id, for_date) {
    $.ajax({
        url: ajax_url,
        data: "todo=get_record_notes&keyword_id="+keyword_id+"&for_date="+for_date,
        type: "post",
        beforeSend: function(){
        },
        success: function(data_return){
            $('#modal_placeholder').html(data_return);
            $('#modal_box').modal('show');
        }
    });
}

jQuery(document).ready(function(){
    jQuery('#legend_a').attr('data-content', jQuery('#legend_div').html());
    jQuery('.dropdown-toggle').dropdown();
});
