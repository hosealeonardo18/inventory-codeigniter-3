-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table inventory.categories: ~1 rows (approximately)
INSERT INTO `categories` (`id`, `uid`, `name`) VALUES
	(1, 'asdasd\r\n', 'Elektronik');

-- Dumping data for table inventory.inventory: ~3 rows (approximately)
INSERT INTO `inventory` (`id_barang`, `slug`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`, `image`, `created_at`, `category_id`) VALUES
	(3, 'realme-5-pro', 'EL0002', 'Realme 5 Pro', 4, 'unit', 2800000, 1, 'realme_51.jpg', '2023-07-06', 1),
	(4, 'laptop-rog', 'EL0003', 'Laptop ROG', 2, 'unit', 15000000, 1, 'rog.jpg', '2023-07-06', 1),
	(8, 'asus-vivobook-pro-14x-oled', 'EL0003', 'Asus Vivobook Pro 14x OLED', 20, 'unit', 17000000, 1, 'OIP9.jpg', '2023-07-07', 1);

-- Dumping data for table inventory.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `uid`, `name`) VALUES
	(1, 'zSdeW', 'guest'),
	(2, 'sdaErs', 'admin'),
	(3, 'gfDFgvds', 'super_admin');

-- Dumping data for table inventory.transactions: ~0 rows (approximately)
INSERT INTO `transactions` (`id_transaction`, `user_id`, `id_barang`, `jumlah_barang_transaction`, `created_at`, `status`) VALUES
	(2, 2, 8, 5, '2023-07-07', '1');

-- Dumping data for table inventory.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `uid`, `fullname`, `image`, `email`, `password`, `role_id`) VALUES
	(2, NULL, 'Hosea Leonardo', NULL, 'hosealeonardo18@gmail.com', '$2y$10$/C0jtSWFei1rCREE4hIoluApRtZ7Qs52BzQ.BTTjufZmt97eRRqeG', 1),
	(3, NULL, 'developer', NULL, 'dev@developer.com', '$2y$10$YhpwFOG2S85CwBwWZ8.dp.S9OOpcSbeP4yKKxp4tdqtmaI0/.L8W6', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
