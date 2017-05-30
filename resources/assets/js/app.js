window.$ = window.jQuery = require('jquery');

$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function closeModal() {
    $modal_container
        .find('.modal')
        .removeClass('is-active');
}

function showDetails(element) {
    if (details_sliding !== false) {
        return false;
    }

    details_sliding = true;

    var $element = $(element),
        $parent = $element.parents('.card'),
        $arrow = $element.find('.icon'),
        $details = $parent.find('.card-footer');

    if ($parent.data('openDetails') !== true) {

        $arrow.addClass('rotated');
        $details.slideDown(200, function () {
            $parent.data('openDetails', true);
            details_sliding = false;
        });
        return;
    }

    $arrow.removeClass('rotated');
    $details.slideUp(200, function () {

        $parent.data('openDetails', false);
        details_sliding = false;
    });
}