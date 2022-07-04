
$(document).ready(function () {




    // const from = $('.from').val();

    // $('.from').change(function () {
    //     var from = $('.from').data('date');
    //     console.log(from);
    // });

    // $('#timeTo').change(function () {
    //     end = new Date($('#timeTo').val());
    // });

    // var duration = end - start;

    $(".time").on("dp.change", function (e) {
        // get values
        var valuestart = $('#timeFrom').val();
        var valuestop = $('#timeTo').val();

        var start = moment(valuestart, 'HH:mm');
        var stop = moment(valuestop, 'HH:mm');
        console.log(valuestart);

        var diff = moment(stop, "HH:mm") - moment(start, "HH:mm");

        $("#duration").val(diff / 60000);
    });

    // $('#duration').val(duration);



});