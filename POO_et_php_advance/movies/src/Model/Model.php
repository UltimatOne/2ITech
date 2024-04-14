<?php

class Model
{
    //private permet une accessibilité à $db que depuis la classe Model
    private $db;
    public function __construct()
    {
        $host   = 'localhost';
        $dbname = 'movies';
        $user   = 'root';
        $pswrd  = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pswrd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        };
    }

    public function manage()
    {
    }

    public function addNewUser($pseudo, $email, $pswrd)
    {
        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $this->db->prepare("INSERT INTO users (user_pseudo, user_email, user_pswrd) VALUES (?,?,?)");

            //Envoi
            $request->execute([
                $pseudo,
                $email,
                $pswrd
            ]);

            $id = $this->db->lastInsertId();

            return $id;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getUser($email)
    {

        try {
            $request = $this->db->prepare(
                'SELECT * FROM users
                                           LEFT JOIN roles ON users.role_id = roles.role_id
                                           WHERE user_email = ?'
            );
            $request->execute([$email]);

            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getCategories()
    {

        try {
            //Une facon de récupérer les données avec prepare() et execute()
            $request = $this->db->prepare('SELECT * FROM cat');
            $request->execute([]);
            $categories = $request->fetchAll();

            return $categories;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }

    public function getCategorie($catId)
    {

        try {
            //Une facon de récupérer les données avec prepare() et execute()
            $request = $this->db->prepare('SELECT cat_name FROM cat WHERE cat_id = ?');
            $request->execute([$catId]);
            $categorie = $request->fetch();

            return $categorie["cat_name"];
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }

    public function getDirectors()
    {
        try {
            $request = $this->db->prepare('SELECT * FROM directors');
            $request->execute([]);

            $directors = $request->fetchAll();

            return $directors;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }

    public function getActors()
    {

        try {
            $request = $this->db->prepare('SELECT * FROM actors');
            $request->execute([]);
            $actors = $request->fetchAll();

            return $actors;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }

    public function addMovie($title, $year, $synopsis, $trailer, $time, $picture, $catId, $directorId, $userId)
    {
        try {

            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $this->db->prepare("INSERT INTO movies (
                movie_title, 
                movie_release_year, 
                movie_synopsis, 
                movie_trailer, 
                movie_duration, 
                movie_image, 
                cat_id, 
                director_id,
                user_id) VALUES (?,?,?,?,?,?,?,?,?)");

            //Envoi
            $request->execute([
                $title,
                $year,
                $synopsis,
                $trailer,
                $time,
                $picture,
                $catId,
                $directorId,
                $userId,
            ]);
            //retourne l'id du film
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function addActorsForMovie($actorsList, $movieId)
    {
        try {
            $sql = 'INSERT INTO movies_actors (actor_id, movie_id) VALUES ';
            $data = [];

            for ($i = 0; $i < count($actorsList); $i++) {

                $sql .= '(?, ?)';

                if ($i < count($actorsList) - 1) {
                    $sql .= ', ';
                }
                array_push($data, $actorsList[$i]);
                array_push($data, $movieId);
            }
            $request = $this->db->prepare($sql);
            $request->execute($data);
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }

    public function getMyMovies($userId)
    {
        try {
            $request = $this->db->prepare('SELECT * FROM movies WHERE movies.user_id = ?');
            $request->execute([$userId]);

            $myMovies = $request->fetchAll();

            return $myMovies;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getMyMoviesByCategory($userId, $catId)
    {
        try {
            $request = $this->db->prepare('SELECT * FROM movies WHERE movies.user_id = ? AND cat_id = ?');
            $request->execute([$userId, $catId]);

            $myMovies = $request->fetchAll();

            return $myMovies;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getMyMoviesByActor($userId, $actorId)
    {
        try {
            $request = $this->db->prepare('SELECT * FROM movies
                                           JOIN movies_actors ON movies.movie_id = movies_actors.movie_id
                                           WHERE movies.user_id = ? AND movies_actors.actor_id = ?');
            $request->execute([$userId, $actorId]);

            $myMovies = $request->fetchAll();

            return $myMovies;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getMyMoviesByDirectors($userId, $directorId)
    {
        try {
            $request = $this->db->prepare('SELECT * FROM movies WHERE movies.user_id = ? AND director_id = ?');
            $request->execute([$userId, $directorId]);

            $myMovies = $request->fetchAll();

            return $myMovies;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getMovie($movieId)
    {
        try {
            $request = $this->db->prepare('SELECT movies.*, directors.director_name, directors.director_firstname, cat.cat_name FROM movies
                                           JOIN directors ON movies.director_id = directors.director_id
                                           JOIN cat ON movies.cat_id = cat.cat_id
                                           WHERE movie_id = ?');
            $request->execute([$movieId]);

            $movie = $request->fetch();

            return $movie;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getActorsOfMovie($movieId)
    {
        try {
            $request = $this->db->prepare('SELECT actor_name FROM actors
                                           JOIN movies_actors ON movies_actors.actor_id = actors.actor_id
                                           WHERE movies_actors.movie_id = ?');
            $request->execute([$movieId]);

            $actors = $request->fetchAll();

            return $actors;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }
}
