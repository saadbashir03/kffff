<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    {{-- button  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    {{-- {{---}}

    <title>Claim</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a class="nav-link" href="#">
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




    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Claim List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Summary Report</a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li> --}}
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane border-1 fade show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">

                        <div class="container ">
                            <div class="row justify-content-between">
                                <div class="col-md-12">
                                    <div class="card border-0">
                                        <div class="row mt-4">
                                            <div class="col-md-10 d-flex justify-content-between">
                                                <h2>All Claims</h2>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    New Claim
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Submit a new claim for approval
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('claimsave') }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Employee</label>
                                                                        <input type="text" class="form-control"
                                                                            name="user_id" id="user_id"
                                                                            value="{{ Auth::User()->name }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Claim
                                                                            Type:</label>
                                                                        <select class="form-control" id="claim_type"
                                                                            name="claim_type" required>
                                                                            <option
                                                                                value="Customer Marketing / Sale Expenses">
                                                                                Customer Marketing / Sale Expenses
                                                                            </option>
                                                                            <option value="Employee Communications">
                                                                                Employee Communications</option>
                                                                            <option value="Employee Travel">Employee
                                                                                Travel</option>
                                                                            <option value="Employee Transport">Employee
                                                                                Transport</option>
                                                                            <option value="Employee Wellbeings">
                                                                                Employee Wellbeings</option>
                                                                            <option value="Office Expenses">Office
                                                                                Expenses</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="total_mileage"
                                                                            id="label_total_mileage"
                                                                            class="col-form-label "
                                                                            style="display: none">Total Milage</label>
                                                                        <input type="number" class="form-control"
                                                                            style="display: none" id="total_mileage"
                                                                            name="total_mileage" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label"><span
                                                                                class="text-danger">*</span> Date of
                                                                            Transaction:</label>
                                                                        <input class="form-control" name="date"
                                                                            id="date" type="date" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="total_claim"
                                                                            class="col-form-label"><span
                                                                                class="text-danger">*</span>Total Claim
                                                                            Amount:</label>
                                                                        <input type="number" class="form-control"
                                                                            id="total_claim" name="total_claim"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="receipt"
                                                                            class="col-form-label">Tax Invoice /
                                                                            Receipt #</label>
                                                                        <input type="text" class="form-control"
                                                                            id="receipt" name="receipt" required>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="sst_amount"
                                                                            class="col-form-label"><span
                                                                                class="text-danger">*</span>SST
                                                                            Amount</label>
                                                                        <input type="number" class="form-control"
                                                                            id="sst_amount" name="sst_amount"
                                                                            required>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="d-flex">
                                                                            <div class="form-check ">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="sst_percentage"
                                                                                    value="10"
                                                                                    id="flexRadioDefault1">
                                                                                <label class="form-check-label"
                                                                                    for="flexRadioDefault1">
                                                                                    SST @ 10%
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check ml-4">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="sst_percentage"
                                                                                    value="6%"
                                                                                    id="flexRadioDefault2" checked>
                                                                                <label class="form-check-label"
                                                                                    for="flexRadioDefault2">
                                                                                    SST @ 6%
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="note"
                                                                            class="col-form-label">Remarks</label>
                                                                        <textarea class="form-control" id="note" name="note" required></textarea>
                                                                    </div>


                                                                    <button class="btn btn-primary"
                                                                        type="submit">Submit</button>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <p class="mt-4 text-center">
                                                    Total amount of
                                                    pending claims:
                                                </p>
                                                <h5 class="text-primary mt-5 text-center">
                                                    MYR 0.04
                                                </h5>
                                            </div>

                                            <div class="col-2">
                                                <p class="mt-4 text-center">
                                                    Total amount of
                                                    approved + paid claims:
                                                </p>
                                                <h5 class="text-primary mt-4 text-center">
                                                    MYR 0.00
                                                </h5>
                                            </div>

                                            <div class="col-2">
                                                <p class="mt-4 text-center">
                                                    Total amount of
                                                    rejected claims
                                                </p>
                                                <h5 class="text-primary mt-5 text-center">
                                                    MYR 0.00
                                                </h5>
                                            </div>


                                            <div class="col-2">
                                                <p class="mt-4 text-center">
                                                    Total claims
                                                    amount excl. SST:
                                                </p>
                                                <h5 class="text-primary mt-5 text-center">
                                                    MYR 0.00
                                                </h5>
                                            </div>

                                            <div class="col-2">
                                                <p class="mt-4 text-center">
                                                    Total SST
                                                    amount:
                                                </p>
                                                <h5 class="text-primary mt-5 text-center">
                                                    MYR 0.05
                                                </h5>
                                            </div>


                                            <div class="col-2">
                                                <p class="mt-4 text-bold text-center">
                                                    Total
                                                    claims amount:
                                                </p>
                                                <h5 class="text-primary mt-5 text-center">
                                                    MYR 0.04
                                                </h5>
                                            </div>




                                        </div>
                                        {{-- Table --}}
                                        <div class="container mt-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table" id="myTable">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Employess</th>
                                                                <th scope="col">Date of Transcation</th>
                                                                <th scope="col">Date of Application</th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Recipt</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($claims as $claim)
                                                                <tr>
                                                                    <td>{{ $claim->user_id }}</td>
                                                                    <td>{{ $claim->date }}</td>
                                                                    <td>{{ $claim->created_at }}</td>
                                                                    <td>{{ $claim->claim_type }}</td>
                                                                    <td>{{ $claim->total_claim }}</td>
                                                                    <td>{{ $claim->receipt }}</td>


                                                                    <td>

                                                                        <a href="{{ route('claimdelete', $claim->id) }}"
                                                                            class="btn btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end table --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    </div>
                    {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> --}}
                </div>
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

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function() {

            // select type
            $('#claim_type').change(function() {
                var type = $(this).val();
                if (type == 'Employee Travel') {
                    // $('#exampleFormControlInput1').attr('placeholder', 'RM');


                    $('#total_mileage').show();
                    $('#label_total_mileage').show();
                }
            });



            $(document).ready(function() {
                $('#myTable').DataTable({
                    buttons: [
                        'excel',
                    ]
                });
            });
        });
    </script>


</body>

</html>
