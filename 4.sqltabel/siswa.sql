CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    jurusan VARCHAR(50) NOT NULL
);

INSERT INTO siswa (nama, kelas, jurusan) VALUES
('Ahmad Fauzi', '10A', 'IPA'),
('Siti Aminah', '10B', 'IPS'),
('Budi Santoso', '11A', 'Bahasa'),
('Rina Kartika', '11B', 'IPA'),
('Dimas Arya', '12A', 'IPS'),
('Dewi Lestari', '12B', 'Bahasa'),
('Hadi Pranoto', '10C', 'IPA'),
('Intan Permata', '11C', 'IPS'),
('Lina Agustin', '12C', 'Bahasa'),
('Wahyu Ramadhan', '10D', 'IPA');