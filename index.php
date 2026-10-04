<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScamSens — Scam and Phishing URL Detection System</title>
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="scanner.php">URL Scanner</a></li>
                <li><a href="safety.php">Safety Tips</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <div class="hero-badge">Cybersecurity URL Detection</div>
            <h1>Check Before <span>You Click.</span></h1>
            <p>Analyze suspicious URLs and identify potential scam or phishing indicators before entering personal information.</p>
            <a href="scanner.php" class="btn btn-primary">Scan URL</a>
        </div>
    </header>

    <!-- 3 Simple Feature Cards -->
    <section class="container">
        <div class="section-title">
            <h2>Core Features</h2>
            <p>Simple and transparent rule-based threat detection.</p>
        </div>

        <div class="features-grid">
            <!-- Feature Card 1 -->
            <div class="card">
                <div class="card-icon">🔗</div>
                <h3>URL Analysis</h3>
                <p>Examine web addresses for suspicious patterns, unencrypted HTTP connections, and abnormal structures.</p>
            </div>

            <!-- Feature Card 2 -->
            <div class="card">
                <div class="card-icon">📊</div>
                <h3>Risk Detection</h3>
                <p>Categorize submitted URLs into Low, Medium, or High Risk using rule-based heuristic checks.</p>
            </div>

            <!-- Feature Card 3 -->
            <div class="card">
                <div class="card-icon">🛡</div>
                <h3>Safety Tips</h3>
                <p>Learn essential cybersecurity habits to protect your passwords, OTPs, and personal credentials.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> ScamSens — Web-Based Scam & Phishing Detection System</p>
        </div>
    </footer>

    <script src="js/script.js?v=1.1"></script>
</body>
</html>