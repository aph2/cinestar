-- CREATE TABLE
--     users (
--         id INT PRIMARY KEY AUTO_INCREMENT,
--         username VARCHAR(50) NOT NULL,
--         password VARCHAR(255) NOT NULL,
--         email VARCHAR(100) UNIQUE NOT NULL,
--         user_type ENUM('admin', 'regular') NOT NULL
--     );

-- CREATE TABLE
--     movies (
--         id INT PRIMARY KEY AUTO_INCREMENT,
--         name VARCHAR(100) NOT NULL UNIQUE,
--         description TEXT,
--         category varchar(100),
--         image_url VARCHAR(255),
--         slug VARCHAR(100) NOT NULL UNIQUE,
--         INDEX idx_category (category),
--     );

-- CREATE TABLE
--     movie_categories (
--         id INT PRIMARY KEY AUTO_INCREMENT,
--         name VARCHAR(50) NOT NULL
--     );

-- INSERT INTO movies (name, description, category, image_url, slug)
-- VALUES
--     ('The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'Drama', 'shawshank_redemption.jpg', 'shawshank-redemption'),
--     ('The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'Crime', 'godfather.jpg', 'godfather'),
--     ('The Dark Knight', 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'Action', 'dark_knight.jpg', 'dark-knight'),
--     ('Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Crime', 'pulp_fiction.jpg', 'pulp-fiction'),
--     ('Forrest Gump', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 'Drama', 'forrest_gump.jpg', 'forrest-gump'),
--     ('Schindler''s List', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'Drama', 'schindlers_list.jpg', 'schindlers-list'),
--     ('The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'Action', 'matrix.jpg', 'matrix'),
--     ('Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'Romance', 'titanic.jpg', 'titanic'),
--     ('Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'Sci-Fi', 'inception.jpg', 'inception'),
--     ('Fight Club', 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', 'Drama', 'fight_club.jpg', 'fight-club'),
--     ('The Silence of the Lambs', 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 'Thriller', 'silence_of_the_lambs.jpg', 'silence-of-the-lambs'),
--     ('The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Sauron''s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'Fantasy', 'return_of_the_king.jpg', 'return-of-the-king'),
--     ('Star Wars: Episode V - The Empire Strikes Back', 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued across the galaxy by Darth Vader and bounty hunter Boba Fett.', 'Sci-Fi', 'https: / / m.media - amazon.com / images / M / MV5BZmMxNmRkZGUtNzQ1My00YTMyLWJhNTktY2RkY2E3NTQyNDE2XkEyXkFqcGdeQXVyNDQ0Mjg4NTY @._V1_.jpg', 'empire-strikes-back')


-- CREATE TABLE
--     halls (
--         id INT PRIMARY KEY AUTO_INCREMENT,
--         name VARCHAR(50) NOT NULL
--     );

CREATE TABLE
    schedules (
        id INT PRIMARY KEY AUTO_INCREMENT,
        movie_id INT,
        hall_id INT,
        start_time DATETIME NOT NULL,
        day_of_week ENUM(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ) NOT NULL,
        FOREIGN KEY (movie_id) REFERENCES movies(id),
        FOREIGN KEY (hall_id) REFERENCES halls(id)
    );

CREATE TABLE
    tickets (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT,
        schedule_id INT,
        purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (schedule_id) REFERENCES schedules(id)
    );