function toggleFilterProducts() {
    var productsFilters = $('.products__filters');
    var filterHeader = productsFilters.find('.wrap-filter-block');

    var filterList = undefined;

    filterHeader.click(function () {
        filterList = $(this).next('.products__filters__list');
        filterList.toggleClass('show');
    });
}

function filteringProducts() {
    var ajaxUrl =  window.document.location.origin+'/en/ajax/smart.html';
    var filteringProductCheckbox = $('.block__checkbox');
    var filteringForm = $('#form-product-filter');
    var productsCards = $('.products__cards .row');
    var typeFiltersList = $('.filters__type')
    var brandFiltersList = $('.filters__brand')
    var dataForm = undefined;

    var pageCounter = $('#page-counter');
    var loadMore_btn = $('.products__loadMore-btn');
    var j = 2;

    filteringProductCheckbox.on('change', function () {
        pageCounter.val(1);
        j = 2;
        dataForm = filteringForm.serialize();
        productsCards.children().remove();
        sendFilterData(dataForm);
    });

    loadMore_btn.on('click', function () {
        pageCounter.val(j);
        dataForm = filteringForm.serialize();
        sendFilterData(dataForm);
        pageCounter.val(j);
        j++;
    });

    function sendFilterData(dataForm) {
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: dataForm,
            dataForm: 'json',
            success: function (data) {
                data = JSON.parse ( data );
                console.log(data);
                viewProductCard(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function viewProductCard(data) {
        typeFiltersList.children().remove();
        brandFiltersList.children().remove();
        $.each(data.data.products, function (i, item) {
            productsCards.append(
                '<div class="col-lg-4 col-md-6 col-xs-12">\n' +
                '<a class="products__card" href="/product/info/' + item.id + '.html">\n' +
                '<h5 class="products__card__header">' + item.title + '</h5>\n' +
                '<img src="' + item.logo + '" alt="product">\n' +
                ' <div>\n' +
                '<h4 class="products__card__price">$ '+ item.price + '</h4>\n' +
                '</div>' +
                '</a>\n' +
                '</div>' +
                '');
        });
        $.each(data.data.typeFilter, function (i, item) {
            typeFiltersList.append(
                '<div class="form-group">\n' +
                '<input name="productType[]" value="' + item.idType + '"  class="filtering-product-checkbox" type="checkbox" id="products__filter__' + item.idType + '"  >\n' +
                '<label for="products__filter__' + item.idType + '">' + item.nameType + '</label>\n' +
                '</div>' +
                '');
            $.each(data.data.setTypeFilter, function (k, val) {
                if (item.idType == val) {
                    $('#products__filter__'+item.idType).prop('checked', true);
                }
            });

        });

        $.each(data.data.brandFilter, function (i, item) {
            brandFiltersList.append(
                ' <div class="form-group"> \n' +
                '<input name="brand[]" value="' + item.idType + '"  class="filtering-product-checkbox" type="checkbox" id="products__filter__' + item.idType + '" >\n' +
                '<label for="products__filter__' + item.idType + '">' + item.nameType + '</label>\n' +
                '</div>' +
                '');
            $.each(data.data.setBrandFilter, function (k, val) {
               if (item.idType == val) {
                   $('#products__filter__'+item.idType).prop('checked', true);
               }
            });
        });



    }
}

$(document).ready(function () {
    toggleFilterProducts();
    filteringProducts();
    $('#searchLanding').autocomplete({
        source: "https://ttline-landing.ua/en/ajax/search.html", // url-адрес
        minLength: 2,
        appendTo:"#resultSearch"
    });
});



/*
function objToString(o) {
    var s = '{\n';
    for (var p in o)
        s += '    "' + p + '": "' + o[p] + '"\n';
    return s + '}';
}
*/
