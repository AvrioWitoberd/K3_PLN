CREATE DATABASE IF NOT EXISTS `sim_k3_pln`;
USE `sim_k3_pln`;

CREATE TABLE IF NOT EXISTS `matriks_risiko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(255) NOT NULL,
  `sumber_bahaya` text NOT NULL,
  `kategori` enum('badge--danger','badge--warning','badge--info') NOT NULL,
  `tindakan_pencegahan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `matriks_risiko` (`lokasi`, `sumber_bahaya`, `kategori`, `tindakan_pencegahan`) VALUES
('Area Gardu Induk / Panel Tegangan Tinggi', 'Peralatan bertegangan (Busbar, Transformator)', 'badge--danger', 'Rambu bahaya, pembatasan akses, pemeliharaan rutin, Helm dielektrik, Sarung tangan isolasi'),
('Menara Transmisi (SUTET/SUTT)', 'Ketinggian (>1,8 meter)', 'badge--danger', 'Pelatihan ketinggian, buddy system, Full body harness, double lanyard'),
('Ruang Mesin Pembangkit (Turbin/Genset)', 'Mesin berputar & beroperasi (Kebisingan tinggi)', 'badge--warning', 'Peredam suara, batasi durasi kerja, Ear muff/plug, Safety glasses'),
('Gudang Material & Logistik', 'Tumpukan material, Forklift', 'badge--info', 'Label kapasitas, jalur pedestrian, rak stabil, Sepatu safety toe cap, Helm proyek');
