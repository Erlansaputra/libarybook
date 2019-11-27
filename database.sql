CREATE DATABASE perpustakaan;

CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    nama VARCHAR (50) NOT NULL, 
    password VARCHAR (50) NOT NULL,
    username VARCHAR (50) UNIQUE NOT NULL
);

-- BOOKS SQL

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
SELECT * from books;

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