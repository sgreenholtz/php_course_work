Create table postInfo (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    postID,
    datePosted DATE,
    PRIMARY KEY (ID)
);

CREATE TABLE posts (
    postID INT(11) NOT NULL AUTO_INCREMENT,
    blogpost TEXT,
    PRIMARY KEY (ID)
);