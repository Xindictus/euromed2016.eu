<?php

require_once __DIR__ . '/PanelDAO.php';

class PanelDAOImpl implements PanelDAO
{
    private $connection;

    /**
     * PanelDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function getTitles()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT panel_id, panel_title FROM panel");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Panel');

                $stmt->closeCursor();
                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }
}