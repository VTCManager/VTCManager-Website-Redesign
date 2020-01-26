// All of this should be executed after the DOM is ready and the entire skin has been loaded.

// Image size used in the map.
var MAX_X = 173568;
var MAX_Y = 192512;
// How the image was extracted from the game:
// http://forum.scssoft.com/viewtopic.php?p=405122#p405122

// Based on http://forum.scssoft.com/viewtopic.php?f=41&t=186779
function game_coord_to_pixels(x, y) {
	var r = [x / 0.78125 + 89600 , y / 0.78125 + 89600];
	if (x < -31056.8 && y < -5832.867) {
		r = [r[0] / 1.3333333 + 10750, r[1] / 1.3333333 + 21410];
	}
	r[1] = MAX_Y - r[1];
	return r;
}
var COUNTRY_NAME_TO_CODE = {
    "andorra": "ad",
    "austria": "at",
    "belarus": "by",
    "belgium": "be",
    "bulgaria": "bg",
    "czech": "cz",
    "denmark": "dk",
    "estonia": "ee",
    "faroe": "fo",
    "finland": "fi",
    "france": "fr",
    "germany": "de",
    "hungary": "hu",
    "iceland": "is",
    "iom": "im",
    "isle of man": "im",
    "italy": "it",
    "latvia": "lv",
    "liecht": "li",
    "liechtenstein": "li",
    "lithuania": "lt",
    "luxembourg": "lu",
    "moldova": "md",
    "netherlands": "nl",
    "norway": "no",
    "poland": "pl",
    "romania": "ro",
    "russia": "ru",
    "slovakia": "sk",
    "slovenia": "si",
    "spain": "es",
    "sweden": "se",
    "switzerland": "ch",
    "uk": "gb",
    "united kingdom": "gb",
    "ukraine": "ua"
};

// http://codepen.io/denilsonsa/pen/BKWNgB
function country_code_to_unicode(cc) {
    cc = cc.toLowerCase();
    var flagA = 0x1F1E6;
    var letter_a = 0x61;
    var a = cc.charCodeAt(0) - letter_a;
    var b = cc.charCodeAt(1) - letter_a;
    return String.fromCodePoint(flagA + a, flagA + b);
}

// Copied from:
// https://github.com/mike-koch/ets2-mobile-route-advisor/blob/5bde032121cbabac3bfd98f156a1e376d9903fd8/js/map.js
// https://github.com/mike-koch/ets2-mobile-route-advisor/compare/promods-support
// See also:
// https://github.com/mike-koch/ets2-mobile-route-advisor/issues/90

// Copied from: https://github.com/denilsonsa/ets2-stuff/blob/master/openlayers-koenvh1.html
function getTextFeatures() {
    var fill = new ol.style.Fill();
    fill.setColor('#fff');
    var stroke = new ol.style.Stroke();
    stroke.setColor('#000');
    stroke.setWidth(2);
    var createTextStyle = function(resolution) {
        var scale = Math.min(1, Math.max(0, 1.0 / Math.log2(resolution + 1) - 0.015));
        var text = this.get('realName'); //Removed country_code_to_unicode(this.get('cc')) + ' ' +
        // console.log(scale, resolution);
        // console.log(this.get('realName'), this.get('country'));
        return [new ol.style.Style({
            //Creating a new image layer

            image: new ol.style.Icon(({
                rotateWithView: false,
                anchor: [0.5, 1],
                anchorXUnits: 'fraction',
                anchorYUnits: 'fraction',
                snapToPixel: false,
                // Flag images from: http://lipis.github.io/flag-icon-css/
                src: g_pathPrefix + '/flags/' + this.get('cc') + '.svg',
                scale: 3 / 24 * scale
            })),

            text: new ol.style.Text({
                text: text,
                font: '1.1em "Helvetica Neue", "Helvetica", "Arial", sans-serif',
                textAlign: 'center',
                fill: fill,
                stroke: stroke,
                scale: 5 * scale,
                //Move the text down, otherwise the flag and text will overlap.
                offsetY: 60 * scale
            })
        })];
    };

    var features = g_cities_json.map(function(city) {
        var map_coords = game_coord_to_pixels(city.x, city.z);
        // cc = Country Code
        city.cc = COUNTRY_NAME_TO_CODE[city.country.toLowerCase()];
        var feature = new ol.Feature(city);
        feature.setGeometry(new ol.geom.Point(map_coords));
        feature.setStyle(createTextStyle);
        return feature;
    });

    return features;
}
function getTextLayer() {
    var textSource = new ol.source.Vector({
        features: getTextFeatures(),
        wrapX: false
    });
    var vectorLayer = new ol.layer.Vector({
        source: textSource,
	opacity: 0.5
    });

    return vectorLayer;
}


function buildMap(target_element_id){
    var projection = new ol.proj.Projection({
        code: 'Funbit',
        units: 'pixels',
        extent: [0, 0, MAX_X, MAX_Y],
        worldExtent: [0, 0, MAX_X, MAX_Y]
    });
    ol.proj.addProjection(projection);
    g_src = new ol.source.Vector({
        features: g_features,
        wrapX: false
    });
    var vectorLayer = new ol.layer.Vector({
        source: g_src
    });

    var custom_tilegrid = new ol.tilegrid.TileGrid({
        extent: [0, 0, MAX_X, MAX_Y],
        minZoom: 0,
        origin: [0, MAX_Y],
        tileSize: [512, 512],
        resolutions: (function(){
            var r = [];
            for (var z = 0; z <= 8; ++z) {
                r[z] = Math.pow(2, 8 - z);
            }
            return r;
        })()
    });

    g_map = new ol.Map({
        target: target_element_id,
        controls: [
        ],
        interactions: ol.interaction.defaults().extend([
            new ol.interaction.DragRotateAndZoom()
        ]),
        layers: [
            getMapTilesLayer(projection, custom_tilegrid),
            getTextLayer(),
            vectorLayer
        ],
        view: new ol.View({
            projection: projection,
            extent: [0, 0, MAX_X, MAX_Y],
            center: [MAX_X/2, MAX_Y/2],
            minZoom: 0,
            maxZoom: 9,
            zoom: 2
        })
    });
    return g_map;
}

function getMapTilesLayer(projection, tileGrid) {
    if (g_runningGame === 'ETS2') {
        return new ol.layer.Tile({
	    opacity: 0.75,
            extent: [0, 0, MAX_X, MAX_Y],
            source: new ol.source.XYZ({
                projection: projection,
                url: g_pathPrefix + '/maps/ets2/tiles/{z}/{x}_{y}.png',
                tileSize: [512, 512],
                // Using createXYZ() makes the vector layer (with the features) unaligned.
                // It also tries loading non-existent tiles.
                //
                // Using custom_tilegrid causes rescaling of all image tiles before drawing
                // (i.e. no image will be rendered at 1:1 pixels), But fixes all other issues.
                tileGrid: tileGrid,
                // tileGrid: ol.tilegrid.createXYZ({
                //     extent: [0, 0, MAX_X, MAX_Y],
                //     minZoom: 0,
                //     maxZoom: 7,
                //     tileSize: [256, 256]
                // }),
                wrapX: false,
                minZoom: 2,
                maxZoom: 7
            })
        });
    }

    return new ol.layer.Tile();
}

// Global vars.
var g_playerFeature;
var g_playerIcon;
var g_behavior_center_on_player = true;
var g_behavior_rotate_with_player = true;
var g_ignore_view_change_events = false;

function updatePlayerPositionAndRotation(lon, lat, rot, speed) {
    var map_coords = game_coord_to_pixels(lon, lat);
    var rad = rot * Math.PI * 2;

    g_playerFeature.getGeometry().setCoordinates(map_coords);
    g_playerIcon.setRotation(-rad);

    g_ignore_view_change_events = true;
    if (g_behavior_center_on_player) {

        if (g_behavior_rotate_with_player) {
            var height = g_map.getSize()[1];
            var max_ahead_amount = height / 3.0 * g_map.getView().getResolution();

            var amount_ahead = speed * 0.25;
            amount_ahead = Math.max(-max_ahead_amount, Math.min(amount_ahead, max_ahead_amount));

            var ahead_coords = [
                map_coords[0] + Math.sin(-rad) * amount_ahead,
                map_coords[1] + Math.cos(-rad) * amount_ahead
            ];
            g_map.getView().setCenter(ahead_coords);
            g_map.getView().setRotation(rad);
        } else {
            g_map.getView().setCenter(map_coords);
            g_map.getView().setRotation(0);
        }
    }
    g_ignore_view_change_events = false;
}
