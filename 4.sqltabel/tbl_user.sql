CREATE TABLE tbl_user (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    foto_profile VARCHAR(100),           
    ukuran_file INT,           
    jenis_file VARCHAR(100),             
    nama_user VARCHAR(100) NOT NULL,           
    username VARCHAR(100) NOT NULL UNIQUE,     
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') NOT NULL       
);


INSERT INTO tbl_user (foto_profile, ukuran_file, jenis_file, nama_user, username, password, email, role) 
VALUES
('profile1.jpg', 1024, 'image/jpeg', 'Andi', 'andi123', 'password123', 'andi123@gmail.com', 'admin'),
('profile2.png', 2048, 'image/png', 'Budi', 'budi456', 'password456', 'budi456@yahoo.com', 'user'),
('profile3.jpg', 512, 'image/jpeg', 'Citra', 'citra789', 'password789', 'citra789@hotmail.com', 'user'),
('profile4.png', 3072, 'image/png', 'Dewi', 'dewi321', 'password321', 'dewi321@gmail.com', 'admin'),
('profile5.jpg', 1536, 'image/jpeg', 'Eko', 'eko654', 'password654', 'eko654@outlook.com', 'user');
