<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

<div class="content-area">

<style>
#map {
  height: 100%;
}
.labels {
    background-color: white;
    border-style: solid;
    border-width: 1px;
}
</style>


<div id="map" style="width:100%;height:300px;"></div>
    <script>
function initMap() {


  // Specify features and elements to define styles.
  var styleArray = [
    {
      featureType: "all",
      stylers: [
       { saturation: -90 }
      ]
    },{
      featureType: "road.arterial",
      elementType: "geometry",
      stylers: [
        { hue: "#ff0000" },
        { saturation: 50 }
      ]
    },{
      featureType: "poi.business",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    }
  ];

  var image = 'http://127.0.0.1:8000/wp/../uploads/favicon.png';
  var position = new Array();
  var title = new Array();
  var content = new Array();

	<?php  
	
			$apiKey = "AIzaSyDNbphcf4j6hJzsgJciwIKlgAZukUaJ4ps";
			$map_page = "Mapa";
	
			
            $query = new WP_Query( array( 'pagename' => $map_page ) );
            while ( $query->have_posts() ) : $query->the_post();

            $array = preg_split ('/$\R?^/m', get_the_content());
            $first = true;
            $position = array();
            $content = array();
            foreach($array as $value) //loop over values
            {
            	list($title,$latlong,$rest) = split(";", $value);
            	if ($first) {
            		$center = $latlong;
            		$zoom = $title;
            		$first = false;
            	} else {
            		$position[$title] = $latlong;
            		$content[$title] = $rest;
            	}
            }
            
	        endwhile;    
	        wp_reset_postdata();
	        ?>
	
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: <?php echo $zoom ?>,
    center: <?php echo $center ?>,
    scrollwheel: false,
    styles: styleArray,
    zoomControl: true,
    zoomControlOptions: {
        position: google.maps.ControlPosition.TOP_LEFT
    },
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    rotateControl: false
  });

  <?php 
  // skip 0 - map center
  $counter = 0;
  foreach ($position as $title => $marker) {
  	echo " var marker".++$counter." = new google.maps.Marker({
 		   position: ".$marker.",
 		   title: \"".$title."\",
 		   map: map,
 		   icon: image,
 		   animation: google.maps.Animation.DROP,
 	  });
 	";
  	echo "	  var infowindow".$counter." = new google.maps.InfoWindow({
 		    content: '<div id=\"content\" style=\"width:100px;\">".$content[$title]."</div>'
 	  });
 	  	marker".$counter.".addListener('click', function() {
 		 	infowindow".$counter.".open(map, marker".$counter.");
 		 });
		";

   }
  ?>

  
}

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiKey; ?>&signed_in=true&callback=initMap"></script>

		</div>

	</div><!-- #primary -->