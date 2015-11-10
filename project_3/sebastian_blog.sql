USE sebastian_blog;

CREATE TABLE IF NOT EXISTS posts (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    BlogPost TEXT,
    DatePosted DATE,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS chapters (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    ChapterTitle VARCHAR(255) NOT NULL,
    ChapterText TEXT,
    DatePosted DATE,
    PRIMARY KEY (ID)
);