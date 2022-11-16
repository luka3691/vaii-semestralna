create or replace table categories
(
    id          int auto_increment
        primary key,
    name        text not null,
    description text null
);

create or replace table newsletters
(
    id          int auto_increment
        primary key,
    email       text                 not null,
    confirmed   tinyint(1) default 0 not null,
    orderUpdate tinyint(1) default 1 not null,
    newProduct  tinyint(1) default 1 not null,
    saleAlert   tinyint(1) default 1 not null,
    constraint newsletters_pk
        unique (email) using hash
);

create or replace table products
(
    id          int auto_increment
        primary key,
    name        text             not null,
    img         text             not null,
    price       double default 0 not null,
    description text             null,
    category_id int              not null,
    constraint products_categories_null_fk
        foreign key (category_id) references categories (id)
);

create or replace table users
(
    id         int auto_increment
        primary key,
    email      text not null,
    password   text not null,
    first_name text not null,
    last_name  text not null,
    constraint users_pk
        unique (email) using hash
);
INSERT INTO ins.newsletters (id, email, confirmed, orderUpdate, newProduct, saleAlert) VALUES (7, 'hhahha@jjj.sk', 0, 0, 0, 0);
INSERT INTO ins.newsletters (id, email, confirmed, orderUpdate, newProduct, saleAlert) VALUES (8, 'prankjapan@gmail.com', 0, 1, 0, 0);
INSERT INTO ins.newsletters (id, email, confirmed, orderUpdate, newProduct, saleAlert) VALUES (10, 'filadelfi@uniza.sk', 0, 1, 1, 1);

INSERT INTO ins.categories (id, name, description) VALUES (1, 'prosecco', null);
INSERT INTO ins.categories (id, name, description) VALUES (2, 'wine', null);
INSERT INTO ins.categories (id, name, description) VALUES (3, 'spritz', null);
INSERT INTO ins.categories (id, name, description) VALUES (4, 'olive oil', null);


INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (1, 'Montelliana - Prosecco DOC Treviso Frizzante Spago', 'prosecco-example.png', 4.6, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (2, 'Canah Valdobbiadene Prosecco Superiore DOCG Brut', 'canah-valdobbiadene-prosecco-superiore-docg-brut-biologico-365x1200.png', 5.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (3, 'Conca d''Oro - Prosseco Millesimato CuvĂ©e Oro DOC Treviso Brut', 'Concadoro-dO-Prosecco.png', 6.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (4, 'Conca d''oro - Conegliano Valdobbiadene Prosecco Superiore DOCG Extra Dry', 'Concadoro-dO-Millesimato.png', 6.9, null, 1);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (5, 'Cabernet Trevenzie', 'cabernet-trevenezie-igt-biologico-304x1200.png', 4.7, null, 2);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (6, 'Aperol Aperitivo', 'aperol-real.png', 11.9, null, 3);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (7, 'Perlage - Pinot grigio delle Venezie DOC', 'pinot-grigio-delle-venezie-doc-biologico-304x1200.png', 4.9, null, 2);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (8, 'Olearia del Garda - Lâ€™Augusto 0,75 l', 'laugusto.png', 5.7, null, 4);
INSERT INTO ins.products (id, name, img, price, description, category_id) VALUES (9, 'Olearia del Garda - Le Colline 0,75 l', 'colline-1240x1240.png', 5.7, null, 4);


