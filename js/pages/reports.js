function addEmail(obj) {
    var html = '<div><input type="email" name="recipient_emails[]"> <a href="javascript:;" onclick="jQuery(this).parent().remove();">remove</a></div>';
    jQuery(obj).before(html);
}

$(function() {
    $( "#sortable" ).sortable({handle:'a.helper'});
});