CREATE TABLE user_session (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO user_session (username, password) VALUES
('Ahmad', 'password'),
('Siti', 'password'),