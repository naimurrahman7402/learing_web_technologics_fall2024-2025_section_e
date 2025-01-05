<?php
// Campaign details (replace with dynamic data from your database or user input)
$campaignName = "Amazing Campaign";
$campaignURL = "https://example.com/campaign-page";
$campaignDescription = "Join us in supporting this amazing campaign!";
$hashtags = "Support,Charity,Crowdfunding";

// Social media sharing URLs
$facebookURL = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($campaignURL) . "&quote=" . urlencode($campaignDescription);
$twitterURL = "https://twitter.com/intent/tweet?url=" . urlencode($campaignURL) . "&text=" . urlencode($campaignDescription) . "&hashtags=" . urlencode($hashtags);
$linkedinURL = "https://www.linkedin.com/sharing/share-offsite/?url=" . urlencode($campaignURL);

// Social media sharing page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Campaign</title>
</head>

<body>
    <header>
        <h1>Share Campaign: <?php echo htmlspecialchars($campaignName); ?></h1>
    </header>

    <main>
        <p><?php echo htmlspecialchars($campaignDescription); ?></p>
        <h2>Share on Social Media:</h2>
        <ul>
            <li>
                <a href="<?php echo $facebookURL; ?>" target="_blank">
                    <img src="facebook-logo.png" alt="Facebook Logo" width="50">
                    Share on Facebook
                </a>
            </li>
            <li>
                <a href="<?php echo $twitterURL; ?>" target="_blank">
                    <img src="twitter-logo.png" alt="Twitter Logo" width="50">
                    Share on Twitter
                </a>
            </li>
            <li>
                <a href="<?php echo $linkedinURL; ?>" target="_blank">
                    <img src="linkedin-logo.png" alt="LinkedIn Logo" width="50">
                    Share on LinkedIn
                </a>
            </li>
        </ul>
    </main>

    <footer>
        <p>&copy; 2025 CrowdfundIt. All Rights Reserved.</p>
    </footer>
</body>

</html>
