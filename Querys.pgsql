# codigo para crear la tabla usuarios #

CREATE TABLE notes(
	user_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	email VARCHAR(100),
	password VARCHAR(100)
)

# codigo para crear la tabla notas #

CREATE TABLE notes (
    note_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    body TEXT,
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);