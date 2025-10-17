<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $success = array();
    $extensions = array("jpg", "jpeg", "png", "gif");
    $maxFileSize = 2097152;
    
    $targetDirectory = "documents/";
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $totalFiles = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "File $file_name: Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, atau GIF.";
            continue;
        }

        if ($file_size > $maxFileSize) {
            $errors[] = "File $file_name: Ukuran file tidak boleh lebih dari 2 MB.";
            continue;
        }

        $imageInfo = getimagesize($file_tmp);
        if ($imageInfo === false) {
            $errors[] = "File $file_name: Bukan file gambar yang valid.";
            continue;
        }
        
        $targetFile = $targetDirectory . $file_name;
        if (move_uploaded_file($file_tmp, $targetFile)) {
            $success[] = "File $file_name berhasil diunggah.";
            $success[] = "<img src='$targetFile' width='200' style='margin: 10px;'>";
        } else {
            $errors[] = "File $file_name: Gagal mengunggah file.";
        }
    }
    
    if (!empty($success)) {
        echo "<div style='color: green;'>" . implode("<br>", $success) . "</div>";
    }
    
    if (!empty($errors)) {
        echo "<div style='color: red;'>" . implode("<br>", $errors) . "</div>";
    }
    
    if (empty($errors) && empty($success)) {
        echo "Tidak ada file yang diupload.";
    }
}
?>