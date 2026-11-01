## Repository

Source code project FinTrack dapat diakses melalui GitHub:

[FinTrack - GitHub Repository](https://github.com/samsurrizal10-prog/Eligible_Test_FinTrack)
# FinTrack – Personal Finance Management System

FinTrack is a web-based personal finance management application built to help users manage their daily finances. Users can record income and expenses, organize transactions into categories, manage budgets, and track personal savings goals.

## Features

### 1. Authentication
- User registration
- User login and logout
- Password hashing
- Session-based authentication

### 2. Dashboard
- Display total income
- Display total expenses
- Calculate current balance
- Display total transactions
- Show recent transactions

### 3. Transaction Management
- Create transactions
- View transaction records
- Edit transactions
- Delete transactions
- Associate transactions with categories

### 4. Category Management
- Create categories
- View categories
- Edit categories
- Delete categories
- Prevent deletion of categories that are still being used

### 5. Budget Management
- Create budgets
- View budget records
- Edit budgets
- Delete budgets
- Track budget usage

### 6. Savings Goals
- Create savings goals
- View savings progress
- Edit savings goals
- Delete savings goals
- Calculate savings progress automatically
- Automatically determine goal status (Active or Completed)
- Validate target dates to prevent past dates
- Restrict access to each user's own savings goals

## Technologies Used

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript, Blade
- **Database:** MySQL
- **ORM:** Laravel Eloquent ORM
- **Authentication:** Laravel Session Authentication

## Database

FinTrack uses a relational database to organize financial information.

Main database entities include:

- Users
- Transactions
- Categories
- Budgets
- Savings Goals

Each user's financial records are associated with their account to ensure data separation.

## Installation and Setup

### Requirements

- PHP
- Composer
- MySQL
- Node.js and NPM
- Laravel-compatible PHP extensions

### 1. Clone the Repository

```bash
git clone <https://github.com/samsurrizal10-prog/Eligible_Test_FinTrack.git>
cd FinTrack
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure Database

Open the `.env` file and configure your MySQL database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fintrack
DB_USERNAME=root
DB_PASSWORD=
```

Create the `fintrack` database in MySQL before proceeding.

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Run the Application

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## Security and Validation

FinTrack implements several security and validation mechanisms:

- Password hashing during registration
- Authentication middleware for protected pages
- CSRF protection for form submissions
- Server-side input validation
- User-based data ownership
- Protection against unauthorized access to other users' records

## Project Purpose

This project was developed as part of a Database and Software Development final examination (UAS).

The main objective is to implement database management, CRUD operations, relational data handling, authentication, validation, and basic web application security using Laravel.

## License

This project is developed for educational purposes.
