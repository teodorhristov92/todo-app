# Todo App - Laravel + Livewire + Alpine.js

A modern todo application built with Laravel, Livewire, and Alpine.js, featuring API-driven architecture with Sanctum authentication.

## Features

- **User Authentication** - Login/Register with Laravel Sanctum
- **Complete Todo Management** - Create, Read, Update, Delete (CRUD) todos
- **Categories & Priorities** - Organize todos with categories and priority levels
- **API-First Architecture** - All data flows through HTTP API calls
- **Real-time Updates** - Livewire components with Alpine.js for dynamic interactions
- **Responsive Design** - Modern UI with Tailwind CSS
- **Edit Modal** - Inline editing with modal interface
- **Delete Confirmation** - Safe deletion with confirmation dialog

## Prerequisites

Before running this project, make sure you have:

- **PHP 8.1+** installed
- **Composer** installed
- **Node.js & NPM** installed
- **MySQL/PostgreSQL** database server
- **Laragon/XAMPP/WAMP** (for local development)

## Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd todo-app
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure Database

Edit `.env` file and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Database Migrations

```bash
# Create database tables
php artisan migrate

# Or fresh install with seeding
php artisan migrate:fresh --seed
```

### 7. Build Frontend Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## 🗄️ Database Seeding

The project includes seeders for testing data:

```bash
# Run all seeders
php artisan db:seed

# Run specific seeders
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=PrioritySeeder
php artisan db:seed --class=TestUserSeeder

# Fresh database with seeding
php artisan migrate:fresh --seed
```

### Seeded Data

- **Categories**: Work, Personal, Shopping
- **Priorities**: Low (level 1), Medium (level 2), High (level 3)
- **Test User**: testuser@example.com / password123


## Authentication

### Login Credentials

After seeding, you can login with:

- **Email**: testuser@example.com
- **Password**: password123

Or create a new account using the registration form.


## Project Structure

```
todo-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/Api/     # API Controllers
│   │   ├── Livewire/            # Livewire Components
│   │   └── Resources/           # API Resources
│   ├── Models/                  # Eloquent Models
│   └── Repositories/            # Repository Pattern
├── database/
│   ├── migrations/              # Database Migrations
│   └── seeders/                 # Database Seeders
├── resources/
│   ├── views/
│   │   └── livewire/            # Livewire Component Views
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript
└── routes/
    ├── api.php                  # API Routes
    └── web.php                  # Web Routes
```


## API Endpoints

### Authentication
- `POST /api/login` - User login
- `POST /api/register` - User registration
- `POST /api/logout` - User logout

### Todos
- `GET /api/todos` - Get user todos
- `POST /api/todos` - Create new todo
- `PATCH /api/todos/{id}` - Update todo
- `DELETE /api/todos/{id}` - Delete todo

### Categories & Priorities
- `GET /api/categories` - Get all categories
- `GET /api/priorities` - Get all priorities


## 🔍 Troubleshooting

### Common Issues

1. **"Class not found" errors**
   ```bash
   composer dump-autoload
   ```

2. **Database connection issues**
   - Check `.env` database credentials
   - Ensure database server is running
   - Verify database exists

3. **Frontend assets not loading**
   ```bash
   npm run dev
   # or
   npm run build
   ```

### Debug Mode

For development, enable debug mode in `.env`:
```env
APP_DEBUG=true
```