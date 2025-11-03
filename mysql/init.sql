-- Database Draft - 1.0

CREATE TABLE IF NOT EXISTS countries (
    id_country INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS places (
    id_place INT PRIMARY KEY AUTO_INCREMENT,
    id_country INT,
    name VARCHAR(128) NOT NULL,
    description TEXT,

    FOREIGN KEY (id_country) REFERENCES countries(id_country)
);

CREATE TABLE IF NOT EXISTS colors (
    id_color INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS tags (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    id_color INT NOT NULL,

    FOREIGN KEY (id_color) REFERENCES colors(id_color)
);

CREATE TABLE IF NOT EXISTS posts_tags (
    id_post_tag INT PRIMARY KEY AUTO_INCREMENT,
    id_tag INT,
    id_post INT,

    FOREIGN KEY (id_tag) REFERENCES tags(id_tag),
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
);

CREATE TABLE IF NOT EXISTS users (
    nickname VARCHAR(32) PRIMARY KEY,
    email VARCHAR(128) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user' NOT NULL,
    name VARCHAR(64),
    surname VARCHAR(64),
    id_country INT,
    bio TEXT,
    profile_picture VARCHAR(1024),

    FOREIGN KEY (id_country) REFERENCES countries(id_country) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(32),
    id_place INT,
    title VARCHAR(128) NOT NULL,
    date DATE NOT NULL,
    description TEXT,
    thumbnail VARCHAR(1024),

    FOREIGN KEY (author) REFERENCES users(nickname),
    FOREIGN KEY (id_place) REFERENCES places(id_place)
);

CREATE TABLE IF NOT EXISTS categories (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS posts_categories (
    id_post_category INT PRIMARY KEY AUTO_INCREMENT,
    id_category INT NOT NULL,
    id_post INT NOT NULL,

    FOREIGN KEY (id_category) REFERENCES categories(id_category),
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
);

CREATE TABLE IF NOT EXISTS likes_posts (
    id_like INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(32),
    id_post INT,
    date DATE NOT NULL,

    FOREIGN KEY (nickname) REFERENCES users(nickname),
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
);

CREATE TABLE IF NOT EXISTS comments (
    id_comment INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(32) NOT NULL,
    id_post INT NOT NULL,
    content TEXT NOT NULL,
    date DATE NOT NULL,
    
    FOREIGN KEY (nickname) REFERENCES users(nickname),
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
);