CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  `role` integer,
  `created_at` timestamp
);

CREATE TABLE `seminars` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `owner` int,
  `title` varchar(255),
  `date` varchar(255),
  `venue` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `attendees` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `seminar` integer,
  `district` varchar(255),
  `school` varchar(255),
  `name` varchar(255),
  `position` varchar(255),
  `contact` varchar(255),
  `gender` varchar(255),
  `age` integer,
  `pre_reg` date,
  `date` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `certificate` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `status` boolean,
  `seminar` integer,
  `attendee` integer,
  `cert_no` varchar(255)
);

ALTER TABLE `seminars` ADD FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

ALTER TABLE `attendees` ADD FOREIGN KEY (`seminar`) REFERENCES `seminars` (`id`);

ALTER TABLE `certificate` ADD FOREIGN KEY (`seminar`) REFERENCES `seminars` (`id`);

ALTER TABLE `certificate` ADD FOREIGN KEY (`attendee`) REFERENCES `attendees` (`id`);



