<?php

require_once __DIR__ . '/PlatformUserDAO.php';

class PlatformUserDAOImpl implements PlatformUserDAO
{
    private $connection;

    /**
     * PlatformUserDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertPlatformUser($first_name, $last_name, $father_name,
                                       $email, $role)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $query = "INSERT INTO platform_user (first_name, last_name, father_name, email, role) " .
                    "VALUES (:first_name, :last_name, :father_name, :email, :role)";
                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':first_name', $first_name);
                $stmt->bindParam(':last_name', $last_name);
                $stmt->bindParam(':father_name', $father_name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':role', $role);

                $stmt->execute();

                $stmt->closeCursor();

                return 0;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }


    public function selectById($user_id)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT * FROM platform_user WHERE user_id = :user_id");
                $stmt->execute([
                    ':user_id' => $user_id
                ]);

                $user = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PlatformUser');

                $stmt->closeCursor();

                return $user;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;

    }

    public function selectByEmail($email)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT user_id, first_name, last_name, role FROM platform_user WHERE email = :email");
                $stmt->execute([
                    ':email' => $email
                ]);

                $user = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PlatformUser');

                $stmt->closeCursor();

                return $user;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;

    }


    public function getAllUsers()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT * FROM platform_user");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PlatformUser');

                $stmt->closeCursor();

                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

    public function checkMail($email)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT * FROM platform_user WHERE email = :email");
                $stmt->execute([
                    ':email' => $email
                ]);

                $rows = $stmt->fetchAll();

                if (count($rows) == 0) {
                    return -1;
                }

                $stmt->closeCursor();

                return 0;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

    public function updateAllFields($user_id, $first_name, $lastName, $fatherName, $email){
        if ($this->connection->isConnected() != -1) {
            try {
                $stmt = $this->connection->prepare("UPDATE platform_user SET first_name = :firstName, last_name = :lastName, father_name = :fatherName, email = :email WHERE user_id = :user_id");

                $stmt->execute([
                    ':firstName'=> $first_name,
                    ':lastName'=> $lastName,
                    ':fatherName'=> $fatherName,
                    ':email' => $email,
                    ':user_id'=> $user_id
                ]);

                $stmt->closeCursor();

                return 0;
            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }
}