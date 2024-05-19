<?php
use PHPUnit\Framework\TestCase; 

include 'app/process_form.php';

class ProcessFormTest extends TestCase {

    // Test database connection
    public function testDatabaseConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "pet_care_vet";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $this->assertTrue($conn->connect_error === null);
    }

}
