jQuery(document).ready(function(){
    jQuery("#register_form").validationEngine();
});

function refreshCaptcha(obj, path) {
    var rand = Math.round(Math.random()*9999999);
    obj.src = path + '?' + rand;
}