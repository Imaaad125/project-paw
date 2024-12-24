<?php

require_once 'C:/wamp64/www/PROJET PAW/Classes/etudiant.php';

$etudiant = new ETUDIANT();       
$profile=$etudiant->ProfileInfo();
if(isset($_POST['contact']))
 {
    $_SESSION['prn'] = $_POST['prn'];
    $_SESSION['prs'] = $_POST['prs'];
   
 }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Ask Proffessor / send question
    </title>
</head>
<body class="bg-white h-screen">
    <header class="flex sticky items-center justify-evenly bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="Request Document.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="search.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Professor Service</a>
            <a href="Quesion & Announcment.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
        </div>
        <!-- Icons -->
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "Welcom Page.php" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
            <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
    <i class="fa-solid fa-bars"></i>
</button>    <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
                  </nav>
       
<div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[110px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
    <div class="flex flex-col items-start   m-2 ">
    <span class="font-[500] p-3 text-gray-700">Personal Information :</span>
    <div class="items-center  font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><?= $profile['role']?></div>
          
    <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Name :</span> <?= $profile['name'].' '.$profile['surname']?> </div>
         <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Id :</span><?= $profile['id']?>
        </div>
        
    </div></div>
    <div id="logout" class="flex hidden absolute drop-shadow-md top-[50px] right-[155px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-auto h-auto bg-white">
    <button onclick="window.location.href='/PROJET PAW/logout.php'" class="font-[600] text-gray-500">
        Log Out
    </button>
</div>
</header>
<script>
       function logout() {

const n = document.getElementById("logout");

if (n.classList.contains('hidden')) {
    n.classList.remove('hidden');
} else {
    n.classList.add('hidden');
}}
function notification() {
    const n = document.getElementById("notification");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
}
function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
  
}
</script>

    <main class="flex flex-col items-center text-center mt-[20px] px-4 sm:px-8">
        <div class="flex justify-center items-center h-[60px] w-auto max-w-auto rounded-[20px] mx-auto bg-[#1800a0] px-[40px]">
            <span class="text-[1.5em] font-medium text-white px-[10px] py-[10px] pr-[50px] rounded-[10px]">The Selected Professor:</span>
            <div class="flex justify-center items-center gap-[10px] text-white">
                <img class="rounded-full h-[40px] w-[40px]" src="/PROJET PAW/assert/img.jfif" alt="">
                <span class="text-[1.5em]"><?= $_SESSION['prn']?></span>
                <span class="text-[1.5em]"><?= $_SESSION['prs']?></span>

            </div>
        </div>

        <span class="text-[#ff7f4d] font-semibold text-[30px] sm:text-[40px] mt-6 mb-6">Request a Service from the selected professor</span>
        
        <form action="" method="post" class="flex flex-col items-center w-full max-w-4xl">
            <div class="flex items-center gap-[10px] sm:gap-[400px] mb-6 sm:flex-row">
                <label>
                    <input type="radio" name="option" value="1" class="hidden peer" required >
                    <div class="w-[250px] h-[85px] p-auto bg-[#002D62] rounded-[10px] peer-checked:border-[4px] peer-checked:border-[#ff7f4d] flex flex-col items-center justify-center gap-[5px]">
                        <img class="h-[40px] w-[40px]" src="/PROJET PAW/assert/2PS.jpg" alt="" />
                        <span class="text-[1.3em] text-white">MEET REQUEST</span>
                    </div>
                </label>

                <label>
                    <input type="radio" name="option" value="2" class="hidden peer" />
                    <div class="w-[250px] h-[85px] p-auto bg-[#002D62] rounded-[10px] peer-checked:border-[4px] peer-checked:border-[#ff7f4d] flex flex-col items-center justify-center">
                        <img class="h-[45px] w-[45px]" src="/PROJET PAW/assert/BR.jpg" alt="" />
                        <span class="text-[1.3em] text-white">GUIDANCE REQUEST</span>
                    </div>
                </label>
            </div>

            <span class="font-medium text-[25px] sm:text-[30px] text-[#ff7f4d] mb-2">Add More Details</span>
            <input required  class="px-[30px] py-[10px] w-full max-w-[1000px] h-[60px] border-none rounded-[10px] font-medium text-[1.5em] mb-[10px]" type="text" name="detailes" placeholder="Details...">
            <button type="submit" name="send" class="flex items-center justify-center w-[400px] sm:w-[500px] h-[50px] p-[10px] bg-[#002D62] rounded-[10px] border-none font-medium text-[1.5em] text-white">Send</button>
        </form>
   
<?php 
if(isset($_POST['send']))
{
     $etudiant->makeProfRequest($_POST['detailes'], $_POST['option'], $_SESSION['prn'],$_SESSION['prs']);
} 
?>
    </main>
</body>
</html>
