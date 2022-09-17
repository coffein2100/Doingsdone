DROP DATABASE IF EXISTS doingsdone;
CREATE DATABASE doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
USE doingsdone;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL UNIQUE,
  user_password CHAR(255) NOT NULL,
  user_name VARCHAR(128) NOT NULL
);
CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name_project VARCHAR(128) NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  task_status INT DEFAULT 0,
  task_name VARCHAR(128) NOT NULL,
  task_file VARCHAR(255),
  date_finish DATE,
  user_id INT,
  project_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (project_id) REFERENCES projects(id)
);
