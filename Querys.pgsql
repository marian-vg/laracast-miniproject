CREATE TABLE notes(
	user_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	email VARCHAR(100),
	password VARCHAR(100)
)

CREATE TABLE notes (
    note_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    body TEXT,
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

# codigo para ver las foreign keys #

SELECT conname
FROM pg_constraint
WHERE conrelid = 'notes'::regclass
  AND contype = 'f';

# codigo para ver las primary keys #

SELECT conname
FROM pg_constraint
WHERE conrelid = 'notes'::regclass
  AND contype = 'p';

# codigo para modificar la tabla notas y sus constraints #

ALTER TABLE notes
RENAME CONSTRAINT fk_user TO user_id_fkey;

ALTER TABLE notes
RENAME CONSTRAINT notes_pkey TO id;

# codigo para modificar la tabla notas y su columna principal #c

ALTER TABLE notes
RENAME COLUMN note_id TO id