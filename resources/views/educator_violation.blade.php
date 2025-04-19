<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Violation</title>
  <link rel="stylesheet" href="{{ asset('css/educator/violation.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="header">
    <div class="logo">LOGO</div>
    <div class="admin-user">Admin User</div>
  </div>

  <div class="layout">
    <div class="sidebar">
      <a href="#"><i class="fas fa-chart-line"></i>Dashboard</a>
      <a href="#" class="active"><i class="fas fa-triangle-exclamation"></i>Violations</a>
      <a href="#"><i class="fas fa-eye"></i>Behavior Monitoring</a>
      <a href="#"><i class="fas fa-gift"></i>Reward System</a>
    </div>

    <main>
      <div class="top-buttons">
      <a href="{{ url('/addViolator.html') }}" class="btn">+ Add Violation</a>
        <a href="addViolation.html" class="btn">+ Add Violation</a>
        <a href="violationHistory.html" class="btn">Student Violation History</a>
      </div>

      <section class="warning-section">
        <div class="column">
          <div class="warning-box tall">Warning Student<br><span>4</span></div>
          <div class="warning-box tall">Written Warning Student<br><span>4</span></div>
        </div>
        <div class="column center">
          <div class="warning-box wide">Verbal Warning Student<br><span>4</span></div>
        </div>
        <div class="column">
          <div class="warning-box tall">Probation Student<br><span>0</span></div>
          <div class="warning-box tall">Expulsion Student<br><span>0</span></div>
        </div>
      </section>

      <section class="violation-table">
        <div class="search-bar">
          <input type="text" placeholder="Search violation..." />
          <select>
            <option>All Severity</option>
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
            <option>Very High</option>
          </select>
          <button class="view-more">View More</button>
        </div>

        <table>
          <thead>
            <tr>
              <th>Violation</th>
              <th>Student</th>
              <th>Severity</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>No returning phone</td>
              <td>Dion Paner</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Relationship</td>
              <td>Angelo Parocho</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Eating inside room</td>
              <td>Sarah Jaomuad</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Hanging clothes in the window</td>
              <td>Jenvier Montano</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</body>
</html>