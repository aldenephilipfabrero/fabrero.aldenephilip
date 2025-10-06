<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1e0034, #3b005c, #6b0080, #8b00a1);
      background-size: 300% 300%;
      animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    form {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 16px;
      padding: 30px 25px;
      width: 100%;
      max-width: 320px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
      color: #fff;
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.15);
      transition: transform 0.2s ease-in-out, box-shadow 0.3s;
    }

    form:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    h1 {
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: #ffffff;
      letter-spacing: 1px;
    }

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 15px;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      outline: none;
    }

    input::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }

    input:focus, select:focus {
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #9b00ff, #ff007f);
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      text-transform: uppercase;
    }

    input[type="submit"]:hover {
      background: linear-gradient(135deg, #b100ff, #ff2ca3);
      transform: scale(1.04);
      box-shadow: 0 0 10px rgba(255, 0, 150, 0.5);
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
