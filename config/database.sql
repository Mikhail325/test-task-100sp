DROP TABLE IF EXISTS purchases, type_purchases, sities;
CREATE TABLE type_purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255)
            );
CREATE TABLE sities (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255)
            );
CREATE TABLE purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            type_id bigint REFERENCES type_purchases (id),
            siti_id bigint REFERENCES sities (id),
            name varchar(255),
            url_foto varchar(255),
            url varchar(255)
            );