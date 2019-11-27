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
);

-- create
INSERT INTO books (title, description, author, publication_year)
VALUES ('Beyond the Inspiration', 'Merekalah yang menjadikan Islam lebih dari sekedar inspirasi', 'Felix Y. Siaw', '2010');

-- read
SELECT * from books;