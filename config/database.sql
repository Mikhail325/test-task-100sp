DROP TABLE IF EXISTS purchases, type_purchases, cities;
CREATE TABLE type_purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255),
            created_at timestamp
            );
CREATE TABLE cities (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255),
            created_at timestamp
            );
CREATE TABLE purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            citi_id bigint REFERENCES cities (id),
            type_id bigint REFERENCES type_purchases (id),
            name varchar(255),
            url_foto varchar(255),
            url varchar(255),
            created_at timestamp
            );