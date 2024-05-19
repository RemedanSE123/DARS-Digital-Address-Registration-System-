<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Web Page</title>
  <!-- Add your main CSS and other meta tags here -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <!-- Include the header -->
  <?php include 'header.php'; ?>

  <!-- Include the sidebar -->
  <?php include 'sidebarr.php'; ?>

  <!-- Your main content goes here -->
  
  <div class="container">
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
      fetch('get_region_count.php')
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
      fetch('get_zone_count.php')
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
      fetch('get_worda_count.php')
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
      fetch('get_kebela_count.php')
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
      fetch('get_mender_count.php')
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
      fetch('get_house_no_count.php')
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
<script>
      // Function to fetch data for a specific region
      function fetchRegionData(regionId) {
        return fetch(`get_region_data.php?regionId=${regionId}`)
          .then(response => response.json());
      }

      // Fetch data from the PHP script using JavaScript Fetch API for Region Count Bar Graph
      fetch('get_region_count.php')
        .then(response => response.json())
        .then(data => {
          const regionCount = data.region_count;

          // Fetch data for each region and create separate bar graphs for each region
          for (let i = 1; i <= regionCount; i++) {
            fetchRegionData(i)
              .then(regionData => {
                // Create a container for the current region's bar graph
                const graphContainer = document.createElement('div');
                graphContainer.classList.add('col-md-6');

                // Set a unique ID for the canvas element of each bar graph
                const canvasId = `regionGraph${i}`;

                // Append the container to the page
                document.querySelector('.container').appendChild(graphContainer);
                graphContainer.innerHTML = `
                  <div class="chart-container">
                    <h3>${regionData.region_name} Data Bar Graph</h3>
                    <canvas id="${canvasId}" width="400" height="300"></canvas>
                  </div>
                `;

                // Get the canvas element and create a new chart for the current region's bar graph
                const regionDataCtx = document.getElementById(canvasId).getContext('2d');
                const regionDataChart = new Chart(regionDataCtx, {
                  type: 'bar',
                  data: {
                    labels: ['Zones', 'Wordas', 'Kebelas', 'Menders', 'House Numbers'],
                    datasets: [{
                      label: 'Counts',
                      data: [
                        regionData.zone_count,
                        regionData.worda_count,
                        regionData.kebela_count,
                        regionData.mender_count,
                        regionData.house_no_count
                      ],
                      backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                      ],
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
              .catch(error => console.error('Error fetching region data:', error));
          }
        })
        .catch(error => console.error('Error fetching region count:', error));
    </script>
    <div class="footer">
      <?php include 'Footer.php'; ?>
    </div>
  </div>

  <!-- Your other footer and scripts go here -->
</body>
</html>
