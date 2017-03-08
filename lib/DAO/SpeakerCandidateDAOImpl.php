<?php

require_once __DIR__ . '/SpeakerCandidateDAO.php';

class SpeakerCandidateDAOImpl implements SpeakerCandidateDAO
{
    private $connection;

    /**
     * SpeakerCandidateDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $user_id
     * @param $university
     * @param $faculty
     * @param $stud_level
     * @return int
     */
    public function insertCandidate($user_id, $university, $faculty, $stud_level)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $query = "INSERT INTO speaker_candidate (user_id, university, faculty, stud_level) " .
                    "VALUES (:user_id, :university, :faculty, :stud_level)";
                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':university', $university);
                $stmt->bindParam(':faculty', $faculty);
                $stmt->bindParam(':stud_level', $stud_level);

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
                $stmt = $this->connection->prepare("SELECT * FROM speaker_candidate WHERE user_id = :user_id");
                $stmt->execute([
                    ':user_id' => $user_id
                ]);

                $exhibitor = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'SpeakerCandidate');
                $stmt->closeCursor();

                return $exhibitor;
            } catch (PDOException $PDOException) {
                return -1;
            }
        }
        return -1;
    }

    public function updateSpeakerCandidate($user_id, $university, $faculty, $stud_level)
    {
        if ($this->connection->isConnected() != -1) {
            try {
                $stmt = $this->connection->prepare("UPDATE speaker_candidate SET university = :university, faculty = :faculty, stud_level = :stud_level WHERE user_id = :user_id");

                $stmt->execute([
                    ':university'=> $university,
                    ':faculty'=> $faculty,
                    ':stud_level'=> $stud_level,
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