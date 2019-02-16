CREATE TABLE `user`(
	`user_id`   INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(60) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `email` VARCHAR(50) DEFAULT '',
    `phone` VARCHAR(10) DEFAULT '',
	PRIMARY KEY (`user_id`),
	UNIQUE KEY (`username`)
);

CREATE TABLE `morse_translation`(
	`trans_id` INT NOT NULL AUTO_INCREMENT,
	`original_text` VARCHAR(1000) NOT NULL,
	`translation_code` VARCHAR(1000) NOT NULL,
	`public` BOOLEAN NOT NULL DEFAULT true,
	`owner_id` INT NOT NULL,
	PRIMARY KEY (`trans_id`),
	FOREIGN KEY (`owner_id`) REFERENCES `user`(`user_id`)
);

CREATE TABLE `english_translation`(
	`trans_id` INT NOT NULL AUTO_INCREMENT,
	`original_code` VARCHAR(1000) NOT NULL,
	`translation_text` VARCHAR(1000) NOT NULL,
	`public` BOOLEAN NOT NULL DEFAULT true,
	`owner_id` INT NOT NULL,
	PRIMARY KEY (`trans_id`),
	FOREIGN KEY (`owner_id`) REFERENCES `user`(`user_id`)
);

CREATE TABLE `friendship`(
	`f_ship_id` INT NOT NULL AUTO_INCREMENT,
	`sender` INT NOT NULL,
	`recipient` INT NOT NULL,
	PRIMARY KEY (`f_ship_id`),
	FOREIGN KEY (`sender`) REFERENCES `user` (`user_id`),
	FOREIGN KEY (`recipient`) REFERENCES `user` (`user_id`)
);

CREATE TABLE `group`(
    `group_id` INT NOT NULL AUTO_INCREMENT,
    `group_name` VARCHAR(60) NOT NULL,
    `members` INT NOT NULL,
    `lead` INT,
	PRIMARY KEY (`group_id`),
	UNIQUE KEY (`group_name`),
	FOREIGN KEY (`lead`) REFERENCES `user`(`user_id`)
);

CREATE TABLE `membership`(
    `mem_id` INT NOT NULL AUTO_INCREMENT,
    `group_id` INT NOT NULL,
    `user_id` INT NOT NULL,
	PRIMARY KEY (`mem_id`),
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
);