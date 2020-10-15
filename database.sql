CREATE DATABASE perpustakaan;

-- BOOKS SQL ======================================================================

-- table
CREATE TABLE books (
    id SERIAL PRIMARY KEY,
    title VARCHAR (50) UNIQUE NOT NULL, 
    description VARCHAR (100),
    author VARCHAR (50),
    publication_year VARCHAR (4),
    image_name VARCHAR(255)
);

-- create
INSERT INTO books (title, description, author, publication_year, image_name)
VALUES ('Beyond the Inspiration', 'Merekalah yang menjadikan Islam lebih dari sekedar inspirasi', 'Felix Y. Siaw', '2010', 'persiapan-pulang-kampung.png');

-- read
SELECT * from books ORDER BY id ASC;

-- delete
DELETE FROM books WHERE id = 3;

-- update
UPDATE books
SET title = '11',
    description = '11',
    author = '11',
    publication_year = '11',
    image_name = '11'
WHERE
   id = 4;

-- USERS SQL ======================================================================

-- table
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR (50) NOT NULL, 
    username VARCHAR (50) UNIQUE NOT NULL,
    password VARCHAR (50) NOT NULL,
    admin BOOLEAN NOT NULL
);

-- create
INSERT INTO users (name, username, password, admin)
VALUES ('Dheva Marga Putra', 'dheva', 'dheva', true);

-- read
SELECT * from users ORDER BY id ASC;

-- delete
DELETE FROM users WHERE id = 3;

-- update
UPDATE users
SET name = '11',
    username = '11',
    password = '11',
    admin = true
WHERE
   id = 4;

-- Lending SQL ======================================================================

-- table
CREATE TABLE lending (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR (50) UNIQUE NOT NULL,
    book_id VARCHAR (50) UNIQUE NOT NULL
);

-- create
INSERT INTO lending (user_id, book_id)
VALUES ('1', '1');

-- read
SELECT
lending.id as id,
lending.returned as returned,
users.id as user_id,
users.username as username,
books.id as book_id,
books.title as book_title,
books.image_name as book_image_name
from lending
left join users on lending.user_id = users.id
left join books on lending.book_id = books.id
ORDER BY id ASC;

-- delete
DELETE FROM lending WHERE id = 3;

-- update
UPDATE lending
SET user_id = 1,
    book_id = 14
WHERE
   id = 1;