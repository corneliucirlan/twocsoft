// Slider page
var $selectButton = $('#select-slider-photos');
var mediaUploaderSettings = {
    title       : 'Choose slider photos',
    buttonText  : 'Select photos',
    multiple    : true,
};
var $photosContainer = $('.slider-photos');
var $photosInput = $('#slider_photos');
ccwpChoosePhotos($selectButton, mediaUploaderSettings, $photosContainer, $photosInput);

// Media page
var $selectButton = $('#select-default-featured');
var mediaUploaderSettings = {
    title       : "Choose default featured image",
    buttonText  : "Select featured image",
    multiple    : false,
};
var $photosContainer = $('.default-post-image-container');
var $photosInput = $('#featured_image_default');
ccwpChoosePhotos($selectButton, mediaUploaderSettings, $photosContainer, $photosInput);

function ccwpChoosePhotos($selectButton, mediaUploaderSettings, $photosContainer,  $photosInput)
{
    var mediaUploader;

    // Get if multiple files
    var multipleFiles = mediaUploaderSettings.multiple;

    // Trigger media uploader
    $selectButton.on('click', function(e) {

        // Prevent default behavior
        e.preventDefault();

        // If mediaUploader already defined, open it
        if (mediaUploader)
        {
            mediaUploader.open();
            return;
        }

        // Define mediaUploader
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title   : mediaUploaderSettings.title,
            button  : {
                text    : mediaUploaderSettings.buttonText
            },
            multiple: mediaUploaderSettings.multiple
        });

        // Execute when selecting photos
        mediaUploader.on('select', function() {

            // Get all selected media
            var attachment = mediaUploader.state().get('selection').toJSON();

            // Keep all IDs if multiple files
            var ids;

            // Get all IDs if multiple files
            if (multipleFiles)
                ids = $photosInput.val().split(',');

            if (!multipleFiles)
                $photosContainer.html('');

            // Add each photo to the DOM
            $.each(attachment, function() {

                // Add ID to array if multiple files
                if (multipleFiles)
                    ids.push(this.id);

                // Add photo to DOM
                $photosContainer.append(
                    '<div class="slider-photo">' +
                        '<img src="' + this.sizes.thumbnail.url + '" />' +
                        '<div class="controls">' +
                            '<a data-id="' + this.id + '" class="delete-photo"><span class="dashicons dashicons-trash"></span></a>' +
                        '</div>' +
                    '</div>'
                );
            });

            // Modify input value
            if (multipleFiles) $photosInput.val(ids.toString());
                else $photosInput.val(attachment[0].id);
        });

        // Open mediaUploader
        mediaUploader.open();
    });

    // Mouse over photo
    $photosContainer.on('mouseover', '.slider-photo', function() {
        $(this).find('.dashicons-trash').addClass('active');
    });

    // Mouse out
    $photosContainer.on('mouseleave', '.slider-photo', function() {
        $(this).find('.dashicons-trash').removeClass('active');
    });

    // Delete photo from DOM
    $photosContainer.on('click', '.delete-photo', function(e) {

        // Prevent default behavior
        e.preventDefault();

        // Get ID of current photo
        var deleteID = $(this).attr('data-id');

        // Multiple images
        if (multipleFiles)
            var ids = $photosInput.val().split(',');

        // Remove photo from DOM
        $(this).parents('.slider-photo').remove();

        // Remove photo ID from photosInput
        if (multipleFiles)
                {
                    ids.splice($.inArray(deleteID, ids), 1);
                    $photosInput.val(ids.toString());
                }
            else
                $photosInput.val('');
    });
}
