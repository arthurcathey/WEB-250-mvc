# WEB-250 MVC Assignment

## Overview
This project demonstrates a simple PHP MVC application for managing salamander records. It uses environment variables for database credentials, Composer for dependency management, and a custom router for clean URLs.

## Features
- MVC structure (Models, Views, Controllers)
- Secure database credentials using `.env`
- Routing for home, salamanders, about, and contact pages
- Display a list of salamanders and individual records
- About and contact page stubs
- Navigation links on all main pages

## Setup Instructions
1. Clone the repository to your AMPPS `www` directory.
2. Run `composer install` in the project root (use `php composer.phar install --disable-tls` if you have SSL issues).
3. Copy `.env.example` to `.env` and update with your database credentials.
4. Make sure `.env` is not tracked by git.
5. Start AMPPS Apache and visit `http://localhost/WEB-250-mvc/web250-mvc/public/`.

## Folder Structure
```
web250-mvc/
  config/
    db_credentials.php
  public/
    index.php
    .htaccess
  src/
    Controllers/
    Models/
    Views/
    Router.php
  vendor/
  .env
  .env.example
  composer.json
  README.md
```

## Notes
- The `vendor` folder is managed by Composer and should not be committed to git.
- The `.env` file contains sensitive credentials and must be excluded from git.
- If you have issues with environment variables in AMPPS, use hardcoded credentials in `db_credentials.php`.

## Author
Arthur Cathey

## Submission
- GitHub repo: https://github.com/arthurcathey/WEB-250-mvc
- Webhost address: http://arthurcathey.ampps.com/WEB-250-mvc/web250-mvc/public/
