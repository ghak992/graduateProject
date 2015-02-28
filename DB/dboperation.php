<?php

class dboperation {

    public static function logIn($useremail, $userpass) {
        $data = array("status" => "false", "message" => "");
        try {
//            include_once './config.php';

            define("DB_HOST", "localhost");
            define("DB_USERNAME", "root");
            define("DB_PASSWORD", "");
            define("DB_NAME", "oman_tourism_guide");

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT count(*) as find FROM admin WHERE admin_email = :useremail');
            $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $find;
            foreach ($result as $row) {
                $find = ($row['find'] == 0) ? false : true;
            }

            if ($find == FALSE) {
//                if the email not find on the database
                $data["message"] = "email not find on the database";
            } else {
                $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_email = :useremail");
                $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $stmt->execute();
                $pass = $stmt->fetch(PDO::FETCH_ASSOC);
                include_once '../class/cryptpass.php';

                if (decrypt_pass($userpass, $pass['admin_password'])) {
                    $query = 'SELECT admin_id, admin_type.admintype_name as level, '
                            . ' admin_name '
                            . ' FROM admin, admin_type WHERE '
                            . 'admin_email = :useremail and '
                            . 'admin_type.admintype_id = admin.admin_type';
                    $stmt = $dbh->prepare($query);
                    $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    session_start();


                    $_SESSION['login-admin-name'] = $row['admin_name'];
                    $_SESSION['login-admin-id'] = $row['admin_id'];
                    $_SESSION['login-admin-email'] = $useremail;
                    $_SESSION['login-admin-level'] = $row['level'];
                    $_SESSION['login'] = true;


                    $data["message"] = "some message";
                    $data["status"] = "true";

                    //inserted repor
//                    require_once 'ActionReport.php';
//                    DB_operation::action_report(LOGIN);
                } else {
                    //                if the password is wrong
                    $data["message"] = "password is wrong";
                }
            }
//            close the database connection
            $dbh = null;
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            //            print the data in json format
            echo json_encode($data);
        }
    }

    public static function getPlacesTypes() {
        try {
            
            //            include_once './config.php';

            define("DB_HOST", "localhost");
            define("DB_USERNAME", "root");
            define("DB_PASSWORD", "");
            define("DB_NAME", "oman_tourism_guide");
            
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT place_id, place_name FROM place_type WHERE 1";
            $getPlacesTypes = array();
            foreach ($dbh->query($sql) as $row) {
                $id = $row['place_id'];
                $type = $row['place_name'];
                $getPlacesTypes[$id] = $type;
            }

            return $getPlacesTypes;

            /*             * * close the database connection ** */
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    
    public static function newPlace($place_name, $place_type, $address, $location_lat, $location_lng, $view, $description, $room) {


        if (isset($_SESSION['login'])) {
            if (!$_SESSION['login']) {
                return FALSE;
            }
        } else {
            return FALSE;
        }

        require_once 'DB_coninfo.php';
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
                or die(mysqli_error($conn));
        $conn->set_charset('UTF-8');
        $conn->query('SET NAMES utf8');
        $query = 'INSERT INTO event (event_id, event_title, event_start_date,'
                . ' event_reg_limit, poster_link, event_add_date, presenter, '
                . 'description, room) VALUES (NULL, ?, ?, '
                . '?, ?, CURRENT_TIMESTAMP, ?, ?, ?)';
        $upPoster = DB_operation::uploadEventPoster($poster);
        $stmt = $conn->prepare($query) or die(mysql_error());
        $stmt->bind_param('ssisssi', strval($event_title), strval($event_start_date), intval($event_reg_limit), strval($upPoster["link"]), strval($presenter), strval($description), intval($room));
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            include_once 'ActionReport.php';
            DB_operation::action_report(NEW_EVENT . " : " . $event_title);
            return TRUE;
        } else {
            return FALSE;
        }
        $conn->close();
    }

}
