<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen Info</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        $Dosen = [
            'Nama' => 'Elok Nur Hamdana',
            'Domisili' => 'Malang',
            'Jenis Kelamin' => 'Perempuan'
        ];
    ?>

    <table>
        <caption>Data Dosen</caption>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php
            foreach ($Dosen as $key => $value) {
                echo "<tr>
                        <td>$key</td>
                        <td>$value</td>
                      </tr>";
            }
        ?>
    </table>
</body>
</html>