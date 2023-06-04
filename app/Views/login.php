<?php
$username = session()->get('username');
if ($username == '') { ?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
        <!-- Sweet Alert-->
        <link href="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="<?= base_url() ?>assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="<?= base_url() ?>assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
                        <div class="p-3">
                            <?= form_open('auth/proseslogin') ?>
                            <?= csrf_field() ?>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <label class="form-label ms-1">Username</label>
                                    <input class="form-control" name="username" type="text" required placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <label class="form-label ms-1">Password</label>
                                    <input class="form-control" name="password" type="password" required placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                            </div>
                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Login</button>
                                </div>
                            </div>
                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <a href="<?= base_url("#") ?>" class="btn btn-success  w-100 waves-effect waves-light" type="submit">Kembali</a>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
        <!-- Sweet Alerts js -->
        <script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url() ?>assets/js/pages/sweet-alerts.init.js"></script>

        <script src="<?= base_url() ?>assets/js/app.js"></script>
        <script>
            $(document).ready(function() {

                <?php if (session()->getFlashdata('pesan')) { ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Username / Password Yang Anda Masukan Salah ? Silahkan Login Kembali'
                    });
                <?php } ?>

            })
        </script>

    </body>

    </html>
<?php } else { ?>
    <html>

    <head>
        <title>HTML Meta Tag</title>
        <meta http-equiv="refresh" content="3; url = <?= base_url('dashboard') ?>" />
    </head>
    <style>
        :root {
            /* animations constants */
            --steps: 10;
            --saturation: 80%;
            --lightness: 60%;
            --hue-offset: 320;
            --duration: 5000ms;

            /* generate some colors */
            --color-01: hsl(calc(360 / var(--steps) * 1 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-02: hsl(calc(360 / var(--steps) * 2 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-03: hsl(calc(360 / var(--steps) * 3 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-04: hsl(calc(360 / var(--steps) * 4 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-05: hsl(calc(360 / var(--steps) * 5 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-06: hsl(calc(360 / var(--steps) * 6 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-07: hsl(calc(360 / var(--steps) * 7 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-08: hsl(calc(360 / var(--steps) * 8 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-09: hsl(calc(360 / var(--steps) * 9 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-10: hsl(calc(360 / var(--steps) * 10 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-11: hsl(calc(360 / var(--steps) * 11 + var(--hue-offset)), var(--saturation), var(--lightness));
            --color-crayon: #202036;

            /* build some backgrounds */
            --bg-01-a: no-repeat left 0% top / 11% 0% linear-gradient(to right, var(--color-01), var(--color-02));
            --bg-01-b: no-repeat left 0% top / 11% 100% linear-gradient(to right, var(--color-01), var(--color-02));
            --bg-02-a: no-repeat left 11.11% bottom / 11% 0% linear-gradient(to right, var(--color-02), var(--color-03));
            --bg-02-b: no-repeat left 11.11% bottom / 11% 100% linear-gradient(to right, var(--color-02), var(--color-03));
            --bg-03-a: no-repeat left 22.22% top / 11% 0% linear-gradient(to right, var(--color-03), var(--color-04));
            --bg-03-b: no-repeat left 22.22% top / 11% 100% linear-gradient(to right, var(--color-03), var(--color-04));
            --bg-04-a: no-repeat left 33.33% bottom / 11% 0% linear-gradient(to right, var(--color-04), var(--color-05));
            --bg-04-b: no-repeat left 33.33% bottom / 11% 100% linear-gradient(to right, var(--color-04), var(--color-05));
            --bg-05-a: no-repeat left 44.44% top / 11% 0% linear-gradient(to right, var(--color-05), var(--color-06));
            --bg-05-b: no-repeat left 44.44% top / 11% 100% linear-gradient(to right, var(--color-05), var(--color-06));
            --bg-06-a: no-repeat left 55.55% bottom / 11% 0% linear-gradient(to right, var(--color-06), var(--color-07));
            --bg-06-b: no-repeat left 55.55% bottom / 11% 100% linear-gradient(to right, var(--color-06), var(--color-07));
            --bg-07-a: no-repeat left 66.66% top / 11% 0% linear-gradient(to right, var(--color-07), var(--color-08));
            --bg-07-b: no-repeat left 66.66% top / 11% 100% linear-gradient(to right, var(--color-07), var(--color-08));
            --bg-08-a: no-repeat left 77.77% bottom / 11% 0% linear-gradient(to right, var(--color-08), var(--color-09));
            --bg-08-b: no-repeat left 77.77% bottom / 11% 100% linear-gradient(to right, var(--color-08), var(--color-09));
            --bg-09-a: no-repeat left 88.88% top / 11% 0% linear-gradient(to right, var(--color-09), var(--color-10));
            --bg-09-b: no-repeat left 88.88% top / 11% 100% linear-gradient(to right, var(--color-09), var(--color-10));
            --bg-10-a: no-repeat left 99.99% bottom / 11% 0% linear-gradient(to right, var(--color-10), var(--color-11));
            --bg-10-b: no-repeat left 99.99% bottom / 12% 100% linear-gradient(to right, var(--color-10), var(--color-11));
        }

        .rainbow-marker-loader {
            height: 4rem;
            width: 20rem;
            max-width: 100%;
            border: .5rem solid var(--color-crayon);
            border-radius: .5rem;
            animation: infinite alternate rainbow-fill var(--duration) ease-in-out;
            box-sizing: border-box;
            position: relative;
            margin: 1rem;
            background:
                var(--bg-01-a),
                var(--bg-02-a),
                var(--bg-03-a),
                var(--bg-04-a),
                var(--bg-05-a),
                var(--bg-06-a),
                var(--bg-07-a),
                var(--bg-08-a),
                var(--bg-09-a),
                var(--bg-10-a);
        }

        .rainbow-marker-loader::after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform-origin: left center;
            border-radius: .5rem;
            box-sizing: border-box;
            margin-top: -7.5%;
            margin-left: -2.5%;
            animation: infinite alternate move-marker var(--duration) ease-in-out;
            background:
                no-repeat left 0% top / 3rem 50% linear-gradient(to bottom right, transparent, transparent 40%, var(--color-crayon) 40%),
                no-repeat left 0% bottom / 3rem 50% linear-gradient(to top right, transparent, transparent 40%, var(--color-crayon) 40%),
                no-repeat left 3rem bottom / 100% 100% linear-gradient(var(--color-crayon), var(--color-crayon))
        }

        @keyframes move-marker {
            10% {
                transform: translate(5%, 100%) rotate(2.5deg);
            }

            20% {
                transform: translate(20%, 0) rotate(-5deg);
            }

            30% {
                transform: translate(30%, 100%) rotate(2.5deg);
            }

            40% {
                transform: translate(40%, 0) rotate(-5deg);
            }

            50% {
                transform: translate(50%, 100%) rotate(2.5deg);
            }

            60% {
                transform: translate(60%, 0) rotate(-5deg);
            }

            70% {
                transform: translate(70%, 100%) rotate(2.5deg);
            }

            80% {
                transform: translate(80%, 0) rotate(-5deg);
            }

            90% {
                transform: translate(90%, 100%) rotate(2.5deg);
            }

            100% {
                transform: translate(100%, 0) rotate(-5deg);
            }
        }

        @keyframes rainbow-fill {
            0% {
                background:
                    var(--bg-01-a),
                    var(--bg-02-a),
                    var(--bg-03-a),
                    var(--bg-04-a),
                    var(--bg-05-a),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            10% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-a),
                    var(--bg-03-a),
                    var(--bg-04-a),
                    var(--bg-05-a),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            20% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-a),
                    var(--bg-04-a),
                    var(--bg-05-a),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            30% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-a),
                    var(--bg-05-a),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            40% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-a),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            50% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-a),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            60% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-b),
                    var(--bg-07-a),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            70% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-b),
                    var(--bg-07-b),
                    var(--bg-08-a),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            80% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-b),
                    var(--bg-07-b),
                    var(--bg-08-b),
                    var(--bg-09-a),
                    var(--bg-10-a);
            }

            90% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-b),
                    var(--bg-07-b),
                    var(--bg-08-b),
                    var(--bg-09-b),
                    var(--bg-10-a);
            }

            100% {
                background:
                    var(--bg-01-b),
                    var(--bg-02-b),
                    var(--bg-03-b),
                    var(--bg-04-b),
                    var(--bg-05-b),
                    var(--bg-06-b),
                    var(--bg-07-b),
                    var(--bg-08-b),
                    var(--bg-09-b),
                    var(--bg-10-b);
            }
        }


        /* for demo */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem 1rem 2rem 1rem;
            box-sizing: border-box;
            overflow: hidden;
        }

        .title {
            color: var(--color-crayon);
            font-size: 1.5rem;
            font-family: 'M PLUS Rounded 1c', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>

    <body>
        <h1 class="title">Redirect to Dashboard</h1>
        <div class="rainbow-marker-loader"></div>
    </body>

    </html>
<?php } ?>