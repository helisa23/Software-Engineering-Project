CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_date DATE,
    appointment_time TIME,
    appointment_type VARCHAR(255),
    email VARCHAR(255),
    owner_name VARCHAR(255),
    pet_name VARCHAR(255),
    pet_type VARCHAR(255),
    phone_no VARCHAR(20)
);