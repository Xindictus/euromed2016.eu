<?php

require_once __DIR__ . '/SpeakersDAO.php';

class SpeakersDAOImpl implements SpeakersDAO
{
    private $connection;

    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectAll(){

        if($this->connection->isConnected()!=-1){
            try{
                $query = "SELECT speaker_id, fullname, title, keynote, image_path FROM speaker";

                $stmt = $this->connection->prepare($query);

                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Speaker');

                $stmt->closeCursor();

                return $result;
            }catch (PDOException $PDOException){
                return -1;
            }
        }
        return -1;
    }

    public function selectById($speaker_id){

        if($this->connection->isConnected()!=-1){
            try{
                $query = "SELECT * FROM speaker WHERE speaker_id = :speaker_id";
                $stmt = $this->connection->prepare($query);
                $stmt->execute([
                    ':speaker_id'=>$speaker_id
                ]);
                $speaker = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Speaker');
                $stmt->closeCursor();
                return $speaker;
            }catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function selectKeynote()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT speaker_id, fullname, title FROM speaker WHERE keynote = '1'");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Speaker');

                $stmt->closeCursor();
                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function selectNonKeynote()
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $stmt = $this->connection->prepare("SELECT speaker_id, fullname, title FROM speaker WHERE keynote = '0'");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Speaker');

                $stmt->closeCursor();
                return $result;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }


}