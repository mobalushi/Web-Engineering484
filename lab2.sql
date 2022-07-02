
CREATE DATABASE `usersdb`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'t','$2y$10$8PvRb3gqJWdmLyReybuxYOCUOFC3WDN2gTugh2PKGkPG.nIxxWlue'),(15,'Administrator','$2y$10$GHhbaJZhYUn/aPRSnST2S.uP3HcwByHZEmc3gvj7BGn0ryxjH.njW'),(16,'a','$2y$10$I8Udc0v4S3nJ0yHAyqw3Z.Vhgbid1MlSszMQ/pjdhpC5l5IbKG3EC'),(18,'1','$2y$10$BKwV8s.4nDKtU0DPt7hKJ.OG8pZzfw/FmkLLcoof3vJIfAupAXUH2'),(19,'s','$2y$10$Fh1qjCermS5/fIyZkiCH9.xpcCrmOT2/TKRXeo2hpvK8XCoM7FYy2'),(20,'6','$2y$10$yvKTWLKTSdMPHOCr0JTJ6.XN9yg3Q.zfNKiOjNVPXB3uWnMqOwW1m'),(21,'2','$2y$10$G0BxFNZIj5rmmIH0vfQrCesN6j9G7frdnYIfrgMZfn/xuxAbUpY7S'),(22,'3','$2y$10$lTtTQGxeAl2wC5t6bklS5urLZZFlK/bmLtABD7/oo7bPCRjsAI7GO'),(26,'f','$2y$10$d4zDqJ5MZRnhWtYvqzApOudLTXKj22rfdPrkirg6lltQ/Bw0Ky1hG');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
