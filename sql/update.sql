/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  brijrajsingh
 * Created: 08-Nov-2023
 */

CREATE TABLE `u963541063_salon_booking`.`coupons` (`id` BIGINT NOT NULL AUTO_INCREMENT , `code` VARCHAR(50) NULL , `name` VARCHAR(150) NULL , `description` TEXT NULL , `uses` INT NULL COMMENT 'The number of uses currently' , `max_uses` INT NULL COMMENT 'The max uses this voucher has' , `max_uses_user` INT NULL COMMENT 'How many times a user can use this voucher.' , `type` VARCHAR(15) NULL DEFAULT 'voucher' COMMENT 'The type can be: voucher, discount, sale' , `discount_amount` INT NULL COMMENT 'The amount to discount by (in pennies) in this example.' , `is_fixed` BOOLEAN NOT NULL DEFAULT TRUE COMMENT ' Whether or not the voucher is a percentage or a fixed price.' , `starts_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the voucher begins' , `expires_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the voucher ends' , `created_by` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
