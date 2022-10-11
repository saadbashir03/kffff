<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Payroll</title>

    <style>
        h2,
        h3 {

            font-weight: 100;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}" st>
            <h3>KaKitangan</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <h5>Home</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leave') }}">
                        <h5>Leave</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payroll') }}">
                        <h5>Payroll</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('claim') }}">
                        <h5>Claim</h5>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="#"><h5>Logout</h5></a> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-link">
                        @csrf
                        <button type="submit"
                            style="background-color: transparent;color:white; border:none;">Logout</button>
                    </form>
                </li>


            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <h4 class="mb-5">Employee</h4>

                <select class="form-control form-control-sm">
                    <option>Monthly</option>
                </select>
                <div class="form-group mt-3">
                    <label for="salary">Salary (RM)</label>
                    <input type="number" class="form-control" id="salary" />
                </div>
            </div>
            <div class="col-md-2">
                <h4 class=" mb-5">Basic Earning</h4>
                <div class="mb-5">
                   RM <h4 id="sal_1" >10,000/</h4> month


                </div>
                <div>
                    <h6>Amount</h6>
                    <h3>RM</h3>
                    <h2>100000</h2>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Additional Earning</h4>
                <div class="mt-5">
                    <p>General Allowance</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>
                <div class="mt-3">
                    <p>General Allowance</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>

                <div class="mt-3">
                    <p>Transport Allowance</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>

                <div class="mt-3">
                    <p>Phone Allowance</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>

                <div class="mt-3">
                    <p>claims Allowance</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>

                <div class="mt-3">
                    <p>Bonus</p>
                    RM <input style="width:60px;color:blue !important" placeholder="0.00" type="number" name="s"
                        id="">
                </div>
            </div>

            <div class="col-md-2">
                <h4>Pay Amount</h4>

                <div>
                    <p>Basic Pay</p>
                    <h2>RM <br>
                        10000.00
                    </h2>
                </div>

                <div class="mb-5 mt-5">
                    <p>Additional Earning</p>
                    <h3 style="font-weight: 500">RM <br>
                        10000.00
                    </h3>
                </div>

                <div>
                    <p>Gross Pay</p>
                    <h3>RM<br>
                        10000.00
                    </h3>
                </div>

                <div class="mt-5">
                    <p>Net Pay</p>
                    <h3>RM<br>
                        10000.00
                    </h3>
                </div>

            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" id="sub" type="button">Calculate</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {

            $("#sub").click(function(e) {
                e.preventDefault();

                let salary=$('#salary').val();

                $('#sal_1').val(salary);
                jq
                $('#sal_1').append("zdhjds");
                console.log(salary)
                // alert(salary)
            });
        })
    </script>
</body>

</html>
