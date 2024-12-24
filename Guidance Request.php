<?php

include 'C:/wamp64/www/PROJET PAW/Classes/PR.php';

$profR = new PROF();
$profile=$profR->ProfileInfo();
if (isset($_POST['respondbtn'])) {
    // Update the request status based on the button clicked
    $profR->setRequestResponse($_POST['etuId'],$_POST['Rdet'], $_POST['respondbtn'],$_POST['respondtxt']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>GUIDANCE REQUESTS</title>
</head>
<body class="bg-white h-screen">
    <header class="flex sticky items-center h-auto justify-between bg-[#002D62] text-white ">
        <!-- Logo and Title -->
        <nav class="flex flex-col my-[19px] ml-[40px] items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[32px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex ">
            <a href="" class="text-white text-[18px] font-medium sm:text-[25px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[90px] pt-[29px] pb-[24px]">Guidance Request</a>
            <a href="Meet Requests.php" class="text-white text-[18px] font-medium sm:text-[25px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[90px] pt-[29px] pb-[24px]">Meet Request</a>
                  </div>
                  <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "Prof_Welcome_Page.php" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
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

        function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
  
}
</script>
   
        
          
                <h1 class="text-[#fda984] font-[500] mt-[5%] text-[32px] font-bold leading-[40.16px] text-center">
                    List students Guidance Requests</h1>
         
            <!-- big Box -->
            <div class="bg-gray-200 overflow-y-scroll p-6 w-[80%] h-[170px] mx-auto flex flex-col rounded-lg mt-[5%]">
                <!-- small box -->
                <?php
$requests = $profR->getGuidanceRequests();
if (empty($requests)): ?>
 
    <span class='font-[600] text-gray-500'>La Liste est vide !</span>
<?php else: ?>
    <?php foreach ($requests as $request): ?>
        <form action="" method="post">
            <div class="mx-auto rounded-lg mt-5 bg-white flex flex-col sm:flex-row justify-between p-4 sm:p-6 items-center w-full sm:w-[80%]">
                <div class="ml-2 flex items-center">
                    <img src="/PROJET PAW/assert/img.jfif" alt="User Image" class="rounded-full w-[50px] h-[50px]">
                    <span class="ml-4 text-[#002d62] font-[400] text-[30px] font-bold leading-[40.16px]">
                        <?= htmlspecialchars($request['ename'] ?? 'Unknown') . ' ' . htmlspecialchars($request['esurname'] ?? 'Unknown'); ?>
                    </span>
                </div>
                <div class="mr-2 mt-4 sm:mt-0">
                    <button type="button" onclick="openDetails('<?= $request['detailes']; ?>')"
                        class="w-[238px] bg-[#002d62] rounded-xl text-white px-4 py-2 text-[29px] font-bold leading-[40.16px]">
                        More Details
                    </button>
                </div>
            </div>

            <!-- Modal for Response -->
            <div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg p-6 w-4/5 max-w-md">
                    <p id="modalContent" class="text-gray-700 mb-4"></p>
                    <div class="flex flex-col justify-between">
                        <div class="flex justify-between px-3">
                            <button name="respondbtn" type="submit" value="4" 
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                                Refuse
                            </button>
                            <button onclick="showinput()" type="button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Accept
                            </button>
                        </div>
                        <div id="answer" class="hidden flex justify-between p-6">
                            <input name="respondtxt" class="w-[70%] p-1 mr-4 text-[20px]" type="text" placeholder="Answer the question">
                            <button type="submit" name="respondbtn" value="3" class="bg-[#D7F9F1] text-lg text-[#002D62] font-medium py-1 px-8 w-auto h-auto rounded-full focus:bg-[#002D62] focus:text-[#D7F9F1] focus:border-[2px] focus:border-[#D7F9F1]">
                                Answer
                            </button>  
                        </div>
                    </div>
                </div>
            </div>

            <!-- Include hidden field for Request ID -->
            <input type="hidden" name="etuId" value="<?= $request['eid']; ?>">
            <input type="hidden" name="Rdet" value="<?= $request['detailes']; ?>">
        </form>
    <?php endforeach; ?>
<?php endif; ?>




   

           
    <script>
        function showinput(){
           let n=document.getElementById('answer');
           if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }

        }
        function openDetails(details) {
          document.getElementById('modalContent').innerText = details;
          document.getElementById('detailsModal').classList.remove('hidden');
        }
    
        function closeDetails() {
          document.getElementById('detailsModal').classList.add('hidden');
        }
    </script>
</body>
</html>