<?php

$this->startSetup();

/*$this->run("
    ALTER TABLE mailup_sync_jobs 
    ADD `store_id` INT UNSIGNED DEFAULT NULL;
");

$this->run("
    ALTER TABLE mailup_sync 
    ADD `store_id` INT UNSIGNED DEFAULT NULL;
");*/

$this->run("DROP TABLE IF EXISTS mailup_filter_hints;
    CREATE TABLE IF NOT EXISTS `mailup_filter_hints` (
  `filter_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `hints` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`filter_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

$this->run("DROP TABLE IF EXISTS mailup_sync;
    CREATE TABLE IF NOT EXISTS `mailup_sync` (
  `store_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `job_id` int(11) NOT NULL,
  `needs_sync` tinyint(1) NOT NULL,
  `last_sync` datetime NULL,
  PRIMARY KEY (`customer_id`,`entity`,`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

$this->run("
    DROP TABLE IF EXISTS mailup_sync_jobs;
    CREATE TABLE IF NOT EXISTS `mailup_sync_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `mailupgroupid` int(11) NOT NULL,
  `send_optin` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `queue_datetime` datetime NOT NULL,
  `start_datetime` datetime,
  `finish_datetime` datetime,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

$this->endSetup();