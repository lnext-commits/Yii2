var contactButtons = document.querySelectorAll('.contact-btn');
var popups = document.querySelectorAll('.popup');
var overlay = document.querySelector('.overlay');
var contactPopup = document.getElementById('contact-popup');

// Create anchors on page
document.querySelectorAll('.header__main__link').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.querySelectorAll('.footer__menu__link').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

contactButtons.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        overlay.classList.add('overlay_show');
        contactPopup.classList.add('popup_open');
    });
});

popups.forEach(function (popup) {
    var closeButton = popup.querySelector('.popup__close');

    closeButton.addEventListener('click', function (e) {
        e.preventDefault();
        overlay.classList.remove('overlay_show');
        popup.classList.remove('popup_open');
    });
});

// Init scroll animation
AOS.init();

am4core.ready(function () {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create map instance
    var chart = am4core.create("custom-map", am4maps.MapChart);

    // Set map definition
    chart.geodata = am4geodata_worldLow;

    // Set projection
    chart.projection = new am4maps.projections.Miller();

    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

    // Exclude Antartica
    polygonSeries.exclude = ["AQ"];

    // Make map load polygon (like country names) data from GeoJSON
    polygonSeries.useGeodata = true;

    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}";
    polygonTemplate.polygon.fillOpacity = 0.6;


    // Create hover state and set alternative fill color
    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = chart.colors.getIndex(0);

    // Add image series
    var imageSeries = chart.series.push(new am4maps.MapImageSeries());
    imageSeries.mapImages.template.propertyFields.longitude = "longitude";
    imageSeries.mapImages.template.propertyFields.latitude = "latitude";
    imageSeries.mapImages.template.tooltipText = "{title}:{value}";

    var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
    circle.radius = 2;
    circle.propertyFields.fill = "color";

    var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
    circle2.radius = 2;
    circle2.propertyFields.fill = "color";


    circle2.events.on("inited", function (event) {
        animateBullet(event.target);
    })


    function animateBullet(circle) {
        var animation = circle.animate([{ property: "scale", from: 1, to: 3 }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
        animation.events.on("animationended", function (event) {
            animateBullet(event.target.object);
        })
    }

    var colorSet = new am4core.ColorSet();

    imageSeries.data = [{
        "title": "Bulgaria",
        "value": 3,
        "latitude": 42.510578,
        "longitude": 27.461014,
        "color": colorSet.next()
    }, {
        "title": "Poland",
        "value": 4,
        "latitude": 51.9189,
        "longitude": 19.1344,
        "color": colorSet.next()
    }, {
        "title": "Slovakia",
        "value": 1,
        "latitude": 48.148598,
        "longitude": 17.107748,
        "color": colorSet.next()
    }, {
        "title": "Italy",
        "value": 1,
        "latitude": 41.902782,
        "longitude": 12.496366,
        "color": colorSet.next()
    }, {
        "title": "Belgium",
        "value": 1,
        "latitude": 50.5011,
        "longitude": 4.4765,
        "color": colorSet.next()
    }, {
        "title": "Lithuania",
        "value": 2,
        "latitude": 54.687157,
        "longitude": 25.279652,
        "color": colorSet.next()
    }, {
        "title": "France",
        "value": 2,
        "latitude": 46.7111,
        "longitude": 1.7191,
        "color": colorSet.next()
    }, {
        "title": "Israel",
        "value": 1,
        "latitude": 31.771959,
        "longitude": 35.217018,
        "color": colorSet.next()
    }, {
        "title": "Switzerland",
        "value": 2,
        "latitude": 46.818188,
        "longitude": 8.227512,
        "color": colorSet.next()
    }, {
        "title": "Netherlands",
        "value": 1,
        "latitude": 52.370216,
        "longitude": 4.895168,
        "color": colorSet.next()
    }, {
        "title": "Great Britain",
        "value": 0,
        "latitude": 53.8260,
        "longitude": -2.4220,
        "color": colorSet.next()
    }, {
        "title": "Czech Republic",
        "value": 0,
        "latitude": 49.8038,
        "longitude": 15.4749,
        "color": colorSet.next()
    }, {
        "title": "Latvia",
        "value": 0,
        "latitude": 56.946285,
        "longitude": 24.105078,
        "color": colorSet.next()
    }, {
        "title": "Albania",
        "value": 0,
        "latitude": 41.1529,
        "longitude": 20.1606,
        "color": colorSet.next()
    }, {
        "title": "Spain",
        "value": 0,
        "latitude": 41.390205,
        "longitude": 2.154007,
        "color": colorSet.next()
    }];

}); // end am4core.ready()