# OK-SkupAut

## Overview

`OK-SkupAut` is a simple PHP-based internet car dealership page (`Komis aut`) that displays featured car offers and allows users to filter inventory by brand. The app uses a MySQL / MariaDB database populated from `baza.sql` and a stylesheet in `styl.css`.

## Features

- Daily offer section showing a selected car.
- Featured offers list from the database.
- Brand filter form with search results.
- Image-based car listings loaded from `Images/`.

## Requirements

- PHP-enabled web server (Apache, Nginx, etc.)
- PHP with `mysqli` extension
- MySQL or MariaDB database

## Setup

1. Place the project files in your web server document root.
2. Create a database named `kupauto`.
3. Import `baza.sql` into the `kupauto` database.
4. Update database connection credentials in `KupAuto.php` if needed.
   - Default values:
     - host: `localhost`
     - user: `user`
     - password: `user`
     - database: `kupauto`
5. Ensure the `Images/` folder is accessible by the web server.

## Usage

1. Open `KupAuto.php` in your browser.
2. Review the featured daily car offer and highlighted offers.
3. Use the brand dropdown to search for cars by brand.

## Database schema

- `marki` — stores car brands.
- `samochody` — stores car details such as model, year, mileage, fuel type, price, featured flag, and image path.

## File structure

- `KupAuto.php` — main PHP page with HTML, database connection, and queries.
- `baza.sql` — SQL dump to create and populate the `kupauto` database.
- `styl.css` — page styling.
- `Images/` — sample car images referenced by the application.

## Notes

- The current implementation uses inline PHP and `mysqli` queries.
- The page is written in Polish and styled with a simple crimson-themed layout.
- If you change the database schema or credentials, update `KupAuto.php` accordingly.
