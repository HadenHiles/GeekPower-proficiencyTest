$(function() {
    // init the datepicker for start_date
    $("#start_date").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        onSelect: function (date) {
            var end_date = $('#end_date');
            var startDate = $(this).datepicker('getDate');
            var minDate = $(this).datepicker('getDate');
            startDate.setDate(startDate.getDate());

            //sets end_date minDate to at least one day past start_date
            end_date.datepicker('option', 'minDate', startDate);
            $(this).datepicker('option', 'minDate', minDate);
        }
    });

    // init the datepicker for end_date
    $('#end_date').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});