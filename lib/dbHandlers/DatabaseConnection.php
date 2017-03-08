<?php

require_once __DIR__ . '/CustomPDO.php';

/**
 * Class DatabaseConnection
 *
 * This class is used to create connection to a given database.
 */
class DatabaseConnection
{
    /**
     * @param $database
     * @return CustomPDO: returns a new CustomPDO - which extends PDO - instance
     */
    public static function startConnection()
    {
        return new CustomPDO();
    }

    /**
     * @param CustomPDO $connection : Takes a connection as an argument
     * and renders it null, thus closing the chosen connection.
     * @return int : Return 0 on success, -1 on failure.
     */
    public static function closeConnection(CustomPDO $connection)
    {
        /**
         * Check whether $connection is already null.
         */
        if ($connection == null)
            return 0;

        try {

            /**
             * Close connection
             */
            $connection = null;

        } catch (PDOException $closeException) {

            return -1;

        }

        return 0;

    }
}
