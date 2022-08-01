# Task Manager App

This is a simple Task management app with the ability to add task for a specific project.

This application is build on Laravel Framework 9.19.

## Installation

Clone the repository-
```
git clone https://github.com/shahzad-tahir/task-manager.git
```

Then cd into the folder with this command-
```
cd task-manager
```

Then do a composer update
```
composer update
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `task_manager_db` and then do a database migration using this command-
```
php artisan migrate
```

Generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.
