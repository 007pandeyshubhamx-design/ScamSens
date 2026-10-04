<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About — ScamSens</title>
    <link rel="stylesheet" href="css/style.css?v=1.3">
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
                <li><a href="scanner.php">URL Scanner</a></li>
                <li><a href="safety.php">Safety Tips</a></li>
                <li><a href="about.php" class="active">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container page-content">
        <div class="about-container">

            <!-- 1. Clean Heading & Subtitle -->
            <div class="about-header">
                <h1>About ScamSens</h1>
                <p class="about-subtitle">Web-Based Scam & Phishing URL Detection System</p>
            </div>

            <!-- 6. Project Information Box -->
            <div class="project-info-card">
                <div class="project-info-grid">
                    <div class="info-item">
                        <span class="info-label">Project Name</span>
                        <span class="info-value">ScamSens</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Project Type</span>
                        <span class="info-value">Web Application</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Purpose</span>
                        <span class="info-value">Cybersecurity Awareness</span>
                    </div>
                </div>
            </div>

            <!-- 2. What is ScamSens? -->
            <div class="about-card">
                <div class="card-header-simple">
                    <span class="section-icon">🛡️</span>
                    <h3>What is ScamSens?</h3>
                </div>
                <p>
                    ScamSens is a lightweight web application that analyzes suspicious URLs and identifies common scam and phishing indicators.
                </p>
            </div>

            <!-- 3. Why We Created It -->
            <div class="about-card">
                <div class="card-header-simple">
                    <span class="section-icon">🎯</span>
                    <h3>Why We Created It</h3>
                </div>
                <p>
                    The project was created to provide a simple way for users to check suspicious links before clicking them or entering personal information.
                </p>
            </div>

            <!-- 4. How It Works (4 Steps) -->
            <div class="about-card">
                <div class="card-header-simple">
                    <span class="section-icon">⚙️</span>
                    <h3>How It Works</h3>
                </div>
                <div class="steps-grid">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-title">Enter URL</div>
                        <p class="step-desc">Input a web address into the scanner</p>
                    </div>
                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-title">Analyze URL</div>
                        <p class="step-desc">System examines URL structure & protocol</p>
                    </div>
                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-title">Detect Suspicious Indicators</div>
                        <p class="step-desc">Checks for phishing patterns & red flags</p>
                    </div>
                    <div class="step-item">
                        <div class="step-num">4</div>
                        <div class="step-title">Display Risk Level</div>
                        <p class="step-desc">Shows risk score & safety advice</p>
                    </div>
                </div>
            </div>

            <!-- 5. Technologies Used -->
            <div class="about-card">
                <div class="card-header-simple">
                    <span class="section-icon">💻</span>
                    <h3>Technologies Used</h3>
                </div>
                <div class="tech-grid">
                    <div class="tech-card">
                        <strong>HTML</strong>
                        <span>Structure</span>
                    </div>
                    <div class="tech-card">
                        <strong>CSS</strong>
                        <span>Styling</span>
                    </div>
                    <div class="tech-card">
                        <strong>JavaScript</strong>
                        <span>Validation</span>
                    </div>
                    <div class="tech-card">
                        <strong>PHP</strong>
                        <span>Rule Engine</span>
                    </div>
                    <div class="tech-card">
                        <strong>XAMPP</strong>
                        <span>Local Server</span>
                    </div>
                </div>
            </div>

            <!-- 7. Limitations Section -->
            <div class="about-card limitations-card">
                <div class="card-header-simple">
                    <span class="section-icon">⚠️</span>
                    <h3 style="color: #856404;">Limitations</h3>
                </div>
                <ul class="limitations-list">
                    <li>It analyzes URL structure only.</li>
                    <li>It does not visit or execute the website.</li>
                    <li>It is rule-based and cannot guarantee that a URL is safe or malicious.</li>
                </ul>
            </div>

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
