/**
 * Created by Sergey on 12/8/2016.
 */
$(document).ready(function() {
    $('#geohost_id').on('change', function(e) {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        e.preventDefault();

        var geohost_id = $('#geohost_id.form-control').val();
        var CSRF_TOKEN = $('input[name=_token]').val();

        $.ajax({
            type: "POST",
            url: '/statement/getlist/',
            data: { geohost_id: geohost_id, _token: CSRF_TOKEN },
            success: function( msg ) {
                var option;
                var options = [];
                var statements = msg.data;

                var dropdown = $(".statement_selector");

                // options.push($('<option>').text('Select a Statement  ').val(0).hide());

                $.each(statements, function (ix, data) {
                    option = $('<option>').text(data.value).val(data.key);

                    options.push(option);
                });

                dropdown.html(options);

                for (var i=0; i < statements.length; i++)
                    options[statements[i].key] = statements[i].value;
            }
        });
    });



    // $('#statement_id').on('change', function(e) {
    //     $.ajaxSetup({
    //         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    //     });
    //
    //     e.preventDefault();
    //
    //     var statement_id = $('#statement_id.form-control').val();
    //
    //     var CSRF_TOKEN = $('input[name=_token]').val();
    //
    //     $.ajax({
    //         type: "POST",
    //         url: '/statement/getitem/',
    //         data: { statement_id: statement_id, _token: CSRF_TOKEN },
    //         success: function( msg ) {
    //             var statement = msg.data;
    //
    //             $("#amount.form-control").val(statement.amount);
    //             $("#currency.form-control").val(statement.currency);
    //         }
    //     });
    // });

});