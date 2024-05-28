<?php

class Model
{
    private $db;
    public function __construct()
    {
        $host   = 'localhost';
        $dbname = 'ecftodolist';
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

    public function getPriorities()
    {
        try {
            $request = $this->db->prepare(
                'SELECT * FROM priorities'
            );
            $request->execute([]);

            $priorities = $request->fetchAll();

            return $priorities;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getStatus()
    {
        try {
            $request = $this->db->prepare(
                'SELECT * FROM status'
            );
            $request->execute([]);

            $status = $request->fetchAll();

            return $status;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function getUser($email)
    {

        try {
            $request = $this->db->prepare(
                'SELECT * FROM users WHERE user_email = ?'
            );
            $request->execute([$email]);

            $user = $request->fetch();

            return $user;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function  addTask($title, $description, $priorityId, $deadline, $userId)
    {
        try {

            $this->db->beginTransaction();

            $request = $this->db->prepare('INSERT INTO tasks (
                task_title,
                task_description,
                task_deadline
                ) VALUES (?,?,?)');
            $request->execute([$title, $description, $deadline]);

            $taskId = $this->db->lastInsertId();

            $request = $this->db->prepare('INSERT INTO users_tasks (
                user_task_user_id,
                user_task_task_id,
                user_task_priority_id
                ) VALUES (?,?,?)');
            $request->execute([$userId, $taskId, $priorityId]);

            $this->db->commit();

            return $taskId;

        } catch (Exception $e) {

            $this->db->rollBack();
            var_dump($e->getMessage());
        };
    }
    
    public function getTasks($userId)
    {
        try {
            $request = $this->db->prepare('SELECT * FROM tasks
            LEFT JOIN users_tasks ON user_task_task_id = task_id
            LEFT JOIN priorities ON priority_id = users_tasks.user_task_priority_id
            LEFT JOIN status ON status_id = users_tasks.user_task_status_id
            WHERE users_tasks.user_task_user_id = ?');
            $request->execute([$userId]);

            $tasks = $request->fetchAll();
            
            return $tasks;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return null;
        };
    }

    public function deleteTask($taskId) {
        try {

            $this->db->beginTransaction();

            $request = $this->db->prepare('DELETE FROM users_tasks WHERE user_task_task_id = ?');
            $request->execute([$taskId]);

            $request = $this->db->prepare('DELETE FROM tasks WHERE task_id = ?');
            $request->execute([$taskId]);

            $this->db->commit();

            return true;

        } catch (Exception $e) {

            $this->db->rollBack();
            var_dump($e->getMessage());
            return false;
        };
    }

    public function changeStatusTask($taskId, $statusId) {
        try {

            $this->db->beginTransaction();

            $request = $this->db->prepare('UPDATE users_tasks SET user_task_status_id = ? WHERE users_tasks.user_task_id = ?');
            $request->execute([$statusId, $taskId]);

            $this->db->commit();

            return true;

        } catch (Exception $e) {

            $this->db->rollBack();
            var_dump($e->getMessage());
            return false;
        };
    }
}
