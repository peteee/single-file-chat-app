<?php

class Chat {

    function __construct() {
        
        session_start();
        
        if(isset($_SESSION["logged_in"]) && isset($_POST["msg"])) {
            $this->StoreMessage($_POST["msg"]);
        }
        
        if(isset($_SESSION["logged_in"]) && isset($_GET["loadAll"])) {
            $this->LoadMessages();
        }
        
        if(isset($_SESSION["logged_in"]) && isset($_GET["resfreshMessages"])) {
            $this->RefreshMessages($_POST["lastMsgId"]);
        }
    }

    public function StoreMessage($msg) {

        $msg_cleaned = trim(strip_tags($msg));

        /// STORING TO DB
        // echo $msg_cleaned;
        require_once("../db/db.php");

        if($db) {
            echo("OK");

            $sql = "INSERT INTO zjhu5_messages (`message`, `uid`, `uname`) VALUES (?,?,?)";
            $inserted_rows = 0;

            if($insert_stmt = $db->prepare($sql)) {
                
                $insert_stmt->bind_param('sis', $msg_cleaned, $_SESSION["id"], $_SESSION["username"]);
                $insert_stmt->execute();
                $inserted_rows += $insert_stmt->affected_rows;

                if($inserted_rows > 0) {
                    $r_array[] = [
                        "id" => $insert_stmt->insert_id 
                    ];
                } else {
                    $r_array[] = [
                        "error" => "nothing was posted" 
                    ];
                }

                $insert_stmt->close();
            } else {
                $r_array[] = [
                    "error" => "no execute statement - query error."
                ];
            }

            $db->close();

        } else {
            $r_array[] = [
                "error" => "connection error". mysqli_connect_error() 
            ];
        }

        echo json_encode($r_array);

    }

    public function LoadMessages() {
        require_once("../db/db.php");

        if($db) {
            // echo("OK");

            $sql = "SELECT * FROM zjhu5_messages";

            if($stmt = $db->prepare($sql)) {
                
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $message, $uid, $uname);

                while($stmt->fetch()) {

                    $r_array[] = [
                        "id" => $id,
                        "message" => $message,
                        "uid" => $uid,
                        "uname" => $uname
                    ];

                }

                $stmt->close();
            } else {
                $r_array[] = [
                    "error" => "no execute statement - query error."
                ];
            }

            $db->close();

        } else {
            $r_array[] = [
                "error" => "connection error". mysqli_connect_error() 
            ];
        }

        echo json_encode($r_array);
    }

    public function RefreshMessages($lastMsgId) {
        require_once("../db/db.php");

        $r_array[] = [];

        if($db) {
            $sql = "SELECT * FROM zjhu5_messages WHERE zjhu5_messages.id > ?;";

            if($stmt = $db->prepare($sql)) {
                
                $stmt->bind_param("i", $lastMsgId);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($id, $message, $uid, $uname);

                while($stmt->fetch()) {

                    $r_array[] = [
                        "id" => $id,
                        "message" => $message,
                        "uid" => $uid,
                        "uname" => $uname
                    ];

                }

                $stmt->close();
            } else {
                $r_array[] = [
                    "error" => "no execute statement - query error."
                ];
            }

            $db->close();

        } else {
            $r_array[] = [
                "error" => "connection error". mysqli_connect_error() 
            ];
        }

        echo json_encode($r_array);
    }





}








?>