# AU_2021BCSE07AED469
This task involves designing, developing, and documenting a website that replicates Alliance University's official site.

# Contact Form Project

## Overview

This project implements a contact form on a website that allows users to submit their contact details and messages. The form is built using HTML and processed using PHP. Submitted data is stored in a MySQL database. This README provides an overview of the project's setup, implementation, and usage.

## Features

- User-friendly contact form
- Data processing with PHP
- Data storage in a MySQL database
- Basic validation and error handling

## Project Structure

contact-form-project/ <br>├── contact.php # HTML file with the contact form <br>├── contact_process.php # PHP script to process form submissions <br>├── footer.php # PHP file to include footer content <br>├── styles.css # CSS file for styling <br>└── README.md # This README file


## Setup Instructions

### 1. Database Setup

1. **Create a Database:**
   Create a MySQL database named `contact_form`.

2. **Create a Table:**
   Execute the following SQL query to create the `messages` table:

   ```sql
   CREATE TABLE messages (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(50) NOT NULL,
       email VARCHAR(50) NOT NULL,
       message TEXT NOT NULL,
       reg_date TIMESTAMP
   );

## 2. PHP Configuration
**Configure Database Connection:**
Update the database connection settings in contact_process.php:

   
          <?php
          // Database configuration
          $servername = "localhost";  // Replace with your database server
          $username = "root";         // Replace with your database username
          $password = "";             // Replace with your database password
          $dbname = "contact_form";   // Replace with your database name
          
          // Create a connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          // Check the connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          // Retrieve form data
          $name = htmlspecialchars($_POST['name']);
          $email = htmlspecialchars($_POST['email']);
          $message = htmlspecialchars($_POST['message']);
          
          // Prepare and bind
          $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
          $stmt->bind_param("sss", $name, $email, $message);
          
          // Execute the statement
          if ($stmt->execute()) {
              echo "<p>Message sent successfully!</p>";
          } else {
              echo "<p>Error: " . $stmt->error . "</p>";
          }
          
          // Close the statement and connection
          $stmt->close();
          $conn->close();
          ?>

## CSS Styling

- **styles.css**: This file contains the CSS rules for styling the contact form. Update the CSS file as needed to match your website's design.

## Usage

1. **Access the Contact Form:**
   Navigate to `contact.php` on your website to view the contact form.

2. **Submit a Message:**
   Fill out the contact form and submit it. The form data will be processed and stored in the `messages` table of your MySQL database.

3. **View Submissions:**
   To view submitted messages, query the `messages` table in your MySQL database.

## Troubleshooting

- **HTTP 405 Error:**
  If you encounter an HTTP 405 error, ensure that the form’s `action` attribute points to the correct PHP file and that the file permissions and server configuration are correct.

## Contributing

Feel free to contribute to this project by submitting issues, improvements, or pull requests. Ensure that any contributions are tested and adhere to the project's coding standards.



