<?php
include 'C:/wamp64/www/PROJET PAW/Classes/admin.php';

// Create an instance of the ADMIN class
$user = new ADMIN();

// Get filters from the POST request
$year = isset($_POST['filter2']) ? $_POST['filter2'] : null;
$type = isset($_POST['filter1']) ? $_POST['filter1'] : null;

// Fetch profile information
$profile = $user->ProfileInfo();
if (isset($_POST['confirm'])) {
    $etat = $_POST['etat'];
    $id = $_POST['eid'];
    $type = $_POST['type'];

    $user->SetDoquementAdminRespond($etat, $id, $type);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#F7F7F7]">
    <header class="flex sticky items-center h-auto justify-around bg-[#002D62] text-white">
        <!-- Logo and Title -->
        <nav class="flex flex-col items-center px-auto gap-[1px] sm:gap-[3px] sm:px-auto">
            <a><i class="fa-solid ml-[2px] fa-graduation-cap text-[22px] sm:text-[28px]" aria-hidden="true"></i></a>
            <span class="font-medium ml-2 text-[8px] sm:text-[10px]">STUDENT SERVICE</span>
        </nav>
        <!-- Navigation Links -->
        <div class="flex">
            <a href="" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Document Request</a>
            <a href="MakeAnn&RespondQ" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Questions and Announces</a>
            <a href="filter.php" class="text-white text-[18px] font-medium sm:text-[22px] hover:bg-[#CFFAEF] rounded-sm hover:text-[#1800a0] py-2 px-4 sm:px-[30px] pt-[23.5px] pb-[24px]">Archive</a>
        </div>
        <!-- Icons -->
        <nav class="flex flex-col m-2 justify-center sm:flex-row sm:space-x-[25.5px]">
            <a href="AdminWelcomePage" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-house" aria-hidden="true"></i></a>
            <button onclick="logout()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]">
                <i class="fa-solid fa-bars"></i>
            </button>
            <button onclick="profile()" class="text-white text-[20px] sm:text-[28px] hover:text-[#CFFAEF]"><i class="fa-solid fa-user"></i></button>
        </nav>
        <div id="logout" class="flex hidden absolute drop-shadow-md top-[50px] right-[155px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-auto h-auto bg-white">
            <button onclick="window.location.href='logout.php'" class="font-[600] text-gray-500">Log Out</button>
        </div>
        <div id="profile" class="flex hidden absolute drop-shadow-md top-[50px] right-[110px] p-4 rounded-tl-lg rounded-tr-none rounded-br-lg rounded-bl-lg flex-col w-[400px] h-auto bg-gray-100">
            <div class="flex flex-col items-start m-2">
                <span class="font-[500] p-3 text-gray-700">Personal Information:</span>
                <div class="items-center font-[600] p-3 bg-gray-300 m-2 w-[100%] text-black"><?= htmlspecialchars($profile['role']) ?></div>
                <div class="items-center font-[600] p-3 bg-gray-300 m-2 w-[100%] text-black">
                    <span class="font-[300] p-3 text-gray-700">Name:</span> <?= htmlspecialchars($profile['name']) . ' ' . htmlspecialchars($profile['surname']) ?>
                </div>
                <div class="items-center font-[600] p-3 bg-gray-300 m-2 w-[100%] text-black">
                    <span class="font-[300] p-3 text-gray-700">Id:</span><?= htmlspecialchars($profile['id']) ?>
                </div>
            </div>
        </div>
    </header>

    <div class="text-4xl font-[500] text-[#002D62] my-9 text-center">
        <span class="text-4xl font-[500] text-[#002D62] text-center">Documents Requested List</span>
    </div>

    <!-- Filter Form -->
    <form action="" method="post" class="flex gap-3 items-center p-3 mb-2 bg-gray-100 rounded-lg shadow-md w-[50%] mx-auto">
        <label for="filter1" class="text-lg font-medium text-gray-700">Choose File</label>
        <select name="filter1" id="filter1" class="p-2 border rounded-md text-gray-600">
            <option value="">All</option>
            <option value="CERTIFICAT">Certificat de Scolarité</option>
            <option value="RELVER">relver</option>
            <option value="ATESTATION">Atestasion</option>
        </select>
        <label for="filter2" class="text-lg font-medium text-gray-700">Choose Year</label>
        <select name="filter2" id="filter2" class="p-2 border rounded-md text-gray-600">
            <option value="">All</option>
            <option value="1">L1</option>
            <option value="2">L2</option>
            <option value="3">L3</option>
        </select>
        <button type="submit" name="applyFilters" class="bg-blue-600 text-white font-medium p-2 rounded-md hover:bg-blue-700">
            Apply Filters
        </button>
    </form>

    <!-- Results -->
    <div class="mx-auto overflow-y-scroll bg-[#F7F7F7] w-[80%] h-[300px]">
  <?php  $requests = $user->GetDocumentRequests($type, $year); // Assuming this returns an array of requests

if (!empty($requests)) { // Check if requests array is not empty
    foreach ($requests as $req) : 
        ?>
            
            <div id="answer" class="flex mx-auto items-center px-[20px] justify-between rounded-xl bg-white w-[93%] h-[100px] my-[10px]">
                <div class="flex gap-3 items-center">
                    <div>
                        <img class="w-[40px] h-[40px] bg-[#D0E3FF] rounded-full" src="/PROJET PAW/assert/img.jfif" alt="User Image">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[#002D62] text-xl font-[500]"><?= htmlspecialchars($req['name']) . ' ' . htmlspecialchars($req['surname']) ?>
                        </span>
                    </div>
                </div>
                <div class="flex flex-col justify-evenly">
                    <div class="text-lg text-black font-[400]"><?= htmlspecialchars($req['type']) ?></div>
                    <div class="text-md text-gray-300 font-[400]"><?= htmlspecialchars($req['qtime']) ?></div>
                </div>
                <form class="flex gap-3 items-center" action="" method="post">
                    <select 
                        class="bg-[#002D62] focus:outline-none focus:border-blue-500 focus:border-[2px] focus:text-black focus:bg-[white] text-[#FFFFFF] w-[110px] cursor-pointer h-[40px] pl-2 items-center justify-center text-lg rounded-3xl font-[400]" 
                        id="options" 
                        name="etat" 
                        required>
                
                        <option value="2">Accepter</option>
                        <option value="3">Refuser</option>
                    </select>
                    <button 
                        type="submit" 
                        name="confirm" 
                        class="bg-[#002D62] text-[#FFFFFF] w-[110px] h-[40px] items-center justify-center text-lg rounded-3xl font-[400]">
                        Confirm
                    </button>
                    <input type="hidden" name="eid" value="<?= htmlspecialchars($req['id']) ?>">
                    <input type="hidden" name="type" value="<?= htmlspecialchars($req['type']) ?>">
                    
                </form>
            </div>
        
            <?php
    endforeach;
} else {
    echo "<p>No requests found for the specified criteria.</p>";
}
?>
    </div>
   
    

    <script>
        function logout() {
            const n = document.getElementById("logout");
            n.classList.toggle('hidden');
        }
        function profile() {
            const n = document.getElementById("profile");
            n.classList.toggle('hidden');
        }
    </script>
</body>
</html>
