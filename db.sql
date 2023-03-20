DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetientData`()
    NO SQL

BEGIN

SET @query =  'SELECT * FROM `petient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 ';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;




DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getActivePetientData`()
    NO SQL

BEGIN

    SET @query =  'SELECT count(*) as records FROM `petient` where is_active=1 order by `petient_id` desc';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInActivePetientData`()
    NO SQL

BEGIN

    SET @query =  'SELECT count(*) as records FROM `petient` where is_active=0 order by `petient_id` desc';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;


UPDATE `petient` SET `is_active`='1';
ALTER TABLE `petient` CHANGE `patient_gender` `patient_gender` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1=>male,2=>female';
ALTER TABLE `petient` CHANGE `petient_lname` `petient_lname` VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

ALTER TABLE `petient` CHANGE `created_at` `created_at` DATE NULL DEFAULT NULL, CHANGE `updated_at` `updated_at` DATE NULL DEFAULT NULL;
CREATE USER 'root'@'localhost' IDENTIFIED WITH authentication_plugin BY 'root@123';
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root@123';

GRANT ALL PRIVILEGES ON *.* TO  'root'@'localhost' WITH GRANT OPTION;
