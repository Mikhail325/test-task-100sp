CREATE TABLE IF NOT EXISTS type_purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            name varchar(255),
            );
CREATE TABLE IF NOT EXISTS purchases (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
            type_id bigint REFERENCES type_purchases (id),
            name varchar(255),
            url_foto varchar(255),
            url varchar(255),
            );