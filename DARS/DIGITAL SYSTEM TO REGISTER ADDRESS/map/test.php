<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ethiopia Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="https://d3js.org/d3.v5.min.js"></script>
    <script type="text/javascript" src="https://d3js.org/topojson.v3.min.js"></script> 
    <script src="mapdata.js"></script>
    <script src="countrymap.js"></script>
</head>
<style>
    body {
        
        margin-top: 100px;
        padding: 0;
        background-image: url('background-image.jpg'); /* Change the URL to your background image */
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
    .table-container {
        display: none;
        max-height: 600px; /* Adjust the height as needed */
        overflow-y: auto;
    }
    #table6 {
        display: block; /* Display table14 by default */
    }
    .mapn {
        margin-top: 15px;
        margin-left: 90px;
        display: flex;
        justify-content: space-between;
        
    }


    .box {
        width: 100%;
        margin-top: 50px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .image-container {
        width: 100%;
        display: flex;
        
        
        margin-top: 20px;
    }

    .image {
        width: 550px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .map-box {
        background-color: cadetblue;
        margin-top: 20px;
        margin-left: 270px;
            border: 2px solid #aaa;
            border-radius: 5px;
            max-width: 800px;
            
            
            overflow: hidden; /* Ensures the map doesn't overflow the box */
        }
        .viz {
            /* Add your interactive map styles here */
            width: 100%; /* Set the width as needed */
            height: 100%; /* Set the height as needed */
        }


        .table {
    width: 95%; /* Set the desired width here */
      border-collapse: separate;
      border-spacing: 0;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }
  .table th {
      background-color: #56a4f1;
      font-size: 24px;
      font-weight: bold;
      color: #fff;
      padding: 15px;
      text-align: center;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
  }
  /* Adjust image size */
  .table img {
      max-width: 600px;
      height: 200px;
      border-radius: 5px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }
  /* Define section sizes */
  .section2 {
      padding: 15px;
      text-align: center;
      background-color: #f8f9fa;
      border-left: 1px solid #ccc;
      border-right: 1px solid #ccc;
  }
  .section2:first-child {
      border-left: none;
  }
  .section2:last-child {
      border-right: none;
  }
  .section2 p {
      margin-top: 10px;
      color: #555;
  }

  ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      text-align: left;
      border-left: 1px solid #ccc;
      padding-left: 15px;
  }
  ul li {
      margin-bottom: 8px;
      color: #777;
      position: relative;
      padding-left: 15px;
  }
  .draggable-point {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: red;
    border-radius: 50%;
   /* cursor: move;*/
}
.notice {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    font-family: Arial, sans-serif;
    color: #333;
}



</style>
<body>
    <?php include '../navbar.php'; ?>

    
        <div class="box">
            <h2>Welcome to Ethiopia Map</h2>
            <p>This is a description of the Ethiopia map. </p>
        </div>
        <div class="mapn">
        <div class="image-container">
            <div id="map" class="image"alt="Left Image"></div>
            <img class="image" src="map_images/Regions_of_Ethiopia_EN.svg.png" alt="Clickable Map">
            
            <div class="draggable-point" id="point1"></div>
    <div class="draggable-point" id="point2"></div>
    <div class="draggable-point" id="point3"></div>
    <div class="draggable-point" id="point4"></div>
    <div class="draggable-point" id="point5"></div>
    <div class="draggable-point" id="point6"></div>
    <div class="draggable-point" id="point7"></div>
    <div class="draggable-point" id="point8"></div>
    <div class="draggable-point" id="point9"></div>
    <div class="draggable-point" id="point10"></div>
    <div class="draggable-point" id="point11"></div>
    <div class="draggable-point" id="point12"></div>
    <div class="draggable-point" id="point13"></div>
    <div class="draggable-point" id="point14"></div>
        </div>
    </div>

















     <!-- Your table will go here -->
     <div class="table-container" id="table6">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Addis Ababa
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-11_12-26-20.jpg" alt="Image 1">
                        <p>Abeot Adebabay</p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Addis Ababa: Capital city of Ethiopia.</li>
    <li>Population: 5,461,000</li>
    <li>Area: 527 km²</li>
    <li>Tourist Places:
        <ul>
            <li>Unity Park</li>
            
            <li>Entoto Park</li>
            <li>Sheger Park</li>
        </ul>
    </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_10-37-06.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>





    <!-- Your table will go here -->
    <div class="table-container" id="table9">
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    oromia
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-10_22-04-07.jpg" alt="Image 1">
                        <p>Sof Omar Cave</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Capital: Addis Ababa (Finfinne)</li>
  <li>Population: 35 million</li>
  <li>Area: 353,690 km²</li>
  <li>Tourist Places:
    <ul>
      <li>Bale Mountain and National Parks</li>
      <li>Sof Omar Cave</li>
      <li>Aba Jiffar</li>
      
    </ul>
  </li>
  
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_10-53-22.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>






    
     <!-- Your table will go here -->
     <div class="table-container" id="table8">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Amhara
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_10-56-39.jpg" alt="Image 1">
                        <p>Fasil </p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Capital: Bahir Dar</li>
  <li>Population: 20.02 million</li>
  <li>Area: 154,709 km²</li>
  <li>Tourist Places:
    <ul>
      <li>Rock Hewn Churches</li>
      <li>Simien Mountain and National Park</li>
    </ul>
  </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-07-18_19-42-51.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>





    
     <!-- Your table will go here -->
     <div class="table-container" id="table11">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Harar
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-00-24.jpg" alt="Image 1">
                        <p> Jegol wall</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Capital: Harar</li>
  <li>Population: 246,000</li>
  <li>Area: 334 km²</li>
  <li>Tourist Places:
    <ul>
      <li>Jegol Wall</li>
      <li>Rimbaud's House</li>
      <li>Hyena Feeding Site</li>
    </ul>
  </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-00-19.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>







    <!-- Your table will go here -->
    <div class="table-container" id="table13">
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Afar
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-03-20.jpg" alt="Image 1">
                        <p>Erta Ale</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Capital: Semera</li>
  <li>Population: 1.812 million</li>
  <li>Area: 72,053 km²</li>
  <li>Tourist Places:
    <ul>
      <li>Erta Ale</li>
      <li>Yangudi Rasa National Park</li>
      <li>Dallol</li>
      <li>Awash Park</li>
    </ul>
  </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-03-14.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>








    
     <!-- Your table will go here -->
     <div class="table-container" id="table4">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    South West Ethiopia Peoples' Region 
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-07-15.jpg" alt="Image 1">
                        <p>Omo National Park</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>South West Ethiopia Peoples' Region :</li>
  <ul>
    <li>Capital: Bonga, Mizan Teferi, Tercha, Tepi</li>
    <li>Population: 2,300,000</li>
    <li>Area: 39,400 km²</li>
    <li>Tourist Places:
      <ul>
        <li>Omo National Park</li>
        <li>The Suri People</li>
      </ul>
    </li>
  </ul>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-07-24.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>






     <!-- Your table will go here -->
     <div class="table-container" id="table12">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Dire Dawa ( city administration ) 
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-10-39.jpg" alt="Image 1">
                        <p>Ethiopia-Djibouti Rail Yard</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Dire Dawa (City Administration):</li>
  <ul>
    <li>Capital: Dire Dawa</li>
    <li>Population: 493,000</li>
    <li>Area: 1,213 km²</li>
    <li>Tourist Places:
      <ul>
        <li>Old Palace</li>
        <li>Ethiopia-Djibouti Rail Yard</li>
        <li>Kafira Market</li>
      </ul>
    </li>
    <li>Popular for Street Spicy Foods</li>
  </ul>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-10-31.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>






     <!-- Your table will go here -->
     <div class="table-container" id="table14">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Tigray 
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_11-16-46.jpg" alt="Image 1">
                        <p> Al Nejashi Mosque</p>
                    </td>
                    <td class="section2">
                    <ul>
  <li>Tigray:</li>
  <ul>
        <li>Capital: Mekelle</li>
        <li>Population: 7.07 million</li>
        <li>Area: 50,079 km²</li>
        <li>Tourist Places:
            <ul>
                <li>Aksum</li>
                <li>Al Nejashi Mosque</li>
            </ul>
        </li>
        <li>Celebrations: Ashenda</li>
    </ul>
                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-10_21-53-17.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>





     <!-- Your table will go here -->
     <div class="table-container" id="table1">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Addis Ababa
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-11_12-26-20.jpg" alt="Image 1">
                        <p>Abeot Adebabay</p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Addis Ababa: Capital city of Ethiopia.</li>
    <li>Population: 5,461,000</li>
    <li>Area: 527 km²</li>
    <li>Tourist Places:
        <ul>
            <li>Unity Park</li>
            
            <li>Entoto Park</li>
            <li>Sheger Park</li>
        </ul>
    </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_10-37-06.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>










         <!-- Your table will go here -->
         <div class="table-container" id="table7">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Benishangul Gumuz
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src=" photo_2023-08-12_12-25-07.jpg " alt="Image 1">
                        <p> </p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Capital: Asosa</li>
    <li>Population: 1.127 million</li>
    <li>Area: 50,699 km²</li>
    <li>Tourist Places: 
        <ul>
            <li>Grand Ethiopian Renaissance Dam (GERD)</li>
            <li>Lakes</li>
            <li>Rift Valley</li>
        </ul>
    </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_12-24-58.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>











     
     <!-- Your table will go here -->
     <div class="table-container" id="table2">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Sidama
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src=" photo_2023-08-12_12-51-35.jpg" alt="Image 1">
                        <p> </p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Capital: Hawassa</li>
    <li>Population: 3.2 million</li>
    <li>Area: 6,538 km²</li>
    <li>Tourist Places: 
        <ul>
            <li>Amora Gedel Park</li>
            <li>Harenna Forest</li>
            <li>Senkele Wildlife Sanctuary</li>
            <li>Mountains</li>
        </ul>
    </li>
</ul>

                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_12-51-29.jpg " alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>








          
     <!-- Your table will go here -->
     <div class="table-container" id="table3">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    SNNPR
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src=" photo_2023-08-12_12-31-56.jpg" alt="Image 1">
                        <p> </p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Capital: Awasa</li>
    <li>Population: 11.43 million</li>
    <li>Area: 54,400 km²</li>
    <li>Tourist Places: 
        <ul>
            <li>Lake Abaya</li>
            <li>Lake Awassa</li>
            <li>Lake Chamo</li>
            <li>Lake Zway</li>
            <li>Nech-Sar National Park</li>
        </ul>
    </li>
</ul>


                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_12-32-05.jpg " alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>




          
     <!-- Your table will go here -->
     <div class="table-container" id="table5">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Gambela
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src=" photo_2023-08-12_12-35-12.jpg" alt="Image 1">
                        <p> </p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Capital: Gambella</li>
    <li>Population: 435,999</li>
    <li>Area: 29,782 km²</li>
    <li>Tourist Places: 
        <ul>
            <li>Gambella National Park</li>
            <li>Bridges between Baro and Jajaba</li>
            <li>Museums</li>
            <li>Impressive Cultures</li>
        </ul>
    </li>
</ul>


                    </td>
                    <td class="section2">
                        <img src="photo_2023-08-12_12-34-12.jpg " alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>


     
     <!-- Your table will go here -->
     <div class="table-container" id="table10">
     <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">
                    Somalia
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section2">
                        <img src="photo_2023-08-12_12-38-23.jpg " alt="Image 1">
                        <p> </p>
                    </td>
                    <td class="section2">
                    <ul>
    <li>Capital: Jijiga</li>
    <li>Population: 15.65 million</li>
    <li>Area: 328,068 km²</li>
    <li>Tourist Places: 
        <ul>
            <li>Babile Elephant Sanctuary</li>
            <li>Markets</li>
            <li>Cultures</li>
            <li>Ancient Mosques</li>
        </ul>
    </li>
</ul>



                    </td>
                    <td class="section2">
                        <img src=" photo_2023-08-12_12-38-11.jpg" alt="Image 2">
                        <p>Flag</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
     </div>






    <div class="box">
            <h2>Welcome to Ethiopia Map</h2>
            <p>This is a description of the Ethiopia map. </p>
        </div>
    <div class="map-box">
        <div class="viz">
        <p>ካርታው ከሞባይል ይልቅ ኮምፒውተር ላይ በተሻለ ሁኔታ ይታያል።</p>
        </div>
    </div>
    <div class="notice"><p>Please note that the information provided on these maps is subject to 
            change. Regions and zones may be added or removed over time as administrative boundaries 
            evolve. We strive to keep the data as up-to-date as possible, but due to the dynamic nature
             of geographic divisions, 
            some adjustments may occur. We recommend checking back periodically for the latest updates and revisions to ensure that you have the most accurate and current information available</p> </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Define the table IDs
        const tableIds = ["table1", "table2", "table3", "table4", "table5", "table6", "table7", "table8", "table9", "table10", "table11", "table12", "table13", "table14"];

        let currentIndex = 0; // Initialize the current index

        // Function to show the current table and hide others
        function showTable(index) {
            for (let i = 0; i < tableIds.length; i++) {
                const table = document.getElementById(tableIds[i]);
                if (i === index) {
                    table.style.display = 'block';
                } else {
                    table.style.display = 'none';
                }
            } 
        } 

        // Function to automatically move to the next table
        function autoScroll() {
            showTable(currentIndex);
            currentIndex = (currentIndex + 1) % tableIds.length;
        }

        // Initially show the first table
        showTable(currentIndex);

        // Set an interval to move to the next table every 3 seconds
        setInterval(autoScroll, 3000);
    });
</script>

    <script>
        
      document.addEventListener("DOMContentLoaded", function() {
        const draggablePoints = document.querySelectorAll(".draggable-point");
        const tables = document.querySelectorAll(".table-container");
    
        draggablePoints.forEach((point, index) => {
            // Load saved position from localStorage or use default position
            const savedPosition = JSON.parse(localStorage.getItem(`point${index + 1}`));
            if (savedPosition) {
                point.style.left = `${savedPosition.x}px`;
                point.style.top = `${savedPosition.y}px`;
            }
    
            let isDragging = false;
    
            point.addEventListener("mousedown", (event) => {
                isDragging = true;
                const initialX = event.clientX - point.getBoundingClientRect().left;
                const initialY = event.clientY - point.getBoundingClientRect().top;
    
                const onMouseMove = (event) => {
                    if (isDragging) {
                        const newX = event.clientX - initialX;
                        const newY = event.clientY - initialY;
                        point.style.left = `${newX}px`;
                        point.style.top = `${newY}px`;
                    }
                };
    
                const onMouseUp = () => {
                    isDragging = false;
                    // Save the new position to localStorage
                    const newPosition = {
                        x: parseFloat(point.style.left),
                        y: parseFloat(point.style.top)
                    };
                    localStorage.setItem(`point${index + 1}`, JSON.stringify(newPosition));
                };
    
                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", onMouseUp);
    
                point.addEventListener("dragstart", () => {
                    event.preventDefault();
                });
            });
    
            point.addEventListener("click", () => {
                tables.forEach(table => {
                    table.style.display = "none";
                });
    
                const associatedTable = document.querySelector(`#table${index + 1}`);
                if (associatedTable) {
                    associatedTable.style.display = "block";
                }
            });
        });
    });
    
    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <div>
    <script type="text/javascript" src="mapper.js"></script>
  </div>
  <?php include '../footer.php'; ?>
</body>
</html>
