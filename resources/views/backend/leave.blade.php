@extends('backend.layout')
@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="tab">
                    <button class="tablinks font-blod text-dark" onclick="openCity(event, 'London')" id="defaultOpen"
                        style="font-weight:600">Leave Calender</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')" style="font-weight:600">New Leave</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')" style="font-weight:600">View Application
                    </button>
                </div>

                <div id="London" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row mt-4">
                                        <div class="col-md-10">
                                            <h2>Calendar</h2>
                                            <p>Plan ahead and make sure your leave does not clash with any
                                                company/department events by using the calendar below.</p>
                                        </div>
                                        <div class="col-md-2">
                                            {{-- <button class="btn btn-primary" type="button ">New Leave</button> --}}
                                            <button class="tablinks btn btn-primary" onclick="openCity(event, 'Paris')" style="font-weight:600">New Leave</button>
                                        </div>
                                    </div>
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Paris" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <div class=" container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 mt-4">
                                <form method="POST" action="{{ route('leavesave') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="employee"><span class="text-danger">*</span> Select Employee</label>
                                        <input type="employee" class="form-control" id="employee" name="employee"
                                            value="{{ Auth::user()->email }}" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="leave_type"><span class="text-danger">*</span>Select Leave Type</label>
                                        <select class="form-control" name="leave_type" id="leave_type">
                                            <option value="annual">Annual (2 days available)</option>
                                            <option value="Hospitalization">Hospitalization(37 days available)</option>
                                            <option value="sick">sick(14 days available)</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="d-block" for="from_date"><span class="text-danger">*</span>Date(s) to
                                            Apply for Leave</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date"
                                            placeholder="Password">
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            placeholder="Password">

                                    </div>
                                    <div class="d-flex">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="leave_length"
                                                value="full day" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Full Day
                                            </label>
                                        </div>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="leave_length"
                                                value="AM" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                AM
                                            </label>
                                        </div>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="leave_length"
                                                value="PM" id="flexRadioDefault3" checked>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                PM
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="reason"><span class="text-danger">*</span> Reason for Leave</label>
                                        <textarea class="form-control" name="reason" id="reason" rows="3"></textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                      <label for="attachment">Supporting Documents</label>
                                      <input type="file" class="form-control-file" name="attachment" id="attachment">
                                    </div> --}}

                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="Tokyo" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead class="thead-dark">
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
                                                <td>{{$leave->start_date}}</td>
                                                <td>{{$leave->end_date}}</td>
                                                <td>
                                                    @php
                                                        $date1 = new DateTime($leave->start_date);
                                                        $date2 = new DateTime($leave->end_date);
                                                        $diff = $date2->diff($date1)->format("%a");
                                                    @endphp
                                                    {{ $diff }}
                                                </td>
                                                <td>{{$leave->reason}}</td>
                                                <td>{{$leave->status}}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->created_at}}</td>
                                                <td>

                                                    <a href="{{ route('leavedelete', $leave->id) }}"
                                                        class="btn btn-danger">Delete</a>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
