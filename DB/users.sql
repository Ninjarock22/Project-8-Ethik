-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: **********
-- Erstellungszeit: 25. Mrz 2025 um 20:32
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

CREATE TABLE [users] (
  [id] int NOT NULL IDENTITY(1,1),
  [name] varchar(75) NOT NULL,
  [password] varchar(255) NOT NULL,
  [email] varchar(100) NOT NULL,
  [age] int DEFAULT NULL,
  [status] tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY ([id]),
  UNIQUE ([email])
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `name`, `password`, `email`, `age`, `status`) VALUES
(6, 'Test', '$2y$10$/QKUV9ozhBvVpShsNZAaauHt8mGEy5KdxOy8bljufSncvY8eMkleW', 'test@test.de', NULL, 0),