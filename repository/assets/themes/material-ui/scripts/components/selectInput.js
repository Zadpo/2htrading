var selectInputs = $('.ui-select');

var uniqueID = 0;

selectInputs.each(function() {

    var selectInput = $(this);
    
    if(!selectInput.hasClass('disabled'))
        selectInput.attr('tabindex', '0');
    
    var selectInputToggler = document.createElement('p');
    selectInputToggler.setAttribute('class', 'ui-select-toggler '+selectInput.attr('name'));
    selectInputToggler.innerHTML = selectInput.attr('aria-label');
    
    selectInput.append(selectInputToggler);
    
    var selectInputToggler = selectInput.find('.ui-select-toggler');

    selectInputToggler.after('<span class="ui-select-icon"></span>');

    var selectInputIcon = selectInput.find('.ui-select-icon');
    selectInputIcon.html('<i class="far fa-chevron-down"></i>');

    selectInputIcon.after('<div class="ui-select-menu"></div>');
    var selectInputMenu = selectInput.find('.ui-select-menu');
    
    var radioItems = selectInput.find('[type=radio]');
    
    radioItems.each(function() {
        
        var radioItem = $(this);

        if(radioItem.is(':checked'))
            selectInputMenu.append(
                '<div class="ui-select-menu-item">'+
                '   <input type="radio" name="'+selectInput.attr('name')+'" id="'+selectInput.attr('name')+uniqueID+'" value="'+radioItem.val()+'" checked requred>'+
                '   <label for="'+selectInput.attr('name')+uniqueID+'">'+radioItem.attr('clone')+'</label>'+
                '</div>'
                );
        else
            selectInputMenu.append(
                '<div class="ui-select-menu-item">'+
                '   <input type="radio" name="'+selectInput.attr('name')+'" id="'+selectInput.attr('name')+uniqueID+'" value="'+radioItem.val()+'" required>'+
                '   <label for="'+selectInput.attr('name')+uniqueID+'">'+radioItem.attr('clone')+'</label>'+
                '</div>'
                );

        radioItem.remove();

        uniqueID++;

    });

    var selectMenuItems = selectInputMenu.find('.ui-select-menu-item');
    var ariaLabel = selectInput.attr('aria-label');

    if(typeof ariaLabel == 'undefined' || ariaLabel == false)
        selectInputToggler.html('-- Please Select --');

    selectMenuItems.each(function() {
        
        var selectMenuItem = $(this);
        var radioItem = selectMenuItem.find('[type=radio]');
        var radioLabel = selectMenuItem.find('label');

        if(radioItem.is(':checked'))
            selectInputToggler.html(radioLabel.html());

        radioLabel.on('click', function() {
            selectInputToggler.html(radioLabel.html());
            selectInput.blur();
        });
        
    });

});
