<?php


require_once 'C:/wamp64/www/PROJET PAW/Classes/etudiant.php';


$etudiant=new ETUDIANT();
$profile=$etudiant->ProfileInfo();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Questions & Announcement</title>
</head>
<body class="bg-white h-full">
    <header class="flex sticky items-center h-auto justify-evenly bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="Request Document.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="search.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Professor Service</a>
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
        </div>
        <!-- Icons -->
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "Welcom Page.php" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
            <button onclick="notification(this)" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-bell"></i></button>
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
            if (section === 'showAnwsers') 
            {
                ask.classList.remove('hidden');
            } 
            else if (section === 'AskQuestion') 
            {
                answer.classList.remove('hidden');
            }

        }
        function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }}
    function logout() {

    const n = document.getElementById("logout");

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
   <div  id="AskQuestion"> 
   <div class="flex flex-col p-[10px] w-[70%] mx-auto my-[10px] bg-[#002D62] rounded-3xl shadow-lg mt-6" style="box-shadow: 0 2px 1px #ff7f4d;">
    <div class="flex items-center justify-between ">
        <div class="flex items-center text-[25px]">
           
            <span class="ml-[4px] text-white  font-medium">Ask Administartion</span>
        </div>
       
       <form action="" method="post" >
        <button type="submit" name="sendQ" class="px-8 m-[4px] mr-2 py-2 bg-[#1800a0] font-[500] text-[22px] text-white rounded-md hover:bg-[#2000d4]">
            Send
        </button>
    </div>
    <div>
        <input type="text" name="question" placeholder="question" class="text-[20px] text-white w-[70%] sm:w-[90%] p-[5px] ml-14 bg-[#002D62]">
    </div>
       </form>
  </div>
<?php if(isset($_POST['sendQ'])) {
    // Retrieve the submitted 'type' value
    $type = $_POST['question'];

    // Create dq instance
    

    // Call MakeDemande with the submitted type
    $etudiant->AskAdmin($type);
} ?>
    <nav class="mt-4 mb-4 bg-[#F5F5F580] rounded-[30px] shadow-lg mx-auto w-[70%] overflow-y-scroll h-[300px] ">
    
    <div class="flex items-center gap-4 px-8 py-6 justify-center  bg-[#F5F5F580] z-10 sticky top-0 backdrop-blur-xl">
            <img src="/PROJET PAW/assert/BADIDO-Photoroom.jpg" alt="" class="h-[60px] w-[60px]">
            <span class="sm:text-[35px] text-[30px] font-medium text-[#ff7f4d] ">Announcement</span>
        </div>

        <?php 
$announces = $etudiant->GetAnnounces(); 


     foreach ($announces as $announce): ?>
      <div id="case" class="mx-auto mt-2 sm:mb-4">
        <span class="text-sm font-medium ml-12 sm:ml-24">
            Time: <?= htmlspecialchars($announce['time']); ?>
        </span>
        <div class="border rounded-lg shadow-lg p-2 bg-white w-[90%] mx-auto">
            <span class="text-lg font-medium">Administration Announcement</span>
            <p class="mt-2"><?= htmlspecialchars($announce['title']); ?></p>
            <details class="mt-2 ml-14">
                <summary class="cursor-pointer text-blue-500">Details</summary>
               
                <p class="mt-2"><?= htmlspecialchars($announce['announce']); ?></p>
            </details>
        </div>
    <?php endforeach; ?>
</div>

           
            <span class="flex items-centerpx-6 py-4 justify-center text-[#ff7f4d]" >  . . . . . . . . . . . . . . . . . . . .</span>
            </div>
         
        </nav>
   </div>
   <div id="showAnwsers" class="hidden mx-auto w-[70%] mt-8 sm:mb-4">
          
            <?php

$responses = $etudiant->GetAdminAnswers(); 
?>

<?php foreach ($responses as $req): ?>
    <div id="one_case">
   
        <span class="text-sm font-medium ml-12 sm:ml-24">Time: <?= htmlspecialchars($req['rtime']); ?></span>

        <div class="border rounded-lg shadow-lg p-3 bg-white w-[90%] mx-auto">
            <div class="flex flex-col gap-[2px]">
              
                <div class="flex items-center gap-[6px]">
                    <img src="/PROJET PAW/assert/img.jfif" alt="User Image" class="h-10 w-10 rounded-full">
                    <span class="text-lg font-medium">
                      ADMINSTRATION
                    </span>
                </div>

             
                <p class="mt-2 text-gray-600">Your Question Was: <?= htmlspecialchars($req['question']); ?></p>

               
                <?php if ($req['etat'] == 2): ?>
                    <span class="text-lg font-medium text-green-600">ACCEPTED</span>
                    <?php if (isset($req['respond']) && !empty($req['respond'])): ?>
                        <details class="mt-2">
                            <summary class="text-blue-500 cursor-pointer underline">Show Answer</summary>
                            <p class="mt-2 text-gray-600"><?= htmlspecialchars($req['respond']); ?></p>
                        </details>
                    <?php endif; ?>
                <?php elseif ($req['etat'] == 3): ?>
                    <span class="text-lg font-medium text-red-600">REFUSED</span>
                    <?php if (isset($req['respond']) && !empty($req['respond'])): ?>
                        <details class="mt-2">
                            <summary class="text-blue-500 cursor-pointer underline">Show Reason</summary>
                            <p class="mt-2 text-gray-600"><?= htmlspecialchars($req['respond']); ?></p>
                        </details>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="text-lg font-medium text-gray-600">PENDING</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>



    
        <span class="flex items-center px-6 py-4 justify-center text-[#ff7f4d]">
            . . . . . . . . . . . . . . . . . . . .
        </span>
    </div>






        </div>
</body>
</html>
