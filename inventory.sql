-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 03:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `selling_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_management`
--

CREATE TABLE `key_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `public_key` text DEFAULT NULL,
  `private_key` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_management`
--

INSERT INTO `key_management` (`id`, `user_id`, `public_key`, `private_key`, `created_at`, `updated_at`) VALUES
(36, 32, '-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs8OPbGDp2KwAA1GZLCA7\nrfLljr7FGklbfvbOOGnOFKMpE7W1VWr92t1E57rb1eQL37puw7nLaD9cEv3izHX3\nf5aekfvMSAxVGjH4NdcKs5BK4j1go3BhPXZvyck2AaRxbT7p6xywd4TnFkgVFoCg\n+6PzGcEr3OVylCWJoDpcXxbHHVRGs2XWbcznRmjENRXOOmmdN/Z4EGQNwoIMMArX\nfiENEevHb+j56Oi9ZnlIIQQBtJnz53aTJgkFS+GHj9Egm44pkAt4weN5U9nIDWIU\nQBZpYL2zkAI5c7WpDrIZNyNRNvE2nXgo1F9aPQmbrpl6rjbRI44Mgealsgp6avUz\nywIDAQAB\n-----END PUBLIC KEY-----\n', '-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCzw49sYOnYrAAD\nUZksIDut8uWOvsUaSVt+9s44ac4UoykTtbVVav3a3UTnutvV5Avfum7DuctoP1wS\n/eLMdfd/lp6R+8xIDFUaMfg11wqzkEriPWCjcGE9dm/JyTYBpHFtPunrHLB3hOcW\nSBUWgKD7o/MZwSvc5XKUJYmgOlxfFscdVEazZdZtzOdGaMQ1Fc46aZ039ngQZA3C\nggwwCtd+IQ0R68dv6Pno6L1meUghBAG0mfPndpMmCQVL4YeP0SCbjimQC3jB43lT\n2cgNYhRAFmlgvbOQAjlztakOshk3I1E28TadeCjUX1o9CZuumXquNtEjjgyB5qWy\nCnpq9TPLAgMBAAECggEACCuYlocbxHVM1YRylHGCmjgH/EzqDcp3wMrcOe7VJwBO\nGvnkm//uOccEyA4oymKVsj15pfuz0FvQ24Fz5XHB0KgP3PgMzi7WpLImDeG64skU\nHjmb7XxrbwJgYlN62OhDH4FUhb3FZ36VjOBfKlP+UnGegvUnVorh1589JMMs9PAI\nWJ0HZjUM3mrxLF9flM7xMdCZqsfQzY9MTLKGOFaKn9qLgcqzF+IOCoKIBO76x8HF\n2VQ9+KjUlqV/M4RS+ccRrXURQxutrV2pz32VBBJh/EA4F7SHVAM0N1dbr0zOaEBe\n/9o3q0eCRiyy6HOCL/TUjVWGA6etnYPAnDUgDVQgAQKBgQD7UtJerPxlYbNDxeqD\nBV2SOs9JGPsL4H3SeZH4qceLxVQwcMstBDJa21Hh8owYqjumVhzNVBt+v+pDsxHE\noCVZTx4kYhYb/uVLZcsUo9WIxA6foENuOLMfaNmCj4O/ATn1OG5gyosnVA+W8TVY\nXc9U7EZ1MFRiINmG8W5XEk3WAQKBgQC3G91ZpurlZ4+0SpZwCgfu7VfLdxdN7lf6\nFQOJFGgrUMOigIILpUE6RxDLr18dd4mJZd9NWFQ2IlTMvWhMnE0OpQLPE6LJw59e\nEwIqrPst3XlR5Pqyna4xqLDNsC88q1wEMm56mBiIO2pBXSd1qvGjZPDCS25E3LGb\nbsGWamaBywKBgCEaL4s4zaWs0KfEkbbgJgr0pAjEuYw+7VOjn45ZDmdifkxDDv/G\n5bsB2C8ie0FkaqbmALUqttRjAsAX/ecgEMtKmHXCVZcqY5kitzTov19cM3Di8v65\niR5B+SQxMvEdgDzESgWFp/5uG/+NlbEl6gENfdpBm1uxZ/VWJ2pghtABAoGABg0/\ntZTUspxHnZfRfQZ32KezfSAEfyjfc356TW+FOdlDff1tTuE5VKnAnlq/dAPdYdMi\nHDZNIjTkRJgF+HI6Ab/mZd2qRazXeY57RdnNu2hUeCZvOrQHa9C9dy7ZgNHRCrp3\n+ElKlkYQbvSbN0JdFh9h7an8jP4WSKLSdxwxIx0CgYEAl+F7DDJZ4hEReWzY+BYf\n2Q4It0qvcCwyy1NGvS/FwtwSXjOSWRLB69zH4x2jmR/TNz3VVhuwDggl4Ye5Gp61\nXO0Ns4Vh2huTESdIOVfk0hkXUGXmmJCieKFvOfCDrLsKT4bOTbnfbgs23yutfo7R\nU7mAsqMjDLQrNnaK9w/MTgs=\n-----END PRIVATE KEY-----\n', '2024-04-12 11:39:31', '2024-04-12 11:39:31'),
(37, 33, '-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0iqEN1hmqeoWjuNFv/Ee\nzoKttTgMH4O97sxAn1veZ8WJ3QZhX6lqgwWvbma3adbMeXxxLdYK3JKtILWn65f3\ngA5r4YUgeAmV0DDnYXR9aspHP6HM+D9AFabeJ2W5s0/Ww3+AjMWsEeRrvThOy8ke\nYcXNSHHZBnvsq60yK/HgLn0K3vR9hfgIZBN5NKjs+5eYGLLJjDVxEhfpgvDKPxtx\nOKdKKr8/EjSfqMQfnaOlYACwevUYWwtFxq7zbK8tZtujONQU6DnOKlXUUR+A3mU8\nmbQQhIEDlCyrmtruxjcM6GooVz9EOsVArgOMPNajl8xSvvypoDxUgmVjeTM4aaZt\nlQIDAQAB\n-----END PUBLIC KEY-----\n', '-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDSKoQ3WGap6haO\n40W/8R7Ogq21OAwfg73uzECfW95nxYndBmFfqWqDBa9uZrdp1sx5fHEt1grckq0g\ntafrl/eADmvhhSB4CZXQMOdhdH1qykc/ocz4P0AVpt4nZbmzT9bDf4CMxawR5Gu9\nOE7LyR5hxc1IcdkGe+yrrTIr8eAufQre9H2F+AhkE3k0qOz7l5gYssmMNXESF+mC\n8Mo/G3E4p0oqvz8SNJ+oxB+do6VgALB69RhbC0XGrvNsry1m26M41BToOc4qVdRR\nH4DeZTyZtBCEgQOULKua2u7GNwzoaihXP0Q6xUCuA4w81qOXzFK+/KmgPFSCZWN5\nMzhppm2VAgMBAAECggEABBJ801rZ3K+Mn32VS7AYN7fd7O7Yp5MZM3gKjsvsMW9p\nJSiCD+5QS0+gLQIrpaE2SDPDgaW3FZdTsXPYM4hKI0M2jw9kTKqPc5H4J3sd7LbL\nhTJC98BukLzV/WrdUmxGm79r/zwAJtEsGBymxH4WIee21rXM4ANuadSYkrP7PC/m\nyoIcqV+n/jarlN1sT9HM2UVAXi9aK2w/tHgiLrGxoNf95jL4IDAEVwQ96gufXybS\nv2OrObPdzsxmaKR8jSJCBpfuHxzpfTdpy1+aA2GLhX+/LaHAw0caRRogiwodInw4\nTukckEyFqRLQK7ZATmUJKwsRV3+5u97JUwft36a4tQKBgQDwDwwospkKpR5HLzpV\nWl5lEZROVF1/dECq8pOoyfxo4BQatXFGI9l6ROelWHO0WzeIrf4snJCH7ymMxN1k\n/LDsye1Nhb9kikCdVhQDlZhFbQ3kSO2Z3qXNXEiUhrd1edjAhxlqOqmF5QCUBKAD\n/0jnzhNqVWws/1hTH+zp2JFPMwKBgQDgH0yFFRXaQyEvWaQnHkcXDJIgjielt55W\n3rs7U1XcFnhPPkuEO2yFZr03FJSZOa4iBtNQ16G/oy3WTZx+RkrKxFSBXTN5EJgM\noW1NKea7aAI5UVy6r/7hiz4gpNscR3G1v1SkSvD4aVvh6MGqF7XC4RTUclAJENeL\nL+zCXkZwFwKBgQCZ1Tq4dcKm1KrzeOtLuO5WnA5Kp7uGqmuqYGqJNm6+kiGv/+fH\nx79cn/1FssnqoK2Us9L2qZng0jzxDVLGnTuPcdLU48mDVykS6g9HQLzkeH73dFh2\nSvw6/lEwhKfZ6ywgLDL4JQFvYRGeyNv108jXavJ8KKN6rmLeWc4LCJINiwKBgFpm\nBXVAVfodTYtNutpUahQv69jZvcAn2ePsHtUE/gKxxYEg/VCur0z3baaD1JQhIc1z\nt1RKRWGIrfpcf5ynOY+jtPog35wbR1kA25deKUS55Pu9h4t9ZW8PvNVp6T70yjam\nn7tMxvlLddYfDc5Ple6u3rn6CbI+atInWHXllL+tAoGBANPzJ5nnsTCo/isRW+Xy\ntnkYrqdCdMxCJUK34Io2FjjRjWP6PN/0zm2Hr1DudAhCtAyHNTh4Q8t5OKn8NcQ3\nMZwjiIEh070Fp+jo3IA39pLNnxch5kxkOqp0bFHAMwYVDu1QW1tqRy0dvSio8KVd\nKZtEAr/9vZeA5vISCiW6/24s\n-----END PRIVATE KEY-----\n', '2024-04-27 07:40:22', '2024-04-27 07:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_04_112413_create_suppliers_table', 1),
(6, '2023_07_05_132040_create_customers_table', 1),
(7, '2023_07_10_171526_create_units_table', 1),
(8, '2023_07_25_154049_create_categories_table', 1),
(9, '2023_07_30_052703_create_products_table', 1),
(10, '2023_08_02_164906_add_column_to_table', 1),
(11, '2023_08_06_181117_create_purchases_table', 1),
(12, '2023_08_12_121234_create_invoices_table', 1),
(13, '2023_08_12_121258_create_invoice_details_table', 1),
(14, '2023_08_12_121350_create_payments_table', 1),
(15, '2023_08_12_121409_create_payment_details_table', 1),
(18, '2024_04_10_155514_add_user_id_to_key_management_table', 2),
(22, '2024_03_30_170359_add_additional_fields_to_users_table', 3),
(23, '2024_04_09_115220_create_key_management_table', 3),
(24, '2024_04_10_161248_add_user_id_to_key_management_table', 3),
(25, '2024_04_12_131526_add_password_salt_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_salt` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_salt`, `remember_token`, `created_at`, `updated_at`, `date_of_birth`, `address`, `phone_number`) VALUES
(32, 'MKccJ8WmKBR0VMwajrUQ2sPnDFaevDEFp9mjKzJYkFGla2+vh5r1hVMrnIk2C7x7Tx+btMufcCKMKOhEr11tm8933ybtSIwqsqa+VwViitOtGOR4GhKI7FZ0clLWNftEFmnbjgyrBdJRpqxD7W3Rew5FE8XxjJ8OEy7+0OXu0Jn0LdMJaI6XtNE9cwZYLw0CWZvEFMbDa3ysC8Eqm9K/pYdOGTH9osjN5SBTpszkOk6C4wLd5UMxvN12trYTXP+WKZdGR5BpdtsPJZoExwK15iAtQ13TYjl0eJ+CoUSnz/MiATcLzXX+OOfhdHfBQLYJeDmfnoLIsa5Di2LRLTMoVA==', 'bGMf6Iyb9U6hU0wabaKYWIMZqvB7Mhv5LYaxoPG54BQaybsr/cdAJA8mduCMt+a6J7ru3nfaobcjjgea/CpAnk1XFndIfvUitgHVBoe5zgfaIEUVTv+DTHo3+5p9wwj5Sg4QC2SO3Ml2VhpOB6D1OQT48FHMz1gznsCO516sdeVc4XGjdS9NLi+YEPwt19jHII2cFn6U/Ev3i0N4lYcA3N2u5ak26Zsj7abpGoKBOxJdVFoYsirZLAsXF/uyq/ZrVnd7GCBg8pSozBnMgaYMxVXMT9WCU6vnTEUuAS5SK3jabQlYkG7z8PpsvPMQwYwgTGzRT8ajJPB3TqqzCnB5og==', 'faruk7', NULL, '$2y$10$TVlyy8UNeC2ug2NJ1WozxOl.vvAZhGWIo8EE40vUjOAW6oQzClFoe', 'QjWx9Ll5ovB4OR9C', NULL, '2024-04-12 11:39:31', '2024-04-12 11:41:58', 'dyCcO4P1roBtEuXb9s6yqG0aCNutzX0QSi4kSlDbbQRGZvsfmrlAWl4gQPwG0kiQGQCmbOUjMoumpt2tAqwejypDSE6Ulc/D5GgZ0w+shVK1IGTEXac/fnatr/l0m6UWkkppDyC8DnDgasNef2rO97QDGm5zo3m2+TeAaTUVWnzbydW04eyEYJxiVpA+QNPMWI3T81MFJ1GZ7fFBpCzqPXOD4zeqDSaWBEFzBJ2bjqmopv0KjUTAJSpRQZ9Zjxu/iiTr4ZF8DWxyKAZod4D52HLnoo1UW8hhKKnoNhp1Gmvzr++AXYO92l3fIlfLWLe8eENGCkYBSz5l9gmV7AxS8A==', 'AhVj6QSCdv1+PY2vx973ZrdR2uAuWv9M5Vw+rwOXxfyzmYSHYRNa3G6snIwxahNgVNI92odUmcaRDasTwtYUBLv1aDCBk4iqYxXhQh6503aXO+GInq88hFjv2BJZTOqgv/yl1SXrfdpdvbdtuKZh+sI1v0eMPljnNEv2c6DUoq+UeZm9JvPKiSiKNDD7Czr5VuEdfaywJjPwxV4v7Fhy8LTzwCNEjlmAi+JJOjA8/Nss+QMIIUKJGdrVlZ5MukRNVHlfWG4pbmGCeqcZqCsdteVxMfpFmH7Y0IdHNsw+tsk/PmYiLd4f6joaD0nIahCpW0nwzP1swEv9F4lGJqsm2A==', 'NCtRzdL1EcJa5tNaaXzpgOhxEtuFp+PYMDQsb1eP1bWMF/qalHkk8SYEjr8nBroppZpS227rFAXFgsJY5LF0dHmCrL4hCTftNrqdRZuaZqFgG66CtehLI+skwdKP/J9TO57x2dXhsDqPY5ihgheah2ieOIF2CKyx9T9klR7Ac4Sulpj+oQeP5Hh6Enie63Z9tkruwZnXf2vIqBaUtcXbkPXPjzKSOJHUKHsBPgSJvIEojzScKmRfhuRvfXGh/0j6qaHE+KTbJRIV3nGtolE4g90S+cJu+6McpGQV9ektRonVGq9eu8F0XVT77b1TKRNNacrRy8KRSZn4aHmvQCaXDQ=='),
(33, 'rgNemFm0EwwmhwVKY8djb/QtIzi50iu51LSPuT1HK+nX5QgssTIEu2OC4CPIlKMKzUP8g0y9THLKypJfOruFjx8RxIVVvw8zjDl+sFW5fRGHTl5VWUI2y/SOBVS/TemIE/91poce51romk7cP9jDoJn/CjuOlEx0fc/10yjeLvRNY5ckEKzy/+iHCBMuuIohDBi0aRMuP3nwW3kvA/U+iVS+hm4TDJLLKjNCCV9o7PXABpICJ6qczEvbZ1ozp/T5E/X99ojeliX87f8GC/ge950LYI439VK7PYhTGlg7lXMraWhjfzYPzxUjwjpZA7AMWGA8UErvCddc4ToTlK5FjQ==', 'hFh9DdZfucBERM+L/s60Mze1r+42MUwCLdHVCNSATMKZUOOVi3pJUKifKwV9z1OdqUJEm3kKxNVT0CI4ykfzjVpqqvC0DSw6gaxUp0+wewvhXT/P6m1FaoMDd7wv8L29x9E1EXuFunY/XtEjYhYePMybIhyaDBXER00LRlUBk9eID2Y1CHUqFray8T/F2nHICajTibb5YatYvOYC2FPAaOMIzwfOmMYbUIQML0SAg8cxdX3lYNB2QB6b8m7QXuFc7hH6fTtTba4kJhYPbjPFgQ9A1/tom0m261tPcW7f8TXYI2T+kTGcNIY/IeRZqD+GQaLt5nq3BCEK4KoAJ3rFnw==', 'farhan3', NULL, '$2y$10$Vs76zEIxqeeeQhH3pnmy5eFkQRip29skXFunAx1MGJL85GQ9sULPe', 'BNJFxdBnMqV7uouv', NULL, '2024-04-27 07:40:22', '2024-04-27 07:41:48', 'nabchcfOWXHuLmy1SAdJHfdHeevUu86k7VnABArn466m23F4K5GLdmOHMesERv4RHLb1NDE6KEFHqIhFYfl2aAgrQA9aichiL/GD0LU39Cz+WJoP5XyAUgNK8DEiARPO8V8eXGoS/a5W4oGzviEAZ0JLa6pStSgAaUq2zc9irrYohMLUE8ecnHwj7y09oD058rIUGgCAVi3/zkibKVC+VLt9t9Tr6NugXtr3HelxH+7UL+HSFqw+ysWE2AZR2XMsYi3h07a25O0KRV2D9dI261t27o+OWRwHUnUevIboO0oLSJN3RupnOpJ09IuzVUaWWW9ruZ5oVTvxRcJ8qp1HFg==', 'T7Sdccjj6uwMsNnV3PI2O46FZ+046q2z1B4VFZ6CnCUXwhufbsxWBthvnZsdh5kJXj9bcpHRzEXn/O7smqk/e978U6ACoGEIknY7x8egwdjszxackTvo4h20qsRrEnXB0NXoFKXzgwxBxPpr3BiWWYZRC5RmTNg0INu1gmvNEwD+bCgDzl0gSAhyj3R5rXdeWyvnWcsfPw+1RczQYrS4x6HBLnkO8Znck+XPSd3BxRqnoFYKSlPWMStiaha+v85y4TtLYwfuO+5wcnFFVj2xD/wXU+IFQtTAypc/F2jfrWx4vWRlsLso2cxkbhOH7UY0/vRnyHD5v9kEruHPygG9jg==', 'FknYo7Pn+dIPWyfHt1oM2Qd6QQH7MVFrhItgEk1HewEhp5e9qito9cnABqCZODbcWmN77oC4zrFvhowQIq9FmtqV627FRwrulajCQ2yuurz+drvxUIerwCH8XhF3ctiGpiD9CxTYOvnDr4dQQ/liKj9AqfuT2+9p+DPtrNZ8gdNyB6KW1h5MT68wGpHSIHuhOqEzsxcH9rDn014hRE+GfSElSeDU0Qp1CjfpIH6E8+TbcmOU7o2GJdzK4DsAGnVqmzladmy9JG17Jinrkxnseog63RMmUTMI77T2i4vZyS2nJhT7vO/PMdXIafH8FrJB/fnSjwe9wlwsGwAVRVZnaw==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_management`
--
ALTER TABLE `key_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_management_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`) USING HASH,
  ADD UNIQUE KEY `users_username_unique` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_management`
--
ALTER TABLE `key_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `key_management`
--
ALTER TABLE `key_management`
  ADD CONSTRAINT `key_management_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
