@extends('layouts.master')
@section('content')
    <div class="row clearfix row-deck">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card top_widget">
                <div class="body">
                    <div class="icon"><i class="fa fa-flag"></i> </div>
                    <div class="content">
                        <div class="text mb-2 text-uppercase">User</div>
                        <h4 class="number mb-0">{{ $user }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card top_widget">
                <div class="body">
                    <div class="icon"><i class="fa fa-users"></i> </div>
                    <div class="content">
                        <div class="text mb-2 text-uppercase">Sales</div>
                        <h4 class="number mb-0">{{ $sales }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card top_widget">
                <div class="body">
                    <div class="icon"><i class="fa fa-user"></i> </div>
                    <div class="content">
                        <div class="text mb-2 text-uppercase">Transaction</div>
                        <h4 class="number mb-0">{{ $transaction }}</h4>
                        <small class="text-muted">Analytics for last Month</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card top_widget">
                <div class="body">
                    <div class="icon"><i class="fa fa-thumbs-up"></i> </div>
                    <div class="content">
                        <div class="text mb-2 text-uppercase">revenue</div>
                        <h4 class="number mb-0">{{ $revenue }} </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
