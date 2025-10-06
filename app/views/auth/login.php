<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    /* 🎨 CSS Variables (THEME CONFIGURATION) */
    :root {
        /* Background: Deep Black with a subtle dark gradient */
        --bg: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 100%);

        /* Card/Element Backgrounds: Slightly opaque dark gray */
        --card-bg: rgba(26, 26, 26, 0.7); /* Dark gray, slightly transparent */

        /* Primary Accent Color: Vibrant Orange */
        --primary: #ff8c00;
        --primary-hover: #ff6600;

        /* Border/Focus Color: Soft Orange for subtle glow */
        --border: rgba(255, 140, 0, 0.5);

        /* Text Colors: Off-White for high contrast */
        --text: #eeeeee;
        --muted: #cccccc; /* Slightly darker white for hints */

        /* Design Constants */
        --radius: 8px; /* Slightly tighter radius */
        --input-bg: rgba(255, 255, 255, 0.05); /* Very dark input background */
        --input-focus: rgba(255, 140, 0, 0.1); /* Light orange focus background */
        --shadow: 0 3px 24px 0 rgba(255, 140, 0, 0.15); /* Soft Orange shadow */
        --shadow-lg: 0 6px 28px 0 rgba(255, 140, 0, 0.35); /* Stronger Orange shadow */
        
        font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    }

    /* ---------------------------------------------------- */
    /* All other styles now automatically use the new variables */
    /* ---------------------------------------------------- */

    body {
        margin: 0;
        background: var(--bg);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        color: var(--text);
    }

    .container {
        width: 100%;
        max-width: 420px;
        padding: 16px;
    }

    .card {
        background: var(--card-bg);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 28px 24px;
        backdrop-filter: blur(10px);
    }

    .header {
        text-align: center;
        margin-bottom: 24px;
    }

    .header h2 {
        margin: 0;
        font-size: 1.9rem;
        font-weight: 700;
        color: var(--primary);
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 16px;
        align-items: center;
    }

    .input-icon, input, button {
        width: 100%;
        max-width: 320px;
    }

    .input-icon {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon i {
        position: absolute;
        left: 14px;
        color: var(--primary);
        font-size: 1em;
    }

    input {
        padding: 12px 16px 12px 40px;
        border-radius: var(--radius);
        border: 1.5px solid var(--border);
        font-size: 0.95rem;
        background: var(--input-bg);
        color: var(--text);
    }

    input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--input-focus);
        box-shadow: var(--shadow-lg);
    }

    .relative {
        position: relative;
        display: flex;
        align-items: center;
    }

    .show-btn {
        position: absolute;
        left: 120px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
    }


    button.submit {
        /* Changed to solid orange for a cleaner look, kept gradient structure */
        background: var(--primary); 
        color: #0d0d0d; /* Black text on orange button */
        padding: 12px 18px; /* Adjusted padding as icon is not in the button */
        border: none;
        border-radius: var(--radius);
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        position: relative;
    }
    
    /* Repositioned icon style for the submit button */
    button.submit i {
        position: relative; 
        left: 0;
        font-size: 1em;
        color: #0d0d0d; /* Black icon on orange button */
    }

    button.submit:hover {
        transform: translateY(-2px);
        background: var(--primary-hover);
        box-shadow: var(--shadow-lg);
    }

    p.hint {
        color: var(--muted);
        text-align: center;
        margin-top: 0.9rem;
        font-size: 0.9rem;
    }

    p.hint a {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    p.hint a:hover {
        color: var(--primary-hover);
        text-decoration: underline;
    }
</style>
    </head>
    <body>
    <div class="container">
        <div class="card" role="region" aria-label="Login form">
        <div class="header">
            <h2>Login</h2>
        </div>

        <!-- PHP form logic remains intact -->
        <form method="post">
            <div class="input-icon">
            <i class="fa fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-icon relative">
            <i class="fa fa-lock"></i>
            <input type="password" id="login-password" name="password" placeholder="Password" required>
            <button type="button" onclick="togglePassword('login-password', this)" class="show-btn">Show</button>
            </div>

            <button type="submit" class="submit">
            <i class="fa fa-right-to-bracket"></i> Login
            </button>
        </form>

        <p class="hint">
            Don't have an account?
            <a href="<?= site_url('/') ?>">Register</a>
        </p>
        </div>
    </div>

    <script>
        function togglePassword(id, btn) {
        const input = document.getElementById(id);
        if (!input) return;
        if (input.type === 'password') {
            input.type = 'text';
            btn.textContent = 'Hide';
        } else {
            input.type = 'password';
            btn.textContent = 'Show';
        }
        }
    </script>
</body>
</html>
