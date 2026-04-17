<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/fevicon.png" type="image/x-icon" />
    <title>Four Point Inspection Report</title>

    <style>
        @font-face {
            font-family: "Montserrat";
            font-weight: normal;
            font-style: normal;
            src: url("{{ url('/inspector_assets/fonts/Montserrat/Montserrat-Regular.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "Montserrat";
            font-weight: 600;
            font-style: normal;
            src: url("{{ url('/inspector_assets/fonts/Montserrat/Montserrat-SemiBold.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "Montserrat";
            font-weight: bold;
            font-style: normal;
            src: url("{{ url('/inspector_assets/fonts/Montserrat/Montserrat-Bold.ttf') }}") format("truetype");
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <div class="report">
        <div>
            @include('partials.report.fp.page1')
        </div>

        <div class="page-break"></div>

        <div>
            @include('partials.report.fp.page2')
        </div>

        <div class="page-break"></div>

        <div>
            @include('partials.report.fp.page3')
        </div>

        <div class="page-break"></div>

        <div>
            @include('partials.report.fp.page4')
        </div>

    </div>
</body>

</html>
