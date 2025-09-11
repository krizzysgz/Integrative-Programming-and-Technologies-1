<!DOCTYPE html>

<?php
$members = [
    ["name" => "Krizzy Shane T. Gozo", "role" => "Group Leader", "gender" => "female", "img" => "img/krizzy3.jpg"],
    ["name" => "Andrey Kurt L. La Torre", "role" => "Member", "gender" => "male", "img" => "img/andrey.jpg.jpeg"],
    ["name" => "Shaina D. Tinoy", "role" => "Member", "gender" => "female", "img" => "img/shaina.jpeg"],
    ["name" => "Edmark A. Lupiga", "role" => "Member", "gender" => "male", "img" => "img/edmark.jpeg"],
];

$filter = $_GET['gender'] ?? 'all';

$filteredMembers = array_filter($members, function($member) use ($filter) {
    if ($filter == 'all') return true;
    return $member['gender'] == $filter;
});
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap');

        :root {
            --netflix-red: #e50914;
            --netflix-dark: #141414;
            --netflix-light: #f3f3f3;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--netflix-dark);
            color: var(--netflix-light);
        }

        .logo-font {
            font-family: 'Bebas Neue', cursive;
        }

        .hero {
            background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, var(--netflix-dark) 100%),
                        url(img/GRYFFINDOR1.jpg) no-repeat center center;
            background-size: cover;
            height: 90vh;
        }

        .member-card {
            transition: transform 0.3s ease;
        }
        .member-card:hover {
            transform: scale(1.02);
        }



    </style>
</head>
<body class="<?= $theme ?>">

<!-- Navbar -->
<nav class="navbar fixed top-0 w-full z-50 bg-gradient-to-b from-black/80 to-transparent">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <span class="logo-font text-3xl text-red-600 mr-10">GRYFFINDOR</span>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-red-500">Home</a>
                <a href="#members" class="hover:text-red-500">Members</a>
            </div>
        </div>
    </div>
</nav>

<div class="hero">  
<!-- Introduction Section -->
<section class="hero flex items-center">
    <div class="container mx-auto px-1">
        <h1 class="text-5xl font-bold text-red-600 logo-font" style="font-size: 180px;">Group 4 <br> Gryffindor</h1>
        <p class="text-lg max-w-2xl text-gray-300" style="font-size: 25px;">
            We are a group of passionate IT students who share the same drive for creativity, growth, 
            and learning. From exploring design and programming to taking on leadership and challenges, 
            we aim to support each other while honing our individual strengths. Just like our house name, 
            Gryffindor, we value courage, determination, and the spirit to keep moving forward together.
        </p>
    </div>
</section>

<!-- Members Section -->
<section id="members" class="pb-10 mb-3 items-center ">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 pl-4 border-l-4 border-red-600 text-red-600">GROUP MEMBERS</h2>

        <!-- Filter Buttons -->
        <div class="flex space-x-4 mb-6">
            <a href="?gender=all" class="px-4 py-2 bg-red-600 text-white">All</a>
            <a href="?gender=male" class="px-4 py-2 bg-red-600 text-white ">Male</a>
            <a href="?gender=female" class="px-4 py-2 bg-red-600 text-white ">Female</a>
        </div>

        <!-- Filtered Members -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($filteredMembers as $m): ?>
                <div class="member-card bg-gray-800 rounded overflow-hidden shadow-lg">
                    <img src="<?= $m['img'] ?>" alt="<?= $m['name'] ?>">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-white-600"><?= $m['name'] ?></h3>
                        <p class="text-gray-400"><?= $m['role'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</body>
</html>
