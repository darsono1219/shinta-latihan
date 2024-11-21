CREATE TABLE guru (
    id_guru INT PRIMARY KEY AUTO_INCREMENT,
    nama_guru VARCHAR(100),
    alamat VARCHAR(255)
);

CREATE TABLE mapel (
    id_mapel INT PRIMARY KEY AUTO_INCREMENT,
    nama_mapel VARCHAR(100),
    semester INT,
    id_guru INT,
    FOREIGN KEY (id_guru) REFERENCES guru(id_guru) ON DELETE CASCADE
);


-- Insert data ke tabel guru
INSERT INTO guru (nama_guru, alamat) VALUES 
('Budi Santoso', 'Jl. Mawar No.10'),
('Siti Aminah', 'Jl. Melati No.15'),
('Andi Pratama', 'Jl. Kamboja No.25'),
('Lina Marlina', 'Jl. Anggrek No.18'),
('Joko Susanto', 'Jl. Kenanga No.5');

-- Insert data ke tabel mapel
INSERT INTO mapel (nama_mapel, semester, id_guru) VALUES 
('Matematika', 1, 1),
('Bahasa Indonesia', 1, 2),
('IPA', 2, 3),
('IPS', 2, 4),
('Bahasa Inggris', 1, 5);
