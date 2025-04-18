# Medication API - Laravel Project

This is a Laravel-based API for storing, retrieving, and managing medication data in a nested JSON format. It is built using **Laravel 12** and provides an API endpoint to handle medication-related data.

## Features

- **API Endpoints** for retrieving medication information.
- **Nested JSON Format** for storing and fetching medication data.
  
## Prerequisites

Ensure the following are installed on your machine:
- **PHP 8.1+**
- **Composer** (PHP dependency manager)
- **Laravel 12.x**
- **MySQL** for the database

## Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/Vaibhav0x/medication-api.git
    cd medication-api
    ```

2. **Install PHP dependencies using Composer**

    ```bash
    composer install
    ```

3. **Set up your environment file**

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Then, configure the `.env` file to connect with your database:

    - Set `DB_CONNECTION` to your database (e.g., `mysql` or `sqlite`).
    - Set the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` accordingly.

4. **Run database migrations**

    If your project includes migrations for setting up the database schema:

    ```bash
    php artisan migrate
    ```

- If got any error then clean the cache or clear.
 
    ```bash
    php artisan optimize:clear

    ```
- If you list all the route.

    ```bash
    php artisan route:list
    ```

5. **Install front-end dependencies (optional)**

    If you have a front-end setup that uses npm or yarn, install the required dependencies.

    ```bash
    npm install
    ```

6. **Start the application**

    You can start the development server:

    ```bash
    php artisan serve
    ```

    The application will be available at `http://127.0.0.1:8000`.

## API Endpoints

### 1. **Migration API Route**

**POST** `/api/migration`
**GET** `/api/migration`

7. **Test the API using Postman**

- Method **POST** `http://127.0.0.1:8000/api/migrations/`

- In body add the raw json data like this:
```bash
{
  "medications": [
    {
      "medicationsClasses": [
        {
          "className": [
            {
              "associatedDrug": [
                { "name": "asprin", "dose": "", "strength": "500 mg" }
              ],
              "associatedDrug#2": [
                { "name": "somethingElse", "dose": "", "strength": "500 mg" }
              ]
            }
          ],
          "className2": [
            {
              "associatedDrug": [
                { "name": "asprin", "dose": "", "strength": "500 mg" }
              ],
              "associatedDrug#2": [
                { "name": "somethingElse", "dose": "", "strength": "500 mg" }
              ]
            }
          ]
        }
      ]
    }
  ]
}
```

Returns a simple success message to confirm the API is working:

```json
{
  "message": "API route working"
}
```

- Method **GET** `http://127.0.0.1:8000/api/migrations/`

Returns the raw same data that you are given.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
