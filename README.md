## Laravel create book with auth

A repository to create book register with autentication

## Running locally

Clone the project

```bash
  git clone https://github.com/MatheusConstantino/bookShelf.git
```

Up to project directory

```bash
  cd bookshelf
```

Install dependencies

```bash
  composer install
```

Create the .env file with .env.example as an example

Run the migrations

```bash
  php artisan migrate
```

Run server

```bash
  php artisan serve
```

Import the postman collection file

```bash
  BookShelf.postman_collection.json
```

Start the process with register route

```bash
  http://127.0.0.1:8000/api/register
```

Make login with login route

```bash
  http://127.0.0.1:8000/api/login
```

Try to create a book with barrer token given on login route

```bash
  http://127.0.0.1:8000/api/login
```
