document.addEventListener("DOMContentLoaded", function () {
    const passwordElement = document.getElementById("generated-password");
    const copyButton = document.getElementById("copy-button");
    const strengthText = document.getElementById("strength-result");

    // Function to check password strength
    function checkStrength(password) {
        let strength = 0;
        if (password.length >= 12) strength++; // Length check
        if (/[a-z]/.test(password)) strength++; // Lowercase check
        if (/[A-Z]/.test(password)) strength++; // Uppercase check
        if (/[0-9]/.test(password)) strength++; // Number check
        if (/[\W_]/.test(password)) strength++; // Special character check

        // Assign strength level
        if (strength <= 2) {
            return { text: "Weak", color: "red" };
        } else if (strength <= 4) {
            return { text: "Medium", color: "orange" };
        } else {
            return { text: "Strong", color: "green" };
        }
    }

    // Display password strength if a password exists
    if (passwordElement && strengthText) {
        const password = passwordElement.innerText;
        const strength = checkStrength(password);
        strengthText.innerText = strength.text;
        strengthText.style.color = strength.color;
    }

    // Copy password to clipboard
    if (copyButton) {
        copyButton.addEventListener("click", function () {
            if (passwordElement) {
                navigator.clipboard.writeText(passwordElement.innerText).then(() => {
                    alert("Password copied to clipboard!");
                }).catch(err => {
                    console.error("Failed to copy:", err);
                });
            }
        });
    }
});
