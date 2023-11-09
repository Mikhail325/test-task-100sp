TRUNCATE TABLE purchases, type_purchases, cities;
CREATE TABLE IF NOT EXISTS type_purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255),
            created_at timestamp
            );
CREATE TABLE IF NOT EXISTS cities (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255),
            created_at timestamp
            );
CREATE TABLE IF NOT EXISTS purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            citi_id bigint REFERENCES cities (id),
            type_id bigint REFERENCES type_purchases (id),
            name varchar(255),
            url_foto varchar(255),
            url varchar(255),
            created_at timestamp
            );