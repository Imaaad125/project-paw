<?php

include 'C:/wamp64/www/PROJET PAW/Classes/admin.php';

    
        $user = new ADMIN();
        $profile=$user->ProfileInfo();
        if(isset($_POST['respondbtnadmin']))
        {
            $user->SetAdminAnswer($_POST['etid'],$_POST['respond'],$_POST['et'],$_POST['respondbtnadmin']);
        }  
        if(isset($_POST['submitannounce']))
        {
            $user->SetAnnounce($_POST['title'],$_POST['announce']);
        }  


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
<body  class="bg-white  h-screen">
    <header class="flex sticky items-center h-auto justify-around bg-[#002D62] text-white ">
    
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px] ">STUDENT SERVICE</span>
        </nav>
        
        <div class="flex">
            <a href="Admin_SeeRequests" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
            <a href="filter.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Archive</a>
        </div>
      
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px] ">
            <a href= "AdminWelcomePage.php" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house"></i></a>
            <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
    <i class="fa-solid fa-bars"></i>
</button>  <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
             </nav>
       
    <div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[110px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
    <div class="flex flex-col items-start   m-2 ">
    <span class="font-[500] p-3 text-gray-700">Personal Information :</span>
    <div class="items-center  font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700"></span><?= $profile['role']?></div>
          
    <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Name :</span> <?= $profile['name'].' '.$profile['surname']?> </div>
         <div class="items-center font-[600] p-3 bg-gray-300  m-2 w-[100%] text-black"><span class="font-[300] p-3 text-gray-700">Id :</span><?= $profile['id']?></div>
         </div>
    </div>
  <script>
       function logout() {

const n = document.getElementById("logout");

if (n.classList.contains('hidden')) {
    n.classList.remove('hidden');
} else {
    n.classList.add('hidden');
}}
  </script>
  <div id="logout" class="flex hidden absolute drop-shadow-md top-[50px] right-[155px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-auto h-auto bg-white">
    <button onclick="window.location.href='/PROJET PAW/logout.php'" class="font-[600] text-gray-500">
        Log Out
    </button>
</div>
</header>
   <div class=" flex justify-between mx-auto mt-[50px] w-[1000px]">
    <button  onclick="switchToSection('answer')"  class= " bg-[#002D62]  text-3xl text-white focus:text-[#002D62] focus:border-[#002D62] focus:bg-white focus:border-[2px]  justify-content-between  px-5 py-2  rounded-full ">Answer Question</button>
    <button onclick="switchToSection('announce')" class= " bg-[#002D62]  text-3xl text-white focus:border-[#002D62] focus:text-[#002D62] focus:border-[#002D62] focus:bg-white focus:border-[2px]  justify-content-between  px-5 py-2  rounded-full ">Add Announce</button>
    </div>
    <div id="announce"  class="m-auto hidden mt-16" >
        <span class=" text-3xl font-[500] text-[#002D62] justify-center flex mt-10 ">Add An Announce</span>
       <div class="flex flex-col p-[10px] w-[60%] mx-auto my-[10px] bg-[white] rounded-3xl shadow-3xl mt-6" >
        <div class="flex items-center justify-between ">
          
                <span class="ml-[4px] text-[#002D62] text-3xl  font-medium">Make Announce</span>
           
    
           <form action="" method="post">
            <button type="submit" name="submitannounce" class="px-8 m-[4px] mr-6 py-2 bg-[#1800a0] font-[500] text-[22px] text-white rounded-md hover:bg-[#2000d4]">
                Send
            </button>
        </div>
        
          <div> 
          <input type="text" name="title" placeholder="Title" class="text-[20px] border-gray-300 border-[1px] mt-2 rounded-md text-black w-[70%] sm:w-[90%] p-[10px] ml-6 bg-[white]">   
          <input type="text" name="announce" placeholder="Add New Announcment" class="text-[20px] border-gray-300 border-[1px] mt-2 rounded-md text-black w-[70%] sm:w-[90%] p-[10px] ml-6 bg-[white]"> </div>
        
           </form>
      </div>
    
    
    </div>
   <div  id="answer"  class="  flex flex-col mx-auto overflow-y-scroll bg-[#002D62] rounded-xl  container-xl  border-[15px] border-[#002D62]  w-[70%] h-auto mt-10 ">
<div class="   ml-16 text-white text-3xl mt-4 font-[500] mb-10">Questions</div>

<?php 
$questions=$user->GetQuestionsAdmin();
foreach($questions as $quest) :
?>
    <div class=" flex flex-col p-4 bg-white w-[80%] rounded-xl gap-4 mx-auto mb-5 ">
        <div class="flex items-center gap-2 text-[20px]">
            <img src="/PROJET PAW/assert/img.jfif" alt="" class="h-10 w-10 rounded-full">
            <span class="ml-[4px] text-black  font-medium"><?= htmlspecialchars($quest['name']) ." ". htmlspecialchars($quest['surname'])   ?></span>
        </div>
        <span>Demander le : <?= htmlspecialchars($quest['qtime']) ?></span>
        <details>
            <summary class="ml-3 mb-1 hover:cursor-pointer">   Open Question</summary>
            <div>
            <div class="  ml-3">    <?= htmlspecialchars($quest['question'])    ?> </div>
  
            <form action="" method="post" class="flex justify-between px-3">
                            <button onclick="showinputR()" type="button"
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                                Refuse
                            </button>
                            <button onclick="showinputA()" type="button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Accept
                            </button>
                        </div>
                
                <input type="hidden" name="et" value="<?= htmlspecialchars($quest['question'])?>">
                <input type="hidden" name="etid" value="<?= htmlspecialchars($quest['id']) ?>">
               <div class="hidden" id="B">
                 <input name="respond" class="w-[70%] p-1 mr-4 text-[20px]" type="text" placeholder="Answer the question">
               <button type="submit" name="respondbtnadmin" value="2" class= " bg-[#D7F9F1]  text-lg  text-[#002D62] font-medium py-1 px-8 w-auto h-auto rounded-full focus:bg-[#002D62]  focus:text-[#D7F9F1] focus:border-[2px] focus:border-[#D7F9F1]  ">Send Answer</button>  
               </div>
            <div class="hidden" id="A">
                 <input name="respond" class="w-[70%] p-1 mr-4 text-[20px]" type="text" placeholder="Answer the question">
            <button type="submit" name="respondbtnadmin" value="1" class= " bg-[#D7F9F1]  text-lg  text-[#002D62] font-medium py-1 px-8 w-auto h-auto rounded-full focus:bg-[#002D62]  focus:text-[#D7F9F1] focus:border-[2px] focus:border-[#D7F9F1]  ">Send Answer</button>  
            
                
                 
                
        </div>   
        </form>    
        </details>
    </div>
    <?php 
    
endforeach;
       
        ?>
   
   

    </div>
    <script>
          function profile() {
    const n = document.getElementById("profile");
    if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }
  
}
         function showinputA(){
           let n=document.getElementById('A');
           if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }

        }
        function showinputR(){
           let n=document.getElementById('B');
           if (n.classList.contains('hidden')) {
        n.classList.remove('hidden');
    } else {
        n.classList.add('hidden');
    }

        }
        function switchToSection(section) {
            const announce = document.getElementById('announce');
            const answer = document.getElementById('answer');
            
          
            announce.classList.add('hidden');
            answer.classList.add('hidden');
            
        
            if (section === 'announce') {
                announce.classList.remove('hidden');
            } else if (section === 'answer') {
                answer.classList.remove('hidden');
            }
        }
    </script>
    
</body>
</html> 
