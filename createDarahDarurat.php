<?php
    // Include the database configuration file
    include 'config.php';

    // Check if form data is received via POST method
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $nama = $_POST['nama'];
        $gol_darah = $_POST['gol_darah'];
        $deskripsi = $_POST['deskripsi'];

        // Prepare an insert statement
        $sql = "INSERT INTO darahdarurat (nama, gol_darah, deskripsi) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nama, $param_gol_darah, $param_deskripsi);

            // Set parameters
            $param_nama = $nama;
            $param_gol_darah = $gol_darah;
            $param_deskripsi = $deskripsi;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: darahDarurat.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
?>
