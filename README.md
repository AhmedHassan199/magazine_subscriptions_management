# Magazine Management System

## Features

### 1. User Authentication
- **Register & Login:** Users can register and log in using token-based authentication via Laravel Sanctum.

### 2. Roles and Permissions
- **Users:**
  - View magazines, articles, and subscriptions.
  - Create and manage comments on articles.
  
- **Magazines:**
  - Viewable by users based on their access level.
  - Managed by publishers or administrators.
  
- **Subscriptions:**
  - Users can subscribe to magazines and manage subscription status.
  - Admins can view and manage all subscriptions.
  
- **Payments:**
  - Users can make payments for their subscriptions.
  - Admins can view and manage payment records.
  
- **Articles:**
  - Users can view, create, and update articles.
  - Admins can approve or reject articles.
  
- **Comments:**
  - Users can comment on articles.
  - Admins can approve or reject comments.

### 3. Database Models (Eloquent Models)
- Each resource (users, magazines, subscriptions, payments, articles, comments) has a corresponding Eloquent model.
- **Relationships:**
  - Magazines -> Articles (One-to-Many)
  - Users -> Subscriptions (Many-to-Many)
  - Subscriptions -> Payments (One-to-Many)
  - Articles -> Comments (One-to-Many)

### 4. Authorization (Policies & Gates)
- **Publisher:**
  - Can create and manage magazines, articles, and subscriptions.
  
- **Admin:**
  - Can manage all resources (users, magazines, subscriptions, payments).
  
- **User:**
  - Can view articles, magazines, and manage their subscriptions.
  - Can comment on articles.

### 5. Subscription Management
- Users can subscribe to magazines with options for monthly or yearly plans.
- Admins manage subscriptions, approve or renew them.

### 6. Commenting System
- Users can comment on articles.
- Admins moderate comments by approving or rejecting them.

### 7. Task Scheduling
- Tasks are scheduled for subscription management, payment processing, and other periodic operations.
- Admins can assign tasks based on user roles.
- Tasks are logged for tracking and activity history.

### 8. Activity Logging
- All significant actions (e.g., user registration, magazine management, subscription updates) are logged.
- Logs can be reviewed for auditing and troubleshooting.

### 9. RESTful API
- **Endpoints:**
  - Manage magazines, subscriptions, payments, articles, and comments via RESTful API.
  
- **Authentication:**
  - API is secured with Laravel Sanctum for token-based authentication.
  
- **Documentation:**
  - API documentation is available in Postman for easy testing and integration.


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
