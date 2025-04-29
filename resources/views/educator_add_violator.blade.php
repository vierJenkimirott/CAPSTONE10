<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Violator</title>
  <link rel="stylesheet" href="{{ asset('css/educator/addViolator.css') }}">

</head>
<body>
  <div class="header">
    <span>LOGO</span>
  </div>

  <div class="content-wrapper">
    <button class="back-btn">back</button>

    <form class="form-container" id="violator-form">
     
      <select class="form-field" id="student-select" required>
        <option selected disabled>Select Student</option>
        <option>Dion Paner</option>
        <option>Angelo Parocho</option>
        <option>Jenvier Montano</option>
        <option>Sarah Jomuad</option>
      </select>

      <input type="date" class="form-field" id="violation-date" required />

      <select class="form-field" id="violation-type">
        <option selected disabled>Type of Violation</option>
        <option value="phone">Not returning phone</option>
        <option value="relationship">Relationship</option>
      </select>

      <select class="form-field" id="severity" style="display: none;">
        <option selected disabled>Severity</option>
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
        <option>Very High</option>
      </select>

      <select class="form-field" id="offense" style="display: none;">
        <option selected disabled>Offense</option>
        <option>1st Offense</option>
        <option>2nd Offense</option>
        <option>3rd Offense</option>
      </select>

      <select class="form-field" id="penalty" style="display: none;">
        <option selected disabled>Penalty</option>
        <option>Warning</option>
        <option>Verbal Warning</option>
        <option>Written Warning</option>
        <option>Probation</option>
        <option>Expulsion</option>
      </select>

      <input type="text" class="form-field" id="consequence" placeholder="Consequence" style="display: none;" />

      <button class="submit-btn" type="submit" style="display: none;">Submit</button>
    </form>
  </div>

  <script>
    const type = document.getElementById("violation-type");
    const severity = document.getElementById("severity");
    const offense = document.getElementById("offense");
    const penalty = document.getElementById("penalty");
    const consequence = document.getElementById("consequence");
    const submitBtn = document.querySelector(".submit-btn");

    type.addEventListener("change", () => severity.style.display = "block");
    severity.addEventListener("change", () => offense.style.display = "block");
    offense.addEventListener("change", () => penalty.style.display = "block");
    penalty.addEventListener("change", () => consequence.style.display = "block");
    consequence.addEventListener("input", () => {
      if (consequence.value.trim() !== "") {
        submitBtn.style.display = "inline-block";
      }
    });
    document.querySelector('.back-btn').addEventListener('click', () => {
  window.location.href = 'violation.html'; 
});

  </script>
  
</body>
</html>