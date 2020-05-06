<div class="modal fade" id="tourcheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content elegant-color white-text">
      <div class="modal-header text-center unique-color white-text">
        <h4 class="modal-title w-100 font-weight-bold" id="TourCheckTitle">Daten werden abgerufen...</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 elegant-color white-text" style="display:none;" id="TourCheckContent">
        <div class="md-form mb-5">
          <ul class="nav nav-tabs elegant-color white-text" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab" aria-controls="Allgemein" aria-selected="true">Allgemein</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="Abrechnung" aria-selected="false">Abrechnung</a>
            </li>
            <!--<li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#truck_sec" role="tab" aria-controls="LKW"
      aria-selected="false">LKW</a>
  </li>-->
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
              <span id="departure">Startort:</span><br>
              <span id="destination">Zielort:</span><br>
              <span id="distance">Distanz:</span><br>
              <span id="cargo">Fracht:</span><br>
              <span id="weight">Frachtgewicht:</span><br>
              <span id="truck">LKW:</span><br>
              <span id="trailer_damage">Aufliegerschaden:</span><br>
              <span id="departure_time">Abfahrt:</span><br>
              <!--<span id="destination_time">Ankunft:</span><br>-->
            </div>
            <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="profile-tab">
              <span style="color: green;" id="freight_value">Frachtwert:</span><br>
              <span style="color: red;" id="taxes">Steuern:</span><br>
              <span style="color: red;" id="damage_cost">Wartungskosten:</span><br>
              <span style="color: green;" id="income">Umsatz:</span><br>
              <div class="row d-flex justify-content-center">
                <div class="col-md-12 mb-4">
                  <form action="/clientarea/management/dashboard/logbook/" method="post" style="display: inline-block;">
                    <input type="hidden" id="driverUserName" value="" name="driverUserName" />
                    <input type="hidden" id="jobID" value="" name="jobID" />
                    <input type="hidden" value="accept" name="command" />
                    <button type="submit" class="btn btn-success"><i class="fas fa-check" aria-hidden="true"></i>Akzeptieren</button>
                  </form>
                  <form action="/clientarea/management/dashboard/logbook/" method="post" style="display: inline-block;">
                    <input type="hidden" id="driverUserName2" value="" name="driverUserName" />
                    <input type="hidden" id="jobID2" value="" name="jobID" />
                    <input type="hidden" value="decline" name="command" />
                    <button type="submit" class="btn btn-danger"><i class="fas fa-ban" aria-hidden="true"></i>Ablehnen</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="tab-pane fade" id="truck_sec" role="tabpanel" aria-labelledby="profile-tab">
              <img src="" id="truck_pic" class="rounded float-right" style="max-height:250px;" alt="">
              <span id="truck_name">LKW:</span><br>
              <span id="truck_performance">Motorleistung:</span><br>
              <span id="truck_engine">Motor:</span><br>
              <span id="truck_engine_manu">Motorhersteller:</span><br>
              <span id="truck_emission_standard">Emissionsstandard:</span><br>
            </div>-->
          </div>
          <div class="modal-footer d-flex justify-content-center">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function load_tourcheck(elmnt) {
    var save_val = $(elmnt).attr("data-id");
    var res = save_val.split(",");
    console.log(res[1] + res[0]);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        var myObj = JSON.parse(response);
        if (myObj != "") {
          user_count = myObj.length;
        }
        document.getElementById("TourCheckTitle").innerHTML = "Fahrer: " + myObj[0]["username"] + "|Tour Nr." + myObj[0]["tour_id"];
        document.getElementById("departure").innerHTML = "Startort: " + myObj[0]["departure"] + " | " + myObj[0]["depature_company"];
        document.getElementById("destination").innerHTML = "Zielort: " + myObj[0]["destination"] + " | " + myObj[0]["destination_company"];
        document.getElementById("cargo").innerHTML = "Fracht: " + myObj[0]["cargo"];
        document.getElementById("weight").innerHTML = "Frachtgewicht: " + myObj[0]["cargo_weight"] + "t";
        document.getElementById("truck").innerHTML = "LKW: " + myObj[0]["truck_manufacturer"] + " " + myObj[0]["truck_model"];
        var trailer_damage = parseInt(myObj[0]["trailer_damage"]);
        document.getElementById("trailer_damage").innerHTML = "Aufliegerschaden: " + trailer_damage + "%";
        document.getElementById("departure_time").innerHTML = "Abfahrt: " + myObj[0]["tour_date"].replace(/-/g, '.');
        document.getElementById("distance").innerHTML = "Distanz: " + myObj[0]["distance"] + "km";
        var income = parseInt(myObj[0]["money_earned"]);
        var taxes = income * 0.20;
        var damage_cost = trailer_damage * 100;
        var real_income = income - taxes - damage_cost;
        document.getElementById("freight_value").innerHTML = "Frachtwert: " + income.toFixed(2) + "€";
        document.getElementById("taxes").innerHTML = "Steuern: " + taxes.toFixed(2) + "€";
        document.getElementById("damage_cost").innerHTML = "Wartungskosten: " + damage_cost.toFixed(2) + "€";
        document.getElementById("income").innerHTML = "Umsatz: " + real_income.toFixed(2) + "€";
        document.getElementById("driverUserName").value = myObj[0]["username"];
        document.getElementById("jobID").value = myObj[0]["tour_id"];
        document.getElementById("driverUserName2").value = myObj[0]["username"];
        document.getElementById("jobID2").value = myObj[0]["tour_id"];
        //get Truck Info
        /*var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          console.log(xmlhttp.response);
          var response = this.responseText;
          if (response != "") {
            var myObj = JSON.parse(response);
            if (myObj != "") {
              user_count = myObj.length;
            }
            document.getElementById("truck_name").innerHTML = "LKW: " + myObj[0]["manufacturer"] + " " + myObj[0]["model"];
            document.getElementById("truck_performance").innerHTML = "Leistung: " + myObj[0]["performance"];
            document.getElementById("truck_engine").innerHTML = "Motor: " + myObj[0]["engine"];
            document.getElementById("truck_engine_manu").innerHTML = "Motorhersteller: " + myObj[0]["engine_manufacturer"];
            document.getElementById("truck_emission_standard").innerHTML = "Emissionsstandard: " + myObj[0]["emission_standard"];
            document.getElementById("truck_pic").src = myObj[0]["image_url"];
          }
        };
        xmlhttp.open("GET", "get_truck_info.php?manufacturer=" + myObj[0]["truck_manufacturer"] + "&model=" + myObj[0]["truck_model"], true);
        xmlhttp.send();*/
      }
    };
    xmlhttp.open("GET", "get_tour.php?tour_id=" + res[1] + "&username=" + res[0], true);
    xmlhttp.send();
    document.getElementById("TourCheckContent").style.display = "block";
  }
</script>