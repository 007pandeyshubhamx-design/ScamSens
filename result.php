<?php
/**
 * ScamSens — Result Page
 * Displays analysis summary: URL, Risk Score, Risk Level, Detected Indicators, and Safety Recommendation.
 */
session_start();
$result = $_SESSION['scan_result'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScamSens Analysis Result</title>
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

    <!-- Main Content -->
    <main class="container page-content">
        <div class="result-card">
            <?php if (!$result): ?>
                <h2 style="font-size: 22px; margin-bottom: 12px; color: var(--text-dark);">No Scan Result Found</h2>
                <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 20px;">Please scan a URL first to view the analysis.</p>
                <a href="scanner.php" class="btn btn-primary">Scan a URL</a>
            <?php else: 
                $url = htmlspecialchars($result['url'], ENT_QUOTES, 'UTF-8');
                $score = (int)$result['score'];
                $indicators = $result['indicators'] ?? [];

                // Determine Risk Level, Color, and Recommendation based on score
                // 0–30 = LOW RISK (Green)
                // 31–60 = MEDIUM RISK (Orange/Yellow)
                // 61–100 = HIGH RISK (Red)
                if ($score >= 61) {
                    $riskLevel = "HIGH RISK";
                    $color = "var(--risk-high)";
                    $badgeClass = "badge-high";
                    $statusText = "Suspicious Indicators Detected";
                    $recommendation = $result['recommendation'] ?? "Suspicious Indicators Detected. Exercise caution and avoid entering personal or financial information. Verify the domain through an official source.";
                } elseif ($score >= 31) {
                    $riskLevel = "MEDIUM RISK";
                    $color = "var(--risk-med)";
                    $badgeClass = "badge-med";
                    $statusText = "Potentially Risky";
                    $recommendation = $result['recommendation'] ?? "Potentially Risky. Exercise caution before proceeding. Avoid entering passwords, OTPs, or financial details on unverified pages.";
                } else {
                    $riskLevel = "LOW RISK";
                    $color = "var(--risk-low)";
                    $badgeClass = "badge-low";
                    $statusText = "Low Risk Indicators Detected";
                    $recommendation = $result['recommendation'] ?? "Minimal risk indicators detected. Always ensure the website address matches the official service you intend to visit.";
                }
            ?>
                <!-- Header -->
                <div class="result-header">
                    <h2>URL Scan Result</h2>
                    <span class="result-status"><?= $statusText ?></span>
                </div>

                <!-- URL Section -->
                <div class="result-section">
                    <div class="section-label">Scanned URL:</div>
                    <div class="scanned-url-box">
                        <?= $url ?>
                    </div>
                </div>

                <!-- Risk Score & Risk Level Section -->
                <div class="score-display">
                    <div class="score-label">Risk Score:</div>
                    <div class="score-container">
                        <span class="score-number" style="color: <?= $color ?>;"><?= $score ?></span>
                        <span class="score-max">/100</span>
                    </div>

                    <!-- Visual Score Progress Meter -->
                    <div class="score-meter" role="progressbar" aria-valuenow="<?= $score ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="score-meter-fill" style="width: <?= $score ?>%; background-color: <?= $color ?>;"></div>
                    </div>

                    <div style="margin-top: 16px;">
                        <div class="score-label" style="margin-bottom: 6px;">Risk Level:</div>
                        <span class="badge <?= $badgeClass ?>">
                            <?= $riskLevel ?>
                        </span>
                    </div>
                </div>

                <!-- Detected Indicators -->
                <div class="result-section">
                    <h3 class="result-subheading">Detected Indicators:</h3>
                    <ul class="indicators-list">
                        <?php foreach ($indicators as $ind): ?>
                            <li class="indicator-item" style="border-left-color: <?= $color ?>;">
                                <span style="color: <?= $color ?>; font-weight: bold; flex-shrink: 0;">•</span>
                                <span style="word-break: break-word;"><?= htmlspecialchars($ind, ENT_QUOTES, 'UTF-8') ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Safety Recommendation -->
                <div class="recommendation-box">
                    <div class="recommendation-title">Safety Recommendation:</div>
                    <p class="recommendation-text">
                        <?= htmlspecialchars($recommendation, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>

                <!-- Action Button -->
                <div class="form-actions">
                    <a href="scanner.php" class="btn btn-primary">Scan Another URL</a>
                </div>
            <?php endif; ?>
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
