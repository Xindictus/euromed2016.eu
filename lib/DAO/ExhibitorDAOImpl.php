<?php

require_once __DIR__ . '/ExhibitorDAO.php';

class ExhibitorDAOImpl implements ExhibitorDAO
{
    private $connection;

    /**
     * ExhibitorDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }


    public function insertExhibitor($user_id, $company_name, $country, $city, $postal_code)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $query = "INSERT INTO exhibitor (user_id, company_name, country, city, postal_code) " .
                    "VALUES (:user_id, :company_name, :country, :city, :postal_code)";
                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':company_name', $company_name);
                $stmt->bindParam(':country', $country);
                $stmt->bindParam(':city', $city);
                $stmt->bindParam(':postal_code', $postal_code);

                $stmt->execute();

                $stmt->closeCursor();

                return 0;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

    public function getExhibitorById($user_id)
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $stmt = $this->connection->prepare("SELECT * FROM exhibitor WHERE user_id = :user_id");
                $stmt->execute([
                    ':user_id' => $user_id
                ]);

                $exhibitor = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Exhibitor');
                $stmt->closeCursor();

                return $exhibitor;
            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function updateExhibitor($user_id, $company_name, $country, $city, $postal_code)
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $stmt = $this->connection->prepare("UPDATE exhibitor SET company_name = :company_name, country = :country, city = :city,  postal_code = :postal_code WHERE user_id = :user_id");

                $stmt->execute([
                    ':company_name'=> $company_name,
                    ':country'=> $country,
                    ':city'=> $city,
                    ':postal_code' => $postal_code,
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