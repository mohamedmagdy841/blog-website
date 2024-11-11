<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Simple Blog Website

This is a blog website developed using Laravel. The website provides full CRUD (Create, Read, Update, Delete) functionality for blog posts, implements role-based access control using Laravel policies. The project is fully containerized using Docker to ensure smooth deployment across different environments.

## Database Schema
![drawSQL-image-export-2024-11-11](https://github.com/user-attachments/assets/d6a485d0-4f14-4596-8c0c-fa5fd5abb4f6)

## Technologies and Tools

- **Laravel 11:** MVC framework for back-end logic, user authentication, and database management.
- **MySQL:** Relational database system used to store blog data.
- **Docker & Docker Compose:** Containerization of the app for easy setup and environment consistency.

## Installation

### Prerequisites

- Docker
- Docker Compose
- Composer
- PHP 8.2
- MySQL 5.7+

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/mohamedmagdy841/simple-blog.git
   ```

2. Navigate to the project directory:
   ```bash
   cd simple-blog
   ```

3. Copy `.env.example` to `.env` and configure your environment variables (e.g., database settings, caching):
   ```bash
   cp .env.example .env
   ```

4. Start Docker containers:
   ```bash
   docker-compose up --build
   ```

5. Run migrations and seed the database:
   ```bash
   docker exec -it app_container_name php artisan migrate --seed
   ```

6. Access the site at `http://localhost:8000`.

## Docker and Deployment

<p align="center"><a href="https://www.docker.com/" target="_blank"><img src="https://github.com/user-attachments/assets/1511730a-e1cb-4a3f-b605-8f35cad40027" width="400" alt="Docker Logo"></a></p>

- The project is fully Dockerized using **Docker** and **Docker Compose** to ensure it runs consistently across all environments.
- Apache and MySQL services are configured within Docker containers, and Laravel is served from the `/public` directory.

## Project Demo

https://github.com/user-attachments/assets/ff7968ee-3598-485f-9eb1-586049e00244

