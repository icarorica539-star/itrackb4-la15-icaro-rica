<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>500 - Server Error</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow text-center">
                <div class="card-body py-5">

                    <h1 class="display-1 fw-bold text-danger">
                        500
                    </h1>

                    <h2 class="mb-3">Internal Server Error</h2>

                    <p class="text-muted mb-4">
                        Sorry! Something went wrong on our server.
                        Please try again later.
                    </p>

                    <a href="{{ route('subjects.index') }}"
                       class="btn btn-primary">
                        Back to My Subjects
                    </a>

                </div>
            </div>

            <p class="text-center text-muted mt-3">
                Prepared by Rica Icaro
            </p>
        </div>
    </div>
</div>

</body>
</html>
