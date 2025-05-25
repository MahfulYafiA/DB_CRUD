<?php

include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = $_GET['kodeMK'];
    $query = "SELECT * FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $kodeMK = $data['kodeMK'];
    $namaMK = $data['namaMK'];
    $sks = $data['sks'];
    $jam = $data['jam'];

} else {
    header("Location: viewMK.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <style>
        h1 {
            text-align: center;
        }

        .container {
            width: 00px;
            margin: auto;
        }
    </style>
</head>

<body>
    <h1>Edit Data Mata Kuliah</h1>
    <div class="container">
        <form action="proses_editMK.php" method="POST">
            <table>
                <tr>
                    <td>Kode Mata Kuliah</td>
                    <td><input type="text" name="kodeMK" value="<?php echo $kodeMK; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Mata Kuliah</td>
                    <td><input type="text" name="namaMK" value="<?php echo $namaMK; ?>"></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input type="text" name="sks" value="<?php echo $sks; ?>"></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td><input type="time" name="jam" value="<?php echo $jam; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="edit" value="Edit"></td>
                </tr>
            </table>
        </form>
</body>

</html>