<?php

require_once 'C:/wamp64/www/PROJET PAW/Classes/etudiant.php';
$etudiant = new ETUDIANT();
$etu = new ETUDIANT();
$profile=$etudiant->ProfileInfo();

if (isset($_POST['sub'])) {
    $type = $_POST['type']; // Get the type value from the form
   
    
    $etu->SetDocumentRequest($type);
    
    // Debugging line to ensure we're redirecting
   
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit; // Ensure no further code is executed after the redirect
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Request Document</title>
</head>




<body  class="bg-white">
    <header class="flex sticky items-center justify-evenly bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="search.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Professor Service</a>
            <a href="Quesion & Announcment.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
        </div>
        <!-- Icons -->
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px]">
            <a href="Welcom Page.php"  class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
             
            
                <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
                <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
    <i class="fa-solid fa-bars"></i>
</button> 
       
            </nav>
       
<div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[110px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
    <div class="flex flex-col items-start   m-2 ">
    <span class="font-[500] p-3 text-gray-700">Personal Information :</span>
    <div class="items-center  font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700"></span><?= $profile['role']?></div>
          
    <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Name :</span> <?= $profile['name'].' '.$profile['surname']?> </div>
         <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Id :</span><?= $profile['id']?></div>
        
    </div>
    </div>
  
    <div id="logout" class="flex hidden absolute drop-shadow-md top-[50px] right-[155px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-auto h-auto bg-white">
    <button onclick="window.location.href='/PROJET PAW/logout.php'" class="font-[600] text-gray-500">
        Log Out
    </button>
</div>
</header>



    <h1 class="font-[500] text-[35px] text-[#002D62] text-center  mt-8 mb-7">Request Document</h1>
   <nav class="flex flex-col items-center gap-5">
   <div class="flex flex-col w-[90%] max-w-[1100px] m-auto h-[200px] overflow-y-scroll">
    <form action="" method="post" class="flex mb-2 justify-between p-[15px] items-center rounded-md bg-gray-100 transition-colors duration-[0.1s] ease-in-out hover:bg-gray-200 hover:text-[#284E7B]">
        <span class="font-[500] text-[1.7em] sm:text-[2em]">School Certificate</span>
        <input type="hidden" value="CERTIFICAT" name="type"> 
     

<?php
// Example usage:
$etat = $etudiant->EtatDocumentRequest('CERTIFICAT'); 
?>
<button 
    id="mybutton" 
    name="sub" 
    type="submit" 
    class="disabled:bg-red-700 disabled:cursor-not-allowed sm:p-[10px_20px] p-[auto_30px] bg-[#284E7B] text-white border-none rounded-md cursor-pointer float-right text-lg w-[150px]"
    <?php echo $etat !== null && $etat !== 0 ? 'disabled' : ''; ?>>
    <?php 
    // Change button text based on the ETAT value
    
    if ($etat === null) {
        echo "Demander"; // Default state when no record exists
    } elseif ($etat === 0) {
        echo "Demander"; // Record exists but not yet processed
    } elseif ($etat === 1) {
        echo "En Attente";
    } elseif ($etat === 2) {
        echo "Accepté";
    } elseif ($etat === 3) {
        echo "Refusé";
    }
    
    ?>
</button>
    </form>

    <form action="" method="post" class="flex justify-between mb-2 p-[15px] items-center rounded-md bg-gray-100 transition-colors duration-[0.1s] ease-in-out hover:bg-gray-200 hover:text-[#284E7B]">
        <span class="font-[500] text-[1.7em] sm:text-[2em]">Attestation de bonne conduit</span>
        <input type="hidden" value="ATTESTATION" name="type"> 
     

        <?php
// Example usage:
$etat = $etudiant->EtatDocumentRequest('ATTESTATION'); // Fetch ETAT value for a specific type
?>
<button 
    id="mybutton" 
    name="sub" 
    type="submit" 
    class="disabled:bg-red-700 disabled:cursor-not-allowed sm:p-[10px_20px] p-[auto_30px] bg-[#284E7B] text-white border-none rounded-md cursor-pointer float-right text-lg w-[150px]"
    <?php echo $etat !== null && $etat !== 0 ? 'disabled' : ''; ?>>
    <?php 
    // Change button text based on the ETAT value
    
    if ($etat === null) {
        echo "Demander"; // Default state when no record exists
    } elseif ($etat === 0) {
        echo "Demander"; // Record exists but not yet processed
    } elseif ($etat === 1) {
        echo "En Attente";
    } elseif ($etat === 2) {
        echo "Accepté";
    } elseif ($etat === 3) {
        echo "Refusé";
    }
    
    
    ?>
</button>

    
    </form>
    <form action="" method="post" class="flex mb-2 justify-between p-[15px] items-center rounded-md bg-gray-100 transition-colors duration-[0.1s] ease-in-out hover:bg-gray-200 hover:text-[#284E7B]">
        <span class="font-[500] text-[1.7em] sm:text-[2em]">Relver de note</span>
        <input type="hidden" value="RELVER" name="type"> 
<?php
// Example usage:
$etat = $etudiant->EtatDocumentRequest('RELVER'); // Fetch ETAT value for a specific type
?>
<button   id="mybutton"  name="sub"   type="submit"  class="disabled:bg-red-700 disabled:cursor-not-allowed sm:p-[10px_20px] p-[auto_30px] bg-[#284E7B] text-white border-none rounded-md cursor-pointer float-right text-lg w-[150px]"
    <?php echo $etat !== null && $etat !== 0 ? 'disabled' : ''; ?>>
    <?php 
    // Change button text based on the ETAT value
    
    if ($etat === null) {
        echo "Demander"; // Default state when no record exists
    } elseif ($etat === 0) {
        echo "Demander"; // Record exists but not yet processed
    } elseif ($etat === 1) {
        echo "En Attente";
    } elseif ($etat === 2) {
        echo "Accepté";
    } elseif ($etat === 3) {
        echo "Refusé";
    }
    
?>
</button>
    </form>
</div>





           </nav>
           <div class="ml-10 mt-5 w-[230px] h-[150px]" ><img src="assert/29659818_7605998 1.jpg" alt=""></div>
    
   <script>
       function logout() {

const n = document.getElementById("logout");

if (n.classList.contains('hidden')) {
    n.classList.remove('hidden');
} else {
    n.classList.add('hidden');
}
}
function logout() {

const n = document.getElementById("logout");

if (n.classList.contains('hidden')) {
    n.classList.remove('hidden');
} else {
    n.classList.add('hidden');
}}
function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
  
}

</script>

</body>
</html>

