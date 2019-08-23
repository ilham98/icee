-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.3.15-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk icee
CREATE DATABASE IF NOT EXISTS `icee` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `icee`;

-- membuang struktur untuk table icee.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `student_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minute` tinyint(4) DEFAULT NULL,
  `partner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`assignment_id`),
  KEY `assignments_student_id_foreign` (`student_id`),
  KEY `assignments_topic_id_foreign` (`topic_id`),
  CONSTRAINT `assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `assignments_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.assignments: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` (`assignment_id`, `student_id`, `topic_id`, `student_comment`, `teacher_comment`, `minute`, `partner`, `week`) VALUES
	(1, 17, 2, 'why in british they called theatre and in america they called it cinema', 'cause it depends on region. somehow it\'s awesome to know some other words', 15, 'Ilham', 1),
	(2, 32, 3, 'why in british we called it theatre and in americ we called in cinema', 'lorem ipsum', 15, 'ilham', 1);
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;

-- membuang struktur untuk table icee.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `attendance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `week` tinyint(4) NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `attendances_student_id_foreign` (`student_id`),
  CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.attendances: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` (`attendance_id`, `week`, `status`, `type`, `student_id`) VALUES
	(1, 1, 'P', 'A', 17),
	(2, 1, 'E', 'A', 32);
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;

-- membuang struktur untuk table icee.configurations
CREATE TABLE IF NOT EXISTS `configurations` (
  `configuration_id` int(11) NOT NULL,
  `current_year` year(4) NOT NULL,
  `current_semester` tinyint(4) NOT NULL,
  `registration_open` date NOT NULL,
  `registration_close` date NOT NULL,
  PRIMARY KEY (`configuration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.configurations: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` (`configuration_id`, `current_year`, `current_semester`, `registration_open`, `registration_close`) VALUES
	(1, '2019', 1, '2019-08-10', '2019-08-30');
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;

-- membuang struktur untuk table icee.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.departments: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`department_id`, `name`) VALUES
	(1, 'Information Technology'),
	(2, 'Architecture'),
	(3, 'Threatre'),
	(4, 'Chemistry'),
	(5, 'French Literature');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- membuang struktur untuk table icee.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.migrations: ~14 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_07_31_081450_create_departments_table', 1),
	(2, '2019_07_31_081505_create_times_table', 1),
	(3, '2019_07_31_081535_create_users_table', 1),
	(4, '2019_07_31_081536_create_teachers_table', 1),
	(5, '2019_07_31_081550_create_students_table', 1),
	(6, '2019_07_31_081652_create_attedances_table', 1),
	(7, '2019_07_31_081717_create_student_teacher_table', 1),
	(8, '2019_07_31_081748_create_topics_table', 1),
	(9, '2019_07_31_081749_create_assignments_table', 1),
	(10, '2019_07_31_081806_create_vocabularies_table', 1),
	(11, '2019_07_31_081825_create_schedules_table', 1),
	(12, '2019_07_31_081833_create_news_table', 1),
	(13, '2019_08_05_182528_create_configurations_table', 1),
	(14, '2019_08_09_112434_create_teacher_level_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table icee.news
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.news: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`news_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
	(1, 'ICEE 2019 English Immersion Camp at POLNES', 'The International Center for English Excellence (ICEE) in collaboration with Politeknik Negeri Samarinda (POLNES) is pleased to announce EXPLORE! - English Immersion Camp 2019 (July 2-5, 8-11).\r\n\r\n \r\n\r\nDuring EXPLORE! you will see a dramatic improvement in your personal English speaking ability and self-confidence as you immerse in the English language with native English speakers from around the world--USA, UK, Singapore, The Philippines and more!  Through games, competitions, classroom study, and all around fun using the ICEE patented method, your conversational English skills and techniques will be strengthen.\r\n\r\n \r\n\r\nAlong with a once-in-a-lifetime experience, as a registered participant you will receive an ICEE English certificate, an English lesson book, an ICEE EXPLORE! camp shirt, and daily lunch.\r\n\r\nRegistration for EXPLORE! begins April 22 and ends May 10. For more information please email us at admin@icee-network.org.', '2019-08-11 02:27:45', '2019-08-11 02:27:45');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- membuang struktur untuk table icee.schedules
CREATE TABLE IF NOT EXISTS `schedules` (
  `student_id` int(10) unsigned NOT NULL,
  `time_id` int(10) unsigned NOT NULL,
  KEY `schedules_student_id_foreign` (`student_id`),
  KEY `schedules_time_id_foreign` (`time_id`),
  CONSTRAINT `schedules_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `schedules_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.schedules: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` (`student_id`, `time_id`) VALUES
	(17, 1),
	(17, 8),
	(32, 1),
	(32, 14);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- membuang struktur untuk table icee.students
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_number` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year(4) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_department_id_foreign` (`department_id`),
  KEY `students_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  CONSTRAINT `students_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.students: ~14 rows (lebih kurang)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`student_id`, `student_number`, `name`, `note`, `reason`, `year`, `semester`, `phone_number`, `level`, `interview_date`, `user_id`, `department_id`, `teacher_id`) VALUES
	(17, '16243001', 'Alfred Waring', 'Good in articulation', 'lorem ipsum', '2019', 1, '982-742-2953', '4', NULL, 6, 2, 3),
	(18, '16243002', 'Fredrick Stevenson', NULL, 'lorem ipsum', '2019', 1, '982-574-2393', NULL, NULL, 7, 2, NULL),
	(19, '16243004', 'Christina Linton', NULL, 'lorem ipsum', '2019', 1, '983-234-5434', NULL, NULL, 8, 2, NULL),
	(20, '16243005', 'Courtney Annely', NULL, 'lorem ipsum', '2019', 1, '938-132-1058', NULL, NULL, 9, 2, NULL),
	(21, '16243007', 'Steven Davidson', NULL, 'lorem ipsum', '2019', 1, '759-383-5892', NULL, NULL, 10, 2, NULL),
	(22, '17654001', 'Rebekah Horton', NULL, 'lorem ipsum', '2019', 1, '850-274-3722', NULL, NULL, 11, 3, NULL),
	(23, '17654002', 'Sara Paine', NULL, 'lorem ipsum', '2019', 1, '867-234-3855', NULL, NULL, 12, 3, NULL),
	(24, '17654003', 'Robert Jameston', NULL, 'lorem ipsum', '2019', 1, '523-766-8695', NULL, NULL, 17, 3, NULL),
	(25, '17654004', 'Raidon Verris', NULL, 'lorem ipsum', '2019', 1, '578-283-2398', NULL, NULL, 18, 3, NULL),
	(26, '17654005', 'Grace Hall', NULL, 'lorem ipsum', '2019', 1, '968-239-3592', NULL, NULL, 19, 3, NULL),
	(27, '18243001', 'Emily Maine', NULL, 'lorem ipsum', '2019', 1, '295-923-6968', NULL, NULL, 20, 4, NULL),
	(28, '18243002', 'Dan Worstey', NULL, 'lorem ipsum', '2019', 1, '230-259-5938', NULL, NULL, 21, 4, NULL),
	(29, '16615002', 'Wibisono', NULL, 'i love english', '2019', 1, '0987654233h', NULL, NULL, 22, 1, NULL),
	(32, '12345678', 'joko', 'very good', 'lorem ipsum', '2019', 1, '0976324', '1', NULL, 26, 2, 5),
	(35, '16615019', 'fsdfsd', NULL, 'sfsdfsd', '2019', 1, '213123', NULL, NULL, 30, 5, NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- membuang struktur untuk table icee.student_teacher
CREATE TABLE IF NOT EXISTS `student_teacher` (
  `student_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `student_teacher_student_id_foreign` (`student_id`),
  KEY `student_teacher_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `student_teacher_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `student_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.student_teacher: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `student_teacher` DISABLE KEYS */;
INSERT INTO `student_teacher` (`student_id`, `teacher_id`, `type`) VALUES
	(17, 5, 'A'),
	(17, 5, 'B'),
	(32, 3, 'A');
/*!40000 ALTER TABLE `student_teacher` ENABLE KEYS */;

-- membuang struktur untuk table icee.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `teachers_user_id_foreign` (`user_id`),
  CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.teachers: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`teacher_id`, `name`, `phone_number`, `user_id`) VALUES
	(3, 'Louise Hoffman', '602-335-9583', 13),
	(4, 'David Guffries', '602-958-9844', 14),
	(5, 'James Anderson', '602-584-3285', 15),
	(6, 'Elisabeth Matthews', '602-593-7612', 16);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- membuang struktur untuk table icee.teacher_level
CREATE TABLE IF NOT EXISTS `teacher_level` (
  `teacher_level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(4) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`teacher_level_id`),
  KEY `teacher_level_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `teacher_level_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.teacher_level: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `teacher_level` DISABLE KEYS */;
INSERT INTO `teacher_level` (`teacher_level_id`, `level`, `year`, `semester`, `teacher_id`) VALUES
	(2, 1, '2019', 1, 3),
	(3, 1, '2019', 1, 4),
	(4, 2, '2019', 1, 5),
	(5, 2, '2019', 1, 6);
/*!40000 ALTER TABLE `teacher_level` ENABLE KEYS */;

-- membuang struktur untuk table icee.times
CREATE TABLE IF NOT EXISTS `times` (
  `time_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.times: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` (`time_id`, `start`, `type`, `day`) VALUES
	(1, '16:00:00', 'A', '2'),
	(2, '15:00:00', 'A', '3'),
	(3, '16:00:00', 'A', '4'),
	(4, '14:25:00', 'A', '5'),
	(5, '09:15:00', 'A', '6'),
	(7, '13:30:00', 'B', '2'),
	(8, '14:25:00', 'B', '2'),
	(9, '16:40:00', 'B', '3'),
	(10, '13:30:00', 'B', '4'),
	(11, '14:25:00', 'B', '4'),
	(12, '16:40:00', 'B', '5'),
	(13, '08:00:00', 'B', '6'),
	(14, '11:10:00', 'B', '6');
/*!40000 ALTER TABLE `times` ENABLE KEYS */;

-- membuang struktur untuk table icee.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `week` tinyint(4) NOT NULL,
  `time_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topics_time_id_foreign` (`time_id`),
  KEY `topics_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `topics_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  CONSTRAINT `topics_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.topics: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`topic_id`, `conversation`, `year`, `semester`, `week`, `time_id`, `teacher_id`) VALUES
	(2, 'Best movie when you was kid', '2019', 1, 1, 1, 5),
	(3, 'how\'s your holiday', '2019', 1, 1, 1, 3);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

-- membuang struktur untuk table icee.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.users: ~19 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
	(1, 'admin@gmail.com', '$2y$10$uYmb76WBquhVrNTw.fRrmukopMo6PaAHk/nYYWKJK0LrPDdJ/RQwG', '1'),
	(6, 'alfred@gmail.com', '$2y$10$bVi7f38WNlc1jlV9mswAjOrj6iBG9sqrCjJ18KODUpdYfJK34/HIq', '3'),
	(7, 'fredrick@gmail.com', '$2y$10$oaSlI7k9u0xDESspCXFiXOfoc9JFbgHhoXMb54izw.sn1MLkeeJjy', '3'),
	(8, 'christina@gmail.com', '$2y$10$3/HbaAgmaqHbfFxePAQz1uvjienNoFjK19.4hoG7z9hwQp35DSESW', '3'),
	(9, 'courtney@gmail.com', '$2y$10$FZ.ETqtnjRRwXnwN.zdxjenjXlwi6kmByyVLiVGycX4cbIIQWmBfW', '3'),
	(10, 'steven@gmail.com', '$2y$10$TRtHY70XaSSLL91AyoIo/uxSPLUWbBnpL4kGV9dxtxQWxSvNmyOWW', '3'),
	(11, 'rebekah@gmail.com', '$2y$10$UMeR3S5Xb20TyZX0ljrn5.tcBcPNseNRygN3XzLngFvGtRG3WdE9u', '3'),
	(12, 'sara@gmail.com', '$2y$10$xv.UpRI.17sZnKb/Funal.SIB9BHf0KkIuYvlWEqOYsBiXB.1fm2u', '3'),
	(13, 'louise@gmail.com', '$2y$10$AeZKxYYhiVDg5AtfCDB17ec4XwTEdLVou1PNFgjWQU73/5Aq/mtbe', '2'),
	(14, 'david@gmail.com', '$2y$10$nbslX5OiTBTBExfv97za6ONO0sufxUeHrwYnIif6d5x1K5AnnhWRW', '2'),
	(15, 'james@gmail.com', '$2y$10$E6uw4QN9dQIQPJ60TKQUhe.vx9EfkXU/sTZWO6bAL/AT4n4YT7DNq', '2'),
	(16, 'elisabeth@gmail.com', '$2y$10$yRTZ6dZSXyt8.31PunnDu.sTSPk.m9kKqCwhGGhQd6nGV1Q4PR7PK', '2'),
	(17, 'robert@gmail.com', '$2y$10$awGo/WU0w0j1aHfPQNAGl.RFNpN25u0sRY0Ag0I5k4Rwyp4qBfple', '3'),
	(18, 'raidon@gmail.com', '$2y$10$lgTaEptmspn29NJSRJrmF.mpj4m5B8E7kQFWT27XdUQk6fcoxo1FG', '3'),
	(19, 'grace@gmail.com', '$2y$10$k4yfcr1BTSZ5eu02Xn.Eoef2swjGFGgxyOC/rg2.5GUlF8GgGQe3O', '3'),
	(20, 'emily@gmail.com', '$2y$10$KvCRp8zxGEvBvMxxdZI3B.x6vcYv0aozwsmgm.CScw51GfgYPDcdi', '3'),
	(21, 'dan@gmail.com', '$2y$10$qzemYY/FquZrD9pRiVh3zOgzjhuqJh4SrODNAlQ2V0.9QfFxgYor2', '3'),
	(22, 'wibisono@gmail.com', '$2y$10$eJnV.jGwYsNL2i.AxoPx7ekDmXF1AiJi.04euOkYgX9JF57NhL1ne', '3'),
	(26, 'joko@yahoo.com', '$2y$10$/ZCS5Oju0.C8x1zHpGi.4el.bk934QF5vlVl0cINPTLotO78gW.n.', '3'),
	(30, 'dsfsd@gmail.com', '$2y$10$fVaWVmtZ25.pcAEK.im9weRZQBoSNAJOEzCokKCx1T7j8gh7RI5XW', '3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- membuang struktur untuk table icee.vocabularies
CREATE TABLE IF NOT EXISTS `vocabularies` (
  `vocabulary_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_id` int(10) unsigned NOT NULL,
  `word` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`vocabulary_id`),
  KEY `vocabularies_assignment_id_foreign` (`assignment_id`),
  CONSTRAINT `vocabularies_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel icee.vocabularies: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `vocabularies` DISABLE KEYS */;
INSERT INTO `vocabularies` (`vocabulary_id`, `assignment_id`, `word`) VALUES
	(1, 1, 'film'),
	(2, 1, 'cinematography'),
	(3, 2, 'eggyolk');
/*!40000 ALTER TABLE `vocabularies` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
