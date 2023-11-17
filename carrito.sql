create table carrito (
    `idUnico` varchar(50) NOT NULL UNIQUE,
    `dniCliente` varchar(10),
    `idProducto` int NOT NULL,
    `cantidad` int DEFAULT 1,
    `time_` INT UNIQUE,
    INDEX(`idUnico`),
    PRIMARY KEY (`idUnico`, `time_`)
);