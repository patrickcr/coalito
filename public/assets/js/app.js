var product_form = null;
$(document).ready(function () {
    console.log("data");
    bind_list();
    //product form
    product_form = $("#product_form");

    product_form.submit(function () {
        var product = product_model();

        if (product_form.data("product") != undefined)
            product = product_form.data("product");

        //bind model
        product.name = product_form.find("#name").val();
        product.credit = product_form.find("#credit").val();
        product.quantity = product_form.find("#quantity").val();
        product.price = product_form.find("#price").val();


        var data = {product: product, _token: product_form.find("[name='_token']").val()};
        console.log(data);
        $.post('product/save', data).done(function (data) {
            clear_form();
            bind_list();

        });
        return false;
    });

});


function clear_form() {
    product_form.data("product", null);
    product_form.find("#name").val("").change();
    product_form.find("#credit").val("").change();
    product_form.find("#quantity").val("").change();
    product_form.find("#price").val("").change();
}
function bind_list() {

    var products_ui = $("#products");

    products_ui.find("li[class != 'list-group-item product clone']").remove();
    $.get('products').done(function (data) {
        var data = JSON.parse(data);
        $.each(data, function () {
            var product_ui = create_product_ui(this);
            console.log(product_ui.html());
            products_ui.append(product_ui);
        })
    })
};

function create_product_ui(data) {
    var product = $(".product.clone").clone();
    console.log(product.html());
    product.removeClass("clone");
    product.data("product", data);
    product.find(".id").text(data.id);
    product.find(".name").text(data.name);
    product.find(".submited").text(data.submited);
    product.find(".quantity").text(data.quantity);
    var total_price = data.quantity * data.price;
    product.find(".price").text(total_price.toFixed(2));

    product.find(".edit").click(function () {

        var product_data = $(this).parent().data("product");
        console.log(product_data);
        product_form.data("product", product_data);
        if (product_data != undefined) {
            product_form.find("#name").val(product_data.name).change();
            product_form.find("#credit").val(product_data.credit).change();
            product_form.find("#quantity").val(product_data.quantity).change();
            product_form.find("#price").val(product_data.price).change();
        }

    });


    return product;
}

function product_model() {
    var product = {};
    product.id = null;
    product.name = null;
    product.price = null;
    product.credit = null;
    product.submited = null;
    product.quantity = null;
    return product;
}
