<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* 🎨 CSS Variables (THEME CONFIGURATION: Black, Orange, White) */
    :root {
      /* Background: Deep Black with a subtle dark gradient */
      --bg: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 100%);

      /* Card/Element Backgrounds: Slightly opaque dark gray */
      --card-bg: rgba(26, 26, 26, 0.7); 

      /* Primary Accent Color: Vibrant Orange */
      --primary: #ff8c00;
      --primary-hover: #ff6600;

      /* Border/Focus Color: Soft Orange for subtle glow */
      --border: rgba(255, 140, 0, 0.4);

      /* Text Colors: Off-White for high contrast */
      --text: #eeeeee;
      --muted: #cccccc; /* Slightly darker white for hints/links */

      /* Design Constants */
      --radius: 8px; /* Slightly tighter radius */
      --input-bg: rgba(255, 255, 255, 0.05); /* Very dark input background */
      --input-focus: rgba(255, 140, 0, 0.1); /* Light orange focus background */
      --shadow: 0 3px 18px 0 rgba(255, 140, 0, 0.15); /* Soft Orange shadow */
      --shadow-lg: 0 6px 24px 0 rgba(255, 140, 0, 0.3); /* Stronger Orange shadow */
      
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
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary); /* Orange Header */
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
      color: var(--primary); /* Orange Icon */
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
      border-color: var(--primary); /* Orange Focus Border */
      background: var(--input-focus);
      box-shadow: var(--shadow-lg);
    }
    
    /* Button Styles (Updated for Orange) */
    button {
      /* Solid Orange Background for high contrast */
      background: var(--primary); 
      color: #0d0d0d; /* Black text on orange button */
      padding: 12px 18px; /* Adjusted padding as the icon position has been moved */
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

    /* Icon inside button (Adjusted for orange theme) */
    button i {
      position: relative; /* Changed from absolute to flow with text */
      left: 0;
      font-size: 1em;
      color: #0d0d0d; /* Black icon on orange button */
    }

    button:hover {
      transform: translateY(-2px);
      background: var(--primary-hover); /* Darker Orange */
      box-shadow: var(--shadow-lg);
    }

    .back-link {
      display: inline-block;
      margin-top: 16px;
      font-size: 0.9rem;
      text-decoration: none;
      color: var(--muted);
    }

    .back-link:hover {
      color: var(--primary); /* Orange on hover */
      text-decoration: underline;
    }
</style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="header">
        <h2>Edit Student Info</h2>
      </div>
      <form method="POST">
        <div class="input-icon">
          <i class="fa fa-user"></i>
          <input type="text" name="first_name" value="<?= $student['first_name'] ?>" required>
        </div>
        <div class="input-icon">
          <i class="fa fa-user-astronaut"></i>
          <input type="text" name="last_name" value="<?= $student['last_name'] ?>" required>
        </div>
        <div class="input-icon">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" value="<?= $student['email'] ?>" required>
        </div>
        <button type="submit"><i class="fa fa-floppy-disk"></i> Update Student Info</button>
      </form>
      <a class="back-link" href="<?= site_url().'students' ?>">Back to Students</a>
    </div>
  </div>
</body>
</html>
