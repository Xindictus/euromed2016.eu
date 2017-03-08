<?php

require_once __DIR__ . '/PaperDAO.php';

class PaperDAOImpl implements PaperDAO
{
    private $connection;

    /**
     * PaperDAOImpl constructor.
     * @param $connection
     */
    public function __construct(CustomPDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertPaper($user_id, $title, $paper_type, $course_type, $course_id, $status, $path)
    {
        if ($this->connection->isConnected() != -1) {

            try {
                $query = "INSERT INTO paper (user_id, title, paper_type, course_type, course_id, status, path) " .
                    "VALUES (:user_id, :title, :paper_type, :course_type, :course_id, :status, :path)";
                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':paper_type', $paper_type);
                $stmt->bindParam(':course_type', $course_type);
                $stmt->bindParam(':course_id', $course_id);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':path', $path);

                $stmt->execute();

                $stmt->closeCursor();

                return 0;

            } catch (PDOException $PDOException) {
                return -1;
            }
        }

        return -1;
    }

}