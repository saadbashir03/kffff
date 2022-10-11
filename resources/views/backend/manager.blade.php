<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Manager</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>


            </ul>
        </div>
    </nav>


    @php
        $user = Auth::user()->is_manager;

    @endphp
    @if ($user == 1)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Leave</h1>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Employess</th>
                                    <th scope="col">From</th>
                                    <th scope="col">TO</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Apply</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td>
                                            @php

                                                $value = App\Models\User::where(['id' => $leave->user_id])->get();

                                            @endphp
                                            {{ $value[0]->name }}
                                        </td>
                                        <td>{{ $leave->start_date }}</td>
                                        <td>{{ $leave->end_date }}</td>
                                        <td>
                                            @php
                                                $date1 = new DateTime($leave->start_date);
                                                $date2 = new DateTime($leave->end_date);
                                                $diff = $date2->diff($date1)->format('%a');
                                            @endphp
                                            {{ $diff }}
                                        </td>
                                        <td>{{ $leave->reason }}</td>
                                        <td>
                                            @if ($leave->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($leave->status == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>{{ $leave->leave_type }}</td>
                                        <td>{{ $leave->created_at }}</td>
                                        <td>

                                            <a href="{{ route('leavedelete', $leave->id) }}"
                                                class="btn btn-danger">Delete</a>

                                            <a href="{{ route('AcceptLeaveStatus', $leave->id) }}"
                                                class="btn btn-success">Accept</a>

                                            <a href="{{ route('RejectLeaveStatus', $leave->id) }}"
                                                class="btn btn-secondary">Reject</a>



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Claims</h1>

                    </div>
                    {{-- Table --}}
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-dark" id="myTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Employess</th>
                                            <th scope="col">Date of Transcation</th>
                                            <th scope="col">Date of Application</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Recipt</th>
                                            <th scope="col">Status</th>
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
                                                    @if ($claim->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($claim->status == 1)
                                                        <span class="badge badge-success">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger">Rejected</span>
                                                    @endif
                                                <td>

                                                    <a href="{{ route('claimdelete', $claim->id) }}"
                                                        class="btn btn-danger">Delete</a>

                                                    <a href="{{ route('AcceptClaimStatus', $claim->id) }}"
                                                        class="btn btn-success">Accept</a>

                                                    <a href="{{ route('RejectClaimStatus', $claim->id) }}"
                                                        class="btn btn-secondary">Reject</a>

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
        </section>
    @else
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>You are not Manager</h1>
                    </div>
                </div>
            </div>
        </section>
    @endif







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
</body>

</html>
