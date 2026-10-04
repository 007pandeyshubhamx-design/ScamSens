# ScamSens — Scam and Phishing URL Detection System

> **A Simple, Rule-Based Cybersecurity URL Detection System**  
> *Built with HTML5, CSS3, JavaScript, and PHP. No frameworks, no external libraries, no MySQL.*

---

## 1. Project Overview

**ScamSens** is a B.Tech college project in cybersecurity that allows users to submit a suspicious URL and determine whether it represents a **LOW RISK**, **MEDIUM RISK**, or **HIGH RISK** threat.

The system uses **transparent, rule-based URL analysis** (not a complex black-box model). Every line of code, heuristic check, and point calculation is straightforward and easy to explain during an academic viva.

---

## 2. Technology Stack

* **HTML5:** Clean, semantic structure.
* **CSS3 (Vanilla):** Custom cybersecurity dark theme (`#0a0f1d`, cyan accents `#00e5ff`, risk colors green/orange/red). Fully responsive without Bootstrap or Tailwind.
* **JavaScript (Vanilla):** Lightweight form validation and sample button presets without jQuery or libraries.
* **PHP 8+:** Server-side string parsing and simple rule-based heuristic calculations. No frameworks, no database.
* **Server:** Runs locally on Apache via **XAMPP** (`http://localhost/ScamSens/`).

---

## 3. Project File Structure

The project has been kept intentionally small and clean with zero bloat:

```text
ScamSens/
│
├── index.php         # Home Page (Hero section, core features)
├── scanner.php       # URL Scanner Page (Input field, preset buttons)
├── result.php        # Result Page (Score, Risk Level, Indicators, Recommendation)
├── safety.php        # Safety Tips Page (OTP, PIN, Password guidance)
├── about.php         # About Page (Project explanation, tech stack, disclaimers)
│
├── css/
│   └── style.css     # Clean Dark Theme Stylesheet & Responsive Rules
│
├── js/
│   └── script.js     # Client-Side Input Validation & Mobile Menu
│
└── php/
    └── scan_url.php  # Core Detection Engine (Heuristic checks & scoring)
```

---

## 4. How to Run in XAMPP

1. **Copy the Folder:**  
   Ensure the `ScamSens` folder is inside your XAMPP web root:
   ```text
   C:\xampp\htdocs\ScamSens\
   ```
2. **Start Apache:**  
   - Open **XAMPP Control Panel**.
   - Click **Start** next to **Apache**.
   - *(Do NOT start MySQL — no database is required).*
3. **Open in Browser:**  
   Navigate to:
   ```text
   http://localhost/ScamSens/
   ```

---

## 5. What Each File Does

| File | Role & Explanation |
|---|---|
| [`index.php`](file:///c:/xampp/htdocs/Scamsens/index.php) | Landing page with a clean hero section and 3 core feature cards introducing the project. |
| [`scanner.php`](file:///c:/xampp/htdocs/Scamsens/scanner.php) | Form where the user inputs a URL. Includes client-side and server-side validation. |
| [`result.php`](file:///c:/xampp/htdocs/Scamsens/result.php) | Displays the scan summary: Scanned URL, Risk Score (0–100), Risk Level badge, red flags, and advice. |
| [`safety.php`](file:///c:/xampp/htdocs/Scamsens/safety.php) | Educational cyber safety guidelines (Never share OTP, PIN, Passwords, verify links). |
| [`about.php`](file:///c:/xampp/htdocs/Scamsens/about.php) | Explains the project purpose, architecture, rule engine, and academic limitations. |
| [`php/scan_url.php`](file:///c:/xampp/htdocs/Scamsens/php/scan_url.php) | The backend script containing `analyzeURL($url)`. Applies the 7 security rules, calculates the score, stores results in session, and redirects to `result.php`. |
| [`css/style.css`](file:///c:/xampp/htdocs/Scamsens/css/style.css) | Single stylesheet for dark theme, typography, flexbox/grid layout, and responsive mobile media queries. |
| [`js/script.js`](file:///c:/xampp/htdocs/Scamsens/js/script.js) | Validates input format, handles clear button, preset buttons, and mobile menu toggle. |

---

## 6. How URL Analysis Works (The 7 Rules)

The detection engine in [`php/scan_url.php`](file:///c:/xampp/htdocs/Scamsens/php/scan_url.php) inspects only the string characteristics of the submitted URL:

1. **HTTP instead of HTTPS (+20 points):**  
   Checks if the URL does not begin with `https://`. Unencrypted HTTP connections expose credentials to interception.
2. **IP Address Used as Domain (+30 points):**  
   Checks whether the host is an IPv4 address (e.g. `192.168.1.10`) using `filter_var(..., FILTER_VALIDATE_IP)`. Attackers often use raw IPs to bypass domain reputation checks.
3. **URL Longer than 100 Characters (+20 points):**  
   Excessively long URLs are often used to conceal malicious subdomains or append character padding.
4. **`@` Symbol in URL (+25 points):**  
   In URL syntax, anything before `@` is treated as user credentials. Phishers use this to fool users into reading the wrong domain.
5. **Suspicious Keywords (+20 points per keyword, max +40):**  
   Searches for high-frequency phishing keywords: `login`, `verify`, `password`, `bank`, `reward`, `otp`.
6. **Excessive Subdomains (+20 points):**  
   Splits the host by `.` (ignoring `www`). If there are 4 or more domain levels (e.g., `a.b.c.example.com`), it flags subdomain spoofing.
7. **Common URL Shortener (+20 points):**  
   Detects shortener domains (`bit.ly`, `tinyurl.com`, `t.co`, `goo.gl`, etc.) used to disguise real destinations.

---

## 7. Risk Score Calculation

$$\text{Final Score} = \min(100, \sum \text{Triggered Rule Points})$$

* **0 – 30:** **LOW RISK** (🟢 Green) — Minimal risk indicators detected.
* **31 – 60:** **MEDIUM RISK** (🟠 Orange/Yellow) — Potentially Risky; exercise caution.
* **61 – 100:** **HIGH RISK** (🔴 Red) — Suspicious Indicators Detected; do not enter personal or financial details.

---

## 8. Viva Questions & Answers (Quick Reference)

**Q1: Why does ScamSens not visit or fetch the URL?**  
*Answer:* Visiting an unknown URL can trigger drive-by downloads or alert attackers. ScamSens performs non-intrusive static heuristic string inspection safely without making network requests.

**Q2: Why is no database (MySQL) used?**  
*Answer:* ScamSens is designed as a stateless, lightweight scanner. Results are passed between PHP and the result page via native PHP session (`$_SESSION`), keeping deployment simple and zero-dependency.

**Q3: Can HTTPS guarantee that a website is safe?**  
*Answer:* No. Anyone can obtain a free SSL/TLS certificate. HTTPS only encrypts the traffic in transit; it does not verify the owner's intent.

**Q4: How does the scoring system work?**  
*Answer:* It uses a deterministic rule-based scoring system where each detected indicator adds a predefined penalty weight. The score is clamped between 0 and 100 and mapped to Low, Medium, or High Risk.
