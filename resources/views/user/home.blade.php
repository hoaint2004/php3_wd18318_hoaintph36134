<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('home.css') }}"> --}}
    <title>Trang chủ</title>
    <style>
        .container {
            max-width: 1200px;
            height: auto;
            /* width: 1200px; */
            margin: auto auto;
            padding: 0;
        }

        .content1,
        .content2,
        .content3 {
            display: flex;
            margin-bottom: 30px;

        }

        /* .content2 {
            display: flex;
            margin-bottom: 30px;
        }

        .content3 {
            display: flex;

        } */

        .content4 {
            width: 1200px;
            display: flex;
            margin: auto auto;
            justify-content: center;
        }   

        /* .content4 .text {
            margin: 0 50;
            max-width:100%;

        } */

        .content5 {
            /* width: 1200px; */
            display: flex;
            margin: auto auto;
            justify-content: space-evenly;
        }

        .blog1 {
            width: 65%;
            position: relative;

        }

        .blog1>img {
            max-width: 100%;
            width: 60%;
            height: auto;

        }

        .blog2 {
            width: 35%;
        }

        .box {
            display: flex;
        }

        .note {
            display: flex;
            /* justify-content: space-evenly; */
        }

        .note>p {
            text-align: left;
            padding: 0 10px;
        }

        .box .picture {
            /* padding: 0 30px; */
            width: 33.333%;
            padding: 0 30px;

        }

        .blog2 .box .picture>img {
            width: 120px;
            height: 120px;
            border-radius: 1px soild #777;
        }

        img {
            border-style: none;
            /* border: 2px solid #777; */
            border-radius: 10px;
            /* max-width: 100%; */
        }

        .box2 {
            width: 33.333%;
            padding: 0 20px;
            /* padding-bottom: 20px; */
        }

        .box2.picture {
            max-width: 100%;
        }

        .button {
            text-align: center;
        }

        .btn1 {
            width: 100px;
            height: 40px;
            line-height: 40px;
            background: black;
            color: #fff;
            border-radius: 7px;
        }

        .btn1:hover {
            background: red;
        }

        .blog4 {
            width: 60%;
            text-align: left;
        }

        .blog1>h1 {
            position: absolute;
            bottom: 70px;
            left: 25px;
        }

        .blog1>button {
            position: absolute;
            bottom: 150px;
            left: 25px;
        }

        .blog1 .note {
            position: absolute;
            bottom: 50px;
            left: 25px;
        }

        .blog5 {
            justify-content: space-evenly;
            width: 20%;
        }

        .blog6 {
            justify-content: space-evenly;
            width: 20%;
        }

        button {
            border: 5px;
            border-radius: 1px solid #777;
        }

        .container1 {
            /* width: 1200px; */
            background-color: #fff5f3;
            margin-top: 50px;
            padding: 45px 0 30px 0;
        }

        .container2 {
            width: 1200px;
            margin: auto auto;
        }

        .content5 .blog_end {
            width: 25%;
        }

        .btn {
            max-width: 100%;
            height: 20px;
            line-height: 20px;
            border-radius: 5px;
            color: #fff;
        }

        .picture>img {
            position: relative;
        }

        .picture .icon>button {
            position: absolute;
            bottom: 80px;
            left: 200px;
            top: 730px;

        }

        .picture .icon>span {
            position: absolute;
            bottom: 80px;
            left: 480px;
            top: 730px;
        }

        .icon {
            display: flex;
            /* position: absolute;
            bottom: 80px;
            justify-content: space-between; */
        }

        span {
            width: 30px;
            height: 30px;
            line-height: 30px;
            background-color: #777;
            text-align: center;
        }

        i {
            margin-right: 10px;
        }

        /* .text{
                position: relative;
            } */

        .text>h2 {
            padding-left: 150px;
            /* position: absolute;
                left: 150px;
                top: -70px; */
        }

        .text>p {
            padding-left: 150px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content1">
            <div class="blog1"
                style="background-image: url('storage/images/R1BlmLNeySMVhnD0HPM2kCZyvyedUiytuRirxuys.jpg'); max-width:100%">
                <button class="btn" style="background: #eba845;">Business</button>
                <h1 style="color: #fff;">It time Rescue restaurant food with these epic saving</h1>
                <div class="note" style="color: #fff">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
            </div>

            <div class="blog2">
                <div class="box">
                    <div class="picture">
                        <img src="{{ url('storage\images\a10.jpg') }}" alt="">
                    </div>
                    <div class="desc">
                        <button style="background-color:#91bd3a" class="btn">Inspiration</button>
                        <h3>It’s time to look at the best structures of our society</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="picture">
                        <img src="{{ url('storage\images\a2.jpg') }}" alt="">
                    </div>
                    <div class="desc">
                        <button class="btn" style="background-color: #4dcf8f">Active</button>
                        <h3>12 effortless maxi dresses to wear all summer</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                </div>

                <div class="box">
                    <div class="picture">
                        <img src="{{ url('storage\images\a1.jpg') }}" alt="">
                    </div>
                    <div class="desc">
                        <button class="btn" style="background-color: #d66300">Science</button>
                        <h3>Rescue restaurant food with these epic waste saving</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                </div>

                <div class="box">
                    <div class="picture">
                        <img src="{{ url('storage\images\a12.jpg') }}" alt="">
                    </div>
                    <div class="desc">
                        <button class="btn" style="background-color: #62ce5c">Sports</button>
                        <h3>How Covid-19 made us forget our morals on plastic</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <h2>Editors Picks Post</h2>
        <p>This is an optional subtitle for post section</p>
        <div class="content2">
            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a1.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>Wedding guest dresses for every shape, style</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet....
                </p>
            </div>

            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>This is how much people have made selling</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet....
                </p>
            </div>

            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a1.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>This is how the pandemic has changed our</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem Donec
                    vehicula luctus nunc in laoreet...
                </p>
            </div>
        </div>

        <div class="content3">
            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a11.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>Nice photo shooting with hand classic style</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet....
                </p>
            </div>
            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a2.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>It’s always fun time and smile in the summer</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet....
                </p>
            </div>
            <div class="box2">
                <div class="picture">
                    <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="350px" height="350px">
                    <div class="icon">
                        <button class="btn" style="background-color:#62ce5c ">Sports</button>
                        <span><i class="fa-regular fa-image"></i></span>
                    </div>
                </div>
                <h3>Great time for enjoy your coffee with
                </h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet....
                </p>
            </div>
        </div>
        <div class="button">
            <button class="btn1">Load More</button>
        </div>

    </div>
    <div class="container1">
        <div class="text">
            <h2>Lifestyle News</h2>
            <p>This is an optional subtitle for post section</p>
        </div>
        <div class="content4">
            <div class="blog4">
                <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="700px" height="500px">
                <h2>Your phone can take the best quality photo & Style</h2>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                </div>
                <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec
                    vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum.
                    Proin viverra orci...</p>
            </div>

            <div class="blog5">
                <div class="">
                    <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="200px" height="200px">
                    <h3>The dress style influencers are wearing right now</h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                        <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    </div>
                </div>

                <div class="">
                    <img src="{{ url('storage\images\a11.jpg') }}" alt="" width="200px" height="200px">
                    <h3>It really great holiday and enjoy with the sea</h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                        <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    </div>
                </div>
            </div>

            <div class="blog6">
                <div class="">
                    <img src="{{ url('storage\images\a1.jpg') }}" alt="" width="200px" height="200px">
                    <h3>This is the best camera for short minimal style</h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                        <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    </div>
                </div>

                <div class="">
                    <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="200px" height="200px">
                    <h3>This is my favourite fashion that i watching</h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                        <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container2">
        <h2>Health & Fitness</h2>
        <p>This is an optional subtitle for post section</p>
        <div class="content5">
            <div class="blog_end">
                <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="250px" height="250px">
                <h3>This is an optional subtitle for post section</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24gg, 2019</p>
                </div>
            </div>
            <div class="blog_end">
                <img src="{{ url('storage\images\a11.jpg') }}" alt="" width="250px" height="250px">
                <h3>Relaxing with nice view after enjoy with your food</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
            <div class="blog_end">
                <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="250px" height="250px">
                <h3>Best Lighting For Outdoor Photo Shoot Style</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
            <div class="blog_end">
                <img src="{{ url('storage\images\a1.jpg') }}" alt="" width="250px" height="250px">
                <h3>New skill with the height quality camera lens</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

{{-- git status
    git add .
    git commit -m"name"


--}}