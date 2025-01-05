<?php
// Get campaign details from the URL parameters
$campaignName = isset($_GET['campaign_name']) ? $_GET['campaign_name'] : 'Campaign';
$campaignURL = isset($_GET['campaign_url']) ? $_GET['campaign_url'] : 'https://example.com';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share <?php echo htmlspecialchars($campaignName); ?> - Crowdfunding Platform</title>
</head>

<body>
    <header>
        <h1>Share Campaign</h1>
        <nav>
            <ul>
            <li><a href="socialmediaforuser.html">For Users</a></li>
                <li><a href="socialmediafordonor.html">For Donors</a></li>
                <li><a href="socialmediaforadmin.html">For Admins</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="share-options">
            <h2>Share "<?php echo htmlspecialchars($campaignName); ?>" on Social Media</h2>
            <p>Select a platform below to share the campaign:</p>
            <ul>
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($campaignURL); ?>" target="_blank">
                        <img src="facebook.jpg" alt="Facebook Logo" width="50">
                        Share on Facebook
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($campaignURL); ?>&text=Support%20<?php echo urlencode($campaignName); ?>!" target="_blank">
                        <img src="twitter.png" alt="Twitter Logo" width="50">
                        Share on Twitter
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="instragram.jpg" alt="Instagram Logo" width="50">
                        Share on Instagram
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($campaignURL); ?>" target="_blank">
                        <img src="linkedin.png" alt="LinkedIn Logo" width="50">
                        Share on LinkedIn
                    </a>
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 CrowdfundIt. All Rights Reserved.</p>
    </footer>
</body>

</html>
