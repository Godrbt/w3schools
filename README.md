## W3Schools Clone - Laravel
This project is a clone of the popular W3Schools website, built with Laravel by Vfix Technology. It has been made open-source under the MIT license. Feel free to contribute and improve!

If you find this project helpful, please ⭐ star the repository on GitHub — your support encourages us to build more amazing projects!

## Installation Steps
Follow the steps below to get the project up and running:

### Step 1: clone the project
git clone https://github.com/vfixtechnology/w3-school-clone.git

### Step 2: Go to the project directory and install dependencies
#### cd w3-school-clone
composer install

### Step 3: Create .env file
Rename the .env.example file to .env.

### Step 4:  Create a Database
Create a new database in your local or remote MySQL server and add the database credentials in your .env file.

### Step 5: Add SMTP details (optional)
To make the contact form work correctly, add your SMTP details in the .env file.

### Step 6: Run Migrations
Run the migration command to create the necessary tables in the database:

php artisan migrate

### Step 7: Generate Application Key
php artisan key:generate

### Step 8: Add Dummy User for Admin
php artisan db:seed

### Step 9: Serve the Application
php artisan serve


### Admin Login Link
#### You can log in as an admin at the following URL: http://localhost:8000/login

User: admin@example.com
Password: admin123






