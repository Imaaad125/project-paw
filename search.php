<?php


require_once 'C:/wamp64/www/PROJET PAW/Classes/etudiant.php';

$etudiant = new ETUDIANT();
$profile=$etudiant->ProfileInfo();
$professors = $etudiant->getAllProfNames();
$responses=$etudiant->getProfAnswers();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Ask Profff / search</title>
</head>

<body class="bg-white overflow-y-scroll h-full">
    <header class="flex sticky items-center justify-evenly bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav  class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="Request Document.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Professor Service</a>
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
}}
function notification() {
    const n = document.getElementById("notification");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
}
function switchToSection(section) {
            const answer = document.getElementById('showAnwsers');
            const ask = document.getElementById('AskQuestion');
            
            // Hide both sections initially
            ask.classList.add('hidden');
            answer.classList.add('hidden');
            
            // Show the selected section based on the button clicked
            if (section === 'showAnwsers') {
                ask.classList.remove('hidden');
            } else if (section === 'AskQuestion') {
                answer.classList.remove('hidden');
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


 <div class=" flex justify-between mx-auto my-[30px] w-[1000px]">
    <button  onclick="switchToSection('showAnwsers')"  class= " bg-[#002D62]  text-3xl text-white focus:text-[#002D62] focus:border-[#002D62] focus:bg-white focus:border-[2px]  justify-content-between  px-5 py-2  rounded-full ">Ask Questions</button>
    <button onclick="switchToSection('AskQuestion')" class= " bg-[#002D62]  text-3xl text-white focus:border-[#002D62] focus:text-[#002D62] focus:border-[#002D62] focus:bg-white focus:border-[2px]  justify-content-between  px-5 py-2  rounded-full ">Show Answers</button>
    </div>
   
    
    <nav id="AskQuestion" class="hidden mx-auto w-[90%] sm:w-full max-w-[1100px] flex flex-col mb-[40px]  items-center h-[240px]">
        <div class="relative flex flex-col w-full rounded-xl bg-white max-w-[1100px] mx-auto h-[auto overflow-y-auto ">
           
            <div class="container mx-auto">
            <?php foreach ($professors as $prof): ?>
<form method="post" action="send question.php" class="p-4 bg-gray-100 my-4 rounded-md flex justify-between items-center">
    <span class="text-xl font-medium"><?= htmlspecialchars($prof['name']) . ' ' . htmlspecialchars($prof['surname']); ?></span>
    <input type="hidden" name="prn" value="<?= $prof['name'] ?>">
    <input type="hidden" name="prs" value="<?= $prof['surname'] ?>">     
    <button type="submit" name="contact" class="sm:p-[10px_40px] bg-[#002D62] py-2 px-4 text-white border-none rounded-[5px] cursor-pointer float-right text-lg sm:w-[150px] mr-2 hover:bg-[#2000d4]">
        Contact
    </button>
</form>

 <?php endforeach; ?>
</div>
        </div>
        
    </nav>
    
    <div id="showAnwsers" class="hidden mx-auto w-[70%] mt-8 sm:mb-4">
            <!-- Repeatable Container -->
            <?php foreach ($responses as $req): ?>
    <div id="one_case">
        <!-- Time Placeholder -->
        <span class="text-sm font-medium ml-12 sm:ml-24">Time: <?= date("Y-m-d H:i:s"); ?></span>

        <!-- Response Card -->
        <div class="border rounded-lg shadow-lg p-3 bg-white w-[90%] mx-auto">
            <div class="flex flex-col gap-[2px]">
                <!-- User Info -->
                <div class="flex items-center gap-[6px]">
                    <img src="/PROJET PAW/img.jfif" alt="User Image" class="h-10 w-10 rounded-full">
                    <span class="text-lg font-medium"><?= htmlspecialchars($req['prname'] . ' ' . $req['prsurname']); ?></span>
                </div>
                <p class=" mt-2 text-gray-600">Your Question Was : <?= htmlspecialchars($req['detailes']); ?></p>
                <!-- Response Status -->
                <?php if ($req['etat'] == 3): ?>
    <span class="text-lg font-medium text-green-600">ACCEPTED</span>
    <?php if (isset($req['respond']) && !empty($req['respond'])): ?>
        <details class="mt-2">
            <summary class="text-blue-500 cursor-pointer underline">Show Answer</summary>
            <p class="mt-2 text-gray-600"><?= htmlspecialchars($req['respond']); ?></p>
        </details>
    <?php endif; ?>
<?php else: ?>
    <span class="text-lg font-medium text-red-600">REFUSED</span>
<?php endif; ?>

            </div>
        </div>

        <!-- Separator -->
        <span class="flex items-center px-6 py-4 justify-center text-[#ff7f4d]">
            . . . . . . . . . . . . . . . . . . . .
        </span>
    </div>
<?php endforeach; ?>
        </div>
        
</body>
</html>

