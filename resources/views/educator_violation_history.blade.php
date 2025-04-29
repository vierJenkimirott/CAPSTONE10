<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Violation History</title>
  <link rel="stylesheet" href="{{ asset('css/educator/violationHistory.css') }}">

</head>
<body>

  <div class="header">
    <span>LOGO</span>
  </div>

  <div class="main">
    <div class="top-controls">
      <button class="back-button">back</button>

      <div class="search-bar">
        <input type="text" placeholder="Search students" />
      </div>

      <div class="class-buttons">
        <button>Class 2025</button>
        <button>Class 2026</button>
      </div>
    </div>


    <div class="card">
      <div class="profile">
        <img src="" alt="avatar" />
        <div class="violations">
          <div class="name">Dion Paner</div>
          <div>No returning phones and laptops</div>
          <div>No logbook</div>
          <div>Late mealtime</div>
          <div>Doing tasking</div>
        </div>
      </div>
      <div class="dates">
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
      </div>
    </div>

    <div class="card">
      <div class="profile">
        <img src="pic" alt="avatar" />
        <div class="violations">
          <div class="name">Dion Paner</div>
          <div>No returning phones and laptops</div>
          <div>No logbook</div>
          <div>Late mealtime</div>
          <div>Doing tasking</div>
        </div>
      </div>
      <div class="dates">
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
        <div>Feb 14, 2024</div>
      </div>
    </div>
  </div>
  <script>
    document.querySelector('.back-button').addEventListener('click', () => {
      window.location.href = 'violation.html';
    });
  </script>



</body>
</html>
