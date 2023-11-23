CREATE TABLE loan_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_name VARCHAR(255) NOT NULL,
    applicant_email VARCHAR(255) NOT NULL,
    filled_by_staff BOOLEAN NOT NULL DEFAULT 0
);
