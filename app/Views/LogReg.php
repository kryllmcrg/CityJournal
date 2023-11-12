<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    .headline {
      text-align: center;
      color: #2196F3; /* Vuetify primary color */
    }

    .link {
      color: #2196F3; /* Vuetify primary color */
      text-decoration: none;
      cursor: pointer;
    }

    .separator {
      margin: 0 10px;
    }
  </style>
</head>
<body>
  <div>
    <!-- Navbar with Logo -->
    <div>
      <div style="background-color: #2196F3; color: white; text-align: center; padding: 10px;">
        <!-- Replace 'your-logo-url' with the actual path to your logo image -->
        <img src="your-logo-url" alt="Logo" style="max-height: 40px;">
      </div>
    </div>

    <!-- Main Content -->
    <div style="margin: 20px; text-align: center;">
      <div style="max-width: 500px; margin: 0 auto;">
        <div style="text-align: center; color: #2196F3; font-size: 1.5em; margin-bottom: 10px;">
          Login
        </div>

        <form id="loginForm" onsubmit="event.preventDefault(); login();">
          <label for="username">Username</label>
          <input type="text" id="username" required>

          <label for="password">Password</label>
          <input type="password" id="password" required>

          <button type="submit" style="background-color: #2196F3; color: white; padding: 10px; margin-top: 10px;">
            Login
          </button>
        </form>

        <div style="margin-top: 10px;">
          <a href="/register" class="link">Register</a>
          <span class="separator">|</span>
          <a href="#" onclick="forgotPassword();" class="link">Forgot Password</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function login() {
      // Implement your login logic here
      console.log('Login function called');
    }

    function forgotPassword() {
      // Implement your forgot password logic here
      console.log('Forgot Password function called');
    }
  </script>
</body>
</html>