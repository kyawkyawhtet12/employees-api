````
# Employee CRUD API
---

## Table of Contents

1. [Requirements](#requirements)
2. [Installation](#installation)
3. [Running the Project](#running-the-project)
4. [GraphiQL Playground](#graphiql-playground)
5. [API Documentation](#api-documentation)
---

## Requirements

Before setting up the project, ensure you have the following installed:

- **PHP 8.2.24**
---

## Installation

1. **Clone the repository:**

   ```
   git clone https://github.com/kyawkyawhtet12/employees-api.git
   cd employees-api
````

2.  ```
    composer install
    ```

3.  **Create a `.env` file:**

    ```
    cp .env.example .env
    ```

4.  **Generate an application key:**

    ```
    php artisan key:generate
    ```

5.  **Run migrations:**

    ```
    php artisan migrate
    ```

6.  **Seed the database:**
    Run Seeder For User And Employee:
    ```
    php artisan db:seed
    ```
7.  **Create Passsport Client Token:**
    ```
    php artisan passport:client --personal
    ```

---

## Running the Project

1. **Start the Laravel development server:**

    ```
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## Playground

1. Access the GraphiQL Playground at:

    ```
    http://localhost:8000/graphiql
    ```

## API Documentation

### Example Queries and Mutations

#### Login

To log in, use the following GraphQL mutation:

```
mutation Login($input: LoginInput!) {
  login(input: $input) {
    accessToken
    user {
      id
      name
      email
    }
  }
}
Example Input:
{
  "input": {
    "email": "user@gmail.com",
    "password": "password"
  }
}

```

#### Fetch All Employees

```
query {
    employees {
        id
        name
        email
    }
}
```

#### Fetch a Single Employee by ID

```
query {
    employee(id: 1) {
        id
        name
        email
    }
}
```

#### Create a New Employee

```
mutation {
  createEmployee(
    name: "John Doe"
    email: "johnd@example.com"
    position: "Software Engineer"
    salary: 75000.00
  ) {
    id
    name
    email
    position
    salary
  }
}
```

#### Update a New Employee

```
mutation {
  updateEmployee(
    id: "2"
    name: "John Doe Updated"
    email: "john.doe@example.com"
    position: "Senior Software Engineer"
    salary: 90000.00
  ) {
    id
    name
    email
    position
    salary
  }
}

```

#### Delete an Employee

```
mutation {
  deleteEmployee(id: "1") {
    id
    name
  }
}

```

#### Export an Employees

```
query{
  exportEmployees
}

```
