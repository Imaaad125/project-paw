<?php


include 'C:/wamp64/www/PROJET PAW/Classes/User.php';
class PROF {
    private $conn;
    private $id;
    private $name;
    private $surname;

    public function __construct() {
        // Use the DB class for connection
        $this->conn = (new DB())->getConnection();
        $this->id = $_SESSION['profid'] ;
        $this->name = $_SESSION['profname'] ;
        $this->surname = $_SESSION['profsurname'] ;
    }


  

   

    public function getMeetRequests() {
        return $this->getRequestsByType(1); // Type 1 represents 'MEET' requests
    }
    
    public function getGuidanceRequests() {
        return $this->getRequestsByType(2); // Type 2 represents 'GUIDANCE' requests
    }
    
    private function getRequestsByType($type) {
        $sql = "SELECT ID, NAME, SURNAME, DETAILES , QTIME
                FROM proff_request 
                WHERE PRNAME = ? AND PRSURNAME = ? AND TYPE=? AND ETAT=2 ";
        $stmt = $this->conn->prepare($sql);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error); // Debugging for development
        }
    
        $stmt->bind_param("ssi", $this->name, $this->surname, $type);
        $stmt->bind_result($eid, $ename, $esurname, $details,$qtime);
        $stmt->execute();
        $requests = [];
        while ($stmt->fetch()) {
            $requests[] = [
                'eid' => $eid,
                'ename' => $ename,
                'esurname' => $esurname,
                'detailes' => $details,
                'qtime'=>$qtime
            ];
        }
    
  
        return $requests;
    }
    
    function ProfileInfo()
    {
        $profil=[];
       return $profil[]=['name'=>$this->name,'surname'=>$this->surname,'id'=>$this->id,'role'=>'Proferssor'];
    }
    public function setRequestResponse($id,$d, $etat,$r) {
        $rtime = date('Y-m-d H:i:s');
        $sql = "UPDATE proff_request SET ETAT = ?,RESPOND=?,RTIME=? WHERE ID=? AND DETAILES = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issis", $etat,$r,$rtime,$id, $d);
        return $stmt->execute();
    }

   
}
?>
