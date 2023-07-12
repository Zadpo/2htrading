var searchInputWrappers = $('.ui-input-search-wrapper');

searchInputWrappers.each(function() {

    var searchInputWrapper = $(this);
    var searchInput = searchInputWrapper.find('[type=text]');

    if(searchInput.length > 0) {

        var showPassword = false;
        var searchIcon = document.createElement('a');
        searchIcon.setAttribute('class', 'ui-input-search-icon');
        searchIcon.innerHTML = '<i class="far fa-search"></i>';
        searchInput.before(searchIcon);

    }

});