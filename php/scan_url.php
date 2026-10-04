<?php
/**
 * ScamSens — Simple Rule-Based URL Analysis
 * Analyzes string characteristics of the submitted URL without executing or visiting it.
 * Technology: Pure PHP, beginner-friendly, no frameworks, no MySQL.
 */
session_start();

/**
 * Analyzes a URL string against 7 heuristic security checks.
 *
 * @param string $url The submitted URL to inspect
 * @return array Contains 'score', 'risk_level', 'indicators', and 'url'
 */
function analyzeURL($url) {
    $url = trim($url);
    $score = 0;
    $indicators = [];

    // Add temporary protocol if missing so parse_url can reliably extract host and path
    $parsedUrl = $url;
    if (!preg_match('#^[a-zA-Z][a-zA-Z0-9+.-]*://#', $parsedUrl)) {
        $parsedUrl = 'http://' . $parsedUrl;
    }

    $parsed = parse_url($parsedUrl);
    $host = strtolower($parsed['host'] ?? '');
    $lowerUrl = strtolower($url);

    // ========================================================
    // 1. HTTP instead of HTTPS
    // ========================================================
    if (strpos($lowerUrl, 'https://') === 0) {
        // HTTPS connection: safe in transit (0 penalty points)
    } else {
        $score += 20;
        $indicators[] = "HTTP connection";
    }

    // ========================================================
    // 2. IP address instead of domain
    // ========================================================
    $isIp = filter_var($host, FILTER_VALIDATE_IP) || preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(:\d+)?$/', $host);
    if ($isIp) {
        $score += 30;
        $indicators[] = "IP address used as domain ($host)";
    }

    // ========================================================
    // 3. URL longer than 100 characters
    // ========================================================
    if (strlen($url) > 100) {
        $score += 20;
        $indicators[] = "URL longer than 100 characters (" . strlen($url) . " characters)";
    }

    // ========================================================
    // 4. @ symbol in URL
    // ========================================================
    if (strpos($url, '@') !== false) {
        $score += 25;
        $indicators[] = "@ symbol in URL";
    }

    // ========================================================
    // 5. Suspicious keywords: login, verify, password, bank, reward, otp
    // ========================================================
    $keywords = ['login', 'verify', 'password', 'bank', 'reward', 'otp'];
    $foundKeywords = [];

    foreach ($keywords as $word) {
        if (strpos($lowerUrl, $word) !== false) {
            $foundKeywords[] = $word;
        }
    }

    if (!empty($foundKeywords)) {
        $uniqueKeywords = array_values(array_unique($foundKeywords));
        $score += min(40, count($uniqueKeywords) * 20);
        foreach ($uniqueKeywords as $kw) {
            $indicators[] = "Suspicious keyword: $kw";
        }
    }

    // ========================================================
    // 6. Excessive subdomains (4 or more domain levels for named hosts)
    // ========================================================
    $cleanHost = preg_replace('/^www\./', '', $host);
    $domainParts = explode('.', $cleanHost);

    if (!$isIp && count($domainParts) >= 4) {
        $score += 20;
        $indicators[] = "Excessive subdomains (" . count($domainParts) . " domain parts)";
    }

    // ========================================================
    // 7. Common URL shorteners such as bit.ly and tinyurl.com
    // ========================================================
    $shorteners = [
        'bit.ly', 'tinyurl.com', 't.co', 'goo.gl', 'ow.ly', 
        'is.gd', 'buff.ly', 'cutt.ly', 'rebrand.ly', 'rb.gy'
    ];

    $isShortener = false;
    foreach ($shorteners as $short) {
        if ($host === $short || str_ends_with($host, '.' . $short)) {
            $isShortener = true;
            break;
        }
    }

    if ($isShortener) {
        $score += 20;
        $indicators[] = "Common URL shortener detected ($host)";
    }

    // ========================================================
    // Calculate Final Risk Score and Risk Level
    // ========================================================
    // Clamp score to maximum of 100
    $finalScore = min(100, $score);

    // Determine Risk Level & Recommendation
    // 0–30 = LOW RISK
    // 31–60 = MEDIUM RISK
    // 61–100 = HIGH RISK
    if ($finalScore >= 61) {
        $riskLevel = "HIGH RISK";
        $recommendation = "Suspicious Indicators Detected. Exercise caution and avoid entering personal or financial information. Verify the domain through an official source.";
    } elseif ($finalScore >= 31) {
        $riskLevel = "MEDIUM RISK";
        $recommendation = "Potentially Risky. Exercise caution before proceeding. Avoid entering passwords, OTPs, or financial details on unverified pages.";
    } else {
        $riskLevel = "LOW RISK";
        $recommendation = "Minimal risk indicators detected. Always ensure the website address matches the official service you intend to visit.";
    }

    // Default indicator if completely clean
    if (empty($indicators)) {
        $indicators[] = "No suspicious indicators detected";
    }

    return [
        'url'            => $url,
        'score'          => $finalScore,
        'risk_level'     => $riskLevel,
        'indicators'     => $indicators,
        'recommendation' => $recommendation
    ];
}

// ========================================================
// Form Submission Processing (POST)
// ========================================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $url = trim($_POST['url'] ?? '');

    // Check 1: Empty input
    if (empty($url)) {
        $_SESSION['scan_error'] = "Please enter a URL to scan.";
        header('Location: ../scanner.php');
        exit;
    }

    // Check 2: Basic format validation (must contain a valid domain dot or IP)
    $testUrl = $url;
    if (!preg_match('#^[a-zA-Z][a-zA-Z0-9+.-]*://#', $testUrl)) {
        $testUrl = 'http://' . $testUrl;
    }
    $hostPart = strtolower(parse_url($testUrl, PHP_URL_HOST) ?? '');

    if (empty($hostPart) || (strpos($hostPart, '.') === false && !filter_var($hostPart, FILTER_VALIDATE_IP) && $hostPart !== 'localhost')) {
        $_SESSION['scan_error'] = "Please enter a valid URL (e.g., https://example.com or example.com).";
        header('Location: ../scanner.php');
        exit;
    }

    // Perform rule-based analysis
    $analysisResult = analyzeURL($url);

    // Store analysis result in session for the result page
    $_SESSION['scan_result'] = $analysisResult;

    // Redirect to Result page
    header('Location: ../result.php');
    exit;
}
