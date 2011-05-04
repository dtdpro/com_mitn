CREATE TABLE IF NOT EXISTS `#__mitn` (
  `mitn_id` int(11) NOT NULL auto_increment,
  `mitn_title` varchar(255) NOT NULL,
  `mitn_url` text NOT NULL,
  `mitn_desc` text NOT NULL,
  `mitn_date` datetime NOT NULL,
  `mitn_user` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY  (`mitn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__mitn_track` (
  `mt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mt_item` int(11) NOT NULL,
  `mt_user` int(11) NOT NULL,
  `mt_session` varchar(255) NOT NULL,
  `mt_when` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

