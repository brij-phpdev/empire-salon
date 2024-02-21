/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  brijrajsingh
 * Created: 08-Nov-2023
 */

CREATE TABLE `u963541063_salon_booking`.`coupons` (`id` BIGINT NOT NULL AUTO_INCREMENT , `code` VARCHAR(50) NULL , `name` VARCHAR(150) NULL , `description` TEXT NULL , `uses` INT NULL COMMENT 'The number of uses currently' , `max_uses` INT NULL COMMENT 'The max uses this voucher has' , `max_uses_user` INT NULL COMMENT 'How many times a user can use this voucher.' , `type` VARCHAR(15) NULL DEFAULT 'voucher' COMMENT 'The type can be: voucher, discount, sale' , `discount_amount` INT NULL COMMENT 'The amount to discount by (in pennies) in this example.' , `is_fixed` BOOLEAN NOT NULL DEFAULT TRUE COMMENT ' Whether or not the voucher is a percentage or a fixed price.' , `starts_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the voucher begins' , `expires_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the voucher ends' , `created_by` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;


-- //INSERT INTO `servicetable` (`id`, `service_id`, `service_code`, `category_id`, `sub_category`, `title`, `description`, `search_name`, `price`, `member_price`, `servStart`, `servEnd`, `servDuration`, `servSpace`, `image`, `agentIds`, `status`) VALUES (NULL, NULL, NULL, '43', NULL, 'Hair Color Transformation', 'Update your hair color with a professional dye job,\r\n and receive a complimentary hair spa treatment for nourishment and shine.
-- ', NULL, '2500', '1800', '10:00 AM', '10:00 AM', '01:00', '1', NULL, NULL, 'active'), (NULL, NULL, NULL, '43', NULL, 'Relaxing Body Massage', 'Unwind with a full-body massage to release tension and stress, \r\n\and receive a complimentary aromatherapy session for ultimate relaxation.
-- ', NULL, '1700', '1200', '10:00 AM', '11:00 AM', '01:00', '1', NULL, NULL, 'active');


-- amount paid save in database...

ALTER TABLE `bookingtbl` ADD `booking_amount` FLOAT NOT NULL DEFAULT '0' AFTER `message`;

