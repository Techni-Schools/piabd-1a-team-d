-- DROP DATABASE note_sharing;
-- CREATE DATABASE note_sharing;

CREATE TABLE Users (
    id INT IDENTITY(1,1),
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(63) NOT NULL,
        CONSTRAINT PK_users_id PRIMARY KEY(id),
        CONSTRAINT CHK_users_email_valid CHECK (email LIKE '%@%.%'),
)

CREATE TABLE Users_profiles (
    id INT IDENTITY(1,1),
    name VARCHAR(25),
    surname VARCHAR(25),
    notes_shared INT,
    avatar_path VARCHAR(100),
        CONSTRAINT FK_users_profiles_id FOREIGN KEY (id) REFERENCES Users(id)
        -- proper column name, 
        -- missing user_id
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

CREATE TABLE Schools (
    id INT IDENTITY(1,1),
    school_name VARCHAR(80) UNIQUE,
        CONSTRAINT PK_schools_id PRIMARY KEY(id)
)

-- does not describe what on diagram
CREATE TABLE Users_Schools (
    school_id INT,
    user_id INT,
        CONSTRAINT FK_users_schools_school_id FOREIGN KEY(school_id) REFERENCES Schools(id),
        CONSTRAINT FK_users_schools_user_id FOREIGN KEY(user_id) REFERENCES Users(id),
        CONSTRAINT PK_users_schools_school_id_user_id PRIMARY KEY(school_id, user_id)
)

CREATE TABLE Schools_profiles (
    school_id INT,
    name VARCHAR(80),
    addr_1 VARCHAR(100),
    addr_2 VARCHAR(100),
    country_code VARCHAR(2),
        CONSTRAINT FK_schools_profiles_school_id FOREIGN KEY(school_id) REFERENCES Schools(id)
)