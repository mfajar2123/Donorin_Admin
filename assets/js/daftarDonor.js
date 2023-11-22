$(document).ready(function() {
    var donorTable = $('#donorTable').DataTable({
        
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: 'fetch_donordata.php',
            type: 'POST'
        },
        "columns": [
            {"data": "id"},
            {"data": "nik"},
            {"data": "nama"},
            {"data": "darah"},
            {"data": "alamat"},
            {"data": "no"},
            {"data": "lokasi"},
            {"data": "jadwal"},
            {"data": "status"},
            {
                "data": null,
                "render": function (data, type, row) {
                    if (data.status === 'Selesai') {
                        return '<span class="badge bg-success">Selesai</span>';
                    } else if (data.status === 'Gagal') {
                        return '<span class="badge bg-danger">Gagal</span>';
                    } else {
                        return '<button class="btn btn-sm btn-accept" data-id="' + row.id + '">Accept</button> ' +
                               '<button class="btn btn-sm btn-reject" data-id="' + row.id + '">Reject</button>';
                    }
                }
            }
        ]
    });

    // Fungsi untuk menerima atau menolak permintaan donor
    $('#donorTable').on('click', '.btn-accept', function() {
        var id = $(this).data('id');

        // Validasi menggunakan SweetAlert2
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menyelesaikan permintaan ini.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesai!'
        }).then((result) => {
            if (result.isConfirmed) {
                updateStatus(id, 'accept');
            }
        });
    });

    $('#donorTable').on('click', '.btn-reject', function() {
        var id = $(this).data('id');

        // Validasi menggunakan SweetAlert2
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menolak permintaan ini.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Tolak!'
        }).then((result) => {
            if (result.isConfirmed) {
                updateStatus(id, 'reject');
            }
        });
    });

    // Fungsi untuk mengirim permintaan AJAX
    function updateStatus(id, action) {
        $.ajax({
            url: 'update_status.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                action: action
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status berhasil diperbarui.'
                    }).then(() => {
                        donorTable.ajax.reload(); // Auto-refresh tabel
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal memperbarui status.'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Gagal memperbarui status.'
                });
            }
        });
    }
});
