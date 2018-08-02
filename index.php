<?php
    date_default_timezone_set('Europe/Warsaw');

    $ceremonies = [
        new DateTime('10.08.2018 15:00:00'),
        new DateTime('11.08.2018 00:00:00'),
        new DateTime('22.08.2020 14:00:00'),
        new DateTime('23.08.2020 00:00:00')
    ];

    $currentDate = new DateTime();

    $firstCeremony = true;
    $showFeature = false;
    $showSecondFeature = false;
    $noCeremony = false;

    if ($currentDate > $ceremonies[0] && $currentDate < $ceremonies[1]) {
        $showFeature = true;
    } else if ($currentDate > $ceremonies[2] && $currentDate < $ceremonies[3]) {
        $showSecondFeature = true;
    } else if ($currentDate > $ceremonies[3]) {
        $noCeremony = true;
        $firstCeremony = false;
    } else if ($currentDate > $ceremonies[0]) {
        $firstCeremony = false;
    }

    $data = (object) [
        'mr'                => 'Mateusz',
        'mrs'               => 'Adriana',
        'check_date'        =>  ($firstCeremony ? $ceremonies[0] : $ceremonies[2])
    ];

    $diffInDays = date_diff($currentDate, $data->check_date)->format('%a');

    $assetFile = file_exists('./dist/assets.json') ? json_decode(file_get_contents('./dist/assets.json')) : false;

    $assets = [
        "images/img_1.jpg"                                  => "images/img_1.jpg",
        "images/img_2.jpg"                                  => "images/img_2.jpg",
        "images/marker_1.png"                               => "images/marker_1.png",
        "images/marker_2.png"                               => "images/marker_2.png",
        "images/adriana_mateusz.jpg"                        => "images/adriana_mateusz.jpg",
        "images/magda.jpg"                                  => "images/magda.jpg",
        "images/dawid.jpg"                                  => "images/dawid.jpg",
        "images/ola.jpg"                                    => "images/ola.jpg",
        "images/marcin.jpg"                                 => "images/marcin.jpg",
        "images/cywilny_rozmieszczenie_gosci.jpg"           => "images/cywilny_rozmieszczenie_gosci.jpg",
        "images/cywilny_rozmieszczenie_gosci_mobile.jpg"    => "images/cywilny_rozmieszczenie_gosci_mobile.jpg",
        "styles/main.css"                                   => "styles/main.css",
        "scripts/main.js"                                   => "scripts/main.js"
    ];

    if ($assetFile) {
        $assets = (array) $assetFile;
    }

    if ($firstCeremony) {
        $data->ceremony_type = 'Ślub cywilny';
        $data->ceremony_type_context = "ślubu cywilnego";
        $data->ceremony_date = '10.08.2018';
        $data->ceremony_time = '14:30';
//        $data->ceremony_placement = '/dist/' . $assets['images/cywilny_rozmieszczenie_gosci.jpg'];
//        $data->ceremony_placement_mobile = '/dist/' . $assets['images/cywilny_rozmieszczenie_gosci_mobile.jpg'];
        $data->ceremony_placement = null;
        $data->ceremony_placement_mobile = null;
        $data->ceremony_first_place = (object) [
            'name'      => 'Urząd Stanu Cywilnego w Szprotawie',
            'lat'       => 51.565844,
            'lng'       => 15.537373,
            'marker'    => '/dist/' . $assets['images/marker_1.png'],
            'description' => '<p>ul. Rynek 45,<br />67-300 Szprotawa</p><p>Godzina: ' . $data->ceremony_time . '</p><p><a href="http://szprotawa.pl/" target="_blank">szprotawa.pl</a></p>'
        ];
        $data->ceremony_second_place = (object) [
            'name'      => 'Restauracja przy hotelu Chrobry w Wiechlicach',
            'lat'       => 51.553467,
            'lng'       => 15.583677,
            'marker'    => '/dist/' . $assets['images/marker_2.png'],
            'description' => '<p>Jesionowa 3,<br />67-300 Szprotawa</p><p><a href="http://www.chrobry.hotelewpolsce.pl/" target="_blank">chrobry.hotelewpolsce.pl</a></p>'
        ];
        $data->persons = [
            0 => (object) [
                'name' => 'Magda',
                'function' => 'Świadkowa Panny Młodej',
                'image' => '/dist/' . $assets['images/magda.jpg']
            ],
            1 => [
                0 => (object) [
                  'name' => 'Adriana',
                  'function' => 'Panna Młoda'
                ],
                1 => (object) [
                    'name' => 'Mateusz',
                    'function' => 'Pan Młody'
                ],
                'image' => '/dist/' . $assets['images/adriana_mateusz.jpg']
            ],
            2 => (object) [
                'name' => 'Dawid',
                'function' => 'Świadek Pana Młodego',
                'image' => '/dist/' . $assets['images/dawid.jpg']
            ],
        ];
    } else {
        $data->ceremony_type = 'Ślub kościelny';
        $data->ceremony_type_context = "ślubu kościelnego";
        $data->ceremony_date = '22.08.2020';
        $data->ceremony_time = false;
        $data->ceremony_placement = null;
        $data->ceremony_placement_mobile = null;
        $data->ceremony_first_place = (object) [
            'name'      => false,
            'lat'       => false,
            'lng'       => false,
            'marker'    => false,
            'description' => false
        ];
        $data->ceremony_second_place = (object) [
            'name'      => 'Zagroda Biesiadna Elżbieta Karczewska',
            'lat'       => 51.568080,
            'lng'       => 15.524519,
            'marker'    => '/dist/' . $assets['images/marker_2.png'],
            'description' => '<p>Podgórna 34<br />67-300 Szprotawa</p><p><a href="http://www.zagrodabiesiadna.pl/" target="_blank">zagrodabiesiadna.pl</a></p>'
        ];

        if (!$noCeremony) {
            $data->persons = [
                0 => (object) [
                    'name' => 'Ola',
                    'function' => 'Świadkowa Panny Młodej',
                    'image' => '/dist/' . $assets['images/ola.jpg']
                ],
                1 => [
                    0 => (object) [
                        'name' => 'Adriana',
                        'function' => 'Panna Młoda'
                    ],
                    1 => (object) [
                        'name' => 'Mateusz',
                        'function' => 'Pan Młody'
                    ],
                    'image' => '/dist/' . $assets['images/adriana_mateusz.jpg']
                ],
                2 => (object) [
                    'name' => 'Marcin',
                    'function' => 'Świadek Pana Młodego',
                    'image' => '/dist/' . $assets['images/marcin.jpg']
                ],
            ];
        } else {
            $data->persons = [
                0 => (object)[
                    'name' => 'Magda',
                    'function' => 'Świadowa Panny Młodej',
                    'image' => '/dist/' . $assets['images/magda.jpg']
                ],
                1 => (object)[
                    'name' => 'Dawid',
                    'function' => 'Świadek Pana Młodego',
                    'image' => '/dist/' . $assets['images/dawid.jpg']
                ],
                2 => (object)[
                    'name' => 'Ola',
                    'function' => 'Świadowa Panny Młodej',
                    'image' => '/dist/' . $assets['images/ola.jpg']
                ],
                3 => (object)[
                    'name' => 'Marcin',
                    'function' => 'Świadek Pana Młodego',
                    'image' => '/dist/' . $assets['images/marcin.jpg']
                ],
            ];
        }
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

        <meta name="robots" content="noindex,nofollow">

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

    <?php if (!$showFeature AND !$showSecondFeature) : ?>
    <div class="boxes-hld | js-mosaic-holder">
        <div class="grid-sizer"></div>

        <div class="grid-item | box box-content">
            <div class="box--body" style="background-image: url('/dist/<?= $assets['images/img_2.jpg'] ?>')">
                <div class="content">
                    <?php if (!$noCeremony) : ?>
                        <h4>Serdecznie witamy<br />naszych gości</h4>
                        <p>Mamy przyjemność zaprosić Was drodzy mili na naszą uroczystość <?= $data->ceremony_type_context ?>, która odbędzie się w mieście Szprotawa.</p>
                        <p>Prosimy, abyście zapoznali się z mapką dojazdu i przybyli koniecznie na czas :)</p>
                    <?php else : ?>
                        <h4>Dziękujemy wszystkim</h4>
                        <p>Dziękujemy wszystkim gościom za przybycie.</p>
                        <p>Do zobaczenia wkrótce ;)</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid-item | box box-content">
            <div class="box--body" style="background-image: url('/dist/<?= $assets['images/img_1.jpg'] ?>')">
                <div class="content">
                    <h1><?= $data->mrs ?> & <?= $data->mr ?><?= $noCeremony ? ' Pęczkowscy' : '' ?></h1>
                    <?php if (!$noCeremony) : ?>
                        <h2><?= $data->ceremony_type ?></h2>
                        <h3><?= $data->ceremony_date ?> (<?= $diffInDays === '0' ? 'Jedźmy!' : ($diffInDays === '1' ? 'Jutro trzeba wstać!' : 'za ' . $diffInDays . ' dni') ?>)</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($persons = $data->persons AND count($persons)) : ?>
        <div class="grid-item | box box-persons">
            <div class="box--body no-padding">
                <ul>
                    <?php foreach($persons as $person) : ?>
                        <li<?= is_array($person) ? ' class="double"' : '' ?>>
                            <div class="img-hld" style="background-image: url('<?= is_array($person) ? $person['image'] : $person->image ?>')"><img src="<?= is_array($person) ? $person['image'] : $person->image ?>" alt="<?= is_array($person) ? $person[0]->name . ' i ' . $person[1]->name : $person->name ?>"></div>
                            <?php if(is_array($person)) : ?>
                                <?php foreach($person as $per) : ?>
                                    <?php if(is_object($per)) : ?>
                                        <div class="img-content">
                                            <h4><?= $per->name ?></h4>
                                            <h5><?= $per->function ?></h5>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                            <div class="img-content">
                                <h4><?= $person->name ?></h4>
                                <h5><?= $person->function ?></h5>
                            </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!$noCeremony) : ?>
        <div class="grid-item | map">
            <div class="box box-featured">
                <div class="box--body">
                    <h4>Data:</h4>
                    <p><?= $data->ceremony_date ?></p>

                    <?php if ($data->ceremony_time): ?>
                        <h4>Godzina:</h4>
                        <p><?= $data->ceremony_time ?></p>
                    <?php endif; ?>

                    <?php if ($data->ceremony_first_place->name) : ?>
                        <h4>Miejsce ślubu:</h4>
                        <p><?= $data->ceremony_first_place->name ?></p>
                    <?php endif; ?>

                    <?php if ($data->ceremony_second_place->name) : ?>
                        <h4>Uroczystość:</h4>
                        <p><?= $data->ceremony_second_place->name ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="box box-map">
                <div class="box--body no-padding">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!$noCeremony AND $data->ceremony_placement AND $data->ceremony_placement_mobile) : ?>
        <div class="grid-item | placement">
            <div class="box box-featured">
                <div class="box--body">
                    <h4>Rozmieszczenie gości</h4>
                </div>
            </div>

            <div class="box box-placement">
                <div class="box--body">
                    <img src="<?= $data->ceremony_placement ?>" alt="Rozmieszczenie gości" class="is-desktop">
                    <img src="<?= $data->ceremony_placement_mobile ?>" alt="Rozmieszczenie gości" class="is-mobile">
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/dist/<?= $assets['scripts/main.js'] ?>"></script>

    <?php if (!$noCeremony) : ?>
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

                const infoWindowContent = [
                    <?php if ($data->ceremony_first_place->lat AND $data->ceremony_first_place->lng AND $data->ceremony_first_place->marker AND $data->ceremony_first_place->description) : ?>
                    ['<div class="info_content"><h3><?= $data->ceremony_first_place->name ?></h3><?= $data->ceremony_first_place->description ?></div>'],
                    <?php endif; ?>
                    <?php if ($data->ceremony_second_place->lat AND $data->ceremony_second_place->lng AND $data->ceremony_second_place->marker AND $data->ceremony_second_place->description) : ?>
                    ['<div class="info_content"><h3><?= $data->ceremony_second_place->name ?></h3><?= $data->ceremony_second_place->description ?></div>'],
                    <?php endif; ?>
                ];

                let infoWindow = new google.maps.InfoWindow(), marker, i;

                for( i = 0; i < markers.length; i++ ) {
                    const position = new google.maps.LatLng(markers[i][1], markers[i][2]);

                    bounds.extend(position);

                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        icon: markers[i][3]
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    })(marker, i));

                    map.fitBounds(bounds);
                }

                let boundsListener = google.maps.event.addListener((map), 'bounds_changed', function() {
                    this.setZoom(14);
                    google.maps.event.removeListener(boundsListener);
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG39phxuhQfjvhBBQINCTLN1JDudQgJ2Q&callback=initMap">
        </script>
    <?php endif; ?>
        
    <?php elseif($showFeature) : ?>

        <div class="boxes-hld">
            <div class="full-box">
                <div class="content">
                    <h1>Dziękujemy za przybycie ;)</h1>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/dist/<?= $assets['scripts/main.js'] ?>"></script>

    <?php else: ?>

        <div class="boxes-hld">
            <div class="full-box">
                <div class="content">
                    <h1>A jednak wytrzymali ze sobą ;)</h1>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/dist/<?= $assets['scripts/main.js'] ?>"></script>

    <?php endif; ?>
</body>
</html>
