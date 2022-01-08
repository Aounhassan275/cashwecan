@extends('user.layout.index')
@section('title')
VIEW UPLINE INCOME 
@endsection
@section('styles')
<script src="{{asset('user_asset/global_assets/js/demo_pages/picker_date.js')}}"></script>
@endsection
@section('contents')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Upline Income History</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>Due To</th>
                <th>Created At</th>
                <th>Amount</th>

            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->uplineIncome as $key => $income)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$income->user->refer_by_name($income->due_to)}}</td>
                    <td>{{$income->created_at->format('d M,Y')}}</td>
                    <td>$ {{$income->price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center">Total Income : </td>
                    <td>$ {{Auth::user()->uplineIncome->sum('price')}}</td>
                </tr>
        </tbody>
    </table>
</div>
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
 
            <div class="card-body">
                <form action="{{ route('user.earning.upline_income') }}" method="get">
                    <div class="row">
                        <div class="form-group col-4">
                            <label>
                                From
                                <input type="text" name="from" class="daterange-single form-control pull-right" style="height: 35px; "
                                       value="{{ request()->get('from',date('m/d/Y', strtotime(@$data['default_from'])))}}">
                            </label>   
                        </div>
                        <div class="form-group col-4">
                            <label>
                                To
                                <input type="text" name="to" class="daterange-single form-control pull-right" style="height: 35px; "
                                       value="{{ request()->get('to',date('m/d/Y', strtotime(@$data['default_to'])))}}">
                            </label>
              
                        </div>   
                        <div class="form-group col-4">
                            <label for="">&nbsp;</label>
                            <p style="margin-top: -5px; ">
                                <button type="submit" class="btn btn-success" >
                                Apply
                            </button>
                            </p>
              
                        </div>    
                    </div>
                </form>
                <div class="table-responsive" style="position: relative; height:50vh; width:75vw">
                    <canvas id="report"></canvas>
                </div>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ url('chart/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById("report").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [{!! @$data['labels'] !!}],
            datasets: [
                {
                    label: 'Revenue in USD',
                    data: [{!! @$data['payments'] !!}],
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 30, 20, 1)',
                }
            ]
        },
        options: {
            title:{
                display:true,
                text:"Daily Upline Income Report"
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            maintainAspectRatio: false,

            scales: {
                xAxes: [{
                }],
                yAxes: [{
                    display: true,
                    type: 'linear',
                    beginAtZero:true,
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });
    $(function() {
        $('.dates').datepicker({
            changeYear: true,
            changeMonth: true,
            showButtonPanel: true,
            dateFormat: 'm/d/Y',
            autoclose: true,
        });
    });
    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
@endsection