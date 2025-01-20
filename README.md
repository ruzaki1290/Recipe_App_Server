# Recipe_App_Server

This is the backend server for a Recipe app, built with PHP, and providing API endpoints for client-side interaction.

## Folder Structure

- `api/`: Contains the API endpoints for handling various operations, such as creating, reading, updating, and deleting recipes.  Each endpoint is typically a separate PHP file (e.g., `create-post.php`, `get-recipes.php`).
- `config/`: Contains configuration files for database connection details, allowed CORS origins, and other settings.
- `database.php`: Establishes and manages the connection to the MySQL database.
- `config.php`: Holds general configuration settings like allowed CORS origins, headers, and methods.  It centralizes these settings for easy management and modification.

## API Endpoints

- `/create-post`:  Handles recipe creation.  Accepts POST requests with recipe data (title, author, ingredients, instructions).  Performs input validation and sanitization before inserting the new recipe into the database.
- `/get-recipes`: Retrieves recipes from the database. (Implementation details to be added as they are developed).  Likely supports filtering or pagination.
- `/delete-post`: Handles recipe deletion. Accepts DELETE requests with the recipe ID. Validates the ID and removes the corresponding recipe from the database.
  
## Database

The server uses a MySQL database to store recipe data.  The `database.php` file handles the database connection.  The schema includes a `recipes` table (details to be added).

## Security Considerations

- Input validation and sanitization are implemented to mitigate common security risks, such as SQL injection and cross-site scripting (XSS) attacks.
- CORS settings are configured to restrict access to authorized origins.  This helps prevent unauthorized cross-origin requests.

## Dependencies

- PHP (version X.X) - Required for server-side processing.
- MySQL - The database system used for storing recipe data.
- XAMPP (mentioned in the file path) - Likely used for local development.

## Future Enhancements

- Implement remaining API endpoints (update, delete, etc.)
- Add detailed error handling and logging.
- Implement authentication and authorization for user-specific actions.
- Consider using a more robust framework for better code organization and maintainability as the application grows.
