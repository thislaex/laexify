CREATE DATABASE IF NOT EXISTS laexify_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE laexify_db;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    value TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO settings (setting_key, value) VALUES
('site_title', 'Laexify - Full Stack Developer Portfolio'),
('site_description', 'Laexify - Full Stack Developer specializing in Backend development, Internet and Network Technologies student with expertise in modern web technologies.'),
('site_keywords', 'Full Stack Developer, Backend Developer, Web Developer, React, JavaScript, Bootstrap, Android Studio, Portfolio'),
('site_author', 'Laexify'),
('og_title', 'Laexify - Full Stack Developer'),
('og_description', 'Full Stack Developer specializing in Backend development with expertise in modern web technologies.'),
('twitter_title', 'Laexify - Full Stack Developer'),
('twitter_description', 'Full Stack Developer specializing in Backend development.'),
('github_username', 'thislaex');
