<!doctype html>
<html lang="en">

<head>
    <?php include 'elements/head.php'; ?>
    <title>DispoManager 1.0 - VTCManager</title>
    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .preloader {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 9999;
            top: 50%;
            left: 45%;
            background: #fff;
        }
    </style>
    <style type='text/css'>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Segoe UI', Helvetica, Arial, Sans-Serif
        }
    </style>

</head>

<body onload='$(".preloader").fadeOut("slow");;'>
    <div class="preloader">

        <div class="d-flex flex-row">
            <p class="strong" style="margin-right:3px;">DispoManager wird geladen...</p>
            <div class="spinner-border" role="status" aria-hidden="true"></div>
        </div>
    </div>

    <div id='myMap' style='width: 80vw; height: 80vh;'></div>
    <script type='text/javascript'>
        function loadMapScenario() {
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                /* No need to set credentials if already passed in URL */
                center: new Microsoft.Maps.Location(47.606209, -122.332071),
                zoom: 12
            });
            Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function() {
                var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                if (directionsManager.getAllWaypoints().length < 2) {
                    directionsManager.clearAll();
                    var seattleWaypoint = new Microsoft.Maps.Directions.Waypoint({
                        address: 'Frankfurt'
                    });
                    directionsManager.addWaypoint(seattleWaypoint);
                    var tacomaWaypoint = new Microsoft.Maps.Directions.Waypoint({
                        address: 'Hamburg'
                    });
                    directionsManager.addWaypoint(tacomaWaypoint);
                }
                directionsManager.calculateDirections();
                // Wait for window load
            });


        }
    </script>

    <!-- Optional JavaScript -->
    <?php include 'elements/js.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Al-VNgpoHhX3DKDN1XmvNwYl7NDoaqX39CPNcaZFOQq1lTTXsvSsTEaERfQE0YoV&callback=loadMapScenario' async defer></script>
</body>

</html>