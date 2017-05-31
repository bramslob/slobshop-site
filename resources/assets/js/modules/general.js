export default class {

    constructor($modal_container) {
        this.$modal_container = $modal_container;
        this.details_sliding = false;
    }

    closeModal() {
        this.$modal_container
            .find('.modal')
            .removeClass('is-active');

        this.$modal_container.off();
    }

    showDetails(element) {
        if (this.details_sliding !== false) {
            return false;
        }

        this.details_sliding = true;

        let $element = $(element),
            $parent = $element.parents('.card'),
            $arrow = $element.find('.icon'),
            $details = $parent.find('.card-footer'),
            self = this;

        if ($parent.data('openDetails') !== true) {

            $arrow.addClass('rotated');
            $details.slideDown(200, function () {
                $parent.data('openDetails', true);
                self.details_sliding = false;
            });

            return;
        }

        $arrow.removeClass('rotated');
        $details.slideUp(200, function () {

            $parent.data('openDetails', false);
            self.details_sliding = false;
        });
    }

    showFormModal(url) {

        let self = this;

        $.ajax(
            {
                method: 'GET',
                url: url,
                dataType: 'html'
            })
            .done(function (response) {
                self.$modal_container
                    .html(response);

                self.$modal_container
                    .find('.modal')
                    .addClass('is-active');

                self.$modal_container.on('click', '.modal-background', function() {
                    self.closeModal();
                })
            });
    }
}