# PHP mini framework

A lightweight PHP framework to build fast web applications.

## Features
| Feature         | Status           | Description                                                                  |
| --------------- | ---------------- | ---------------------------------------------------------------------------- |
| Bootstrap       | Implemented      | Initializes the application and loads the composer, router and container.    |
| Models          | Implemented      | Handles rules, logic and interactions with the database.                     |
| Views           | Implemented      | Renders HTML templates and presents the data.                                |
| Controllers     | Implemented      | It is the layer between the models and views.                                |
| Helpers         | Implemented      | Provides functions for common tasks.                                         |
| AJAX Navigation | Semi-Implemented | Renders only the content rather than the whole page for internal navigation. |
| Router          | Testing          | Maps URLs to controllers and actions.                                        |
| DI Container    | Testing          | Resolve dependencies for classes.                                            |
| .env loading    | Planned          | Load environment variables                                                   |
| AJAX Library    | Planned          | A built-in library for making AJAX requests.                                 |

## Usage
1. Clone the repository:
   ```bash
   git clone https://github.com/jefernfos/php-mini-framework
   ```
2. Navigate to the project directory:
   ```bash
   cd php-mini-framework
   ```
3. Install composer class autoloader:
   ```bash
   composer dump-autoload
   ```
4. Set up your database configuration in the `/config/database.php` file.
    ```php
    return [
         'host' => 'localhost',
         'dbname' => 'your_database_name',
         'user' => 'your_database_user',
         'password' => 'your_database_password',
    ];
    ```
5. Create the database and table structure.
    ```bash
    mariadb -u user -p < db.sql
    ```
6. Run the application:
   ```bash
   php -S localhost:8000 -t public
   ```
7. Open your web browser and navigate to `http://localhost:8000`.