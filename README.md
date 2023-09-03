# CMS SMKN 4 Bandung

This repository contains the source code for the Content Management System (CMS) used by SMKN 4 Bandung. The CMS is designed to facilitate the management and maintenance of the school's online presence.

## Table of Contents

- [CMS SMKN 4 Bandung](#cms-smkn-4-bandung)
  - [Table of Contents](#table-of-contents)
  - [Prerequisites](#prerequisites)
  - [Getting Started](#getting-started)
    - [Setting up Environment Variables](#setting-up-environment-variables)
    - [Running the Application](#running-the-application)
      - [With Docker](#with-docker)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.0
- Composer (Version 1.\*)
- Docker and Docker Compose (optional, for Docker setup)
- MySQL database server

## Getting Started

To get started with this CMS, follow these steps:

### Setting up Environment Variables

1. Create a `.env` file in the project root directory.

```sh
  touch .env
```

2. Copy the `.env.example` to the `.env` file and replace `your_database_password` and `your_database_username` with your MySQL database credentials and don't forget to change `your_database_host` with where you hosted the database, If you using `docker-compose` to run this project, you must change `your-database_host` with:

   ```ini
   DB_HOST=db
   ```

3. Save the .env file.

### Running the Application

1. Install PHP dependencies using Composer:
   ```
   composer install
   ```
2. Run database migrations to set up the database schema:
   ```
   php artisan migrate
   ```
3. Run database seeder:

   ```
    php artisan db:seed
   ```

   You can also run an example default seeder:

   ```
   php artisan db:seed ---class=ExampleDefaultSeeder
   ```

4. Generete your app key:
   ```
   php artisan key:generate
   ```
5. Run the project
   ```
   php artisan serve
   ```
6. Access the project in your web browser at http://localhost:8000/

#### With Docker

If you prefer to use Docker for development, follow these steps:

1. Ensure you have Docker and Docker Compose installed on your system.
2. Create empty `mysql` dir inside your `docker` dir
3. Run the following command to start the containers:
   ```
   docker compose up -d --build
   docker compose exec app rm -rf vendor composer.lock
   docker compose exec app composer install
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate
   docker compose exec app php artisan db:seed
   ```
4. Access the project in your web browser at http://localhost:8000.
