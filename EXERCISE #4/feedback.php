<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $rating = (int) $_POST['rating'];

    $sql = "INSERT INTO feedbacks (name, rating, comment) VALUES ('$name', $rating, '$comment')";
    if ($conn->query($sql) === TRUE) {
        $message = "✅ Thank you! Your feedback has been submitted.";
    } else {
        $message = "❌ Something went wrong. Please try again.";
    }
}

$result = $conn->query("SELECT * FROM feedbacks ORDER BY created_at DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
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

         .hero {
            background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, var(--netflix-dark) 100%),
                        url(img/GRYFFINDOR1.jpg) no-repeat center center;
            background-size: cover;
            height: 90vh;
         }

        .logo-font {
            font-family: 'Bebas Neue', cursive;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 bg-gradient-to-b from-black/80 to-transparent">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="logo-font text-3xl text-red-600">PORTFOLIO</a>
            <a href="index.php" class="px-4 py-2 bg-red-600 rounded hover:bg-red-700 transition">Back</a>
        </div>
    </nav>


    <!-- Hero Background + Form -->
  <section class="hero flex items-center justify-center pt-28 px-6">
    <div class="bg-gray-800 bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-md animate-fadeIn">
      <h2 class="text-2xl font-bold mb-6 text-red-500">Give Feedback</h2>

      <!-- Notification -->
      <?php if (!empty($message)): ?>
        <div class="mb-4 p-3 rounded bg-green-600 text-white text-center">
          <?= $message ?>
        </div>
      <?php endif; ?>


      <form action="feedback.php" method="POST" class="space-y-4">
        <div>
          <label class="block mb-1">Name (optional):</label>
          <input type="text" name="name" class="w-full p-2 rounded bg-gray-700">
        </div>

        <div>
          <label class="block mb-1">Rate my portfolio (1-5):</label>
          <select name="rating" class="w-full p-2 rounded bg-gray-700">
            <option value="1">1 - Very Poor</option>
            <option value="2">2 - Poor</option>
            <option value="3">3 - Average</option>
            <option value="4">4- Good </option>
            <option value="5">5 - Excellent</option>
          </select>
        </div>

        <div>
          <label class="block mb-1">Comments:</label>
          <textarea name="comment" class="w-full p-2 rounded bg-gray-700"></textarea>
        </div>

        <button type="submit" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 w-full">
          Submit Feedback
        </button>
      </form>
    </div>
  </section>
</body>
</html>
