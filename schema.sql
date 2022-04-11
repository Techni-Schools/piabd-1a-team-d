-- DROP DATABASE note_sharing;
-- CREATE DATABASE note_sharing;
-- USE note_sharing;

CREATE TABLE Users (
    id INT IDENTITY(1,1),
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(63) NOT NULL,
        CONSTRAINT PK_users_id PRIMARY KEY(id),
        CONSTRAINT CHK_users_email_valid CHECK (email LIKE '%@%.%')
)

CREATE TABLE Users_profiles (
    user_id INT IDENTITY(1,1),
    name VARCHAR(25),
    surname VARCHAR(25),
    notes_shared INT,
    avatar_path VARCHAR(100),
        CONSTRAINT FK_users_profiles_id FOREIGN KEY (user_id) REFERENCES Users(id)
)

CREATE TABLE Subjects (
    id INT IDENTITY(1,1),
    name VARCHAR(50),
        CONSTRAINT PK_subject_id PRIMARY KEY(id)
)

CREATE TABLE Notes (
    id INT IDENTITY(1,1),
    user_id INT,
    subject_id INT,
    path_to_content VARCHAR(100) UNIQUE,
    shared_date DATE,
        CONSTRAINT PK_notes_id PRIMARY KEY(id),
        CONSTRAINT FK_notes_user_id FOREIGN KEY(user_id) REFERENCES Users(id),
        CONSTRAINT FK_notes_subject_id FOREIGN KEY(subject_id) REFERENCES Subjects(id),
        CONSTRAINT CHK_notes_shared_date_not_past CHECK (shared_date > GETDATE())
     
)

CREATE TABLE Groups (
    id INT IDENTITY(1,1),
    group_name VARCHAR(80) UNIQUE,
        CONSTRAINT PK_groups_id PRIMARY KEY(id)
)

CREATE TABLE Users_Groups (
    group_id INT,
    user_id INT,
        CONSTRAINT FK_users_groups_group_id FOREIGN KEY(group_id) REFERENCES Groups(id),
        CONSTRAINT FK_users_groups_user_id FOREIGN KEY(user_id) REFERENCES Users(id),
        CONSTRAINT PK_users_groups_group_id_user_id PRIMARY KEY(group_id, user_id)
)

CREATE TABLE Groups_profiles (
    group_id INT,
    name VARCHAR(80),
    addr_1 VARCHAR(100),
    addr_2 VARCHAR(100),
    country_code VARCHAR(2),
        CONSTRAINT FK_groups_profiles_group_id FOREIGN KEY(group_id) REFERENCES Groups(id)
)
