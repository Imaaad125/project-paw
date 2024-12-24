<?php


include 'C:/wamp64/www/PROJET PAW/Classes/User.php';

class ADMIN {
    private $conn;
    private $id;
    private $name;
    private $surname;
    private $etat;
    function __construct()
    {
        $this->conn = (new DB())->getConnection();
        $this->name = $_SESSION['adminname'];
        $this->surname = $_SESSION['adminsurname'];
        $this->id=$_SESSION['adminid'];
    }
  
   
  
  

public function SetDoquementAdminRespond($etat,$id,$type)
{
    if($etat==2)
    {
        $this->AccepteDocumentRequest($id,$type);
    }
    if($etat==3)
    {
        $this->RefuseDocumentRequest($id,$type);
    }
}
    function AccepteDocumentRequest($id,$type)
    {$currentDateTime = date('Y-m-d H:i:s');
        $sql = "UPDATE document_requrest SET ETAT = 2,RTIME=? WHERE id = ? AND TYPE=?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("sis",$currentDateTime,$id,$type);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting user: " . $this->conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
 
    }


    function RefuseDocumentRequest($id,$type)
    {$currentDateTime = date('Y-m-d H:i:s');
        $sql = "UPDATE document_requrest SET ETAT = 3,RTIME=? WHERE id = ? AND TYPE=?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("sis",$currentDateTime,$id,$type);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting user: " . $this->conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
 
    }
     function GetDocumentRequests($type = null, $annee = null)
    {
        // Base SQL query
        $sql = "SELECT 
                    document_requrest.ID, 
                    document_requrest.NAME, 
                    document_requrest.SURNAME, 
                    document_requrest.TYPE, 
                    document_requrest.QTIME 
                FROM 
                    document_requrest
                JOIN 
                    login 
                ON 
                    document_requrest.ID = login.ID 
                WHERE 
                    document_requrest.ETAT = 1";
    
        // Add WHERE conditions dynamically
        $conditions = [];
        $params = [];
        $types = "";
    
        // Handle filters
        if (!empty($annee) && $annee !== "all") {
            $conditions[] = "login.ANNEE = ?";
            $params[] = $annee;
            $types .= "s";
        }
        if (!empty($type) && $type !== "all") {
            $conditions[] = "document_requrest.TYPE = ?";
            $params[] = $type;
            $types .= "s";
        }
    
        // Append conditions to the SQL query
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }
    
        // Log SQL for debugging
        error_log("SQL Query: $sql");
        error_log("Params: " . json_encode($params));
    
        // Prepare statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters if needed
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
    
        $stmt->execute();
        $stmt->store_result();
    
        // Check if rows exist
        if ($stmt->num_rows === 0) {
            echo '<div class="text-center text-gray-500">No records found.</div>';
            return [];
        }
    
        $stmt->bind_result($id, $name, $surname, $type, $qtime);
    
        // Initialize requests array
        $requests = [];
    
        // Fetch results
        while ($stmt->fetch()) {
            // Add each row to the requests array
            $requests[] = [
                'id' => $id,
                'name' => $name,
                'surname' => $surname,
                'type' => $type,
                'qtime' => $qtime
            ];
        }
    
        // Return the array of results
        return $requests;
    }
    


    

    function GetArchive()
    {
        // Base SQL query
        $sql = "SELECT ID, NAME, SURNAME, TYPE, QTIME, RTIME,ETAT FROM document_requrest WHERE(ETAT=2 OR ETAT=3)";
       
        // Add conditions based on the filters
      
    
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $name, $surname, $type, $qtime, $rtime,$etat);
        $data = [];
        while ($stmt->fetch()) {
            $casetat = $etat == 2 ? "ACCEPTER" : "REFUSER";
    
            $data[] = [
                "name" => $name,
                "surname" => $surname,
                "type" => $type,
                "qtime" => $qtime,
                "rtime" => $rtime,
                "etat" => $casetat
            ];
        }
        return $data;
    }
  
    function SetAnnounce($title,$type) 
    {$time=date('Y-m-d H:i:s');
        $sql = "INSERT INTO admin_announce (ANNOUNCE,TITLE,TIME) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);


        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("sss",$type,$title,$time);

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
    function ProfileInfo()
    {
        $profil=[];
       return $profil[]=['name'=>$this->name,'surname'=>$this->surname,'id'=>$this->id,'role'=>'Admin'];
    }
   public function SetAdminAnswer($id,$respond,$q,$r)
    {
        if($r==1)
        {
            $this->AnswerQuestionAdmin($id,$respond,$q);
        }
        if($r==2){
            $this->RefuseQuestionAdmin($id,$respond,$q);
        }
    }
    function AnswerQuestionAdmin($id,$respond,$q)
    {$rtime = date('Y-m-d H:i:s');
        $sql = "UPDATE admin_request SET ETAT = 2 , RESPOND = ?,RTIME=? WHERE id = ? AND QUESTION =?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssis",$respond,$rtime,$id,$q);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting user: " . $this->conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
 
    }
    function RefuseQuestionAdmin($id,$respond,$q)
    {$rtime = date('Y-m-d H:i:s');
        $sql = "UPDATE admin_request SET ETAT = 3 , RESPOND = ?,RTIME=? WHERE id = ? AND QUESTION =?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssis",$respond,$rtime,$id,$q);

            // Execute the statement
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting user: " . $this->conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $this->conn->error;
        }
 
    }

    
  
    

    

    function GetQuestionsAdmin()
    {
        // Base SQL query
      
          $sql = "SELECT 
    ID, 
NAME, 
   SURNAME, 
  QUESTION, 
   QTIME 
FROM 
    admin_request 

WHERE 
    ETAT = 1
";
    
    
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters if there are any
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
   
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$name, $surname, $type,$qtime);
    $questions=[];
    while ($stmt->fetch()) {
        $questions[]= ['id' => $id , 'name' => $name , 'surname' => $surname , 'question' => $type,'qtime'=>$qtime];}
    
       return $questions;
    }
}


  




?>