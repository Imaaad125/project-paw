<?php


require_once 'C:/wamp64/www/PROJET PAW/Classes/etudiant.php';

$etudiant = new ETUDIANT();
$profile=$etudiant->ProfileInfo();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Welcom Page</title>
</head>
<body class="bg-[white] ">
    <header class="flex sticky top-0 z-0 items-center justify-evenly bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 te xt-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="Request Document.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="search.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Professor Service</a>
            <a href="Quesion & Announcment.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
        </div>
        <!-- Icons -->
        <nav class="flex flex-col mr-7 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "Welcom Page.php" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
             <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
    <i class="fa-solid fa-bars"></i>
</button>      <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
                  </nav>
     
<div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[97px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
    <div class="flex flex-col items-start   m-2 ">
    <span class="font-[500] p-3 text-gray-700">Personal Information :</span>
    <div class="items-center  font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700"></span><?= $profile['role']?></div>
          
    <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Name :</span> <?= $profile['name'].' '.$profile['surname']?> </div>
         <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Id :</span><?= $profile['id']?></div>
        
    </div></div>
    <div id="logout" class="flex hidden absolute drop-shadow-md top-[50px] right-[145px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-auto h-auto bg-white">
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
function toggleNotification() {
    const notification = document.getElementById("notification");
    notification.classList.toggle('hidden');
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

    <body class="bg-white">
        <!-- Header Section -->
        <div class="px-8 py-16 text-center">
            <h1 class="text-[#002D62] text-[40px] font-bold mb-6">WELCOME TO OUR STUDENT SERVICE</h1>
            <p class="text-[#002D62C7] text-[30px] font-medium mb-10 sm:px-[130px]">
                This portal efficiently reduces bureaucratic inefficiencies, enhancing satisfaction for students, staff, and professors. By centralizing and automating requests, Student Service minimizes issues associated with manual procedures, fostering a more efficient and stress-free academic environment.
            </p>
            <img class="WPIMG h-[250px] w-[250px] float-right mr-[100px] mb-[50px]" src="/PROJET PAW/assert/12219844_4884147 1.jpg" alt="">
    <br><br><br><br><br><br><br><br><br><br><br>
            <!-- Objective Section -->
            <h1 class="text-[#002D62] text-[40px] font-bold mt-[100px] mb-[30px]">OBJECTIVE</h1>
            <p class="SS text-[#012652] text-[32px] font-semibold">
                Student Service is designed to streamline the process of requesting and managing various student services. This online portal provides a user-friendly interface for students and administrators, making it easier and more efficient to handle requests for documents, ask questions, or request services such as project guidance from teachers.
            </p>
            
            <!-- Services Section -->
            <h1 class="text-[#002D62] text-[40px] font-bold mt-[100px] mb-[30px]">Our Services</h1>
            
            <nav class="BUT flex justify-center space-x-8 mb-[200px]">
                <button class="h-[80px] w-[220px] rounded-[15px] bg-[#284E7B] text-white text-[22px] font-medium">
                    Document Request
                </button>
                <button class="h-[80px] w-[220px] rounded-[15px] bg-[#284E7B] text-white text-[22px] font-medium">
                    Professor Request
                </button>
                <button class="h-[80px] w-[220px] rounded-[15px] bg-[#284E7B] text-white text-[22px] font-medium">
                    Answer Request
                </button>
            </nav>
        </div>

</body>
</html>

