# Event Management System

A web-based **Event Management System** built with **Laravel** that allows users to browse and register for events while providing administrators with full event management capabilities through an intuitive dashboard.

## Overview

This project was developed to demonstrate the use of the **Laravel Framework** and the MVC architecture for building dynamic web applications. It includes authentication, database operations, CRUD functionality, and role-based access to manage events efficiently.

---

## Features

### User Features

* User registration and login
* Browse available events
* View event details
* Responsive user interface

### Admin Features

* Secure admin authentication
* Create new events
* Edit existing events
* Delete events
* View all events
* Manage event information

---

## Technologies Used

* **PHP**
* **Laravel**
* **Blade Template Engine**
* **MySQL**
* **HTML5**
* **CSS3**
* **Bootstrap**
* **JavaScript**

---

## Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## Installation

1. Clone the repository

```bash
git clone https://github.com/your-username/event-management-system.git
```

2. Navigate to the project directory

```bash
cd event-management-system
```

3. Install dependencies

```bash
composer install
```

4. Copy the environment file

```bash
cp .env.example .env
```

5. Generate the application key

```bash
php artisan key:generate
```

6. Configure your database credentials in the `.env` file.

7. Run migrations

```bash
php artisan migrate
```

8. Start the development server

```bash
php artisan serve
```

The application will run on:

```
http://127.0.0.1:8000
```


---

## Learning Objectives

This project demonstrates:

* Laravel MVC Architecture
* Routing and Controllers
* Blade Templating
* Authentication
* CRUD Operations
* Database Migrations
* Eloquent ORM
* Form Validation
* Session Management

