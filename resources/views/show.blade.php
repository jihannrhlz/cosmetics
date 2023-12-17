<!DOCTYPE html>
<html>
<head>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-color: #fff5f5;
        box-sizing: border-box;
    }

    .heading {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    padding: 1rem;
    margin: 2rem 0;
    }

    .heading span {
    color: #ff666f;
    }
    .container {
        margin: 20px 200px;
        display: flex;

    }
    .right-box {
        width: 50%;
        border: 2px solid #ff979e;
        border-radius: 10px;
    }
    .main-image-box {
        padding: 30px 0px;
        width: 100%;
        display: flex;
        align-items:center;
        justify-content: center;
    }
    .main-image {
        height: 390px;
        width: auto;
    }
    .image {
        height: 90%;
        width: auto;
    }
    .details-box {
        width: 50%;
        padding-left: 50px;
    }
    </style>
    <title>{{ $product->name }}</title>
</head>
<body>
    <h1 class="heading">Detail<span> Product</span></h1>
    <div class="container">
        <div class="right-box">
            <div class="main-image-box">
                <img src="{{ asset('storage/'.$product->image) }}" id="mainImage" class="main-image">
            </div>
        </div>
        <div class="details-box">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->category->name }}</p>
            <h2>{{ $product->price }}</h2>
        <h4>Description Product</h4>
        <p>{{ $product->description }}</p>
        </div>
    </div>
</body>
</html>