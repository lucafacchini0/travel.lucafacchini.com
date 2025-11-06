-- Database is created automatically by Docker Compose
USE blog;

-- ====================================================
--               DATABASE STRUCTURE
-- ====================================================

CREATE TABLE IF NOT EXISTS countries (
    id_country INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL UNIQUE 
);

CREATE TABLE IF NOT EXISTS places (
    id_place INT PRIMARY KEY AUTO_INCREMENT,
    id_country INT,
    name VARCHAR(128) NOT NULL,
    description TEXT,
    score INT DEFAULT 5,

    FOREIGN KEY (id_country) REFERENCES countries(id_country)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    UNIQUE (name, id_country)
);

CREATE TABLE IF NOT EXISTS colors (
    id_color INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS tags (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    id_color INT NOT NULL,

    FOREIGN KEY (id_color) REFERENCES colors(id_color)
        ON UPDATE CASCADE
        ON DELETE NO ACTION 
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

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_country) REFERENCES countries(id_country)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CHECK (CHAR_LENGTH(password) >= 8) 
);

CREATE TABLE IF NOT EXISTS posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(32),
    id_place INT,
    title VARCHAR(128) NOT NULL,
    published_on DATE NOT NULL,
    description TEXT,
    thumbnail VARCHAR(1024),
    thumbnail_alt VARCHAR(128),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (author) REFERENCES users(nickname)
        ON UPDATE CASCADE
        ON DELETE SET NULL,

    FOREIGN KEY (id_place) REFERENCES places(id_place)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS categories (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS posts_categories (
    id_post_category INT PRIMARY KEY AUTO_INCREMENT,
    id_category INT NOT NULL,
    id_post INT NOT NULL,

    FOREIGN KEY (id_category) REFERENCES categories(id_category)
        ON UPDATE CASCADE
        ON DELETE CASCADE, 
    
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    UNIQUE (id_post, id_category) 
);

CREATE TABLE IF NOT EXISTS posts_tags (
    id_post_tag INT PRIMARY KEY AUTO_INCREMENT,
    id_tag INT NOT NULL,
    id_post INT NOT NULL,

    FOREIGN KEY (id_tag) REFERENCES tags(id_tag)
        ON UPDATE CASCADE
        ON DELETE CASCADE, 

    FOREIGN KEY (id_post) REFERENCES posts(id_post)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    UNIQUE (id_post, id_tag)
);

CREATE TABLE IF NOT EXISTS likes_posts (
    id_like INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(32),
    id_post INT,
    date DATE NOT NULL,
    FOREIGN KEY (nickname) REFERENCES users(nickname)
        ON UPDATE CASCADE
        ON DELETE CASCADE, 
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    UNIQUE (nickname, id_post)
);

CREATE TABLE IF NOT EXISTS comments ( 
    id_comment INT PRIMARY KEY AUTO_INCREMENT, 
    nickname VARCHAR(32) NOT NULL, 
    id_post INT NOT NULL, 
    content TEXT NOT NULL, 
    date DATE NOT NULL, 

    FOREIGN KEY (nickname) REFERENCES users(nickname) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE, 

    FOREIGN KEY (id_post) REFERENCES posts(id_post) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE 
);


-- ====================================================
--         DEVELOPMENT EXAMPLE ENTRIE(S)
-- ====================================================

-- === COUNTRIES ===
INSERT INTO countries (name)
VALUES 
    ('Italy'),
    ('Switzerland'),
    ('Germany');

-- === PLACES ===
INSERT INTO places (id_country, name, description)
VALUES 
    (1, 'Milan', 'Modern city known for fashion and design.'),
    (2, 'Zurich', 'Financial hub surrounded by the Alps.'),
    (3, 'Berlin', 'Capital of Germany, rich in history.');

-- === COLORS ===
INSERT INTO colors (name)
VALUES 
    ('Red'),
    ('Green'),
    ('Blue'),
    ('Yellow');

-- === TAGS ===
INSERT INTO tags (name, id_color)
VALUES 
    ('Travel', 1),
    ('Nature', 2),
    ('City', 3),
    ('Culture', 4);

-- === USERS ===
INSERT INTO users (nickname, email, password, role, name, surname, id_country, bio, profile_picture)
VALUES
    ('admin', 'admin@example.com', 'admin12345', 'admin', 'Admin', 'User', 1, 'System administrator.', NULL),
    ('luca', 'luca@example.com', 'password123', 'user', 'Luca', 'Bianchi', 1, 'Hi! I love coding, Linux, and cybersecurity.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png'),
    ('anna', 'anna@example.com', 'strongpass', 'user', 'Anna', 'Rossi', 2, 'Traveler and photographer.', NULL);

-- === POSTS ===
INSERT INTO posts (author, id_place, title, published_on, description, thumbnail)
VALUES
    ('luca', 2, 'A Day in Zurich', '2025-11-03', 'Exploring Zurich, its lakes, and Swiss architecture.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png'),
    ('anna', 1, 'Weekend in Milan', '2025-11-01', 'Best cafes and design spots in Milan.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png');

-- === CATEGORIES ===
INSERT INTO categories (name)
VALUES 
    ('Travel Guide'),
    ('Lifestyle'),
    ('Technology');

-- === POSTS_CATEGORIES ===
INSERT INTO posts_categories (id_category, id_post)
VALUES
    (1, 1),
    (2, 2);

-- === POSTS_TAGS ===
INSERT INTO posts_tags (id_tag, id_post)
VALUES
    (1, 1),
    (3, 2);

-- === LIKES_POSTS ===
INSERT INTO likes_posts (nickname, id_post, date)
VALUES
    ('anna', 1, '2025-11-03'),
    ('luca', 2, '2025-11-02');

-- === COMMENTS ===
INSERT INTO comments (nickname, id_post, content, date)
VALUES
    ('anna', 1, 'Beautiful photos, Luca!', '2025-11-03'),
    ('luca', 2, 'Milan never disappoints!', '2025-11-02');