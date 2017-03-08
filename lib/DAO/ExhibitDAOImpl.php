<?php

require_once __DIR__ . '/ExhibitDAO.php';

class ExhibitDAOImpl implements ExhibitDAO
{
    private $connection;

    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function getExhibitStatus($exhibit_id){
        if ($this->connection->isConnected() != -1) {
            try {
                $status = $this->connection->query("SELECT exhibit_status FROM exhibit WHERE exhibit_id='$exhibit_id'")->fetchColumn();
                return $status;
            } catch (PDOException $PDOException) {
                return -1;
            }
        }
    }

    public function insertExhibit($exhibit_title, $company_name, $cost, $exhibit_status)
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $query = "INSERT INTO exhibit (exhibit_title, company_name, cost, exhibit_status) "
                    . "VALUES (:exhibit_title, :company_name, :cost, :exhibit_status)";

                $stmt = $this->connection->prepare($query);
                $stmt->execute([
                    ':exhibit_title'=>$exhibit_title,
                    ':company_name'=>$company_name,
                    ':cost'=>$cost,
                    ':exhibit_status'=>$exhibit_status
                ]);
                $stmt->closeCursor();
            }catch(PDOException $PDOException){
                return -1;
            }
        }
        return -1;
    }
}









