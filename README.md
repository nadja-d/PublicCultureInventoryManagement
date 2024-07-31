# Public Culture Inventory Management

Welcome to the PublicCulture Inventory Management System! This application is designed to efficiently manage inventory using the MVC architecture and technologies such as PHP, Blade, JavaScript, and CSS, with the Laravel framework.

## Introduction
Public Culture Inventory Management System is designed to help manage inventory efficiently by providing a user-friendly interface and robust backend functionality. The system uses the MVC architecture provided by the Laravel framework to separate concerns, making the codebase easier to manage and extend.

## Features
- User authentication and authorization
- Inventory management (CRUD operations)
- Real-time data updates
- User-friendly interface with Blade templates
- Responsive design with CSS

## Technologies Used
- **Laravel**: PHP framework for web applications
- **Blade**: Templating engine for Laravel
- **JavaScript**: Client-side scripting
- **CSS**: Styling and layout
- **MVC Architecture**: Model-View-Controller design pattern

## Installation
To set up the project locally, follow these steps:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/PublicCultureInventoryManagement.git
    cd PublicCultureInventoryManagement
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Set up the environment**:
    - Copy the `.env.example` file to `.env` and configure your database settings.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Import the database**:
    - Import the `admindb.sql` file into your MySQL database using phpMyAdmin or MySQL Workbench.

5. **Run database migrations**:
    ```bash
    php artisan migrate
    ```

6. **Compile assets**:
    ```bash
    npm run dev
    ```

7. **Serve the application**:
    ```bash
    php artisan serve
    ```

## Usage
Once the application is running, you can perform the following actions:

- **Login**: Use your credentials to access the system.
- **Manage Inventory**: Perform CRUD operations on inventory items.
- **Real-Time Updates**: View and interact with real-time data updates.

## Database Structure
The application interacts with various tables in the MySQL database, which are defined in `admindb.sql`. Ensure you have imported this SQL file to set up the necessary database structure.
