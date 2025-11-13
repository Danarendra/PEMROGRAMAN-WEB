<?php
class EmployeeModel {
    private $conn;
    private $table_name = "employees";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllEmployees() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createEmployee($data) {
        $query = "INSERT INTO " . $this->table_name . " (first_name, last_name, email, department, position, salary, hire_date) VALUES (:first_name, :last_name, :email, :department, :position, :salary, :hire_date)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":first_name", $data['first_name']);
        $stmt->bindParam(":last_name", $data['last_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":department", $data['department']);
        $stmt->bindParam(":position", $data['position']);
        $stmt->bindParam(":salary", $data['salary']);
        $stmt->bindParam(":hire_date", $data['hire_date']);
        
        return $stmt->execute();
    }
    
    public function updateEmployee($id, $data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET first_name = :first_name, last_name = :last_name,
                      email = :email, department = :department,
                      position = :position, salary = :salary, hire_date = :hire_date
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $data['first_name']);
        $stmt->bindParam(":last_name", $data['last_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":department", $data['department']);
        $stmt->bindParam(":position", $data['position']);
        $stmt->bindParam(":salary", $data['salary']);
        $stmt->bindParam(":hire_date", $data['hire_date']);
        
        return $stmt->execute();
    }
    
    public function deleteEmployee($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    
    public function getEmployeeById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getEmployeeSummary() {
        $query = "SELECT * FROM employee_summary";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getDepartmentStats() {
        $query = "SELECT * FROM department_stats";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getDashboardSummary() {
        $query = "SELECT * FROM dashboard_summary";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function refreshDashboard() {
        $query = "REFRESH MATERIALIZED VIEW dashboard_summary";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }
}
?>