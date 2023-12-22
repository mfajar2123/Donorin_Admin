$(document).ready(function() {
    $('#userTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: 'fetch_data.php',
            type: 'POST'
        },
        "columns": [
            {"data": "id"},
            {"data": "username"},
            {"data": "password"},
            {"data": "nama"},
            {"data": "poin"}
        ]
    });
});