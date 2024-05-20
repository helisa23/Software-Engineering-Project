<?php
use PHPUnit\Framework\TestCase; 

class FormValidationTest extends TestCase {
    protected $formUrl;

    protected function setUp(): void {
        $this->formUrl = 'http://localhost/Pet-Website/app/process_form.php'; // Update with your form URL
    }
 

    // Test form submission with missing owner email
    public function testMissingOwnerEmail() {
        $postData = [
            'appointment-type' => 'medical-appt',
            'pet-type' => 'Dog',
            'pet-name' => 'Buddy',
            'owner-name' => 'John Doe',
            'owner-number' => '1234567890',
            'appointment-date' => '2024-05-01',
            'appointment-time' => '14:00'
        ];

        $response = $this->submitForm($postData);

        $this->assertStringContainsString('Email is required', $response);
    }

    // Test form submission with missing owner phone number
    public function testMissingOwnerNumber() {
        $postData = [
            'appointment-type' => 'medical-appt',
            'pet-type' => 'Dog',
            'pet-name' => 'Buddy',
            'owner-name' => 'John Doe',
            'owner-email' => 'john@example.com',
            'appointment-date' => '2024-05-01',
            'appointment-time' => '14:00'
        ];

        $response = $this->submitForm($postData);

        $this->assertStringContainsString('Phone number is required', $response);
    }

    public function testMissingPetType()
    {
        // Simulate form submission with missing pet type
        $formData = [
            'appointment-type' => 'medical-appt',
            'pet-name' => 'Buddy',
            'owner-name' => 'John Doe',
            'owner-number' => '1234567890',
            'owner-email' => 'john@example.com',
            'appointment-date' => '2024-05-01',
            'appointment-time' => '12:00',
        ];

        $response = $this->submitForm($formData);

        // Assert that the response contains the expected error message
        $this->assertStringContainsString('Pet type is required', $response);
    }

    public function testMissingPetName()
    {
        // Simulate form submission with missing pet name
        $formData = [
            'appointment-type' => 'medical-appt',
            'pet-type' => 'Dog',
            'owner-name' => 'John Doe',
            'owner-number' => '1234567890',
            'owner-email' => 'john@example.com',
            'appointment-date' => '2024-05-01',
            'appointment-time' => '12:00',
        ];

        $response = $this->submitForm($formData);

        // Assert that the response contains the expected error message
        $this->assertStringContainsString('Pet name is required', $response);
    }

    public function testMissingOwnerName()
    {
        // Simulate form submission with missing owner name
        $formData = [
            'appointment-type' => 'medical-appt',
            'pet-type' => 'Dog',
            'pet-name' => 'Buddy',
            'owner-number' => '1234567890',
            'owner-email' => 'john@example.com',
            'appointment-date' => '2024-05-01',
            'appointment-time' => '12:00',
        ];

        $response = $this->submitForm($formData);

        // Assert that the response contains the expected error message
        $this->assertStringContainsString('Owner name is required', $response);
    } 
 

    // Function to simulate form submission and return response
    protected function submitForm($postData) {
        $ch = curl_init($this->formUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
