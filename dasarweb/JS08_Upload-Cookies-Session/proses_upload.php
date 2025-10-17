<?php
$targetDirectory = "documents/";
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

$maxFileSize = 5 * 1024 * 1024;

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);
    $uploadedCount = 0;
    
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $targetFile = $targetDirectory . $fileName;
        
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "File $fileName bukan gambar yang valid. Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.<br>";
            continue;
        }
        
        if ($fileSize > $maxFileSize) {
            echo "File $fileName terlalu besar. Ukuran maksimum adalah 5MB.<br>";
            continue;
        }
        
        $imageInfo = getimagesize($_FILES['files']['tmp_name'][$i]);
        if ($imageInfo === false) {
            echo "File $fileName bukan file gambar yang valid.<br>";
            continue;
        }

        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
            echo "File $fileName berhasil diunggah.<br>";

            echo "<img src='$targetFile' width='200' style='margin: 10px;'><br>";
            
            $uploadedCount++;
        } else {
            echo "Gagal mengunggah file $fileName.<br>";
        }
    }
    
    echo "<br>Total file yang berhasil diunggah: $uploadedCount dari $totalFiles file.";
} else {
    echo "Tidak ada file yang diunggah.";
}
?>