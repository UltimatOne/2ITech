<?php

class Model
{
    //private permet une accessibilité à $db que depuis la classe Model
    private $db;
    public function __construct()
    {
        $this->db = SQLDatabase::getInstance()->getConnection();
    }

    public function manage(): void {}

    // Students
    public function addNewStudent($name, $firstname, $birthday, $email, $phone, $pswrd, $address, $additionalAddress, $zip_code, $city, $cityId, $countryId): mixed
    {
        $additionalAddress = !empty($additionalAddress) ? $additionalAddress : NULL;

        //permet de créer une transaction. tout se validera au commit si toutes les requetes sql se sont terminées correctement sinon catch et rollback pour éviter la modification de la db
        try {
            //demarrage de la transaction
            $this->db->beginTransaction();

            $request = $this->db->prepare('SELECT city_id FROM cities');
            $request->execute([]);
            
            $citiesDatas = $request->fetchAll(PDO::FETCH_ASSOC);

            $cityIdExist = false;

            for ($i = 0; $i < count(value: $citiesDatas); $i++) {
                if ($citiesDatas[$i]["city_id"] == $cityId) {
                    $cityIdExist = true;
                    break;
                }
            };

            if ($cityIdExist) {
                $request = $this->db->prepare('INSERT INTO students (
                student_name, 
                student_firstname, 
                student_birthday, 
                student_email, 
                student_phone, 
                student_password, 
                student_address, 
                student_additional_address, 
                student_city_id
                ) VALUES (?,?,?,?,?,?,?,?,?)');
                $request->execute([$name, $firstname, $birthday, $email, $phone, $pswrd, $address, $additionalAddress, $cityId]);
            } else {
                $request = $this->db->prepare('INSERT INTO cities (city_id, city_name, city_zip_code, city_country_id) VALUES (?,?,?,?)');
                $request->execute([$cityId, $city, $zip_code, $countryId]);

                $request = $this->db->prepare('INSERT INTO students (
                        student_name, 
                        student_firstname, 
                        student_birthday, 
                        student_email, 
                        student_phone, 
                        student_password, 
                        student_address, 
                        student_additional_address, 
                        student_city_id
                ) VALUES (?,?,?,?,?,?,?,?,?)');
                $request->execute([$name, $firstname, $birthday, $email, $phone, $pswrd, $address, $additionalAddress, $cityId]);
            }
            
            // les requetes sql se sont terminées correctement envoi et modification de la db
            $studentId = $this->db->lastInsertId();

            $this->db->commit();


            return $studentId;
        } catch (Exception $e) {

            // les requetes sql ne se sont pas terminées correctement annulation
            $this->db->rollBack();
            var_dump(value: $e->getMessage());
        };
    }

    // Super Admins
    public function getSuperAdmin($email): mixed
    {
        try {
            $request = $this->db->prepare('SELECT 
                                            super_admin_id AS id,
                                            super_admin_name AS name,		
                                            super_admin_firstname AS firstname,	
                                            super_admin_email AS email,
                                            super_admin_phone AS phone,	
                                            super_admin_password AS password,		
                                            super_admin_address AS address,
                                            super_admin_city_id AS city_id,
                                            super_admin_create_date AS create_date
                                          FROM super_admins WHERE super_admin_email = ?');
            $request->execute([$email]);
            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    // Admins
    public function getAdmin($email): mixed
    {
        try {
            $request = $this->db->prepare('SELECT 
                                            admin_id AS id,
                                            admin_name AS name,		
                                            admin_firstname AS firstname,	
                                            admin_email AS email,
                                            admin_phone AS phone,	
                                            admin_password AS password,		
                                            admin_address AS address,
                                            admin_city_id AS city_id,
                                            admin_create_date AS create_date
                                          FROM admins WHERE admin_email = ?');
            $request->execute([$email]);
            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getSelectAdmins(): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT admin_id AS id,
                        admin_name AS name,
                        admin_firstname AS firstname
                FROM admins'
            );
            $request->execute([]);

            $admins = $request->fetchAll(PDO::FETCH_ASSOC);

            return $admins;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getTrainer($email): mixed
    {
        try {
            $request = $this->db->prepare('SELECT 
                                            trainer_id AS id,
                                            trainer_name AS name,		
                                            trainer_firstname AS firstname,	
                                            trainer_email AS email,
                                            trainer_phone AS phone,	
                                            trainer_password AS password,		
                                            trainer_address AS address,
                                            trainer_city_id AS city_id,
                                            trainer_create_date AS create_date
                                           FROM trainers WHERE trainer_email = ?');
            $request->execute([$email]);
            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getStudent($email): mixed
    {
        try {
            $request = $this->db->prepare('SELECT 
                                            student_id AS id,
                                            student_name AS name,		
                                            student_firstname AS firstname,	
                                            student_email AS email,
                                            student_phone AS phone,	
                                            student_password AS password,		
                                            student_address AS address,
                                            student_city_id AS city_id,
                                            student_create_date AS create_date
                                           FROM students WHERE student_email = ?');
            $request->execute([$email]);
            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getCenters(): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT center_id AS id,
                        center_name AS name,
                        center_admin_id AS admin_id,
                        center_address AS address,
                        center_additional_address AS additional_address,
                        center_phone AS phone,
                        center_email AS email,
                        cities.city_zip_code AS zip_code,
                        cities.city_name AS city_name,
                        countries.country_name AS country_name
                FROM centers
                LEFT JOIN cities ON cities.city_id = centers.center_city_id
                LEFT JOIN countries ON countries.country_id = cities.city_country_id'
            );
            $request->execute([]);

            $centers = $request->fetchAll(PDO::FETCH_ASSOC);

            return $centers;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getCenter($centerId): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT *, cities.city_zip_code, cities.city_name, countries.country_name FROM centers
                JOIN cities ON cities.city_id = centers.center_city_id
                JOIN countries ON countries.country_id = cities.city_country_id
                WHERE center_id = ?'
            );
            $request->execute([$centerId]);

            $center = $request->fetch();

            return $center;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function addCenter($name, $address, $additionalAddress, $zip, $city, $cityId, $countryId, $email, $phone): void
    {
        //permet de créer une transaction. tout se validera au commit si toutes les requetes sql se sont terminées correctement sinon catch et rollback pour éviter la modification de la db
        try {
            $additionalAddressCheck = !empty($additionalAddress) ? $additionalAddress : NULL;
            
            //demarrage de la transaction
            $this->db->beginTransaction();


            $request = $this->db->prepare('SELECT city_id FROM cities');
            $request->execute([]);
            
            $citiesDatas = $request->fetchAll(PDO::FETCH_ASSOC);

            $cityIdExist = false;

            for ($i = 0; $i < count(value: $citiesDatas); $i++) {
                if ($citiesDatas[$i]["city_id"] == $cityId && $citiesDatas[$i]["city_country_id" == $countryId]) {
                    $cityIdExist = true;
                    break;
                }
            };

            if ($cityIdExist) {
                $request = $this->db->prepare('INSERT INTO centers (
                    center_name,
                    center_address,
                    center_additional_address,
                    center_phone,
                    center_email,
                    center_city_id
                    ) VALUES (?,?,?,?,?,?)');

                $request->execute([$name, $address, $additionalAddressCheck, $phone, $email, $cityId]);

            } else {
                $request = $this->db->prepare('INSERT INTO cities (city_id, city_name, city_zip_code, city_country_id) VALUES (?,?,?,?)');
                $request->execute([$cityId, $city, $zip, $countryId]);

                $request = $this->db->prepare('INSERT INTO centers (
                    center_name,
                    center_address,
                    center_additional_address,
                    center_phone,
                    center_email,
                    center_city_id
                    ) VALUES (?,?,?,?,?,?)');

                $request->execute([$name, $address, $additionalAddressCheck, $phone, $email, $cityId]);

            }

            //les requetes sql se sont terminées correctement envoi et modification de la db
            $this->db->commit();

            // return $centerId;
        } catch (Exception $e) {

            //les requetes sql ne se sont pas terminées correctement annulation
            $this->db->rollBack();
            var_dump(value: $e->getMessage());
        };
    }

    public function getCountries(): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT country_id, country_name FROM countries ORDER BY country_name ASC'
            );
            $request->execute([]);

            $datas = $request->fetchAll();

            return $datas;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }
}
