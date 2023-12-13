CREATE TABLE
    users(
        id int PRIMARY KEY AUTO_INCREMENT,
        username varchar(200),
        email varchar(200),
        age int,
        password varchar(200),
        role int
    );

CREATE TABLE
    movies(
        id int PRIMARY KEY AUTO_INCREMENT,
        name varchar(200),
        image varchar(200),
        date date
    )

