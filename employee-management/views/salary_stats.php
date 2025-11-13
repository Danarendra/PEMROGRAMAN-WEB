<?php
include 'views/header.php';
?>

<h2>Statistik Gaji per Departemen</h2>
<p style="color:#666;margin-bottom:1rem;">Data berikut dihitung menggunakan fungsi
<code>AVG()</code>, <code>MAX()</code>, dan <code>MIN()</code> dengan <code>GROUP BY department</code>.</p>

<?php
$query = "SELECT department,
                 ROUND(AVG(salary)) AS avg_salary,
                 MAX(salary) AS max_salary,
                 MIN(salary) AS min_salary
          FROM employees
          GROUP BY department
          ORDER BY department";
$stmt = $db->query($query);
$stats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="data-table">
    <thead>
        <tr>
            <th>Departemen</th>
            <th>Rata-rata Gaji</th>
            <th>Gaji Tertinggi</th>
            <th>Gaji Terendah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stats as $row): ?>
        <tr>
            <td><strong><?php echo htmlspecialchars($row['department']); ?></strong></td>
            <td>Rp <?php echo number_format($row['avg_salary'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['max_salary'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['min_salary'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>