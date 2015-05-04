/*First, if you do not yet have core_directory_storage, run:*/

    CREATE TABLE `core_directory_storage` (
      `directory_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL DEFAULT '',
      `path` VARCHAR(255) NOT NULL DEFAULT '',
      `upload_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `parent_id` INT(10) UNSIGNED NULL DEFAULT NULL,
      PRIMARY KEY (`directory_id`),
      UNIQUE INDEX `IDX_DIRECTORY_PATH` (`name`, `path`),
      INDEX `parent_id` (`parent_id`),
      CONSTRAINT `FK_DIRECTORY_PARENT_ID` FOREIGN KEY (`parent_id`) REFERENCES `core_directory_storage` (`directory_id`) ON UPDATE CASCADE ON DELETE CASCADE
    ) COMMENT='Directory storage' COLLATE='utf8_general_ci' ENGINE=InnoDB ROW_FORMAT=DEFAULT;

/*Then, run:*/

    CREATE TABLE `core_file_storage` (
      `file_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `content` LONGBLOB NOT NULL,
      `upload_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `filename` VARCHAR(255) NOT NULL DEFAULT '',
      `directory_id` INT(10) UNSIGNED NULL DEFAULT NULL,
      `directory` VARCHAR(255) NULL DEFAULT NULL,
      PRIMARY KEY (`file_id`),
      UNIQUE INDEX `IDX_FILENAME` (`filename`, `directory`),
      INDEX `directory_id` (`directory_id`),
      CONSTRAINT `FK_FILE_DIRECTORY` FOREIGN KEY (`directory_id`) REFERENCES `core_directory_storage` (`directory_id`) ON UPDATE CASCADE ON DELETE CASCADE
    ) COMMENT='File storage' COLLATE='utf8_general_ci' ENGINE=InnoDB ROW_FORMAT=DEFAULT;
