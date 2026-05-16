<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Easy Peasy Online Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            height:100vh;

            overflow:hidden;

            font-family:sans-serif;

            background:#f5f5f5;
        }

        /* LEFT SIDE */
        .left-side{

            height:100vh;

            background:white;

            display:flex;

            justify-content:center;

            align-items:center;

            padding:60px;
        }

        .content{

            text-align:center;
        }

        /* TITLE */
        .main-title{

            display:flex;

            flex-direction:column;

            align-items:center;

            margin-bottom:25px;
        }

        .brand-name{

            font-size:90px;

            font-weight:900;

            color:#111;

            line-height:1;
        }

        .shop-name{

            font-size:42px;

            font-weight:700;

            color:#ff4d4d;

            margin-top:12px;

            letter-spacing:4px;
        }

        /* TEXT */
        .content p{

            font-size:22px;

            color:#666;

            margin-bottom:40px;
        }

        /* BUTTON */
        .shop-btn{

            padding:18px 45px;

            border:none;

            border-radius:60px;

            background:black;

            color:white;

            text-decoration:none;

            font-size:20px;

            font-weight:bold;

            transition:0.3s;
        }

        .shop-btn:hover{

            background:#ff4d4d;

            color:white;

            transform:translateY(-3px);
        }

        /* RIGHT SIDE */
        .right-side{

            height:100vh;

            background:#ececec;

            position:relative;

            overflow:hidden;
        }

        .product-img{

            position:absolute;

            border-radius:30px;

            object-fit:cover;

            box-shadow:0 15px 35px rgba(0,0,0,0.2);

            transition:0.4s;
        }

        .product-img:hover{

            transform:scale(1.05);
        }

        .img1{

            width:280px;
            height:380px;

            top:60px;
            left:80px;
        }

        .img2{

            width:240px;
            height:320px;

            top:180px;
            right:70px;
        }

        .img3{

            width:220px;
            height:260px;

            bottom:60px;
            left:180px;
        }

        /* RED CIRCLE */
        .circle{

            position:absolute;

            width:700px;
            height:700px;

            border-radius:50%;

            background:#ff4d4d;

            top:-250px;
            right:-250px;

            opacity:0.15;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- LEFT -->
        <div class="col-md-5 left-side">

            <div class="content">

                <h1 class="main-title">

                    <span class="brand-name">
                        Easy Peasy
                    </span>

                    <span class="shop-name">
                        Online Shop
                    </span>

                </h1>

                <p>
                    Fashion • Tech • Makeup • Shoes
                </p>

                <a href="/products"
                   class="shop-btn">

                    Shop Now →

                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-md-7 right-side">

            <div class="circle"></div>

            <!-- IMAGE 1 -->
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1170&auto=format&fit=crop"
                 class="product-img img1">

            <!-- IMAGE 2 -->
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=989&auto=format&fit=crop"
                 class="product-img img2">

            <!-- IMAGE 3 -->
            <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?q=80&w=687&auto=format&fit=crop"
                 class="product-img img3">

        </div>

    </div>

</div>

</body>
</html>