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
            background: #eee;
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 100%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .pt-3-half {
            padding-top: 1.4rem;
        }
    </style>
</head>
<!--Navbar-->
<?php // include 'elements/navbar.php';
?>
<!--/.Navbar-->

<body class="elegant-color-dark">
    <div id="mdb-preloader" class="flex-center">
        <div id="preloader-markup">
        </div>
    </div>
    <!--<iframe id="map" src="map" style="display:none;"></iframe>-->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel555" role="tab">
                <i class="fas fa-truck-container pr-2 white-text"></i>Übersicht</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                <i class="fas fa-map-pin pr-2 white-text"></i>Livekarte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                <i class="fas fa-warehouse pr-2 white-text"></i>Fuhrpark</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#timetable" role="tab">
                <i class="fas fa-business-time pr-2 white-text"></i>Zeitübersicht</a>
        </li>
    </ul>
    <!-- Nav tabs -->

    <!-- Tab panels -->
    <div class="tab-content">

        <!-- Panel 1 -->
        <div class="tab-pane fade in show active" id="panel555" role="tabpanel">

            <!-- Nav tabs -->
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav md-pills pills-primary flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active white-text" data-toggle="tab" href="#panel21" role="tab">In Auslieferung
                                <i class="fas fa-truck ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white-text" data-toggle="tab" href="#panel22" role="tab">Nicht zugewiesene Fracht
                                <i class="fas fa-box-open ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white-text" data-toggle="tab" href="#panel23" role="tab">Ausgelieferte Fracht
                                <i class="fas fa-boxes ml-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <!-- Tab panels -->
                    <div class="tab-content vertical">
                        <!-- Panel 1 -->
                        <div class="tab-pane fade in show active" id="panel21" role="tabpanel">

                            <div class="row">
                                <div class="col-sm">
                                    <!-- Editable table -->
                                    <div class="card">
                                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4 unique-color white-text">In Auslieferung</h3>
                                        <div class="card-body elegant-color white-text">
                                            <div id="table" class="table-editable">
                                                <table class="table table-bordered table-responsive-md table-striped text-center white-text">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tour-Nr.</th>
                                                            <th class="text-center">Fahrer</th>
                                                            <th class="text-center">Von</th>
                                                            <th class="text-center">Nach</th>
                                                            <th class="text-center">Fortschritt</th>
                                                            <th class="text-center">Disponent</th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="pt-3-half">DE94023</td>
                                                            <td class="pt-3-half">joschi_service</td>
                                                            <td class="pt-3-half">Hamburg</td>
                                                            <td class="pt-3-half">Frankfurt</td>
                                                            <td class="pt-3-half">10%</td>
                                                            <td class="pt-3-half">joschi_service</td>
                                                            <td class="pt-3-half">
                                                                <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                                                <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                                                            </td>
                                                        </tr>
                                                        <!-- This is our clonable table line -->
                                                        <tr>
                                                            <td class="pt-3-half">DE94044</td>
                                                            <td class="pt-3-half">thommy</td>
                                                            <td class="pt-3-half">Zürich</td>
                                                            <td class="pt-3-half">Milan</td>
                                                            <td class="pt-3-half">78%</td>
                                                            <td class="pt-3-half">joschi_service</td>
                                                            <td class="pt-3-half">
                                                                <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                                                <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                                                            </td>
                                                        </tr>
                                                        <!-- This is our clonable table line -->
                                                        <tr>
                                                            <td class="pt-3-half">DE94076</td>
                                                            <td class="pt-3-half">JulianT29</td>
                                                            <td class="pt-3-half">London</td>
                                                            <td class="pt-3-half">Edinburgh</td>
                                                            <td class="pt-3-half">2%</td>
                                                            <td class="pt-3-half">joschi_service</td>
                                                            <td class="pt-3-half">
                                                                <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                                                <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                                                            </td>
                                                        </tr>
                                                        <!-- This is our clonable table line -->
                                                        <tr class="hide">
                                                            <td class="pt-3-half">DE94015</td>
                                                            <td class="pt-3-half">kimierbahr</td>
                                                            <td class="pt-3-half">Düsseldorf</td>
                                                            <td class="pt-3-half">Köln</td>
                                                            <td class="pt-3-half">53%</td>
                                                            <td class="pt-3-half">joschi_service</td>
                                                            <td class="pt-3-half">
                                                                <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                                                <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editable table -->
                                </div>
                                <div class="col-sm" style="height:100%;">
                                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height:100%;">
                                        <iframe id="map" src="/map" style="height:100%;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Panel 1 -->
                        <!-- Panel 2 -->
                        <div class=" tab-pane fade" id="panel22" role="tabpanel">
                            <h5 class="my-2 h5 white-text">Nicht zugewiesene Fracht</h5>
                        </div>
                        <!-- Panel 2 -->
                        <!-- Panel 3 -->
                        <div class="tab-pane fade" id="panel23" role="tabpanel">
                            <h5 class="my-2 h5 white-text">Ausgelieferte Fracht</h5>
                        </div>
                        <!-- Panel 3 -->
                    </div>
                </div>
            </div>
            <!-- Nav tabs -->

        </div>
        <!-- Panel 1 -->

        <!-- Panel 2 -->
        <div class="tab-pane fade" id="panel666" role="tabpanel">
            <div id="map-container-google-1" class="z-depth-1-half map-container">
                <iframe id="map" src="/map"></iframe>
            </div>

        </div>
        <!-- Panel 2 -->

        <div class="tab-pane fade" id="timetable" role="tabpanel">
            <iframe id="map" src="schedule" style="width:100%;height:90vh;"></iframe>
        </div>
    </div>
    <!-- Tab panels -->
    


    <!-- Optional JavaScript -->
    <?php include 'elements/js.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script>
        function onInterfaceReady() {
            $(".preloader").fadeOut("slow");
            $("#content").fadeIn("slow");
        }
    </script>
    <script>
        const $tableID = $('#table');
        const $BTN = $('#export-btn');
        const $EXPORT = $('#export');

        const newTr = `
<tr class="hide">
  <td class="pt-3-half" >Example</td>
  <td class="pt-3-half" >Example</td>
  <td class="pt-3-half" >Example</td>
  <td class="pt-3-half" >Example</td>
  <td class="pt-3-half" >Example</td>
  <td class="pt-3-half">
    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
  </td>
</tr>`;

        $tableID.on('click', '.table-up', function() {

            const $row = $(this).parents('tr');

            if ($row.index() === 1) {
                return;
            }

            $row.prev().before($row.get(0));
        });

        $tableID.on('click', '.table-down', function() {

            const $row = $(this).parents('tr');
            $row.next().after($row.get(0));
        });

        // A few jQuery helpers for exporting only
        jQuery.fn.pop = [].pop;
        jQuery.fn.shift = [].shift;

        $BTN.on('click', () => {

            const $rows = $tableID.find('tr:not(:hidden)');
            const headers = [];
            const data = [];

            // Get the headers (add special header logic here)
            $($rows.shift()).find('th:not(:empty)').each(function() {

                headers.push($(this).text().toLowerCase());
            });

            // Turn all existing rows into a loopable array
            $rows.each(function() {
                const $td = $(this).find('td');
                const h = {};

                // Use the headers from earlier to name our hash keys
                headers.forEach((header, i) => {

                    h[header] = $td.eq(i).text();
                });

                data.push(h);
            });

            // Output the result
            $EXPORT.text(JSON.stringify(data));
        });
    </script>
</body>

</html>