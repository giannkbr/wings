ALTER TABLE `barang`
	ADD COLUMN `adjustment` FLOAT NULL DEFAULT NULL AFTER `stok`;

ALTER TABLE `barang`
	ADD COLUMN `notes` TEXT NULL AFTER `adjustment`;

ALTER TABLE `barang`
	ADD COLUMN `stok_awal` INT NULL AFTER `notes`;