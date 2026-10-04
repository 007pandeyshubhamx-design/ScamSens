<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Tips — ScamSens</title>
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
                <li><a href="scanner.php">URL Scanner</a></li>
                <li><a href="safety.php" class="active">Safety Tips</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container page-content">
        <div class="section-title">
            <h2>Cybersecurity Safety Tips</h2>
            <p>Simple and essential practices to protect your accounts, money, and personal information online.</p>
        </div>

        <div class="features-grid">
            <!-- 1. Never share OTP -->
            <div class="card">
                <div class="card-icon">🔑</div>
                <h3>Never Share OTP</h3>
                <p>One-Time Passwords (OTP) are your final security shield for account logins and banking transactions. Legitimate banks and support teams will never call, message, or email asking for your OTP.</p>
            </div>

            <!-- 2. Never share passwords -->
            <div class="card">
                <div class="card-icon">🔒</div>
                <h3>Never Share Passwords</h3>
                <p>Keep your master passwords strictly private. Never share them over chat, phone calls, or enter them on forms reached through unsolicited messages or unverified links.</p>
            </div>

            <!-- 3. Never share UPI PIN/CVV -->
            <div class="card">
                <div class="card-icon">💳</div>
                <h3>Never Share UPI PIN / CVV</h3>
                <p>You never need to enter a UPI PIN to receive money. Entering a PIN always sends money out of your account. Similarly, never disclose the 3-digit CVV printed on your card.</p>
            </div>

            <!-- 4. Check the domain before clicking -->
            <div class="card">
                <div class="card-icon">🌐</div>
                <h3>Check Domain Before Clicking</h3>
                <p>Always inspect the domain name directly before the extension (e.g., .com). Watch out for lookalike domains with subtle typos or stacked subdomains designed to deceive you.</p>
            </div>

            <!-- 5. Be careful with urgent messages -->
            <div class="card">
                <div class="card-icon">⚠️</div>
                <h3>Be Careful with Urgent Messages</h3>
                <p>Scammers create artificial urgency (e.g., "account blocked in 24 hours" or "act fast to claim prize") to trigger panic. Pause, take a breath, and evaluate the claim calmly.</p>
            </div>

            <!-- 6. Verify suspicious links from official sources -->
            <div class="card">
                <div class="card-icon">✅</div>
                <h3>Verify Links from Official Sources</h3>
                <p>If you receive a notification regarding your bank, courier, or account, do not click the link provided. Instead, open your browser and navigate directly to the verified official portal or app.</p>
            </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="cta-card">
            <h3>Received a Suspicious Link?</h3>
            <p>Use our URL scanner to inspect the link's structure and check for phishing indicators before clicking.</p>
            <a href="scanner.php" class="btn btn-primary">Scan a URL Now</a>
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
