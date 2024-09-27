# Support Ticket Management System

##### Technology: 
The system is built using PHP and MySQL, which are popular tools for web development.
##### Customer Interaction: 
Customers can submit support tickets through the system and track their progress.
##### File Attachments: 
Customers can attach files with their tickets.
##### Admin Notification: 
When a customer submits a ticket, the admin receives an email notification.
##### Admin Actions: 
Admins can view, edit, and resolve or close tickets.
##### Customer Notification: 
When an admin resolves or closes a ticket, the customer receives an email notification.

## Technologies Used
###### 1. PHP (Version 7.4)
###### 2. MySQL for the database
###### 3. HTML, CSS, Bootstrap, and javascript for the frontend Laravel Blade templates

###### 4. AJAX for dynamic updates
###### 5. Mailtrap Used for sending email notifications like ticket updates and resolutions
###### 6. Session Flashing for success/error messages
###### 7. Seeder
###### 8. Laravel Guard to Handles authentication, including login and registration
###### 9. Data Table

## Installation

Follow these steps to set up the project locally:

#### 1. Clone the repository:
```bash
git clone
cd support-ticket-coding-test
```
#### 2. Install dependencies:

```bash
composer install
```

#### 3. Configure Environment Variables
Copy the .env.example file to .env
```bash
cp .env.example .env
```

#### 4. Update the .env file with your database and email configuration:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticket_management
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=678425cb28b7da
MAIL_PASSWORD=ef32a965a72e9f
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=xyz@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### 5. Run Database Migrations
```bash
php artisan migrate
```
#### 6. Seed the Database to insert dummy customer and admin data from individual JSON files.

```bash
php artisan db:seed
```
#### 7. Start the Server
```bash
php artisan serve
```
## Use the following route to login as Customer
```bash
http://127.0.0.1:8000/login
```
## Deafualt Customer credential
###### username : imamhosen737@gmail.com
###### password : 123321

## Use the following route to login as Admin
```bash
http://127.0.0.1:8000/admin_log
```

## Deafualt Admin credential
###### username : admin@gmail.com
###### password : 12345678
