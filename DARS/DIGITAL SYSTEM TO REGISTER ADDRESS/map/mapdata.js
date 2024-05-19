var simplemaps_countrymap_mapdata={
  main_settings: {
   //General settings
    width: "600", //'700' or 'responsive'
    background_color: "#ababc9",
    background_transparent: "",
    border_color: "#ffffff",
    
    //State defaults
    state_description: "State description",
    state_color: "",
    state_hover_color: "red",
    state_url: "",
    border_size: 1.5,
    all_states_inactive: "no",
    all_states_zoomable: "yes",
    
    //Location defaults
    location_description: "Location description",
    location_url: "",
    location_color: "#FF0067",
    location_opacity: 0.8,
    location_hover_opacity: 1,
    location_size: 25,
    location_type: "square",
    location_image_source: "frog.png",
    location_border_color: "#FFFFFF",
    location_border: 2,
    location_hover_border: 2.5,
    all_locations_inactive: "no",
    all_locations_hidden: "no",
    
    //Label defaults
    label_color: "#d5ddec",
    label_hover_color: "#d5ddec",
    label_size: 22,
    label_font: "Arial",
    hide_labels: "no",
    hide_eastern_labels: "no",
   
    //Zoom settings
    zoom: "yes",
    manual_zoom: "yes",
    back_image: "no",
    initial_back: "no",
    initial_zoom: "-1",
    initial_zoom_solo: "no",
    region_opacity: 1,
    region_hover_opacity: 0.6,
    zoom_out_incrementally: "yes",
    zoom_percentage: 0.99,
    zoom_time: 0.5,
    
    //Popup settings
    popup_color: "white",
    popup_opacity: 0.9,
    popup_shadow: 1,
    popup_corners: 5,
    popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
    popup_nocss: "no",
    
    //Advanced settings
    div: "map",
    auto_load: "yes",
    url_new_tab: "no",
    images_directory: "default",
    fade_time: 0.1,
    link_text: "View Website",
    popups: "detect",
    state_image_url: "",
    state_image_position: "",
    location_image_url: ""
  },
  state_specific: {
    ETH3109: {
      name: "Amhara",
      description: '<img src="map_images/photo_2023-08-09_20-36-03.jpg" style="width: 280px"> The Amhara Region, officially the Amhara National Regional State, is a regional state in northern Ethiopia and the homeland of the Amhara people. Its capital is Bahir Dar which is the seat of the Regional Government of Amhara. Amhara is the site of the largest inland body of water in Ethiopia.',
      url: "https://en.wikipedia.org/wiki/Amhara_Region",
      color: "#d72638"
    },
    ETH3110: {
      name: "Tigray",
      color: "#ef764c",
      description: '<img src="map_images/234534565.jpg" style="width: 280px"> The Tigray Region officially the Tigray National Regional State, is the northernmost regional state in Ethiopia. The Tigray Region is the homeland of the Tigrayan, Irob, and Kunama people. Its capital and largest city is Mekelle. Tigray is the fifth-largest by area, the fifth-most populous, and the fifth-most densely populated of the 11 regional states.',
      url: "https://en.wikipedia.org/wiki/Tigray_Region"
    },
    ETH3111: {
      name: "Afar",
      color: "#eaba6b",
      description: '<img src="map_images/Erta_Ale.jpg" style="width: 280px"> The Afar Region, formerly known as Region 2, is a regional state in northeastern Ethiopia and the homeland of the Afar people. Its capital is the planned city of Semera, which lies on the paved Awash–Assab highway. It’s bordered by Eritrea to the north and Djibouti to the northeast, and shares regional borders with the Tigray, Amhara, Oromo and Somali',
      url: "https://en.wikipedia.org/wiki/Afar_Region"
    },
    ETH3129: {
      name: "Southern Nations, Nationalities and Peoples",
      color: "#ef764c",
      description: '<img src="map_images/Sunset_on_Lake_Hawassa_(2)_(29053551511).jpg" style="width: 280px">  Region is a regional state in southwestern Ethiopia. It was formed from the merger of five kililoch, called Regions 7 to 11, following the regional council elections on 21 June 1992. Its government is based in Hawassa.',
      url: "https://en.wikipedia.org/wiki/Southern_Nations,_Nationalities,_and_Peoples%27_Region"
    },
    ETH3130: {
      name: "Gambela Peoples",
      color: "#1397f3",
      description: '<img src="map_images/ETHIOPIA_,_GAMBELLA_PEOPPLE_CROSSING_A_LAKE.png" style="width: 280px"> The Gambela Region, officially the Gambela Peoples Region, is a regional state in western Ethiopia, bordering South Sudan. Previously known as Region 12, its capital is Gambela. The Region is situated between the Baro and Akobo Rivers, with its western part including the Baro River.',
      url: "https://en.wikipedia.org/wiki/Gambela_Region"
    },
    ETH3131: {
      name: "Oromiya",
      color: "#52a0bc",
      description: '<img src="map_images/47458940_500185873834102_2400538929192239104_n.jpg" style="width: 280px"> Oromia is a regional state in Ethiopia and the homeland of the Oromo people.[3] The capital of Oromia is Addis Ababa.n August 2013, the Ethiopian Central Statistics Agency projected the 2022 population of Oromia as 35,467,001;[1] making it the largest regional state by population. It is also the largest regional state covering 253,690 square kilometres (97,950 sq mi).',
      url: "https://en.wikipedia.org/wiki/Oromia"
    },
    ETH3132: {
      name: "Benshangul-Gumaz",
      color: "#eaba6b",
      description: '<img src="map_images/Asosa,_Ethiopia_-_panoramio.jpg" style="width: 280px"> Benishangul-Gumuz is a regional state in northwestern Ethiopia bordering Sudan. It was previously known as Region 6. The regions capital is Assosa. Following the adoption of the 1995 constitution, the region was created from the westernmost portion of the Gojjam province, and the northwestern portion of the',
      url: "https://en.wikipedia.org/wiki/Benishangul-Gumuz_Region"
    },
    ETH3133: {
      name: "Addis Ababa",
      color: "red",
      description: '<img src="map_images/Addis_ababa_night_skyline.jpg" style="width: 280px"> Addis Ababa is the capital and largest city of Ethiopia. In the 2007 census, the citys population was estimated to be 2,739,551 inhabitants. The estimated population of Addis Ababa in 2023 has reached 5,460,591, whereas back in 1950, the population stood at 392,000. The population density in the area is projected to be approximately 5,165 people',
      url: "https://en.wikipedia.org/wiki/Addis_Ababa"
    },
    ETH3134: {
      name: "Somali",
      description: '<img src="map_images/ISK_2251.jpg" style="width: 280px"> The Somali Region, also known as Soomaali Galbeed and officially the Somali Regional State, is a regional state in eastern Ethiopia. Its territory is the largest after Oromia Region. The regional state borders the Ethiopian regions of Afar and Oromia and the chartered city Dire Dawa to the west, as well as Djibouti',
      color: "#1166fa"
    },
    ETH3135: {
      name: "Dire Dawa",
      color: "red",
      description: '<img src="map_images/Dire_dawa,_edificio_circolare.jpg" style="width: 280px"> Dire Dawa is a city in eastern Ethiopia near the Oromia and Somali Region border and one of two chartered cities in Ethiopia. Dire Dawa alongside present-day Sitti Zone were a part of the Dire Dawa autonomous region stipulated in the 1987 Ethiopian Constitution until 1993 when it was split by the federal government into a separately administered',
      url: "https://en.wikipedia.org/wiki/Dire_Dawa"
    },
    ETH3136: {
      name: "Harari People",
      color: "#140f2d",
      description: '<img src="map_images/Town_of_Harar_with_Citywall (1).jpg" style="width: 280px"> The Harari Region, officially the Harari Peoples National Regional State, is a regional state in eastern Ethiopia, covering the homeland of the Harari people. Formerly named Region 13, its capital is Harar, and the region covers the city and its immediate surroundings. Harari Region is the smallest regional state in Ethiopia in both land area',
      url: "https://en.wikipedia.org/wiki/Harari_Region"
    }
  },
  locations: {
    "0": {
      lat: "9.024325",
      lng: "38.749226",
      name: "Addis Ababa",
      url: "https://en.wikipedia.org/wiki/Addis_Ababa",
      size: "40",
      description: '<img src="map_images/Addis_ababa_night_skyline.jpg" style="width: 280px"> Addis Ababa is the capital and largest city of Ethiopia. In the 2007 census, the citys population was estimated to be 2,739,551 inhabitants. The estimated population of Addis Ababa in 2023 has reached 5,460,591, whereas back in 1950, the population stood at 392,000. The population density in the area is projected to be approximately 5,165 people',
      
    },
    "1": {
      lat: "6.658",
      lng: "38.564",
      type: "circle",
      size: "60",
      color: "#41e51a",
      description: '<img src="map_images/Awasa_outskirts.JPG" style="width: 280px">The Sidama Region is a regional state in southern Ethiopia. It was formed on 18 June 2020 from the Southern Nations, Nationalities, and Peoples Region (SNNPR) and transformation of the Sidama Zone after a 98.52% vote in favour of increased autonomy in the 2019 Sidama referendum, making it the newest regional state in the country. Sidama',
      url: "https://en.wikipedia.org/wiki/Sidama_Region"
    },
    "2": {
      lat: 9.591,
      lng: 41.864,
      name: "Dire Dawa",
      size: "40",
      url: "https://en.wikipedia.org/wiki/Dire_Dawa",
      description: '<img src="map_images/Dire_dawa,_edificio_circolare.jpg" style="width: 280px"> Dire Dawa is a city in eastern Ethiopia near the Oromia and Somali Region border and one of two chartered cities in Ethiopia. Dire Dawa alongside present-day Sitti Zone were a part of the Dire Dawa autonomous region stipulated in the 1987 Ethiopian Constitution until 1993 when it was split by the federal government into a separately administered'
    },
    "3": {
      lat: "6.556",
      lng: "35.867",
      type: "circle",
      size: "140",
      description: '<img src="map_images/Flag_of_South_West_Ethiopia.svg.png" style="width: 280px"> The South West Region, officially the South West Ethiopia Peoples Region is a regional state in southwestern Ethiopia. It was split off from the Southern Nations, Nationalities, and Peoples Region (SNNPR) on 23 November 2021 after a successful referendum.',
      color: "#09deed",
      url: "https://en.wikipedia.org/wiki/South_West_Ethiopia_Peoples%27_Region"
    }
  },
  labels: {
    "0": {
      name: "Amhara",
      parent_id: "ETH3109",
      x: 329.6,
      y: 216.5
    },
    "1": {
      name: "Tigray",
      parent_id: "ETH3110",
      x: 412.5,
      y: 72.1
    },
    "2": {
      name: "Afar",
      parent_id: "ETH3111",
      x: 530.3,
      y: 170.5
    },
    "3": {
      parent_id: "ETH3129",
      x: 234.8,
      y: 590.7,
      name: "SNNPS"
    },
    "4": {
      name: "Gambela",
      parent_id: "ETH3130",
      x: 83.6,
      y: 472.2
    },
    "5": {
      name: "Oromiya",
      parent_id: "ETH3131",
      x: 467.6,
      y: 502
    },
    "6": {
      name: "Benshangul",
      parent_id: "ETH3132",
      x: 175.2,
      y: 295.9
    },
    "7": {
      name: "A.A",
      parent_id: "ETH3133",
      x: 385.5,
      y: 402.5
    },
    "8": {
      name: "Somali",
      parent_id: "ETH3134",
      x: 744.8,
      y: 541.3
    },
    "9": {
      name: "D.D",
      parent_id: "ETH3135",
      x: 594,
      y: 362.6
    },
    "10": {
      name: "Harari",
      parent_id: "ETH3136",
      x: 612.6,
      y: 382
    }
  },
  legend: {
    entries: []
  },
  regions: {}
};