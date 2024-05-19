<!DOCTYPE html>
<html lang="en">
<head>
<title>Region and Zone Count Bar Graphs</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Add custom CSS styles here */
    .chart-container {
      max-width: 400px;
      max-height: 300px;
      padding: 30px;
    }
    .container2 {
      margin-top: 50px;
      margin-bottom: 100px;
      margin-left: 200px;
    }
    .container2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- index.php -->
<?php include 'admin_header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Add the rest of your content here -->
<div class="container2">
      <h1>Registered Data  with Bar Graphs</h1>

      <!-- First Section -->
      <div class="row">
        <!-- Region Count Bar Graph -->
        <div class="col-md-6">
          <div class="chart-container">
            <h3>Region Count Bar Graph</h3>
            <canvas id="regionCountChart" width="400" height="300"></canvas>
          </div>
        </div>

        <!-- Zone Count Bar Graph -->
        <div class="col-md-6">
          <div class="chart-container">
            <h3>Zone Count Bar Graph</h3>
            <canvas id="zoneCountChart" width="400" height="300"></canvas>
          </div>
        </div>
      </div>

      <!-- Second Section -->
      <div class="row">
        <div class="col-md-6">
          <!-- Worda Count Bar Graph -->
          <div class="chart-container">
            <h3>Worda Count Bar Graph</h3>
            <canvas id="wordaCountChart" width="400" height="300"></canvas>
          </div>
        </div>
      
        <div class="col-md-6">
          <!-- Kebela Count Bar Graph -->
          <div class="chart-container">
            <h3>Kebela Count Bar Graph</h3>
            <canvas id="kebelaCountChart" width="400" height="300"></canvas>
          </div>
        </div>
      </div>

      <!-- Third Section -->
      <div class="row">
        <div class="col-md-6">
          <!-- Mender Count Bar Graph -->
          <div class="chart-container">
            <h3>Mender Count Bar Graph</h3>
            <canvas id="menderCountChart" width="400" height="300"></canvas>
          </div>
        </div>
      
        <div class="col-md-6">
          <!-- House No Count Bar Graph -->
          <div class="chart-container">
            <h3>House No Bar Graph</h3>
            <canvas id="houseNoCountChart" width="400" height="300"></canvas>
          </div>
        </div>
      </div>
</div>



    <script>
      // Fetch data from the PHP script using JavaScript Fetch API for Region Count Bar Graph
      fetch('count/get_region_count.php')
        .then(response => response.json())
        .then(data => {
          const regionCount = data.region_count;

          // Get the canvas element and create a new chart for Region Count Bar Graph.
          const regionCountCtx = document.getElementById('regionCountChart').getContext('2d');
          const regionCountChart = new Chart(regionCountCtx, {
            type: 'bar',
            data: {
              labels: ['Region Count'],
              datasets: [{
                label: 'Regions',
                data: [regionCount],
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching region count:', error));

      // Fetch data from the PHP script using JavaScript Fetch API for Zone Count Bar Graph
      fetch('count/get_zone_count.php')
        .then(response => response.json())
        .then(data => {
          const zoneCount = data.zone_count;

          // Get the canvas element and create a new chart for Zone Count Bar Graph.
          const zoneCountCtx = document.getElementById('zoneCountChart').getContext('2d');
          const zoneCountChart = new Chart(zoneCountCtx, {
            type: 'bar',
            data: {
              labels: ['Zone Count'],
              datasets: [{
                label: 'Zones',
                data: [zoneCount],
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching zone count:', error));

      // Fetch data from the PHP script using JavaScript Fetch API for Worda Count Bar Graph
      fetch('count/get_worda_count.php')
        .then(response => response.json())
        .then(data => {
          const wordaCount = data.worda_count;

          // Get the canvas element and create a new chart for Worda Count Bar Graph.
          const wordaCountCtx = document.getElementById('wordaCountChart').getContext('2d');
          const wordaCountChart = new Chart(wordaCountCtx, {
            type: 'bar',
            data: {
              labels: ['Worda Count'],
              datasets: [{
                label: 'Wordas',
                data: [wordaCount],
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching worda count:', error));

      // Fetch data from the PHP script using JavaScript Fetch API for Kebela Count Bar Graph
      fetch('count/get_kebela_count.php')
        .then(response => response.json())
        .then(data => {
          const kebelaCount = data.kebela_count;

          // Get the canvas element and create a new chart for Kebela Count Bar Graph.
          const kebelaCountCtx = document.getElementById('kebelaCountChart').getContext('2d');
          const kebelaCountChart = new Chart(kebelaCountCtx, {
            type: 'bar',
            data: {
              labels: ['Kebela Count'],
              datasets: [{
                label: 'Kebelas',
                data: [kebelaCount],
                backgroundColor: 'rgba(153, 102, 255, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching kebela count:', error));

      // Fetch data from the PHP script using JavaScript Fetch API for Mender Count Bar Graph
      fetch('count/get_mender_count.php')
        .then(response => response.json())
        .then(data => {
          const menderCount = data.mender_count;

          // Get the canvas element and create a new chart for Mender Count Bar Graph.
          const menderCountCtx = document.getElementById('menderCountChart').getContext('2d');
          const menderCountChart = new Chart(menderCountCtx, {
            type: 'bar',
            data: {
              labels: ['Mender Count'],
              datasets: [{
                label: 'Menders',
                data: [menderCount],
                backgroundColor: 'rgba(255, 206, 86, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching mender count:', error));

      // Fetch data from the PHP script using JavaScript Fetch API for House No Count Bar Graph
      fetch('count/get_house_no_count.php')
        .then(response => response.json())
        .then(data => {
          const houseNoCount = data.house_no_count;

          // Get the canvas element and create a new chart for House No Count Bar Graph.
          const houseNoCountCtx = document.getElementById('houseNoCountChart').getContext('2d');
          const houseNoCountChart = new Chart(houseNoCountCtx, {
            type: 'bar',
            data: {
              labels: ['House No Count'],
              datasets: [{
                label: 'House Numbers',
                data: [houseNoCount],
                backgroundColor: 'rgba(255, 159, 64, 0.8)',
              }],
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  stepSize: 1,
                },
              },
            },
          });
        })
        .catch(error => console.error('Error fetching house no count:', error));

        
    </script>

<?php include 'Footer.php'; ?>
</body>
</html>
