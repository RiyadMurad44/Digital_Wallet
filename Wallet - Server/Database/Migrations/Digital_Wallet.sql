CREATE DATABASE Digital_Wallet;
USE Digital_Wallet;

CREATE TABLE Admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    address TEXT
);

CREATE TABLE FAQ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    admin_id INT UNIQUE,
    FOREIGN KEY (admin_id) REFERENCES Admins(id) ON DELETE CASCADE
);

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address TEXT,
    nationality VARCHAR(100),
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_validated BOOLEAN DEFAULT FALSE,
    verification_type ENUM('ID', 'passport', 'driver_license'),
    subscription_tier INT DEFAULT 1,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    blocked_users TEXT
);

CREATE TABLE Wallets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    balance DECIMAL(15,2) DEFAULT 0.00,
    balance_transaction_limit DECIMAL(15,2),
    user_id INT UNIQUE,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);

CREATE TABLE Transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_user_id INT,
    sender_user_name VARCHAR(255),
    receiver_user_id INT,
    receiver_user_name VARCHAR(255),
    transfer_amount DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (sender_user_id) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_user_id) REFERENCES Users(id) ON DELETE CASCADE
);

CREATE TABLE Scheduled_Payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_user_id INT,
    sender_user_name VARCHAR(255),
    receiver_user_id INT,
    receiver_user_name VARCHAR(255),
    transfer_amount DECIMAL(15,2) NOT NULL,
    scheduling_date TIMESTAMP,
    scheduled_date DATETIME NOT NULL,
    FOREIGN KEY (sender_user_id) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_user_id) REFERENCES Users(id) ON DELETE CASCADE
);

CREATE TABLE Tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    user_name VARCHAR(255),
    user_email VARCHAR(255),
    title VARCHAR(255) NOT NULL,
    description TEXT,
    ticket_solved BOOLEAN DEFAULT FALSE,
    admin_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (admin_id) REFERENCES Admins(id) ON DELETE SET NULL
);
