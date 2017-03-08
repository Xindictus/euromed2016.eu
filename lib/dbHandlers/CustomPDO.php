<?php

/**
 * Class CustomPDO
 *
 * This class expands the constructor of PDO with further options
 */
class CustomPDO extends PDO
{
    /**
     * @var int $isConnected : 1 for connected, 0 for not connected
     */
    private $isConnected = -1;

    /**
     * CustomPDO constructor.
     * @throws \PDOException
     */
    public function __construct()
    {
        /**
         * Load settings
         */
        $settings = include __DIR__ . '/settings.php';

        /**
         * Set PHP timezone.
         */
        $timezone = $settings['timezone'];
        date_default_timezone_set($timezone);

        /**
         * Get Database
         */
        $database = $settings['database'];

        /**
         * Check if $database is set.
         */
        try {
            if (isset($database) && !empty($database)) {

                /**
                 * Gets the connection flags.
                 */
                $flags = $settings['flags'];

                /**
                 * Create a new database and
                 * set the attributes of errors and
                 * emulated prepared statements.
                 */
                parent::__construct("{$settings['driver']}:host={$settings['host']};
                        port={$settings['port']};dbname={$database};",
                    $settings['username'], $settings['password'], $flags);

                /**
                 * Set CHARACTER SET
                 */
                $this->exec("SET CHARACTER SET {$settings['charset']}");

                /**
                 * Set SQL timezone.
                 */
//                 $this->exec("SET time_zone = '{$timezone}'");

                /**
                 * Update $isConnected value.
                 */
                $this->isConnected = 0;

            } else {
                throw new PDOException("Error");
            }
        } catch (\PDOException $customPDOException) {
//            echo $customPDOException->getMessage();
            return -1;

        }

        return 0;
    }

    /**
     * @return int: Returns the status of the connection
     */
    public function isConnected()
    {
        return $this->isConnected;
    }
}
