<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
</head>
<body class="font-poppins">

    <header class="bg-gray-400 text-white p-4">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="/">
                <img src="/images/logo.png" class="w-40" alt="">
            </a>
          

            <a href="/" class="text-black">Home</a>
            <a href="/users" class="text-black">Users</a>
            <a href="/items" class="text-black">Items</a>
            <a href="/transactions" class="text-black">transactions</a>
        </nav>
    </header>
   
    <main class="p-2">
        <?= $content; ?>
    </main>

    
    


    

  
   
    
   
</body>
</html>