<?= $this->extend('template/landing'); ?>

<?= $this->section('content'); ?>
<style>
    .map {
        height: 500px;
        border-radius: 6px;
    }

    .leaflet-top,
    .leaflet-bottom {
        z-index: 400 !important;
    }

    .legend {
        line-height: 18px;
        color: #555;
    }

    .info {
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

    .features .content .icon-box i {
        font-size: 35px !important;
    }

    @media(max-width:440px) {
        .map {
            height: 550px !important;

        }
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div>
                    <h1>Selamat datang di <b>SIPECO</b> Kota Blitar</h1>
                    <h2>
                        Terapkan 3M yaitu Mencuci Tangan, Memakai Masker, Menjaga Jarak, Untuk terhindar dari virus corona.
                    </h2>
                    <a href="#maps-features" class="download-btn scrollto"><i class="fa fa-map-marked-alt"></i> Goto Maps</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
                <img src="<?= base_url('/public/assets_landing') ?>/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <section id="maps-features" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Maps Penyebaran Covid</h2>
                <p>Berikut Informasi Penyebaran Covid di Kota Blitar</p>
            </div>

            <div class="row no-gutters">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="map" id="map">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php foreach ($info as $row) : ?>
        <section id="<?= $row['info_landing_seo'] ?>" class="features">
            <div class="container">

                <div class="section-title">
                    <h2><?= $row['info_landing_nama'] ?></h2>
                    <p><?= $row['info_landing_keterangan'] ?></p>
                </div>

                <?= $row['info_landing_isi'] ?>

            </div>
        </section>
    <?php endforeach; ?>

</main><!-- End #main -->

<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
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
        map = L.map('map').setView([-8.096453550748818, 112.1649621302922], 13);
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
            var div = L.DomUtil.create('div', 'info legend'),
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