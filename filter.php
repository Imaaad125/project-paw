<?php

include 'C:/wamp64/www/PROJET PAW/Classes/admin.php';

$profR = new ADMIN();
$profile=$profR->ProfileInfo();
$archives=$profR->GetArchive(null,'CERTIFICAT');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#F7F7F7] h-screen" >
    <header class="flex sticky items-center h-auto justify-around bg-[#002D62] text-white ">
        
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]" aria-hidden="true"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
      
        <div class="flex">
            <a href="Admin_SeeRequests" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="MakeAnn&RespondQ" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Archive</a>
        </div>
    
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href="AdminWelcomePage" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house" aria-hidden="true"></i></a>
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
         </div> 
    </div>
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
}}</script>



<div id="archive" class=" mt-[100px] mx-auto overflow-y-scroll bg-[#F7F7F7]   w-[90%] max-h-[300px] h-auto  ">
<?php if (!empty($archives)) : ?>
            <?php foreach ($archives as $archive) : ?>
                <div id="une_case" class="flex mb-3 mx-auto justify-between rounded-xl bg-white w-[90%] h-[100px] px-6">
                    <div class="flex pl-3 gap-2 items-center">
                        <img class="w-[50px] h-[50px] rounded-full" src="/PROJET PAW/assert/img.jfif" alt="Profile Image">
                        <span class="a text-[#002D62] text-xl font-[500]">
                            <?= htmlspecialchars($archive['name']) . ' ' . htmlspecialchars($archive['surname']); ?>
                        </span>
                    </div>

                    <div class="flex justify-evenly items-center flex-col">
                        <span class="text-3xl text-[black] font-[400]">
                            <?= htmlspecialchars($archive['type']); ?>
                        </span>
                        <span class="text-xl text-[#455A64BD]">
                            <?= htmlspecialchars($archive['etat']); ?>
                        </span>
                    </div>

                    <div class="flex justify-evenly items-center flex-col">
                        <span class="text-[#455A64BD]">
                            Demander Le: <?= htmlspecialchars($archive['qtime']); ?>
                        </span>
                        <span class="text-[#455A64BD]">
                            Répondre Le: <?= htmlspecialchars($archive['rtime']); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-gray-600 text-xl">Aucune archive disponible pour l'instant.</p>
        <?php endif; ?>
<script>
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