<?= $this->extend('template/administrator'); ?>

<?= $this->section('content'); ?>
<style>
    .map {
        height: 500px !important;
        border-radius: 13px !important;
    }

    .leaflet-top,
    .leaflet-bottom {
        z-index: 400 !important;
    }

    .legend {
        line-height: 18px;
        color: #555;
    }

    .info_legend {
        background-color: #ffffffb3;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 1px 2px 3px rgb(0, 0, 0, 0.3);
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

    a:hover {
        text-decoration: none !important;
    }

    @media(max-width:440px) {
        .map {
            height: 300px !important;

        }
    }
</style>
<div class="row">
    <div class="col-lg-3 col-md-6 col-6">
        <a href="<?= base_url('administrator/layer'); ?>">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-layer-group text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Layer</p>
                                <p class="card-title"><?= $card['layer']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-layer-group"></i>
                        Total Layer
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-6">
        <a href="<?= base_url('administrator/properties'); ?>">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-project-diagram text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Proper</p>
                                <p class="card-title"><?= $card['properties']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-project-diagram"></i>
                        Total Proper
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-6">
        <a href="<?= base_url('administrator/color'); ?>">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-swatchbook text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Color</p>
                                <p class="card-title"><?= $card['color']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-swatchbook"></i>
                        Total Color
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-6">
        <a href="<?= base_url('administrator/manajemen_user'); ?>">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-user text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">User</p>
                                <p class="card-title"><?= $card['user']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-user"></i>
                        Total User
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Leaflet Maps</h4>
                <p class="card-category">An open-source JavaScript library for mobile-friendly interactive maps.</p>
            </div>
            <div class="card-body d-block">
                <div class="map" id="map">

                </div>
            </div>
            <div class="card-footer pt-4 pb-4">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_js'); ?>
<script>
    var map, geojson, legend, resetColor;

    $(document).ready(
        function() {
            load_map();
            get_data_layer();
            get_legend();
        }
    );

    function removeLayer() {
        map.eachLayer(function(layer) {
            map.removeLayer(layer);
        });
    }

    function load_map() {
        map = L.map('map', {
            center: [0, 0]
        }).setView([-8.096453550748818, 112.1649621302922], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    }

    function get_data_layer() {
        $('#map').LoadingOverlay('show', {
            size: 13
        })
        $.get('<?= base_url('/utils/get_layers') ?>', function(result, textStatus, xhr) {
            if (result.status > 0) {
                $('#map').LoadingOverlay('hide');
                $.each(result.data, function(key, val) {
                    geojson = L.geoJSON(val, {
                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                });
            }
        }, 'json');
    }

    function style(feature) {
        return {
            fillColor: feature.properties.color,
            color: '#fafafa',
            weight: 3,
            dashArray: '4',
            fillOpacity: 0.7
        };
    }

    function onEachFeature(feature, layer) {
        if (feature.geometry.type != 'Point') {
            layer.on({
                click: clickActions
            });
        }
        layer.bindPopup(feature.properties.labels);
    }

    function clickActions(e) {
        var layer = e.target;
        if (resetColor) {
            geojson.resetStyle(resetColor);
            resetColor.bringToBack();
        }
        layer.setStyle({
            weight: 3,
            color: '#3e3e3e',
            dashArray: '4',
            fillOpacity: 0.7
        });
        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }
        map.fitBounds(e.target.getBounds());
        resetColor = layer;
    }

    function get_legend() {
        legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info_legend legend'),
                labels,
                from, to;
            $.get('<?= base_url('/utils/get_legend') ?>', function(result, textStatus, xhr) {
                if (result.data != '') {
                    labels = ['<strong class="text-uppercase">' + result.data[0].color_nama + '</strong>'];
                    for (var i = 0; i < result.data.length; i++) {
                        from = result.data[i].color_legend;
                        if (i < result.data.length - 1) {
                            to = result.data[i + 1].color_legend;
                        }
                        labels.push(
                            '<i style="background:' + result.data[i].color + '"></i> ' +
                            from + (to != from ? '&ndash;' + to : '+'));

                    }
                    div.innerHTML = labels.join('<br>');
                }
            }, 'json');

            return div;
        };
        legend.addTo(map);
    }
</script>
<?= $this->endSection(); ?>