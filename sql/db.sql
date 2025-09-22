CREATE TABLE IF NOT EXISTS `mc_homeproduct` (
  `id_hc` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) unsigned NOT NULL,
  `order_hc` smallint(3) unsigned NOT NULL default 0,
  PRIMARY KEY (`id_hc`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `mc_homeproduct`
  ADD CONSTRAINT `mc_homeproduct_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `mc_catalog_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;