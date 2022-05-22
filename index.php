<?php

include_once('includes/db.php');

$db = new DataBase('localhost', 'root', '', 'font_agent');
//var_dump($db);

//echo "<pre>";
//print_r($db);
//echo "</pre>";


if( isset($_POST['name']) && isset($_POST['phone'])) {
    $db->insertDataInDB ( $_POST['name'], $_POST['phone'] );
}

if( isset($_GET['list_emails']) && !empty($_GET['list_emails']) ) {
    $db->get_list_emails();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&family=Raleway:wght@400;700&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <title>Land</title>

</head>

<body>

    <header>

        <div class="regular">
            <div class="logo">
                <img src="images/logo.png" alt="">
                <p>Жилой комплекс</p>
            </div>

            <div class="burger-icon"></div>

            <nav class="top-menu">
                <ul>
                    <a href="#footer">
                        <li>О компании</li>
                    </a>
                    <a href="#distric">
                        <li>Район</li>
                    </a>
                    <a href="#apartments">
                        <li>Каталог квартир</li>
                    </a>
                    <a href="#questions">
                        <li>Ипотека</li>
                    </a>
                    <a href="#footer">
                        <li>Контакты</li>
                    </a>
                </ul>
            </nav>

        </div>

    </header>

    <section class="first-view">

        <div class="regular">
            <h1>Жилой комплекс в&nbsp;историческом центре</h1>
            <img src="images/mouse.png" alt="">

            <div class="first-view__contacts">
                <p class="first-view__contacts-adress">Наб. реки Фонтанки 10-15</p>
                <p class="first-view__contacts-phone">8 (812) 123-45-67</p>
            </div>
        </div>

    </section>

    <section class="second-block">

        <div class="regular">

            <div class="second-block__el">
                <img src="images/bench.png" alt="">
                <p class="description">Рядом исторические парки и скверы</p>
            </div>

            <div class="second-block__el">
                <img src="images/building.png" alt="">
                <p class="description">Полностью обустроенный</p>
            </div>

            <div class="second-block__el">
                <img src="images/fountain.png" alt="">
                <p class="description">10 фонтанов на территории</p>
            </div>

            <div class="second-block__el">
                <img src="images/bicycle.png" alt="">
                <p class="description">6 км велодорожек</p>
            </div>

        </div>

    </section>

    <section id="apartments" class="apartments-block">

        <div class="regular">

            <h2>Наши квартиры</h2>

            <div class="apartments-block__wrapper">

                <a class="apartments-block__el apartments-block__el-1" data-fancybox="gallery" href="images/loft-1.png">
                    <img class="rounded" src="images/loft-1.png" />
                    <p>Лофт — 3 этажа</p>
                </a>

                <a class="apartments-block__el apartments-block__el-2" data-fancybox="gallery" href="images/loft-1.png">
                    <img class="rounded" src="images/loft-1.png" />
                    <p>Лофт — 3 этажа</p>
                </a>

                <a class="apartments-block__el apartments-block__el-3" data-fancybox="gallery" href="images/loft-1.png">
                    <img class="rounded" src="images/loft-1.png" />
                    <p>Лофт — 3 этажа</p>
                </a>

                <a class="apartments-block__el apartments-block__el-4" data-fancybox="gallery" href="images/loft-1.png">
                    <img class="rounded" src="images/loft-1.png" />
                    <p>Лофт — 3 этажа</p>
                </a>

            </div>

        </div>

    </section>

    <section id="distric" class="first-form">
        <div class="regular">

            <div class="first-form__block first-form__texts">
                <h2>Хотите посмотреть?</h2>
                <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является
                    стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник
                    создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.
                </p>
            </div>

            <form class="top-form" action="" method="POST">

                <input type="text" name="name" placeholder="Ваше имя">

                <input type="tel" name="phone" placeholder="Ваш телефон">

                <div class="form-text">*Мы никому не передаем ваши данные.
                    И не сохраняем ваш номер в базу.</div>

                <input type="submit" value="Посмотреть район">

            </form>

        </div>
    </section>

    <section class="section-video">
        <div class="regular">


            <div class="iframe-video-wrapper">

                <video id="video-movie" poster="video/video-poster.png">
                    <source src="video/All Elon Musk Hollywood.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    Тег video не поддерживается вашим браузером.
                    <a href="video/All Elon Musk Hollywood.mp4">Скачайте видео</a>.
                </video>

                <div class="play-button"></div>

            </div>


        </div>
    </section>

    <section class="map">
        <div class="regular">
            <iframe
                src="https://yandex.ru/map-widget/v1/?um=constructor%3A7f41a0b4d2350cb463224628c7dada52a54ba1f31cd62563e84d6862a11f2058&amp;source=constructor"
                width="100%" height="400" frameborder="0"></iframe>
        </div>
    </section>



    <section class="section-questions">
        <div class="regular">
            <h2>Есть вопросы?</h2>

            <form id="q-form" class="form-questions" action="">

                <div class="div-form">*Мы никому не передаем ваши данные.
                    И не сохраняем ваш номер в базу.</div>

                <input name="q_name" type="text" placeholder="Ваше имя">
                <input name="q_phone" type="tel" placeholder="Ваш телефон">
                <input type="submit" value="Посмотреть район">

            </form>

        </div>
    </section>







    <footer id="footer">
        <div class="regular footer-regular">
            <div class="logo logo-footer footer-col">
                <img src="images/logo.png" alt="">
                <p>Жилой комплекс</p>
            </div>
            <div class="footer-col">
                <ul>
                    <li>О компании</li>
                    <li>Район</li>
                    <li>Каталог квартир</li>
                    <li>Ипотека</li>
                    <li>Контакты</li>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <li>О компании</li>
                    <li>Район</li>
                    <li>Каталог квартир</li>
                    <li>Ипотека</li>
                    <li>Контакты</li>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <li>Адрес: Наб. реки Фонтанки 10-15</li>
                    <li>Телефон: 8 (812) 123-45-67</li>
                    <li>Отдел продаж: 10:00 - 20:00</li>
                    <li>E-mail: vip@housevip.ru</li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
    </footer>



    <div class="toTop"></div>

    <style>
        .toTop {
            position: fixed;
            right: 2rem;
            bottom: 2rem;
            background: url('images/next.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            transform: rotate(270deg);
            cursor: pointer;
        }
    </style>

    <script>

        $(".toTop").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 400);
        });

        $(".burger-icon").click(function () {

            if ($(".top-menu").is(':hidden')) {
                $(".top-menu").addClass('mobile-open');
                $(".top-menu").slideToggle("fast");
            } else {
                $(".top-menu").slideToggle("fast", function () {
                    $(".top-menu").removeClass('mobile-open');
                });
            }

        });


        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // $('.burger-icon').click(function () {

        //     if ($('.top-menu').hasClass('visible')) {
        //         $('.top-menu').hide();
        //         $('.top-menu').removeClass('visible');
        //     } else {
        //         $('.top-menu').show();
        //         $('.top-menu').addClass('visible');
        //     }

        // })

        jQuery(document).ready(function ($) {
            $('.play-button').click(function () {
                $('video').trigger('play');
                $(this).hide();
            });
            $('#video-movie').click(function () {
                if ($('video')[0].paused) {
                    $('video').trigger('play');
                    $('.play-button').hide();
                } else {
                    $('video').trigger('pause');
                    $('.play-button').show();
                }
            })
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

</body>

</html>
