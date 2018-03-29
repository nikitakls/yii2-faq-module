$(function () {
    $(".faq-hint").on("click", function (e) {
        e.preventDefault();
        var url = '/faq/hint/get';
        $.ajax({
            url: url,
            type: "GET",
            data: {'code': $(e.currentTarget).data('code')},
            success: function (data) {
                var modal = $('#hint-modal');
                if (modal.length) {
                    modal.html($(data).find('.modal-dialog'));
                } else {
                    $('body').append(data);
                    modal = $('#hint-modal');
                }
                modal.modal({show: true});
            }
        });
    });
});
