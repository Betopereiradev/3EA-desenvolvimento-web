CREATE TABLE `moradias` (
    `id` int NOT NULL AUTO_INCREMENT,
    `morador` varchar(255) NOT NULL,
    `telefone` varchar(11) NOT NULL,
    `idade` int NOT NULL,
    `local` varchar(255) NOT NULL,
    PRIMARY KEY (`id`) 
)