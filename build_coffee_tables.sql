CREATE TABLE `coffee`.`pourover_test`(
    `datetime` DATETIME NOT NULL, PRIMARY KEY(`datetime`),
    `beans` INT NULL,
    `roastDate` DATE NULL,
    `method` VARCHAR(255) NULL,
    `filter` VARCHAR(255) NULL,
    `comandante_clicks` INT NULL,
    `dose` INT NULL,
    `temp` INT NULL,
    `temp_units` VARCHAR(1),
    `temp_source` VARCHAR(255) NULL,
    `final_weight` INT NULL,
    `final_time` INT NULL,
    `score_aroma` INT NULL,
    `score_flavor` INT NULL,
    `score_acidity` INT NULL,
    `score_body` INT NULL,
    `score_aftertaste` INT NULL,
    `brew_comments` VARCHAR(1024) NULL,
    `tasting_comments` VARCHAR(1024) NULL
);

CREATE TABLE `coffee`.`pour_test`(
    `datetime` DATETIME NOT NULL, PRIMARY KEY(`datetime`),
    `sequence` INT NOT NULL,
    `start_time` INT NOT NULL,
    `grams` INT NOT NULL,
    `pattern` VARCHAR(65) NOT NULL,
    `stir` BOOLEAN NOT NULL
);
