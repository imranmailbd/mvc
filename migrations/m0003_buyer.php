<?php


class m0003_buyer{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE buyers (
                id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
                amount INT(10) NOT NULL,
                buyer VARCHAR(255) NOT NULL,
                receipt_id VARCHAR(20) NOT NULL,
                items VARCHAR(255) NOT NULL,
                buyer_email VARCHAR(50) NOT NULL,
                buyer_ip VARCHAR(20),
                note text NOT NULL,
                city VARCHAR(20) NOT NULL,
                phone VARCHAR(20) NOT NULL,  
                hash_key VARCHAR(255),  
                entry_at date,
                entry_by INT(10) NOT NULL  
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE buyers";
        $db->pdo->exec($SQL);
    }
}