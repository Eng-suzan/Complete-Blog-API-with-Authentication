# Complete Blog API with Authentication

A RESTful Blog API built with **Laravel** that provides user authentication, authorization, and complete CRUD operations for posts and categories.

---

## 🚀 Features

* User Registration & Login
* Token Authentication using **Laravel Sanctum**
* User Logout
* CRUD Operations for Posts
* CRUD Operations for Categories
* Image Upload for Posts
* Form Request Validation
* API Resources for JSON responses
* Standardized API Response Helper
* Feature Testing with PHPUnit
* Automatic API Documentation using **Dedoc Scramble**

---

## 🛠️ Technologies

* Laravel
* PHP
* MySQL
* Laravel Sanctum
* Dedoc Scramble
* PHPUnit
* REST API

---

## 📂 Project Structure

```
app/
├── Helpers
├── Http
│   ├── Controllers
│   │   └── API
│   ├── Requests
│   └── Resources
├── Models

database/
└── migrations

routes/
└── api.php

tests/
└── Feature
```

---

## ⚙️ Installation

Clone the repository:

```bash
git clone https://github.com/Eng-suzan/Complete-Blog-API-with-Authentication.git
```

Move into the project:

```bash
cd Complete-Blog-API-with-Authentication
```

Install dependencies:

```bash
composer install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database credentials in the `.env` file, then run:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

---

## 🔐 Authentication Endpoints

| Method | Endpoint        | Description         |
| ------ | --------------- | ------------------- |
| POST   | `/api/register` | Register a new user |
| POST   | `/api/login`    | Login               |
| POST   | `/api/logout`   | Logout              |

---

## 📝 Posts Endpoints

| Method | Endpoint          | Description       |
| ------ | ----------------- | ----------------- |
| GET    | `/api/posts`      | Get all posts     |
| GET    | `/api/posts/{id}` | Get a single post |
| POST   | `/api/posts`      | Create a post     |
| PUT    | `/api/posts/{id}` | Update a post     |
| DELETE | `/api/posts/{id}` | Delete a post     |

---

## 📂 Categories Endpoints

| Method | Endpoint               | Description           |
| ------ | ---------------------- | --------------------- |
| GET    | `/api/categories`      | Get all categories    |
| GET    | `/api/categories/{id}` | Get a single category |
| POST   | `/api/categories`      | Create a category     |
| PUT    | `/api/categories/{id}` | Update a category     |
| DELETE | `/api/categories/{id}` | Delete a category     |

---

## 💬 Comments

The API supports creating comments through:

```http
POST /api/comments
```

---

## 📖 API Documentation

The project uses **Dedoc Scramble** to generate API documentation automatically.

Open in your browser:

```
http://127.0.0.1:8000/docs/api
```

---

## 🧪 Testing

Run all tests:

```bash
php artisan test
```

Current Feature Tests include:

* Get Posts API
* Create Post API

---

## 🔒 Security

* Laravel Sanctum Authentication
* Protected API Routes
* Authorization
* Request Validation
* Password Hashing

---
## Screenshots

### API Documentation

![API Docs](<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/170f05b7-3356-442a-b474-b7268fc211ca" />)


### Postman Testing

![Postman](<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/9db98d55-298c-4aed-828c-f0a2e2768151" />)


### Database

![Database](<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/c8359f63-0fc8-4532-9797-292df1f7926a" />


## 👩‍💻 Author

**Suzan Reda**

---

## 📄 License

This project is licensed under the MIT License.
