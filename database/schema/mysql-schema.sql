/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `demande_affiliation_universites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande_affiliation_universites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint(20) unsigned NOT NULL,
  `universite_id` bigint(20) unsigned NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `demande_affiliation_universites_slug_unique` (`slug`),
  KEY `demande_affiliation_universites_etudiant_id_foreign` (`etudiant_id`),
  KEY `demande_affiliation_universites_universite_id_foreign` (`universite_id`),
  CONSTRAINT `demande_affiliation_universites_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `demande_affiliation_universites_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `entreprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entreprises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secteur_activite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement_adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` date NOT NULL,
  `nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opportunities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`opportunities`)),
  `domaines_activites` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`domaines_activites`)),
  `inclusion_diversity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_support` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `selected_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entreprises_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `etudiant_universites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiant_universites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint(20) unsigned NOT NULL,
  `universite_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiant_universites_etudiant_id_foreign` (`etudiant_id`),
  KEY `etudiant_universites_universite_id_foreign` (`universite_id`),
  CONSTRAINT `etudiant_universites_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `etudiant_universites_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `etudiants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_postale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ecole_universite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domaine_etudes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau_etudes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee_obtention_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competences_techniques` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`competences_techniques`)),
  `competences_en_recherche_et_analyse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`competences_en_recherche_et_analyse`)),
  `competences_en_communication` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`competences_en_communication`)),
  `competences_langues` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`competences_langues`)),
  `autres_competences` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_professionnelle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centres_interet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_recommandation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secteur_activite_preferer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`secteur_activite_preferer`)),
  `type_emploi_recherche` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`type_emploi_recherche`)),
  `localisation_geographique_preferee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duree_disponibilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semestre_cours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacances_ete_debut` date DEFAULT NULL,
  `vacances_ete_fin` date DEFAULT NULL,
  `dates_disponibles_vacances_ete_debut` date DEFAULT NULL,
  `dates_disponibles_vacances_ete_fin` date DEFAULT NULL,
  `accessibilite` tinyint(1) NOT NULL DEFAULT 0,
  `details_accessibilite` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origine_ethnique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_socio_economique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conditions_vie_specifiques` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_belief` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orientation_sexuelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiants_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `universite_id` bigint(20) unsigned NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_universite_id_foreign` (`universite_id`),
  CONSTRAINT `events_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `experience_academiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience_academiques` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint(20) unsigned NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int(11) NOT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_academiques_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `experience_academiques_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `experience_professionnelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience_professionnelles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint(20) unsigned NOT NULL,
  `titre_poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_contrat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_professionnelles_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `experience_professionnelles_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `list_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `list_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `list_with_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_with_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `list_categorie_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `list_with_categories_slug_unique` (`slug`),
  KEY `list_with_categories_list_categorie_id_foreign` (`list_categorie_id`),
  CONSTRAINT `list_with_categories_list_categorie_id_foreign` FOREIGN KEY (`list_categorie_id`) REFERENCES `list_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `offres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre_poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_contrat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree_contrat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu_poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `description_poste` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `competences_techniques` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`competences_techniques`)),
  `competences_transversales` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`competences_transversales`)),
  `langues_requises` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`langues_requises`)),
  `avantages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_limite_candidature` date NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `offres_slug_unique` (`slug`),
  KEY `offres_entreprise_id_foreign` (`entreprise_id`),
  CONSTRAINT `offres_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `parametrages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametrages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `postulations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postulations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint(20) unsigned NOT NULL,
  `offre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `postulations_etudiant_id_foreign` (`etudiant_id`),
  KEY `postulations_offre_id_foreign` (`offre_id`),
  CONSTRAINT `postulations_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `postulations_offre_id_foreign` FOREIGN KEY (`offre_id`) REFERENCES `offres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `subscription_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_permission_subscription_id_foreign` (`subscription_id`),
  KEY `subscription_permission_permission_id_foreign` (`permission_id`),
  CONSTRAINT `subscription_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscription_permission_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `universites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_etablissement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_etablissement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_email_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_telephone_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_etudiants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaines_etudes_proposes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`domaines_etudes_proposes`)),
  `niveaux_etudes_proposes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`niveaux_etudes_proposes`)),
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `universites_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_accepted_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `userable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userable_id` bigint(20) unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` bigint(20) unsigned DEFAULT NULL,
  `subscription_started_at` timestamp NULL DEFAULT NULL,
  `subscription_expires_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_slug_unique` (`slug`),
  KEY `users_subscription_id_foreign` (`subscription_id`),
  CONSTRAINT `users_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'0000_07_14_140613_create_subscriptions_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'0001_01_01_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'0001_01_01_000001_create_cache_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2024_06_07_181743_create_permission_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2024_07_14_141617_create_subscription_permission_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2024_08_23_074301_create_universites_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2024_08_23_074328_create_etudiants_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2024_08_23_074342_create_entreprises_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2024_09_08_214732_create_events_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2024_10_09_180454_create_offre_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2024_10_11_045959_create_parametrages_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2024_10_11_050733_create_tables_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2024_10_12_083830_create_list_categories_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2024_10_12_083848_create_list_with_categories_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2024_10_13_041320_create_experience_academiques_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2024_10_13_054557_create_experience_professionnelles_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2024_10_15_180131_create_postulations_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2024_10_16_040010_add_description_to_etudiant_entreprise_universite',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2024_10_18_050443_create_demande_affiliation_universites_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2024_10_18_060326_create_etudiant_universites_table',1);
