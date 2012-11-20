jQuery(document).ready(function(){
    $('.popup_focus').popover({
        'trigger': 'focus'
    });
    $('.popup_hover').popover({
        trigger: 'hover',
        delay: { show: 0, hide: 2000 }
    });
    $('.popup_hover_simple').popover({
        trigger: 'hover'
    });
    $('.popup_hover_simple_click').popover({
        trigger: 'click'
    });
    $('.popup_hover_simple_left').popover({
        trigger: 'hover',
        placement: 'left'
    });
});