<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Simple Blog Website

**Global Perspectives: Sports, Food, and Technology Trends**

This is a blog website developed using Laravel, covering various categories like technology, sports, food, and travel. The website provides full CRUD (Create, Read, Update, Delete) functionality for blog posts, implements role-based access control using Laravel policies, and includes robust error handling mechanisms. The project is fully containerized using Docker to ensure smooth deployment across different environments.

## Features

- **CRUD Operations:** Complete management of blog posts, including creating, updating, and deleting blogs from the admin dashboard.
- **Blog Categories:** Blogs are divided into categories such as Technology, Sports, Food, and Travel.
- **Role-based Access Control:** Admins can manage blog content while readers have limited access through Laravel policies.
- **Error Handling:** Custom error pages and structured error handling to ensure a user-friendly experience.
- **Responsive Design:** Built with Bootstrap 5 for a mobile-friendly layout.
- **Dockerized Application:** Runs inside Docker containers for consistent deployment across any machine.

## Technologies and Tools

- **Laravel 11:** MVC framework for back-end logic, user authentication, and database management.
- **MySQL:** Relational database system used to store blog data.
- **Bootstrap 5:** Front-end framework for responsive UI design.
- **Docker & Docker Compose:** Containerization of the app for easy setup and environment consistency.
- **Apache:** Web server running inside the Docker container.

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
   git clone https://github.com/yourusername/simple-blog.git
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

- The project is fully Dockerized using **Docker** and **Docker Compose** to ensure it runs consistently across all environments.
- Apache and MySQL services are configured within Docker containers, and Laravel is served from the `/public` directory.
  
<p align="center"><a href="https://www.docker.com" target="_blank"><img src="https://github.com/user-attachments/assets/b6fcf59c-9532-477b-a030-8e54d939d456" width="400" alt="Docker Logo"></a></p>

## Project Demo



https://github.com/user-attachments/assets/36e36a45-c780-4868-a2f3-a0e546e14532

