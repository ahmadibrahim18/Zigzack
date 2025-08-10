<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Register & Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
  #loginSection { display: none; }
</style>
</head>
<body class="bg-light">

<div class="container mt-5 d-flex justify-content-center">
  <div class="card shadow" style="width: 400px;">

    <!-- Register Section -->
    <div id="registerSection">
      <div class="card-header bg-primary text-white text-center">Register</div>
      <div class="card-body">
        <form id="registerForm">
          <div class="mb-3">
            <label>Name</label>
            <input type="text" id="regName" class="form-control" required />
          </div>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" id="regEmail" class="form-control" required />
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" id="regPassword" class="form-control" required />
          </div>
          <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" id="regConfirmPassword" class="form-control" required />
          </div>
          <button class="btn btn-primary w-100" type="submit">Register</button>
        </form>
        <button type="button" id="showLoginBtn" class="btn btn-link mt-3 w-100">
          Already have an account? Login here
        </button>
      </div>
    </div>

    <!-- Login Section -->
    <div id="loginSection">
      <div class="card-header bg-success text-white text-center">Login</div>
      <div class="card-body">
        <form id="loginForm">
          <div class="mb-3">
            <label>Email</label>
            <input type="email" id="loginEmail" class="form-control" required />
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" id="loginPassword" class="form-control" required />
          </div>
          <button class="btn btn-success w-100" type="submit">Login</button>
        </form>
        <button type="button" id="showRegisterBtn" class="btn btn-link mt-3 w-100">
          Don't have an account? Register here
        </button>
      </div>
    </div>

  </div>
</div>

<script>
const API_BASE = "http://127.0.0.1:8000/api"; // Change as needed

function showLogin() {
  document.getElementById('registerSection').style.display = 'none';
  document.getElementById('loginSection').style.display = 'block';
}
function showRegister() {
  document.getElementById('registerSection').style.display = 'block';
  document.getElementById('loginSection').style.display = 'none';
}

showRegister();

document.getElementById("registerForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const name = document.getElementById("regName").value.trim();
  const email = document.getElementById("regEmail").value.trim();
  const password = document.getElementById("regPassword").value;
  const confirmPassword = document.getElementById("regConfirmPassword").value;

  if (password !== confirmPassword) {
    alert("Password and Confirm Password do not match!");
    return;
  }

  try {
    const res = await fetch(`${API_BASE}/register`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        name,
        email,
        password,
        password_confirmation: confirmPassword,
      }),
    });
    const data = await res.json();

    if (res.ok) {
      alert("Registration successful! Please login now.");
      e.target.reset();
      showLogin();
    } else {
      alert(JSON.stringify(data, null, 2));
    }
  } catch (err) {
    alert("Error: " + err.message);
  }
});

document.getElementById("loginForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const email = document.getElementById("loginEmail").value.trim();
  const password = document.getElementById("loginPassword").value;

  try {
    const res = await fetch(`${API_BASE}/login`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email, password }),
    });
    const data = await res.json();

    if (res.ok && data.access_token) {
      localStorage.setItem("token", data.access_token);
      e.target.reset();
      window.location.href = "main.html"; // Change to your main page
    } else {
      alert(JSON.stringify(data, null, 2));
    }
  } catch (err) {
    alert("Error: " + err.message);
  }
});

document.getElementById("showLoginBtn").addEventListener("click", () => {
  showLogin();
});

document.getElementById("showRegisterBtn").addEventListener("click", () => {
  showRegister();
});
</script>

</body>
</html>
