$( document ).ready(function() {
    $(".table").on("click", ".accept_request", function () {
        let data = {id: $(this).data('id'), status: $(this).data('status')};
        updateUserStatus(data);
    });
    $(".table").on("click", ".reject_request", function () {
        let data = {id: $(this).data('id'), status: $(this).data('status')};
        updateUserStatus(data);
    });
});

function updateUserStatus(data) {
    $.ajax({
        url: urlUserRequestUpdate,
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}