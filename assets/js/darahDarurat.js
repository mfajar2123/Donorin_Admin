var daruratTable;

$(document).ready(function() {
    daruratTable = $('#daruratTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: 'fetch_daruratdata.php',
            type: 'POST'
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "nama"
            },
            {
                "data": "gol_darah"
            },
            {
                "data": "deskripsi"
            },
            {
                "data": "status"
            },
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
    $.ajax({
        url: 'fetch_rspmidata.php', // Replace with your endpoint to fetch rspmi data
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Assuming response is an array of names
            var tes = response.data; // Akses data terlebih dahulu
            console.log(tes);
            var names = tes.map(function(item) {
                return item.nama; // Ambil nama dari setiap item di dalam data
            });
            console.log(names); // Cetak names
            var selectOptions = '';
            names.forEach(function(names) {
                selectOptions += '<option value="' + names + '">' + names + '</option>';
            });
            $('#namaSelect').html(selectOptions);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    // Submit form handling (add data)
    $('#addDataForm').submit(function(e) {
        e.preventDefault();
        // Handle form submission here, use AJAX to send data to server
        var nama = $('#namaSelect').val();
        var golDarah = $('#golDarahSelect').val();
        var deskripsi = $('#deskripsiTextarea').val();

        // Use AJAX to send form data to server
        $.ajax({
            url: 'createDarahDarurat.php', // Replace with your endpoint to add data
            type: 'POST',
            data: {
                nama: nama,
                gol_darah: golDarah,
                deskripsi: deskripsi
            },
            success: function(response) {

                // You can update table or show a success message
                $('#addDataModal').modal('hide'); // Hide the modal
                $("#daruratTable").DataTable().ajax.reload()

                // Show success alert using SweetAlert2
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data has been created',
                    showConfirmButton: false,
                    timer: 1500
                })

            },
            error: function(xhr, status, error) {
                console.error(error);
                // Handle error response (if any)
            }
        });
    });
});

 // Fungsi untuk menerima atau menolak permintaan darurat
    $('#daruratTable').on('click', '.btn-accept', function() {
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

    $('#daruratTable').on('click', '.btn-reject', function() {
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
        url: 'update_status_darurat.php',
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
                    daruratTable.ajax.reload(); // Auto-refresh tabel
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