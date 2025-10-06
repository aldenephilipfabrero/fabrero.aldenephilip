<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
 <style>
    /* 🎨 THEME: BLACK, ORANGE, WHITE */
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      /* Changed from Purple/Pink to Black/Dark Gray with Orange for depth */
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a, #252525, #333333); 
      background-size: 300% 300%;
      animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Form (Card) Style: Dark, translucent background */
    form {
      background: rgba(26, 26, 26, 0.75); /* Darker, less transparent background */
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 16px;
      padding: 30px 25px;
      width: 100%;
      max-width: 320px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6); /* Stronger shadow */
      color: #eeeeee; /* Off-White Text */
      text-align: center;
      border: 1px solid rgba(255, 140, 0, 0.3); /* Subtle orange border */
      transition: transform 0.2s ease-in-out, box-shadow 0.3s;
    }

    form:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(255, 140, 0, 0.3); /* Orange glow on hover */
    }

    h1 {
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: #ff8c00; /* Vibrant Orange Heading */
      letter-spacing: 1px;
    }

    /* Input Fields Style */
    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 15px;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.08); /* Darker input background */
      color: #eeeeee;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      outline: none;
    }
    
    /* Dropdown Options (Specific fix for dark theme options) */
    select option {
        background: #1a1a1a;
        color: #eeeeee;
    }

    input::placeholder {
      color: rgba(238, 238, 238, 0.6); /* Lighter placeholder text */
    }

    input:focus, select:focus {
      background: rgba(255, 140, 0, 0.1); /* Subtle orange focus background */
      box-shadow: 0 0 6px rgba(255, 140, 0, 0.8); /* Orange focus glow */
      border: 1px solid #ff8c00; /* Solid orange border on focus */
    }

    /* Submit Button Style: Solid Orange */
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      /* Solid Orange Background for high contrast */
      background: #ff8c00; 
      color: #0d0d0d; /* Black text on orange button */
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      text-transform: uppercase;
    }

    input[type="submit"]:hover {
      /* Darker orange on hover */
      background: #ff6600; 
      transform: scale(1.02); /* Slightly less dramatic scale */
      box-shadow: 0 0 12px rgba(255, 140, 0, 0.7); /* Stronger orange glow */
    }
  </style>
</head>
<body>
  <form action="<?=site_url('students/create');?>" method="post">
    <h1>Create User</h1>
    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
    <input type="email" id="email" name="email" placeholder="Email" required>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
