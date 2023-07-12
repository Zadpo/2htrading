var parents = '.ui-button, .ui-nav-toggler, .ui-nav-menu-item';

$(document).on('click', parents, function(e) {
    
    parent = $(this);

    if(!parent.hasClass('disabled')) {

        var diameter = Math.max(parent.outerWidth(), parent.outerHeight());
        var radius = diameter / 2;

        var x = e.clientX - (parent.offset().left + radius);
        var y = e.clientY - ((parent.offset().top - $(document).scrollTop()) + radius);
    
        var ripple = document.createElement('span');
        ripple.setAttribute('class', 'ripple');
        ripple.style.width = `${diameter}px`;
        ripple.style.height = `${diameter}px`;
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
    
        parent.append(ripple);
        
        setTimeout(function() {
            ripple.remove();
        }, 1000);

    }

});
