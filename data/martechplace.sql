PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
id INT PRIMARY KEY NOT NULL,
name TEXT NOT NULL,
address TEXT,
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
published_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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

DROP TABLE IF EXISTS ORDERS;

CREATE TABLE ORDERS (
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
    id INTEGER PRIMARY KEY NOT NULL,
    from_user INT NOT NULL,
    to_user INT,
    message VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_user) REFERENCES USERS(id),
    FOREIGN KEY (to_user) REFERENCES USERS(id)
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
    25.00, 45.00, 'Smartphones', 'Fair', 'Rua de Antonio Enes, Porto', '../images/items/iphonemain.jpeg','10:34',1),
    (2, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Peripheral Devices', 'Like new', 'Rua da Maia, 134', '../images/items/gameController.png', '15 minutes',2),
    (3, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 4.30, 15.40, 'Peripheral Devices', 'Used', 'Rua de Pedro Cabral Santos, 134', '../images/items/gameController.png', '3 months',3),
    (4, 'Canon 1200D 18-55 + 16GB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Audio, Photo & Video', 'New', 'Rua da Maia, 134', '../images/items/camera.png', '2 weeks',4);

INSERT INTO THUMBNAILS(id, item_id, url) VALUES
    (1, 1, '../images/items/iphone1.jpeg'),
    (2, 1, '../images/items/iphone2.jpeg'),
    (3, 1, '../images/items/iphone3.jpeg');


INSERT INTO COMMENTS (id, item_id, user_id, rating, comment, created_at) VALUES
    (1, 1, 2, 5, 'Great product, fast delivery!', '2022-01-01 12:00:00'),
    (2, 1, 3, 4, 'Good quality, but took a while to arrive', '2022-01-02 12:00:00'),
    (3, 1, 4, 3, 'Not as described, disappointed', '2022-01-03 12:00:00');

-- Inserir algumas mensagens na tabela MESSAGES
INSERT INTO MESSAGES (id, from_user, to_user, message, created_at) VALUES
    (1, 1, 2, 'Oi Jane, você viu meu anúncio do iPhone?', '2022-03-10 10:00:00'),
    (2, 2, 1, 'Oi John, sim, vi sim. Está em bom estado?', '2022-03-10 10:10:00'),
    (3, 1, 2, 'Sim, está em ótimo estado, apenas um pouco usado.', '2022-03-10 10:15:00'),
    (4, 3, 1, 'E aí, John, quanto pelo controle do jogo?', '2022-03-11 09:30:00'),
    (5, 1, 3, 'Oi Michael, o preço está listado no anúncio, mas posso fazer um desconto.', '2022-03-11 09:35:00'),
    (6, 4, 1, 'Olá John, você ainda tem a câmera Canon 1200D para venda?', '2022-03-12 11:45:00'),
    (7, 1, 4, 'Oi Emily, sim, eu ainda tenho a câmera para venda.', '2022-03-12 11:50:00'),
    (8, 5, 10, 'Oi Amanda, você está vendendo algo novo?', '2022-03-13 14:00:00'),
    (9, 10, 5, 'Oi David, sim, tenho alguns itens novos chegando esta semana.', '2022-03-13 14:05:00'),
    (10, 7, 9, 'Ei Ryan, você viu o novo item que estou vendendo?', '2022-03-14 08:00:00');
