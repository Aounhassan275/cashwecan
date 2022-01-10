@extends('user.layout.index')

@section('title')

    
OVERALL EARNING REPORT

@endsection
@section('styles')
<script src="{{asset('user_asset/global_assets/js/demo_pages/picker_date.js')}}"></script>

@endsection


@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">Overall Earning Report</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('user.report.overall_earning') }}" method="get">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>
                                From
                                <input type="text" name="from" class="daterange-single form-control pull-right" style="height: 35px; "
                                    value="{{ request()->get('from',date('m/d/Y', strtotime(@$data['default_from'])))}}">
                            </label>   
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                To
                                <input type="text" name="to" class="daterange-single form-control pull-right" style="height: 35px; "
                                    value="{{ request()->get('to',date('m/d/Y', strtotime(@$data['default_to'])))}}">
                            </label>
            
                        </div>   
                        <div class="form-group col-md-4">
                            <label for="">&nbsp;</label>
                            <p style="margin-top: -5px; ">
                                <button type="submit" class="btn btn-success" >
                                Apply
                            </button>
                            </p>
            
                        </div>    
                    </div>
                </form>
                <div class="text-center chart-container table-responsive" style="position: relative; height:80vh; width:100%">
                    <canvas id="report"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
   
<script src="{{ url('chart/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById("report").getContext('2d');

    var colors = [
        '#FA00A7',
        '#52DDB0',
        '#F0FF1F',
        '#EB6D00',
        '#FF6384',
        '#FF9F40',
        '#FFCD56',
        '#B1169F',
        '#FEBBBA',
        '#BBC5BC',
        '#509C0C',
        '#573CC9',
        '#ED409C',
        '#BE5FCC',
        '#36A2EB',
        '#158003',
        '#22CECE',
        '#4D91C5',
        '#FFEE33',
        '#001CD1',
        '#E3C0E3',
        '#521D00',
        '#CD0422',
        '#CD0422',
        '#33C4D0',
        '#C20006',
        '#557F9B',
        '#00E632',
        '#C95CFF'
    ];
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        
        data: {
            labels: [{!! $data['labels'] !!}],
            datasets: [
                {
                    label: 'Total Earnings',
                    data: [{!! $data['packages'] !!}],
                    borderWidth: 1,
                    hoverBorderWidth: 60,
                    hoverBorderColor: colors,
                    backgroundColor: colors,
                    hoverBackgroundColor: colors
                }
            ]
        },
        options: {
            title:{
                display:true,
                text:"Overall Earning Report"
            },
            legend: {
                display: true,
                responsive: true,
                position: 'right',
                reverse: true,
                fullWidth: true,
                labels: {
                }
            },
            tooltips: {
                mode: 'point',
                intersect: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                }],
                yAxes: [{
                    display: true,
                    type: 'linear',
                    beginAtZero:true,
                    ticks: {
                        min: 0,
                    }
                }]
            },
            
            percentageInnerCutout : 90,
        }
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
