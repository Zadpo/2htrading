var inputFiles = $('#uploadPhoto');

inputFiles.each(function() {
    var inputFile = $(this);
    inputFile.on('change', function(e) {
        var imageContainer = $('.ui-input-image-container');
        var image = $('.ui-input-image-container-wrapper-image');
        image.attr('src', URL.createObjectURL(e.target.files[0]));
        image.onload = function() {
            URL.revokeObjectURL(output.src);
        }
        imageContainer.addClass('uploaded');
    });
});

$('.ui-input-image-container-close').each(function() {
    $(this).on('click', function() {
        inputFiles.each(function() {
            var inputFile = $(this);
            inputFile.val('');
        });
        var imageContainer = $('.ui-input-image-container');
        imageContainer.removeClass('uploaded');
    });
});