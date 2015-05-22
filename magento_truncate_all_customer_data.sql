TRUNCATE `customer_address_entity`;
  TRUNCATE `customer_address_entity_datetime`;
  TRUNCATE `customer_address_entity_decimal`;
  TRUNCATE `customer_address_entity_int`;
  TRUNCATE `customer_address_entity_text`;
  TRUNCATE `customer_address_entity_varchar`;
  TRUNCATE `customer_entity`;
  TRUNCATE `customer_entity_datetime`;
  TRUNCATE `customer_entity_decimal`;
  TRUNCATE `customer_entity_int`;
  TRUNCATE `customer_entity_text`;
  TRUNCATE `customer_entity_varchar`;
  TRUNCATE `log_customer`;
  TRUNCATE `log_visitor`;
  TRUNCATE `log_visitor_info`;

  ALTER TABLE `customer_address_entity` AUTO_INCREMENT=1;
  ALTER TABLE `customer_address_entity_datetime` AUTO_INCREMENT=1;
  ALTER TABLE `customer_address_entity_decimal` AUTO_INCREMENT=1;
  ALTER TABLE `customer_address_entity_int` AUTO_INCREMENT=1;
  ALTER TABLE `customer_address_entity_text` AUTO_INCREMENT=1;
  ALTER TABLE `customer_address_entity_varchar` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity_datetime` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity_decimal` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity_int` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity_text` AUTO_INCREMENT=1;
  ALTER TABLE `customer_entity_varchar` AUTO_INCREMENT=1;
  ALTER TABLE `log_customer` AUTO_INCREMENT=1;
  ALTER TABLE `log_visitor` AUTO_INCREMENT=1;
  ALTER TABLE `log_visitor_info` AUTO_INCREMENT=1;

  -- Now, lets Reset all ID counters
  TRUNCATE `eav_entity_store`;
  ALTER TABLE  `eav_entity_store` AUTO_INCREMENT=1;
