-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para projeto
DROP DATABASE IF EXISTS `projeto`;
CREATE DATABASE IF NOT EXISTS `projeto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projeto`;

-- A despejar estrutura para tabela projeto.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data_submissao` datetime DEFAULT CURRENT_TIMESTAMP,
  `classificacao` int DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela projeto.feedback: ~0 rows (aproximadamente)
DELETE FROM `feedback`;
INSERT INTO `feedback` (`id`, `nome`, `mensagem`, `data_submissao`, `classificacao`) VALUES
	(4, 'Joao', 'Bom', '2025-12-16 23:46:09', 4),
	(5, 'José', 'Podia tar melhor', '2025-12-16 23:46:20', 2),
	(6, 'Andre', 'Muito Bom', '2025-12-16 23:46:27', 5),
	(7, 'Filipa', 'Mau', '2025-12-16 23:46:35', 1),
	(8, 'Pedro', 'Gostei', '2025-12-16 23:46:46', 4);

-- A despejar estrutura para tabela projeto.perguntas_quiz
DROP TABLE IF EXISTS `perguntas_quiz`;
CREATE TABLE IF NOT EXISTS `perguntas_quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idioma` varchar(2) NOT NULL,
  `nivel` varchar(2) NOT NULL,
  `pergunta` text NOT NULL,
  `opcao_a` varchar(255) NOT NULL,
  `opcao_b` varchar(255) NOT NULL,
  `opcao_c` varchar(255) NOT NULL,
  `opcao_d` varchar(255) NOT NULL,
  `resposta_correta` char(1) NOT NULL,
  `criado_em` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela projeto.perguntas_quiz: ~100 rows (aproximadamente)
DELETE FROM `perguntas_quiz`;
INSERT INTO `perguntas_quiz` (`id`, `idioma`, `nivel`, `pergunta`, `opcao_a`, `opcao_b`, `opcao_c`, `opcao_d`, `resposta_correta`, `criado_em`) VALUES
	(1, 'en', 'A1', '“Good morning” significa:', 'Boa noite', 'Boa tarde', 'Bom dia', 'Adeus', 'c', '2025-12-15 20:00:48'),
	(2, 'en', 'A1', 'Completar a frase: I ___ a student.', 'are', 'am', 'is', 'be', 'b', '2025-12-15 20:00:48'),
	(3, 'en', 'A1', 'Qual a tradução de: “Como estás?”', 'How are you?', 'Who are you?', 'Where are you?', 'What are you?', 'a', '2025-12-15 20:00:48'),
	(4, 'en', 'A1', '“My name is John” quer dizer:', 'Eu sou o John', 'O meu nome é John', 'O meu amigo é o John', 'Eu gosto do John', 'b', '2025-12-15 20:00:48'),
	(5, 'en', 'A1', 'Completar a frase: She ___ from Portugal.', 'is', 'are', 'am', 'be', 'a', '2025-12-15 20:00:48'),
	(6, 'en', 'A2', 'Qual a tradução de: “I’m going to the supermarket.”', 'Eu venho do supermercado', 'Eu gosto do supermercado', 'Eu vou ao supermercado', 'O supermercado é longe', 'c', '2025-12-15 20:00:48'),
	(7, 'en', 'A2', 'Completar a frase: We ___ football every weekend.', 'playing', 'plays', 'play', 'played', 'c', '2025-12-15 20:00:48'),
	(8, 'en', 'A2', '“What time is it?” significa:', 'Que horas são?', 'Onde estás?', 'Como estás?', 'Que dia é hoje?', 'a', '2025-12-15 20:00:48'),
	(9, 'en', 'A2', 'Qual a tradução de: “Eu gosto de café.”', 'I hate coffee', 'I like coffee', 'I want coffee', 'Coffee is good', 'b', '2025-12-15 20:00:48'),
	(10, 'en', 'A2', 'Completar a frase: They ___ very happy today.', 'am', 'are', 'is', 'be', 'b', '2025-12-15 20:00:48'),
	(11, 'en', 'B1', '“She has already finished her homework.” →', 'Ela já terminou o trabalho de casa', 'Ela vai terminar o trabalho de casa', 'Ela ainda não terminou', 'Ela está a fazer o trabalho', 'a', '2025-12-15 20:00:48'),
	(12, 'en', 'B1', 'Completar a frase: If it ___ tomorrow, we’ll stay at home.', 'rains', 'rained', 'rain', 'raining', 'a', '2025-12-15 20:00:48'),
	(13, 'en', 'B1', 'Qual a tradução de: “Eu nunca estive em Londres.”', 'I have never been to London', 'I will go to London', 'I am in London', 'I was in London', 'a', '2025-12-15 20:00:48'),
	(14, 'en', 'B1', '“He’s looking for his keys.” significa:', 'Ele está a olhar para as chaves', 'Ele está à procura das chaves', 'Ele encontrou as chaves', 'Ele perdeu as chaves', 'b', '2025-12-15 20:00:48'),
	(15, 'en', 'B1', 'Completar a frase: I ___ my phone if I don’t hurry.', 'will forget', 'forgot', 'forgets', 'forgetting', 'a', '2025-12-15 20:00:48'),
	(16, 'en', 'B2', 'Qual a tradução de: “She managed to solve the problem.”', 'Ela tentou resolver o problema', 'Ela conseguiu resolver o problema', 'Ela não resolveu o problema', 'O problema era difícil', 'b', '2025-12-15 20:00:48'),
	(17, 'en', 'B2', 'Completar a frase: If I ___ known, I would have helped you.', 'knew', 'had known', 'know', 'have known', 'b', '2025-12-15 20:00:48'),
	(18, 'en', 'B2', '“They were supposed to arrive at 8.” →', 'Era suposto eles chegarem às 8', 'Eles chegaram às 8', 'Eles sempre chegam às 8', 'Eles não podiam chegar às 8', 'a', '2025-12-15 20:00:48'),
	(19, 'en', 'B2', 'Qual a tradução de: “Ele desistiu de fumar.”', 'He started smoking', 'He likes smoking', 'He gave up smoking', 'He smokes a lot', 'c', '2025-12-15 20:00:48'),
	(20, 'en', 'B2', 'Completar a frase: By the time we arrived, the film ___.', 'starts', 'has started', 'had started', 'will start', 'c', '2025-12-15 20:00:48'),
	(21, 'en', 'C1', '“Despite being tired, she finished the marathon.” →', 'Apesar de estar cansada, ela terminou', 'Ela estava cansada porque terminou', 'Embora não estivesse cansada, terminou', 'Ela não terminou a maratona', 'a', '2025-12-15 20:00:48'),
	(22, 'en', 'C1', 'Completar a frase: Had I known about the party, I ___ gone.', 'would have', 'will have', 'had', 'would', 'a', '2025-12-15 20:00:48'),
	(23, 'en', 'C1', 'Qual a tradução de: “Eles comportaram-se como se fossem os donos do lugar.”', 'They behaved as if they owned the place', 'They are the owners of the place', 'They bought the place', 'They do not like the place', 'a', '2025-12-15 20:00:48'),
	(24, 'en', 'C1', '“It’s high time you studied for the exam.” →', 'Já está mais que na hora de estudares', 'É tarde para o exame', 'É a primeira vez que estudas', 'Ainda tens muito tempo', 'a', '2025-12-15 20:00:48'),
	(25, 'en', 'C1', 'Completar a frase: Not only ___ the project, but she also presented it perfectly.', 'did she finish', 'she finished', 'finished she', 'has she finish', 'a', '2025-12-15 20:00:48'),
	(26, 'al', 'A1', '“Guten Morgen” significa:', 'Bom dia', 'Boa noite', 'Boa tarde', 'Adeus', 'a', '2025-12-15 20:03:04'),
	(27, 'al', 'A1', 'Completar a frase: Ich ___ Maria.', 'ist', 'bin', 'bist', 'seid', 'b', '2025-12-15 20:03:04'),
	(28, 'al', 'A1', 'Qual a tradução de: “Como estás?”', 'Wie heißt du?', 'Wie geht es dir?', 'Wo bist du?', 'Was machst du?', 'b', '2025-12-15 20:03:04'),
	(29, 'al', 'A1', '“Danke schön” quer dizer:', 'Muito obrigado', 'Por favor', 'De nada', 'Até logo', 'a', '2025-12-15 20:03:04'),
	(30, 'al', 'A1', 'Completar a frase: Er ___ einen Hund.', 'hat', 'habe', 'haben', 'bist', 'a', '2025-12-15 20:03:04'),
	(31, 'al', 'A2', 'Qual a tradução de: “Ich gehe in die Schule.”', 'Eu gosto da escola', 'Eu estou na escola', 'Eu vou à escola', 'A escola é grande', 'c', '2025-12-15 20:03:04'),
	(32, 'al', 'A2', 'Completar a frase: Wir ___ jeden Tag Brot.', 'esse', 'esst', 'essen', 'isst', 'c', '2025-12-15 20:03:04'),
	(33, 'al', 'A2', '“Wie spät ist es?” significa:', 'Que horas são?', 'Onde estás?', 'Como estás?', 'Que dia é hoje?', 'a', '2025-12-15 20:03:04'),
	(34, 'al', 'A2', 'Qual a tradução de: “Eu gosto de música.”', 'Ich mag Musik', 'Ich höre Musik', 'Musik ist gut', 'Ich hasse Musik', 'a', '2025-12-15 20:03:04'),
	(35, 'al', 'A2', 'Completar a frase: Sie ___ sehr glücklich heute.', 'sind', 'bist', 'ist', 'bin', 'a', '2025-12-15 20:03:04'),
	(36, 'al', 'B1', '“Sie hat ihre Hausaufgaben schon gemacht.” →', 'Ela já fez os trabalhos de casa', 'Ela vai fazer os trabalhos', 'Ela ainda não fez os trabalhos', 'Ela está a fazer os trabalhos', 'a', '2025-12-15 20:03:04'),
	(37, 'al', 'B1', 'Completar a frase: Wenn es morgen ___, bleiben wir zu Hause.', 'regnet', 'regnete', 'regnen', 'geregnet', 'a', '2025-12-15 20:03:04'),
	(38, 'al', 'B1', 'Qual a tradução de: “Eu nunca estive em Berlim.”', 'Ich bin noch nie in Berlin gewesen', 'Ich war schon in Berlin', 'Ich fahre nach Berlin', 'Berlin ist schön', 'a', '2025-12-15 20:03:04'),
	(39, 'al', 'B1', '“Er sucht seine Schlüssel.” significa:', 'Ele está à procura das chaves', 'Ele encontrou as chaves', 'Ele perdeu as chaves', 'Ele olha para as chaves', 'a', '2025-12-15 20:03:04'),
	(40, 'al', 'B1', 'Completar a frase: Ich ___ mein Handy vergessen, wenn ich mich nicht beeile.', 'werde', 'habe', 'bin', 'war', 'a', '2025-12-15 20:03:04'),
	(41, 'al', 'B2', 'Qual a tradução de: “Sie hat es geschafft, das Problem zu lösen.”', 'Ela tentou resolver o problema', 'Ela conseguiu resolver o problema', 'Ela tem um problema', 'O problema foi resolvido', 'b', '2025-12-15 20:03:04'),
	(42, 'al', 'B2', 'Completar a frase: Wenn ich das ___ hätte, hätte ich dir geholfen.', 'gewusst', 'wissen', 'wusste', 'weiß', 'a', '2025-12-15 20:03:04'),
	(43, 'al', 'B2', '“Sie sollten um acht Uhr ankommen.” →', 'Era suposto eles chegarem às oito', 'Eles chegaram às oito', 'Eles vão chegar às oito', 'Eles nunca chegam às oito', 'a', '2025-12-15 20:03:04'),
	(44, 'al', 'B2', 'Qual a tradução de: “Ele desistiu de fumar.”', 'Er hat mit dem Rauchen aufgehört', 'Er raucht gerne', 'Er hat angefangen zu rauchen', 'Er darf nicht rauchen', 'a', '2025-12-15 20:03:04'),
	(45, 'al', 'B2', 'Completar a frase: Als wir ankamen, ___ der Film schon angefangen.', 'hatte', 'hat', 'wird', 'haben', 'a', '2025-12-15 20:03:04'),
	(46, 'al', 'C1', '“Trotz der Müdigkeit beendete sie den Marathon.” →', 'Apesar de estar cansada, ela terminou', 'Ela não terminou o maratona', 'Ela começou o maratona', 'Ela estava cansada e desistiu', 'a', '2025-12-15 20:03:04'),
	(47, 'al', 'C1', 'Completar a frase: Hätte ich von der Party gewusst, ___ ich gegangen.', 'wäre', 'bin', 'war', 'werde', 'a', '2025-12-15 20:03:04'),
	(48, 'al', 'C1', 'Qual a tradução de: “Eles comportaram-se como se fossem os donos do lugar.”', 'Sie benahmen sich, als wären sie die Besitzer', 'Sie sind die Besitzer', 'Sie haben den Ort gekauft', 'Sie mögen diesen Ort nicht', 'a', '2025-12-15 20:03:04'),
	(49, 'al', 'C1', '“Es ist höchste Zeit, dass du für die Prüfung lernst.” →', 'Já está mais que na hora de estudares', 'É tarde demais para estudar', 'Ainda é cedo para o exame', 'Tens muito tempo ainda', 'a', '2025-12-15 20:03:04'),
	(50, 'al', 'C1', 'Completar a frase: Nicht nur ___ sie das Projekt beendet...', 'hat', 'hatte', 'wurde', 'war', 'a', '2025-12-15 20:03:04'),
	(76, 'fr', 'A1', '“Bonjour” significa:', 'Boa noite', 'Adeus', 'Bom dia', 'Obrigado', 'c', '2025-12-15 20:07:44'),
	(77, 'fr', 'A1', 'Completar a frase: Je ___ Marie.', 'suis', 'm’appelle', 'est', 'es', 'b', '2025-12-15 20:07:44'),
	(78, 'fr', 'A1', 'Qual a tradução de: “Como estás?”', 'Comment ça va ?', 'Qui es-tu ?', 'Où es-tu ?', 'Quel âge as-tu ?', 'a', '2025-12-15 20:07:44'),
	(79, 'fr', 'A1', '“Merci beaucoup” quer dizer:', 'Muito obrigado', 'Bom apetite', 'Até logo', 'Por favor', 'a', '2025-12-15 20:07:44'),
	(80, 'fr', 'A1', 'Completar a frase: Il ___ un chat.', 'a', 'est', 'as', 'ai', 'a', '2025-12-15 20:07:44'),
	(81, 'fr', 'A2', 'Qual a tradução de: “Je vais à l’école.”', 'Gosto da escola', 'Estou na escola', 'Vou à escola', 'A escola é bonita', 'c', '2025-12-15 20:07:44'),
	(82, 'fr', 'A2', 'Completar a frase: Nous ___ du pain tous les jours.', 'manges', 'mange', 'mangeons', 'mangent', 'c', '2025-12-15 20:07:44'),
	(83, 'fr', 'A2', '“Quelle heure est-il ?” significa:', 'Que horas são?', 'Onde estás?', 'Como estás?', 'Que dia é hoje?', 'a', '2025-12-15 20:07:44'),
	(84, 'fr', 'A2', 'Qual a tradução de: “Eu gosto de música.”', 'Je déteste la musique', 'J’aime la musique', 'Je joue de la musique', 'La musique est forte', 'b', '2025-12-15 20:07:44'),
	(85, 'fr', 'A2', 'Completar a frase: Elles ___ très contentes.', 'suis', 'sont', 'est', 'es', 'b', '2025-12-15 20:07:44'),
	(86, 'fr', 'B1', '“Elle a déjà fini ses devoirs.” →', 'Ela já terminou os trabalhos de casa', 'Ela vai terminar os trabalhos', 'Ela ainda não terminou', 'Ela está a fazer os trabalhos', 'a', '2025-12-15 20:07:44'),
	(87, 'fr', 'B1', 'Completar a frase: S’il ___ demain, nous resterons à la maison.', 'pleut', 'pleuvait', 'pleuvoir', 'pleu', 'a', '2025-12-15 20:07:44'),
	(88, 'fr', 'B1', 'Qual a tradução de: “Eu nunca estive em Paris.”', 'Je ne suis jamais allé à Paris', 'Je vais à Paris', 'Je suis à Paris', 'J’aime Paris', 'a', '2025-12-15 20:07:44'),
	(89, 'fr', 'B1', '“Il cherche ses clés.” significa:', 'Ele está à procura das chaves', 'Ele encontrou as chaves', 'Ele perdeu as chaves', 'Ele olha para as chaves', 'a', '2025-12-15 20:07:44'),
	(90, 'fr', 'B1', 'Completar a frase: Je ___ mon téléphone si je ne me dépêche pas.', 'vais oublier', 'oublié', 'oublie', 'oublies', 'a', '2025-12-15 20:07:44'),
	(91, 'fr', 'B2', 'Qual a tradução de: “Elle a réussi à résoudre le problème.”', 'Ela conseguiu resolver o problema', 'Ela tentou resolver', 'Ela criou um problema', 'O problema é fácil', 'a', '2025-12-15 20:07:44'),
	(92, 'fr', 'B2', 'Completar a frase: Si j’___ su, je t’aurais aidé.', 'avais', 'ai', 'avait', 'sais', 'a', '2025-12-15 20:07:44'),
	(93, 'fr', 'B2', '“Ils devaient arriver à huit heures.” →', 'Era suposto eles chegarem às oito', 'Eles chegaram às oito', 'Eles vão chegar às oito', 'Eles nunca chegam às oito', 'a', '2025-12-15 20:07:44'),
	(94, 'fr', 'B2', 'Qual a tradução de: “Ele desistiu de fumar.”', 'Il a commencé à fumer', 'Il a arrêté de fumer', 'Il aime fumer', 'Il fume beaucoup', 'b', '2025-12-15 20:07:44'),
	(95, 'fr', 'B2', 'Completar a frase: Quand nous sommes arrivés, le film ___.', 'commence', 'avait commencé', 'a commencé', 'commencera', 'b', '2025-12-15 20:07:44'),
	(96, 'fr', 'C1', '“Bien qu’elle soit fatiguée, elle a terminé le marathon.” →', 'Apesar de estar cansada, ela terminou', 'Ela estava cansada porque terminou', 'Ela não terminou', 'Ela começou o maratona', 'a', '2025-12-15 20:07:44'),
	(97, 'fr', 'C1', 'Completar a frase: Si j’avais su pour la fête, j’___ venu.', 'serais', 'suis', 'avais', 'aurais', 'a', '2025-12-15 20:07:44'),
	(98, 'fr', 'C1', 'Qual a tradução de: “Eles comportaram-se como se fossem os donos do lugar.”', 'Ils se sont comportés comme s’ils étaient les propriétaires', 'Ils sont les propriétaires', 'Ils ont acheté le lieu', 'Ils n’aiment pas le lieu', 'a', '2025-12-15 20:07:44'),
	(99, 'fr', 'C1', '“Il est grand temps que tu étudies pour l’examen.” →', 'Já está mais que na hora de estudares', 'É tarde demais para o exame', 'É cedo para estudar', 'Tens muito tempo ainda', 'a', '2025-12-15 20:07:44'),
	(100, 'fr', 'C1', 'Completar a frase: Non seulement ___ le projet, mais elle l’a aussi présenté...', 'a-t-elle fini', 'elle a fini', 'fini-elle', 'a-t-elle finie', 'a', '2025-12-15 20:07:44'),
	(101, 'es', 'A1', '“Buenos días” significa:', 'Bom dia', 'Boa tarde', 'Boa noite', 'Adeus', 'a', '2025-12-15 20:07:44'),
	(102, 'es', 'A1', 'Completar a frase: Yo ___ un estudiante.', 'eres', 'soy', 'es', 'está', 'b', '2025-12-15 20:07:44'),
	(103, 'es', 'A1', 'Qual a tradução de: “Como estás?”', '¿Cómo estás?', '¿Quién eres?', '¿Dónde estás?', '¿Qué haces?', 'a', '2025-12-15 20:07:44'),
	(104, 'es', 'A1', '“Gracias” quer dizer:', 'Obrigado', 'Por favor', 'Desculpa', 'Olá', 'a', '2025-12-15 20:07:44'),
	(105, 'es', 'A1', 'Completar a frase: Ella ___ un gato.', 'tiene', 'tengo', 'tener', 'tienes', 'a', '2025-12-15 20:07:44'),
	(106, 'es', 'A2', 'Qual a tradução de: “Voy al supermercado.”', 'Vou ao supermercado', 'Venho do supermercado', 'Gosto do supermercado', 'O supermercado é longe', 'a', '2025-12-15 20:07:44'),
	(107, 'es', 'A2', 'Completar a frase: Nosotros ___ fútbol todos los domingos.', 'jugamos', 'juegan', 'juega', 'jugar', 'a', '2025-12-15 20:07:44'),
	(108, 'es', 'A2', '“¿Qué hora es?” significa:', 'Que horas são?', 'Onde estás?', 'Como estás?', 'Que dia é hoje?', 'a', '2025-12-15 20:07:44'),
	(109, 'es', 'A2', 'Qual a tradução de: “Eu gosto de café.”', 'Me gusta el café', 'Odio el café', 'Quiero café', 'El café es malo', 'a', '2025-12-15 20:07:44'),
	(110, 'es', 'A2', 'Completar a frase: Ellos ___ muy contentos hoy.', 'es', 'están', 'está', 'sois', 'b', '2025-12-15 20:07:44'),
	(111, 'es', 'B1', '“Ella ya ha terminado los deberes.” →', 'Ela já terminou os trabalhos de casa', 'Ela vai terminar os trabalhos', 'Ela ainda não terminou', 'Ela está a fazer os trabalhos', 'a', '2025-12-15 20:07:44'),
	(112, 'es', 'B1', 'Completar a frase: Si ___ mañana, nos quedaremos en casa.', 'llueve', 'lloverá', 'llovió', 'lloviendo', 'a', '2025-12-15 20:07:44'),
	(113, 'es', 'B1', 'Qual a tradução de: “Eu nunca estive em Madrid.”', 'Nunca he estado en Madrid', 'Iré a Madrid', 'Estoy en Madrid', 'Me gusta Madrid', 'a', '2025-12-15 20:07:44'),
	(114, 'es', 'B1', '“Está buscando sus llaves.” significa:', 'Está à procura das chaves', 'Encontrou as chaves', 'Perdeu as chaves', 'Está a olhar para as chaves', 'a', '2025-12-15 20:07:44'),
	(115, 'es', 'B1', 'Completar a frase: Olvidaré mi teléfono si no me ___.', 'doy prisa', 'doy', 'das prisa', 'doy rápido', 'a', '2025-12-15 20:07:44'),
	(116, 'es', 'B2', 'Qual a tradução de: “Ella logró resolver el problema.”', 'Ela conseguiu resolver o problema', 'Ela tentou resolver', 'Ela não resolveu', 'O problema era grande', 'a', '2025-12-15 20:07:44'),
	(117, 'es', 'B2', 'Completar a frase: Si lo ___ sabido, te habría ayudado.', 'hubiera', 'ha', 'tenía', 'saber', 'a', '2025-12-15 20:07:44'),
	(118, 'es', 'B2', '“Se suponía que llegarían a las ocho.” →', 'Era suposto eles chegarem às oito', 'Eles chegaram às oito', 'Eles vão chegar às oito', 'Eles nunca chegam às oito', 'a', '2025-12-15 20:07:44'),
	(119, 'es', 'B2', 'Qual a tradução de: “Ele desistiu de fumar.”', 'Dejó de fumar', 'Empezó a fumar', 'Le gusta fumar', 'Fuma mucho', 'a', '2025-12-15 20:07:44'),
	(120, 'es', 'B2', 'Completar a frase: Cuando llegamos, la película ___.', 'empieza', 'había empezado', 'empezó', 'empezará', 'b', '2025-12-15 20:07:44'),
	(121, 'es', 'C1', '“A pesar de estar cansada, terminó la maratón.” →', 'Apesar de estar cansada, ela terminou', 'Ela estava cansada porque terminou', 'Ela não terminou', 'Ela começou a maratona', 'a', '2025-12-15 20:07:44'),
	(122, 'es', 'C1', 'Completar a frase: Si hubiera sabido de la fiesta, ___ ido.', 'habría', 'hubiera', 'fui', 'habrá', 'a', '2025-12-15 20:07:44'),
	(123, 'es', 'C1', 'Qual a tradução de: “Eles comportaram-se como se fossem os donos do lugar.”', 'Se comportaron como si fueran los dueños', 'Son los dueños', 'Compraron el lugar', 'No les gusta el lugar', 'a', '2025-12-15 20:07:44'),
	(124, 'es', 'C1', '“Ya es hora de que estudies para el examen.” →', 'Já está mais que na hora de estudares', 'É tarde demais para o exame', 'Ainda é cedo', 'Tens muito tempo ainda', 'a', '2025-12-15 20:07:44'),
	(125, 'es', 'C1', 'Completar a frase: No solo ___ el proyecto, sino que también...', 'terminó', 'terminó ella', 'ella terminó', 'ha terminado ella', 'a', '2025-12-15 20:07:44');

-- A despejar estrutura para tabela projeto.resultados_quiz
DROP TABLE IF EXISTS `resultados_quiz`;
CREATE TABLE IF NOT EXISTS `resultados_quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilizador` int NOT NULL,
  `idioma` varchar(2) DEFAULT NULL,
  `nivel` varchar(2) DEFAULT NULL,
  `respostas_certas` int DEFAULT NULL,
  `respostas_erradas` int DEFAULT NULL,
  `data_realizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_utilizador` (`id_utilizador`),
  CONSTRAINT `resultados_quiz_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizadores` (`id_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela projeto.resultados_quiz: ~4 rows (aproximadamente)
DELETE FROM `resultados_quiz`;
INSERT INTO `resultados_quiz` (`id`, `id_utilizador`, `idioma`, `nivel`, `respostas_certas`, `respostas_erradas`, `data_realizacao`) VALUES
	(1, 2, 'en', 'A1', 5, 0, '2025-12-16 17:39:50'),
	(2, 2, 'en', 'A2', 0, 5, '2025-12-16 17:39:57'),
	(4, 1, 'en', 'A1', 0, 5, '2025-12-16 22:38:31'),
	(5, 1, 'en', 'A1', 0, 5, '2025-12-16 23:40:24');

-- A despejar estrutura para tabela projeto.utilizadores
DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id_utilizador` int NOT NULL AUTO_INCREMENT,
  `nome_utilizador` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `tipo_utilizador` enum('user','admin') DEFAULT 'user',
  `data_registo` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_utilizador`),
  UNIQUE KEY `nome_utilizador` (`nome_utilizador`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela projeto.utilizadores: ~2 rows (aproximadamente)
DELETE FROM `utilizadores`;
INSERT INTO `utilizadores` (`id_utilizador`, `nome_utilizador`, `email`, `password_hash`, `tipo_utilizador`, `data_registo`) VALUES
	(1, 'admin', 'admin@polyglotplay.com', '$2y$10$ylCuiyG95N8hd3cwIHQdqOvvtNvywjGIgap/hbxqOsiCqXO.dacKa', 'admin', '2025-12-15 18:10:57'),
	(2, 'joao', 'joao@gmail.com', '$2y$10$dYZL7cCf6mgPbjvmy9SJ2uz0BirjVOj3HWybfJWa9CpW7ykOhrLW2', 'user', '2025-12-15 18:50:11');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
