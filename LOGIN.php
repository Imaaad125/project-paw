<!DOCTYPE html>
<html lang="fr">
<head>
<?php


require_once 'Classes/User.php';
$erro='';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create User instance
    $user = new User($username, $password);

    // Check if login is successful
    if ($user->login()) {
       
        exit;
    } else {
        $erro = "Invalid username or password";
    }
}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7c0d38c22f.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body class="bg-white h-screen">
   <nav class="flex items-center ml-[30px] mt-[30px] self-start gap-[10px] w-[450px]">
    <i class="fa-solid fa-graduation-cap text-[3em] text-[#002D62]"></i>
    <h1 class="font-[600] text-[2.5em] text-[#002D62]">STUDENT SERVICES</h1>
   </nav>

    
   <div class="flex items-center justify-evenly">
    <img class="h-[400px] w-[400px]" src="assert/1.jpg" alt="">
   <form class="flex flex-col gap-[15px] max-w-[90%] w-[400px] items-center " action="" method="post">
        <h1 class="font-[500] text-[60px] mb-4 text-[#002D62]">Login</h1>
           
        <label for="username" class="text-[1.3em] font-[600] self-start ml-[5%] text-[#002D62] ">Regestraion Number</label>
            <input class="h-[72px] w-[500px] max-w-[400px] border-solid border-[2px] border-[#002D62] p-[10px] text-[1.5em] text-[600] rounded-[20px] hover:border-[3px] border-[text-blue-200] focus:border-[4px]" type="text" name="username" placeholder="Bac year +Registration number Ex:202231667671" >
           
            <label for="password" class="text-[1.3em] font-[600] self-start mt-6 ml-[5%] text-[#002D62]">Password</label>
        <input type="password" name="password" class="h-[72px]  w-[500px] max-w-[400px] border-solid border-[2px] border-[#002D62] p-[10px] text-[1.5em] text-[600] rounded-[20px] hover:border-[3px] border-[text-blue-200] focus:border-[4px]" placeholder="Password (the one for the grade report)">
        <input class="" type="submit" name="submit" value="Login">
       <span class="text-red-500 ml-8 sm:ml-[790px] mt-4"><?php echo $erro; ?></span>  
    </form>
   </div>
       
</body>
</html>






