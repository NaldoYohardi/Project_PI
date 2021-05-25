@extends('layouts.app')

@section('title', 'Home')
@section('MainTitle', 'Home')

@section('content_data')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<ul class="breadcrumb">
  <li>Dashboard</li>
</ul>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sessions by channel</h4>
          <div class="aligner-wrapper">
            <canvas id="sessionsDoughnutChart" height="210"></canvas>
            <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
              <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
              <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
            </div>
          </div>
          <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
            <div class="d-flex">
              <span class="square-indicator bg-danger ml-2"></span>
              <p class="mb-0 ml-2">Assigned</p>
            </div>
            <div class="d-flex">
              <span class="square-indicator bg-success ml-2"></span>
              <p class="mb-0 ml-2">Not Assigned</p>
            </div>
            <div class="d-flex">
              <span class="square-indicator bg-warning ml-2"></span>
              <p class="mb-0 ml-2">Reassigned</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body performane-indicator-card">
          <div class="d-sm-flex">
            <h4 class="card-title flex-shrink-1">Performance Indicator</h4>
            <p class="m-sm-0 ml-sm-auto flex-shrink-0">
              <span class="data-time-range ml-0">7d</span>
              <span class="data-time-range active">2w</span>
              <span class="data-time-range">1m</span>
              <span class="data-time-range">3m</span>
              <span class="data-time-range">6m</span>
            </p>
          </div>
          <div class="d-sm-flex flex-wrap">
            <div class="d-flex align-items-center">
              <span class="dot-indicator bg-primary ml-2"></span>
              <p class="mb-0 ml-2 text-muted font-weight-semibold">Complaints (2098)</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="dot-indicator bg-info ml-2"></span>
              <p class="mb-0 ml-2 text-muted font-weight-semibold"> Task Done (1123)</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="dot-indicator bg-danger ml-2"></span>
              <p class="mb-0 ml-2 text-muted font-weight-semibold">Attends (876)</p>
            </div>
          </div>
          <div id="performance-indicator-chart" class="ct-chart mt-4"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Products Inventory</h4>
            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table">
              <thead>
                <tr>
                  <th class="font-weight-bold">Store ID</th>
                  <th class="font-weight-bold">Amount</th>
                  <th class="font-weight-bold">Gateway</th>
                  <th class="font-weight-bold">Created at</th>
                  <th class="font-weight-bold">Paid at</th>
                  <th class="font-weight-bold">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face1.jpg" alt="profile image"> Katie Holmes
                  </td>
                  <td>$3621</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>04 Jun 2019</td>
                  <td>18 Jul 2019</td>
                  <td>
                    <div class="badge badge-success p-2">Paid</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face2.jpg" alt="profile image"> Minnie Copeland
                  </td>
                  <td>$6245</td>
                  <td><img src="images/dashboard/paypal.png" alt="alipay" class="gateway-icon mr-2"> Paypal</td>
                  <td>25 Sep 2019</td>
                  <td>07 Oct 2019</td>
                  <td>
                    <div class="badge badge-danger p-2">Pending</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face3.jpg" alt="profile image"> Rodney Sims
                  </td>
                  <td>$9265</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>12 dec 2019</td>
                  <td>26 Aug 2019</td>
                  <td>
                    <div class="badge badge-warning p-2">Failed</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face4.jpg" alt="profile image"> Carolyn Barker
                  </td>
                  <td>$2263</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>30 Sep 2019</td>
                  <td>20 Oct 2019</td>
                  <td>
                    <div class="badge badge-success p-2">Paid</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex mt-4 flex-wrap">
            <p class="text-muted">Showing 1 to 10 of 57 entries</p>
            <nav class="ml-auto">
              <ul class="pagination separated pagination-info">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
