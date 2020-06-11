$(function() {
    $('.jcarousel').jcarousel({
        list: '.jcarousel-list',
        items: '.jcarousel-item'
    });
    $('.jcarousel-prev').jcarouselControl({ target: '-=1' });
    $('.jcarousel-next').jcarouselControl({ target: '+=1' });
});

$( document ).ready(function() {
    $(document).click( function(event){
        if( $(event.target).closest(".request_form").length || $(event.target).closest(".event_button").length)
            return;
        $(".request_form").fadeOut("slow");
        event.stopPropagation();
    });

    $(".content").on('click', '.event_button', function () {
        let id = $(this).attr('data-id');
        let title = $(this).closest('.event_manager').siblings('.event_title').text();
        $('.request_form').show();
        $('.request_form').find('.head_text').text(title);
        $('.request_form').find('.request_button').attr('data-id', id);
    });

    $(".request_form").on("click", ".request_button", function () {
        let data = {
            event_id: $(this).data('id'),
            user_name: $(this).closest('.request_form_body').find('#name').val(),
            user_email: $(this).closest('.request_form_body').find('#e_mail').val()
        };
        console.log(urlUserRequestCreate);
        $.ajax({
            url: urlUserRequestCreate,
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('.request_form').hide();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
});