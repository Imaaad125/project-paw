<?php

include 'C:/wamp64/www/PROJET PAW/Classes/PR.php';

$profR = new PROF();
$profile=$profR->ProfileInfo();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>PROF WELCOME</title>
</head>
<body class="bg-[#FFFFFF]  overflow-y-hidden">
    <header class="flex sticky items-center h-auto justify-between bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col my-[19px] ml-[40px] items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[32px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex ">
            <a href="Guidance Request.php" class="text-white text-[18px] font-medium sm:text-[25px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[90px] pt-[29px] pb-[24px]">Guidance Request</a>
            <a href="Meet Requests.php" class="text-white text-[18px] font-medium sm:text-[25px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[90px] pt-[29px] pb-[24px]">Meet Request</a>
                  </div>
        <!-- Icons -->
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
            <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
    <i class="fa-solid fa-bars"></i>
</button>     <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
                  </nav>
</div>
<div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[110px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
    <div class="flex flex-col items-start   m-2 ">
    <span class="font-[500] p-3 text-gray-700">Personal Information :</span>
    <div class="items-center  font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700"></span><?= $profile['role']?></div>
          
    <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Name :</span> <?= $profile['name'].' '.$profile['surname']?> </div>
         <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Id :</span><?= $profile['id']?></div>
        
    </div> </div>
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

        function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
  
}
</script>
    

      <div class="flex flex-col">  <h2 class="flex text-[#002d62] mt-8 mx-auto font-bold text-[48px]">STUDENT SERVICE</h2>
        <p  class="flex text-[#365983] text-[25px] mx-auto p-[100px] text-[400] text-[20px] " >
          This portal efficiently reduces bureaucratic inefficiencies, enhancing satisfaction for students, staff, and professors. By centralizing and automating requests, Student Service minimizes issues associated with manual procedures, fostering a more efficient and stress-free academic environment.
        
        </p></div>
      </div>
    </div>

   
  </body>
</html>
