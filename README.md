# Task Management API

This Laravel RESTful API, named 'Magazine Management System,' allows you to manage magazines, subscriptions, articles, payments, comments, and user authentication, along with other related operations.

## Role-Based Access Control (RBAC)

### Subscribers
- Can view magazines and articles.
- Can create and view comments on articles.
- Can manage their own subscriptions.

### Publishers
- Can create, update, and delete magazines and articles.
- Can approve comments on their own articles.

### Admins
- Can manage users (create, update, delete).
- Can approve or reject comments.
- Can view and create payments.
- Can view an overview of all subscriptions.

---

## Prerequisites

Before you begin, make sure you have the following installed:
- PHP >= 8.2
- Composer
- Laravel >= 9
- Postman (for API testing)

## Setup Instructions

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/AhmedHassan199/task_management_system.git
    cd task_management_system
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    ```

3. **Configure Environment:**

    - Duplicate the `.env.example` file and rename it to `.env`.
    - Configure your database settings in the `.env` file.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations and Seeders:**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```
