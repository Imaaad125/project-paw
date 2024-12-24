<?php
include 'C:/wamp64/www/PROJET PAW/Classes/User.php';
class ETUDIANT 
{
    private $conn;
    private $id;
    private $name;
    private $surname;

    function __construct()
    {
        $this->conn = (new DB())->getConnection();
        $this->name = $_SESSION['etudiantname'];
        $this->surname = $_SESSION['etudiantsurname'];
        $this->id=$_SESSION['etudiantid'];
    }
    public function GetEtat($type) {
        $sql = "SELECT ETAT FROM document_requrest WHERE TYPE = ? AND ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $type, $this->id);
        $stmt->execute();
        $stmt->bind_result($etatt);
        if ($stmt->fetch()) {
            return $etatt;
        } else {
            return null; 
        }
    }
  
    
    function ProfileInfo()
    {
        $profil=[];
       return $profil[]=['name'=>$this->name,'surname'=>$this->surname,'id'=>$this->id,'role'=>'Etudiant'];
    }
    public function getProfAnswers() {
        $sql = "SELECT ETAT, DETAILES, PRNAME, PRSURNAME, RESPOND,RTIME FROM proff_request WHERE ID = ? AND (ETAT = 4 OR ETAT = 3)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$this->id);
        
        $stmt->bind_result($etat, $detailes,$prname,$prsurname,$respond,$rtime);
        $stmt->execute();
        $responses = [];
        while ($stmt->fetch()) {
            $responses[] = ['etat' => $etat, 'detailes' => $detailes,'prname' => $prname, 'prsurname' => $prsurname, 'respond' => $respond,'rtime'=>$rtime];
        }
        return $responses;
    }
   
    public function getAllProfNames() {
        $sql = "SELECT NAME, SURNAME FROM login WHERE ROLE='PROF'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_result($name, $surname);
        $stmt->execute();

        $professors = [];
        while ($stmt->fetch()) {
            $professors[] = ['name' => $name, 'surname' => $surname];
        }
        return $professors;
    }
    function GetAnnounces ()
    {
        $sql = "SELECT ANNOUNCE,TITLE,TIME FROM admin_announce";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($type,$title,$time);
        $Announces=[];
        while ($stmt->fetch()) {
         $Announces[]=['announce'=>$type, 'title'=>$title,'time'=>$time];
    }
return $Announces;
}
    public function makeProfRequest($text, $type, $prName,$prSurname) 
    {$qtime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO proff_request (ID, NAME, SURNAME, DETAILES, PRNAME,PRSURNAME,ETAT, TYPE,QTIME) VALUES ( ?, ?, ?, ?, ?, ?, 2, ?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssss", $this->id, $this->name, $this->surname,$text, $prName,$prSurname, $type,$qtime);
        if (!$stmt->execute()) {
            die("Error inserting data: " . $this->conn->error);
        }
        
    }
    
    function EtatDocumentRequest($type)
    {
        // SQL query to fetch the document state
        $sql = "SELECT ETAT FROM document_requrest WHERE ID = ? AND NAME = ? AND SURNAME = ? AND TYPE = ?";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt === false) {
            // Error with preparing the statement
            error_log("Prepare failed: " . $this->conn->error);
            return null; // or handle error appropriately
        }
        
        // Bind the parameters
        $stmt->bind_param("isss", $this->id, $this->name, $this->surname, $type); // Changed to 'ssss' assuming all are strings
        
        // Execute the statement
        if (!$stmt->execute()) {
            // Error executing the query
            error_log("Execute failed: " . $stmt->error);
            return null; // or handle error appropriately
        }
        
        // Bind the result
        $stmt->bind_result($etat);
        
        // Fetch the result
        if ($stmt->fetch()) {
            return $etat; // Return the value of ETAT
        } else {
            return null; // No result found
        }
    }
    
  
    public function AskAdmin($type) 
    {$qtime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO admin_request (ID, NAME, SURNAME, QUESTION, ETAT,QTIME) VALUES (?, ?, ?, ?, 1,?)";
        $stmt = $this->conn->prepare($sql);


        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("issss", $this->id, $this->name, $this->surname, $type,$qtime);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting request: " . $this->conn->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
    }
    public function GetAdminAnswers()
    {
        $sql = "SELECT ID, NAME, SURNAME, QUESTION, ETAT ,RESPOND,QTIME,RTIME FROM admin_request WHERE (ETAT = 2 OR ETAT = 3)";
        $stmt = $this->conn->prepare($sql);
    
        if ($stmt) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $name, $surname, $question, $etat,$respond,$qtime,$rtime);
    
            $responses = [];
            while ($stmt->fetch()) {
                $responses[] = [
                    'id' => $id,
                    'name' => $name,
                    'surname' => $surname,
                    'question' => $question,
                    'etat' => $etat,
                    'respond' => $respond,
                    'qtime'=>$qtime,
                    'rtime'=>$rtime

                ];
            }
            $stmt->close();
            return $responses;
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
            return [];
        }
    }
    public function SetDocumentRequest($type) 
    {$currentDateTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO document_requrest (ID, NAME, SURNAME, TYPE, ETAT,QTIME) VALUES (?, ?, ?, ?, 1,?)";
        $stmt = $this->conn->prepare($sql);


        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("issss", $this->id, $this->name, $this->surname, $type,$currentDateTime);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting request: " . $this->conn->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
    }
}
?>