@extends('layouts.app')

@section('title', 'Home')
@section('MainTitle', 'Home')

@section('content')
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

@section('content_data')
<div class="row">
  <div class="col-lg col-md col-sm">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_copy</i>
        </div>
        <p class="card-category">Used Space</p>
        <h3 class="card-title">49/50
          <small>GB</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i>
          <a href="javascript:;">Get More Space...</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-success">
        <div class="ct-chart" id="dailySalesChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="80.76190185546875" x2="80.76190185546875" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="121.5238037109375" x2="121.5238037109375" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="162.28570556640625" x2="162.28570556640625" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="203.047607421875" x2="203.047607421875" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="243.80950927734375" x2="243.80950927734375" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="284.5714111328125" x2="284.5714111328125" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M40,91.2C80.762,79.2,80.762,79.2,80.762,79.2C121.524,103.2,121.524,103.2,121.524,103.2C162.286,79.2,162.286,79.2,162.286,79.2C203.048,64.8,203.048,64.8,203.048,64.8C243.81,76.8,243.81,76.8,243.81,76.8C284.571,28.8,284.571,28.8,284.571,28.8" class="ct-line"></path><line x1="40" y1="91.2" x2="40.01" y2="91.2" class="ct-point" ct:value="12" opacity="1"></line><line x1="80.76190185546875" y1="79.2" x2="80.77190185546876" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="121.5238037109375" y1="103.2" x2="121.5338037109375" y2="103.2" class="ct-point" ct:value="7" opacity="1"></line><line x1="162.28570556640625" y1="79.2" x2="162.29570556640624" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="203.047607421875" y1="64.8" x2="203.057607421875" y2="64.8" class="ct-point" ct:value="23" opacity="1"></line><line x1="243.80950927734375" y1="76.8" x2="243.81950927734374" y2="76.8" class="ct-point" ct:value="18" opacity="1"></line><line x1="284.5714111328125" y1="28.799999999999997" x2="284.5814111328125" y2="28.799999999999997" class="ct-point" ct:value="38" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="80.76190185546875" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="121.5238037109375" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">W</span></foreignObject><foreignObject style="overflow: visible;" x="162.28570556640625" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="203.047607421875" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="243.80950927734375" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="284.5714111328125" y="125" width="40.76190185546875" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 41px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">10</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">20</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">30</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">40</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">50</span></foreignObject></g></svg></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Daily Sales</h4>
        <p class="card-category">
          <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> updated 4 minutes ago
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-warning">
        <div class="ct-chart" id="websiteViewsChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="120" y2="120" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="320.3333435058594" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="51.680555979410805" x2="51.680555979410805" y1="120" y2="54.959999999999994" class="ct-bar" ct:value="542" opacity="1"></line><line x1="75.04166793823242" x2="75.04166793823242" y1="120" y2="66.84" class="ct-bar" ct:value="443" opacity="1"></line><line x1="98.40277989705403" x2="98.40277989705403" y1="120" y2="81.6" class="ct-bar" ct:value="320" opacity="1"></line><line x1="121.76389185587566" x2="121.76389185587566" y1="120" y2="26.400000000000006" class="ct-bar" ct:value="780" opacity="1"></line><line x1="145.12500381469724" x2="145.12500381469724" y1="120" y2="53.64" class="ct-bar" ct:value="553" opacity="1"></line><line x1="168.48611577351886" x2="168.48611577351886" y1="120" y2="65.64" class="ct-bar" ct:value="453" opacity="1"></line><line x1="191.84722773234049" x2="191.84722773234049" y1="120" y2="80.88" class="ct-bar" ct:value="326" opacity="1"></line><line x1="215.20833969116208" x2="215.20833969116208" y1="120" y2="67.92" class="ct-bar" ct:value="434" opacity="1"></line><line x1="238.5694516499837" x2="238.5694516499837" y1="120" y2="51.84" class="ct-bar" ct:value="568" opacity="1"></line><line x1="261.93056360880536" x2="261.93056360880536" y1="120" y2="46.8" class="ct-bar" ct:value="610" opacity="1"></line><line x1="285.29167556762695" x2="285.29167556762695" y1="120" y2="29.28" class="ct-bar" ct:value="756" opacity="1"></line><line x1="308.65278752644855" x2="308.65278752644855" y1="120" y2="12.599999999999994" class="ct-bar" ct:value="895" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="23.361111958821613" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="63.36111195882161" y="125" width="23.361111958821613" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="86.72222391764322" y="125" width="23.361111958821617" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="110.08333587646484" y="125" width="23.36111195882161" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="133.44444783528644" y="125" width="23.36111195882161" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="156.80555979410806" y="125" width="23.361111958821624" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="180.1666717529297" y="125" width="23.361111958821596" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="203.52778371175128" y="125" width="23.361111958821624" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="226.8888956705729" y="125" width="23.361111958821624" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="250.25000762939453" y="125" width="23.361111958821596" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">O</span></foreignObject><foreignObject style="overflow: visible;" x="273.6111195882161" y="125" width="23.361111958821596" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">N</span></foreignObject><foreignObject style="overflow: visible;" x="296.9722315470377" y="125" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">D</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">200</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">400</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">600</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">800</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000</span></foreignObject></g></svg></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Email Subscriptions</h4>
        <p class="card-category">Last Campaign Performance</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-danger">
        <div class="ct-chart" id="completedTasksChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="75.66666412353516" x2="75.66666412353516" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="111.33332824707031" x2="111.33332824707031" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="146.99999237060547" x2="146.99999237060547" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="182.66665649414062" x2="182.66665649414062" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="218.33332061767578" x2="218.33332061767578" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="253.99998474121094" x2="253.99998474121094" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="289.6666488647461" x2="289.6666488647461" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="325.33331298828125" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M40,92.4C75.667,30,75.667,30,75.667,30C111.333,66,111.333,66,111.333,66C147,84,147,84,147,84C182.667,86.4,182.667,86.4,182.667,86.4C218.333,91.2,218.333,91.2,218.333,91.2C254,96,254,96,254,96C289.667,97.2,289.667,97.2,289.667,97.2" class="ct-line"></path><line x1="40" y1="92.4" x2="40.01" y2="92.4" class="ct-point" ct:value="230" opacity="1"></line><line x1="75.66666412353516" y1="30" x2="75.67666412353516" y2="30" class="ct-point" ct:value="750" opacity="1"></line><line x1="111.33332824707031" y1="66" x2="111.34332824707032" y2="66" class="ct-point" ct:value="450" opacity="1"></line><line x1="146.99999237060547" y1="84" x2="147.00999237060546" y2="84" class="ct-point" ct:value="300" opacity="1"></line><line x1="182.66665649414062" y1="86.4" x2="182.67665649414062" y2="86.4" class="ct-point" ct:value="280" opacity="1"></line><line x1="218.33332061767578" y1="91.2" x2="218.34332061767577" y2="91.2" class="ct-point" ct:value="240" opacity="1"></line><line x1="253.99998474121094" y1="96" x2="254.00998474121093" y2="96" class="ct-point" ct:value="200" opacity="1"></line><line x1="289.6666488647461" y1="97.2" x2="289.6766488647461" y2="97.2" class="ct-point" ct:value="190" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">12p</span></foreignObject><foreignObject style="overflow: visible;" x="75.66666412353516" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">3p</span></foreignObject><foreignObject style="overflow: visible;" x="111.33332824707031" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">6p</span></foreignObject><foreignObject style="overflow: visible;" x="146.99999237060547" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">9p</span></foreignObject><foreignObject style="overflow: visible;" x="182.66665649414062" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">12p</span></foreignObject><foreignObject style="overflow: visible;" x="218.33332061767578" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">3a</span></foreignObject><foreignObject style="overflow: visible;" x="253.99998474121094" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">6a</span></foreignObject><foreignObject style="overflow: visible;" x="289.6666488647461" y="125" width="35.666664123535156" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">9a</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">200</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">400</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">600</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">800</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000</span></foreignObject></g></svg></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Completed Tasks</h4>
        <p class="card-category">Last Campaign Performance</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <span class="nav-tabs-title">Tasks:</span>
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#profile" data-toggle="tab">
                  <i class="material-icons">bug_report</i> Bugs
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#messages" data-toggle="tab">
                  <i class="material-icons">code</i> Website
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#settings" data-toggle="tab">
                  <i class="material-icons">cloud</i> Server
                  <div class="ripple-container"></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="profile">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Sign contract for "What are conference organizers afraid of?"</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                  </td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Create 4 Invisible User Experiences you Never Knew About</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="messages">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                  </td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Sign contract for "What are conference organizers afraid of?"</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="settings">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                  </td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>
                  <td>Sign contract for "What are conference organizers afraid of?"</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Employees Stats</h4>
        <p class="card-category">New employees on 15th September, 2016</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <tr><th>ID</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Country</th>
          </tr></thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Dakota Rice</td>
              <td>$36,738</td>
              <td>Niger</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Minerva Hooper</td>
              <td>$23,789</td>
              <td>Curaçao</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Sage Rodriguez</td>
              <td>$56,142</td>
              <td>Netherlands</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Philip Chaney</td>
              <td>$38,735</td>
              <td>Korea, South</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<footer class="footer">
<div class="container-fluid">
<nav class="float-left">
  <ul>
    <li>
      <a href="https://www.creative-tim.com">
        Creative Tim
      </a>
    </li>
    <li>
      <a href="https://creative-tim.com/presentation">
        About Us
      </a>
    </li>
    <li>
      <a href="http://blog.creative-tim.com">
        Blog
      </a>
    </li>
    <li>
      <a href="https://www.creative-tim.com/license">
        Licenses
      </a>
    </li>
  </ul>
</nav>
<div class="copyright float-right">
  ©
  <script>
    document.write(new Date().getFullYear())
  </script>2021, made with <i class="material-icons">favorite</i> by
  <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
</div>
</div>
</footer>
<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
</div>
<div class="fixed-plugin">
<div class="dropdown show-dropdown open">
<a href="#" data-toggle="dropdown">
<i class="fa fa-cog fa-2x"> </i>
</a>
<ul class="dropdown-menu">
<li class="header-title"> Sidebar Filters</li>
<li class="adjustments-line">
<a href="javascript:void(0)" class="switch-trigger active-color">
  <div class="badge-colors ml-auto mr-auto">
    <span class="badge filter badge-purple" data-color="purple"></span>
    <span class="badge filter badge-azure" data-color="azure"></span>
    <span class="badge filter badge-green" data-color="green"></span>
    <span class="badge filter badge-warning" data-color="orange"></span>
    <span class="badge filter badge-danger" data-color="danger"></span>
    <span class="badge filter badge-rose active" data-color="rose"></span>
  </div>
  <div class="clearfix"></div>
</a>
</li>
<li class="header-title">Images</li>
<li class="active">
<a class="img-holder switch-trigger" href="javascript:void(0)">
  <img src="../assets/img/sidebar-1.jpg" alt="">
</a>
</li>
<li>
<a class="img-holder switch-trigger" href="javascript:void(0)">
  <img src="../assets/img/sidebar-2.jpg" alt="">
</a>
</li>
<li>
<a class="img-holder switch-trigger" href="javascript:void(0)">
  <img src="../assets/img/sidebar-3.jpg" alt="">
</a>
</li>
<li>
<a class="img-holder switch-trigger" href="javascript:void(0)">
  <img src="../assets/img/sidebar-4.jpg" alt="">
</a>
</li>
<li class="button-container">
<a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
</li>
<!-- <li class="header-title">Want more components?</li>
  <li class="button-container">
      <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
        Get the pro version
      </a>
  </li> -->
<li class="button-container">
<a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
  View Documentation
</a>
</li>
<li class="button-container github-star">
<span></span>
</li>
<li class="header-title">Thank you for 95 shares!</li>
<li class="button-container text-center">
<button id="twitter" class="btn btn-round btn-twitter sharrre"><i class="fa fa-twitter"></i> · 45</button>
<button id="facebook" class="btn btn-round btn-facebook sharrre"><i class="fa fa-facebook-f"></i> · 50</button>
<br>
<br>
</li>
</ul>
</div>
</div>
@endsection
