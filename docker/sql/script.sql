create table cart_items
(
    id           int auto_increment
        primary key,
    cart_user_id int           not null,
    product_id   int           not null,
    quantity     int default 1 not null
);

create table carts
(
    id      int auto_increment
        primary key,
    user_id int not null
);

create table categories
(
    id          int auto_increment
        primary key,
    name        text not null,
    description text null
);

create table contacts
(
    id           int auto_increment
        primary key,
    name         text not null,
    organization text null,
    email        text not null,
    message      text not null
);

create table filters
(
    id         int auto_increment
        primary key,
    product_id int not null,
    price      int null,
    sweetness  int not null
);

create table newsletters
(
    id          int auto_increment
        primary key,
    email       text          not null,
    confirmed   int default 0 not null,
    orderUpdate int default 1 not null,
    newProduct  int default 1 not null,
    saleAlert   int default 1 not null
);

create table orders
(
    id         int auto_increment
        primary key,
    first_name text not null,
    last_name  text not null,
    email      text not null,
    oneaddress text not null,
    twoaddress text null,
    country    text not null,
    zip        int  not null,
    note       text null,
    cart_id    int  not null
);

create table products
(
    id          int auto_increment
        primary key,
    name        text   not null,
    img         text   not null,
    price       double not null,
    description int    null,
    category_id int    null
);

create table users
(
    id       int auto_increment
        primary key,
    email    text not null,
    password text null
);


INSERT INTO ins.categories (id, name, description) VALUES (1, 'prosecco', null);
INSERT INTO ins.categories (id, name, description) VALUES (2, 'wine', null);
INSERT INTO ins.categories (id, name, description) VALUES (3, 'spritz', null);
INSERT INTO ins.categories (id, name, description) VALUES (4, 'olive oil', null);


INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (1, 'Montelliana - Prosecco DOC Treviso Frizzante Spago', 'prosecco-example.png', 4.6, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (2, 'Canah Valdobbiadene Prosecco Superiore DOCG Brut', 'canah-valdobbiadene-prosecco-superiore-docg-brut-biologico-365x1200.png', 5.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (3, 'Conca dOro - Prosseco Millesimato CuvĂ©e Oro DOC Treviso Brut', 'Concadoro-dO-Prosecco.png', 6.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (4, 'Conca doro - Conegliano Valdobbiadene Prosecco Superiore DOCG Extra Dry', 'Concadoro-dO-Millesimato.png', 6.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (5, 'Cabernet Trevenzie', 'cabernet-trevenezie-igt-biologico-304x1200.png', 4.7, null, 2);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (6, 'Aperol Aperitivo', 'aperol-real.png', 11.9, null, 3);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (7, 'Perlage - Pinot grigio delle Venezie DOC', 'pinot-grigio-delle-venezie-doc-biologico-304x1200.png', 4.9, null, 2);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (8, 'Olearia del Garda - Lâ€™Augusto 0,75 l', 'laugusto.png', 5.7, null, 4);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (9, 'Olearia del Garda - Le Colline 0,75 l', 'colline-1240x1240.png', 5.7, null, 4);


INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (1, 1, 1, 1);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (2, 2, 2, 2);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (3, 3, 2, 2);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (4, 4, 2, 2);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (5, 5, 1, 4);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (6, 6, 3, 0);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (7, 7, 1, 3);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (8, 8, 2, 0);
INSERT INTO ins.filters (id, product_id, price, sweetness) VALUES (9, 9, 2, 0);
