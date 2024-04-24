PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
id INT PRIMARY KEY NOT NULL,
name TEXT NOT NULL,
address TEXT NOT NULL,
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
old_price DECIMAL(10, 2),
category TEXT NOT NULL,
condition TEXT NOT NULL,
location TEXT NOT NULL,
main_image TEXT NOT NULL,
published_time TEXT NOT NULL,
seller_id INT NOT NULL,
FOREIGN KEY (seller_id) REFERENCES USERS(id)
);



DROP TABLE IF EXISTS THUMBNAILS;

CREATE TABLE THUMBNAILS(
    id INT PRIMARY KEY NOT NULL,
    item_id INT NOT NULL,
    url TEXT NOT NULL,
    FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS REPORT_ITEM;

CREATE TABLE REPORT_ITEM(
id INT PRIMARY KEY NOT NULL,
item_id INT NOT NULL,
description TEXT NOT NULL,
FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

DROP TABLE IF EXISTS COMMENTS;

CREATE TABLE COMMENTS (
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

DROP TABLE IF EXISTS BILLING;

CREATE TABLE BILLING (
    id INTEGER PRIMARY KEY,
    user_id INTEGER NOT NULL,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    street TEXT NOT NULL,
    apartment TEXT,
    city TEXT NOT NULL,
    email TEXT NOT NULL,
    phone TEXT NOT NULL
);

DROP TABLE IF EXISTS BILLING_ITEMS;

CREATE TABLE BILLING_ITEMS (
    id INTEGER PRIMARY KEY,
    billing_id INTEGER NOT NULL,
    item_id INTEGER NOT NULL,
    FOREIGN KEY (billing_id) REFERENCES BILLING(id),
    FOREIGN KEY (item_id) REFERENCES ITEMS(id)
);

-- Inserir 10 usuários aleatórios na tabela USERS com IDs especificados
INSERT INTO USERS (id, name, address ,phone, email, password) VALUES
    (1, 'John Doe', 'Willow Street 24' ,'1234567890', 'john@example.com', 'password1'),
    (2, 'Jane Smith', 'Campus Neight 13' ,'9876543210', 'jane@example.com', 'password2'),
    (3, 'Michael Johnson','Bruxels Barrack 23' ,'5556667777', 'michael@example.com', 'password3'),
    (4, 'Emily Brown', 'Crossriver side 13' ,'1112223333', 'emily@example.com', 'password4'),
    (5, 'David Wilson', 'Landlust 123' ,'9998887777', 'david@example.com', 'password5'),
    (6, 'Sarah Taylor', 'Pork Ranch 13','4443332222', 'sarah@example.com', 'password6'),
    (7, 'Christopher Martinez', 'CruiseSide 131','7778889999', 'christopher@example.com', 'password7'),
    (8, 'Jessica Anderson', 'Fenix Map 24','2223334444', 'jessica@example.com', 'password8'),
    (9, 'Ryan Thomas', 'LandSlide 32','8887776666', 'ryan@example.com', 'password9'),
    (10, 'Amanda Garcia', 'Palm Beach 13','6665554444', 'amanda@example.com', 'password10');


INSERT INTO ITEMS (id, name, description, price, old_price, category, condition, location, main_image,published_time, seller_id) VALUES
    (1, 'Iphone 13 Pro Max', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
    25.00, 45.00, 'Electronics', 'Grade A+', 'Rua de Antonio Enes, Porto', '../images/items/iphonemain.jpeg','10:34', 1),
    (2, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Peripheral Devices', 'Like new', 'Rua da Maia, 134', '../images/items/gameController.png', '15 minutes', 2);
    (2, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 4.30, 15.40, 'Peripheral Devices', 'Used', 'Rua de Pedro Cabral Santos, 134', '../images/items/gameController.png', '3 months', 3);
    (2, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Peripheral Devices', 'Like new', 'Rua da Maia, 134', '../images/items/gameController.png', '2 weeks', 4);

INSERT INTO THUMBNAILS(id, item_id, url) VALUES
    (1, 1, '../images/items/iphone1.jpeg'),
    (2, 1, '../images/items/iphone2.jpeg'),
    (3, 1, '../images/items/iphone3.jpeg');


INSERT INTO COMMENTS (id, item_id, user_id, rating, comment, created_at) VALUES
    (1, 1, 2, 5, 'Great product, fast delivery!', '2022-01-01 12:00:00'),
    (2, 1, 3, 4, 'Good quality, but took a while to arrive', '2022-01-02 12:00:00'),
    (3, 1, 4, 3, 'Not as described, disappointed', '2022-01-03 12:00:00');