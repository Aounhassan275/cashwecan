@extends('user.layout.index')

@section('title')

    
DASHBOARD

@endsection
@section('styles')
<style>
    blink {
        animation: blinker 2s linear infinite;
    }
    @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
  </style>   
@endsection


@section('contents')


<div class="row">
    <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0">
                            <marquee class="blink">
                                @foreach (App\Models\Ticker::all() as $ticker)
                                        {!! $ticker->message !!} .
                                @endforeach
                            </marquee>
                        </h6>
                    </div>
                </div>
            </div>
            
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            {{-- <div class="text-center" style="padding: 10px"> --}}
                <canvas id="pie-chart"></canvas>
            {{-- </div> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="text-center" style="padding: 10px">
                <canvas id="withdraw-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Temp Income</h6>
                    <span class="text-muted">$ {{Auth::user()->total_income}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-coins icon-2x text-indigo-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <a href="#transfer_modal" data-toggle="modal" data-target="#transfer_modal">
            <div class="card card-body bg-teal-400 has-bg-image">
                <div class="media">
                    
                        <div class="mr-3 align-self-center">
                            <blink> <i class="icon-nbsp icon-3x opacity-75"></i></blink>
                        </div>

                        <div class="media-body">
                            <blink>
                                <h3 class="mb-0">$ {{Auth::user()->total_income}}</h3>
                                <span class="text-uppercase font-size-xs">Amount to Transfer</span>
                            </blink>
                        </div>
                    
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Cash Wallet</h6>
                    <span class="text-muted">$ {{Auth::user()->cash_wallet}}</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-2x text-danger-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-piggy-bank icon-2x text-blue-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Community Pool</h6>
                    <span class="text-muted">$ {{Auth::user()->community_pool}}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-cash3 icon-2x text-success-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Today Earning</h6>
                    <span class="text-muted">$ {{Auth::user()->todayEarning()}}</span>
                </div>
            </div>
        </div>
    </div> --}}
    
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->refer_by_name(Auth::user()->referral)}}</h3>
                    <span class="text-uppercase font-size-xs">Your Child</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->refer_by_name(Auth::user()->refer_by)}}</h3>
                    <span class="text-uppercase font-size-xs">Refer By</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-lan icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->placement()}}</h3>
                    <span class="text-uppercase font-size-xs">Your Placement</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-cart2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">$ {{Auth::user()->total_referrals()}}</h3>
                    <span class="text-uppercase font-size-xs">Referral Packages</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-violet-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->associatedUsers()->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Total Associated User</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-orange-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->associatedUsersIncome()}}</h3>
                    <span class="text-uppercase font-size-xs">Associated Cash Wallet</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-brown-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->associatedIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Associated Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cash3 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-pink-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->associatedUsersPackages()}}</h3>
                    <span class="text-uppercase font-size-xs">Accoiated Package Price</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        $ {{Auth::user()->package->price + Auth::user()->investment_amount}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Price</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-enter6 icon-3x text-indigo-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->package->name}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Name</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->a_date->format('d M,Y')}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Date</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-calendar52 icon-3x text-blue-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">{{Auth::user()->packagehistory()->count()}}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Purchased Package</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bag icon-3x text-danger-400"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="transfer_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="tansferForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title mt-0" id="myModalLabel">Transfer Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">For Cash Wallet</label>
                        <input class="form-control" type="number" readonly name="cash_wallet" value="{{Auth::user()->total_income/2}}">
                    </div>
                    <div class="form-group">
                        <label for="title">For Community Pool</label>
                        <input class="form-control" type="number" readonly name="community_pool" value="{{Auth::user()->total_income/2}}">
                    </div>
                    <p id="errors" style="color:red;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ url('chart/Chart.min.js') }}"></script>
    <script>

        new Chart(document.getElementById("pie-chart"), {

            type: 'pie',

            data: {

                labels: [
                    "Direct({{Auth::user()->directIncome->sum('price')}})", 
                    "Direct Team({{Auth::user()->directTeamIncome->sum('price')}})", 
                    "Upline({{Auth::user()->uplineIncome->sum('price')}})", 
                    "Downline({{Auth::user()->downlineIncome->sum('price')}})", 
                    "Upline Placement({{Auth::user()->uplinePlacementIncome->sum('price')}})", 
                    "Downline Placement({{Auth::user()->downlinePlacementIncome->sum('price')}})",
                    "Trade({{Auth::user()->tradeIncome->sum('price')}})",
                    "Ranking({{Auth::user()->rankingIncome->sum('price')}})",
                    "Associated({{Auth::user()->associatedIncome->sum('price')}})"
                    ],
                datasets: [{

                    label: "Earning",
                    backgroundColor: ["#990099","#109618","#ff9900", "#dc3912", "#3366cc","#33C4FF","#0C3343","#EC7063","#49BA98"],

                    data: [
                        '{{Auth::user()->directIncome->sum('price')}}',
                        '{{Auth::user()->directTeamIncome->sum('price')}}',
                        '{{Auth::user()->uplineIncome->sum('price')}}',
                        '{{Auth::user()->downlineIncome->sum('price')}}',
                        '{{Auth::user()->uplinePlacementIncome->sum('price')}}',
                        '{{Auth::user()->downlinePlacementIncome->sum('price')}}',
                        '{{Auth::user()->tradeIncome->sum('price')}}',
                        '{{Auth::user()->rankingIncome->sum('price')}}',
                        '{{Auth::user()->associatedIncome->sum('price')}}'
                    ],

                }]
            },

            options: {

                title: {

                    display: true,

                    text: 'Total Income'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
    <script>

        new Chart(document.getElementById("withdraw-chart"), {

            type: 'pie',

            data: {

                labels: ["Total Withdraw", "Withdraw Completed", "Withdraw Onhold", "Withdraw In Process", "Withdraw Rejected"],

                datasets: [{

                    label: "Packages",

                    backgroundColor: ["#ABB2B9","#7FB3D5","#C39BD3", "#EC7063", "#3366cc","#33C4FF","#0C3343"],

                    data: [
                        '{{Auth::user()->totalWithdraw()}}',
                        '{{Auth::user()->completedWithdraw()}}',
                        '{{Auth::user()->onHoldWithdraw()}}',
                        '{{Auth::user()->inProcessWithdraw()}}',
                        '{{Auth::user()->rejectedWithdraw()}}'
                    ],

                }]
            },

            options: {

                title: {

                    display: true,

                    text: 'Withdraw'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
    <script>
        $(document).on('submit', '#tansferForm', function (event) {
            $('#errors').html("Please Wait!!");
            $('.btn').attr("disabled",true);
            event.preventDefault();
            $.ajax({
                url: '{{url("user/transfer_funds")}}',
                type: 'POST',
                data: $('#tansferForm').serialize(),
            })
                .done(function (response) {
                    $('.btn').attr("disabled",false);
                    if(response.status == true)
                    {
                        setTimeout(function() {
                            $('#errors').html(response.message);
                            $('#transfer_modal').modal("hide");
                        }, 3000);
                        location.reload();
                    }else{
                        $('#errors').html(response.message);
                    }
                })
                .fail(function (response) {
                })
                .always(function () {
                    console.log("complete");
                });
        });
    </script>
@endsection
