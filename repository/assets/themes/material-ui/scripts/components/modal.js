var modals = $('.ui-modal');
var togglers = $('.ui-modal-toggler');

if(modals.length > 0) {
    modals.each(function() {
        var modal = $(this);
        modal.prop('state', 'hidden');
        $(document).keydown(function(event) {
            if(event.keyCode == 27) { 
                modal.prop('state', 'hidden');
                modal.removeClass('shown');
            }
        });
        var closeButton = modal.find('.ui-modal-close');
        closeButton.on('click', function(e) {
            modal.prop('state', 'hidden');
            modal.removeClass('shown');
        });
    });
}

$(document).on('click', '.ui-modal-toggler', function() {
    var toggler = $(this);
    var modalID = toggler.attr('data-open-modal');
    var modal = $(modalID);
    if(modal.length > 0)
        modal.prop('state', 'shown');
        modal.addClass('shown');
});