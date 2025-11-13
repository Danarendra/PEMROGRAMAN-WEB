<?php
include 'views/header.php';
?>

<h2>Ringkasan Karyawan</h2>
<p style="color:#666;margin-bottom:1rem;">Data ini dihitung dengan fungsi
<code>COUNT()</code>, <code>SUM()</code>, dan <code>AVG()</code>.</p>

<?php
$query = "SELECT 
             COUNT(*) AS total_employees,
             SUM(salary) AS total_salary,
             ROUND(AVG(EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date))), 2) AS avg_years
           FROM employees;";
$stmt = $db->query($query);
$overview = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="dashboard-cards">
    <div class="card">
        <h3>Total Karyawan</h3>
        <div class="number"><?php echo $overview['total_employees']; ?></div>
    </div>
    <div class="card">
        <h3>Total Gaji per Bulan</h3>
        <div class="number">Rp <?php echo number_format($overview['total_salary'], 0, ',', '.'); ?></div>
    </div>
    <div class="card">
        <h3>Rata-rata Masa Kerja</h3>
        <div class="number"><?php echo $overview['avg_years']; ?> tahun</div>
    </div>
</div>

<?php include 'views/footer.php'; ?>
