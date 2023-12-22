$(document).ready(function() {
    $('#rspmiTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: 'fetch_rspmidata.php',
            type: 'POST'
        },
        "columns": [
            {"data": "id"},
            {"data": "nama"},
            {"data": "alamat"},
            {"data": "deskripsi"},
            {
                "data": "foto",
                "render": function (data) {
                    return '<img src="' + data + '" class="rspmi-img" alt="RSPMI Image">';
                }
            },
            
        ]
    });
});