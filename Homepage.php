<?php
// NewsAPI key
$apiKey = '9ce69f6d89b24f009c60f1b0b2f89a56';

// Specify the domains for Anime News Network and Crunchyroll
$domains = 'animenewsnetwork.com'; // Multiple domains separated by a comma

// API call for Manga news
$mangaUrl = "https://newsapi.org/v2/everything?" . http_build_query([
    'q' => 'Manga', // Search query for Manga
    'language' => 'en',
    'sortBy' => 'publishedAt',
    'pageSize' => 10, // Limit to 10 articles
    'domains' => $domains,
    'apiKey' => $apiKey,
]);

// API call for Anime news
$animeUrl = "https://newsapi.org/v2/everything?" . http_build_query([
    'q' => 'Japanese Manga', // Search query for Anime
    'language' => 'en',
    'sortBy' => 'publishedAt',
    'pageSize' => 10, // Limit to 10 articles
    'domains' => $domains,
    'apiKey' => $apiKey,
]);

// Function to fetch news data
function fetchNews($url) {
    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: YourAppName/1.0', // Replace with your app name
    ]);

    // Execute request and check for connection issues
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return null; // Handle connection issues gracefully
    }

    // Decode JSON response
    return json_decode($response, true);
}

// Fetch Manga news
$mangaData = fetchNews($mangaUrl);
if ($mangaData['status'] !== 'ok' || empty($mangaData['articles'])) {
    $mangaData = ['articles' => []]; // Fallback for empty or error responses
}

// Fetch Anime news
$animeData = fetchNews($animeUrl);
if ($animeData['status'] !== 'ok' || empty($animeData['articles'])) {
    $animeData = ['articles' => []]; // Fallback for empty or error responses
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime News Articles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="Logo/animenewsly.png" type="image/png">
    <style>
html, body {
    height: 100%;
    margin: 0;
    font-family: 'Montserrat', sans-serif; /* Set a default font */
    background-color: #f8f9fa; /* Light background for better contrast */
}

.content {
    flex: 1;
}

footer {
    margin-top: auto;
}

/* Header customization */
header {
    background: url('https://your-background-image.jpg') no-repeat center center/cover;
    background-color: black;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    padding: 20px 0; /* Added padding for better header space */
    display: flex; /* Use flexbox for layout */
    justify-content: space-between; /* Space between logo and nav */
    align-items: center; /* Center content vertically */
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

/* Logo styling */
.logo {
    flex: 0 0 auto; /* Keep logo size fixed */
}

/* Manga News Section */
#mangaNews {
    height: 400px; /* Increased height for better visibility */
    position: relative;
    overflow: hidden;
}

.manga-item {
    width: 100%;
    height: 100%;
    position: absolute;
    display: none;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.8); /* White background for articles */
}

.manga-item.active {
    display: block;
}

.manga-item img {
    width: 100%; 
    height: 200px; 
    object-fit: cover; 
    border-radius: 10px; 
    margin-bottom: 15px;
}

/* Text Styles */
.manga-content {
    position: absolute;
    bottom: 40px;
    left: 20px;
    right: 20px;
    color: #333; /* Dark text for readability */
    background-color: white;
    padding-top: 5px;
}

.manga-content h4 {
    font-size: 24px;
    margin: 0;
}

.manga-content p {
    font-size: 16px;
}

/* Carousel Styling */
.carousel-item img {
    max-height: 400px;
    object-fit: cover;
}

/* Button Styles */
.btn-primary {
    background-color: #007bff; /* Bootstrap primary color */
    border-color: #007bff; 
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker shade for hover */
}

/* Footer styling */
footer {
    background-color: black; /* Dark background for footer */
    padding: 15px 0; /* Added padding for footer */
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
        <!-- Logo -->
        <div class="logo">
            <img src="Logo/animenewsly.png" alt="Anime Newsly Logo" style="height: 150px;">
        </div>
        <!-- Navigation -->
        <nav class="nav">
            <a href="HomePage.php" class="nav-link text-white mx-2">Home</a>
            <a href="AboutUs.php" class="nav-link text-white mx-2">About</a>
            <a href="https://myanimelist.net/" class="nav-link text-white mx-2">My Anime List</a>
        </nav>
    </div>
</header>


<!-- Manga News Section -->
<div class="container mt-4">
    <div id="mangaNews" class="position-relative">
    <?php foreach ($mangaData['articles'] as $index => $article): ?>
    <div class="manga-item <?= $index === 0 ? 'active' : '' ?>">
        <img src="<?= htmlspecialchars($article['urlToImage'] ?? 'default-image.jpg') ?>" alt="Manga News Image">

        <div class="manga-content"> <!-- New wrapper for content -->
            <h4><?= htmlspecialchars($article['title']) ?></h4>
            <p><strong><?= htmlspecialchars($article['source']['name']) ?></strong> - <?= date('F j, Y', strtotime($article['publishedAt'])) ?></p>
            <p><?= htmlspecialchars($article['description']) ?></p>
            <a href="<?= htmlspecialchars($article['url']) ?>" target="_blank" class="btn btn-primary">Read more</a>
        </div>
    </div>
<?php endforeach; ?>

    </div>
</div>

<div class="container mt-5 content">
    <!-- Anime News Section -->
    <h2 class="text-center mb-4" style="font-family: 'Noto Sans JP', sans-serif;">Latest Anime News</h2>
    <div id="newsCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            <?php foreach ($animeData['articles'] as $index => $article): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= htmlspecialchars($article['urlToImage'] ?? 'default-image.jpg') ?>" class="d-block w-100 rounded" alt="News Image">
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h4><?= htmlspecialchars($article['title']) ?></h4>
                            <p><strong><?= htmlspecialchars($article['source']['name']) ?></strong> - <?= date('F j, Y', strtotime($article['publishedAt'])) ?></p>
                            <p><?= htmlspecialchars($article['description']) ?></p>
                            <a href="<?= htmlspecialchars($article['url']) ?>" target="_blank" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Controls -->
        <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<footer class="text-white text-center py-3 mt-5">
    <p>&copy; <?= date('Y') ?> Anime News Portal. All rights reserved.</p>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script for Manga News Fade In and Out -->
<script>
$(document).ready(function() {
    let currentMangaIndex = 0;
    const mangaItems = $('#mangaNews .manga-item');
    const totalMangaItems = mangaItems.length;

    function showNextManga() {
        mangaItems.eq(currentMangaIndex).fadeOut(500, function() {
            currentMangaIndex = (currentMangaIndex + 1) % totalMangaItems;
            mangaItems.eq(currentMangaIndex).fadeIn(500);
        });
    }

    // Start by showing the first item
    mangaItems.eq(currentMangaIndex).show();
    
    // Automatically transition between manga news items
    setInterval(showNextManga, 5000);
});
</script>



</body>
</html>
