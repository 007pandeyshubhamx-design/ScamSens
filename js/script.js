/**
 * ScamSens — JavaScript Frontend Logic
 * Implements form validation, clear button, mobile menu, and preset helpers.
 * No frameworks or libraries.
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Navigation Toggle
    var navToggle = document.getElementById('navToggle');
    var navLinks = document.getElementById('navLinks');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', function () {
            navLinks.classList.toggle('open');
        });
    }

    // 2. Scanner Form Elements
    var scannerForm = document.getElementById('scannerForm');
    var urlInput = document.getElementById('urlInput');
    var clearBtn = document.getElementById('clearBtn');
    var errorMessage = document.getElementById('errorMessage');

    // Helper: Show error message
    function showError(msg) {
        if (errorMessage) {
            errorMessage.textContent = msg;
            errorMessage.style.display = 'block';
        }
    }

    // Helper: Hide error message
    function hideError() {
        if (errorMessage) {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        }
    }

    // Helper: Validate URL format
    // Accepts full URLs (http/https), raw domains (example.com), and IP addresses (192.168.1.10)
    function isValidUrl(input) {
        // Disallow spaces
        if (/\s/.test(input)) {
            return false;
        }

        // Regex pattern:
        // Optional protocol (http:// or https://)
        // Optional userinfo (e.g. user@ or deceptive @ domain)
        // Domain with valid TLD, or IPv4 address, or localhost
        // Optional port and path/query
        var pattern = /^(https?:\/\/)?([a-zA-Z0-9_.~!$&'()*+,;=:-]+@)?(([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}|\d{1,3}(\.\d{1,3}){3}|localhost)(:\d+)?(\/.*)?$/i;
        return pattern.test(input);
    }

    // 3. Clear Button Click
    if (clearBtn && urlInput) {
        clearBtn.addEventListener('click', function () {
            urlInput.value = '';
            hideError();
            urlInput.focus();
        });
    }

    // 4. Sample Preset Buttons (fills input and clears error)
    var pillButtons = document.querySelectorAll('.pill-btn');
    pillButtons.forEach(function (pill) {
        pill.addEventListener('click', function () {
            var url = pill.getAttribute('data-url');
            if (url && urlInput) {
                urlInput.value = url;
                hideError();
                urlInput.focus();
            }
        });
    });

    // 5. Form Submit Validation
    if (scannerForm && urlInput) {
        scannerForm.addEventListener('submit', function (event) {
            var value = urlInput.value.trim();

            // Check 1: Empty input validation
            if (value === '') {
                event.preventDefault();
                showError('Please enter a URL to scan.');
                urlInput.focus();
                return false;
            }

            // Check 2: Invalid URL format validation
            if (!isValidUrl(value)) {
                event.preventDefault();
                showError('Please enter a valid URL (e.g., https://example.com or example.com).');
                urlInput.focus();
                return false;
            }

            // Valid URL: Hide error and allow standard submission to PHP backend
            hideError();
            return true;
        });

        // Hide error when user types
        urlInput.addEventListener('input', function () {
            if (errorMessage && errorMessage.style.display !== 'none') {
                hideError();
            }
        });
    }
});