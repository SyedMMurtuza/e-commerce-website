<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'All Birds')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    @vite(['resources/css/custom.css', 'resources/js/app.js'])
</head>

<body>


    @include('includes.header')

    <main>@yield('content')</main>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.your-class').slick({
            slidesToShow: 8,
            slidesToScroll: 1
        });

        var filtered = false;

        $('.js-filter').on('click', function() {
            if (filtered === false) {
                $('.your-class').slick('slickFilter', ':even');
                $(this).text('Unfilter Slides');
                filtered = true;
            } else {
                $('.your-class').slick('slickUnfilter');
                $(this).text('Filter Slides');
                filtered = false;
            }
        });
    </script>
    @stack('scripts')

</body>

</html>
