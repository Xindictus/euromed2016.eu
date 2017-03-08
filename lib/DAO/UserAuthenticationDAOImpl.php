<?php

require_once __DIR__ . '/UserAuthenticationDAO.php';

class UserAuthenticationDAOImpl implements UserAuthenticationDAO
{
    private $connection;

    /**
     * UserAuthenticationDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertAuthentication($user_id, $username, $user_pass)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $query = "INSERT INTO user_authentication (user_id, username, user_pass) " .
                    "VALUES (:user_id, :username, :user_pass)";
                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':user_pass', $user_pass);

                $stmt->execute();

                $stmt->closeCursor();

                return 0;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

    public function checkLogin($email, $pass)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT * FROM user_authentication WHERE username = :username");
                $stmt->execute([
                    ':username' => $email
                ]);

                $rows = $stmt->fetchAll();

                if (count($rows) == 0) {
                    return -1;
                }

                $stmt->closeCursor();

                $hash = "";
                if (is_array($rows))
                    $hash = $rows[0]['user_pass'];

                if (password_verify($pass, $hash))
                    return 0;
                else
                    return -1;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

    public function updateEmail($user_id, $username)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("UPDATE user_authentication SET username = :username WHERE user_id = :user_id");
                $stmt->execute([
                    ':user_id' => $user_id,
                    ':username' => $username
                ]);

                $stmt->closeCursor();

                return 0;

            }catch (PDOException $PDOException){
                return -1;
            }
        }
        return -1;
    }

    public function updateAllFields($user_id, $username, $user_pass){

        if ($this->connection->isConnected() != -1) {

            $user_pass = password_hash($user_pass, PASSWORD_BCRYPT);

            try {
                $stmt = $this->connection->prepare("UPDATE user_authentication SET username = :username, user_pass = :user_pass WHERE user_id = :user_id");
                $stmt->execute([
                    ':user_id' => $user_id,
                    ':username' => $username,
                    ':user_pass' => $user_pass
                ]);

                $stmt->closeCursor();

                return 0;

            }catch (PDOException $PDOException){
                return -1;
            }
        }
        return -1;
    }

}