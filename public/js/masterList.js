
$(document).ready(function () {

    // // Modal event handler
    // var clickedCard = $(".card-box");
    // var detailModal = $("#details");

    // clickedCard.click(function () {
    //     detailModal.modal('show');
    // })

    // Date picker
    dateConfig = {
        enableTime: true,
        dateFormat: "Y-m-d",
        altInput: true
    }

    $("input[type=date]").flatpickr(dateConfig);
});

