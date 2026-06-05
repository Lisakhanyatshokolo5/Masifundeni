# Masifundeni

# Project Overview
Masifundeni is a student management system web-based application designed to manage students, course , instructors and enrolments within an educational institution. The system provides role-based access control and allows administrators, instructors and students to perform specific tasks according to their assigned roles.

# Technologies and Framework used
## Backend
- Laravel 12
- PHP 8.2+

## Frontend
- Blade Templating Engine
- HTML5
- CSS

## Authentication
- Laravel Breeze

## Database
-MYSQL
-Eloquent ORM

## Development Tools
- Composer
- Node.js
- NPM
- Git
- GitHub

# Features
## Administrator
- Manage student records
- Create , update and delete courses
- Manage instructors
- View system reports
- Manage user accounts

## Instructor
- View assigned courses
- Manage student enrolment
- Update Student progress information
- View course reports

## Student
- Register an account
- View available courses
- Enrol in courses View personal progress reports

## Setup

1. Clone the repo
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. Create a MySQL database called `masifundeni_db`
6. Update `.env` with your local DB credentials
7. `php artisan migrate:fresh --seed`
8. `npm install && npm run dev`
9. `php artisan serve`

## Seeded credentials
- Admin: admin@sms.test / password
- Instructor: instructor@sms.test / password  
- Student: student@sms.test / password
