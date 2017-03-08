<?php

require_once __DIR__ . '/WorkshopDAO.php';

class WorkshopDAOImpl implements WorkshopDAO
{
    private $connection;

    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectById($workshop_id)
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $stmt = $this->connection->prepare("SELECT * FROM workshop WHERE workshop_id = :workshop_id");
                $stmt->execute([
                    ':workshop_id' => $workshop_id
                ]);
                $workshop = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Workshop');
                $stmt->closeCursor();
                return $workshop;
            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function getAllWorkshops()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT * FROM workshop");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Workshop');

                $stmt->closeCursor();
                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function getCount()
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $count = $this->connection->query('SELECT count(*) FROM workshop')->fetchColumn();

                return $count;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function getTitles()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT workshop_id, workshop_title FROM workshop");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Workshop');

                $stmt->closeCursor();
                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }
}