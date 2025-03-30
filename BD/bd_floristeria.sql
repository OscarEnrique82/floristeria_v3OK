-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2012 at 10:38 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `nombre_de_la_base_de_datos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `contiene` int(6) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` VALUES(1, 'Rosas rojas', 50);
INSERT INTO `categorias` VALUES(2, 'Rosas azules', 50);
INSERT INTO `categorias` VALUES(3, 'Arreglos con chocolates', 50);
INSERT INTO `categorias` VALUES(4, 'Girasoles', 50);
INSERT INTO `categorias` VALUES(5, 'Regalo sorpresa', 50);
-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(4) NOT NULL AUTO_INCREMENT,
  `id_producto` int(6) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcompra`),
  KEY `id_producto` (`id_producto`),
  KEY `idusuario` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `compra`
--


-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(6) NOT NULL AUTO_INCREMENT,
  `id_cat` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `categoria` (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` VALUES(1, 1, 'Celeron Dual Core E3400', 53.00, 'acc393.jpg', 'Modelo:Celeron E3400\r\nFrecuencia 2.6Ghz\r\nFSB:800mhz');
INSERT INTO `productos` VALUES(2, 1, 'Core i3 2100 3.01Ghz', 100.00, 'acc395.jpg', 'Modelo:Core i3 2100 3.0Ghz\r\n3MB De cach�\r\n2 n�cleos\r\nTecnolog�a HT\r\nVideo integrado Intel HD2000');
INSERT INTO `productos` VALUES(3, 1, 'Celeron 430', 'Intel', 'acc396.jpg', 'Modelo:Celeron 430\r\nFrecuencia: 1.8Ghz\r\nFSB:800Mhz\r\n1MB de cach�\r\nlga 775');
INSERT INTO `productos` VALUES(4, 1, 'Athlon II X2 250', 'AMD', 'acc27.jpg', 'Marca:AMD\r\nModelo:ADX250OCGQBOX\r\nSocket:Socket AM3\r\nN�cleos:Dual-Core\r\nFrecuencia:3.0GHz');
INSERT INTO `productos` VALUES(5, 1, 'Athlon II X4 640', 129.00, 'acc30.jpg', 'Frecuencia:3.0GHz\r\nEnergia:95W\r\nSocket:Socket AM2/AM3');
INSERT INTO `productos` VALUES(6, 1, 'AMD Phenom II x4 850', 143.00, 'default.jpg', 'Modelo: HDX850WFGMBOX\r\n3.3 GHz\r\n2.0 MB Cache Total\r\nSocket AM3\r\nIncluye Disipador de Calor');
INSERT INTO `productos` VALUES(7, 1, 'A4 3300', 93.00, 'acc548.jpg', 'Serie: A-Series APU\r\nSocket: Socket FM1\r\n2.5ghz\r\nVideo Integrado: Radeon HD 6410\r\nCache: 2 x 512KB');
INSERT INTO `productos` VALUES(8, 1, 'AMD APU A6 3650', 159.00, 'acc556.jpg', 'Modelo: A6 3650\r\nVelocidad:2.6GHz\r\nMemoria Cache:4.0MB\r\nSocket FM1\r\nHD 6530D GPU');
INSERT INTO `productos` VALUES(9, 1, 'Intel Pentium G620 2.6Ghz', 90.00, 'acc549.jpg', 'Modelo: BX80623G620\r\nSocket: LGA 1155\r\nSerie:Pentium\r\nDual Core 2.6 Ghz\r\nVideo Integrado: Intel ');
INSERT INTO `productos` VALUES(10, 1, 'Intel Core i5 2300', 260.00, 'acc406.jpg', 'Modelo: Core i5 2300\r\nVelocidad 2.8Ghz\r\n4 N�cleos\r\nSocket 1155\r\nVideo integrado intel HD2000\r\n6MB');
INSERT INTO `productos` VALUES(11, 2, 'Gigabyte 880GM-USB3L', 109.00, 'm_board01.jpg', 'Socket AM3\r\nSupport for AMD AM3 Phenom� II processor / AMD Athlon� II processor\r\n2 x Ranuras DDR3 DIMM de 1.5V que soportan hasta 8 GB\r\nATI Radeon HD 4250 (DirectX 10.1)');
INSERT INTO `productos` VALUES(12, 2, 'Asus M4A78LT-M LX', 74.50, 'm_board02.jpg', 'Modelo:M4A78LT-M LX\r\nSocket AM3\r\nCore unlocker\r\nVideo intergrado ATI');
INSERT INTO `productos` VALUES(13, 2, 'Asus M4N68T-M V2', 69.00, 'm_board03.jpg', 'Modelo:M4N68T-M V2\r\nSocket AM3\r\n2 Ranuras de memoria DDR3\r\nChipset NVIDIA Geforce 7025/nForce 630a\r\nmicroATX');
INSERT INTO `productos` VALUES(14, 2, 'Asus E35M1-I', 167.00, 'm_board04.jpg', 'Modelo:Asus E35M1-I\r\nProcesador APU AMD E-350 Dual Core\r\n2 Ranuras de memoria DD3\r\nVideo integrado Radeon 6310\r\nSATA 6Gbp');
INSERT INTO `productos` VALUES(15, 2, 'Asus Crosshair V Formula Thunder', 399.00, 'm_board05.jpg', 'AM3+ CPU\r\nAMD 990FX Chipset\r\nHyperTransport�\r\nDDR3 2133(O.C.)\r\nSLI or CrossFireX\r\nLAN/Audio combo ThunderBolt\r\nSupremeFX X-Fi 2');
INSERT INTO `productos` VALUES(16, 2, 'F1A75-V PRO', 154.00, 'm_board06.jpg', 'AMD Socket FM1 A- Series\r\nSupports AMD� Turbo Core 2\r\nAMD A75 FCH\r\n4 x DIMM, Max. 64GB\r\nDDR3 2250(O.C.)\r\nIntegrated AMD Radeon� HD 6000\r\n2 x PCIe 2.0 x16\r\n4 x USB 3.0 port(s)\r\nRealtek� ALC892 8-Channel High Definition.');
INSERT INTO `productos` VALUES(17, 2, 'F1A75', 110.00, 'm_board07.jpg', 'AMD Socket FM1 A-Series\r\nAMD A75 FCH (Hudson D3)\r\n4 x DIMM, Max. 64GB, DDR3 2250(O.C.)/1866/1600/1333/1066 MHz\r\nAMD� Dual Graphics technology support\r\nSupports AMD CrossFireX� Technology\r\n6 x SATA 6Gb/s port(s), gray Support Raid 0, 1, 10, JBOD');
INSERT INTO `productos` VALUES(18, 2, 'ASUS P6X58D-E', 270.00, 'm_board08.jpg', 'Modelo:P6X58D-E\r\nSocket:Intel� Socket 1366\r\nMemoria:6 x DIMM, Max. 24GB, DDR3 2000(O.C.)/1600/1333/1066');
INSERT INTO `productos` VALUES(19, 2, 'ASUS P8Z68-V', 239.99, 'm_board09.jpg', 'Modelo: P8Z68-V\r\nSocket:LGA 1155\r\nCPU Soportados: Core i7 / i5 / i3 (LGA1155)\r\nMemoria:4�240pin DDR3 2200(O.C.)/2133(O.C.)/1866(O.C.)/1600/1333/1066');
INSERT INTO `productos` VALUES(20, 2, 'INTEL DH61WW', 86.00, 'm_board10.jpg', 'Modelo:BOXDH61WWB3\r\nSocket: LGA 1155\r\nCPU Soportados: Core i7 / i5 / i3 / Pentium (LGA1155)\r\nMemoria:2�240pin, 8GB M�ximo, DDR3 1333/1066 Dual Channel\r\nMicroATX 9.6\\" x 7.8\\');
INSERT INTO `productos` VALUES(21, 3, 'RAM PNY 6GB XLR8', 115.00, 'm_ram01.jpg', 'Modelo:MD6144KD3-1600-X8\r\nCapacidad 6GB (kit 3x2GB)\r\nVelocidad:1600Mhz\r\nVoltaje: 1.65\r\nCAS 8');
INSERT INTO `productos` VALUES(22, 3, 'RAM PNY 8GB 1333Mhz', 110.00, 'm_ram02.jpg', 'Modelo:MD8192KD3-1333\r\nCapacidad 8GB (2x4GB)\r\nVelocidad: 1333Mhz');
INSERT INTO `productos` VALUES(23, 3, 'Memoria Kingston DDR3 2Gb', 19.00, 'm_ram03.jpg', 'Modelo:KVR1333D3S8N9/2G\r\nCapacidad: 2 Gb\r\nTipo: DDR3\r\nVelocidad: 1333 Mhz\r\nPins: 240pin\r\nLatencia: CL9\r\nVoltaje: 1,5 Volts\r\nTecnolog�a Dual Channel\r\nRequerimientos: Motherboard con soporte para DDR3 1333Mhz con 2 Gb por slot');
INSERT INTO `productos` VALUES(24, 3, 'Memoria RAM Patriot 1GB DDR', 39.00, 'm_ram04.jpg', 'Modelo:PSD1G400\r\nTipo: DDR PC3200\r\n400Mhz\r\n2.6v');
INSERT INTO `productos` VALUES(25, 3, 'Memoria RAM Corsair 2GB DDR3', 19.00, 'm_ram05.jpg', 'Modelo:VS2GB1333D3\r\nCapacidad 2GB\r\nTipo DDR3\r\nVelocidad: 1333MHZ\r\nVoltaje: 1.5V');
INSERT INTO `productos` VALUES(26, 3, 'Memoria RAM Corsair 4GB DDR3', 49.00, 'm_ram06.jpg', 'Modelo:CMV4GX3M2A1333C9\r\nCapacidad 4GB\r\nKit 2x2GB\r\nVelocidad 1333Mhz');
INSERT INTO `productos` VALUES(27, 3, 'Memoria RAM Corsair XMS3 4GB DDR3', 59.00, 'm_ram07.jpg', 'Modelo:CMX4GX3M2A1600C9\r\nCapacidad 4GB\r\nKit de 2x2GB\r\nVelocidad de 1600Mhz\r\nTipo DDR3');
INSERT INTO `productos` VALUES(28, 3, 'Memoria RAM Corsair Vengeance 4GB DDR3', 62.00, 'm_ram08.jpg', 'Modelo:CMZ4GX3M1A1600C9\r\nCapacidad 4GB\r\nVelocidad 1600Mhz\r\nVoltaje 1.5');
INSERT INTO `productos` VALUES(29, 3, 'Memoria RAM Corsair Vengeance 4GB DDR3', 62.00, 'm_ram09.jpg', 'Modelo:CMZ4GX3M1A1600C9B\r\nCapacidad 4GB\r\nVelocidad 1600Mhz\r\nVoltaje 1.5');
INSERT INTO `productos` VALUES(31, 1, 'Intel Sandy Bridge Extreme Edition', 200.00, 'acc557.jpg', 'De m�s est� decir que la CPU vendr� totalmente desbloqueada en su multiplicador, sum�ndose 15MB totales de cache, consumo energ�tico de 130W y la necesidad de tener un socket LGA2011 en tu placa madre, junto con un chipset X79, el cual tambi�n debiera estrenarse en la misma fecha que salga esta peque�a bestia de procesador.');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(3) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `fechaingreso` varchar(40) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` VALUES(1, 'robotin', 'Herbert', 'Cordero', 'El Salvador', 'Usulutan', '123456', '20 de Agosto de 2013');
INSERT INTO `usuario` VALUES(2, 'jen', 'Jenny', 'Flores', 'El Salvador', 'Usulutan', '123456', '20 de Agosto de 2013');
INSERT INTO `usuario` VALUES(3, 'sujeto', 'Pedro', 'Villalta', 'El Salvador', 'Usulutan', '123456', '20 de Agosto de 2013');
INSERT INTO `usuario` VALUES(4, 'carlita', 'Carla', 'Lopez', 'El Salvador', 'Usulutan', '123456', '20 de Agosto de 2013');
INSERT INTO `usuario` VALUES(5, 'jer', 'Jerson', 'Castellanos', 'El Salvador', 'Usulutan', '123456', '20 de Agosto de 2013');
