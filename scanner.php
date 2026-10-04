<?php
session_start();
$sessionError = $_SESSION['scan_error'] ?? null;
unset($_SESSION['scan_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Scanner — ScamSens</title>
    <link rel="stylesheet" href="css/style.css?v=1.2">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <div class="logo-shield">🛡</div>
                <span>ScamSens</span>
            </a>

            <button class="nav-toggle" id="navToggle" aria-label="Toggle Navigation">☰</button>

            <ul class="nav-links" id="navLinks">
                <li><a href="index.php">Home</a></li>
                <li><a href="scanner.php" class="active">URL Scanner</a></li>
                <li><a href="safety.php">Safety Tips</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Scanner Box -->
    <main class="container page-content">
        <div class="scanner-box">
            <h2>Scan a Suspicious URL</h2>
            <p>Enter a web address below to check for potential scam or phishing indicators.</p>

            <!-- Error Message Display -->
            <div id="errorMessage" class="alert-banner" style="<?= $sessionError ? 'display: block;' : 'display: none;' ?>">
                <?= htmlspecialchars($sessionError ?? '', ENT_QUOTES, 'UTF-8') ?>
            </div>

            <!-- Scanner Form -->
            <form id="scannerForm" action="php/scan_url.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="urlInput" class="form-label">Enter URL:</label>
                    <input 
                        type="text" 
                        id="urlInput" 
                        name="url" 
                        class="form-input" 
                        placeholder="https://example.com/login" 
                        autocomplete="off"
                    >
                </div>

                <!-- Example Presets for Testing -->
                <div class="preset-group">
                    <span class="preset-label">Try Example:</span>
                    <button type="button" class="pill-btn" data-url="https://www.google.com">google.com</button>
                    <button type="button" class="pill-btn" data-url="http://example.com/login">http://example.com/login</button>
                    <button type="button" class="pill-btn" data-url="http://192.168.1.10/login">http://192.168.1.10/login</button>
                </div>

                <!-- Action Buttons: Scan URL and Clear -->
                <div class="form-actions">
                    <button type="submit" id="scanBtn" class="btn btn-primary">Scan URL</button>
                    <button type="button" id="clearBtn" class="btn btn-secondary">Clear</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> ScamSens — Web-Based Scam & Phishing Detection System</p>
        </div>
    </footer>

    <script src="js/script.js?v=1.1"></script>
</body>
</html>
