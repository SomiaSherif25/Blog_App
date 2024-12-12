# Blog App API

## Project Overview
A fully functional blog API built using Laravel 11. This project includes user authentication, tag and post management, and automated background tasks. It is designed to demonstrate modern API development practices, including token-based authentication and task scheduling.

## Features
### 1. **Authentication**
- **Register API** (`/register`): Allows users to register with a name, phone number, and password.
- **Login API** (`/login`): Provides an access token for authenticated users via Laravel Sanctum.

### 2. **Tags Management**
- CRUD operations for tags.
- Ensures tag names are unique.

### 3. **Posts Management**
- CRUD operations for posts.
- Soft deletion and restoration functionality.
- Many-to-many relationship between posts and tags.
- Pinned posts are prioritized in user queries.

### 4. **Background Tasks**
- **Scheduled Command**: Automatically deletes soft-deleted posts older than 30 days.
- **Job**: Logs API responses from `https://randomuser.me/api/` every six hours.

### 5. **Statistics Endpoint**
- Provides analytics for the application:
  - Total number of users.
  - Total number of posts.
  - Number of users without any posts.

## Technologies
- **Laravel 11**
- **MySQL** for data persistence.
- **Sanctum** for token-based authentication.
- **Queues and Jobs** for background processing.
- **Command Scheduler** for automated tasks.

## Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/<your-username>/laravel-backend-api.git
   cd laravel-backend-api
