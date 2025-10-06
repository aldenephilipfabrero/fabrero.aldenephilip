<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --bg: linear-gradient(135deg, #1a032d 0%, #3d0c5d 50%, #5b1d82 100%);
      --card-bg: rgba(255, 255, 255, 0.06);
      --primary: #c084fc;
      --primary-hover: #a855f7;
      --border: rgba(192, 132, 252, 0.5);
      --text: #f3e8ff;
      --muted: #a78bfa;
      --radius: 10px;
      --input-bg: rgba(255, 255, 255, 0.08);
      --input-focus: rgba(255, 255, 255, 0.15);
      --shadow: 0 3px 24px 0 rgba(192, 132, 252, 0.25);
      --shadow-lg: 0 6px 28px 0 rgba(192, 132, 252, 0.35);
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    }
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
      max-width: 420px; /* compact */
      padding: 16px;
    }
    .card {
      background: var(--card-bg);
      border: 1.5px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 28px 24px; /* compact */
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
      max-width: 320px; /* compact */
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
    button {
      background: linear-gradient(90deg, #9333ea, #a855f7, #c084fc);
      color: #fff;
      padding: 12px 18px 12px 40px;
      border: none;
      border-radius: var(--radius);
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: var(--shadow);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      position: relative;
    }
    button i {
      position: absolute;
      left: 16px;
      font-size: 1em;
      color: #f3e8ff;
    }
    button:hover {
      transform: translateY(-2px);
      background: var(--primary-hover);
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
      color: var(--primary);
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
