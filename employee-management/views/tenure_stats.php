<?php
include 'views/header.php';
?>

<h2>Statistik Masa Kerja Karyawan</h2>
<p style="color:#666;margin-bottom:1rem;">Menggunakan fungsi
<code>COUNT()</code> dan <code>CASE WHEN</code> untuk kategori masa kerja.</p>

<?php
$query = "SELECT 
    CASE 
        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) < 1 THEN 'Junior'
        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) BETWEEN 1 AND 3 THEN 'Middle'
        ELSE 'Senior'
    END AS level,
    COUNT(*) AS total
  FROM employees
  GROUP BY level
  ORDER BY level;";
$stmt = $db->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="data-table">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Jumlah Karyawan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><strong><?php echo $row['level']; ?></strong></td>
            <td><?php echo $row['total']; ?> orang</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>