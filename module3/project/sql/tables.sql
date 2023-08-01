-- create user information
CREATE TABLE users (
    ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    username VARCHAR(20) NOT NULL,
    password CHAR(60) NOT NULL,
    PRIMARY KEY (user_ID)
) default character set = utf8;

CREATE TABLE stories (
    ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_ID SMALLINT UNSIGNED NOT NULL,
    content TEXT NOTNULL,
    time TIMESTAMP NOT NULL default current_timestamp,
    PRIMARY KEY (story_ID),
    FOREIGN KEY (user_ID) references users (ID)
) default character set = utf8;

CREATE TABLE comments (
    comment_ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    story_ID SMALLINT UNSIGNED NOT NULL,
    user_ID SMALLINT UNSIGNED NOT NULL,
    content TEXT NOTNULL,
    time TIMESTAMP NOT NULL default current_timestamp,
    PRIMARY KEY (comment_ID)
    FOREIGN KEY (user_ID) references users (ID)
    FOREIGN KEY (story_ID) references stories (ID)
) default character set = utf8;