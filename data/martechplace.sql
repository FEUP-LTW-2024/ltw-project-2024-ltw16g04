PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
id INT PRIMARY KEY NOT NULL,
name TEXT NOT NULL,
address TEXT,
phone TEXT NOT NULL UNIQUE,
email TEXT NOT NULL UNIQUE,
admin BOOLEAN DEFAULT FALSE,
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

DROP TABLE IF EXISTS CATEGORIES;

CREATE TABLE CATEGORIES(
    id INT PRIMARY KEY NOT NULL,
    name TEXT NOT NULL
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
    item_name TEXT NOT NULL,
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
    (1, 'John Doe', 'Willow Street 24' ,'1234567890', 'john@example.com', '$2y$10$.TIqTQYZiEBbIJFIQKukqebIUkf6M3aX1AHJlm84nxtD4OqLIn.uu'),
    (2, 'Jane Smith', 'Campus Neight 13' ,'9876543210', 'jane@example.com', '$2y$10$Zb55hLKEeAVM6W0sb0az0OzeyJHoQRzI8dWp/7YZH2q6T53wTk7Hu'),
    (3, 'Michael Johnson','Bruxels Barrack 23' ,'5556667777', 'michael@example.com', '$2y$10$.IQRmiWUz15fLKlc5sT6pezsz.tghZIjyaOJepPfddVenEuQ0Vjma'),
    (4, 'Emily Brown', 'Crossriver side 13' ,'1112223333', 'emily@example.com', '$2y$10$NiKrE2oLk4y8FDKkXparqu8j4i01dfH/wNj5lP/715ugvQcgef0OO'),
    (5, 'David Wilson', 'Landlust 123' ,'9998887777', 'david@example.com', '$2y$10$awRmIObKfNpAw3lyVQWkpOTAq4gOYW3nMASXGJ73JVEMJc1hDJGAW'),
    (6, 'Sarah Taylor', 'Pork Ranch 13','4443332222', 'sarah@example.com', '$2y$10$eHSI0db0MpDSqktjXMi1FO.IYfBdwbQyBy6W37z/4.Ys/UEXWB96O'),
    (7, 'Christopher Martinez', 'CruiseSide 131','7778889999', 'christopher@example.com', '$2y$10$5ysRncUlPEfweXTvHQjgkOJvAkypaot6qEZ791mtjaD6QdeSFLa7e'),
    (8, 'Jessica Anderson', 'Fenix Map 24','2223334444', 'jessica@example.com', '$2y$10$14dgc3k1Te4IsVgJujVOtO8Yb1Eawh1Cni3QojWqMHUHa6sn3i9MK'),
    (9, 'Ryan Thomas', 'LandSlide 32','8887776666', 'ryan@example.com', '$2y$10$bXv84kLcw9wvC8hSM8fSmeX2tdTy4bvJwWz45jrTQ3SpqTR5gSNpS'),
    (10, 'Amanda Garcia', 'Palm Beach 13','6665554444', 'amanda@example.com', '$2y$10$lu/oz3gyAOVbnUr4HhpZ8..Oy7hkqbs9VnH6zbQe2kJtdhsNECbbe');

INSERT INTO USERS(id,name,address,phone,email,admin,password) VALUES 
    (11,'Admin','Admin Street 1','313092028','admin@martech.com',TRUE,'$2y$10$KR14h9O7bPg.JSItFtXLNupwJa4YErbVKE2mmeSKhyMAntCL0U33m');


INSERT INTO ITEMS (id, name, description, price, old_price, category, condition, location, main_image, published_time, seller_id) VALUES
    (1, 'Iphone 13 Pro Max', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 25.00, 45.00, 'Smartphones', 'Fair', 'Rua de Antonio Enes, Porto', '../images/items/iphonemain.jpeg', '2024-05-15 10:34:00', 1),
    (2, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Peripheral Devices', 'Like new', 'Rua da Maia, 134', '../images/items/gameController.png', '2024-05-15 10:19:00', 2),
    (3, 'HAVIT HV-G92 Gamepad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 4.30, 15.40, 'Peripheral Devices', 'Used', 'Rua de Pedro Cabral Santos, 134', '../images/items/gameController.png', '2024-02-15 10:00:00', 3),
    (4, 'Canon 1200D 18-55 + 16GB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 12.90, 15.40, 'Audio, Photo & Video', 'New', 'Rua da Maia, 134', '../images/items/camera.png', '2024-04-30 10:00:00', 4),
    (5, 'Airpods 2 Gen', 'Used two times, like new.', 40.90, NULL, 'Headphones', 'Like new', 'Rua da Souza, 124', '../images/items/airpodgen2.jpg', '2024-04-24 10:00:00', 5),
    (6, 'Nikon Camera', 'With some scratches but works just fine, comes with one lens', 80.00, NULL, 'Cameras', 'Fair', 'Rua da Rosa, 100', '../images/items/cameranikon.png', '2024-04-15 10:00:00', 6),
    (7, 'Macbook Pro 2019', 'Used for 2 years, in good condition, comes with charger', 1000.00, 1200.00, 'Computers', 'Fair', 'Rua da Maia, 134', '../images/items/macbookpro.png', '2023-05-15 10:00:00', 7),
    (8, 'Samsung Galaxy S21', 'Brand new, never used, comes with charger and box', 500.00, NULL, 'Smartphones', 'New', 'Rua da Maia, 134', '../images/items/samsungs21.png', '2024-04-15 10:00:00', 8),
    (9, 'WH-CH520 wireless', 'Used for 6 months, in good condition, comes with charger', 50.00, 70.00, 'Peripheral Devices', 'Fair', 'Rua da Maia, 134', '../images/items/sonyheadphones.png', '2023-11-15 10:00:00', 9),
    (11, 'TecPix 2342 Modelo C', 'Just bought it for my wifes anniversary but she hated it, never used, we are getting divorced', 50.00, 70.00, 'Audio, Photo & Video', 'New', 'Rua da Maia, 134', '../images/items/camerazinhas2.jpeg', '2023-11-15 10:00:00', 3),
    (12, 'StandBy Samsung #234', 'Used to work perfectly but my son used it for TikTok videos and now its broken.', 200.00, 150.00, 'Audio, Photo & Video', 'Damaged', 'Rua da Maia, 134', '../images/items/camerazona.jpeg', '2023-11-15 10:00:00', 7),
    (13, 'SuperNova 2342 Modelo A', 'Very good quality photos BUY NOW', 400.00, 300.00, 'Audio, Photo & Video', 'Damaged', 'Rua da Maia, 134', '../images/items/images.jpeg', '2023-11-15 10:00:00', 3),
    (14, 'RAM 16GB Intel', 'Not compatible with my current notebook but it is in perfect condition', 500.00, 70.00, 'Components', 'New', 'Rua da Asprela, 345', '../images/items/memoriaRam.jpeg', '2023-11-15 10:00:00', 3),
    (15, 'Samsung Watch Series 4', 'Just bought it for my wifes anniversary but she hated it, never used, we are getting divorced', 20.00, 15.00, 'Watches', 'Fair', 'Rua da Maia, 134', '../images/items/smartwatch.jpeg', '2023-11-15 10:00:00', 10),
    (16, 'SSD 2TB SuperVidea', 'In perfect condition used for 3 months', 200.00, 150.00, 'Components', 'New', 'Rua da Maia, 134', '../images/items/ssd.jpeg', '2023-11-15 10:00:00', 3),
    (17, 'Ipad Series 9', 'Just bought it for my wifes anniversary but she hated it, never used, we are getting divorced', 50.00, 70.00, 'Tablets', 'Damaged', 'Rua da Maia, 134', '../images/items/tablet.jpeg', '2023-11-15 10:00:00', 3),
    (10, 'Xbox Series X', 'Brand new, never used, comes with controller and box', 600.00, NULL, 'Consoles', 'New', 'Rua da Maia, 134', '../images/items/xboxseriesx.jpg', '2024-04-15 10:00:00', 10);

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


INSERT INTO CATEGORIES(id,name) VALUES 
      (1, 'Audio, Photo & Video'),
      (2, 'Components'),
      (3, 'Computers'),
      (4, 'Consoles'),
      (5, 'Peripheral Devices'),
      (6, 'Smartphones'),
      (7, 'Tablets'),
      (8, 'Watches');