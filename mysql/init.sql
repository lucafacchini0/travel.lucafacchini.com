-- Database Draft - 1.0

CREATE TABLE IF NOT EXISTS countries ( --ok
    id_country INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL
)

CREATE TABLE IF NOT EXISTS places (
    id_place INT PRIMARY KEY AUTO_INCREMENT,
    id_country INT REFERENCES countries(id_country),
    name VARCHAR(128) NOT NULL,
    description,
)

CREATE TABLE IF NOT EXISTS colors (
    id_color INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL
)

CREATE TABLE IF NOT EXISTS tags (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    id_color REFERENCES colors(id_color) NOT NULL

)

CREATE TABLE posts_tags {
    id_post_tag INT PRIMARY KEY AUTO_INCREMENT,
    id_tag REFERENCES tags(id_tag),
    id_post REFERENCES posts(id_post)
}

CREATE TABLE IF NOT EXISTS users (
    nickname VARCHAR(32) PRIMARY KEY,
    email VARCHAR(128) UNQIUE NOT NULL,
    password VARCHAR(128) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user' NOT NULL,
    name VARCHAR(64),
    surname VARCHAR(64),
    id_country INT REFERENCES countries(id_country) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL,
    bio TEXT, -- TODO: app-side, max 500 characters.
    profile_picture VARCHAR(1024),
)

CREATE TABLE IF NOT EXISTS posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(32) REFERENCES users(nickname),
    id_place INT REFERENCES places(id_place)
    title VARCHAR(128) NOT NULL,
    date DATE NOT NULL,
    description TEXT -- Todo: app-side max 2048 characters
    thumbnail VARCHAR(1024),
)

CREATE TABLE IF NOT EXISTS categories (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
)

CREATE TABLE IF NOT EXISTS posts_categories (
    id_post_category INT PRIMARY KEY AUTO_INCREMENT,
    id_category REFERENCES categories(id_category) NOT NULL,
    id_post REFERENCES posts(id_post) NOT NULL, 
)

CREATE TABLE IF NOT EXISTS likes_posts (
    id_like INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(32) REFERENCES users(nickname),
    id_post INT REFERENCES posts(id_post),
    date DATE NOT NULL
)

CREATE TABLE IF NOT EXISTS comments(
    id_comment INT PRIMARY KEY AUTO_INCREMENT,
    nickname REFERENCES users(nickname) NOT NULL,
    id_post REFERENCES posts(id_post) NOT NULL,
    content TEXT NOT NULL -- TODO: app-side max 5000 characters 
    date DATE NOT NULL
)

