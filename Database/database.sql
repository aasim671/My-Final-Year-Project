-- *************************
-- *************************


-- Database name : ecommerce

-- *************************
-- *************************

-- Creating Users Table.

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Creating User Info Table 

CREATE TABLE user_info (

  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255) NOT NULL,
  user_email VARCHAR(255) NOT NULL,
  user_address VARCHAR(255) NOT NULL,
  user_city VARCHAR(255) NOT NULL,
  user_phone VARCHAR(255) NOT NULL,
  user_gender ENUM('Male', 'Female') NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserting Dummy Data Into Users Table. 

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`) VALUES ('1', 'Hilal Ahmad', 'hilaldev123@gmail.com', 'Ajk_573@ceo');
INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`) VALUES ('2', 'Jawad Ali', 'jawad@gmail.com', 'jawad1234');
INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`) VALUES ('3', 'Adnan Wali', 'adnan@gmail.com', 'adnan1234');
INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`) VALUES ('4', 'Asim Qari', 'asim@gmail.com', 'asim1234');

-- Inserting Dummy Data Into user_info Table 

INSERT INTO `user_info` (`id`, `user_name`, `user_email`, `user_address`, `user_city`, `user_phone`, `user_gender`, `user_id`) VALUES ('1', 'Hilal Ahmad', 'hilaldev123@gmail.com', 'Kaloshah fazalabad takht bhai mardan', 'Mardan', '03096773855', 'Male', '1');

INSERT INTO `user_info` (`id`, `user_name`, `user_email`, `user_address`, `user_city`, `user_phone`, `user_gender`, `user_id`) VALUES ('2', 'Jawad Ali', 'jawad@gmail.com', 'sheikh yousaf mardan', 'Mardan', '03369854721', 'Male', '2');

INSERT INTO `user_info` (`id`, `user_name`, `user_email`, `user_address`, `user_city`, `user_phone`, `user_gender`, `user_id`) VALUES ('3', 'Adnan Wali', 'adnan@gmail.com', 'khat kly bahlola distt charsadda', 'Charsadda', '03369854721', 'Male', '3');

-- Updating user_info record

UPDATE `user_info` SET `user_name` = 'Jawad Ali1234', `user_email` = 'jawad@gmail.com1234', `user_address` = 'afadfadfdfadfadfadf4', `user_city` = 'afdfasdf4', `user_phone` = '033671268045', `user_gender` = 'Female' WHERE `user_info`.`id` = 6;


-- Creating post table 

CREATE TABLE posts (

  id INT PRIMARY KEY AUTO_INCREMENT,
  laptop_name VARCHAR(255),
  laptop_price INT,
  laptop_detail VARCHAR(255),
  laptop_condition VARCHAR(20),
  laptop_location VARCHAR(100),
  user_phone VARCHAR(100),
  laptop_photo VARCHAR(255),
  user_id INT,
  time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE

);


-- Adding Dummy Data To Posts 

INSERT INTO `posts` (`id`, `laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES ('1', 'Hp core i5', '40000', 'condition used 128gb ram 5th generation battery timing 5 hours', 'New', 'kalo shah takht bhai', '03367126804', 'hp.jpg', '1', current_timestamp());

INSERT INTO `posts` (`id`, `laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES ('2', 'Dell core i3', '27000', 'condition used 128gb ram 3rd generation touch screen 4gb ram', 'Used', 'village sheikh yousaf mardan', '03485566123', 'dell.jpg', '2', current_timestamp());

INSERT INTO `posts` (`id`, `laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES ('3', 'Apple macbook pro', '235300', '8-core CPU with 4 performance cores and 4 efficiency cores 10-core GPU 16-core Neural Engine 100GB/s memory bandwidth, 256GB SSD,500 nits brightness Wide color (P3) True Tone technology', 'New', 'block f8 street no 4 home 22 bahria town', '03188456123', 'apple.jpg', '2', current_timestamp());

INSERT INTO `posts` (`id`, `laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES ('4', 'Infinix INBook X1 Pro', '46500', 'Core i7 10th Gen 16 GB/512 GB SSD Thin and Light Laptop Stylish & Portable Thin and Light Laptop14 Inch Full HD IPS Display Finger Print', 'Used', 'kalo shah takht bhai mardan', '03268899456', 'infinix.jpg', '3', current_timestamp());

INSERT INTO `posts` (`id`, `laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES ('5', 'Surface laptop 4', '169830', 'Choice of 11th Gen Intel® Core Portable 13.5” touchscreen in Ice Blue, with warm, luxurious Alcantara® material.', 'New', 'islamabad phase 8 sector 3', '03361556633', 'microsoft.jpg', '3', current_timestamp());


-- Creating messages table 

CREATE TABLE messages (
  id INT(11) NOT NULL AUTO_INCREMENT,
  sender_id INT(11) NOT NULL,
  receiver_id INT(11) NOT NULL,
  message VARCHAR(255) NOT NULL,
  sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_by INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (sender_id) REFERENCES users(id),
  FOREIGN KEY (receiver_id) REFERENCES users(id),
  FOREIGN KEY (created_by) REFERENCES users(id)
);




-- Inserting dummy messages

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`, `created_by`) VALUES ('1', '1', '2', 'To jawad', current_timestamp(), '1');

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`, `created_by`) VALUES ('2', '2', '1', 'To Hilal', current_timestamp(), '2');