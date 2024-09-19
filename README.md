

## Project Overview
This project captures user records and stores them in a MongoDB database. It ensures unique ID numbers, validates inputs, and provides user-friendly feedback.

## Requirements
Database: MongoDB
Language: PHP

## Features
Unique ID Number: Ensures that no duplicate ID numbers are stored. If a duplicate is found, an error message is displayed, and the form is repopulated.
Input Validation:
ID Number: Must be a numeric value and exactly 13 characters long.
Date of Birth: Must be in the format dd/mm/YYYY.
Name and Surname: Must contain valid characters without any special characters that could disrupt database entry.

## How to deploy it

Clone the Repository:

git clone <repository-url>

**Set Up MongoDB:**

*Ensure MongoDB is installed and running on your machine.
*Create a database named user_records.
*Configure Database Connection:

*Update the database connection settings in config.php.
## Usage
Open your web server and navigate to the project directory.
Access the form via your web browser (e.g., http://localhost/project-directory/form.php).
Fill in the required fields and submit.
If a duplicate ID or invalid data is detected, appropriate messages will guide you to correct the input.