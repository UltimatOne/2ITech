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
    public function addNewStudent($name, $firstname, $birthday, $email, $phone, $pswrd, $address, $additionalAddress, $cityId, $city, $zipCode, $countryId): mixed
    {
        $additionalAddressTmp = !empty($additionalAddress) ? $additionalAddress : NULL;

        //permet de créer une transaction. tout se validera au commit si toutes les requetes sql se sont terminées correctement sinon catch et rollback pour éviter la modification de la db
        try {
            //demarrage de la transaction
            $this->db->beginTransaction();

            // Appel d'une procédure stockée SQL
            $request = $this->db->prepare('CALL AddCityIfNotExists(?,?,?,?)');
            $request->execute([$cityId, $city, $zipCode, $countryId]);

            $request = $this->db->prepare(
                'CALL AddStudentIfNotExists(
                    :studentName,
                    :studentFirstname,
                    :studentBirthday,
                    :studentEmail,
                    :studentPhone,
                    :studentPassword,
                    :studentAddress,
                    :studentAdditionalAddress,
                    :studentCityId,
                    @studentId
                )'
            );
            $request->bindvalue(":studentName", $name, PDO::PARAM_STR);
            $request->bindvalue(":studentFirstname", $firstname, PDO::PARAM_STR);
            $request->bindvalue(":studentBirthday", $birthday, PDO::PARAM_STR);
            $request->bindvalue(":studentEmail", $email, PDO::PARAM_STR);
            $request->bindvalue(":studentPhone", $phone, PDO::PARAM_STR);
            $request->bindvalue(":studentPassword", $pswrd, PDO::PARAM_STR);
            $request->bindvalue(":studentAddress", $address, PDO::PARAM_STR);
            $request->bindvalue(":studentAdditionalAddress", $additionalAddressTmp, PDO::PARAM_STR);
            $request->bindvalue(":studentCityId", $cityId, PDO::PARAM_STR);
            $resp = $request->execute();
            // Fin de la transaction
            $this->db->commit();

            if ($resp == true) {
                $request = $this->db->prepare('SELECT student_id FROM students WHERE student_email = ?');
                $request->execute([$email]);
                $student = $request->fetch();
            }

            return $student["student_id"];
        } catch (Exception $e) {

            // les requetes sql ne se sont pas terminées correctement annulation
            $this->db->rollBack();
            echo '<pre>';
            var_dump(value: $e->getMessage());
            echo '<pre>';
            return null;
        };
    }

    // Super Admins
    public function getSuperAdmin($email): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT super_admin_id AS id,
                        super_admin_name AS name,
                        super_admin_firstname AS firstname,
                        super_admin_email AS email,
                        super_admin_phone AS phone,
                        super_admin_password AS password,
                        super_admin_address AS address,
                        super_admin_city_id AS city_id,
                        super_admin_create_date AS create_date
                FROM super_admins WHERE super_admin_email = ?'
            );
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
            $request = $this->db->prepare(
                'SELECT admin_id AS id,
                        admin_name AS name,
                        admin_firstname AS firstname,
                        admin_email AS email,
                        admin_phone AS phone,
                        admin_password AS password,
                        admin_address AS address,
                        admin_city_id AS city_id,
                        admin_create_date AS create_date
                FROM admins WHERE admin_email = ?'
            );
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
            $request = $this->db->prepare(
                'SELECT trainer_id AS id,
                        trainer_name AS name,
                        trainer_firstname AS firstname,
                        trainer_email AS email,
                        trainer_phone AS phone,
                        trainer_password AS password,
                        trainer_address AS address,
                        trainer_city_id AS city_id,
                        trainer_create_date AS create_date
                FROM trainers WHERE trainer_email = ?'
            );
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
            $request = $this->db->prepare(
                'SELECT student_id AS id,
                        student_name AS name,
                        student_firstname AS firstname,
                        student_email AS email,
                        student_phone AS phone,
                        student_password AS password,
                        student_address AS address,
                        student_city_id AS city_id,
                        student_create_date AS create_date,
                        cities.city_name,
                        cities.city_zip_code,
                        countries.country_name,
                        inscriptions.inscription_id
                FROM students
                LEFT JOIN cities ON cities.city_id = students.student_city_id
                LEFT JOIN countries ON countries.country_id = cities.city_country_id
                LEFT JOIN inscriptions ON inscriptions.inscription_student_id = student_id
                WHERE student_email = ?'
            );
            $request->execute([$email]);
            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function getInscription($studentId): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT inscription_id from inscriptions where inscription_student_id = ?'
            );
            $request->execute([$studentId]);
            $incription = $request->fetch();

            return $incription;
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
                'SELECT *,
                        cities.city_zip_code,
                        cities.city_name,
                        countries.country_name
                FROM centers
                LEFT JOIN cities ON cities.city_id = centers.center_city_id
                LEFT JOIN countries ON countries.country_id = cities.city_country_id
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


            $request = $this->db->prepare('SELECT city_id FROM cities WHERE city_id = ?');
            $request->execute([$cityId]);

            $cityData = $request->fetch(PDO::FETCH_ASSOC);

            if (isset($cityData["city_id"])) {
                $request = $this->db->prepare(
                    'INSERT INTO centers (
                        center_name,
                        center_address,
                        center_additional_address,
                        center_phone,
                        center_email,
                        center_city_id
                    ) VALUES (?,?,?,?,?,?)'
                );

                $request->execute([$name, $address, $additionalAddressCheck, $phone, $email, $cityId]);
            } else {
                $request = $this->db->prepare('INSERT INTO cities (city_id, city_name, city_zip_code, city_country_id) VALUES (?,?,?,?)');
                $request->execute([$cityId, $city, $zip, $countryId]);

                $request = $this->db->prepare(
                    'INSERT INTO centers (
                        center_name,
                        center_address,
                        center_additional_address,
                        center_phone,
                        center_email,
                        center_city_id
                    ) VALUES (?,?,?,?,?,?)'
                );

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
    public function getRoom($roomId): mixed
    {
        try {
            $request = $this->db->prepare('SELECT room_id, room_name, room_description FROM tchatrooms where room_id = ?');
            $request->execute([$roomId]);
            $datas = $request->fetch();
            return $datas;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }
    public function messagePost($roomId, $inscriptionId, $message): mixed
    {
        try {
            $request = $this->db->prepare(
                'INSERT INTO messages (
                    message_room_id,
                    message_inscription_id,
                    message_message
                ) VALUES (?,?,?)'
            );
            $request->execute([$roomId, $inscriptionId, $message]);

            return "ok";
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return "ko";
        };
    }

    public function getMessages($roomId): mixed
    {
        try {
            $request = $this->db->prepare(
                'SELECT 
                    messages.message_id,
                    messages.message_message as message,
                    inscriptions.inscription_student_id as student_id,
                    students.student_firstname
                    FROM messages
                    INNER JOIN inscriptions ON inscriptions.inscription_id = messages.message_inscription_id
                    INNER JOIN students ON students.student_id = inscriptions.inscription_student_id
                    WHERE message_room_id = ?'
            );
            $request->execute([$roomId]);

            $datas = $request->fetchAll();
            return $datas;
        } catch (Exception $e) {
            var_dump(value: $e->getMessage());
            return null;
        };
    }

    public function deleteItem($entity, $property, $value): mixed
    {
        $sql = "DELETE FROM $entity WHERE $property = :value";
        $resp = $this->db->prepare($sql);
        $resp->execute([
            "value" => $value
        ]);

        return $resp->rowCount() > 0;
    }

    public function addCityIfNotExit($cityId, $city, $zipCode, $countryId): mixed
    {
        // Appel d'une procédure stockée SQL
        $request = $this->db->prepare('CALL AddCityIfNotExists(?,?,?,?)');
        $request->execute([$cityId, $city, $zipCode, $countryId]);

        return $request;
    }

    /* fonction générique pour modifier une ou plusieurs propriétés dans une table et index indiqués */
    public function updateFields($table, $data, $namePropertyId, $id): mixed
    {
        // formatage des propriétés a modifier et leurs valeurs en chaine de caractères pour la requete sql "prop1 = :prop1, prop2 = :prop2, ..."
        $sqlFormat = implode(separator: ", ", array: array_map(callback: fn($key): string => "$key = :$key", array: array_keys(array: $data)));

        // Construction de la requête SQL
        $sql = "UPDATE $table SET $sqlFormat WHERE $namePropertyId = :id";

        // Préparation et exécution de la requête
        $resp = $this->db->prepare($sql);
        $data["id"] = $id;

        $resp->execute($data);
        echo '<pre>';
        var_dump($resp);
        echo '<pre>';
        return $resp->rowCount() > 0;
    }
}
