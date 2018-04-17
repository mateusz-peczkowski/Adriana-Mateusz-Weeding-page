<?php
    $data = (object) [
        'mr'                => 'Mateusz',
        'mrs'               => 'Adriana'
    ];

    $firstCeremony = true;

    $assetFile = file_exists('./dist/assets.json') ? json_decode(file_get_contents('./dist/assets.json')) : false;

    $assets = [
        "images/img_1.jpg"              => "images/img_1.jpg",
        "images/img_2.jpg"              => "images/img_2.jpg",
        "images/marker_1.png"           => "images/marker_1.png",
        "images/marker_2.png"           => "images/marker_2.png",
        "images/adriana.jpg"            => "images/adriana.jpg",
        "images/mateusz.jpg"            => "images/mateusz.jpg",
        "images/magda.jpg"              => "images/magda.jpg",
        "images/dawid.jpg"              => "images/dawid.jpg",
        "images/ola.jpg"                => "images/ola.jpg",
        "images/marcin.jpg"             => "images/marcin.jpg",
        "styles/main.css"               => "styles/main.css",
        "scripts/main.js"               => "scripts/main.js"
    ];

    if ($assetFile) {
        $assets = (array) $assetFile;
    }

    if ($firstCeremony) {
        $data->ceremony_type = 'Ślub cywilny';
        $data->ceremony_type_context = "ślubu cywilnego";
        $data->ceremony_date = '10.08.2018';
        $data->ceremony_time = '14:30';
        $data->ceremony_first_place = (object) [
            'name'      => 'Urząd Stanu Cywilnego w Szprotawie',
            'lat'       => 51.565844,
            'lng'       => 15.537373,
            'marker'    => '/dist/' . $assets['images/marker_1.png']
        ];
        $data->ceremony_second_place = (object) [
            'name'      => 'Restauracji przy hotelu Chrobry w Wiechlicach',
            'lat'       => 51.553467,
            'lng'       => 15.583677,
            'marker'    => '/dist/' . $assets['images/marker_2.png']
        ];
        $data->persons = [
            0 => (object) [
                'name' => 'Adriana',
                'function' => 'Panna Młoda',
                'image' => '/dist/' . $assets['images/adriana.jpg']
            ],
            1 => (object) [
                'name' => 'Mateusz',
                'function' => 'Pan Młody',
                'image' => '/dist/' . $assets['images/mateusz.jpg']
            ],
            2 => (object) [
                'name' => 'Magda',
                'function' => 'Świadowa Pani Młodej',
                'image' => '/dist/' . $assets['images/magda.jpg']
            ],
            3 => (object) [
                'name' => 'Dawid',
                'function' => 'Świadek Pana Młodego',
                'image' => '/dist/' . $assets['images/dawid.jpg']
            ],
        ];
    }
?>
<!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="utf-8">

        <title><?= $data->mrs ?> & <?= $data->mr ?> - <?= $data->ceremony_type ?> (<?= $data->ceremony_date ?>)</title>
        <meta name="description" content="<?= $data->mrs ?> & <?= $data->mr ?> - <?= $data->ceremony_type ?> (<?= $data->ceremony_date ?>)">

        <!-- DOCUMENT SETTINGS -->
        <meta http-equiv="Content-Type" content="@php(bloginfo( 'html_type' ))" charset="@php(bloginfo( 'charset' ))">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- RESPONSIVE UTILITIES -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="mobile-web-app-capable" content="yes">

        <link rel="apple-touch-icon" sizes="57x57" href="/resources/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/resources/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/resources/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/resources/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/resources/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/resources/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/resources/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/resources/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/resources/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/resources/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/resources/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/resources/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/resources/favicons/favicon-16x16.png">
        <link rel="manifest" href="/resources/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/resources/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" type="text/css" href="/dist/<?= $assets['styles/main.css'] ?>">
    </head>

<body>

    <div class="site--loader | js-loader-page |">
        <div class="logo">
            <h3>A<span>&</span>M</h3>
        </div>
    </div>

    <div class="boxes-hld | js-mosaic-holder">
        <div class="grid-sizer"></div>

        <div class="grid-item | box box-content">
            <div class="box--body" style="background-image: url('/dist/<?= $assets['images/img_2.jpg'] ?>')">
                <div class="content">
                    <h4>Serdecznie witamy<br />naszych gości</h4>
                    <p>Mamy przyjemność zaprosić Was drodzy mili na naszą uroczystość <?= $data->ceremony_type_context ?>, która odbędzie się w mieście Szprotawa.</p>
                    <p>Prosimy, abyście zapoznali się z mapką dojazdu i przybyli koniecznie na czas :)</p>
                </div>
            </div>
        </div>

        <div class="grid-item | box box-content">
            <div class="box--body" style="background-image: url('/dist/<?= $assets['images/img_1.jpg'] ?>')">
                <div class="content">
                    <h1><?= $data->mrs ?> & <?= $data->mr ?></h1>
                    <h2><?= $data->ceremony_type ?></h2>
                    <h3><?= $data->ceremony_date ?></h3>
                </div>
            </div>
        </div>

        <?php if ($persons = $data->persons AND count($persons)) : ?>
        <div class="grid-item | box box-persons">
            <div class="box--body no-padding">
                <ul>
                    <?php foreach($persons as $person) : ?>
                        <li>
                            <div class="img-hld" style="background-image: url('<?= $person->image ?>')"><img src="<?= $person->image ?>" alt="<?= $person->name ?>"></div>
                            <div class="img-content">
                                <h4><?= $person->name ?></h4>
                                <h5><?= $person->function ?></h5>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <div class="grid-item | map">
            <div class="box box-featured">
                <div class="box--body">
                    <h4>Data:</h4>
                    <p><?= $data->ceremony_date ?></p>

                    <h4>Godzina:</h4>
                    <p><?= $data->ceremony_time ?></p>

                    <h4>Miejsce ślubu:</h4>
                    <p><?= $data->ceremony_first_place->name ?></p>

                    <h4>Uroczystość:</h4>
                    <p><?= $data->ceremony_second_place->name ?></p>
                </div>
            </div>

            <div class="box box-map">
                <div class="box--body no-padding">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/dist/<?= $assets['scripts/main.js'] ?>"></script>

    <script>
        function initMap() {
            let bounds = new google.maps.LatLngBounds();

            let map = new google.maps.Map(document.getElementById('map'), {
                mapTypeId: 'roadmap'
            });

            const markers = [
                <?php if ($data->ceremony_first_place->lat AND $data->ceremony_first_place->lng AND $data->ceremony_first_place->marker) : ?>
                ['<?= $data->ceremony_first_place->name ?>', <?= $data->ceremony_first_place->lat ?>, <?= $data->ceremony_first_place->lng ?>, '<?= $data->ceremony_first_place->marker ?>'],
                <?php endif; ?>
                <?php if ($data->ceremony_second_place->lat AND $data->ceremony_second_place->lng AND $data->ceremony_second_place->marker) : ?>
                ['<?= $data->ceremony_second_place->name ?>', <?= $data->ceremony_second_place->lat ?>, <?= $data->ceremony_second_place->lng ?>, '<?= $data->ceremony_second_place->marker ?>'],
                <?php endif; ?>
            ];

            for( i = 0; i < markers.length; i++ ) {
                const position = new google.maps.LatLng(markers[i][1], markers[i][2]);

                bounds.extend(position);

                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: markers[i][3]
                });

                map.fitBounds(bounds);
            }

            let boundsListener = google.maps.event.addListener((map), 'bounds_changed', function() {
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkaudnMEUrjg4P4FR7UoKzIcD69r5dW88&callback=initMap">
    </script>
</body>
</html>
