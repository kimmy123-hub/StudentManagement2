<?php
namespace Cualbar\StudentManagement2\Model;

use Cualbar\StudentManagement2\Core\Crud;
use Cualbar\StudentManagement2\Core\Database;

class StudentModel extends Database implements Crud {
   
    public $id;
    public $fullname;
    public $yearlevel;
    public $course;
    public $section;


    public function __construct() {
        parent::__construct();
        $this->id = "";
        $this->fullname = "";
        $this->yearlevel = "";
        $this->course = "";
        $this->section = "";
    }


    public function create() {
        try {
            $sql = "INSERT INTO students (id, name, year_level, course, section)
             VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $this->id, $this->fullname, $this->yearlevel, $this->course, $this->section);
            $stmt->execute();
        } catch (\Exception $e) {
            echo "Create Error: " . $e->getMessage();
        }
    }

   
    public function read() {

        try {

            $sql = "SELECT * FROM students";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Exception $e) {
            echo "Read Error: " . $e->getMessage();
            return [];
        }
    }

    
    
    public function update() {
        try {
            $sql = "UPDATE students SET name = ?, year_level = ?, course = ?, section = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);

            
            $stmt->bind_param("sssss",$this->fullname, $this->yearlevel, $this->course, $this->section, $this->id );
            $stmt->execute();
        } catch (\Exception $e) {
            echo "Update Error: " . $e->getMessage();
        }
    }

    
    public function delete() {
        try {
        
            $sql = "DELETE FROM students WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $this->id);
            $stmt->execute();
        
          
        } catch (\Exception $e) {
            echo "Delete Error: " . $e->getMessage();
        }
    }
}
