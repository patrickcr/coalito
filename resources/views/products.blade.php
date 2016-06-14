<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/assets/bower/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="/assets/bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></link>
    <script type="text/javascript" src="/assets/js/app.js"></script>

</head>
<body>
<div class="container">
    <div class="content">

        <
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create Product</h3>
            </div>
            <div class="panel-body">
                <form  id="product_form" method="post" role="form">
                    <legend>Product</legend>
                    {!! csrf_field() !!}
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="ex.. Mouse">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-2">
                        <div class="form-group">
                            <label for="">Credit</label>
                            <input type="number" class="form-control" name="credit" id="credit" value="0"
                                   placeholder="ex.. 0.20">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-2">
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required id="quantity"
                                   placeholder="ex.. 5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" id="price" required placeholder="ex.. 3.20">
                        </div>
                    </div>
                    <div style="text-align: right" class="col-xs-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Products</h3>
            </div>
            <div class="panel-body">
                <ul id="products" class="list-group">
                    <li class="list-group-item product clone">
                        <div class="product id"> 12</div>
                        <div class="product name"> Keyboard</div>
                        <div class="product submited">2002-12-12</div>
                        <div class="product quantity"> 10</div>
                        <div class="product price"> 10.20</div>
                        <div class="product edit">
                            <button type="button" class="btn btn-primary edit">Edit</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>

<style>

    .product {
        display: inline-block;
        width: 100%;

    }

    .product.clone {
        display: none;
    }

    .product.id {
        display: inline-block;
        width: 5%;
    }

    .product.name {
        display: inline-block;
        width: 30%;
    }

    .product.submited {
        display: inline-block;
        width: 15%;
    }

    .product.quantity {
        display: inline-block;
        width: 20%;
        text-align: center;
    }

    .product.price {
        display: inline-block;
        width: 15%;
        text-align: center;
    }

    .product.edit {
        text-align: right;
        display: inline-block;
        width: 10%;
    }
</style>
</html>
