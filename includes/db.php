<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class DataBase {

    private $hostname = '';
    private $user = '';
    private $password = '';
    private $database = '';

    private $mysqli;

    public $table = 'companies'; // id | title | content | timestamp

    public function __construct( $hostname, $user, $password, $database ) {
        $this->hostname = $hostname;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->classInitial();
    }

    public function __destruct() {
        mysqli_close($this->mysqli);
    }

    private function classInitial() {

        $this->mysqli = mysqli_connect($this->hostname,$this->user,$this->password, $this->database);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }

        if( ! $this->is_table_exist() ) {
            $this->createDBTable();
            $this->setDefaultValues();
        }

    }

    private function is_table_exist() {

        $checktable = mysqli_query($this->mysqli, "SHOW TABLES LIKE '%{$this->table}%'");
        $result = mysqli_num_rows($checktable) > 0;

        return $result;
    }

    private function createDBTable() {

        $sql = "CREATE TABLE {$this->table} (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            content VARCHAR(30) NOT NULL,
            date VARCHAR(30) NOT NULL
            )";

        if ( $this->mysqli->query($sql) ) {
            echo 'create table is succesfully';
        } else {
            echo 'something is wrong - create table ';
        }

    }

    private function setDefaultValues() {
        // insert test companies to DB

        $title = 'Post title';
        $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim facilis magnam nisi perspiciatis vero. Amet, delectus, eaque eius explicabo fugiat illum iure modi necessitatibus possimus quod tempora veritatis vero vitae.';

        $this->insertDataInDB ( $title, $content );

    }

    public function insertDataInDB ( $title, $content ) {

        $timestamp = date("Y-m-d H:i:s");
        $sql = "INSERT INTO {$this->table} (`id`, `title`, `content`, `date`) VALUES ('', '$title', '$content', '$timestamp')";

        $this->mysqli->query($sql);

    }


    public function get_list_emails() {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->mysqli->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;

    }


    private function getTestDeliveryPrices( $company_name ) {

        if(empty($this->sourceKladr) || empty($this->targetKladr) || $this->weight == 0) return [];

        $sql = "SELECT * FROM `companies` WHERE `company_name` = '$company_name'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $price = $row['price'];
                $date = $row['date'];
                $error = $row['error'];
            }
        }

        $array = [
            $price => round(rand(1000, 9900) / 100, 2),
            $date  => rand(3, 15),
            $error => ''
        ];

        return json_encode($array);
    }


    public function getFormErrors() {

        if( isset($_POST['form_request']) && !empty($this->error ) ) {

            ob_start();
            ?>

            <div class="alert alert-danger" role="alert">
                <?= $this->error?>
            </div>

            <?php
            return ob_get_clean();
        }
    }

    public function getFormForRequest() {
        ob_start();

        $sourceKladr = $_POST['sourceKladr'] ?? '';
        $targetKladr = $_POST['targetKladr'] ?? '';
        $weight = $_POST['weight'] ?? 0;

        ?>

        <h3>Рассчитать доставку:</h3>
        <form action='' method="POST">
            <div class="mb-3">
                <label for="sourceKladr" class="form-label">From: </label>
                <input type="text" name="sourceKladr" class="form-control" id="sourceKladr" value="<?=$sourceKladr?>">
            </div>
            <div class="mb-3">
                <label for="targetKladr" class="form-label">To: </label>
                <input type="text" name="targetKladr"  class="form-control" id="targetKladr" value="<?=$targetKladr?>">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight: </label>
                <input type="number" name="weight" class="form-label" id="weight" value="<?=$weight?>">
            </div>
            <button type="submit" name="form_request" class="btn btn-primary">Submit</button>
        </form>

        <?php
        return ob_get_clean();

    }



}

