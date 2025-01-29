CREATE DATABASE christmas_wishes
USE christmas_wishes

CREATE TABLE user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_firstname VARCHAR(150),
    user_lastname VARCHAR(150),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
)

CREATE TABLE wishlist (
    wishlist_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    wishlist_year INT(4) NOT NULL,
    wishlist_recipient VARCHAR(150) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);
CREATE TABLE gift (
    gift_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gift_title VARCHAR(255) NOT NULL,
    gift_description TEXT,
    gift_link VARCHAR(255),
    gift_image VARCHAR(255),
    wishlist_id INT,
    FOREIGN KEY (wishlist_id) REFERENCES wishlist(wishlist_id) ON DELETE CASCADE
);