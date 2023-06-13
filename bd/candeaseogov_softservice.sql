-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-02-2023 a las 07:42:26
-- Versión del servidor: 10.3.36-MariaDB-cll-lve
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `candeaseogov_softservice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `sub` bigint(20) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo` text NOT NULL,
  `fecha` date NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `user` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `sub`, `doc`, `descripcion`, `archivo`, `fecha`, `dateadd`, `user`, `status`) VALUES
(7, 45, 'Código de Integridad', '<p>Empresa de Servicios Publicos de Aseo de Candelaria Valle</p>', '40de2283bb3a8c434791cf8aa568e318integridad.PDF', '2023-02-22', '2023-02-22 13:26:17', 1, 1),
(8, 43, 'PCO-PD-01 Procedimiento PQRS.', '<p>Procedimiento&nbsp;</p>', 'b2334f5595cc2ddecf2bcb02f2885e20PCO-PD-01 Procedimiento PQRS..pdf', '2020-02-01', '2023-02-22 16:39:57', 1, 1),
(9, 43, 'PFI-PD-02 Procedimiento Generación de los Estados Financieros', '<p>Procedimiento&nbsp;</p>', '80952abf180ec2005f38ca2042bd5543PFI-PD-02 Procedimiento Generación de los Estados Financieros.pdf', '2020-01-01', '2023-02-22 16:52:44', 1, 1),
(10, 43, 'PFI-PD-03 Procedimiento de Disponibilidad Presupuestal', '<p>Procedimiento&nbsp;</p>', 'dcbaedefb227e1240f90d979e5b11164PFI-PD-03 Procedimiento de Disponibilidad Presupuestal.pdf', '2020-01-01', '2023-02-22 16:54:26', 1, 1),
(11, 43, 'PFI-PD-04 Procedimiento para Conciliación Bancaria', '<p>Procedimiento&nbsp;</p>', '6e9bc229ea4cc2b22d70f33d9b14af0fPFI-PD-04 Procedimiento para Conciliación Bancaria.pdf', '2020-01-30', '2023-02-22 16:56:11', 1, 1),
(12, 43, 'PFI-PD-05 Procedimiento para Recepción y Pago de Cuentas', '<p>Procedimiento&nbsp;</p>', 'b2334f5595cc2ddecf2bcb02f2885e20PFI-PD-05 Procedimiento para Recepción y Pago de Cuentas.pdf', '2020-01-24', '2023-02-22 16:57:57', 1, 1),
(13, 43, 'PFI-PD-06 Procedimiento para Cierre en el Sistema Contable', '<p>Procedimiento&nbsp;</p>', '75b9ffc054634f38acb649169edb97dePFI-PD-06 Procedimiento para Cierre en el Sistema Contable.pdf', '2020-01-24', '2023-02-22 16:59:03', 1, 1),
(14, 43, 'PGM-PD-01 Proced. de Mantenimiento de Parques y Zonas Verdes', '<p>Procedimiento&nbsp;</p>', 'ab191142610d45d392bb3f66af12ac96PGM-PD-01 Proced. de Mantenimiento de Parques y Zonas Verdes.pdf', '2019-12-02', '2023-02-22 17:01:52', 1, 1),
(15, 43, 'PRT-PG-01 Programa para la Prestación de Servicio Público de Aseo', '<p>Procedimiento&nbsp;</p>', 'cd0c8ad5f0814d1dbb77b60174100df7PRT-PG-01 Programa para la Prestación de Servicio Público de Aseo.pdf', '2019-12-02', '2023-02-22 17:07:44', 1, 1),
(16, 43, 'PRT-PD-01 Proced. Recolección y Transporte de Resid. Solid', '<p>Procedimiento&nbsp;</p>', 'd1ee37a5f73c98833b85568e2cb7aa57PRT-PD-01 Proced. Recolección y Transporte de Resid. Solid.pdf', '2019-12-02', '2023-02-22 17:08:59', 1, 1),
(17, 43, 'PTH-PD-01 Identific. y Reporte de Peligros, Actos y Condiciones Inseguras', '<p>Procedimiento&nbsp;</p>', '9660ea302e68314fbc0690f79eaf91f4PTH-PD-01 Identific. y Reporte de Peligros, Actos y Condiciones Inseguras.pdf', '2020-02-20', '2023-02-22 17:10:30', 1, 1),
(18, 43, 'PTH-PD-02 Requisitos Legales y Reglamentarios SST', '<p>Procedimiento&nbsp;</p>', 'f8d153153bb5ff732831f581a0fb49f8PTH-PD-02 Requisitos Legales y Reglamentarios SST.pdf', '2020-02-20', '2023-02-22 17:12:06', 1, 1),
(19, 43, 'PTH-PD-03 Acciones Correctivas, Preventivas y Mejora', '<p>Procedimiento&nbsp;</p>', '9bb6ab95a908dfc776d59458e5001520PTH-PD-03 Acciones Correctivas, Preventivas y Mejora.pdf', '2020-02-20', '2023-02-22 17:13:56', 1, 1),
(20, 43, 'PTH-PD-04 Manipulación Adecuada de Agentes Quimicos', '<p>Procedimiento&nbsp;</p>', '16f955bd6f7f8dc5581a5b75b6cd5950PTH-PD-04 Manipulación Adecuada de Agentes Quimicos.pdf', '2020-02-20', '2023-02-22 17:15:19', 1, 1),
(21, 43, 'PTH-PD-05 Postura y Posición Adecuada para Levantamiento de Carga', '<p>Procedimiento&nbsp;</p>', '0af2ae34e194ed3508982273b4b16bf6PTH-PD-05 Postura y Posición Adecuada para Levantamiento de Carga.pdf', '2020-02-20', '2023-02-22 17:16:58', 1, 1),
(22, 43, 'PTH-PD-06 Uso Práctico e Inspección a Extintores', '<p>Pocedimiento&nbsp;</p>', 'a48e85b05236036ed02a3b872eb1b9a9PTH-PD-06 Uso Práctico e Inspección a Extintores.pdf', '2020-02-20', '2023-02-22 17:18:12', 1, 1),
(23, 43, 'PTH-PD-07 Prevención para el Riesgo Mecanico', '<p>Procedimiento&nbsp;</p>', '0d721da91b4d3a5e3fa2909e178b0dcdPTH-PD-07 Prevención para el Riesgo Mecanico.pdf', '2020-02-20', '2023-02-22 17:20:28', 1, 1),
(24, 43, 'PTH-PD-08 Investigación de Incidente y Accidente Laboral', '<p>Procedimiento&nbsp;</p>', 'e8c6c51fb4013e80501f1092f86c68bbPTH-PD-08 Investigación de Incidente y Accidente Laboral.pdf', '2020-02-20', '2023-02-22 17:44:27', 1, 1),
(25, 43, 'PTH-PD-09 Provisión, Control y Mantenimiento de EPP', '<p>Procedimiento&nbsp;</p>', '17156b015e80718a2e3566cac43f43baPTH-PD-09 Provisión, Control y Mantenimiento de EPP.pdf', '2020-02-20', '2023-02-22 17:50:45', 1, 1),
(26, 43, 'PTH-PD-10 Selección y Evaluación de Contratistas y Proveedores', '<p>Procedimiento&nbsp;</p>', '78384de0cbcbcde49df8a57e68552f49PTH-PD-10 Selección y Evaluación de Contratistas y Proveedores.pdf', '2020-02-20', '2023-02-22 17:55:08', 1, 1),
(27, 43, 'PTH-PD-11 Formación y Capacitación para Ingreso y Pos-ingreso', '<p>Procedimiento&nbsp;</p>', '84568ead963c008d37087a8f0bc2faf6PTH-PD-11 Formación y Capacitación para Ingreso y Pos-ingreso.pdf', '2020-02-20', '2023-02-22 18:03:27', 1, 1),
(28, 43, 'PTH-PD-12 Asignación y Divulgación de Responsabilidades', '<p>Procedimiento&nbsp;</p>', '945277e4f6154ab862f20e0003d5e62aPTH-PD-12 Asignación y Divulgación de Responsabilidades.pdf', '2020-02-20', '2023-02-22 18:05:55', 1, 1),
(29, 43, 'PTH-PD-13 Seguimiento a la Gestión del Cambio', '<p>Procedimiento</p>', 'c68d3f755e37bd97cba5d4904bc1f9fcPTH-PD-13 Seguimiento a la Gestión del Cambio.pdf', '2020-02-20', '2023-02-22 18:12:16', 1, 1),
(30, 43, 'PTH-PD-14 Procedimiento de Comunicación, Participación y Consulta', '<p>Procedimiento&nbsp;</p>', '3ae667973b69f5c5d8aba2dc3cb6eda8PTH-PD-14 Procedimiento de Comunicación, Participación y Consulta.pdf', '2020-02-20', '2023-02-22 18:15:48', 1, 1),
(31, 43, 'PTH-PD-15 Revisión y Auditoria por la Gerencia', '<p>Procedimiento&nbsp;</p>', '12a1be7a675a83162fee69c3ca67be86PTH-PD-15 Revisión y Auditoria por la Gerencia.pdf', '2020-02-20', '2023-02-22 18:16:58', 1, 1),
(32, 43, 'PTH-PD-16 Examen Medico Laboral', '<p>Procedimiento&nbsp;</p>', 'a0c2aa48f6ab5d77073f2871bc01f476PTH-PD-16 Examen Medico Laboral.pdf', '2020-02-20', '2023-02-22 18:18:14', 1, 1),
(33, 43, 'PTH-PD-17 Mantenimiento Preventivo y Correctivo', '<p>Procedimiento&nbsp;</p>', 'e64ef69862ef6b73c7281c0fceaa0e49PTH-PD-17 Mantenimiento Preventivo y Correctivo.pdf', '2020-02-20', '2023-02-22 18:19:20', 1, 1),
(34, 43, 'PTH-PD-18 Guia Elabor. para la Identific. y Valorac. de Peligros', '<p>Procedimiento&nbsp;</p>', '9d004879da876d6865ccbe89045f1d16PTH-PD-18 Guia Elabor. para la Identific. y Valorac. de Peligros.pdf', '2020-02-20', '2023-02-22 18:22:15', 1, 1),
(35, 43, 'PTH-PD-19 Procedimiento Seguro para la Operación de Guadaña', '<p>Procedimiento&nbsp;</p>', '45868b8e0b12dece111e8666b08019afPTH-PD-19 Procedimiento Seguro para la Operación de Guadaña.pdf', '2020-02-20', '2023-02-22 18:25:37', 1, 1),
(36, 43, 'PTH-PD-20 Metodos de Prevención Respecto al COVID 19 para el Personal Operativo', '<p>Procedimiento&nbsp;</p>', '4b7605b4f37b3d5984292dac2f1c6656PTH-PD-20 Metodos de Prevención Respecto al COVID 19 para el Personal Operativo.pdf', '2020-02-20', '2023-02-22 18:26:43', 1, 1),
(37, 43, 'PTH-PD-21 Procedimiento de Inducción y Reinducción', '<p>Procedimiento&nbsp;</p>', '183aa67bd1204c2a3de90d2ca6701ef7PTH-PD-21 Procedimiento de Inducción y Reinducción.pdf', '2020-05-07', '2023-02-22 18:28:28', 1, 1),
(38, 43, 'PST-PT-01-Protocolo-de-Bioseguridad-COVID-19', '<p>Procedimiento</p>', 'de877ff2ab04ff78a81fdcbc2032b1bcPST-PT-01-Protocolo-de-Bioseguridad-COVID-19.pdf', '2020-07-07', '2023-02-23 08:21:02', 1, 1),
(39, 43, 'PTH-PG-01 Programa Sistema de Gestión de Seguridad y Salud en el Trabajo', '<p>Procedimiento&nbsp;</p>', '46d706ffca6f9330f727610a69f59176PTH-PG-01 Programa Sistema de Gestión de Seguridad y Salud en el Trabajo.pdf', '2020-01-27', '2023-02-23 08:22:11', 1, 1),
(40, 43, 'PTH-PG-02 Programa Gestión Preventiva de Pausas Activas', '<p>Procedimiento&nbsp;</p>', '2e64c44accdd0cdfed0cbe88a093a17ePTH-PG-02 Programa Gestión Preventiva de Pausas Activas.pdf', '2019-04-23', '2023-02-23 08:23:40', 1, 1),
(41, 43, 'PTH-PG-03 Programa Gestión de Habitos y Estilos de Vida Saludable', '<p>Procedimiento&nbsp;</p>', 'e5d5c1b82ace1178a6c0623e77e20b4fPTH-PG-03 Programa Gestión de Habitos y Estilos de Vida Saludable.pdf', '2019-04-23', '2023-02-23 08:24:58', 1, 1),
(42, 43, 'PTH-PG-04 Programa de Orden y Aseo en Áreas Operativas y Administrativas', '<p>Procedimiento&nbsp;</p>', '771be3d94f082f7b2bdb51fa21fe7eadPTH-PG-04 Programa de Orden y Aseo en Áreas Operativas y Administrativas.pdf', '2020-01-24', '2023-02-23 08:26:17', 1, 1),
(43, 43, 'PTH-PG-05 Programa de Inspecciones Planeadas y No Planeadas', '<p>Procedimiento&nbsp;</p>', 'acbc4f399cd54433e64ff35503e96cb0PTH-PG-05 Programa de Inspecciones Planeadas y No Planeadas.pdf', '2019-04-23', '2023-02-23 08:28:50', 1, 1),
(44, 43, 'PTH-PG-06 Programa Gestión para Prevención de Emergencias', '<p>Procedimiento&nbsp;</p>', '2ec4580c3a73c03238b7d2db5cf0088cPTH-PG-06 Programa Gestión para Prevención de Emergencias.pdf', '2019-04-23', '2023-02-23 08:30:07', 1, 1),
(45, 43, 'PTH-PG-07 Prog. G. Prevent. Consumo de Tabaco y Sustan. Psicoactivas', '<p>Procedimiento</p>', '8504c596984c40baf0b10a12eca45eb5PTH-PG-07 Prog. G. Prevent. Consumo de Tabaco y Sustan. Psicoacti.pdf', '2019-04-23', '2023-02-23 08:31:59', 1, 1),
(46, 51, 'NM-JU-01 Normograma CANDEASEO S. A. E. S. P.', '<p>Normograma</p>', '8f536fe5d28833b45c25696b5631098aNM-JU-01 Normograma CANDEASEO S. A. E. S. P. ACTUALIZADO NOV.xlsx', '2021-11-30', '2023-02-23 11:51:54', 1, 1),
(47, 52, 'PGC-FT-12 Política de Prevención de Consumo de Tabaco, Alcohol y Drogas', '<p>Pol&iacute;ticas.</p>', '4898e7f3619c3d6848af35f5e438cd2bPGC-FT-12 Política de Prevención de Consumo de Tabaco, Alcohol y Drogas.pdf', '2019-05-06', '2023-02-23 15:39:12', 1, 1),
(48, 52, 'PGC-FT-12 Política de Salud, Seguridad, Medio Ambiente.', '<p>Pol&iacute;ticas.&nbsp;</p>', '7d75008e15cd2aa7c64d110565b0f78bPGC-FT-12 Política de Salud, Seguridad, Medio Ambiente.pdf', '2019-05-06', '2023-02-23 15:41:56', 1, 1),
(49, 52, 'PGC-FT-12 Política para Control de Emergencias.', '<p>Pol&iacute;ticas.</p>', '67775903ef1f72e6cb4f9799435be07ePGC-FT-12 Política para Control de Emergencias.pdf', '2019-05-06', '2023-02-23 15:45:52', 1, 1),
(50, 52, 'PGC-FT-12 Política-de-Administración-de-Riesgos.', '<p>Pol&iacute;ticas.</p>', '8eb2c598292e9239467fbe467dfb5c22PGC-FT-12 Política-de-Administración-de-Riesgos.pdf', '2019-05-06', '2023-02-23 15:47:26', 1, 1),
(51, 52, 'PGC-FT-12 Politica-de-Austeridad-en-el-Gasto.', '<p>Po&iacute;liticas.</p>', '10f7d66571d9ba9874ae917e9ddb46ebPGC-FT-12 Politica-de-Austeridad-en-el-Gasto.pdf', '2019-05-06', '2023-02-23 15:49:08', 1, 1),
(52, 52, 'PGC-FT-12 Política-de-Defensa-Juridica.', '<p>Pol&iacute;ticas.</p>', '05b09976b27473ad56fa53c955cc62c5PGC-FT-12 Política-de-Defensa-Juridica.pdf', '2019-05-06', '2023-02-23 15:50:54', 1, 1),
(53, 52, 'PGC-FT-12 Polìtica-de-Gestión-de-la-Tecnologia', '<p>Pol&iacute;ticas.</p>', '0688098ea450e08e42f37c2d8615f5d0PGC-FT-12 Polìtica-de-Gestión-de-la-Tecnologia.pdf', '2019-05-06', '2023-02-23 15:52:35', 1, 1),
(54, 52, 'PO-CI-1 Politica de Control Interno.', '<p>Pol&iacute;ticas.</p>', '96ef70934a4d8e5a704bc0f3b643917cPO-CI-1 Politica de Control Interno.pdf', '2020-07-22', '2023-02-23 15:54:10', 1, 1),
(55, 52, 'PO-SI-1 Política de Administración de Riesgos Candeaseo.', '<p>Pol&iacute;ticas.</p>', '70f735da6ea418e6d0960475a0f8d382PO-SI-1 Política de Administración de Riesgos Candeaseo.pdf', '2020-07-22', '2023-02-23 15:55:38', 1, 1),
(56, 52, 'POLÍTICA DE GESTION DOCUMENTAL', '<p>Pol&iacute;ticas.</p>', '1f44f04a2d16477102a0bc2ecd946cedPOLÍTICA DE GESTION DOCUMENTAL.pdf', '2019-04-01', '2023-02-23 15:58:20', 1, 1),
(57, 52, 'POLÍTICA DE TRATAMIENTO DE LA INFORMACIÓN', '<p>Pol&iacute;ticas.</p>', '7273ffad613c5eb66ccd290f87446d53POLÍTICA DE TRATAMIENTO DE LA INFORMACIÓN.pdf', '2020-01-31', '2023-02-23 16:01:07', 1, 1),
(58, 53, 'Plan Anual de Adquisiciones 2018', '<p>Planes estrategicos&nbsp;</p>', 'a8edbda32c1a854343534178bd019d06Plan Anual de Adquisiciones 2018.pdf', '2018-01-31', '2023-02-23 16:08:50', 1, 1),
(59, 53, 'Plan Anual de Adquisiciones 2021', '<p>Planes De Estrategicos.</p>', 'e71057c3c7060238fa8bfacc3cffea84Plan Anual de Adquisiciones 2021.pdf', '2021-01-31', '2023-02-23 16:10:21', 1, 1),
(60, 54, 'Información Contractual 2015', '<p>Procesos Contratuales&nbsp;</p>', '55e9a9f0709f3838fc7683e2ed25091eInformación Contractual 2015.pdf', '2015-01-31', '2023-02-23 16:21:08', 1, 1),
(61, 54, 'Información Contractual 2016', '<p>Procesos Contratuales&nbsp;</p>', 'e90a21acf2dc8db4a2b0e9fe0193d864Información Contractual 2016.pdf', '2016-01-31', '2023-02-23 16:23:58', 1, 1),
(62, 54, 'Información Contractual 2017', '<p>Procesos contratuales.&nbsp;</p>', '9db8c2fd63084b4340fc3eec077c622aInformación Contractual 2017.pdf', '2017-01-31', '2023-02-23 16:25:22', 1, 1),
(63, 54, 'Información Contractual 2018', '<p>Proceso Contratual.&nbsp;</p>', '48bb4de25deb219926f98cc01197a8c8Información Contractual 2018.pdf', '2018-01-31', '2023-02-23 16:26:28', 1, 1),
(64, 54, 'Información Contractual 2019', '<p>Procesos contratuales&nbsp;</p>', 'bc3f6026a3d5b001f9715294d8c0d472Información Contractual 2019.pdf', '2019-01-31', '2023-02-23 16:27:17', 1, 1),
(65, 54, 'Información Contractual 2020', '<p>Procesos Contratuales.</p>', '7fc153f796e08f5bc27b3bc15eabafd1Información Contractual 2020.xlsx', '2020-01-31', '2023-02-23 16:28:34', 1, 1),
(66, 54, 'Información Contractual 2021', '<p>Procesos Contratuales&nbsp;</p>', '4000cfb35f4c083b74b7bb775bcbc22eInformación Contractual 2021.xlsx', '2021-01-31', '2023-02-23 16:29:27', 1, 1),
(67, 54, 'Información Contractual 2022', '<p>Procesos Contratuales.</p>', 'd747854765686db3b90079ab4962c600Información Contractual 2022.xlsx', '2022-01-31', '2023-02-23 16:30:48', 1, 1),
(68, 56, 'Presupuesto 2020', '<p>Presupuesto Aprobado&nbsp;</p>', '8674e1640df6a7450a03c54e399f7a77Presupuesto 2020.pdf', '2020-01-31', '2023-02-23 16:32:43', 1, 1),
(69, 56, 'Presupuesto 2021', '<p>Presupuesto Aprobado.</p>', '15fa2da174a36be47de3619915ca1c1fPresupuesto 2021.pdf', '2021-01-31', '2023-02-23 16:36:41', 1, 1),
(70, 56, 'Presupuesto 2022', '<p>Presupuesto Aprobado&nbsp;</p>', '10683bd41f396142cd33e40c692f9b48Presupuesto 2022.pdf', '2022-01-31', '2023-02-23 16:38:30', 1, 1),
(71, 57, 'Egresos 2018', '<p>Ejecuci&oacute;n.&nbsp;</p>', 'b46a302419f568ba978eeafb059f91c8Egresos 2018.pdf', '2019-01-31', '2023-02-23 16:43:02', 1, 1),
(72, 57, 'Egresos 2019', '<p>Ejecui&oacute;n.&nbsp;</p>', '6fd16d5c42deaa651798c2e524e31f9cEgresos 2019.xlsx', '2020-01-31', '2023-02-23 16:44:38', 1, 1),
(73, 57, 'Egresos 2020', '<p>Ejecuci&oacute;n.&nbsp;</p>', '447c11ad0bdd0aa9dea7195ffef58665Egresos 2020.xlsx', '2021-01-31', '2023-02-23 16:46:26', 1, 1),
(74, 57, 'Egresos 2021', '<p>Ejecuci&oacute;n.</p>', 'c4c17979da0e0c162e589ea2232adc71Egresos 2021.xlsx', '2022-01-31', '2023-02-23 16:47:37', 1, 1),
(75, 57, 'Ingresos 2018', '<p>Ejecuci&oacute;n.</p>', '4ced376d0fcaa1f254efb800eb5fb6c9Ingresos 2018.pdf', '2019-01-31', '2023-02-23 16:48:42', 1, 1),
(76, 57, 'Ingresos 2019', '<p>Ejecuci&oacute;n.</p>', '9a96fa513d14293d81f5abef5955eb51Ingresos 2019.xlsx', '2020-01-31', '2023-02-23 16:49:47', 1, 1),
(77, 57, 'Ingresos 2020', '<p>Ejecuci&oacute;n.&nbsp;</p>', 'd747854765686db3b90079ab4962c600Ingresos 2020.xlsx', '2021-01-31', '2023-02-23 16:50:48', 1, 1),
(78, 57, 'Ingresos 2021', '<p>Ejecuci&oacute;n.&nbsp;</p>', '82053c7a912d0d7de4f2cb4622d903d8Ingresos 2021.xlsx', '2022-01-31', '2023-02-23 16:51:57', 1, 1),
(79, 58, 'Diciembre 2021', '<p>Estados financieros</p>', 'ae91babd36761cfce43a80fcb6eab763diciembre 2021.pdf', '2021-12-30', '2023-02-24 08:49:17', 1, 1),
(80, 58, 'Febrero 2021', '<p>Estados financieros&nbsp;</p>', 'c044631a42afabea67c0e3985833ff35febrero 2021.pdf', '2021-02-28', '2023-02-24 08:54:22', 1, 1),
(81, 58, 'Enero 2021', '<p>Estados Financieros&nbsp;</p>', '70025f1de85753c1f2eef88f624628e7enero 2021.pdf', '2021-01-30', '2023-02-24 08:55:47', 1, 1),
(82, 58, 'Noviembre 2022', '<p>Estados financieros&nbsp;</p>', 'ee5e6d5328824c6c9ef040a37d708f95NOVIEMBRE 2022.pdf', '2022-11-30', '2023-02-25 08:48:59', 1, 1),
(83, 58, 'Octubre 2022', '<p>Estados financieros.</p>', '90e26bd960ea9bea754b4d5604d5bda7octubre 2022.pdf', '2022-10-30', '2023-02-25 08:50:55', 1, 1),
(84, 58, 'Septiembre 2022', '<p>Estados financieros.</p>', '2c159c17672d6f279e725ba4b62ad95fseptiembre 2022.pdf', '2022-09-30', '2023-02-25 08:52:52', 1, 1),
(85, 58, 'Agosto 2022', '<p>Estados financieros&nbsp;</p>', '2c159c17672d6f279e725ba4b62ad95fagosto 2022.pdf', '2022-08-30', '2023-02-25 08:55:52', 1, 1),
(86, 58, 'Julio 2022', '<p>Esatdos financieros&nbsp;</p>', '90e26bd960ea9bea754b4d5604d5bda7julio 2022.pdf', '2022-07-30', '2023-02-25 08:59:55', 1, 1),
(87, 58, 'Junio 2022', '<p>Estados financieros</p>', '121f3aa725e0e3bf5437394d987a7959junio 2022.pdf', '2022-06-30', '2023-02-25 09:01:36', 1, 1),
(88, 58, 'Mayo 2022', '<p>Estados financieros&nbsp;</p>', '215fa23bf436b0db8454287aae01ebe4mayo 2022.pdf', '2022-05-30', '2023-02-25 09:03:00', 1, 1),
(89, 58, 'Abril 2022.', '<p>Estados financieros&nbsp;</p>', '2cbe25dce08c00a49c3ea3d0eaab681fabril 2022.pdf', '2022-05-30', '2023-02-25 09:04:05', 1, 1),
(90, 1, 'Marzo 2022', '<p>Esatdos Financieros&nbsp;</p>', '0e099ff8cfb2b2371f5b65eccb937bbd', '2022-03-30', '2023-02-25 09:04:54', 1, 1),
(91, 58, 'Enero 2022', '<p>Estados financieros&nbsp;</p>', '215fa23bf436b0db8454287aae01ebe4enero 2022.pdf', '2022-01-30', '2023-02-25 09:06:00', 1, 1),
(92, 58, 'Febrero 2022', '<p>Estados financieros&nbsp;</p>', '2cbe25dce08c00a49c3ea3d0eaab681ffebrero 2022.pdf', '2022-02-28', '2023-02-25 09:07:05', 1, 1),
(93, 58, 'Noviembre 2021', '<p>Estados financieros 2021</p>', '1d2f84ef5b2a12a945cf17d2eb75eb7cnoviembre 2021.pdf', '2021-11-30', '2023-02-25 09:11:07', 1, 1),
(94, 58, 'Octubre 2021', '<p>Estados financieros.&nbsp;</p>', 'e86eeaa677eeb3387841a45251ca183foctubre 2021.pdf', '2021-10-30', '2023-02-25 09:12:33', 1, 1),
(95, 58, 'Septiembre 2021', '<p>Estados financieros&nbsp;</p>', 'f915c0f92e5c2d520f2ebe38c30ae7acseptiembre 2021.pdf', '2021-09-30', '2023-02-25 09:14:34', 1, 1),
(96, 58, 'Junio 2021', '<p>&nbsp;Estados financieros.</p>', 'd7ac1cc1b4b691b046c611b1091a5d0djunio 2021.pdf', '2021-06-30', '2023-02-25 09:16:10', 1, 1),
(97, 58, 'Mayo 2021', '<p>Estados financieros.</p>', '816dd8ea6b0b8a081227ef15e075e3eamayo 2021.pdf', '2021-05-30', '2023-02-25 09:17:37', 1, 1),
(98, 58, 'Abril 2021', '<p>Estados Financieros.</p>', '470f9dbea5d6d5c8068ecdbf8b93f188abril 2021.pdf', '2021-05-30', '2023-02-25 09:18:39', 1, 1),
(99, 58, 'Marzo 2021', '<p>Estados financieros.&nbsp;</p>', 'c726931807f409b19699239d7207e36amarzo 2021.pdf', '2021-03-30', '2023-02-25 09:19:42', 1, 1),
(100, 58, 'Diciembre 2020', '<p>Estados financieros&nbsp;</p>', 'fb39969dc86d95103e3b39ed18aa9a3fdiciembre 2020.pdf', '2020-12-30', '2023-02-25 09:21:14', 1, 1),
(101, 58, 'Octubre 2020', '<p>Estados financieros&nbsp;</p>', '09183a37046135cc64be2602b2d463c8octubre 2020.pdf', '2020-10-30', '2023-02-25 09:22:15', 1, 1),
(102, 58, 'Noviembre 2020', '<p>Estados Financieros.</p>', '93e3620d70409d74ea39f573eb7ec24bnoviembre 2020.pdf', '2020-11-30', '2023-02-25 09:37:57', 1, 1),
(103, 58, 'Septiembre 2020', '<p>Estados financieros.</p>', '8d3d0378d77e01bc4916dbbc5a487fb7septiembre 2020.pdf', '2020-09-30', '2023-02-25 09:39:29', 1, 1),
(104, 58, 'Agosto 2020', '<p>Estado financieros.</p>', '9372c3f9ee446193a23057017af8f7a1agosto 2020.pdf', '2020-08-30', '2023-02-25 09:40:25', 1, 1),
(105, 58, 'Julio 2020', '<p>Estados financieros.&nbsp;</p>', '8a606336cbdeca2cb5be25b17fee8aa4julio 2020.pdf', '2020-07-30', '2023-02-25 09:41:32', 1, 1),
(106, 58, 'Junio 2020', '<p>Estados financieros&nbsp;</p>', '77aa5965f0b20311a6e6b90fb4a6c8efjunio 2020.pdf', '2020-06-30', '2023-02-25 09:42:19', 1, 1),
(107, 58, 'Mayo 2020', '<p>Estados financieros&nbsp;</p>', '0c9c89f361f270d43340332663b400e5mayo 2020.pdf', '2020-05-30', '2023-02-25 09:43:16', 1, 1),
(108, 58, 'Abril 2020', '<p>Estados financieros.&nbsp;</p>', '0607cca3fd293165fd339f9f4cdf32e6abril 2020.pdf', '2020-04-30', '2023-02-25 09:44:22', 1, 1),
(109, 58, 'Marzo 2020', '<p>Estados financieros.&nbsp;</p>', '0c9c89f361f270d43340332663b400e5marzo 2020.pdf', '2020-03-30', '2023-02-25 09:45:16', 1, 1),
(110, 58, 'Febrero 2020', '<p>Estados Financieros.&nbsp;</p>', '96448abd28e06f3aa0b0cc233eba4e43febrero 2020.pdf', '2020-02-28', '2023-02-25 09:46:38', 1, 1),
(111, 58, 'Enero 2020', '<p>Estados financieros.&nbsp;</p>', 'f915c0f92e5c2d520f2ebe38c30ae7acenero 2020.pdf', '2020-01-30', '2023-02-25 09:47:34', 1, 1),
(112, 59, 'SG-PL-01 Plan Estratégico de TIC', '<p>Planes estrat&eacute;gicos</p>', 'f75b178e32d4cab6b9a964268b3154b4petic.pdf', '2018-01-30', '2023-02-25 09:53:41', 1, 1),
(113, 59, 'TH-PL-02 Plan de Bienestar', '<p>PLanes estrat&eacute;gicos&nbsp;</p>', 'ce1f9bab6065d5e7472cd523e513d63fTH-PL-02 Plan de Bienestar.pdf', '2018-01-30', '2023-02-25 09:55:24', 1, 1),
(114, 59, 'TH-PL-03 Plan Estratégico del Talento Humano', '<p>Planes estrat&eacute;gicos.</p>', '8d3d0378d77e01bc4916dbbc5a487fb7TH-PL-03 Plan Estratégico del Talento Humano.pdf', '2018-01-30', '2023-02-25 09:56:29', 1, 1),
(115, 59, 'PAD-PL-01 Plan Institucional de archivos PINAR', '<p>Planes estrategicos.&nbsp;</p>', '15ee0e6ae2ab9274617697f568176089PAD-PL-01 Plan Institucional de archivos PINAR.pdf', '2019-01-30', '2023-02-25 10:00:07', 1, 1),
(116, 59, 'PDE-PL-01 Plan de Contingencia y Emergencia', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'ed9f2d649736d8226840d0682b0543b0PDE-PL-01 Plan de Contingencia y Emergencia.pdf', '2019-01-30', '2023-02-25 10:02:03', 1, 1),
(117, 59, 'PGC-PL-01 Plan Estratégico de Tecnologías de la Información PETI', '<p>Planes estrat&eacute;gicos</p>', '5a4cf4d3b25922dee17f6e43849d5133PGC-PL-01 Plan Estratégico de Tecnologías de la Información PETI.pdf', '2019-01-30', '2023-02-25 10:04:16', 1, 1),
(118, 59, 'PGC-PL-02 Plan de Seguridad y Privacidad de la Información y Tratamiento de Riesgos', '<p>Planes Estrat&eacute;gicos</p>', '467c081ec0d2a8523015285e6194f611PGC-PL-02 Plan de Seguridad y Privacidad de la Información y Tratamiento de Riesgos.pdf', '2019-01-30', '2023-02-25 10:06:15', 1, 1),
(119, 59, 'Plan Anual de Seguridad y Salud en el Trabajo', '<p>Planes estrat&eacute;gicos.&nbsp;</p>', '82e947ee00f7385860812952b9813051Plan Anual de Seguridad y Salud en el Trabajo.pdf', '2019-01-30', '2023-02-25 10:06:57', 1, 1),
(120, 59, 'PRE-PG-01 Programa para la Prestación de Servicio Público de Aseo', '<p>Planes estrat&eacute;gicos.</p> <p>&nbsp;</p>', '1f29c63da6cf91ca0fb72f1279651d3cPRE-PG-01 Programa para la Prestación de Servicio Público de Aseo.pdf', '2019-01-30', '2023-02-25 10:07:44', 1, 1),
(121, 59, 'PTH-PL-01 Plan Anual de Vacantes', '<p>Planes estrat&eacute;gicos.&nbsp;</p>', '36fadbdd888c4695795a5c5503af1944PTH-PL-01 Plan Anual de Vacantes.pdf', '2019-01-30', '2023-02-25 10:08:52', 1, 1),
(122, 59, 'PTH-PL-02 Plan de Bienestar e Incentivos', '<p>Planes estrat&eacute;gicos.&nbsp;</p>', '4941f10f7a2d08658bc1046cb3629d03PTH-PL-02 Plan de Bienestar e Incentivos.pdf', '2019-01-30', '2023-02-25 10:11:06', 1, 1),
(123, 59, 'PTH-PL-03 Plan Previsión de Recursos Humanos', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '1ab4132909e3dee95c6d178ff43ca953PTH-PL-03 Plan Previsión de Recursos Humanos.pdf', '2019-01-30', '2023-02-25 10:11:58', 1, 1),
(124, 59, 'PTH-PL-04 Plan Institucional de Capacitación', '<p>Planes estrat&eacute;gicos&nbsp;</p> <p>&nbsp;</p>', '36fadbdd888c4695795a5c5503af1944PTH-PL-04 Plan Institucional de Capacitación.pdf', '2019-01-30', '2023-02-25 10:12:52', 1, 1),
(125, 59, 'PTH-PL-06 Plan Estratégico de Talento Humano', '<p>Planes estrat&eacute;gicos.&nbsp;</p>', '1f29c63da6cf91ca0fb72f1279651d3cPTH-PL-06 Plan Estrategico de Talento Humano.pdf', '2019-01-30', '2023-02-25 10:13:44', 1, 1),
(126, 59, 'PAD-PL-01 Plan Institucional de Archivo PINAR', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '467c081ec0d2a8523015285e6194f611PAD-PL-01 Plan Institucional de Archivo PINAR.pdf', '2020-01-03', '2023-02-25 10:15:15', 1, 1),
(127, 59, 'PGC-PL-01 Plan Estratégico de Tecnologías (PETIC)', '<p>Planes estrat&eacute;gicos.</p>', '5a4cf4d3b25922dee17f6e43849d5133PGC-PL-01 Plan Estrategico de Tecnologias (PETIC).pdf', '2020-01-30', '2023-02-25 10:16:16', 1, 1),
(128, 59, 'PGC-PL-02 Plan de Seguridad y Privacidad de la Información y Tratamiento de Riesgos', '<p>Planes estrat&eacute;gicos.</p>', 'b055cf1b04b603b5523fa6d40c6fbec6PGC-PL-02 Plan de Seguridad y Privacidad de la Información y Tratamiento de Riesgos.pdf', '2020-01-30', '2023-02-25 10:17:27', 1, 1),
(129, 59, 'PTH-PL-01 Plan Anual de Vacantes', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '5a4cf4d3b25922dee17f6e43849d5133PTH-PL-01 Plan Anual de Vacantes.pdf', '2020-01-30', '2023-02-25 10:18:16', 1, 1),
(130, 59, 'PTH-PL-02 Plan de Bienestar e Incentivos', '<p>Planes estrat&eacute;gicos.</p>', 'b8b65d274abc123f0780087783245051PTH-PL-02 Plan de Bienestar e Incentivos.pdf', '2020-01-30', '2023-02-25 10:19:12', 1, 1),
(131, 59, 'PTH-PL-03 Plan Previsión Recursos Humanos', '<p>Planes estrat&eacute;gicos.</p> <p>&nbsp;</p>', '9a86e4a0dd4c7f722486e4c64f2a3888PTH-PL-03 Plan Previsión Recursos Humanos.pdf', '2020-01-30', '2023-02-25 10:20:18', 1, 1),
(132, 59, 'PTH-PL-04 Plan Institucional de Capacitación', '<p style=\"text-align: justify;\">Planes estrat&eacute;gicos&nbsp;</p>', 'd8d09ba9c864b597d501931d9e4148f2PTH-PL-04 Plan Institucional de Capacitación.pdf', '2020-01-30', '2023-02-25 10:21:21', 1, 1),
(133, 59, 'PTH-PL-06 Plan Estratégico Talento Humano', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '5a4cf4d3b25922dee17f6e43849d5133PTH-PL-06 Plan Estrategico Talento Humano.pdf', '2020-01-30', '2023-02-25 10:22:16', 1, 1),
(134, 59, 'PTH-PL-07 Plan Trabajo Anual de Seguridad y Salud en el Trabajo', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '82baed9187d54bacab6a1f5cc66e59acPTH-PL-07 Plan Trabajo Anual de Seguridad y Salud en el Trabajo.pdf', '2020-01-30', '2023-02-25 10:23:51', 1, 1),
(135, 59, 'PG-OP-01 Programa para la Prestación de Servicio Público de Aseo', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '0b0ed89fd0e8bc10912a33143ef3d858PG-OP-01 Programa para la Prestación de Servicio Público de Aseo.pdf', '2021-01-30', '2023-02-25 10:25:41', 1, 1),
(136, 59, 'Plan Anticorrupción y de Atención al Ciudadano', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '8bb1b92bc95580834331342366ce79cbPlan Anticorrupción y de Atención al Ciudadano.pdf', '2021-01-30', '2023-02-25 10:26:29', 1, 1),
(137, 59, 'Plan anual de Seguridad y Salud en el Trabajo 2021', '<p>Planes estrat&eacute;gicos.</p> <p>&nbsp;</p>', 'b8b65d274abc123f0780087783245051Plan anual de Seguridad y Salud en el Trabajo 2021.pdf', '2021-01-30', '2023-02-25 10:28:12', 1, 1),
(138, 59, 'Plan anual de Seguridad y Salud en el Trabajo 2021 - Anexo', '<p>Planes estrat&eacute;gicos.</p>', '4941f10f7a2d08658bc1046cb3629d03Plan anual de Seguridad y Salud en el Trabajo 2021 - Anexo.pdf', '2021-01-30', '2023-02-25 10:29:06', 1, 1),
(139, 59, 'Plan de Acción 2021', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'a7c2f57823a7f52a0a0f953df1010198Plan de Acción 2021.pdf', '2021-01-30', '2023-02-25 10:30:14', 1, 1),
(140, 59, 'Plan de Bienestar e Incentivos', '<p>Planes estrat&eacute;gicos.</p>', 'dbaef2995ecb28fd4b334d707cd054d0Plan de Bienestar e Incentivos.pdf', '2021-01-30', '2023-02-25 10:31:42', 1, 1),
(141, 59, 'Plan de participación ciudadana', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '7c4a1cba42406bdad4f4f475219e7c98Plan de participación ciudadana.pdf', '2021-01-30', '2023-02-25 10:32:45', 1, 1),
(142, 59, 'Plan de Seguridad y Privacidad de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '1ad4b6829ef00bffadca0125e4c79914Plan de Seguridad y Privacidad de la Información.pdf', '2021-01-30', '2023-02-25 10:33:49', 1, 1),
(143, 59, 'Plan de Tratamiento de Riesgos de Privacidad y Seguridad de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'dbaef2995ecb28fd4b334d707cd054d0Plan de Tratamiento de Riesgos de Privacidad y Seguridad de la Información.pdf', '2021-01-30', '2023-02-25 10:35:42', 1, 1),
(144, 59, 'Plan Estratégico 2020-2023', '<p>Planes estrategicos&nbsp;</p>', '796306e776ac6980cb1d005a70093a17Plan Estratégico 2020-2023.pdf', '2021-01-30', '2023-02-25 10:40:40', 1, 1),
(145, 59, 'Plan Estratégico de Talento Humano', '<p>Planes estrat&eacute;gicos.</p>', '833df9a581fb40b364f9edc409757014Plan Estratégico de Talento Humano.pdf', '2021-01-30', '2023-02-25 10:41:26', 1, 1),
(146, 59, 'Plan Estratégico de Talento Humano - Anexo', '<p>Planes estrat&eacute;gicos.</p>', '11112b91563a7f4944ed17b4c4c131cePlan Estratégico de Talento Humano - Anexo.pdf', '2021-01-30', '2023-02-25 10:42:19', 1, 1),
(147, 59, 'Plan Estratégico de Tecnologías de la Información y de las Comunicaciones', '<p>Planes estrat&eacute;gicos&nbsp;</p> <p>&nbsp;</p>', '15ee0e6ae2ab9274617697f568176089Plan Estratégico de Tecnologías de la Información y de las Comunicaciones.pdf', '2021-01-30', '2023-02-25 10:43:07', 1, 1),
(148, 59, 'Plan Estratégico de Tecnologías de La Información y de las Comunicaciones 2021', '<p>Planes estrat&eacute;gicos.</p>', '804c53f04cb2e1bdaefdd428d72d2106Plan Estratégico de Tecnologías de La Información y de las Comunicaciones 2021.pdf', '2021-01-30', '2023-02-25 10:43:50', 1, 1),
(149, 59, 'Plan Institucional de Archivo', '<p>Planes estrat&eacute;gicos.</p>', 'a5d1605c227d3282ef25913cc1556ca0Plan Institucional de Archivo.pdf', '2021-01-30', '2023-02-25 10:44:30', 1, 1),
(150, 59, 'Plan Institucional de Archivo - Anexo', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'e548bb241675b45b0133cef20dba48cfPlan Institucional de Archivo - Anexo.pdf', '2021-01-30', '2023-02-25 10:45:22', 1, 1),
(151, 59, 'Plan Institucional de Capacitaciones', '<p>Planes estrat&eacute;gicos.</p>', '1ec3b01e1d7e5e5757debdae51db8f68Plan Institucional de Capacitaciones.pdf', '2021-01-30', '2023-02-25 10:52:54', 1, 1),
(152, 59, 'Plan Anticorrupción y de Atención al Ciudadano', '<p>Planes estrat&eacute;gicos.</p>', '36fadbdd888c4695795a5c5503af1944Plan Anticorrupción y de Atención al Ciudadano.pdf', '2022-01-30', '2023-02-25 10:55:52', 1, 1),
(153, 59, 'Plan Anual de Seguridad y Salud en el Trabajo', '<p>Planes estrat&eacute;gicos</p>', 'ed9f2d649736d8226840d0682b0543b0Plan Anual de Seguridad y Salud en el Trabajo.pdf', '2022-01-30', '2023-02-25 10:57:03', 1, 1),
(154, 59, 'Plan de Acción Proyectado', '<p>Planes estrat&eacute;gicos.</p>', '118a6753b3daaaff5eb201772929ae3cPlan de Acción Proyectado.pdf', '2022-01-30', '2023-02-25 10:58:53', 1, 1),
(155, 59, 'Plan de Anual de Adquisiciones', '<p>Planes estrat&eacute;gicos.</p>', '3b9293c54a34e8559b785c9845f38a20Plan de Anual de Adquisiciones.pdf', '2022-01-30', '2023-02-25 10:59:31', 1, 1),
(156, 59, 'Plan de Bienestar e Incentivos', '<p>Planes estrat&eacute;gicos</p>', 'c207cdbbc80ab3f0bc47bb44f1acb225Plan de Bienestar e Incentivos.pdf', '2022-01-30', '2023-02-25 11:00:23', 1, 1),
(157, 59, 'Plan de Mantenimiento Preventivo', '<p>Planes estrat&eacute;gicos</p>', '5fa6952750970e87f9055653b4efb208Plan de Mantenimiento Preventivo.pdf', '2022-01-30', '2023-02-25 11:01:14', 1, 1),
(158, 59, 'Plan de Participación Ciudadana', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '9a90ad8cd37a87c24da5df181358a0d8Plan de Participación Ciudadana.pdf', '2022-01-30', '2023-02-25 11:02:11', 1, 1),
(159, 59, 'Plan de Seguridad y Privacidad de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'f8b6d42025e5fac5dc7d3c9f165506e0Plan de Seguridad y Privacidad de la Información.pdf', '2022-01-30', '2023-02-25 11:07:21', 1, 1),
(160, 59, 'Plan Estratégico de Talento Humano', '<p>Planes estrat&eacute;gicos</p>', '7f893dc5a3ee7c0536f85e0fef4333b0Plan Estratégico de Talento Humano.pdf', '2022-01-30', '2023-02-25 11:10:44', 1, 1),
(161, 59, 'Plan Estratégico de Tecnologías de la Información', '<p>Planes estrat&eacute;gicos.</p>', '1a5bc84cccc9941ae9bc78af5256f8ecPlan Estratégico de Tecnologías de la Información.pdf', '2022-01-30', '2023-02-25 11:12:25', 1, 1),
(162, 59, 'Plan Institucional de Archivo', '<p>Planes estrat&eacute;gicos.&nbsp;</p>', '985f1a0449d5714991793c0e4e0e317bPlan Institucional de Archivo.pdf', '2022-01-30', '2023-02-25 11:25:37', 1, 1),
(163, 59, 'Plan Institucional de Capacitación', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '68bbb6c2261cb4dadfe8523f13af8a0bPlan Institucional de Capacitación.pdf', '2022-01-30', '2023-02-25 11:26:24', 1, 1),
(164, 59, 'Plan de Adquisiciones', '<p>Planes estrat&eacute;gicos.</p>', 'ef4a700e08987cd666638413314becfdPlan de adquisiciones.pdf', '2022-01-30', '2023-02-25 11:28:55', 1, 1),
(165, 59, 'Plan de Seguridad y Salud en el Trabajo', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '39f42166dead07d3837572ee2897f233Plan de Seguridad y Salud en el Trabajo.pdf', '2023-01-30', '2023-02-25 11:30:42', 1, 1),
(166, 59, 'Planes de Bienestar e Incendios', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '40e2caa0509d2a327be20e09485e4bfcPlanes de Bienestar e Incendios.pdf', '2023-01-30', '2023-02-25 11:32:00', 1, 1),
(167, 59, 'Plan de Acción y Consolidado', '<p>Planes estrat&eacute;gicos</p>', '15f46233c619fc3b062c269f215d87e8Plan de Acción y Consolidado.pdf', '2023-01-30', '2023-02-25 11:33:28', 1, 1),
(168, 59, 'Plan de Anticorrupción y de Atención al Ciudadano', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '39f42166dead07d3837572ee2897f233Plan de Anticorrupción y de Atención al Ciudadano.pdf', '2023-01-30', '2023-02-25 11:35:42', 1, 1),
(169, 59, 'Plan de Participación Ciudadana', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'cf3dbac175f4a3c23d592af380227a0aPlan de Participación  Ciudadana.pdf', '2023-01-30', '2023-02-25 11:37:13', 1, 1),
(170, 59, 'Plan de Privacidad y Seguridad de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '0dcea766f3fb89d6fc481f68f3f5f7a5Plan de Participación  Ciudadana.pdf', '2023-01-30', '2023-02-25 11:38:39', 1, 1),
(171, 59, 'Plan Estratégico de Talento Humano', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'ef4a700e08987cd666638413314becfdPlan Estratégico de Talento Humano.pdf', '2023-01-30', '2023-02-25 11:40:55', 1, 1),
(172, 59, 'Plan Estratégico de Tecnología de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '7f893dc5a3ee7c0536f85e0fef4333b0Plan Estratégico de Tecnología de la  Información.pdf', '2023-01-30', '2023-02-25 11:42:44', 1, 1),
(173, 59, 'Plan Estratégico de Tratamiento de Riesgos de Seguridad de la Información', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '51230426803747368c8c49928c18ac4fPlan Estratégico de Tecnología de la  Información.pdf', '2023-01-30', '2023-02-25 11:45:01', 1, 1),
(174, 59, 'Plan Institucional de Archivo', '<p>Planes estrat&eacute;gicos&nbsp;</p>', '688708cde9ce825ef52234f740ea180cPlan Institucional del Archivo.pdf', '2023-01-30', '2023-02-25 11:50:36', 1, 1),
(175, 59, 'Plan Institucional de Capacitaciones', '<p>Planes estrat&eacute;gicos&nbsp;</p>', 'd7a4b2eeb8815dc441e851fd758f53a6Plan Institucional de Capacitaciones.pdf', '2023-01-30', '2023-02-25 11:52:26', 1, 1),
(176, 60, 'FO-DE-12 Informe de Gestión 2022', '<p>Informes&nbsp;</p>', 'c4dcb95462170125427826aa90b47a04FO-DE-12 Informe de Gestión 2022.pdf', '2022-01-30', '2023-02-25 11:57:35', 1, 1),
(177, 60, 'FO-DE-12 Informe de Gestión 2021', '<p>Informes.</p>', '70b0de2b4df60c4804652bf0298c6fa3FO-DE-12 Informe de Gestión 2021.pdf', '2021-01-30', '2023-02-25 12:01:40', 1, 1),
(178, 60, 'FO-DE-12 Informe de Gestión 2021 Segundo Semestre', '<p>Informe&nbsp;</p>', '0ad346d95ba884eb75648559b6a2c779FO-DE-12 Informe de Gestión 2021 Segundo Semestres.pdf', '2021-01-30', '2023-02-25 12:04:35', 1, 1),
(179, 60, 'FO.SG.12 Informe de Gestión 2020', '<p>Informes.</p>', '622daf506f045eb1465ef6154a549254FO.SG.12 Informe de Gestión 2020.pdf', '2020-01-30', '2023-02-25 12:05:32', 1, 1),
(180, 60, 'FO.SG.12 Informe de Gestión 2019', '<p>Informes</p>', '000abf0eea1c4b56f9a115349005fa7fFO.SG.12 Informe de Gestión 2019.pdf', '2019-01-30', '2023-02-25 12:06:34', 1, 1),
(181, 60, 'FO.SG.12 Informe de Gestión 2018', '<p>Infomes</p>', '2bb8cadd08a142eeecda4cbc1857d4beFO.SG.12 Informe de Gestión 2018.pdf', '2018-01-30', '2023-02-25 12:08:20', 1, 1),
(182, 60, 'FO.SG.12 Informe de Gestión 2016', '<p>Informes.</p>', '04c5433b3232e6c1ba99400511c8e942FO.SG.12 Informe de Gestión 2016.pdf', '2016-01-30', '2023-02-25 12:10:00', 1, 1),
(183, 60, 'FO.SG.12 Informe de Gestión 2014', '<p>Informes.</p>', '82b101c44b51774e74bb844a683efbc1FO.SG.12 Informe de Gestión 2014.pdf', '2014-01-30', '2023-02-25 12:12:53', 1, 1),
(184, 61, 'Informe de Empalme 2021', '<p>Informes de empalme&nbsp;</p>', '2d092e0bcb78037e89cc8caaf28d351bInforme de Empalme 2021.pdf', '2021-01-30', '2023-02-25 12:21:33', 1, 1),
(185, 61, 'Informe de Empalme 2020', '<p>infomes de empalme&nbsp;</p>', '8e079abbc5ce356135e2673032dfdcf7Informe de Empalme 2020.pdf', '2020-01-30', '2023-02-25 12:25:31', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `emailarea` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `emailarea`, `status`) VALUES
(1, 'Dirección Financiera', 'financiero@candeaseo.gov.co', 1),
(2, 'Dirección Administrativa', 'administrativo@candeaseo.gov.co', 1),
(3, 'Dirección Comercial', 'comercial@candeaseo.gov.co', 1),
(4, 'Dirección Operativa', 'opertativo@candeaseo.gov.vo', 1),
(5, 'Gerencia', 'gerencia@candeaseo.gov.co', 1),
(6, 'Control Interno', 'controlinterno@candeaseo.gov.co', 1),
(7, 'Dirección Jurídica', 'juridico@candeaseo.gov.co', 1),
(8, 'Dirección de Planeación ', 'planeacion@candeaseo.gov.co', 1),
(10, 'Sin asignación', 'danielfuertes24@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques`
--

CREATE TABLE `bloques` (
  `iddiv` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icon` varchar(70) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bloques`
--

INSERT INTO `bloques` (`iddiv`, `nombre`, `icon`, `url`, `status`) VALUES
(1, 'Directorio', 'bi bi-book-half', '/comercial', 1),
(2, 'Brochure', 'bi bi-bag-heart', 'https://candeaseo.gov.co/Assets/images/Brochure.pdf', 1),
(3, 'Tramites', 'bi bi-bank', '/tramites', 1),
(4, 'Directores', 'bi bi-person-lines-fill', '/equipo', 1),
(5, 'Bloque 5', 'bi bi-5-circle-fill', 'https://candeaseo.gov.co/', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal_pqr`
--

CREATE TABLE `canal_pqr` (
  `id` int(11) NOT NULL,
  `canal` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canal_pqr`
--

INSERT INTO `canal_pqr` (`id`, `canal`, `status`) VALUES
(1, 'Presencial Cabecera', 1),
(2, 'Correo Electrónico ', 1),
(3, 'Página Web', 1),
(4, 'Otro', 1),
(5, 'Redes Sociales', 1),
(6, 'Telefónico', 1),
(8, 'Presencial Villagorgona', 1),
(9, 'Presencial Poblado Campestre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `portada`, `datecreated`, `status`) VALUES
(10, '1. Información de la entidad', 'Información de la entidad', 'portada_categoria.png', '2023-02-12 10:12:06', 1),
(11, '2. Normativa', 'Normativa', 'portada_categoria.png', '2023-02-13 07:49:09', 1),
(12, '3. Contratación', 'Contratación', 'portada_categoria.png', '2023-02-13 08:35:33', 1),
(13, '4. Planeación', 'Planeación', 'portada_categoria.png', '2023-02-23 10:21:32', 1),
(14, '5. Tramites', 'Tramites', 'portada_categoria.png', '2023-02-23 10:42:05', 1),
(15, '6. Datos Abiertos', 'Datos Abiertos', 'portada_categoria.png', '2023-02-23 10:47:36', 1),
(16, '7. Información Para Grupos Especifico.', 'Información Para Grupos Especifico.', 'portada_categoria.png', '2023-02-23 10:58:00', 1),
(17, '8. Normatividad Especial.', 'Normatividad Especial.', 'portada_categoria.png', '2023-02-23 11:03:50', 1),
(18, '9. Sección De Noticias.', 'Sección De Noticias.', 'portada_categoria.png', '2023-02-23 11:05:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_dir`
--

CREATE TABLE `categoria_dir` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categoria_dir`
--

INSERT INTO `categoria_dir` (`idcategoria`, `nombre`, `descripcion`, `portada`, `datecreated`, `status`) VALUES
(13, 'Ferreteria', 'Ferretería Descripción', 'portada_categoria.png', '2023-02-19 16:10:30', 1),
(14, 'Droguerías', 'Categoría de Droguerías', 'portada_categoria.png', '2023-02-19 17:09:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(11) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `strong` varchar(50) NOT NULL,
  `small` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `numero`, `strong`, `small`, `status`) VALUES
(1, 240, 'Kilometros', 'de zonas verdes', 1),
(2, 641, 'Usuarios', 'vinculados en la entidad', 1),
(3, 12500, 'Metros Cuadrados', 'Parques', 1),
(6, 1034, 'Metros Cubicos', 'de residuos de construcción y demolición', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corregimiento`
--

CREATE TABLE `corregimiento` (
  `id_corregimiento` int(11) NOT NULL,
  `municipio` int(11) NOT NULL DEFAULT 157,
  `corregimiento` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `corregimiento`
--

INSERT INTO `corregimiento` (`id_corregimiento`, `municipio`, `corregimiento`, `estatus`) VALUES
(1, 1, 'Cabecera', 1),
(2, 1, 'Villagorgona', 1),
(3, 1, 'La Regina', 1),
(4, 1, 'Otoño', 1),
(5, 1, 'El Lauro', 1),
(6, 1, 'Madre Vieja', 1),
(7, 1, 'El Cabuyal', 1),
(8, 1, 'El Arenal', 1),
(9, 1, 'Buchitolo', 1),
(10, 1, 'El Carmelo', 1),
(11, 1, 'Cavasa', 1),
(12, 1, 'San Joaquin', 1),
(13, 1, 'Tiple', 1),
(14, 1, 'Poblado Campestre', 1),
(15, 1, 'Cauca Seco', 1),
(16, 1, 'Domingo Largo', 1),
(17, 1, 'Juanchito', 1),
(18, 2, 'Otro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(2) NOT NULL,
  `pais` int(11) NOT NULL DEFAULT 52,
  `departamento` varchar(255) NOT NULL DEFAULT '',
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `pais`, `departamento`, `estatus`) VALUES
(1, 52, 'VALLE DEL CAUCA', 1),
(5, 52, 'ANTIOQUIA', 1),
(8, 52, 'ATLÁNTICO', 1),
(11, 52, 'BOGOTÁ, D.C.', 1),
(13, 52, 'BOLÍVAR', 1),
(15, 52, 'BOYACÁ', 1),
(17, 52, 'CALDAS', 1),
(18, 52, 'CAQUETÁ', 1),
(19, 52, 'CAUCA', 1),
(20, 52, 'CESAR', 1),
(23, 52, 'CÓRDOBA', 1),
(25, 52, 'CUNDINAMARCA', 1),
(27, 52, 'CHOCÓ', 1),
(41, 52, 'HUILA', 1),
(44, 52, 'LA GUAJIRA', 1),
(47, 52, 'MAGDALENA', 1),
(50, 52, 'META', 1),
(52, 52, 'NARIÑO', 1),
(54, 52, 'NORTE DE SANTANDER', 1),
(63, 52, 'QUINDIO', 1),
(66, 52, 'RISARALDA', 1),
(68, 52, 'SANTANDER', 1),
(70, 52, 'SUCRE', 1),
(73, 52, 'TOLIMA', 1),
(81, 52, 'ARAUCA', 1),
(85, 52, 'CASANARE', 1),
(86, 52, 'PUTUMAYO', 1),
(88, 52, 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA', 1),
(91, 52, 'AMAZONAS', 1),
(94, 52, 'GUAINÍA', 1),
(95, 52, 'GUAVIARE', 1),
(97, 52, 'VAUPÉS', 1),
(99, 52, 'VICHADA', 1),
(100, 52, 'EXTRANGERO', 1),
(101, 1, 'OTRO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `corregimientoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idproducto`, `categoriaid`, `codigo`, `nombre`, `descripcion`, `imagen`, `datecreated`, `status`, `corregimientoid`) VALUES
(12, 13, '3160246192', 'Ferretería los andes', '<p style=\"text-align: justify;\"><strong>Gilberto, junto a su hermano Miguel</strong>, administraba decenas de empresas con las que lavaban dinero, entre ellas Drogas La Rebaja, Blanco Pharma y Laboratorios Kressfor.&nbsp;</p>', '', '2023-02-19 16:53:30', 1, 5),
(13, 14, '3113944484', 'Droguería Los Andes', '<p style=\"text-align: justify;\"><strong>Gilberto, junto a su hermano Miguel</strong>, administraba decenas de empresas con las que lavaban dinero, entre ellas Drogas La Rebaja, Blanco Pharma y Laboratorios Kressfor.&nbsp;</p>', '', '2023-02-20 08:55:33', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `productoid`, `img`) VALUES
(22, 2, 'sal_006064f41d80a834e6b850ba5fa306bf.jpg'),
(23, 3, 'sal_538c18b7d5e76addf0317790e7eec855.jpg'),
(25, 4, 'sal_80ff95c84f96095c65615bf9084e551e.jpg'),
(26, 5, 'sal_975f19fbed9496d323cef8f9472130b1.jpg'),
(27, 6, 'sal_324edb3ab3556b85208f04949154e5f9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idimg` int(11) NOT NULL,
  `tipo_imagen` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `enlace_url` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimg`, `tipo_imagen`, `nombre`, `descripcion`, `portada`, `enlace`, `enlace_url`, `video`, `video_url`, `dateadd`, `status`) VALUES
(3, 1, 'Slider 1', 'Slider 1', 'img_eba759bfa55748ab0239e906d0aa8f91.jpg', '', '', '', '', '2023-02-24 12:13:34', 1),
(6, 3, 'Foto', 'Foto', 'img_fc8e406b3e42d7dfe7e7bf289e9a43d5.jpg', '', 'https://candeaseo.gov.co/transparencia.php', '', '', '2023-01-25 18:04:03', 1),
(7, 3, 'Imagen de Inicio', 'Descripción', 'img_1edf108140dc54e0889015a0e7a473f5.jpg', '', 'https://candeaseo.gov.co/transparencia.php', '', '', '2023-01-25 18:06:21', 2),
(8, 2, 'Certificación ISO9001 - ISO14001', 'Lo Hacemos por ti!', 'img_11ac3f066efd28c7bddeda52509f30ab.jpg', '', 'https://www.youtube.com/watch?v=QnhftbZv1W8', '', '', '2023-01-26 12:43:44', 1),
(9, 4, 'Procuraduría General de la Nación', 'Procuraduría General de la Nación', 'img_08dbcb5c7f6ae75793e5caa1f84cdb3c.jpg', '', 'https://www.procuraduria.gov.co/Pages/Inicio.aspx', '', '', '2023-01-26 13:41:01', 1),
(10, 4, 'Contraloría General de la República', 'Contraloría General de la República', 'img_746b0b6510d6eb1c6893a184b451ed9c.jpg', '', 'https://www.contraloria.gov.co/', '', '', '2023-01-26 13:43:29', 1),
(11, 4, 'Alcaldía Municipal de Candelaria', 'Alcaldía Municipal de Candelaria', 'img_95dae656686877a727b395306a4c47e3.jpg', '', 'https://www.candelaria-valle.gov.co/Paginas/Default.aspx', '', '', '2023-01-26 13:44:37', 1),
(12, 5, 'Politica Integral', 'Imagen de Política Integral', 'img_f2502c652432cc562c3a0b3c0b4be60d.jpg', '', '', '', '', '2023-01-27 12:17:24', 1),
(13, 6, 'Gloria Ruby Pulgarín Jurado', 'Gerente', 'img_9956a5159886cd3264027c9b148188b3.jpg', '', 'https://www.funcionpublica.gov.co/web/sigep2/directorio#_com_liferay_iframe_web_portlet_IFramePortle', '', '', '2023-01-27 13:36:51', 1),
(14, 6, 'Diana Marcela Portilla Sanclemente', 'Directora de Planeación', 'img_e92be6c193e83c3200a8f189f1d83db2.jpg', '', 'https://www.funcionpublica.gov.co/web/sigep2/directorio#_com_liferay_iframe_web_portlet_IFramePortle', '', '', '2023-01-27 15:02:59', 1),
(15, 6, 'Ana Marisol Gordon Inagan', 'Directora Operativa', 'img_c39a70142830b27ed5429910348df000.jpg', '', 'https://candeaseo.gov.co/', '', '', '2023-01-27 15:44:17', 1),
(16, 5, 'Organigrama', 'Organigrama Candeaseo SA ESP', 'img_65aaacd9618d67295d215f28388e97a4.jpg', '', '', '', '', '2023-02-13 10:41:38', 1),
(17, 5, 'Mapa de Procesos', 'Mapa de proceso de CANDEASOE SA ESP', 'img_359684fee2b2a72a4a3df3ea1cdb3283.jpg', '', '', '', '', '2023-02-13 11:05:13', 1),
(18, 5, 'Funciones y Deberes', 'Funciones y Deberes', 'img_13b270224580c63402bf65f74e6740f6.jpg', '', '', '', '', '2023-02-13 11:12:44', 1),
(19, 1, 'Bienvenidos', 'A la empresa de los Candelareños', 'img_702746af27076e8cb3cbfbcf1440f6b8.jpg', 'Servicios', '', 'Direccionamiento Estratégico', 'https://www.youtube.com/watch?v=sLhw0SUy2_Q', '2023-02-14 08:34:50', 0),
(20, 4, 'Superintendencia de Servicios Públicos', 'Superintendencia de Servicios Públicos', 'img_0553569bd6be7bc6197bec3ef99d7aaf.jpg', '', 'https://www.superservicios.gov.co/', '', '', '2023-02-16 10:02:42', 1),
(23, 5, 'Respeto', 'Código de Integridad Respeto', 'img_13ba7b35cf8a5834b9257f4a988ff47d.jpg', '', '', '', '', '2023-02-22 10:23:22', 1),
(25, 1, 'Slider 2', 'Slider 2', 'img_e99360825d9b353ed68b387e5afc3563.jpg', '', '', '', '', '2023-02-24 12:14:40', 1),
(26, 1, 'Slider 3', 'Slider 3', 'img_2319cc53790a6b2a21b1006c0471cea7.jpg', '', '', '', '', '2023-02-24 18:21:30', 1),
(27, 4, 'Gobernación del Valle del Cauca', 'Gobernación del Valle del Cauca', 'img_6dfb577e9559d2d8a32283e72d2f5c69.jpg', '', 'https://www.valledelcauca.gov.co/', '', '', '2023-02-25 10:40:18', 1),
(28, 4, 'Gobierno de Colombia', 'Gobierno de Colombia', 'img_533039b4ea83d49343ecb1fce87d0e25.jpg', '', 'https://id.presidencia.gov.co/deinteres/index.html', '', '', '2023-02-25 10:41:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_dir`
--

CREATE TABLE `imagen_dir` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `imagen_dir`
--

INSERT INTO `imagen_dir` (`id`, `productoid`, `img`) VALUES
(1, 12, 'pro_8e4d249e93222d1d7e0ae3ce7664ce5f.jpg'),
(2, 13, 'emp_7d9940d04fb0c81f7845cc6e8af4c9c5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_respuesta`
--

CREATE TABLE `medio_respuesta` (
  `id` int(11) NOT NULL,
  `medio` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medio_respuesta`
--

INSERT INTO `medio_respuesta` (`id`, `medio`, `estatus`) VALUES
(1, 'Correo Electrónico ', 1),
(2, 'Teléfono', 1),
(3, 'Dirección Notificación', 1),
(4, 'Notificación a Terceros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Comunicaciones', 'Área de Comunicaciones', 1),
(5, 'Comercial', 'Área Comercial', 1),
(6, 'PQRSD', 'Gestión de Solicitudes', 1),
(7, 'Administrativo', 'Área Administrativa', 1),
(8, 'Transparencia', 'Transparencia y acceso a la información publica.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(6) NOT NULL,
  `municipio` varchar(255) NOT NULL DEFAULT '',
  `estatus` int(1) UNSIGNED NOT NULL,
  `departamento_id` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `municipio`, `estatus`, `departamento_id`) VALUES
(1, 'Candelaria', 1, 1),
(2, 'Acacías', 1, 50),
(3, 'Acandí', 1, 27),
(4, 'Acevedo', 1, 41),
(5, 'Achí', 1, 13),
(6, 'Agrado', 1, 41),
(7, 'Agua de Dios', 1, 25),
(8, 'Aguachica', 1, 20),
(9, 'Aguada', 1, 68),
(10, 'Aguadas', 1, 17),
(11, 'Aguazul', 1, 85),
(12, 'Agustín Codazzi', 1, 20),
(13, 'Aipe', 1, 41),
(14, 'Albania', 1, 18),
(15, 'Albania', 1, 44),
(16, 'Albania', 1, 68),
(17, 'Albán', 1, 25),
(18, 'Albán (San José)', 1, 52),
(19, 'Alcalá', 1, 1),
(20, 'Alejandria', 1, 5),
(21, 'Algarrobo', 1, 47),
(22, 'Algeciras', 1, 41),
(23, 'Almaguer', 1, 19),
(24, 'Almeida', 1, 15),
(25, 'Alpujarra', 1, 73),
(26, 'Altamira', 1, 41),
(27, 'Alto Baudó (Pie de Pato)', 1, 27),
(28, 'Altos del Rosario', 1, 13),
(29, 'Alvarado', 1, 73),
(30, 'Amagá', 1, 5),
(31, 'Amalfi', 1, 5),
(32, 'Ambalema', 1, 73),
(33, 'Anapoima', 1, 25),
(34, 'Ancuya', 1, 52),
(35, 'Andalucía', 1, 1),
(36, 'Andes', 1, 5),
(37, 'Angelópolis', 1, 5),
(38, 'Angostura', 1, 5),
(39, 'Anolaima', 1, 25),
(40, 'Anorí', 1, 5),
(41, 'Anserma', 1, 17),
(42, 'Ansermanuevo', 1, 1),
(43, 'Anzoátegui', 1, 73),
(44, 'Anzá', 1, 5),
(45, 'Apartadó', 1, 5),
(46, 'Apulo', 1, 25),
(47, 'Apía', 1, 66),
(48, 'Aquitania', 1, 15),
(49, 'Aracataca', 1, 47),
(50, 'Aranzazu', 1, 17),
(51, 'Aratoca', 1, 68),
(52, 'Arauca', 1, 81),
(53, 'Arauquita', 1, 81),
(54, 'Arbeláez', 1, 25),
(55, 'Arboleda (Berruecos)', 1, 52),
(56, 'Arboledas', 1, 54),
(57, 'Arboletes', 1, 5),
(58, 'Arcabuco', 1, 15),
(59, 'Arenal', 1, 13),
(60, 'Argelia', 1, 5),
(61, 'Argelia', 1, 19),
(62, 'Argelia', 1, 1),
(63, 'Ariguaní (El Difícil)', 1, 47),
(64, 'Arjona', 1, 13),
(65, 'Armenia', 1, 5),
(66, 'Armenia', 1, 63),
(67, 'Armero (Guayabal)', 1, 73),
(68, 'Arroyohondo', 1, 13),
(69, 'Astrea', 1, 20),
(70, 'Ataco', 1, 73),
(71, 'Atrato (Yuto)', 1, 27),
(72, 'Ayapel', 1, 23),
(73, 'Bagadó', 1, 27),
(74, 'Bahía Solano (Mútis)', 1, 27),
(75, 'Bajo Baudó (Pizarro)', 1, 27),
(76, 'Balboa', 1, 19),
(77, 'Balboa', 1, 66),
(78, 'Baranoa', 1, 8),
(79, 'Baraya', 1, 41),
(80, 'Barbacoas', 1, 52),
(81, 'Barbosa', 1, 5),
(82, 'Barbosa', 1, 68),
(83, 'Barichara', 1, 68),
(84, 'Barranca de Upía', 1, 50),
(85, 'Barrancabermeja', 1, 68),
(86, 'Barrancas', 1, 44),
(87, 'Barranco de Loba', 1, 13),
(88, 'Barranquilla', 1, 8),
(89, 'Becerríl', 1, 20),
(90, 'Belalcázar', 1, 17),
(91, 'Bello', 1, 5),
(92, 'Belmira', 1, 5),
(93, 'Beltrán', 1, 25),
(94, 'Belén', 1, 15),
(95, 'Belén', 1, 52),
(96, 'Belén de Bajirá', 1, 27),
(97, 'Belén de Umbría', 1, 66),
(98, 'Belén de los Andaquíes', 1, 18),
(99, 'Berbeo', 1, 15),
(100, 'Betania', 1, 5),
(101, 'Beteitiva', 1, 15),
(102, 'Betulia', 1, 5),
(103, 'Betulia', 1, 68),
(104, 'Bituima', 1, 25),
(105, 'Boavita', 1, 15),
(106, 'Bochalema', 1, 54),
(107, 'Bogotá D.C.', 1, 11),
(108, 'Bojacá', 1, 25),
(109, 'Bojayá (Bellavista)', 1, 27),
(110, 'Bolívar', 1, 5),
(111, 'Bolívar', 1, 19),
(112, 'Bolívar', 1, 68),
(113, 'Bolívar', 1, 1),
(114, 'Bosconia', 1, 20),
(115, 'Boyacá', 1, 15),
(116, 'Briceño', 1, 5),
(117, 'Briceño', 1, 15),
(118, 'Bucaramanga', 1, 68),
(119, 'Bucarasica', 1, 54),
(120, 'Buenaventura', 1, 1),
(121, 'Buenavista', 1, 15),
(122, 'Buenavista', 1, 23),
(123, 'Buenavista', 1, 63),
(124, 'Buenavista', 1, 70),
(125, 'Buenos Aires', 1, 19),
(126, 'Buesaco', 1, 52),
(127, 'Buga', 1, 1),
(128, 'Bugalagrande', 1, 1),
(129, 'Burítica', 1, 5),
(130, 'Busbanza', 1, 15),
(131, 'Cabrera', 1, 25),
(132, 'Cabrera', 1, 68),
(133, 'Cabuyaro', 1, 50),
(134, 'Cachipay', 1, 25),
(135, 'Caicedo', 1, 5),
(136, 'Caicedonia', 1, 1),
(137, 'Caimito', 1, 70),
(138, 'Cajamarca', 1, 73),
(139, 'Cajibío', 1, 19),
(140, 'Cajicá', 1, 25),
(141, 'Calamar', 1, 13),
(142, 'Calamar', 1, 95),
(143, 'Calarcá', 1, 63),
(144, 'Caldas', 1, 5),
(145, 'Caldas', 1, 15),
(146, 'Caldono', 1, 19),
(147, 'California', 1, 68),
(148, 'Calima (Darién)', 1, 1),
(149, 'Caloto', 1, 19),
(150, 'Calí', 1, 1),
(151, 'Campamento', 1, 5),
(152, 'Campo de la Cruz', 1, 8),
(153, 'Campoalegre', 1, 41),
(154, 'Campohermoso', 1, 15),
(155, 'Canalete', 1, 23),
(156, 'Candelaria', 1, 8),
(158, 'Cantagallo', 1, 13),
(159, 'Cantón de San Pablo', 1, 27),
(160, 'Caparrapí', 1, 25),
(161, 'Capitanejo', 1, 68),
(162, 'Caracolí', 1, 5),
(163, 'Caramanta', 1, 5),
(164, 'Carcasí', 1, 68),
(165, 'Carepa', 1, 5),
(166, 'Carmen de Apicalá', 1, 73),
(167, 'Carmen de Carupa', 1, 25),
(168, 'Carmen de Viboral', 1, 5),
(169, 'Carmen del Darién (CURBARADÓ)', 1, 27),
(170, 'Carolina', 1, 5),
(171, 'Cartagena', 1, 13),
(172, 'Cartagena del Chairá', 1, 18),
(173, 'Cartago', 1, 1),
(174, 'Carurú', 1, 97),
(175, 'Casabianca', 1, 73),
(176, 'Castilla la Nueva', 1, 50),
(177, 'Caucasia', 1, 5),
(178, 'Cañasgordas', 1, 5),
(179, 'Cepita', 1, 68),
(180, 'Cereté', 1, 23),
(181, 'Cerinza', 1, 15),
(182, 'Cerrito', 1, 68),
(183, 'Cerro San Antonio', 1, 47),
(184, 'Chachaguí', 1, 52),
(185, 'Chaguaní', 1, 25),
(186, 'Chalán', 1, 70),
(187, 'Chaparral', 1, 73),
(188, 'Charalá', 1, 68),
(189, 'Charta', 1, 68),
(190, 'Chigorodó', 1, 5),
(191, 'Chima', 1, 68),
(192, 'Chimichagua', 1, 20),
(193, 'Chimá', 1, 23),
(194, 'Chinavita', 1, 15),
(195, 'Chinchiná', 1, 17),
(196, 'Chinácota', 1, 54),
(197, 'Chinú', 1, 23),
(198, 'Chipaque', 1, 25),
(199, 'Chipatá', 1, 68),
(200, 'Chiquinquirá', 1, 15),
(201, 'Chiriguaná', 1, 20),
(202, 'Chiscas', 1, 15),
(203, 'Chita', 1, 15),
(204, 'Chitagá', 1, 54),
(205, 'Chitaraque', 1, 15),
(206, 'Chivatá', 1, 15),
(207, 'Chivolo', 1, 47),
(208, 'Choachí', 1, 25),
(209, 'Chocontá', 1, 25),
(210, 'Chámeza', 1, 85),
(211, 'Chía', 1, 25),
(212, 'Chíquiza', 1, 15),
(213, 'Chívor', 1, 15),
(214, 'Cicuco', 1, 13),
(215, 'Cimitarra', 1, 68),
(216, 'Circasia', 1, 63),
(217, 'Cisneros', 1, 5),
(218, 'Ciénaga', 1, 15),
(219, 'Ciénaga', 1, 47),
(220, 'Ciénaga de Oro', 1, 23),
(221, 'Clemencia', 1, 13),
(222, 'Cocorná', 1, 5),
(223, 'Coello', 1, 73),
(224, 'Cogua', 1, 25),
(225, 'Colombia', 1, 41),
(226, 'Colosó (Ricaurte)', 1, 70),
(227, 'Colón', 1, 86),
(228, 'Colón (Génova)', 1, 52),
(229, 'Concepción', 1, 5),
(230, 'Concepción', 1, 68),
(231, 'Concordia', 1, 5),
(232, 'Concordia', 1, 47),
(233, 'Condoto', 1, 27),
(234, 'Confines', 1, 68),
(235, 'Consaca', 1, 52),
(236, 'Contadero', 1, 52),
(237, 'Contratación', 1, 68),
(238, 'Convención', 1, 54),
(239, 'Copacabana', 1, 5),
(240, 'Coper', 1, 15),
(241, 'Cordobá', 1, 63),
(242, 'Corinto', 1, 19),
(243, 'Coromoro', 1, 68),
(244, 'Corozal', 1, 70),
(245, 'Corrales', 1, 15),
(246, 'Cota', 1, 25),
(247, 'Cotorra', 1, 23),
(248, 'Covarachía', 1, 15),
(249, 'Coveñas', 1, 70),
(250, 'Coyaima', 1, 73),
(251, 'Cravo Norte', 1, 81),
(252, 'Cuaspud (Carlosama)', 1, 52),
(253, 'Cubarral', 1, 50),
(254, 'Cubará', 1, 15),
(255, 'Cucaita', 1, 15),
(256, 'Cucunubá', 1, 25),
(257, 'Cucutilla', 1, 54),
(258, 'Cuitiva', 1, 15),
(259, 'Cumaral', 1, 50),
(260, 'Cumaribo', 1, 99),
(261, 'Cumbal', 1, 52),
(262, 'Cumbitara', 1, 52),
(263, 'Cunday', 1, 73),
(264, 'Curillo', 1, 18),
(265, 'Curití', 1, 68),
(266, 'Curumaní', 1, 20),
(267, 'Cáceres', 1, 5),
(268, 'Cáchira', 1, 54),
(269, 'Cácota', 1, 54),
(270, 'Cáqueza', 1, 25),
(271, 'Cértegui', 1, 27),
(272, 'Cómbita', 1, 15),
(273, 'Córdoba', 1, 13),
(274, 'Córdoba', 1, 52),
(275, 'Cúcuta', 1, 54),
(276, 'Dabeiba', 1, 5),
(277, 'Dagua', 1, 1),
(278, 'Dibulla', 1, 44),
(279, 'Distracción', 1, 44),
(280, 'Dolores', 1, 73),
(281, 'Don Matías', 1, 5),
(282, 'Dos Quebradas', 1, 66),
(283, 'Duitama', 1, 15),
(284, 'Durania', 1, 54),
(285, 'Ebéjico', 1, 5),
(286, 'El Bagre', 1, 5),
(287, 'El Banco', 1, 47),
(288, 'El Cairo', 1, 1),
(289, 'El Calvario', 1, 50),
(290, 'El Carmen', 1, 54),
(291, 'El Carmen', 1, 68),
(292, 'El Carmen de Atrato', 1, 27),
(293, 'El Carmen de Bolívar', 1, 13),
(294, 'El Castillo', 1, 50),
(295, 'El Cerrito', 1, 1),
(296, 'El Charco', 1, 52),
(297, 'El Cocuy', 1, 15),
(298, 'El Colegio', 1, 25),
(299, 'El Copey', 1, 20),
(300, 'El Doncello', 1, 18),
(301, 'El Dorado', 1, 50),
(302, 'El Dovio', 1, 1),
(303, 'El Espino', 1, 15),
(304, 'El Guacamayo', 1, 68),
(305, 'El Guamo', 1, 13),
(306, 'El Molino', 1, 44),
(307, 'El Paso', 1, 20),
(308, 'El Paujil', 1, 18),
(309, 'El Peñol', 1, 52),
(310, 'El Peñon', 1, 13),
(311, 'El Peñon', 1, 68),
(312, 'El Peñón', 1, 25),
(313, 'El Piñon', 1, 47),
(314, 'El Playón', 1, 68),
(315, 'El Retorno', 1, 95),
(316, 'El Retén', 1, 47),
(317, 'El Roble', 1, 70),
(318, 'El Rosal', 1, 25),
(319, 'El Rosario', 1, 52),
(320, 'El Tablón de Gómez', 1, 52),
(321, 'El Tambo', 1, 19),
(322, 'El Tambo', 1, 52),
(323, 'El Tarra', 1, 54),
(324, 'El Zulia', 1, 54),
(325, 'El Águila', 1, 1),
(326, 'Elías', 1, 41),
(327, 'Encino', 1, 68),
(328, 'Enciso', 1, 68),
(329, 'Entrerríos', 1, 5),
(330, 'Envigado', 1, 5),
(331, 'Espinal', 1, 73),
(332, 'Facatativá', 1, 25),
(333, 'Falan', 1, 73),
(334, 'Filadelfia', 1, 17),
(335, 'Filandia', 1, 63),
(336, 'Firavitoba', 1, 15),
(337, 'Flandes', 1, 73),
(338, 'Florencia', 1, 18),
(339, 'Florencia', 1, 19),
(340, 'Floresta', 1, 15),
(341, 'Florida', 1, 1),
(342, 'Floridablanca', 1, 68),
(343, 'Florián', 1, 68),
(344, 'Fonseca', 1, 44),
(345, 'Fortúl', 1, 81),
(346, 'Fosca', 1, 25),
(347, 'Francisco Pizarro', 1, 52),
(348, 'Fredonia', 1, 5),
(349, 'Fresno', 1, 73),
(350, 'Frontino', 1, 5),
(351, 'Fuente de Oro', 1, 50),
(352, 'Fundación', 1, 47),
(353, 'Funes', 1, 52),
(354, 'Funza', 1, 25),
(355, 'Fusagasugá', 1, 25),
(356, 'Fómeque', 1, 25),
(357, 'Fúquene', 1, 25),
(358, 'Gachalá', 1, 25),
(359, 'Gachancipá', 1, 25),
(360, 'Gachantivá', 1, 15),
(361, 'Gachetá', 1, 25),
(362, 'Galapa', 1, 8),
(363, 'Galeras (Nueva Granada)', 1, 70),
(364, 'Galán', 1, 68),
(365, 'Gama', 1, 25),
(366, 'Gamarra', 1, 20),
(367, 'Garagoa', 1, 15),
(368, 'Garzón', 1, 41),
(369, 'Gigante', 1, 41),
(370, 'Ginebra', 1, 1),
(371, 'Giraldo', 1, 5),
(372, 'Girardot', 1, 25),
(373, 'Girardota', 1, 5),
(374, 'Girón', 1, 68),
(375, 'Gonzalez', 1, 20),
(376, 'Gramalote', 1, 54),
(377, 'Granada', 1, 5),
(378, 'Granada', 1, 25),
(379, 'Granada', 1, 50),
(380, 'Guaca', 1, 68),
(381, 'Guacamayas', 1, 15),
(382, 'Guacarí', 1, 1),
(383, 'Guachavés', 1, 52),
(384, 'Guachené', 1, 19),
(385, 'Guachetá', 1, 25),
(386, 'Guachucal', 1, 52),
(387, 'Guadalupe', 1, 5),
(388, 'Guadalupe', 1, 41),
(389, 'Guadalupe', 1, 68),
(390, 'Guaduas', 1, 25),
(391, 'Guaitarilla', 1, 52),
(392, 'Gualmatán', 1, 52),
(393, 'Guamal', 1, 47),
(394, 'Guamal', 1, 50),
(395, 'Guamo', 1, 73),
(396, 'Guapota', 1, 68),
(397, 'Guapí', 1, 19),
(398, 'Guaranda', 1, 70),
(399, 'Guarne', 1, 5),
(400, 'Guasca', 1, 25),
(401, 'Guatapé', 1, 5),
(402, 'Guataquí', 1, 25),
(403, 'Guatavita', 1, 25),
(404, 'Guateque', 1, 15),
(405, 'Guavatá', 1, 68),
(406, 'Guayabal de Siquima', 1, 25),
(407, 'Guayabetal', 1, 25),
(408, 'Guayatá', 1, 15),
(409, 'Guepsa', 1, 68),
(410, 'Guicán', 1, 15),
(411, 'Gutiérrez', 1, 25),
(412, 'Guática', 1, 66),
(413, 'Gámbita', 1, 68),
(414, 'Gámeza', 1, 15),
(415, 'Génova', 1, 63),
(416, 'Gómez Plata', 1, 5),
(417, 'Hacarí', 1, 54),
(418, 'Hatillo de Loba', 1, 13),
(419, 'Hato', 1, 68),
(420, 'Hato Corozal', 1, 85),
(421, 'Hatonuevo', 1, 44),
(422, 'Heliconia', 1, 5),
(423, 'Herrán', 1, 54),
(424, 'Herveo', 1, 73),
(425, 'Hispania', 1, 5),
(426, 'Hobo', 1, 41),
(427, 'Honda', 1, 73),
(428, 'Ibagué', 1, 73),
(429, 'Icononzo', 1, 73),
(430, 'Iles', 1, 52),
(431, 'Imúes', 1, 52),
(432, 'Inzá', 1, 19),
(433, 'Inírida', 1, 94),
(434, 'Ipiales', 1, 52),
(435, 'Isnos', 1, 41),
(436, 'Istmina', 1, 27),
(437, 'Itagüí', 1, 5),
(438, 'Ituango', 1, 5),
(439, 'Izá', 1, 15),
(440, 'Jambaló', 1, 19),
(441, 'Jamundí', 1, 1),
(442, 'Jardín', 1, 5),
(443, 'Jenesano', 1, 15),
(444, 'Jericó', 1, 5),
(445, 'Jericó', 1, 15),
(446, 'Jerusalén', 1, 25),
(447, 'Jesús María', 1, 68),
(448, 'Jordán', 1, 68),
(449, 'Juan de Acosta', 1, 8),
(450, 'Junín', 1, 25),
(451, 'Juradó', 1, 27),
(452, 'La Apartada y La Frontera', 1, 23),
(453, 'La Argentina', 1, 41),
(454, 'La Belleza', 1, 68),
(455, 'La Calera', 1, 25),
(456, 'La Capilla', 1, 15),
(457, 'La Ceja', 1, 5),
(458, 'La Celia', 1, 66),
(459, 'La Cruz', 1, 52),
(460, 'La Cumbre', 1, 1),
(461, 'La Dorada', 1, 17),
(462, 'La Esperanza', 1, 54),
(463, 'La Estrella', 1, 5),
(464, 'La Florida', 1, 52),
(465, 'La Gloria', 1, 20),
(466, 'La Jagua de Ibirico', 1, 20),
(467, 'La Jagua del Pilar', 1, 44),
(468, 'La Llanada', 1, 52),
(469, 'La Macarena', 1, 50),
(470, 'La Merced', 1, 17),
(471, 'La Mesa', 1, 25),
(472, 'La Montañita', 1, 18),
(473, 'La Palma', 1, 25),
(474, 'La Paz', 1, 68),
(475, 'La Paz (Robles)', 1, 20),
(476, 'La Peña', 1, 25),
(477, 'La Pintada', 1, 5),
(478, 'La Plata', 1, 41),
(479, 'La Playa', 1, 54),
(480, 'La Primavera', 1, 99),
(481, 'La Salina', 1, 85),
(482, 'La Sierra', 1, 19),
(483, 'La Tebaida', 1, 63),
(484, 'La Tola', 1, 52),
(485, 'La Unión', 1, 5),
(486, 'La Unión', 1, 52),
(487, 'La Unión', 1, 70),
(488, 'La Unión', 1, 1),
(489, 'La Uvita', 1, 15),
(490, 'La Vega', 1, 19),
(491, 'La Vega', 1, 25),
(492, 'La Victoria', 1, 15),
(493, 'La Victoria', 1, 17),
(494, 'La Victoria', 1, 1),
(495, 'La Virginia', 1, 66),
(496, 'Labateca', 1, 54),
(497, 'Labranzagrande', 1, 15),
(498, 'Landázuri', 1, 68),
(499, 'Lebrija', 1, 68),
(500, 'Leiva', 1, 52),
(501, 'Lejanías', 1, 50),
(502, 'Lenguazaque', 1, 25),
(503, 'Leticia', 1, 91),
(504, 'Liborina', 1, 5),
(505, 'Linares', 1, 52),
(506, 'Lloró', 1, 27),
(507, 'Lorica', 1, 23),
(508, 'Los Córdobas', 1, 23),
(509, 'Los Palmitos', 1, 70),
(510, 'Los Patios', 1, 54),
(511, 'Los Santos', 1, 68),
(512, 'Lourdes', 1, 54),
(513, 'Luruaco', 1, 8),
(514, 'Lérida', 1, 73),
(515, 'Líbano', 1, 73),
(516, 'López (Micay)', 1, 19),
(517, 'Macanal', 1, 15),
(518, 'Macaravita', 1, 68),
(519, 'Maceo', 1, 5),
(520, 'Machetá', 1, 25),
(521, 'Madrid', 1, 25),
(522, 'Magangué', 1, 13),
(523, 'Magüi (Payán)', 1, 52),
(524, 'Mahates', 1, 13),
(525, 'Maicao', 1, 44),
(526, 'Majagual', 1, 70),
(527, 'Malambo', 1, 8),
(528, 'Mallama (Piedrancha)', 1, 52),
(529, 'Manatí', 1, 8),
(530, 'Manaure', 1, 44),
(531, 'Manaure Balcón del Cesar', 1, 20),
(532, 'Manizales', 1, 17),
(533, 'Manta', 1, 25),
(534, 'Manzanares', 1, 17),
(535, 'Maní', 1, 85),
(536, 'Mapiripan', 1, 50),
(537, 'Margarita', 1, 13),
(538, 'Marinilla', 1, 5),
(539, 'Maripí', 1, 15),
(540, 'Mariquita', 1, 73),
(541, 'Marmato', 1, 17),
(542, 'Marquetalia', 1, 17),
(543, 'Marsella', 1, 66),
(544, 'Marulanda', 1, 17),
(545, 'María la Baja', 1, 13),
(546, 'Matanza', 1, 68),
(547, 'Medellín', 1, 5),
(548, 'Medina', 1, 25),
(549, 'Medio Atrato', 1, 27),
(550, 'Medio Baudó', 1, 27),
(551, 'Medio San Juan (ANDAGOYA)', 1, 27),
(552, 'Melgar', 1, 73),
(553, 'Mercaderes', 1, 19),
(554, 'Mesetas', 1, 50),
(555, 'Milán', 1, 18),
(556, 'Miraflores', 1, 15),
(557, 'Miraflores', 1, 95),
(558, 'Miranda', 1, 19),
(559, 'Mistrató', 1, 66),
(560, 'Mitú', 1, 97),
(561, 'Mocoa', 1, 86),
(562, 'Mogotes', 1, 68),
(563, 'Molagavita', 1, 68),
(564, 'Momil', 1, 23),
(565, 'Mompós', 1, 13),
(566, 'Mongua', 1, 15),
(567, 'Monguí', 1, 15),
(568, 'Moniquirá', 1, 15),
(569, 'Montebello', 1, 5),
(570, 'Montecristo', 1, 13),
(571, 'Montelíbano', 1, 23),
(572, 'Montenegro', 1, 63),
(573, 'Monteria', 1, 23),
(574, 'Monterrey', 1, 85),
(575, 'Morales', 1, 13),
(576, 'Morales', 1, 19),
(577, 'Morelia', 1, 18),
(578, 'Morroa', 1, 70),
(579, 'Mosquera', 1, 25),
(580, 'Mosquera', 1, 52),
(581, 'Motavita', 1, 15),
(582, 'Moñitos', 1, 23),
(583, 'Murillo', 1, 73),
(584, 'Murindó', 1, 5),
(585, 'Mutatá', 1, 5),
(586, 'Mutiscua', 1, 54),
(587, 'Muzo', 1, 15),
(588, 'Málaga', 1, 68),
(589, 'Nariño', 1, 5),
(590, 'Nariño', 1, 25),
(591, 'Nariño', 1, 52),
(592, 'Natagaima', 1, 73),
(593, 'Nechí', 1, 5),
(594, 'Necoclí', 1, 5),
(595, 'Neira', 1, 17),
(596, 'Neiva', 1, 41),
(597, 'Nemocón', 1, 25),
(598, 'Nilo', 1, 25),
(599, 'Nimaima', 1, 25),
(600, 'Nobsa', 1, 15),
(601, 'Nocaima', 1, 25),
(602, 'Norcasia', 1, 17),
(603, 'Norosí', 1, 13),
(604, 'Novita', 1, 27),
(605, 'Nueva Granada', 1, 47),
(606, 'Nuevo Colón', 1, 15),
(607, 'Nunchía', 1, 85),
(608, 'Nuquí', 1, 27),
(609, 'Nátaga', 1, 41),
(610, 'Obando', 1, 1),
(611, 'Ocamonte', 1, 68),
(612, 'Ocaña', 1, 54),
(613, 'Oiba', 1, 68),
(614, 'Oicatá', 1, 15),
(615, 'Olaya', 1, 5),
(616, 'Olaya Herrera', 1, 52),
(617, 'Onzaga', 1, 68),
(618, 'Oporapa', 1, 41),
(619, 'Orito', 1, 86),
(620, 'Orocué', 1, 85),
(621, 'Ortega', 1, 73),
(622, 'Ospina', 1, 52),
(623, 'Otanche', 1, 15),
(624, 'Ovejas', 1, 70),
(625, 'Pachavita', 1, 15),
(626, 'Pacho', 1, 25),
(627, 'Padilla', 1, 19),
(628, 'Paicol', 1, 41),
(629, 'Pailitas', 1, 20),
(630, 'Paime', 1, 25),
(631, 'Paipa', 1, 15),
(632, 'Pajarito', 1, 15),
(633, 'Palermo', 1, 41),
(634, 'Palestina', 1, 17),
(635, 'Palestina', 1, 41),
(636, 'Palmar', 1, 68),
(637, 'Palmar de Varela', 1, 8),
(638, 'Palmas del Socorro', 1, 68),
(639, 'Palmira', 1, 1),
(640, 'Palmito', 1, 70),
(641, 'Palocabildo', 1, 73),
(642, 'Pamplona', 1, 54),
(643, 'Pamplonita', 1, 54),
(644, 'Pandi', 1, 25),
(645, 'Panqueba', 1, 15),
(646, 'Paratebueno', 1, 25),
(647, 'Pasca', 1, 25),
(648, 'Patía (El Bordo)', 1, 19),
(649, 'Pauna', 1, 15),
(650, 'Paya', 1, 15),
(651, 'Paz de Ariporo', 1, 85),
(652, 'Paz de Río', 1, 15),
(653, 'Pedraza', 1, 47),
(654, 'Pelaya', 1, 20),
(655, 'Pensilvania', 1, 17),
(656, 'Peque', 1, 5),
(657, 'Pereira', 1, 66),
(658, 'Pesca', 1, 15),
(659, 'Peñol', 1, 5),
(660, 'Piamonte', 1, 19),
(661, 'Pie de Cuesta', 1, 68),
(662, 'Piedras', 1, 73),
(663, 'Piendamó', 1, 19),
(664, 'Pijao', 1, 63),
(665, 'Pijiño', 1, 47),
(666, 'Pinchote', 1, 68),
(667, 'Pinillos', 1, 13),
(668, 'Piojo', 1, 8),
(669, 'Pisva', 1, 15),
(670, 'Pital', 1, 41),
(671, 'Pitalito', 1, 41),
(672, 'Pivijay', 1, 47),
(673, 'Planadas', 1, 73),
(674, 'Planeta Rica', 1, 23),
(675, 'Plato', 1, 47),
(676, 'Policarpa', 1, 52),
(677, 'Polonuevo', 1, 8),
(678, 'Ponedera', 1, 8),
(679, 'Popayán', 1, 19),
(680, 'Pore', 1, 85),
(681, 'Potosí', 1, 52),
(682, 'Pradera', 1, 1),
(683, 'Prado', 1, 73),
(684, 'Providencia', 1, 52),
(685, 'Providencia', 1, 88),
(686, 'Pueblo Bello', 1, 20),
(687, 'Pueblo Nuevo', 1, 23),
(688, 'Pueblo Rico', 1, 66),
(689, 'Pueblorrico', 1, 5),
(690, 'Puebloviejo', 1, 47),
(691, 'Puente Nacional', 1, 68),
(692, 'Puerres', 1, 52),
(693, 'Puerto Asís', 1, 86),
(694, 'Puerto Berrío', 1, 5),
(695, 'Puerto Boyacá', 1, 15),
(696, 'Puerto Caicedo', 1, 86),
(697, 'Puerto Carreño', 1, 99),
(698, 'Puerto Colombia', 1, 8),
(699, 'Puerto Concordia', 1, 50),
(700, 'Puerto Escondido', 1, 23),
(701, 'Puerto Gaitán', 1, 50),
(702, 'Puerto Guzmán', 1, 86),
(703, 'Puerto Leguízamo', 1, 86),
(704, 'Puerto Libertador', 1, 23),
(705, 'Puerto Lleras', 1, 50),
(706, 'Puerto López', 1, 50),
(707, 'Puerto Nare', 1, 5),
(708, 'Puerto Nariño', 1, 91),
(709, 'Puerto Parra', 1, 68),
(710, 'Puerto Rico', 1, 18),
(711, 'Puerto Rico', 1, 50),
(712, 'Puerto Rondón', 1, 81),
(713, 'Puerto Salgar', 1, 25),
(714, 'Puerto Santander', 1, 54),
(715, 'Puerto Tejada', 1, 19),
(716, 'Puerto Triunfo', 1, 5),
(717, 'Puerto Wilches', 1, 68),
(718, 'Pulí', 1, 25),
(719, 'Pupiales', 1, 52),
(720, 'Puracé (Coconuco)', 1, 19),
(721, 'Purificación', 1, 73),
(722, 'Purísima', 1, 23),
(723, 'Pácora', 1, 17),
(724, 'Páez', 1, 15),
(725, 'Páez (Belalcazar)', 1, 19),
(726, 'Páramo', 1, 68),
(727, 'Quebradanegra', 1, 25),
(728, 'Quetame', 1, 25),
(729, 'Quibdó', 1, 27),
(730, 'Quimbaya', 1, 63),
(731, 'Quinchía', 1, 66),
(732, 'Quipama', 1, 15),
(733, 'Quipile', 1, 25),
(734, 'Ragonvalia', 1, 54),
(735, 'Ramiriquí', 1, 15),
(736, 'Recetor', 1, 85),
(737, 'Regidor', 1, 13),
(738, 'Remedios', 1, 5),
(739, 'Remolino', 1, 47),
(740, 'Repelón', 1, 8),
(741, 'Restrepo', 1, 50),
(742, 'Restrepo', 1, 1),
(743, 'Retiro', 1, 5),
(744, 'Ricaurte', 1, 25),
(745, 'Ricaurte', 1, 52),
(746, 'Rio Negro', 1, 68),
(747, 'Rioblanco', 1, 73),
(748, 'Riofrío', 1, 1),
(749, 'Riohacha', 1, 44),
(750, 'Risaralda', 1, 17),
(751, 'Rivera', 1, 41),
(752, 'Roberto Payán (San José)', 1, 52),
(753, 'Roldanillo', 1, 1),
(754, 'Roncesvalles', 1, 73),
(755, 'Rondón', 1, 15),
(756, 'Rosas', 1, 19),
(757, 'Rovira', 1, 73),
(758, 'Ráquira', 1, 15),
(759, 'Río Iró', 1, 27),
(760, 'Río Quito', 1, 27),
(761, 'Río Sucio', 1, 17),
(762, 'Río Viejo', 1, 13),
(763, 'Río de oro', 1, 20),
(764, 'Ríonegro', 1, 5),
(765, 'Ríosucio', 1, 27),
(766, 'Sabana de Torres', 1, 68),
(767, 'Sabanagrande', 1, 8),
(768, 'Sabanalarga', 1, 5),
(769, 'Sabanalarga', 1, 8),
(770, 'Sabanalarga', 1, 85),
(771, 'Sabanas de San Angel (SAN ANGEL)', 1, 47),
(772, 'Sabaneta', 1, 5),
(773, 'Saboyá', 1, 15),
(774, 'Sahagún', 1, 23),
(775, 'Saladoblanco', 1, 41),
(776, 'Salamina', 1, 17),
(777, 'Salamina', 1, 47),
(778, 'Salazar', 1, 54),
(779, 'Saldaña', 1, 73),
(780, 'Salento', 1, 63),
(781, 'Salgar', 1, 5),
(782, 'Samacá', 1, 15),
(783, 'Samaniego', 1, 52),
(784, 'Samaná', 1, 17),
(785, 'Sampués', 1, 70),
(786, 'San Agustín', 1, 41),
(787, 'San Alberto', 1, 20),
(788, 'San Andrés', 1, 68),
(789, 'San Andrés Sotavento', 1, 23),
(790, 'San Andrés de Cuerquía', 1, 5),
(791, 'San Antero', 1, 23),
(792, 'San Antonio', 1, 73),
(793, 'San Antonio de Tequendama', 1, 25),
(794, 'San Benito', 1, 68),
(795, 'San Benito Abad', 1, 70),
(796, 'San Bernardo', 1, 25),
(797, 'San Bernardo', 1, 52),
(798, 'San Bernardo del Viento', 1, 23),
(799, 'San Calixto', 1, 54),
(800, 'San Carlos', 1, 5),
(801, 'San Carlos', 1, 23),
(802, 'San Carlos de Guaroa', 1, 50),
(803, 'San Cayetano', 1, 25),
(804, 'San Cayetano', 1, 54),
(805, 'San Cristobal', 1, 13),
(806, 'San Diego', 1, 20),
(807, 'San Eduardo', 1, 15),
(808, 'San Estanislao', 1, 13),
(809, 'San Fernando', 1, 13),
(810, 'San Francisco', 1, 5),
(811, 'San Francisco', 1, 25),
(812, 'San Francisco', 1, 86),
(813, 'San Gíl', 1, 68),
(814, 'San Jacinto', 1, 13),
(815, 'San Jacinto del Cauca', 1, 13),
(816, 'San Jerónimo', 1, 5),
(817, 'San Joaquín', 1, 68),
(818, 'San José', 1, 17),
(819, 'San José de Miranda', 1, 68),
(820, 'San José de Montaña', 1, 5),
(821, 'San José de Pare', 1, 15),
(822, 'San José de Uré', 1, 23),
(823, 'San José del Fragua', 1, 18),
(824, 'San José del Guaviare', 1, 95),
(825, 'San José del Palmar', 1, 27),
(826, 'San Juan de Arama', 1, 50),
(827, 'San Juan de Betulia', 1, 70),
(828, 'San Juan de Nepomuceno', 1, 13),
(829, 'San Juan de Pasto', 1, 52),
(830, 'San Juan de Río Seco', 1, 25),
(831, 'San Juan de Urabá', 1, 5),
(832, 'San Juan del Cesar', 1, 44),
(833, 'San Juanito', 1, 50),
(834, 'San Lorenzo', 1, 52),
(835, 'San Luis', 1, 73),
(836, 'San Luís', 1, 5),
(837, 'San Luís de Gaceno', 1, 15),
(838, 'San Luís de Palenque', 1, 85),
(839, 'San Marcos', 1, 70),
(840, 'San Martín', 1, 20),
(841, 'San Martín', 1, 50),
(842, 'San Martín de Loba', 1, 13),
(843, 'San Mateo', 1, 15),
(844, 'San Miguel', 1, 68),
(845, 'San Miguel', 1, 86),
(846, 'San Miguel de Sema', 1, 15),
(847, 'San Onofre', 1, 70),
(848, 'San Pablo', 1, 13),
(849, 'San Pablo', 1, 52),
(850, 'San Pablo de Borbur', 1, 15),
(851, 'San Pedro', 1, 5),
(852, 'San Pedro', 1, 70),
(853, 'San Pedro', 1, 1),
(854, 'San Pedro de Cartago', 1, 52),
(855, 'San Pedro de Urabá', 1, 5),
(856, 'San Pelayo', 1, 23),
(857, 'San Rafael', 1, 5),
(858, 'San Roque', 1, 5),
(859, 'San Sebastián', 1, 19),
(860, 'San Sebastián de Buenavista', 1, 47),
(861, 'San Vicente', 1, 5),
(862, 'San Vicente del Caguán', 1, 18),
(863, 'San Vicente del Chucurí', 1, 68),
(864, 'San Zenón', 1, 47),
(865, 'Sandoná', 1, 52),
(866, 'Santa Ana', 1, 47),
(867, 'Santa Bárbara', 1, 5),
(868, 'Santa Bárbara', 1, 68),
(869, 'Santa Bárbara (Iscuandé)', 1, 52),
(870, 'Santa Bárbara de Pinto', 1, 47),
(871, 'Santa Catalina', 1, 13),
(872, 'Santa Fé de Antioquia', 1, 5),
(873, 'Santa Genoveva de Docorodó', 1, 27),
(874, 'Santa Helena del Opón', 1, 68),
(875, 'Santa Isabel', 1, 73),
(876, 'Santa Lucía', 1, 8),
(877, 'Santa Marta', 1, 47),
(878, 'Santa María', 1, 15),
(879, 'Santa María', 1, 41),
(880, 'Santa Rosa', 1, 13),
(881, 'Santa Rosa', 1, 19),
(882, 'Santa Rosa de Cabal', 1, 66),
(883, 'Santa Rosa de Osos', 1, 5),
(884, 'Santa Rosa de Viterbo', 1, 15),
(885, 'Santa Rosa del Sur', 1, 13),
(886, 'Santa Rosalía', 1, 99),
(887, 'Santa Sofía', 1, 15),
(888, 'Santana', 1, 15),
(889, 'Santander de Quilichao', 1, 19),
(890, 'Santiago', 1, 54),
(891, 'Santiago', 1, 86),
(892, 'Santo Domingo', 1, 5),
(893, 'Santo Tomás', 1, 8),
(894, 'Santuario', 1, 5),
(895, 'Santuario', 1, 66),
(896, 'Sapuyes', 1, 52),
(897, 'Saravena', 1, 81),
(898, 'Sardinata', 1, 54),
(899, 'Sasaima', 1, 25),
(900, 'Sativanorte', 1, 15),
(901, 'Sativasur', 1, 15),
(902, 'Segovia', 1, 5),
(903, 'Sesquilé', 1, 25),
(904, 'Sevilla', 1, 1),
(905, 'Siachoque', 1, 15),
(906, 'Sibaté', 1, 25),
(907, 'Sibundoy', 1, 86),
(908, 'Silos', 1, 54),
(909, 'Silvania', 1, 25),
(910, 'Silvia', 1, 19),
(911, 'Simacota', 1, 68),
(912, 'Simijaca', 1, 25),
(913, 'Simití', 1, 13),
(914, 'Sincelejo', 1, 70),
(915, 'Sincé', 1, 70),
(916, 'Sipí', 1, 27),
(917, 'Sitionuevo', 1, 47),
(918, 'Soacha', 1, 25),
(919, 'Soatá', 1, 15),
(920, 'Socha', 1, 15),
(921, 'Socorro', 1, 68),
(922, 'Socotá', 1, 15),
(923, 'Sogamoso', 1, 15),
(924, 'Solano', 1, 18),
(925, 'Soledad', 1, 8),
(926, 'Solita', 1, 18),
(927, 'Somondoco', 1, 15),
(928, 'Sonsón', 1, 5),
(929, 'Sopetrán', 1, 5),
(930, 'Soplaviento', 1, 13),
(931, 'Sopó', 1, 25),
(932, 'Sora', 1, 15),
(933, 'Soracá', 1, 15),
(934, 'Sotaquirá', 1, 15),
(935, 'Sotara (Paispamba)', 1, 19),
(936, 'Sotomayor (Los Andes)', 1, 52),
(937, 'Suaita', 1, 68),
(938, 'Suan', 1, 8),
(939, 'Suaza', 1, 41),
(940, 'Subachoque', 1, 25),
(941, 'Sucre', 1, 19),
(942, 'Sucre', 1, 68),
(943, 'Sucre', 1, 70),
(944, 'Suesca', 1, 25),
(945, 'Supatá', 1, 25),
(946, 'Supía', 1, 17),
(947, 'Suratá', 1, 68),
(948, 'Susa', 1, 25),
(949, 'Susacón', 1, 15),
(950, 'Sutamarchán', 1, 15),
(951, 'Sutatausa', 1, 25),
(952, 'Sutatenza', 1, 15),
(953, 'Suárez', 1, 19),
(954, 'Suárez', 1, 73),
(955, 'Sácama', 1, 85),
(956, 'Sáchica', 1, 15),
(957, 'Tabio', 1, 25),
(958, 'Tadó', 1, 27),
(959, 'Talaigua Nuevo', 1, 13),
(960, 'Tamalameque', 1, 20),
(961, 'Tame', 1, 81),
(962, 'Taminango', 1, 52),
(963, 'Tangua', 1, 52),
(964, 'Taraira', 1, 97),
(965, 'Tarazá', 1, 5),
(966, 'Tarqui', 1, 41),
(967, 'Tarso', 1, 5),
(968, 'Tasco', 1, 15),
(969, 'Tauramena', 1, 85),
(970, 'Tausa', 1, 25),
(971, 'Tello', 1, 41),
(972, 'Tena', 1, 25),
(973, 'Tenerife', 1, 47),
(974, 'Tenjo', 1, 25),
(975, 'Tenza', 1, 15),
(976, 'Teorama', 1, 54),
(977, 'Teruel', 1, 41),
(978, 'Tesalia', 1, 41),
(979, 'Tibacuy', 1, 25),
(980, 'Tibaná', 1, 15),
(981, 'Tibasosa', 1, 15),
(982, 'Tibirita', 1, 25),
(983, 'Tibú', 1, 54),
(984, 'Tierralta', 1, 23),
(985, 'Timaná', 1, 41),
(986, 'Timbiquí', 1, 19),
(987, 'Timbío', 1, 19),
(988, 'Tinjacá', 1, 15),
(989, 'Tipacoque', 1, 15),
(990, 'Tiquisio (Puerto Rico)', 1, 13),
(991, 'Titiribí', 1, 5),
(992, 'Toca', 1, 15),
(993, 'Tocaima', 1, 25),
(994, 'Tocancipá', 1, 25),
(995, 'Toguí', 1, 15),
(996, 'Toledo', 1, 5),
(997, 'Toledo', 1, 54),
(998, 'Tolú', 1, 70),
(999, 'Tolú Viejo', 1, 70),
(1000, 'Tona', 1, 68),
(1001, 'Topagá', 1, 15),
(1002, 'Topaipí', 1, 25),
(1003, 'Toribío', 1, 19),
(1004, 'Toro', 1, 1),
(1005, 'Tota', 1, 15),
(1006, 'Totoró', 1, 19),
(1007, 'Trinidad', 1, 85),
(1008, 'Trujillo', 1, 1),
(1009, 'Tubará', 1, 8),
(1010, 'Tuchín', 1, 23),
(1011, 'Tulúa', 1, 1),
(1012, 'Tumaco', 1, 52),
(1013, 'Tunja', 1, 15),
(1014, 'Tunungua', 1, 15),
(1015, 'Turbaco', 1, 13),
(1016, 'Turbaná', 1, 13),
(1017, 'Turbo', 1, 5),
(1018, 'Turmequé', 1, 15),
(1019, 'Tuta', 1, 15),
(1020, 'Tutasá', 1, 15),
(1021, 'Támara', 1, 85),
(1022, 'Támesis', 1, 5),
(1023, 'Túquerres', 1, 52),
(1024, 'Ubalá', 1, 25),
(1025, 'Ubaque', 1, 25),
(1026, 'Ubaté', 1, 25),
(1027, 'Ulloa', 1, 1),
(1028, 'Une', 1, 25),
(1029, 'Unguía', 1, 27),
(1030, 'Unión Panamericana (ÁNIMAS)', 1, 27),
(1031, 'Uramita', 1, 5),
(1032, 'Uribe', 1, 50),
(1033, 'Uribia', 1, 44),
(1034, 'Urrao', 1, 5),
(1035, 'Urumita', 1, 44),
(1036, 'Usiacuri', 1, 8),
(1037, 'Valdivia', 1, 5),
(1038, 'Valencia', 1, 23),
(1039, 'Valle de San José', 1, 68),
(1040, 'Valle de San Juan', 1, 73),
(1041, 'Valle del Guamuez', 1, 86),
(1042, 'Valledupar', 1, 20),
(1043, 'Valparaiso', 1, 5),
(1044, 'Valparaiso', 1, 18),
(1045, 'Vegachí', 1, 5),
(1046, 'Venadillo', 1, 73),
(1047, 'Venecia', 1, 5),
(1048, 'Venecia (Ospina Pérez)', 1, 25),
(1049, 'Ventaquemada', 1, 15),
(1050, 'Vergara', 1, 25),
(1051, 'Versalles', 1, 1),
(1052, 'Vetas', 1, 68),
(1053, 'Viani', 1, 25),
(1054, 'Vigía del Fuerte', 1, 5),
(1055, 'Vijes', 1, 1),
(1056, 'Villa Caro', 1, 54),
(1057, 'Villa Rica', 1, 19),
(1058, 'Villa de Leiva', 1, 15),
(1059, 'Villa del Rosario', 1, 54),
(1060, 'Villagarzón', 1, 86),
(1061, 'Villagómez', 1, 25),
(1062, 'Villahermosa', 1, 73),
(1063, 'Villamaría', 1, 17),
(1064, 'Villanueva', 1, 13),
(1065, 'Villanueva', 1, 44),
(1066, 'Villanueva', 1, 68),
(1067, 'Villanueva', 1, 85),
(1068, 'Villapinzón', 1, 25),
(1069, 'Villarrica', 1, 73),
(1070, 'Villavicencio', 1, 50),
(1071, 'Villavieja', 1, 41),
(1072, 'Villeta', 1, 25),
(1073, 'Viotá', 1, 25),
(1074, 'Viracachá', 1, 15),
(1075, 'Vista Hermosa', 1, 50),
(1076, 'Viterbo', 1, 17),
(1077, 'Vélez', 1, 68),
(1078, 'Yacopí', 1, 25),
(1079, 'Yacuanquer', 1, 52),
(1080, 'Yaguará', 1, 41),
(1081, 'Yalí', 1, 5),
(1082, 'Yarumal', 1, 5),
(1083, 'Yolombó', 1, 5),
(1084, 'Yondó (Casabe)', 1, 5),
(1085, 'Yopal', 1, 85),
(1086, 'Yotoco', 1, 1),
(1087, 'Yumbo', 1, 1),
(1088, 'Zambrano', 1, 13),
(1089, 'Zapatoca', 1, 68),
(1090, 'Zapayán (PUNTA DE PIEDRAS)', 1, 47),
(1091, 'Zaragoza', 1, 5),
(1092, 'Zarzal', 1, 1),
(1093, 'Zetaquirá', 1, 15),
(1094, 'Zipacón', 1, 25),
(1095, 'Zipaquirá', 1, 25),
(1096, 'Zona Bananera (PRADO - SEVILLA)', 1, 47),
(1097, 'Ábrego', 1, 54),
(1098, 'Íquira', 1, 41),
(1099, 'Úmbita', 1, 15),
(1100, 'Útica', 1, 25),
(1101, 'Abriaquí', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `iso`, `nombre`, `status`) VALUES
(1, 'CO', 'Colombia', 1),
(2, 'AX', 'Islas Gland', 1),
(3, 'AL', 'Albania', 1),
(4, 'DE', 'Alemania', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antártida', 1),
(9, 'AG', 'Antigua y Barbuda', 1),
(10, 'AN', 'Antillas Holandesas', 1),
(11, 'SA', 'Arabia Saudí', 1),
(12, 'DZ', 'Argelia', 1),
(13, 'AR', 'Argentina', 1),
(14, 'AM', 'Armenia', 1),
(15, 'AW', 'Aruba', 1),
(16, 'AU', 'Australia', 1),
(17, 'AT', 'Austria', 1),
(18, 'AZ', 'Azerbaiyán', 1),
(19, 'BS', 'Bahamas', 1),
(20, 'BH', 'Bahréin', 1),
(21, 'BD', 'Bangladesh', 1),
(22, 'BB', 'Barbados', 1),
(23, 'BY', 'Bielorrusia', 1),
(24, 'BE', 'Bélgica', 1),
(25, 'BZ', 'Belice', 1),
(26, 'BJ', 'Benin', 1),
(27, 'BM', 'Bermudas', 1),
(28, 'BT', 'Bhután', 1),
(29, 'BO', 'Bolivia', 1),
(30, 'BA', 'Bosnia y Herzegovina', 1),
(31, 'BW', 'Botsuana', 1),
(32, 'BV', 'Isla Bouvet', 1),
(33, 'BR', 'Brasil', 1),
(34, 'BN', 'Brunéi', 1),
(35, 'BG', 'Bulgaria', 1),
(36, 'BF', 'Burkina Faso', 1),
(37, 'BI', 'Burundi', 1),
(38, 'CV', 'Cabo Verde', 1),
(39, 'KY', 'Islas Caimán', 1),
(40, 'KH', 'Camboya', 1),
(41, 'CM', 'Camerún', 1),
(42, 'CA', 'Canadá', 1),
(43, 'CF', 'República Centroafricana', 1),
(44, 'TD', 'Chad', 1),
(45, 'CZ', 'República Checa', 1),
(46, 'CL', 'Chile', 1),
(47, 'CN', 'China', 1),
(48, 'CY', 'Chipre', 1),
(49, 'CX', 'Isla de Navidad', 1),
(50, 'VA', 'Ciudad del Vaticano', 1),
(51, 'CC', 'Islas Cocos', 1),
(53, 'KM', 'Comoras', 1),
(54, 'CD', 'República Democrática del Congo', 1),
(55, 'CG', 'Congo', 1),
(56, 'CK', 'Islas Cook', 1),
(57, 'KP', 'Corea del Norte', 1),
(58, 'KR', 'Corea del Sur', 1),
(59, 'CI', 'Costa de Marfil', 1),
(60, 'CR', 'Costa Rica', 1),
(61, 'HR', 'Croacia', 1),
(62, 'CU', 'Cuba', 1),
(63, 'DK', 'Dinamarca', 1),
(64, 'DM', 'Dominica', 1),
(65, 'DO', 'República Dominicana', 1),
(66, 'EC', 'Ecuador', 1),
(67, 'EG', 'Egipto', 1),
(68, 'SV', 'El Salvador', 1),
(69, 'AE', 'Emiratos Árabes Unidos', 1),
(70, 'ER', 'Eritrea', 1),
(71, 'SK', 'Eslovaquia', 1),
(72, 'SI', 'Eslovenia', 1),
(73, 'ES', 'España', 1),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', 1),
(75, 'US', 'Estados Unidos', 1),
(76, 'EE', 'Estonia', 1),
(77, 'ET', 'Etiopía', 1),
(78, 'FO', 'Islas Feroe', 1),
(79, 'PH', 'Filipinas', 1),
(80, 'FI', 'Finlandia', 1),
(81, 'FJ', 'Fiyi', 1),
(82, 'FR', 'Francia', 1),
(83, 'GA', 'Gabón', 1),
(84, 'GM', 'Gambia', 1),
(85, 'GE', 'Georgia', 1),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', 1),
(87, 'GH', 'Ghana', 1),
(88, 'GI', 'Gibraltar', 1),
(89, 'GD', 'Granada', 1),
(90, 'GR', 'Grecia', 1),
(91, 'GL', 'Groenlandia', 1),
(92, 'GP', 'Guadalupe', 1),
(93, 'GU', 'Guam', 1),
(94, 'GT', 'Guatemala', 1),
(95, 'GF', 'Guayana Francesa', 1),
(96, 'GN', 'Guinea', 1),
(97, 'GQ', 'Guinea Ecuatorial', 1),
(98, 'GW', 'Guinea-Bissau', 1),
(99, 'GY', 'Guyana', 1),
(100, 'HT', 'Haití', 1),
(101, 'HM', 'Islas Heard y McDonald', 1),
(102, 'HN', 'Honduras', 1),
(103, 'HK', 'Hong Kong', 1),
(104, 'HU', 'Hungría', 1),
(105, 'IN', 'India', 1),
(106, 'ID', 'Indonesia', 1),
(107, 'IR', 'Irán', 1),
(108, 'IQ', 'Iraq', 1),
(109, 'IE', 'Irlanda', 1),
(110, 'IS', 'Islandia', 1),
(111, 'IL', 'Israel', 1),
(112, 'IT', 'Italia', 1),
(113, 'JM', 'Jamaica', 1),
(114, 'JP', 'Japón', 1),
(115, 'JO', 'Jordania', 1),
(116, 'KZ', 'Kazajstán', 1),
(117, 'KE', 'Kenia', 1),
(118, 'KG', 'Kirguistán', 1),
(119, 'KI', 'Kiribati', 1),
(120, 'KW', 'Kuwait', 1),
(121, 'LA', 'Laos', 1),
(122, 'LS', 'Lesotho', 1),
(123, 'LV', 'Letonia', 1),
(124, 'LB', 'Líbano', 1),
(125, 'LR', 'Liberia', 1),
(126, 'LY', 'Libia', 1),
(127, 'LI', 'Liechtenstein', 1),
(128, 'LT', 'Lituania', 1),
(129, 'LU', 'Luxemburgo', 1),
(130, 'MO', 'Macao', 1),
(131, 'MK', 'ARY Macedonia', 1),
(132, 'MG', 'Madagascar', 1),
(133, 'MY', 'Malasia', 1),
(134, 'MW', 'Malawi', 1),
(135, 'MV', 'Maldivas', 1),
(136, 'ML', 'Malí', 1),
(137, 'MT', 'Malta', 1),
(138, 'FK', 'Islas Malvinas', 1),
(139, 'MP', 'Islas Marianas del Norte', 1),
(140, 'MA', 'Marruecos', 1),
(141, 'MH', 'Islas Marshall', 1),
(142, 'MQ', 'Martinica', 1),
(143, 'MU', 'Mauricio', 1),
(144, 'MR', 'Mauritania', 1),
(145, 'YT', 'Mayotte', 1),
(146, 'MX', 'México', 1),
(147, 'FM', 'Micronesia', 1),
(148, 'MD', 'Moldavia', 1),
(149, 'MC', 'Mónaco', 1),
(150, 'MN', 'Mongolia', 1),
(151, 'MS', 'Montserrat', 1),
(152, 'MZ', 'Mozambique', 1),
(153, 'MM', 'Myanmar', 1),
(154, 'NA', 'Namibia', 1),
(155, 'NR', 'Nauru', 1),
(156, 'NP', 'Nepal', 1),
(157, 'NI', 'Nicaragua', 1),
(158, 'NE', 'Níger', 1),
(159, 'NG', 'Nigeria', 1),
(160, 'NU', 'Niue', 1),
(161, 'NF', 'Isla Norfolk', 1),
(162, 'NO', 'Noruega', 1),
(163, 'NC', 'Nueva Caledonia', 1),
(164, 'NZ', 'Nueva Zelanda', 1),
(165, 'OM', 'Omán', 1),
(166, 'NL', 'Países Bajos', 1),
(167, 'PK', 'Pakistán', 1),
(168, 'PW', 'Palau', 1),
(169, 'PS', 'Palestina', 1),
(170, 'PA', 'Panamá', 1),
(171, 'PG', 'Papúa Nueva Guinea', 1),
(172, 'PY', 'Paraguay', 1),
(173, 'PE', 'Perú', 1),
(174, 'PN', 'Islas Pitcairn', 1),
(175, 'PF', 'Polinesia Francesa', 1),
(176, 'PL', 'Polonia', 1),
(177, 'PT', 'Portugal', 1),
(178, 'PR', 'Puerto Rico', 1),
(179, 'QA', 'Qatar', 1),
(180, 'GB', 'Reino Unido', 1),
(181, 'RE', 'Reunión', 1),
(182, 'RW', 'Ruanda', 1),
(183, 'RO', 'Rumania', 1),
(184, 'RU', 'Rusia', 1),
(185, 'EH', 'Sahara Occidental', 1),
(186, 'SB', 'Islas Salomón', 1),
(187, 'WS', 'Samoa', 1),
(188, 'AS', 'Samoa Americana', 1),
(189, 'KN', 'San Cristóbal y Nevis', 1),
(190, 'SM', 'San Marino', 1),
(191, 'PM', 'San Pedro y Miquelón', 1),
(192, 'VC', 'San Vicente y las Granadinas', 1),
(193, 'SH', 'Santa Helena', 1),
(194, 'LC', 'Santa Lucía', 1),
(195, 'ST', 'Santo Tomé y Príncipe', 1),
(196, 'SN', 'Senegal', 1),
(197, 'CS', 'Serbia y Montenegro', 1),
(198, 'SC', 'Seychelles', 1),
(199, 'SL', 'Sierra Leona', 1),
(200, 'SG', 'Singapur', 1),
(201, 'SY', 'Siria', 1),
(202, 'SO', 'Somalia', 1),
(203, 'LK', 'Sri Lanka', 1),
(204, 'SZ', 'Suazilandia', 1),
(205, 'ZA', 'Sudáfrica', 1),
(206, 'SD', 'Sudán', 1),
(207, 'SE', 'Suecia', 1),
(208, 'CH', 'Suiza', 1),
(209, 'SR', 'Surinam', 1),
(210, 'SJ', 'Svalbard y Jan Mayen', 1),
(211, 'TH', 'Tailandia', 1),
(212, 'TW', 'Taiwán', 1),
(213, 'TZ', 'Tanzania', 1),
(214, 'TJ', 'Tayikistán', 1),
(215, 'IO', 'Territorio Británico del Océano Índico', 1),
(216, 'TF', 'Territorios Australes Franceses', 1),
(217, 'TL', 'Timor Oriental', 1),
(218, 'TG', 'Togo', 1),
(219, 'TK', 'Tokelau', 1),
(220, 'TO', 'Tonga', 1),
(221, 'TT', 'Trinidad y Tobago', 1),
(222, 'TN', 'Túnez', 1),
(223, 'TC', 'Islas Turcas y Caicos', 1),
(224, 'TM', 'Turkmenistán', 1),
(225, 'TR', 'Turquía', 1),
(226, 'TV', 'Tuvalu', 1),
(227, 'UA', 'Ucrania', 1),
(228, 'UG', 'Uganda', 1),
(229, 'UY', 'Uruguay', 1),
(230, 'UZ', 'Uzbekistán', 1),
(231, 'VU', 'Vanuatu', 1),
(232, 'VE', 'Venezuela', 1),
(233, 'VN', 'Vietnam', 1),
(234, 'VG', 'Islas Vírgenes Británicas', 1),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', 1),
(236, 'WF', 'Wallis y Futuna', 1),
(237, 'YE', 'Yemen', 1),
(238, 'DJ', 'Yibuti', 1),
(239, 'ZM', 'Zambia', 1),
(240, 'ZW', 'Zimbabue', 1),
(241, 'AF', 'Afganistán', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `monto` decimal(11,2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(596, 3, 1, 1, 0, 0, 0),
(597, 3, 2, 0, 0, 0, 0),
(598, 3, 3, 0, 0, 0, 0),
(599, 3, 4, 0, 0, 0, 0),
(600, 3, 5, 0, 0, 0, 0),
(601, 3, 6, 0, 0, 0, 0),
(635, 1, 1, 1, 1, 1, 1),
(636, 1, 2, 1, 1, 1, 1),
(637, 1, 3, 1, 1, 1, 1),
(638, 1, 4, 1, 1, 1, 1),
(639, 1, 5, 1, 1, 1, 1),
(640, 1, 6, 1, 1, 1, 1),
(641, 1, 7, 1, 1, 1, 1),
(642, 1, 8, 1, 1, 1, 1),
(643, 2, 1, 1, 0, 0, 0),
(644, 2, 2, 0, 0, 0, 0),
(645, 2, 3, 0, 0, 0, 0),
(646, 2, 4, 1, 1, 1, 1),
(647, 2, 5, 0, 0, 0, 0),
(648, 2, 6, 1, 0, 0, 0),
(649, 2, 7, 0, 0, 0, 0),
(650, 2, 8, 0, 0, 0, 0),
(651, 11, 1, 0, 0, 0, 0),
(652, 11, 2, 0, 0, 0, 0),
(653, 11, 3, 0, 0, 0, 0),
(654, 11, 4, 0, 0, 0, 0),
(655, 11, 5, 0, 0, 0, 0),
(656, 11, 6, 1, 1, 1, 1),
(657, 11, 7, 0, 0, 0, 0),
(658, 11, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `areaid` int(11) NOT NULL DEFAULT 1,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `areaid`, `datecreated`, `status`) VALUES
(1, '1113526503', 'José', 'Fuertes', 3113944484, 'danielfuertes24@hotmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '', '', '', '', 1, 1, '2020-08-13 00:51:44', 1),
(24, '1113536931', 'Claudia Marcela', 'Cabrera Gomez', 3165606496, 'secretaria@candeaseo.gov.co\r\n', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '', '', '', '', 2, 5, '2023-02-24 17:06:53', 1),
(25, '1113534045', 'Viviana', 'Córdoba Riascos', 3228890385, 'vivicor562@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '', '', '', '', 11, 3, '2023-02-25 08:08:48', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `idpost` bigint(20) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `titulo`, `contenido`, `portada`, `datecreate`, `ruta`, `status`) VALUES
(1, 'Inicio', '<div class=\"p-t-80\"> <h3 class=\"ltext-103 cl5\">Nuestras marcas</h3> </div> <div> <p>Trabajamos con las mejores marcas del mundo ...</p> </div> <div class=\"row\"> <div class=\"col-md-3\"><img src=\"Assets/images/m1.png\" alt=\"Marca 1\" width=\"110\" height=\"110\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m2.png\" alt=\"Marca 2\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m3.png\" alt=\"Marca 3\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m4.png\" alt=\"Marca 4\" /></div> </div>', '', '2021-07-20 02:40:15', 'inicio', 1),
(2, 'Tienda', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:27', 'tienda', 1),
(3, 'Carrito', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:52', 'carrito', 1),
(4, 'Nosotros', '<p style=\"text-align: center;\">&nbsp;</p> <table style=\"border-collapse: collapse; width: 100%; height: 374px;\" border=\"0\"> <tbody> <tr style=\"height: 176px;\"> <td style=\"width: 22.7564%; height: 176px;\"><span style=\"font-size: 18pt;\"><strong>Misi&oacute;n:</strong></span></td> <td style=\"width: 74.2522%; height: 176px;\"> <p>&nbsp;</p> <p style=\"text-align: justify;\">Conservar un ambiente limpio, sano y agradable que ayude a preservar el bienestar, mejorar la calidad de vida de la comunidad y la sostenibilidad ambiental, mediante la prestaci&oacute;n del servicio p&uacute;blico integral de aseo.</p> <p>&nbsp;</p> </td> </tr> <tr style=\"height: 198px;\"> <td style=\"width: 22.7564%; height: 198px;\"><span style=\"font-size: 18pt;\"><strong>Visi&oacute;n:</strong></span></td> <td style=\"width: 74.2522%; height: 198px;\"> <p>&nbsp;</p> <p style=\"text-align: justify;\">Ser reconocida a nivel regional como una empresa l&iacute;der en la prestaci&oacute;n del servicio p&uacute;blico integral de aseo con calidad; que garantiza altos niveles de satisfacci&oacute;n a los usuarios y partes interesadas, contribuyendo a la sostenibilidad del medio ambiente y al desarrollo socio-econ&oacute;mico de la regi&oacute;n.</p> <p>&nbsp;</p> </td> </tr> </tbody> </table> <p style=\"text-align: center;\">&nbsp;</p>', 'img_69e3d561d99a327e47ab5f4a246b49e5.jpg', '2021-08-09 03:09:44', 'nosotros', 1),
(5, 'Contacto', '<div class=\"map\"><iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d364.968379171775!2d-76.34899370134387!3d3.4147038554694666!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1648517360583!5m2!1ses-419!2sco\" width=\"100%\" height=\"600\" allowfullscreen=\"allowfullscreen\" loading=\"lazy\"></iframe></div>', 'img_3024f13dc010ffab8c22da05ac6a32b9.jpg', '2021-08-09 03:11:08', 'contacto', 1),
(6, 'Preguntas frecuentes', '<div class=\"sac_tabFaqs\"> <h3>&iquest;C&oacute;mo puedo saber cu&aacute;ndo y a qu&eacute; hora llegar&aacute; mi compra?</h3> </div> <div class=\"sac_infoFaqs_1\"> <p>Puedes hacer seguimiento de tu despacho con el n&uacute;mero de orden de despacho que encuentras en la boleta de tu compra. Ah&iacute; encontrar&aacute;s toda la informaci&oacute;n que necesitas para saber cu&aacute;ndo llegar&aacute;n tus productos.<br /><a class=\"linkgris6sub\" href=\"https://www.falabella.com/falabella-cl/myaccount/register.jsp\">Seguimiento de despacho</a>.</p> <div class=\"sac_tabFaqs\"> <h3>&iquest;Puedo cambiar la fecha o direcci&oacute;n de mi despacho?</h3> </div> <div class=\"sac_infoFaqs_2\"> <p>Por su seguridad, una vez realizada la compra no es posible realizar un cambio de direcci&oacute;n.</p> <p>&nbsp;</p> <div class=\"sac_tabFaqs\"> <h3>&iquest;Qu&eacute; pasa si mi compra no lleg&oacute; en la fecha que deber&iacute;a?</h3> </div> <div class=\"sac_infoFaqs_3\"> <p>Si el producto no ha llegado en la fecha pactada, puedes hacerle seguimiento a trav&eacute;s de www.nova.com.co/despachos, enviando un correo a contacto@nova.com.co o llamando a Servicio al Cliente 3113944484.</p> <p>&nbsp;</p> <div class=\"sac_tabFaqs\"> <h3>&iquest;Qu&eacute; pasa si mi producto no cabe en el ascensor o mi edificio no tiene ascensor?</h3> </div> <div class=\"sac_infoFaqs_4\"> <p>Para ambos casos, nosotros subiremos por las escaleras el producto hasta el 5to piso sin costo.</p> <p>&nbsp;</p> <div class=\"sac_tabFaqs\"> <h3>&iquest;Qu&eacute; hago si no llegaron todos los productos que compr&eacute;?</h3> </div> <div class=\"sac_infoFaqs_5\"> <p>Si compras m&aacute;s de un producto, existe la posibilidad de que los recibas en despachos y fechas diferentes. Revisa en la boleta o solicitud de compras las fechas correspondientes o ll&aacute;manos al Servicio al Cliente al 3113944484.</p> <p>&nbsp;</p> <div class=\"sac_tabFaqs\"> <h3>&iquest;Cu&aacute;ndo puedo ir a buscar mi producto si compro con retiro en tienda?</h3> </div> <div class=\"sac_infoFaqs_6\"> <p>Debes esperar recibir un email que confirma que ya puedes retirar tu compra. Posterior a ese email, tienes 3 d&iacute;as para ir a retirarla. Lo puedes hacer a cualquier hora mientras la tienda est&eacute; abierta. Si por alguna raz&oacute;n no pudiste retirarlo en ese plazo, deber&aacute;s llamar al Servicio al Cliente (3113944484). De acuerdo a la disponibilidad del producto en el momento, se entregar&aacute;n posibles alternativas.</p> </div> </div> </div> </div> </div> </div>', '', '2021-08-11 01:24:19', 'preguntas-frecuentes', 1),
(7, 'Términos y Condiciones', '<div id=\"contenidoTituloInfoSAC\"> <h2 class=\"grisM16b\">T&eacute;rminos y condiciones</h2> </div> <div id=\"contenidoInfoTextosSAC\"> <div id=\"paginacionSAC\"> <ul id=\"items\"> <li> <h3 class=\"sutituloInfoSAC1\">Pol&iacute;ticas de devoluci&oacute;n / garant&iacute;a</h3> <h3 class=\"sutituloInfoSAC1\">TODO CAMBIO &Oacute; DEVOLUCI&Oacute;N REQUIERE DE LA PRESENTACI&Oacute;N DE LA FACTURA ORIGINALDE COMPRA &Oacute; EL DOCUMENTO QUE ACREDITE QUE EL PRODUCTO FUE ADQUIRIDO EN FALABELLA DE COLOMBIA S.A.</h3> <h2>DERECHO DE RETRACTO</h2> <br /> <p>Recuerde que por disposici&oacute;n de la ley, las compras realizadas en medios no presenciales como nuestra p&aacute;gina www.nova.com.co y venta telef&oacute;nica est&aacute;n sujetas al Derecho de retracto. Para ejercer su derecho de retracto tenga en cuenta los siguientes requisitos:</p> <ul> <li>La reclamaci&oacute;n debe ser realizada dentro de los 5 d&iacute;as h&aacute;biles siguientes al recibo del producto.</li> <li>El producto debe estar nuevo, sin abrir, debe estar sin uso con todos sus empaques originales, piezas, accesorios, manuales completos y etiquetas adheridas al mismo.</li> <li>En el caso de productos que requieran armado, ya sea por parte del cliente o por parte de un t&eacute;cnico indicado por la marca, el derecho de retracto, solo se podr&aacute; hacer efectivo si el producto no ha sido desembalado y se mantiene en su embalaje original.</li> <li>Para ejercer este derecho ac&eacute;rquese con su factura y el producto, a cualquiera de nuestras tiendas, reciba asistencia llamando a Servicio al Cliente en Candelaria Valle 3113944484 o remitiendo un correo electr&oacute;nico a servicioalcliente@nova.com.co indicando el n&uacute;mero de la orden de compra y el n&uacute;mero de c&eacute;dula del comprador.</li> <li>Consulte m&aacute;s informaci&oacute;n acerca del derecho de retracto ingresando a:&nbsp;<a href=\"http://www.sic.gov.co/drupal/noticias/sabe-usted-que-es-el-derecho-al-retracto\">http://www.sic.gov.co/drupal/noticias/sabe-usted-que-es-el-derecho-al-retracto</a>.</li> </ul> <h2>SATISFACCI&Oacute;N GARANTIZADA DE NOVA</h2> <br /> <p>La SATISFACCI&Oacute;N GARANTIZADA es un beneficio exclusivo otorgado por NOVA a sus clientes que no reemplaza, no excluye, ni modifica la GARANT&Iacute;A DE CALIDAD DEL FABRICANTE.</p> <br /> <p>Las condiciones y t&eacute;rminos para tramitar la&nbsp;satisfacci&oacute;n garantizada&nbsp;son:</p> <br /> <ol class=\"olNumerolatino\"> <li> <p class=\"p11gris6alignJ\">Para realizar cualquier cambio y/o devoluci&oacute;n de productos adquiridos en FNOVA se debe presentar la factura o gu&iacute;a de despacho.</p> </li> <li> <p class=\"p11gris6alignJ\">El producto debe estar nuevo, sin abrir, debe estar sin uso con todos sus empaques originales, piezas, accesorios, manuales completos y etiquetas adheridas al mismo.</p> </li> <li> <p class=\"p11gris6alignJ\">No se efect&uacute;an cambios de licores, prendas de vestir con alg&uacute;n tipo de arreglo, ropa interior, relojes, motos, colchones, ni celulares.</p> </li> <li> <p class=\"p11gris6alignJ\">No se hace devoluci&oacute;n de dinero.</p> </li> <li> <p class=\"p11gris6alignJ\">En el caso de productos que requieran armado, ya sea por parte del cliente o por parte de un t&eacute;cnico indicado por la marca, la satisfacci&oacute;n garantizada de 10 d&iacute;as no ser&aacute; efectiva si el producto ya fue armado, solo se podr&aacute; hacer efectiva si el producto no ha sido desembalado y se mantiene en su embalaje original. En caso de presentarse una falla durante el tiempo de Satisfacci&oacute;n Garantizada y se requiera el retiro del producto del domicilio del cliente, para su evaluaci&oacute;n y/o reparaci&oacute;n, su costo ser&aacute; asumido por el cliente en el caso de que la falla sea ajena a la responsabilidad de Falabella.</p> </li> <li> <p class=\"p11gris6alignJ\">Cuando un producto es devuelto por mal funcionamiento, se realizara una evaluaci&oacute;n por parte del Servicio t&eacute;cnico autorizado que indique Falabella, el cual confirmar&aacute; las causas de la falla del producto. Si no es atribuible a un mal uso del mismo se podr&aacute; hacer el cambio o devoluci&oacute;n dentro del t&eacute;rmino para hacer efectiva la satisfacci&oacute;n garantizada. El producto debe presentarlo con sus empaques originales, manuales y accesorios completos.</p> </li> </ol> <br /> <h2>SATISFACCI&Oacute;N GARANTIZADA DE NOVA.</h2> <br /> <ol class=\"olNumerolatino\"> <li> <p class=\"p11gris6alignJ\">Los requisitos para hacerla efectiva ser&aacute;n los establecidos por el fabricante o importador en el cuerpo del bien, sticker adherido, manual de instrucci&oacute;n, empaque o similar.</p> </li> <li> <p class=\"p11gris6alignJ\">Una vez expire el t&eacute;rmino de la garant&iacute;a legal el cliente deber&aacute; asumir el pago de cualquier revisi&oacute;n, diagnostico, reparaci&oacute;n y/o repuesto que requiera el bien.</p> </li> <li> <p class=\"p11gris6alignJ\">Se proceder&aacute; al cambio de un producto o la devoluci&oacute;n de lo pagado por este, a elecci&oacute;n del consumidor, siempre que en vigencia de la garant&iacute;a el bien presente reincidencia en la misma falla o no se encuentre con el repuesto requerido para el correcto funcionamiento del articulo.</p> </li> <li> <p class=\"p11gris6alignJ\">En caso de devoluci&oacute;n de dinero ser&aacute; entregado el valor pagado en el momento de la compra.</p> </li> <li> <p class=\"p11gris6alignJ\">Para art&iacute;culos de vestuario; calzado, accesorios, lencer&iacute;a, hogar, art&iacute;culos de decoraci&oacute;n, alfombras y maletas la garant&iacute;a legal ser&aacute; la indicada por el fabricante o importador en el cuerpo del bien, sticker adherido, manual de instrucci&oacute;n, empaque o similar y en ausencia de los anteriores ser&aacute; de 3 meses.</p> </li> <li> <p class=\"p11gris6alignJ\">Si el producto estuviera en un lugar diferente al de la compra, el cliente deber&aacute; asumir los costos de transporte para hacer efectiva la garant&iacute;a.</p> </li> <li> <p class=\"p11gris6alignJ\">Los fabricantes y/o proveedores cuentan con talleres especializados.</p> </li> <li> <p class=\"p11gris6alignJ\">Celulares con plan son vendidos por los operadores autorizados y por tanto los reclamos deben presentarse en los centros de atenci&oacute;n de dichos operadores.</p> </li> <li> <h2>MEDIO DE PAGO EN EFECTIVO EN SUCURSAL</h2> </li> <li> <p class=\"p11gris6alignJ\">EL CLIENTE al consentir en cualquiera de los contratos que se perfeccionan al realizar transacciones en nova.com.co, declara bajo la gravedad de juramento, que sus ingresos provienen de actividades l&iacute;citas, que no se encuentra con registro negativo en listados de prevenci&oacute;n de lavado de activos nacionales o internacionales, que no se encuentra dentro de una de las dos categor&iacute;as de lavado de activos (conversi&oacute;n o movimiento) y que en consecuencia, se obliga a responder frente a NOVA por todos los perjuicios que se llegaren a causar como consecuencia de esta afirmaci&oacute;n. En igual sentido responder&aacute; ante terceros. Declara igualmente, que sus conductas se ajustan a la ley y a la &eacute;tica y, en consecuencia se obliga a implementar las medidas tendientes a evitar que sus operaciones puedan ser utilizadas con o sin su consentimiento y conocimiento como instrumentos para el ocultamiento, manejo, inversi&oacute;n o aprovechamiento en cualquier forma de dinero u otros bienes provenientes de actividades delictivas, o para dar apariencia de legalidad a &eacute;stas actividades. En el mismo sentido, se compromete a actuar dentro del marco legal vigente en Colombia, dando cumplimiento a todos los procedimientos, tr&aacute;mites y obligaciones contemplados en la Ley y dem&aacute;s normas pertinentes y que cualquier evidencia de que estos principios no se cumplen o puedan estar en entredicho ser&aacute; causal suficiente para resolver, a criterio de la Parte cumplida, el Contrato que resulte de su aceptaci&oacute;n.</p> </li> <li> <p class=\"p11gris6alignJ\">Para devoluciones del medio de pago en efectivo en sucursal le informamos que para la opci&oacute;n de pago en efectivo en sucursal Efecty en caso de que usted solicite la devoluci&oacute;n del dinero pagado por el producto, usted deber&aacute; acercarse a la sucursal Efecty indicada a nuestros agentes de Servicio al Cliente al momento de solicitar la devoluci&oacute;n del dinero, el reclamo de su dinero deber&aacute; realizarse dentro de los 15 d&iacute;as calendario siguientes a que se le haya aprobado el reembolso del dinero presentando cedula original, adem&aacute;s, recuerde que el personal de Efecty pedir&aacute; su huella para efectos de registro. En caso de no retirar su dinero en este lapso de tiempo usted deber&aacute; asumir un gasto de administraci&oacute;n del dinero a favor de Efecty correspondiente al 2% del valor de su transacci&oacute;n.</p> </li> </ol> </li> </ul> </div> </div>', '', '2021-08-11 01:51:06', 'terminos-y-condiciones', 1),
(8, 'Sucursales', '<section class=\"py-5 text-center\"> <div class=\"container\"> <p>Visitanos y obten los mejores precios del mercado, cualquier art&iacute;culo que necestas para vivir mejor</p> <a class=\"btn btn-info\" href=\"../../tienda_virtual/tienda\">VER PRODUCTOS</a></div> </section> <div class=\"py-5 bg-light\"> <div class=\"container\"> <div class=\"row\"> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s1.jpg\" alt=\"Tienda Uno\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s2.jpg\" alt=\"Sucural dos\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s3.jpg\" alt=\"Sucural tres\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> </div> </div> </div>', 'img_d72cb5712933863e051dc9c7fac5e253.jpg', '2021-08-11 02:26:45', 'sucursales', 1),
(9, 'Not Found', '<h1>Error 404: P&aacute;gina no encontrada</h1> <p>No se encuentra la p&aacute;gina que ha solicitado.</p>', '', '2021-08-12 02:30:49', 'not-found', 1),
(10, 'Equipo', '<p>Prueba</p>', 'img_1bac6e8c54b41cf504d7e57d348dfd71.jpg', '2023-01-27 13:28:27', 'equipo', 1),
(11, 'Integridad', '<p style=\"text-align: center;\"><strong>Pol&iacute;tica de Integridad</strong></p> <p style=\"text-align: justify;\">En CANDEASEO S.A. E.S.P. trabajamos comprometidos por la prestaci&oacute;n eficaz, eficiente y oportuna del servicio p&uacute;blico integral de aseo, garantizando la satisfacci&oacute;n de nuestros clientes y partes interesadas, contribuyendo a la preservaci&oacute;n y sostenibilidad del medio ambiente, la protecci&oacute;n de la seguridad y salud de nuestro personal, dando cumplimiento a la normatividad legal con transparencia, contando con infraestructura adecuada y talento humano competente y comprometido al mejoramiento continuo de nuestro sistema de gesti&oacute;n.</p> <p style=\"text-align: justify;\">&nbsp;</p> <p style=\"text-align: justify;\"><img src=\"Assets/images/uploads/img_47284540532614678508a035b5b305bf.jpg\" alt=\"\" width=\"937\" height=\"625\" /></p> <p style=\"text-align: justify;\">&nbsp;</p> <p style=\"text-align: justify;\"><img src=\"Assets/images/uploads/img_a4faf38440a3c17be1c968c39457311f.jpg\" alt=\"\" width=\"455\" height=\"589\" />&nbsp; &nbsp;<img src=\"Assets/images/uploads/img_457fd297db7c3ccad4bd22640c9797c4.jpg\" alt=\"\" width=\"455\" height=\"588\" /></p>', 'img_0206778828bd2399b673e86c41bd1efd.jpg', '2023-01-28 09:10:48', 'integridad', 1),
(12, 'Historia', '<p>Historia de Candeaseo</p>', 'img_82d17de2099c464f1da6069f3c3a13c5.jpg', '2023-01-28 09:18:55', 'historia', 1),
(13, 'Area', '<p style=\"text-align: center;\"><strong>&Aacute;rea de Servicio</strong></p> <p>Es definida como la zona n&uacute;mero cuatro de la ciudad, en el &aacute;rea urbana, Ciudad Limpia opera en las comunas 1, 3, 9, 19 y 20. Se trata de una zona cuya limpieza tiene un alto impacto para TODOS LOS CALE&Ntilde;OS y visitantes, por la gran concentraci&oacute;n de poblaci&oacute;n flotante, pues en ella est&aacute;n ubicados los cerros tutelares, sectores hist&oacute;ricos y tur&iacute;sticos de la ciudad, sitios de afluencia masiva como parques emblem&aacute;ticos y centros comerciales, los m&aacute;s importantes escenarios deportivos y culturales, adem&aacute;s de instituciones de salud y educaci&oacute;n superior de primer orden.</p>', 'img_5044af2cc72ae3ff960e712cf683ded2.jpg', '2023-01-28 09:24:36', 'area-de-servicio', 0),
(14, 'Area', '<p style=\"text-align: center;\"><strong>&Aacute;rea de Servicio</strong></p> <p>Es definida como la zona n&uacute;mero cuatro de la ciudad, en el &aacute;rea urbana, Ciudad Limpia opera en las comunas 1, 3, 9, 19 y 20. Se trata de una zona cuya limpieza tiene un alto impacto para TODOS LOS CALE&Ntilde;OS y visitantes, por la gran concentraci&oacute;n de poblaci&oacute;n flotante, pues en ella est&aacute;n ubicados los cerros tutelares, sectores hist&oacute;ricos y tur&iacute;sticos de la ciudad, sitios de afluencia masiva como parques emblem&aacute;ticos y centros comerciales, los m&aacute;s importantes escenarios deportivos y culturales, adem&aacute;s de instituciones de salud y educaci&oacute;n superior de primer orden.</p>', 'img_49c17bb776b01de07c33cc5641340cb4.jpg', '2023-01-28 09:29:47', 'area', 1),
(15, 'Valores', '<div class=\"elementor-element elementor-element-d1f46bf titulos elementor-widget elementor-widget-heading\" data-id=\"d1f46bf\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\"><strong>Respeto</strong></p> </div> </div> <div class=\"elementor-element elementor-element-8753bce elementor-widget elementor-widget-heading\" data-id=\"8753bce\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\">El respeto es el reconocimiento a la libertad que tienen todas las personas para actuar y vivir en sociedad, siempre y cuando con sus acciones no afecten los derechos de los dem&aacute;s.</p> </div> </div> <div class=\"elementor-element elementor-element-784a585 elementor-widget elementor-widget-spacer\" data-id=\"784a585\" data-element_type=\"widget\" data-widget_type=\"spacer.default\"> <div class=\"elementor-widget-container\"> <div class=\"elementor-spacer\"> <div class=\"elementor-spacer-inner\">&nbsp;</div> </div> </div> </div> <div class=\"elementor-element elementor-element-faf7460 titulos elementor-widget elementor-widget-heading\" data-id=\"faf7460\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\"><strong>Honestidad</strong></p> </div> </div> <div class=\"elementor-element elementor-element-33a7836 elementor-widget elementor-widget-heading\" data-id=\"33a7836\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\">La Honestidad es el cumplimiento de los objetivos empresariales y de sus responsabilidades familiares encomendados a cada uno, con base en principios morales.</p> </div> </div> <div class=\"elementor-element elementor-element-0d50638 elementor-widget elementor-widget-spacer\" data-id=\"0d50638\" data-element_type=\"widget\" data-widget_type=\"spacer.default\"> <div class=\"elementor-widget-container\"> <div class=\"elementor-spacer\"> <div class=\"elementor-spacer-inner\">&nbsp;</div> </div> </div> </div> <div class=\"elementor-element elementor-element-947d495 titulos elementor-widget elementor-widget-heading\" data-id=\"947d495\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\"><strong>Responsabilidad</strong></p> </div> </div> <div class=\"elementor-element elementor-element-ad5ce06 elementor-widget elementor-widget-heading\" data-id=\"ad5ce06\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\">La responsabilidad es el compromiso que tienen las personas y los equipos de trabajo de desempe&ntilde;ar bien los cargos que les delegan, responder a la confianza que los dem&aacute;s depositan en ellos y cumplir a cabalidad con los deberes y obligaciones tanto en la Empresa como en la familia.</p> </div> </div> <div class=\"elementor-element elementor-element-5309b8d elementor-widget elementor-widget-spacer\" data-id=\"5309b8d\" data-element_type=\"widget\" data-widget_type=\"spacer.default\"> <div class=\"elementor-widget-container\"> <div class=\"elementor-spacer\"> <div class=\"elementor-spacer-inner\">&nbsp;</div> </div> </div> </div> <div class=\"elementor-element elementor-element-440e7b7 titulos elementor-widget elementor-widget-heading\" data-id=\"440e7b7\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\">Actitud de Servicio</p> </div> </div> <div class=\"elementor-element elementor-element-2b575a7 elementor-widget elementor-widget-heading\" data-id=\"2b575a7\" data-element_type=\"widget\" data-widget_type=\"heading.default\"> <div class=\"elementor-widget-container\"> <p class=\"elementor-heading-title elementor-size-default\">Es la actitud personal que les permite a los funcionarios de CIUDAD LIMPIA, atender a los usuarios con m&aacute;xima calidad, facilit&aacute;ndoles la satisfacci&oacute;n de sus necesidades m&aacute;s all&aacute; de la simple y habitual prestaci&oacute;n del servicio.</p> </div> </div>', 'img_700a7e6eb639fdbd439f199e5fe18af6.jpg', '2023-01-28 09:40:18', 'valores', 1),
(16, 'Barrido', '<p>Barrido</p>', 'img_75df23f4e7b0ff9f5ade1b672db3a863.jpg', '2023-01-28 09:47:16', 'barrido', 1),
(17, 'Recoleccion', '<p>Recolecci&oacute;n</p>', 'img_a9653a807d3c93a9a29029253821b315.jpg', '2023-01-28 09:50:14', 'recoleccion', 1),
(18, 'Corte', '<p>Corte de C&eacute;sped</p>', 'img_6a0d76d7f562b498c325355068ce81bc.jpg', '2023-01-28 09:50:34', 'corte', 1),
(19, 'Especiales', '<p>Servicios Especiales</p>', 'img_06d01885a947df7f9edeb95800ada8c9.jpg', '2023-01-28 09:50:59', 'especiales', 1),
(20, 'Poda', '<p>Podea de &Aacute;rboles</p>', 'img_ec5082faaa2a3afe1d77c9306dbc3cec.jpg', '2023-01-28 09:51:19', 'poda', 1),
(21, 'Lavado', '<p>Lavado de &aacute;reas p&uacute;blicas</p>', 'img_7ee06e5d9db98e0dfd5bd50bcd37e0e1.jpg', '2023-01-28 09:51:45', 'lavado', 1),
(22, 'Frecuencia', '<p>&nbsp;</p> <p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"Assets/images/uploads/img_68840e2620c07b016929b75b8e587d2d.jpg\" alt=\"\" width=\"800\" height=\"800\" /></p> <p>&nbsp;</p> <p style=\"text-align: center;\"><img src=\"Assets/images/uploads/img_3fd2596ebf1278966f4147f5a66d5fa5.jpg\" alt=\"\" width=\"800\" height=\"799\" /></p> <p style=\"text-align: center;\">&nbsp;</p> <p style=\"text-align: center;\"><img src=\"Assets/images/uploads/img_ef1514e9df6f0ee2ad932dbf469b23bc.jpg\" alt=\"\" width=\"800\" height=\"1036\" /></p>', 'img_a67f460dd33a144e38a96a4f2beddd73.jpg', '2023-01-28 10:03:30', 'frecuencia', 1),
(23, 'Tarifas', '<p>Prueba</p>', 'img_e6cdd5cebc97fffcd4e7c5222453c1bd.jpg', '2023-01-28 10:11:07', 'tareas', 0),
(24, 'Tarifas', '<p>Prueba</p>', 'img_a51138e0d57f743218d9bb9b9373c7ea.jpg', '2023-01-28 10:13:33', 'tarifas', 1),
(25, 'Ciudadano', '<p>Prueba</p>', 'img_306045193a8e02e664e6752671b443a4.jpg', '2023-02-08 18:09:29', 'ciudadanos', 0),
(26, 'Ciudadano', '<h2 style=\"text-align: center;\"><span style=\"color: #000000;\"><a style=\"color: #000000;\" href=\"../../ciudadanos\">Formulario para la radicaci&oacute;n de Peticiones, Quejas, Reclamos, Sugerencias y Denuncias</a></span></h2> <p>&nbsp;</p> <p>&nbsp;</p>', 'img_6f5d9bb93336afb1b4a84f5a59dbe816.jpg', '2023-02-08 18:11:47', 'ciudadano', 1),
(27, 'Identificado', '<p>prueba</p>', 'img_ac951bf332aaee7fc153d0065c1a3347.jpg', '2023-02-09 07:36:22', 'identificado', 1),
(28, 'Privacidad', '<h1>PROTECCI&Oacute;N DE DATOS PERSONALES</h1> <div class=\"container\"> <p>En esta p&aacute;gina encontrar&aacute; los mecanismos con los que CANDEASEO S.A. E.S.P. cumple con la ley 1581 de 2012 &laquo;Habeas Data&raquo; para la protecci&oacute;n de los datos personales que se encuentran almacenados en sus bases de datos y c&oacute;mo pueden ejercer sus derechos los titulares de la informaci&oacute;n.</p> <h3>Condiciones generales para el uso de la informaci&oacute;n.</h3> <p>El uso de la informaci&oacute;n contenida en este portal implica que cada usuario acepta las siguientes condiciones de uso:</p> <h3>Generalidades:</h3> <p>Candeaseo S.A. E.S.P. ha publicado este portal con el objetivo de facilitar a los usuarios, el acceso a la informaci&oacute;n respectiva a la gesti&oacute;n adelantada en los proyectos y actividades. Los datos que aqu&iacute; se suministran provienen de m&uacute;ltiples fuentes, los cuales est&aacute;n protegidos por la Ley. Candeaseo S.A. E.S.P. pone este material a disposici&oacute;n de los usuarios en forma individual, como licencia de usuario final, queda por lo tanto prohibida toda comercializaci&oacute;n o usufructo de este derecho de acceso.</p> <p>Se autoriza el uso de la informaci&oacute;n contenida en este portal, siempre y cuando se realice la cita textual. Queda en cambio prohibida la copia o reproducci&oacute;n de los datos en cualquier medio electr&oacute;nico (redes, bases de datos, CD ROM, diskettes) que permita la disponibilidad de esta informaci&oacute;n a m&uacute;ltiples usuarios sin el previo visto bueno de Candeaseo S.A. E.S.P. por medio escrito.</p> <h3>Calidad de la informaci&oacute;n:</h3> <p>Los datos y la informaci&oacute;n que aparecen en este portal se han introducido, siguiendo estrictos procedimientos de control de calidad. No obstante, Candeaseo S.A. E.S.P. no se responsabiliza por el uso e interpretaci&oacute;n realizada por terceros.</p> <h3>Contenido:</h3> <p>El material contenido en este portal consiste b&aacute;sicamente en informaci&oacute;n referente a la gesti&oacute;n adelantada por Candeaseo S.A. E.S.P., por tal motivo, no aborda circunstancias ni personas espec&iacute;ficas.</p> <h3>Enlaces:</h3> <p>El portal contiene enlaces a p&aacute;ginas externas sobre las cuales Candeaseo S.A. E.S.P. no ejerce control, por ende, no asume responsabilidad alguna sobre ellas. En este sentido, el contenido de tales enlaces ser&aacute; &uacute;nicamente responsabilidad de las entidades respectivas.</p> <h3>Soporte t&eacute;cnico:</h3> <p>Cualquier duda, inquietud o comentario sobre el contenido de este portal debe diligenciar el formulario de&nbsp;<a href=\"https://candeaseo.gov.co/ciudadanos\">PQRSD</a>.</p> <p>Esta licencia de uso se rige por la legislaci&oacute;n colombiana, independientemente del entorno jur&iacute;dico del usuario. Cualquier disputa que llegue a surgir en la interpretaci&oacute;n de estos t&eacute;rminos se resolver&aacute; bajo el amparo de la jurisprudencia colombiana.</p> </div>', 'img_a00f2156f20ea920f9a7339a26365e82.jpg', '2023-02-09 09:48:30', 'privacidad', 1),
(29, 'Reserva', '<p>Prueba</p>', 'img_db0f36a1a2f91593456b5430075a6555.jpg', '2023-02-09 13:21:05', 'reserva', 1),
(30, 'Estado', '<p>Estado</p>', 'img_4c127f7190c754d46e875b80e1eac3f3.jpg', '2023-02-09 13:59:29', 'estado', 1),
(31, 'Terceros', '<p>terceros</p>', 'img_a65356e1c9c1d2b18713c48df2d3caf2.jpg', '2023-02-10 06:54:07', 'terceros', 1),
(32, 'Sala', '<p>Sala</p>', 'img_3ade92dc60abec9895987fbb1aa65579.jpg', '2023-02-10 08:14:44', 'sala', 1),
(33, 'Proveedores', '<p>Proveedores</p>', 'img_5eb19da3340c7095c337b999294d0917.jpg', '2023-02-10 14:49:12', 'proveedores', 1),
(34, 'Participa', '<h1 style=\"text-align: center;\"><strong>Participaci&oacute;n en L&iacute;nea</strong></h1> <p>​</p> <p>Participaci&oacute;n ​en l&iacute;nea comprende una serie de actividades para involucrar a los ciudadanos en el proceso de toma de decisiones de la entidad. Con estas actividades, se propicia la participaci&oacute;n activa y colectiva de toma de decisiones de un Estado integrado en l&iacute;nea.</p> <p>Igualmente, se promueve que las entidades p&uacute;blicas incentiven a la ciudadan&iacute;a para que contribuyan en la construcci&oacute;n y seguimiento de pol&iacute;ticas, planes, programas, proyectos, control social y soluci&oacute;n de problemas que involucran a la sociedad en un di&aacute;logo abierto de doble v&iacute;a.</p> <p><strong>&nbsp;</strong></p> <h2 style=\"text-align: center;\"><strong>&iquest;Cu&aacute;les son las secciones que lo integran?</strong></h2> <p>&nbsp;</p> <ol> <li><a href=\"participa/pagina/plan-de-participacion-ciudadana\" target=\"_blank\" rel=\"noopener\">Participaci&oacute;n para el diagn&oacute;stico de necesidades e identificaci&oacute;n de problemas.​</a></li> <li>Planeaci&oacute;n y/o presupuesto participativo.​</li> <li>Contenidos sobre consulta ciudadana.​</li> <li>Colaboraci&oacute;n e Innovaci&oacute;n abierta con la participaci&oacute;n Ciudadana.​</li> <li>Rendici&oacute;n de Cuentas.​</li> <li>Control Social.</li> </ol> <p><strong>&nbsp;</strong></p> <h2 style=\"text-align: center;\"><strong>&iquest;C&oacute;mo se puede participar? ​</strong></h2> <p>La empresa de servicios p&uacute;blicos de aseo de los Candelare&ntilde;os CANDEASEO SA ESP cuenta con los siguientes medios de participaci&oacute;n:</p> <ul> <li><strong>Presencial:</strong></li> </ul> <p>Punto de Atenci&oacute;n al Ciudadano: Calle 9 No 7 - 69 Candelaria - Valle del Cauca, Colombia Lunes a viernes de 8:30 a.m. a 4:30 p.m.</p> <p>C&oacute;digo Postal 763570</p> <p>&nbsp;</p> <ul> <li><strong>Telef&oacute;nico:</strong></li> </ul> <p>L&iacute;nea Anticorrupci&oacute;n: :(+57) 018000919748</p> <p>Conmutador: (+57) 602 264 6827</p> <p>L&iacute;nea de servicio a la ciudadan&iacute;a: : (+57) 2 264 6827</p> <p>&nbsp;</p> <ul> <li><strong>Virtual:</strong></li> </ul> <p>Sitio Web: www.candelaria-valle.gov.co</p> <p>Peticiones, quejas, reclamos y denuncias (PQRSD)</p> <p>&nbsp;</p> <ul> <li><strong>Redes sociales:</strong></li> </ul> <p>Youtube: @alcaldiacandelariavalle351</p> <p>Instagram: @alcaldiacandelariavalle</p> <p>Facebook: Alcaldia de Candelaria Valle ​</p> <p>Twitter: @candelariavall3</p> <ul> <li><strong>Correo Electr&oacute;nico:</strong></li> </ul> <p>Correo Institucional: contactenos@candelaria-valle.gov.co</p> <p>Notificaciones judiciales: buzon_notificaciones_judiciales@candelaria-valle.gov.co​​</p> <p>&nbsp;</p> <h2 style=\"text-align: center;\"><strong>Mecanismos de participaci&oacute;n Ciudadana</strong></h2> <p>&nbsp;</p> <ul> <li><strong>Audiencias p&uacute;blicas:</strong> foros abiertos realizados de cara a la ciudadan&iacute;a, en los que se informa y se responden preguntas sobre el funcionamiento de la entidad.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Audiencia p&uacute;blica de rendici&oacute;n de cuentas:</strong> espacios para la rendici&oacute;n de cuentas, de encuentro y reflexi&oacute;n final sobre los resultados de la gesti&oacute;n de un periodo.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Rendici&oacute;n de cuentas:</strong> deber que tienen las autoridades de la administraci&oacute;n p&uacute;blica de responder p&uacute;blicamente, ante las exigencias que haga la ciudadan&iacute;a, por el manejo de los recursos, las decisiones y la gesti&oacute;n realizada en el ejercicio del poder que les ha sido delegado.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Veedur&iacute;a ciudadana:</strong> mecanismo democr&aacute;tico de representaci&oacute;n que le permite a los ciudadanos o a las diferentes organizaciones comunitarias, ejercer vigilancia sobre la gesti&oacute;n p&uacute;blica.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Acci&oacute;n de cumplimiento:</strong> mecanismo de protecci&oacute;n de derechos; esta acci&oacute;n protege el principio de legalidad y eficacia del ordenamiento jur&iacute;dico.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Acci&oacute;n de tutela:</strong> mecanismo mediante el cual toda persona puede reclamar ante los jueces la protecci&oacute;n inmediata de sus derechos constitucionales fundamentales, cuando estos resultan vulnerados o amenazados por la acci&oacute;n o la omisi&oacute;n de cualquier autoridad p&uacute;blica o de los particulares en los casos establecidos en la ley.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Consultas:</strong> petici&oacute;n que se presenta a las autoridades para manifestar su parecer sobre materias relacionadas con sus atribuciones y competencias. El plazo m&aacute;ximo para responderlas es de 30 d&iacute;as.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Denuncia:</strong> documento en que se da noticia a la autoridad competente de la comisi&oacute;n de un delito o de una falta.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Petici&oacute;n o derechos de petici&oacute;n:</strong> derecho que tiene toda persona para solicitar o reclamar ante las autoridades competentes por razones de inter&eacute;s general o inter&eacute;s particular para elevar solicitudes respetuosas de informaci&oacute;n y/o consulta y para obtener pronta resoluci&oacute;n de las mismas.</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Queja:</strong> cualquier expresi&oacute;n verbal, escrita o en medio digital de insatisfacci&oacute;n con la conducta o la acci&oacute;n de los servidores p&uacute;blicos o de los particulares que llevan a cabo una funci&oacute;n estatal y que requiere una respuesta. (Las quejas deben ser resueltas, atendidas o contestadas dentro de los quince (15) d&iacute;as siguientes a la fecha de su presentaci&oacute;n).</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Reclamo: </strong>cualquier expresi&oacute;n verbal, escrita o en medio digital, de insatisfacci&oacute;n referida a la prestaci&oacute;n de un servicio o la deficiente atenci&oacute;n de una autoridad p&uacute;blica, es decir, es una declaraci&oacute;n formal por el incumplimiento de un derecho que ha sido perjudicado o amenazado, ocasionado por la deficiente prestaci&oacute;n o suspensi&oacute;n injustificada del servicio. (Los reclamos deben ser resueltos, atendidos o contestados dentro de los quince (15) d&iacute;as siguientes a la fecha de su presentaci&oacute;n).</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Sugerencia:</strong> cualquier expresi&oacute;n verbal, escrita o en medio digital de recomendaci&oacute;n entregada por el ciudadano, que tiene por objeto mejorar los servicios que presta la entidad para racionalizar el empleo de los recursos o hacer m&aacute;s participativa la gesti&oacute;n p&uacute;blica. (En un t&eacute;rmino de diez (10) d&iacute;as se informar&aacute; sobre la viabilidad de su aplicaci&oacute;n).</li> </ul> <p>&nbsp;</p> <ul> <li><strong>Tr&aacute;mite:</strong> conjunto o serie de pasos o acciones reguladas por el Estado, que deben efectuar los usuarios para adquirir un derecho o cumplir con una obligaci&oacute;n prevista o autorizada por la ley.</li> </ul> <p>&nbsp;</p> <ol> <li>Informaci&oacute;n sobre los mecanismos, espacios o instancias en la que participa la entidad.​</li> <li>Estrategia de participaci&oacute;n ciudadana.​</li> <li>Estrategia anual de rendici&oacute;n de cuentas.​</li> <li>Plan Anticorrupci&oacute;n y de Atenci&oacute;n al Ciudadano (PAAC).​</li> <li>Informes de rendici&oacute;n de cuentas generales.</li> <li>Convocatorias para la participaci&oacute;n de la ciudadan&iacute;a y grupos de valor.</li> <li>Calendario de la estrategia anual de participaci&oacute;n ciudadana.​(Dentro de la Estrategia de Participaci&oacute;n Ciudadana, usted podr&aacute; encontrar las acciones y los plazos en los que se propone llevar a cabo las actividades planteadas anualmente).</li> <li>Formulario de inscripci&oacute;n ciudadana a procesos de participaci&oacute;n, instancias o acciones que ofrece la entidad.</li> <li>Canal de interacci&oacute;n de liberatoria para la participaci&oacute;n ciudadana.​ (Chat, Foro, Blog​)</li> </ol>', 'img_99d82f1e54f66b82aa117bed752f27d5.jpg', '2023-02-11 14:12:39', 'participa', 1),
(35, 'Plan de Participación Ciudadana', '<h1 style=\"text-align: center;\"><strong>Intro Plan de participaci&oacute;n ciudadana</strong></h1> <p>Diagn&oacute;stico e identificaci&oacute;n de problemas es el espacio tiene como prop&oacute;sito vincular a ciudadanos e interesados en el proceso de recolecci&oacute;n de informaci&oacute;n y an&aacute;lisis de la misma para identificar y explicar los problemas que les afectan.</p> <p>&nbsp;</p> <p>A trav&eacute;s del sitio, Documentos para Comentar usted puede encontrar los diferentes temas que son puestos a consideraci&oacute;n de la ciudadan&iacute;a para el diagn&oacute;stico de necesidades e identificaci&oacute;n de problemas.</p> <p>&nbsp;</p> <h2 style=\"text-align: center;\"><strong>Herramienta de evaluaci&oacute;n de los espacios de participaci&oacute;n ciudadana</strong></h2> <p>La empresa de servicios p&uacute;blicos de aseo CANDEASEO SA ESP cuenta con una Encuesta de Satisfacci&oacute;n Espacios de Participaci&oacute;n Ciudadana que sirve como herramienta para conocer la percepci&oacute;n de los grupos de valor en relaci&oacute;n con los espacios de participaci&oacute;n ciudadana. Esta encuesta es diligenciada con los participantes cada vez que se realiza un espacio de participaci&oacute;n durante la vigencia y se encuentra disponible:</p> <p>&nbsp;</p> <p>&nbsp;</p> <h2 style=\"text-align: center;\"><strong>Resultados de la participaci&oacute;n ciudadana:</strong></h2> <p>En el documento Informe de Resultados - Plan de Participaci&oacute;n Ciudadana podr&aacute; consultar resultados de la implementaci&oacute;n de la Estrategia de Participaci&oacute;n Ciudadana en la fase de diagn&oacute;stico participativo:</p>', 'img_9cf530d9870ac1453369fd2b92085a0d.jpg', '2023-02-12 08:54:04', 'plan-de-participacion-ciudadana', 1),
(36, 'Transparencia', '<p>transparencia</p>', 'img_4fc080c01b2aac14efe0992b6fb37957.jpg', '2023-02-12 16:44:29', 'transparencia', 1),
(37, 'Estructura Orgánica', '<p style=\"text-align: justify;\">Candeaseo S.A. E.S.P, con la finalidad de prestar sus servicios de forma integral, est&aacute; organizada mediante una estructura que le permite establecer sus &aacute;reas y funciones y trazar metas mediante un adecuado orden para alcanzar sus objetivos.</p> <p><img src=\"../../Assets/images/uploads/img_65aaacd9618d67295d215f28388e97a4.jpg\" alt=\"Organigrama de la Entidad\" width=\"1000\" height=\"534\" /></p> <p>&nbsp;</p> <p>&nbsp;</p>', 'img_e8b2d94fa3dd5ab145d3005736962aef.jpg', '2023-02-13 10:43:21', 'estructura-organica', 1),
(38, 'Mapas y cartas descriptivas de los procesos', '<p><img src=\"../../Assets/images/uploads/img_359684fee2b2a72a4a3df3ea1cdb3283.jpg\" alt=\"Mapa de Procesos CANDEASEO SA ESP\" width=\"1000\" height=\"667\" /></p>', 'img_b8103a43bcd156ac153d78f9c772c960.jpg', '2023-02-13 10:59:17', 'mapas-y-cartas-descriptivas-de-los-procesos', 1),
(39, 'Funciones y deberes', '<table style=\"border-collapse: collapse; width: 100%;\" border=\"0\"> <tbody> <tr> <td style=\"width: 35.3665%;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../Assets/images/uploads/img_13b270224580c63402bf65f74e6740f6.jpg\" alt=\"\" width=\"300\" height=\"300\" /></td> <td style=\"width: 62.0819%; text-align: justify; padding-left: 80px;\"><strong>Inicialmente en el Municipio de Candelaria Valle El objeto social contempla:</strong> El garantizar (directa o delegada) la prestaci&oacute;n del servicio p&uacute;blico domiciliario de aseo y desarrollar sus actividades complementarias. De acuerdo con lo contemplado en las leyes 142 de 1994 y 689 de 2001 y las dem&aacute;s disposiciones que lo reglamenten, modifiquen, complementen o sustituyan.</td> </tr> </tbody> </table>', 'img_17c7d3904b2fcb72e0a8710b117885b7.jpg', '2023-02-13 11:15:49', 'funciones-y-deberes', 1),
(40, 'Directorio Institucional', '<h3>Cabecera Municipal</h3> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Sede Principal</p> <p>Calle 10 # 9-49 Barrio San Crist&oacute;bal.</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 100 - 101</p> <p>Cel: 3206722882</p> <p>&nbsp;</p> <h3>Villagorgona</h3> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Carrera 11 No. 13-44 Barrio Central.</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 102</p> <p>&nbsp;</p> <h2>Poblado Campestre</h2> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Entrada principal del Poblado Campestre, Carrera 37 Manzana 25</p> <p>Local 5, Centro comercial la Candelaria</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 103</p> <p>&nbsp;</p> <p>&nbsp;</p>', 'img_5517eb367fd0aa2e1a1932f418df19f0.jpg', '2023-02-13 21:59:32', 'directorio-institucional', 1),
(41, 'Directorio de Agremiaciones', '<div class=\"mecanismos\"> <p>Los gremios e instituciones con los cuales se discuten temas asociados a sus objetivos misionales.</p> <h3><a href=\"http://www.andesco.org.co/\">Asociaci&oacute;n Nacional de Empresas de Servicios P&uacute;blicos y Actividades Complementarias e Inherentes- Andesco</a></h3> <p>Calle 93 N&deg; 13 24 piso 3 Bogot&aacute;, Colombia</p> <p>Tel&eacute;fono: +57 1 616 76 11</p> <p>info@andesco.org.co</p> </div> <div class=\"mecanismos\"> <h3><a href=\"https://www.asoresiduos.com/\">Asociaci&oacute;n Andina de Residuos - Asoresiduos</a></h3> <p>Cra 7 No. 116 - 50 Piso 6, Oficina 124 Bogot&aacute;, Colombia</p> <p>Tel&eacute;fono: +57 322 760 7025</p> <p>contactenos@asoresiduos.com</p> </div>', 'img_7938b9345f6b881f32c3fffeb10592bc.jpg', '2023-02-13 22:03:54', 'directorio-de-agremiaciones', 1),
(42, 'Protocolos de atención', '<h2>Servicio al p&uacute;blico, normas, formularios y protocolos de atenci&oacute;n</h2> <p>&nbsp;</p> <p>Preguntas y respuestas frecuentes.</p> <p>Glosario</p> <p>&nbsp;</p> <h2>Normas y Protocolos de Atenci&oacute;n</h2> <p>&nbsp;</p> <p>Responsabilidad Social Institucional RSI</p> <p>Carta de Trato Digno</p> <p>Manual de Servicio al Ciudadano</p> <p>Manual de Caracterizaci&oacute;n</p> <p>&nbsp;</p> <h2>Formularios</h2> <p>&nbsp;</p> <p><a href=\"ciudadanos\" target=\"_blank\" rel=\"noopener\">Formulario electr&oacute;nico de Peticiones, quejas, reclamos, sugerencias y denuncias (PQRSD)</a></p>', 'img_da9cc7c2ce8d915a4acb16223c23abb4.jpg', '2023-02-13 22:11:58', 'protocolos-de-atencion', 1),
(43, 'Procedimientos', '<h3 style=\"text-align: center;\"><strong>Procedimientos que se siguen para tomar decisiones en las diferentes &aacute;reas.</strong></h3>', 'img_1deea5b96d436ba10ca8f8b117a07a0c.jpg', '2023-02-13 22:18:27', 'procedimientos', 1),
(44, 'Comercial', '<p>Directorio Comercial</p>', 'img_17aff9fec05cc13711955946e15a7f2d.jpg', '2023-02-19 14:21:17', 'comercial', 1),
(45, 'Política de Integridad', '<p style=\"text-align: justify;\">En CANDEASEO S.A. E.S.P. trabajamos comprometidos por la prestaci&oacute;n eficaz, eficiente y oportuna del servicio p&uacute;blico integral de aseo, garantizando la satisfacci&oacute;n de nuestros clientes y partes interesadas, contribuyendo a la preservaci&oacute;n y sostenibilidad del medio ambiente, la protecci&oacute;n de la seguridad y salud de nuestro personal, dando cumplimiento a la normatividad legal con transparencia, contando con infraestructura adecuada y talento humano competente y comprometido al mejoramiento continuo de nuestro sistema de gesti&oacute;n.</p>', 'img_169ba7c36611f4400588d38c18365121.jpg', '2023-02-22 13:23:21', 'codigo-de-integridad', 1),
(46, 'Mecanismos de Atención', '<h3>Cabecera Municipal</h3> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Sede Principal</p> <p>Calle 10 # 9-49 Barrio San Crist&oacute;bal.</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 100 - 101</p> <p>Cel: 3206722882</p> <p>&nbsp;</p> <h3>Villagorgona</h3> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Carrera 11 No. 13-44 Barrio Central.</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 102</p> <p>&nbsp;</p> <h2>Poblado Campestre</h2> <p>Punto de Atenci&oacute;n al Cliente</p> <p>Entrada principal del Poblado Campestre, Carrera 37 Manzana 25</p> <p>Local 5, Centro comercial la Candelaria</p> <p>Horario: Lunes a Viernes de 8:00 a.m. a 12:00 m. &ndash; 01:00 pm. a 05:00 p.m.</p> <p>(+57) 602 398 9360</p> <p>Ext. 103</p> <p>&nbsp;</p> <div class=\"mecanismos\"> <h2>Correo Electr&oacute;nico Institucional</h2> <p><a href=\"mailto:contacto@candeaseo.gov.co\">contacto@candeaseo.gov.co</a></p> <p>&nbsp;</p> </div> <div class=\"mecanismos\"> <h2>Atenci&oacute;n Telef&oacute;nica.</h2> <p>Desde la comodidad de su casa y/u oficina puede acceder a una amplia gama de tr&aacute;mites y servicios, solo basta (+57) (2) 264 8247 y uno de nuestros operadores estar&aacute; presto a atenderlo.</p> </div> <div class=\"mecanismos\"> <h2>&nbsp;</h2> <h2>Direcci&oacute;n de Correspondencia</h2> <p>Codigo Postal: 763570</p> <p>Calle 10 # 9-49 Barrio San Crist&oacute;bal.</p> </div> <div class=\"mecanismos\"> <h2>&nbsp;</h2> <h2>Correo electr&oacute;nico para notificaciones judiciales</h2> <p><a href=\"mailto:notificacionesjudiciales@candeaseo.gov.co\">notificacionesjudiciales@candeaseo.gov.co</a></p> <p>&nbsp;</p> </div> <div class=\"mecanismos\"> <h2>Registro PQRSD de Servicio de Aseo</h2> <p>Registre su PQRSD de los servicios de aseo desde el siguiente enlace:&nbsp;<a href=\"../../ciudadanos\" target=\"_blank\" rel=\"noopener\">INGRESE AQU&Iacute;</a></p> </div> <p>&nbsp;</p>', 'img_2c615c49e69c98f155b74a893a06429c.jpg', '2023-02-23 07:58:02', 'mecanismos-de-atencion', 1),
(47, 'Calendario de actividades', '<p>Prueba&nbsp;</p>', 'img_b077fe1bb1107baf31f71c3a72916591.jpg', '2023-02-23 09:23:16', 'calendario-de-actividades', 1),
(48, 'Entes De Control', '<p>Prueba&nbsp;</p>', 'img_16fa609a83e15bb3458506ded1193a88.jpg', '2023-02-23 09:38:09', 'entes-de-control', 1),
(49, 'Hojas De Vida', '<p>Prueba&nbsp;</p>', 'img_8fdcdd8c6b0a6b229ae95a5e7d26eb9c.jpg', '2023-02-23 09:41:08', 'hojas-de-vida', 1);
INSERT INTO `post` (`idpost`, `titulo`, `contenido`, `portada`, `datecreate`, `ruta`, `status`) VALUES
(50, 'Leyes', '<h1 style=\"text-align: center;\">Normatividad Nacional</h1> <div class=\"mision\"> <p><strong>DECRETOS &Uacute;NICOS:</strong><br /><br />Son aquellos expedidos por el Gobierno Nacional en los cuales se incorporan en un solo cuerpo normativo las disposiciones de car&aacute;cter reglamentario vigentes, de competencia de los sectores de la administraci&oacute;n p&uacute;blica nacional; con el objetivo de permitir un mejor conocimiento del Derecho y tener certeza sobre la vigencia de las normas, en aras de facilitar a los ciudadanos y las autoridades el ejercicio de sus derechos y el cabal cumplimiento de sus deberes.<br /><br /><a href=\"http://www.suin-juriscol.gov.co/legislacion/decretosUnicos.html\">http://www.suin-juriscol.gov.co/legislacion/decretosUnicos.html</a><br /><br /><br /><br /><strong>NORMATIVIDAD NACIONAL:</strong><br /><br />Es el conjunto de normas expedidas por el Congreso de la Rep&uacute;blica, en ejercicio de las competencias constitucionales de las que es titular; o las promulgadas por el Presidente de la Rep&uacute;blica, con base en la concesi&oacute;n de facultades extraordinarias por parte del legislador o en desarrollo de la potestad reglamentaria consagrada en el numeral 11 del art&iacute;culo 189 de la Constituci&oacute;n, las cuales regulan los comportamientos de los individuos pertenecientes al Estado colombiano.<br /><br /><a href=\"http://www.suin-juriscol.gov.co/legislacion/normatividad.html\">http://www.suin-juriscol.gov.co/legislacion/normatividad.html</a><br /><br /><br /><br /><strong>ORDENANZAS:</strong><br /><br />Disposici&oacute;n o mandato emitida por la Asamblea del Valle del Cauca.<br /><br /><a href=\"http://asamblea.valledelcauca.gov.co/documentos.php?id=1596%E2%80%8B\">http://asamblea.valledelcauca.gov.co/documentos.php?id=1596​</a></p> </div>', 'img_90688d65084fc34190da6a73f672ba6b.jpg', '2023-02-23 09:48:44', 'leyes', 1),
(51, 'Normatividad', '<h1 style=\"text-align: center;\">NORMATIVIDAD EMPRESARIAL</h1> <p style=\"text-align: center;\" align=\"justify\">En Candeaseo SA ESP los normogramas son un instrumento que contiene las reglas de car&aacute;cter constitucional, legal, normativo, reglamentario y de autorregulaci&oacute;n, que son de inter&eacute;s en el quehacer de la empresa y que permiten identificar las competencias, responsabilidades y funciones de cada una de las &aacute;reas de la organizaci&oacute;n que apoyan nuestra gesti&oacute;n interna.</p>', 'img_610535f1d496bdafde54a5cbce91be91.jpg', '2023-02-23 09:52:05', 'normatividad', 1),
(52, 'Políticas, Lineamiento y Manuales', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran las pol&iacute;ticas, lineamientos y manuales aprobados por Candeaseo SA ESP con sus respectivos detalles. Nuestras pol&iacute;ticas est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_11806d2c1d1d7b6541fb45b24639bb1d.jpg', '2023-02-23 09:56:49', 'politicaslineamiento-y-manuales', 1),
(53, 'Plan Anual De Adquisiciones', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran los planes anuales de adquisiciones aprobados por Candeaseo SA ESP con sus respectivos detalles, las cuales est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_1a066f79e951f00e0ddac1c68097360c.jpg', '2023-02-23 10:02:11', 'plan-anual-de-adquisiciones', 1),
(54, 'Información Contractual', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran la informaci&oacute;n contractual de Candeaseo SA ESP con sus respectivos detalles, las cuales est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_1d08d5b5b08385ae45bf9d82c18837d2.jpg', '2023-02-23 10:07:02', 'informacion-contractual', 1),
(55, 'Manual De Contratación, Adquisición y/o Compra', '<p>Prueba&nbsp;</p>', 'img_3108a30208445c186a7716e1643ef125.jpg', '2023-02-23 10:16:52', 'manual-de-contratacion-adquisicion-y/o-compra', 1),
(56, 'Presupuesto General Asignado', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran el Presupuesto de Candeaseo SA ESP con sus respectivos detalles, las cuales est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_e1d85406dd280e4ce082a04a965f01a5.jpg', '2023-02-23 10:22:22', 'presupuesto-general-asignado', 1),
(57, 'Ejecución Presupuestal Histórica Anual', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran la Ejecuci&oacute;n Presupuestal Historica Anual de Candeaseo SA ESP con sus respectivos detalles, las cuales est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_85a841ec5b6f04303f07c7eb916150da.jpg', '2023-02-23 10:23:53', 'ejecucion-presupuestal-historica-anual', 1),
(58, 'Estados Financieros', '<p style=\"text-align: center;\">En la siguiente tabla se encuentran los Estados Financieros de Candeaseo SA ESP con sus respectivos detalles, las cuales est&aacute;n publicadas y expresas como aporte a la transparencia de nuestra gesti&oacute;n.</p>', 'img_a0761825bf4ae26891af513adae1b0b4.jpg', '2023-02-23 10:26:45', 'estados-financieros', 1),
(59, 'Planes de Acción', '<p>Prueba&nbsp;</p>', 'img_85167f4f65db1d4d2c36756ccff84996.jpg', '2023-02-23 10:27:48', 'planes-de-accion', 1),
(60, 'Metas, objetivos e indicadores de gestión y/o desempeño', '<p>Prueba&nbsp;</p>', 'img_777c184e49b54b28327bf0d229b88fc9.jpg', '2023-02-23 10:29:13', 'metas-objetivos-e-indicadores-de-gestion-y/o-desempeno', 1),
(61, 'Informes de Empalme', '<p>Pueba&nbsp;</p>', 'img_3cc20139a20369e0d1ee119ea952db00.jpg', '2023-02-23 10:30:26', 'informes-de-empalme', 1),
(62, 'Información Pública y/o Relevante', '<p>Prueba&nbsp;</p>', 'img_9881dca2f95f154c3b828b0128f92e9f.jpg', '2023-02-23 10:33:46', 'informacion-publica-y/o-relevante', 1),
(63, 'Informes de Gestión, Evaluación y Auditoría.', '<p>Prueba&nbsp;</p>', 'img_b63f84cbb216952da92446089bf37f2f.jpg', '2023-02-23 10:35:09', 'informes-de-gestion-evaluacion-y-auditoria', 1),
(64, 'Planes de Mejoramiento.', '<p>Prueba&nbsp;</p>', 'img_b598ac2d85a3db9543d328e2e20ef5a3.jpg', '2023-02-23 10:37:25', 'planes-de-mejoramiento', 1),
(65, 'Informes de la Oficina de Control Interno.', '<p>Prueba&nbsp;</p>', 'img_71d0d5c1d5a7057efa403740f0c06ee1.jpg', '2023-02-23 10:38:23', 'informes-de-la-oficina-de-control-interno', 1),
(66, 'Informe sobre Defensa Pública y Prevención del Daño Antijurídico.', '<p>Prueba&nbsp;</p>', 'img_d06b71d06e25d7ed348979b08cea3d6b.jpg', '2023-02-23 10:39:12', 'informe-sobre-defensa-publica-y-prevencion-del-dano-antijuridico', 1),
(67, 'Informes trimestrales sobre acceso a información, quejas y reclamos', '<p>Prueba&nbsp;</p>', 'img_023e2eaf933754c43c8eb80c331fbfab.jpg', '2023-02-23 10:40:12', 'informes-trimestrales-sobre-acceso-a-informacion-quejas-y-reclamos', 1),
(68, 'Trámites y servicios.', '<p>Prueba&nbsp;</p>', 'img_5527a21777c208b92832f75c46b9dddb.jpg', '2023-02-23 10:42:55', 'tramites-y-servicios', 1),
(69, 'Formulario Para La Recepción de Solicitudes de Información Pública.', '<p>Prueba&nbsp;</p>', 'img_2d76a6261e2e9232115eb9fc2df9901c.jpg', '2023-02-23 10:44:28', 'formulario-para-la-recepcion-de-solicitudes-de-informacion-publica', 1),
(70, 'Medios de seguimiento para la consulta del estado de las solicitudes de información pública.', '<p>Prueba&nbsp;</p>', 'img_b5e40a7e6730639e615612e5eee523f2.jpg', '2023-02-23 10:45:46', 'medios-de-seguimiento-para-la-consulta-del-estado-de-las-solicitudes-de-informacion-publica', 1),
(71, 'Registro de Activos de Información', '<p>Prueba&nbsp;</p>', 'img_7777b40854d08407e6edf36e3f5bc629.jpg', '2023-02-23 10:48:12', 'registro-de-activos-de-informacion', 1),
(72, 'Índice de Información Clasificada y Reservada.', '<p>Prueba&nbsp;</p>', 'img_e417a28644c622eea4e5fc0b5bdc2133.jpg', '2023-02-23 10:48:58', 'indice-de-informacion-clasificada-y-reservada', 1),
(73, 'Esquema de Publicación de Información.', '<p>Prueba&nbsp;</p>', 'img_0a40464ccc0677fc8c24bc81961bde53.jpg', '2023-02-23 10:50:07', 'esquema-de-publicacion-de-informacion', 1),
(74, 'Programa de Gestión Documental.', '<p>Prueba</p>', 'img_0a6d8904b6091a924e4d2bf7e735e9f5.jpg', '2023-02-23 10:51:15', 'programa-de-gestion-documental', 1),
(75, 'Tablas de Retención Documental.', '<p>Prueba&nbsp;</p>', 'img_b47ee58188eb341f2ca2a9dd3771391c.jpg', '2023-02-23 10:52:07', 'tablas-de-retencion-documental', 1),
(76, 'Portal Datos Abiertos', '<p>Prueba&nbsp;</p>', 'img_cc213a875cfb466e387765720f4daab1.jpg', '2023-02-23 10:52:54', 'portal-datos-abiertos', 1),
(77, 'Registro de publicaciones.', '<p>Prueba&nbsp;</p>', 'img_f286562dfaf5ba49901eb4cd227a6ac6.jpg', '2023-02-23 10:53:44', 'registro-de-publicaciones', 1),
(78, 'Información para niñas, niños y adolescentes', '<p>Prueba&nbsp;</p>', 'img_30a77ee1c0d1c3dfbeaa94ac99639347.jpg', '2023-02-23 10:58:30', 'informacion-para-ninas-ninos-y-adolescentes', 1),
(79, 'Información Mujeres y otros Grupos de Interés', '<p>Prueba&nbsp;</p>', 'img_3c576a4ccdec70c9cb797e79cd9e3bb9.jpg', '2023-02-23 10:59:46', 'informacion-mujeres-y-otros-grupos-de-interes', 1),
(80, 'Información Mujeres y otros Grupos de Enteres', '<p>Prueba&nbsp;</p>', 'img_65af0419bc929817f65db0529a88a806.jpg', '2023-02-23 11:01:17', 'informacion-mujeres-y-otros-grupos-de-enteres', 1),
(81, 'Convocatorias', '<p>Prueba&nbsp;</p>', 'img_23e33b925068f09094cd100658a451a8.jpg', '2023-02-23 11:02:26', 'convocatorias', 1),
(82, 'Otros sujetos obligados.', '<p>Prueba&nbsp;</p>', 'img_667bb4d32b3c4c9233fdc17088399318.jpg', '2023-02-23 11:04:32', 'otros-sujetos-obligados', 1),
(83, 'Sala de Prensa', '<p>Prueba&nbsp;</p>', 'img_af2fd2dd8747620bb7bf0063de3335d7.jpg', '2023-02-23 11:06:12', 'sala-de-prensa', 1),
(84, 'Trámites', '<p>Prueba</p>', 'img_f50e2e698b5e6959a3c343744b0afbfe.jpg', '2023-02-24 12:32:01', 'tramites', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr_a`
--

CREATE TABLE `pqr_a` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `area` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `canal` int(11) NOT NULL,
  `date_mod` datetime NOT NULL DEFAULT current_timestamp(),
  `user` bigint(20) NOT NULL,
  `responsable` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr_i`
--

CREATE TABLE `pqr_i` (
  `id` int(11) NOT NULL,
  `solicitante` int(11) NOT NULL,
  `nombrea` varchar(50) NOT NULL,
  `nombreb` varchar(50) NOT NULL,
  `apellidoa` varchar(50) NOT NULL,
  `apellidob` varchar(50) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `fijo` varchar(30) NOT NULL,
  `movil` varchar(30) NOT NULL,
  `pais` int(11) NOT NULL,
  `dep` int(2) NOT NULL,
  `mun` int(6) NOT NULL,
  `corr` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `area` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `canal` int(11) NOT NULL,
  `date_mod` datetime NOT NULL DEFAULT current_timestamp(),
  `user` bigint(20) NOT NULL,
  `responsable` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pqr_i`
--

INSERT INTO `pqr_i` (`id`, `solicitante`, `nombrea`, `nombreb`, `apellidoa`, `apellidob`, `tipo_doc`, `numero`, `direccion`, `email`, `fijo`, `movil`, `pais`, `dep`, `mun`, `corr`, `solicitud`, `descripcion`, `area`, `archivo`, `respuesta`, `codigo`, `fecha`, `status`, `dateadd`, `canal`, `date_mod`, `user`, `responsable`) VALUES
(19, 1, 'Zoila', 'Suhellen', 'Duarte', 'Martinez', 1, '1111541366', 'calle 12c #21 oeste -56 urbanizacion manzanares', 'suhellen.duarte@hotmail.com', '', '3178868110', 1, 1, 1, 1, 1, 'QUIERO INFORMAR QUE MIS PREDIOS UBICADOS EN CANDELARIA SON LOTES Y DE MOMENTO NO GENERA NINGUN TIPO DE RESIDUO', 2, 'vacio.png', 1, '20230224143421', '2023-02-24', 1, '2023-02-24 14:34:21', 3, '2023-02-24 14:34:21', 1, 3),
(20, 1, 'Yenifer', '', 'Garcia', 'Nieto', 1, '1144177567', 'cra 35c oeste # 14-130', 'yennigarcia20@hotmail.com', '3202005410', '3202005410', 1, 1, 1, 14, 2, 'buena tarde , quería hacerles saber que no estoy deacuerdo con el valor que se cobra en el recibo por el servicio ya que no se ven barriendo por la cuadra donde vivo es un valor muy alto , sabiendo que no se cumplen con las funciones brindadas .', 1, 'd4025e321699e552fb6ae33ec97e083afactura.pdf', 1, '20230224144225', '2023-02-24', 1, '2023-02-24 14:42:25', 3, '2023-02-24 14:42:25', 1, 3),
(21, 1, 'Adriana', 'Yaneth', 'Ortiz', 'Narvaez', 1, '38602788', 'carrera 31A 14-155 apto 402 torre 16', 'yanethortiz82@hotmail.com', '', '3167809991', 1, 1, 1, 1, 1, 'Buen día, Solicito de la manera mas atenta a ustedes, no generar cobro de aseo, ya que el predio se encuentra desocupado desde el mes de enero del 2022 y no se hace uso de este servicio, los meses anteriores se ha estado cancelando pero el predio no es aun habitado. anexo recibo de aquaservicios donde se evidencia el no consumo del servicio de los últimos meses. quedo atenta a su respuesta . Adriana Ortiz yanethortiz82@hotmail.com 3167809991', 1, 'f4907bdc5463004f25a08fa89cf9620dfactura.pdf', 1, '20230226154004', '2023-02-26', 1, '2023-02-26 15:40:04', 3, '2023-02-26 15:40:04', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prensa`
--

CREATE TABLE `prensa` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cuerpo` text NOT NULL,
  `user` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prensa`
--

INSERT INTO `prensa` (`id`, `titulo`, `descripcion`, `cuerpo`, `user`, `fecha`, `dateadd`, `status`) VALUES
(2, 'Titulo', 'Descripción', '<p><span style=\"text-decoration: line-through;\">Cuerpo de Noticia</span></p> <p>&nbsp;</p> <table style=\"width: 100%;\" border=\"1\"> <tbody> <tr> <td style=\"width: 30.3775%;\">Hola</td> <td style=\"width: 30.3775%;\">Soy</td> <td style=\"width: 30.3801%;\">Una</td> </tr> <tr> <td style=\"width: 30.3775%;\">&nbsp;</td> <td style=\"width: 30.3775%;\">Cualquiera</td> <td style=\"width: 30.3801%;\">Tabla</td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>Solo es una prueba</strong></p>', 1, '2023-01-26', '2023-01-26 10:31:19', 0),
(3, 'Noticia Dos', 'Descripción de una noticia que se usa de forma corta', '<p>Tres Muertos Gravemente heridos fueron trasladados a la casa de la mam&aacute;.</p> <p>&nbsp;</p> <ul> <li>esto</li> <li>esto</li> <li>y esto otro</li> </ul>', 1, '2023-01-15', '2023-01-26 11:56:53', 0),
(4, 'Noticia Tres', 'Descripción de una noticia con el texto corto de comprensión', '<ul> <li>Uno</li> <li>Dos</li> <li>Tres</li> <li>Cuatro</li> <li>&nbsp;</li> </ul>', 1, '2023-01-04', '2023-01-26 12:22:53', 0),
(5, 'Dudas por Libertad a alias ‘El Gatico’', 'Denuncian al juez que dejó en libertad a alias ‘El Gatico’', '<p>La Procuradur&iacute;a denunci&oacute; ante la Comisi&oacute;n Seccional de Disciplina Judicial de Atl&aacute;ntico, al juez quinto de Ejecuci&oacute;n de Penas y Medidas de Seguridad de Barranquilla, Orlando Jos&eacute; Petro, por haber otorgado la libertad a Jorge Luis Alfonso L&oacute;pez, alias \'El Gatico\', hijo de la pol&eacute;mica empresaria del chance, Enilce L&oacute;pez.<br /><br /><strong>Lo anterior, seg&uacute;n el Ministerio P&uacute;blico, porque el juez inexplicablemente otorg&oacute; la libertad a este hombre sin tener motivos jur&iacute;dicos que lo sustenten.</strong><br /><br />&ldquo;Para la Procuradur&iacute;a, el juez asumi&oacute;, que deb&iacute;a suspender la aplicaci&oacute;n de la pena que restring&iacute;a la libertad de Jorge Luis Alfonso L&oacute;pez, cuando es claro que en la Resoluci&oacute;n 075 de 2022 el Alto Comisionado para la Paz nunca hizo alusi&oacute;n al tema, y mucho menos, se solicit&oacute; la suspensi&oacute;n de la ejecuci&oacute;n de la pena de prisi&oacute;n impuesta, como tampoco se ordenaba su libertad&rdquo;, explic&oacute; el Ministerio P&uacute;blico.</p>', 1, '2023-02-10', '2023-02-10 08:34:23', 0),
(6, 'Prueba Andres', 'Esta es una prueba de una noticia', '<p>sd</p> <p>efef</p> <p>efe</p> <p>fe</p> <p>fe</p> <p>few</p> <ul> <li>sfeg</li> </ul> <p>&nbsp;</p> <p>&nbsp;</p>', 1, '2023-02-16', '2023-02-16 10:20:03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `tipodoc` int(11) NOT NULL,
  `nit` varchar(30) NOT NULL,
  `tipo` int(11) NOT NULL,
  `razon` varchar(100) NOT NULL,
  `primer` varchar(40) NOT NULL,
  `segundo` varchar(40) NOT NULL,
  `apellidoa` varchar(50) NOT NULL,
  `apellidob` varchar(50) NOT NULL,
  `departamento` int(2) NOT NULL,
  `municipio` int(6) NOT NULL,
  `corregimiento` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `barrio` varchar(100) NOT NULL,
  `hv` varchar(100) NOT NULL,
  `ce` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `rut` varchar(100) NOT NULL,
  `aportes` varchar(100) NOT NULL,
  `afiliacion` varchar(100) NOT NULL,
  `antecedentes` varchar(100) NOT NULL,
  `adicionales` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `critico` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `user` bigint(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `tipodoc`, `nit`, `tipo`, `razon`, `primer`, `segundo`, `apellidoa`, `apellidob`, `departamento`, `municipio`, `corregimiento`, `direccion`, `telefono`, `email`, `barrio`, `hv`, `ce`, `cedula`, `rut`, `aportes`, `afiliacion`, `antecedentes`, `adicionales`, `status`, `critico`, `dateadd`, `user`, `estado`) VALUES
(1, 1, '2529193', 1, '', 'JOSE', 'DANIEL', 'FUERTES', 'LOPEZ', 1, 1, 1, 'Cra 11a # 13-69', '3128638405', 'enrique@hotmail.com', 'CAÑAMIEL', '29dd862cb366bd8e62c90222f9e4e462examen 5.pdf', 'd1402865ebfaa4d6c37f0928a150ec5chv vale.pdf', 'd1402865ebfaa4d6c37f0928a150ec5crut.pdf', 'd1402865ebfaa4d6c37f0928a150ec5cPropuestaTecnicaSoftservice.pdf', '', '', 'd1402865ebfaa4d6c37f0928a150ec5cexamen 5.pdf', '', 1, 1, '2023-02-11 11:02:35', 1, 0),
(2, 5, '9013624161', 2, 'SOFTSERVICE.NET SAS', 'VIVIANA', '', 'CORDOBA', '', 1, 1, 1, 'Cra 11a # 13-69', '3128638405', 'softservicenet@gmail.com', 'JORGE ELICER GAITAN', '548097dc19fc2ef23507922c9b24f805CV-MauricioB..pdf', '548097dc19fc2ef23507922c9b24f805hv vale.pdf', '548097dc19fc2ef23507922c9b24f805INICIO-2022-0354-CERTIFICACION_EPS.pdf', '548097dc19fc2ef23507922c9b24f805HV-STEVEN SOLARTE.pdf', '', '', '548097dc19fc2ef23507922c9b24f805Hoja de Vida Betsy Riascos.pdf', '', 1, 1, '2023-02-11 13:39:51', 1, 1),
(3, 1, '1113526503', 1, '', 'JOSÉ', 'DANIEL', 'FUERTES', 'LOPEZ', 1, 1, 1, 'CALLE 10 1E 106', '3160246192', 'danielfuertes24@hotmail.com', 'CAÑA MIEL', '6e964077e446c8c2dc1f4c9e4a80b3a3hv vale.pdf', '6e964077e446c8c2dc1f4c9e4a80b3a3Paso a Paso_Pago PSE (nuevo).pdf', '6e964077e446c8c2dc1f4c9e4a80b3a3HV-STEVEN SOLARTE.pdf', '6e964077e446c8c2dc1f4c9e4a80b3a3Mostrar Formulario - Aplicativo por la Integridad Pública.pdf', '', '', '6e964077e446c8c2dc1f4c9e4a80b3a3JAHVPGN-Resultados ITA 3023.pdf', '', 1, 1, '2023-02-11 13:41:25', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Comunicaciones', 'Área de Comunicaciones', 1),
(11, 'PQRSD', 'Gestor de PQRSD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub`
--

CREATE TABLE `sub` (
  `id` bigint(20) NOT NULL,
  `categoria` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `sub`
--

INSERT INTO `sub` (`id`, `categoria`, `nombre`, `ruta`, `datecreated`, `status`) VALUES
(1, 10, '1.01. Misión, visión.', 'nosotros', '2023-02-12 16:09:14', 1),
(2, 10, '1.03. Estructura orgánica - Organigrama.', 'estructura-organica', '2023-02-12 16:14:27', 1),
(3, 11, '2.02 Normativa aplicable', 'normatividad', '2023-02-13 07:50:53', 1),
(4, 12, '3.01. Plan Anual de Adquisiciones', 'plan-anual-de-adquisiciones', '2023-02-13 08:37:38', 1),
(5, 10, '1.04. Mapas y cartas descriptivas de los procesos.', 'mapas-y-cartas-descriptivas-de-los-procesos', '2023-02-13 11:00:01', 1),
(6, 10, '1.02. Funciones y Deberes', 'funciones-y-deberes', '2023-02-13 11:22:49', 1),
(7, 10, '1.05. Directorio Institucional', 'directorio-institucional', '2023-02-13 22:00:17', 1),
(8, 10, '1.06. Directorio de Agremiaciones', 'directorio-de-agremiaciones', '2023-02-13 22:05:05', 1),
(9, 10, '1.07. Servicio al público, normas, formularios y protocolos de atención.', 'protocolos-de-atencion', '2023-02-13 22:12:21', 1),
(10, 10, '1.08.Procedimientos que se siguen para tomar decisiones en las diferentes áreas.', 'procedimientos', '2023-02-13 22:20:23', 1),
(11, 10, '1.09. Mecanismo de presentación directa de solicitudes, quejas y reclamos.', 'ciudadano', '2023-02-23 09:08:26', 1),
(12, 10, '1.10.Calendario de actividades', 'calendario-de-actividades', '2023-02-23 09:24:40', 1),
(13, 10, '1.11.Información de decisiones que puede afectar al público.', 'sala', '2023-02-23 09:35:03', 1),
(14, 10, '1.12.Entes de control que vigilan', 'entes-de-control', '2023-02-23 09:39:13', 1),
(15, 10, '1.13.Publicación hojas de vida', 'hojas-de-vida', '2023-02-23 09:41:43', 1),
(16, 11, '2.01.Leyes', 'leyes', '2023-02-23 09:49:34', 1),
(17, 11, '2.03. Política, lineamiento y manuales', 'politicaslineamiento-y-manuales', '2023-02-23 09:59:17', 1),
(19, 12, '3.02. Información Contractual', 'informacion-contractual', '2023-02-23 10:10:46', 1),
(20, 12, '3.03.Manual de Contratación, Adquisición y/o Compra.', 'manual-de-contratacion-adquisicion-y/o-compra', '2023-02-23 10:17:36', 1),
(21, 13, '4.01.Presupuesto general asignado.', 'presupuesto-general-asignado', '2023-02-23 10:23:03', 1),
(22, 13, '4.02. Ejecución presupuestal histórica anual', 'ejecucion-presupuestal-historica-anual', '2023-02-23 10:24:33', 1),
(23, 13, '4.03.Estados financieros', 'estados-financieros', '2023-02-23 10:27:12', 1),
(24, 13, '4.04.Planes de acción', 'planes-de-accion', '2023-02-23 10:28:43', 1),
(25, 13, '4.05.Metas, objetivos e indicadores de gestión y/o desempeño', 'metas-objetivos-e-indicadores-de-gestion-y/o-desempeno', '2023-02-23 10:29:46', 1),
(26, 13, '4.06.Informes de empalme', 'informes-de-empalme', '2023-02-23 10:32:53', 1),
(27, 13, '4.07.Información pública y/o relevante', 'informacion-publica-y/o-relevante', '2023-02-23 10:34:12', 1),
(28, 13, '4.08.Informes de gestión, evaluación y auditoría.', 'informes-de-gestion-evaluacion-y-auditoria', '2023-02-23 10:35:34', 1),
(29, 13, '4.09.Planes de Mejoramiento.', 'planes-de-mejoramiento', '2023-02-23 10:37:51', 1),
(30, 13, '4.10.Informes de la Oficina de Control Interno.', 'informes-de-la-oficina-de-control-interno', '2023-02-23 10:38:48', 1),
(31, 13, '4.11.Informe sobre Defensa Pública y Prevención del Daño Antijurídico.', 'informe-sobre-defensa-publica-y-prevencion-del-dano-antijuridico', '2023-02-23 10:39:32', 1),
(32, 13, '4.12.Informes trimestrales sobre acceso a información, quejas y reclamos', 'informes-trimestrales-sobre-acceso-a-informacion-quejas-y-reclamos', '2023-02-23 10:40:37', 1),
(33, 14, '5.01.Trámites y servicios.', 'tramites-y-servicios', '2023-02-23 10:43:19', 1),
(34, 14, '5.02.Formulario para la recepción de solicitudes de información pública.', 'formulario-para-la-recepcion-de-solicitudes-de-informacion-publica', '2023-02-23 10:44:51', 1),
(35, 14, '5.03.Medios de seguimiento para la consulta del estado de las solicitudes de información pública.', 'medios-de-seguimiento-para-la-consulta-del-estado-de-las-solicitudes-de-informacion-publica', '2023-02-23 10:46:11', 1),
(36, 15, '6.01.Registro de Activos de Información', 'registro-de-activos-de-informacion', '2023-02-23 10:48:31', 1),
(37, 15, '6.02.Índice de Información Clasificada y Reservada.', 'indice-de-informacion-clasificada-y-reservada', '2023-02-23 10:49:34', 1),
(38, 15, '6.03.Esquema de Publicación de Información.', 'esquema-de-publicacion-de-informacion', '2023-02-23 10:50:31', 1),
(39, 15, '6.04.Programa de Gestión Documental.', 'programa-de-gestion-documental', '2023-02-23 10:51:39', 1),
(40, 15, '6.05.Tablas de Retención Documental.', 'tablas-de-retencion-documental', '2023-02-23 10:52:27', 1),
(41, 15, '6.06.Portal Datos Abiertos', 'portal-datos-abiertos', '2023-02-23 10:53:11', 1),
(42, 15, '6.07.Registro de publicaciones.', 'registro-de-publicaciones', '2023-02-23 10:54:06', 1),
(43, 16, '7.01.Información para niñas, niños y adolescentes', 'informacion-para-ninas-ninos-y-adolescentes', '2023-02-23 10:58:53', 1),
(44, 16, '7.02.Información Mujeres y otros Grupos de Interés', 'informacion-mujeres-y-otros-grupos-de-interes', '2023-02-23 11:01:56', 1),
(45, 16, '7.03.Convocatorias', 'convocatorias', '2023-02-23 11:02:53', 1),
(46, 17, '8.01.Otros sujetos obligados.', 'otros-sujetos-obligados', '2023-02-23 11:04:53', 1),
(47, 18, '9.01.Sala de Prensa', 'sala-de-prensa', '2023-02-23 11:07:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user` bigint(20) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id`, `anio`, `mes`, `descripcion`, `archivo`, `status`, `user`, `dateadd`) VALUES
(4, 2019, 'Enero', '<p>Tarifas</p>', '27a7e86414421fbe45e6e4ed163ede96', 1, 1, '2023-02-22 14:49:29'),
(5, 2019, 'Febrero', '<p>Tarifas</p>', 'cbf8008df5174dd1868d1dfff15d9c570219.pdf', 1, 1, '2023-02-22 14:51:52'),
(6, 2019, 'Marzo', '<p>Tarifas</p>', 'abfb42c212a2704645f1579733651a91', 1, 1, '2023-02-22 14:52:48'),
(7, 2019, 'Abril', '<p>Tarifas</p>', '78abd3fccfd4274effef7e909a7f17c90419.pdf', 1, 1, '2023-02-22 14:54:31'),
(8, 2019, 'Mayo', '<p>Tarifas</p>', '7ccd1087c1b41fe449698a1ec177e5260519.pdf', 1, 1, '2023-02-22 14:54:51'),
(9, 2019, 'Junio', '<p>Tarifas</p>', '47f73c36a6102ced552650468ea44eab0619.pdf', 1, 1, '2023-02-22 14:55:12'),
(10, 2019, 'Julio', '<p>Tarifas</p>', 'f20ea4b0e4f44473929f8ab95c25a8ac0719.pdf', 1, 1, '2023-02-22 14:57:22'),
(11, 2019, 'Agosto', '<p>Tarifas</p>', '0cf0493ab41c6489650c11f52bb840990819.pdf', 1, 1, '2023-02-22 14:57:47'),
(12, 2019, 'Septiembre', '<p>Tarifas</p>', 'db29d45db03c7126a54a08cef87d2cef0919.pdf', 1, 1, '2023-02-22 14:58:14'),
(13, 2019, 'Octubre', '<p>Tarifas</p>', '2e7096b07bd586597d96c55ef18a379b1019.pdf', 1, 1, '2023-02-22 14:58:41'),
(14, 2019, 'Noviembre', '<p>Tarifas</p>', 'f38e1031c881e33905697d17c90f9c451119.pdf', 1, 1, '2023-02-22 14:59:06'),
(15, 2019, 'Diciembre', '<p>Tarifas</p>', '2697ada87250d6cd032929b4ca8215161219.pdf', 1, 1, '2023-02-22 14:59:24'),
(16, 2020, 'Enero', '<p>Tarifas</p>', '018a2bbacbb409166f8904b86b1372560120.pdf', 1, 1, '2023-02-22 15:37:52'),
(17, 2020, 'Febrero', '<p>Tarifa&nbsp;</p>', 'a0cc137caa71cebfd4cca3e490aff3530220.pdf', 1, 1, '2023-02-22 16:06:01'),
(18, 2020, 'Marzo', '<p>Tarifa&nbsp;</p>', 'ff76055c507f1dfaf3792a0ea28a3eaf0320.pdf', 1, 1, '2023-02-22 16:06:54'),
(19, 2020, 'Abril', '<p>Tarifa</p>', '888dc2d9d0f90a985876ce445d96479a0420.pdf', 1, 1, '2023-02-22 16:07:40'),
(20, 2020, 'Mayo', '<p>Tarifa&nbsp;</p>', '237f0ff8654899b39a7c07c7eee29f030520.pdf', 1, 1, '2023-02-22 16:09:00'),
(21, 2020, 'Junio', '<p>Tarifa&nbsp;</p>', 'dc783d6015a9f95f472b1dc7e65b8c400620.pdf', 1, 1, '2023-02-22 16:09:52'),
(22, 2020, 'Julio', '<p>Tarifa</p>', 'c80f85ea57b61b7354fd4c3347e6fd710720.pdf', 1, 1, '2023-02-22 16:10:25'),
(23, 2020, 'Agosto', '<p>Tarifa&nbsp;</p>', 'a72b1af10b51100fc0a58535a4c78ca50820.pdf', 1, 1, '2023-02-22 16:13:21'),
(24, 2020, 'Septiembre', '<p>Tarifa&nbsp;</p>', '720031645ea1694fe3bae2f796d9a7850920.pdf', 1, 1, '2023-02-22 16:14:04'),
(25, 2020, 'Octubre', '<p>Tarifa</p>', '78b1878ca8e95a3014470725847d89271020.pdf', 1, 1, '2023-02-22 16:14:37'),
(26, 2020, 'Noviembre', '<p>Tarifa&nbsp;</p>', '80952abf180ec2005f38ca2042bd55431120.pdf', 1, 1, '2023-02-22 16:15:44'),
(27, 2020, 'Diciembre', '<p>Tarifa&nbsp;</p>', '6e9bc229ea4cc2b22d70f33d9b14af0f1220.pdf', 1, 1, '2023-02-22 16:16:11'),
(28, 2021, 'Enero', '<p>Tarifa&nbsp;</p>', 'ec948cc760ccea9b6b80fcb9237fb4270121.pdf', 1, 1, '2023-02-22 16:17:14'),
(29, 2021, 'Febrero', '<p>Tarifa&nbsp;</p>', '7963f569dae3117a193cce7a927128280221.pdf', 1, 1, '2023-02-22 16:17:41'),
(30, 2021, 'Marzo', '<p>Tarifa&nbsp;</p>', '059ad1d0bb4b1ffbafca512a22ddf9bb0321.pdf', 1, 1, '2023-02-22 16:18:12'),
(31, 2021, 'Abril', '<p>Tarifa&nbsp;</p>', 'ec948cc760ccea9b6b80fcb9237fb4270421.pdf', 1, 1, '2023-02-22 16:19:14'),
(32, 2021, 'Mayo', '<p>Tarifa&nbsp;</p>', 'cf20d186ffe0f7783da430089f8d06cd0521.pdf', 1, 1, '2023-02-22 16:19:47'),
(33, 2021, 'Junio', '<p>Tarifa&nbsp;</p>', '0dd84218c542bbb8b02f5430da598b830621.pdf', 1, 1, '2023-02-22 16:20:19'),
(34, 2021, 'Julio', '<p>Tarifa&nbsp;</p>', 'b4e42ab9afaf0075b6a1a207b3faf66a0721.pdf', 1, 1, '2023-02-22 16:20:49'),
(35, 2021, 'Agosto', '<p>Tarifa&nbsp;</p>', 'c27be47d5f8c020fc3d03b5c2451ece70821.pdf', 1, 1, '2023-02-22 16:21:32'),
(36, 2021, 'Septiembre', '<p>Tarifa&nbsp;</p>', '36d3fdbafcd9b0b8adb6cffc460503590921.pdf', 1, 1, '2023-02-22 16:22:22'),
(37, 2021, 'Octubre', '<p>Tarifa&nbsp;</p>', '963847c28d63fab18a68813c867659821021.pdf', 1, 1, '2023-02-22 16:23:16'),
(38, 2021, 'Noviembre', '<p>Tarifa&nbsp;</p>', 'bf6f957a571c974dc827159841d40be51121.pdf', 1, 1, '2023-02-22 16:24:15'),
(39, 2021, 'Diciembre', '<p>Tarifas&nbsp;</p>', 'cf20d186ffe0f7783da430089f8d06cd1221.pdf', 1, 1, '2023-02-22 16:24:47'),
(40, 2022, 'Enero', '<p>Tarifa&nbsp;</p>', '36d3fdbafcd9b0b8adb6cffc460503590122.pdf', 1, 1, '2023-02-22 16:25:22'),
(41, 2022, 'Febrero', '<p>Tarifa&nbsp;</p>', 'a0cc137caa71cebfd4cca3e490aff3530222.pdf', 1, 1, '2023-02-22 16:26:01'),
(42, 2022, 'Marzo', '<p>Tarifa&nbsp;</p>', '85ebbc694a6b65a871160253e032f3120322.pdf', 1, 1, '2023-02-22 16:26:33'),
(43, 2022, 'Abril', '<p>Tarifa&nbsp;</p>', '8042d677492d1a7a4bf96f3d4bedf3d90422.pdf', 1, 1, '2023-02-22 16:26:55'),
(44, 2022, 'Mayo', '<p>Tarifa&nbsp;</p>', '0886a5c936e998a3cb7657e0b49587c80522.pdf', 1, 1, '2023-02-22 16:27:23'),
(45, 2022, 'Junio', '<p>Tarifa&nbsp;</p>', '92e8a2cc9aea8a1e33dcadfebf7af8810622.pdf', 1, 1, '2023-02-22 16:27:51'),
(46, 2022, 'Julio', '<p>Tarifa&nbsp;</p>', 'dcbaedefb227e1240f90d979e5b111640722.pdf', 1, 1, '2023-02-22 16:28:26'),
(47, 2022, 'Agosto', '<p>Tarifa&nbsp;</p>', '56e91314b77384e964ab3a0d7c9fd2140822.pdf', 1, 1, '2023-02-22 16:29:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(50) NOT NULL,
  `abr` varchar(5) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`id`, `identificacion`, `abr`, `estatus`) VALUES
(1, 'Cédula de Ciudadanía ', 'CC', 1),
(2, 'Cédula de Extranjería ', 'CE', 1),
(3, 'Registro Civil', 'RC', 1),
(4, 'Tarjeta de Identidad', 'TI', 1),
(5, 'Numero de Identificación Tributaria', 'NIT', 1),
(6, 'Otro', 'OTRO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_imagen`
--

CREATE TABLE `tipo_imagen` (
  `id` int(11) NOT NULL,
  `tipo_imagen` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_imagen`
--

INSERT INTO `tipo_imagen` (`id`, `tipo_imagen`, `status`) VALUES
(1, 'SliderHome (5182x1700)', 1),
(2, 'Video Inicio (1920x995)', 1),
(3, 'Imagen Flotante (700x350)', 1),
(4, 'Entidades (400x173)', 1),
(5, 'Banco de Imágenes (700x350)', 1),
(6, 'Directores (600x600)', 1),
(7, 'Modal (850x1100)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pqr`
--

CREATE TABLE `tipo_pqr` (
  `id` int(11) NOT NULL,
  `tipo_pqr` varchar(50) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pqr`
--

INSERT INTO `tipo_pqr` (`id`, `tipo_pqr`, `tiempo`, `estatus`) VALUES
(1, 'Petición General', 30, 1),
(2, 'Queja', 30, 1),
(3, 'Felicitaciones y Sugerencias', 30, 1),
(4, 'Solicitud de Información Publica', 20, 1),
(5, 'Reclamo por Factura', 10, 1),
(6, 'Solicitud de Servicio', 15, 1),
(7, 'Derecho de Petición', 30, 1),
(8, 'Denuncia por actos de corrupción', 20, 1),
(10, 'Reclamo', 20, 1),
(11, 'Vincualción', 10, 3),
(12, 'Reclamo por Facturación', 10, 3),
(13, 'Recolecciones Especiales', 10, 3),
(14, 'Viabilidad y Disponibilidad', 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitante`
--

CREATE TABLE `tipo_solicitante` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_solicitante`
--

INSERT INTO `tipo_solicitante` (`id`, `tipo`, `status`) VALUES
(1, 'Persona Natural', 1),
(2, 'Persona Jurídica', 1),
(3, 'Niño', 1),
(4, 'Niña', 1),
(5, 'Adolescente', 1),
(6, 'Apoderado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_trazabilidad`
--

CREATE TABLE `tipo_trazabilidad` (
  `id` int(11) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_trazabilidad`
--

INSERT INTO `tipo_trazabilidad` (`id`, `accion`, `status`) VALUES
(1, 'Recibir y Radicar', 1),
(2, 'Reasignar', 1),
(3, 'Notificar el Ciudadano', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `solicitante` int(11) NOT NULL,
  `nombrea` varchar(50) NOT NULL,
  `nombreb` varchar(50) NOT NULL,
  `apellidoa` varchar(50) NOT NULL,
  `apellidob` varchar(50) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `fijo` varchar(30) NOT NULL,
  `movil` varchar(30) NOT NULL,
  `pais` int(11) NOT NULL,
  `dep` int(2) NOT NULL,
  `mun` int(6) NOT NULL,
  `corr` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `area` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `canal` int(11) NOT NULL,
  `date_mod` datetime NOT NULL DEFAULT current_timestamp(),
  `user` bigint(20) NOT NULL,
  `responsable` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `solicitante`, `nombrea`, `nombreb`, `apellidoa`, `apellidob`, `tipo_doc`, `numero`, `direccion`, `email`, `fijo`, `movil`, `pais`, `dep`, `mun`, `corr`, `solicitud`, `descripcion`, `area`, `archivo`, `respuesta`, `codigo`, `fecha`, `status`, `dateadd`, `canal`, `date_mod`, `user`, `responsable`) VALUES
(3, 1, 'JOSE', 'DANIEL', 'FUERTES', 'LOPEZ', 1, '2529193', 'Carrera 11a # 13-19 Jorge Gaitán', 'danielfuertes24@hotmail.com', '', '3113944484', 1, 1, 1, 1, 13, '<p>Prueba</p>', 5, 'b1b5eaf9ca5d1413c7105ce065f34823FORMATO DE INFORME DE ACTIVIDADES.pdf', 1, '260220231252', '2023-02-26', 3, '2023-02-26 12:52:41', 1, '2023-02-26 12:52:41', 1, 4),
(4, 1, 'DIANA', 'MARCELA', 'ERAZO', 'CERON', 1, '1084550436', 'MZ 08 CS 10 K 26B OESTE 12-106', 'marrcela.1403@gmail.com', '3127416039', '3113265717', 1, 1, 1, 1, 12, 'por favor necesito la conexion de agua , espero pronta respuesta', 3, 'vacio.png', 2, '20230226175343', '2023-02-26', 1, '2023-02-26 17:53:43', 3, '2023-02-26 17:53:43', 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `id` int(11) NOT NULL,
  `pqr_i` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1,
  `adjunto` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `usuario` bigint(20) NOT NULL,
  `momento` varchar(50) NOT NULL,
  `tipo_t` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad_a`
--

CREATE TABLE `trazabilidad_a` (
  `id` int(11) NOT NULL,
  `pqr_i` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1,
  `adjunto` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `usuario` bigint(20) NOT NULL,
  `momento` varchar(50) NOT NULL,
  `tipo_t` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad_tramite`
--

CREATE TABLE `trazabilidad_tramite` (
  `id` int(11) NOT NULL,
  `pqr_i` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1,
  `adjunto` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `usuario` bigint(20) NOT NULL,
  `momento` varchar(50) NOT NULL,
  `tipo_t` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trazabilidad_tramite`
--

INSERT INTO `trazabilidad_tramite` (`id`, `pqr_i`, `fecha`, `estatus`, `adjunto`, `texto`, `usuario`, `momento`, `tipo_t`, `status`) VALUES
(37, 3, '2023-02-26 12:53:29', 1, 'vacio.png', '<p>Recibido y Radicado</p>', 1, '', 1, 1),
(38, 3, '2023-02-26 12:56:43', 1, 'vacio.png', '<p>Se Reasigna a operativo</p>', 1, '', 2, 1),
(39, 3, '2023-02-26 12:57:12', 1, '276bb5e4509b11a6855bf7d4fef8b0b0FORMATO DE INFORME DE ACTIVIDADES.pdf', '<p>Se finaliza</p>', 1, '', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `user` (`user`),
  ADD KEY `sub` (`sub`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bloques`
--
ALTER TABLE `bloques`
  ADD PRIMARY KEY (`iddiv`);

--
-- Indices de la tabla `canal_pqr`
--
ALTER TABLE `canal_pqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `categoria_dir`
--
ALTER TABLE `categoria_dir`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `corregimiento`
--
ALTER TABLE `corregimiento`
  ADD PRIMARY KEY (`id_corregimiento`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `pais` (`pais`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`),
  ADD KEY `corregimientoid` (`corregimientoid`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idimg`),
  ADD KEY `tipo_slider` (`tipo_imagen`);

--
-- Indices de la tabla `imagen_dir`
--
ALTER TABLE `imagen_dir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `medio_respuesta`
--
ALTER TABLE `medio_respuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indices de la tabla `pqr_a`
--
ALTER TABLE `pqr_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `area` (`area`),
  ADD KEY `respuesta` (`respuesta`),
  ADD KEY `canal` (`canal`),
  ADD KEY `user` (`user`),
  ADD KEY `responsable` (`responsable`);

--
-- Indices de la tabla `pqr_i`
--
ALTER TABLE `pqr_i`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_doc` (`tipo_doc`),
  ADD KEY `solicitante` (`solicitante`),
  ADD KEY `pais` (`pais`),
  ADD KEY `dep` (`dep`),
  ADD KEY `mun` (`mun`),
  ADD KEY `corr` (`corr`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `area` (`area`),
  ADD KEY `respuesta` (`respuesta`),
  ADD KEY `canal` (`canal`),
  ADD KEY `user` (`user`),
  ADD KEY `responsable` (`responsable`);

--
-- Indices de la tabla `prensa`
--
ALTER TABLE `prensa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento` (`departamento`),
  ADD KEY `municipio` (`municipio`),
  ADD KEY `corregimiento` (`corregimiento`),
  ADD KEY `user` (`user`),
  ADD KEY `tipodoc` (`tipodoc`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `tipodoc_2` (`tipodoc`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_imagen`
--
ALTER TABLE `tipo_imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pqr`
--
ALTER TABLE `tipo_pqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_solicitante`
--
ALTER TABLE `tipo_solicitante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_trazabilidad`
--
ALTER TABLE `tipo_trazabilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_doc` (`tipo_doc`),
  ADD KEY `solicitante` (`solicitante`),
  ADD KEY `pais` (`pais`),
  ADD KEY `dep` (`dep`),
  ADD KEY `mun` (`mun`),
  ADD KEY `corr` (`corr`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `area` (`area`),
  ADD KEY `respuesta` (`respuesta`),
  ADD KEY `canal` (`canal`),
  ADD KEY `user` (`user`),
  ADD KEY `responsable` (`responsable`);

--
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud` (`pqr_i`),
  ADD KEY `solicitud_2` (`pqr_i`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `tipo_t` (`tipo_t`);

--
-- Indices de la tabla `trazabilidad_a`
--
ALTER TABLE `trazabilidad_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_t` (`tipo_t`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `pqr_i` (`pqr_i`);

--
-- Indices de la tabla `trazabilidad_tramite`
--
ALTER TABLE `trazabilidad_tramite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud` (`pqr_i`),
  ADD KEY `solicitud_2` (`pqr_i`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `tipo_t` (`tipo_t`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `bloques`
--
ALTER TABLE `bloques`
  MODIFY `iddiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `canal_pqr`
--
ALTER TABLE `canal_pqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoria_dir`
--
ALTER TABLE `categoria_dir`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `corregimiento`
--
ALTER TABLE `corregimiento`
  MODIFY `id_corregimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `imagen_dir`
--
ALTER TABLE `imagen_dir`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medio_respuesta`
--
ALTER TABLE `medio_respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1102;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idpost` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `pqr_a`
--
ALTER TABLE `pqr_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pqr_i`
--
ALTER TABLE `pqr_i`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `prensa`
--
ALTER TABLE `prensa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sub`
--
ALTER TABLE `sub`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_imagen`
--
ALTER TABLE `tipo_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_pqr`
--
ALTER TABLE `tipo_pqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitante`
--
ALTER TABLE `tipo_solicitante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_trazabilidad`
--
ALTER TABLE `tipo_trazabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `trazabilidad_a`
--
ALTER TABLE `trazabilidad_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `trazabilidad_tramite`
--
ALTER TABLE `trazabilidad_tramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`user`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`sub`) REFERENCES `post` (`idpost`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria_dir` (`idcategoria`),
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`corregimientoid`) REFERENCES `corregimiento` (`id_corregimiento`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `prensa` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`tipo_imagen`) REFERENCES `tipo_imagen` (`id`);

--
-- Filtros para la tabla `imagen_dir`
--
ALTER TABLE `imagen_dir`
  ADD CONSTRAINT `imagen_dir_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `empresa` (`idproducto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`areaid`) REFERENCES `areas` (`id`);

--
-- Filtros para la tabla `pqr_a`
--
ALTER TABLE `pqr_a`
  ADD CONSTRAINT `pqr_a_ibfk_10` FOREIGN KEY (`canal`) REFERENCES `canal_pqr` (`id`),
  ADD CONSTRAINT `pqr_a_ibfk_11` FOREIGN KEY (`responsable`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `pqr_a_ibfk_12` FOREIGN KEY (`user`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `pqr_a_ibfk_5` FOREIGN KEY (`area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `pqr_a_ibfk_8` FOREIGN KEY (`solicitud`) REFERENCES `tipo_pqr` (`id`),
  ADD CONSTRAINT `pqr_a_ibfk_9` FOREIGN KEY (`respuesta`) REFERENCES `medio_respuesta` (`id`);

--
-- Filtros para la tabla `pqr_i`
--
ALTER TABLE `pqr_i`
  ADD CONSTRAINT `pqr_i_ibfk_1` FOREIGN KEY (`pais`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_10` FOREIGN KEY (`canal`) REFERENCES `canal_pqr` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_11` FOREIGN KEY (`responsable`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_12` FOREIGN KEY (`user`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `pqr_i_ibfk_2` FOREIGN KEY (`dep`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `pqr_i_ibfk_3` FOREIGN KEY (`mun`) REFERENCES `municipios` (`id_municipio`),
  ADD CONSTRAINT `pqr_i_ibfk_4` FOREIGN KEY (`corr`) REFERENCES `corregimiento` (`id_corregimiento`),
  ADD CONSTRAINT `pqr_i_ibfk_5` FOREIGN KEY (`area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_6` FOREIGN KEY (`solicitante`) REFERENCES `tipo_solicitante` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_7` FOREIGN KEY (`tipo_doc`) REFERENCES `tipo_identificacion` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_8` FOREIGN KEY (`solicitud`) REFERENCES `tipo_pqr` (`id`),
  ADD CONSTRAINT `pqr_i_ibfk_9` FOREIGN KEY (`respuesta`) REFERENCES `medio_respuesta` (`id`),
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`pais`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `tramites_ibfk_10` FOREIGN KEY (`canal`) REFERENCES `canal_pqr` (`id`),
  ADD CONSTRAINT `tramites_ibfk_11` FOREIGN KEY (`responsable`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `tramites_ibfk_2` FOREIGN KEY (`dep`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `tramites_ibfk_3` FOREIGN KEY (`mun`) REFERENCES `municipios` (`id_municipio`),
  ADD CONSTRAINT `tramites_ibfk_4` FOREIGN KEY (`corr`) REFERENCES `corregimiento` (`id_corregimiento`),
  ADD CONSTRAINT `tramites_ibfk_5` FOREIGN KEY (`area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `tramites_ibfk_6` FOREIGN KEY (`solicitante`) REFERENCES `tipo_solicitante` (`id`),
  ADD CONSTRAINT `tramites_ibfk_7` FOREIGN KEY (`tipo_doc`) REFERENCES `tipo_identificacion` (`id`),
  ADD CONSTRAINT `tramites_ibfk_8` FOREIGN KEY (`solicitud`) REFERENCES `tipo_pqr` (`id`),
  ADD CONSTRAINT `tramites_ibfk_9` FOREIGN KEY (`respuesta`) REFERENCES `medio_respuesta` (`id`);

--
-- Filtros para la tabla `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD CONSTRAINT `trazabilidad_ibfk_1` FOREIGN KEY (`tipo_t`) REFERENCES `tipo_trazabilidad` (`id`),
  ADD CONSTRAINT `trazabilidad_ibfk_2` FOREIGN KEY (`pqr_i`) REFERENCES `pqr_i` (`id`),
  ADD CONSTRAINT `trazabilidad_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `persona` (`idpersona`);

--
-- Filtros para la tabla `trazabilidad_a`
--
ALTER TABLE `trazabilidad_a`
  ADD CONSTRAINT `trazabilidad_a_ibfk_1` FOREIGN KEY (`pqr_i`) REFERENCES `pqr_a` (`id`),
  ADD CONSTRAINT `trazabilidad_a_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `trazabilidad_a_ibfk_3` FOREIGN KEY (`tipo_t`) REFERENCES `tipo_trazabilidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
