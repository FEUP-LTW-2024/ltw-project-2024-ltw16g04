PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
id INT PRIMARY KEY NOT NULL,
name TEXT NOT NULL,
phone TEXT NOT NULL UNIQUE,
email TEXT NOT NULL UNIQUE,
password TEXT NOT NULL
);

DROP TABLE IF EXISTS ITEMS;

CREATE TABLE ITEMS(
id INT PRIMARY KEY NOT NULL,
name TEXT NOT NULL,
description TEXT NOT NULL,
price DECIMAL(10, 2) NOT NULL,
category TEXT NOT NULL,
condition TEXT NOT NULL,
location TEXT NOT NULL,
seller_id INT NOT NULL,
FOREIGN KEY (seller_id) REFERENCES USERS(id)
);

DROP TABLE IF EXISTS REPORT_ITEM;

CREATE TABLE REPORT_ITEM(
id INT PRIMARY KEY NOT NULL,
item_id INT NOT NULL,
description TEXT NOT NULL,
FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS REVIEWS;

CREATE TABLE REVIEWS (
    id INT PRIMARY KEY NOT NULL,
    item_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES ITEMS(id),
    FOREIGN KEY (user_id) REFERENCES USERS(id)
);

DROP TABLE IF EXISTS TRANSACTIONS;

CREATE TABLE TRANSACTIONS (
    id INT PRIMARY KEY NOT NULL,
    buyer_id INT NOT NULL,
    seller_id INT NOT NULL,
    item_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    status TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (buyer_id) REFERENCES USERS(id),
    FOREIGN KEY (seller_id) REFERENCES USERS(id),
    FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS FAVORITES;

CREATE TABLE FAVORITES ( 
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    PRIMARY KEY (user_id, item_id),
    FOREIGN KEY (user_id) REFERENCES USERS(id),
    FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS MESSAGES;

CREATE TABLE MESSAGES (
    id INT PRIMARY KEY NOT NULL,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES USERS(id),
    FOREIGN KEY (receiver_id) REFERENCES USERS(id)
);


DROP TABLE IF EXISTS IMAGES;

CREATE TABLE IMAGES (
    id INT PRIMARY KEY NOT NULL,
    item_id INT NOT NULL,
    url TEXT NOT NULL,
    FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS CATEGORIES;

CREATE TABLE CATEGORIES (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);
-- Inserir 10 usuários aleatórios na tabela USERS com IDs especificados
INSERT INTO USERS (id, name, phone, email, password) VALUES
    (1, 'John Doe', '1234567890', 'john@example.com', 'password1'),
    (2, 'Jane Smith', '9876543210', 'jane@example.com', 'password2'),
    (3, 'Michael Johnson', '5556667777', 'michael@example.com', 'password3'),
    (4, 'Emily Brown', '1112223333', 'emily@example.com', 'password4'),
    (5, 'David Wilson', '9998887777', 'david@example.com', 'password5'),
    (6, 'Sarah Taylor', '4443332222', 'sarah@example.com', 'password6'),
    (7, 'Christopher Martinez', '7778889999', 'christopher@example.com', 'password7'),
    (8, 'Jessica Anderson', '2223334444', 'jessica@example.com', 'password8'),
    (9, 'Ryan Thomas', '8887776666', 'ryan@example.com', 'password9'),
    (10, 'Amanda Garcia', '6665554444', 'amanda@example.com', 'password10');


