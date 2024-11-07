<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Anime News Portal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="Logo/animenewsly.png" type="image/png">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }
        
        .content {
            flex: 1;
        }
        
        footer {
            margin-top: auto;
        }
        
        header {
            background: url('https://your-background-image.jpg') no-repeat center center/cover;
            background-color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        header .nav-link {
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        header .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .logo {
            flex: 0 0 auto;
        }
        
        .about-section {
            padding: 60px 15px;
            text-align: center;
        }
        
        .about-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        
        .about-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
        }

        footer {
            background-color: black;
            padding: 15px 0;
            color: white;
        }
        
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

<header class="text-white text-center">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="Logo/animenewsly.png" alt="Anime Newsly Logo" style="height: 150px;">
        </div>
        <nav class="nav">
            <a href="HomePage.php" class="nav-link text-white mx-2">Home</a>
            <a href="AboutUs.php" class="nav-link text-white mx-2">About</a>
            <a href="https://myanimelist.net/" class="nav-link text-white mx-2">My Anime List</a>
        </nav>
    </div>
</header>

<div class="about-section content">
    <div class="gif-container">
        <img src="Logo/KyouThumbsUp.gif" alt="Kyou Thumbs Up" style="height: 300px;border-radius: 15px;"> <!-- Inserted GIF here -->
    </div>
    <br>
    <h1>About Us</h1>
    <p>Welcome to Anime Newsly, your ultimate source for the latest in anime and manga news. Our mission is to bring you timely, reliable updates about everything happening in the world of anime and manga—from new releases and industry insights to special features and exclusive interviews.</p>
    <br>
    <p>Anime Newsly was founded by fans, for fans. We understand the excitement of discovering a new series, the anticipation of waiting for the next chapter, and the joy of staying connected with the anime community. That’s why we’re committed to delivering high-quality news and stories, carefully curated from trusted sources like Anime News Network and Crunchyroll.</p>
    <br>
    <p>Whether you’re a longtime fan or a newcomer to anime and manga, we strive to create a welcoming space for everyone. Our team works hard to keep the content fresh, the insights meaningful, and the news up-to-date so you can stay informed and engaged.</p>
</div>
<footer class="text-white text-center">
    <p>&copy; <?= date('Y') ?> Anime News Portal. All rights reserved.</p>
</footer>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
