<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Violation</title>
  <link rel="stylesheet" href="{{ asset('css/educator/addViolation.css') }}">

</head>
<body>
  <div class="header">
    <span>LOGO</span>
  </div>

  <div class="content-wrapper">
    <button class="back-btn">back</button>

    <div class="form-container">
      <input type="text" class="form-field" placeholder="Enter Violation Name" id="violationName"/>

      <div class="dropdown-wrapper">
        <div class="dropdown-header" onclick="toggleDropdown()">Category</div>
        <div class="dropdown-content" id="dropdownContent">
          <select class="form-field">
            <option selected disabled>Severity</option>
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
            <option>Very High</option>
          </select>

          <select class="form-field">
            <option selected disabled>Offense</option>
            <option>1st Offense</option>
            <option>2nd Offense</option>
            <option>3rd Offense</option>
          </select>

          <select class="form-field">
            <option selected disabled>Penalty</option>
            <option>Warning</option>
            <option>Verbal Warning</option>
            <option>Written Warning</option>
            <option>Probation</option>
            <option>Expulsion</option>
          </select>
        </div>
      </div>

      <button class="submit-btn">Submit</button>
    </div>
  </div>

  <script>
    function toggleDropdown() {
      var content = document.getElementById("dropdownContent");
      content.style.display = content.style.display === "none" ? "flex" : "none";
    }

    window.onload = () => {
      document.getElementById("dropdownContent").style.display = "none";
    };
    document.querySelector('.back-btn').addEventListener('click', () => {
  window.location.href = 'violation.html'; // update with actual filename
});

  </script>
</body>
</html>