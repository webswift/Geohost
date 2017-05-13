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
            url: '/geoconfigs/getlist/',
            data: { geohost_id: geohost_id, _token: CSRF_TOKEN },
            success: function( msg ) {
                var option;
                var options = [];
                var geoconfigs = msg.data;

                var dropdown = $("#geoconfig_id.form-control");

                // options.push($('<option>').text('Select a GeoConfig  ').val(0));

                $.each(geoconfigs, function (ix, data) {
                    option = $('<option>').text(data.value).val(data.key);

                    options.push(option);
                });

                dropdown.html(options);

                for (var i=0; i < geoconfigs.length; i++)
                    options[geoconfigs[i].key] = geoconfigs[i].value;
            }
        });
    });
});