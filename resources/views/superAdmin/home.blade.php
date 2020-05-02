




@extends('superadmin.base')



@section('content')






<div class="ms-content-wrapper">
  <div class="row">

    <script type="text/javascript" > 
      setTimeout(function() {
   $('#successalert').fadeOut('fast');
 }, 20000); // <-- time in milliseconds
 </script>


    
    @if (session('success'))
    <div class="x_content bs-example-popovers" id="successalert" >
      <div class="alert alert-success" role="alert" >
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>well done!</strong> {{ session('success') }}
        </div>
      </div>

    
      @endif

    <div class="col-md-12">
      <h1 class="db-header-title">Welcome, Anny</h1>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 3.2%</span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Sells Graph</strong></span>
            <h2>$8,451</h2>
          </div>
        </div>
        <canvas id="line-chart"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-red"><i class="material-icons">arrow_downward</i> 4.5%</span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Total Visitors</strong></span>
            <h2>3,973</h2>
          </div>
        </div>
        <canvas id="line-chart-2"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 12.5%</span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>New Users</strong></span>
            <h2>7,333</h2>
          </div>
        </div>
        <canvas id="line-chart-3"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> 9.5%</span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Total Orders</strong></span>
            <h2>48,973</h2>
          </div>
        </div>
        <canvas id="line-chart-4"></canvas>
      </div>
    </div>
    <!-- Recent Orders Requested -->
    <div class="col-xl-6 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <div class="d-flex justify-content-between">
            <div class="align-self-center align-left">
              <h6>Recent Orders Requested</h6>
            </div>
            <button type="button" class="btn btn-primary">View All</button>
          </div>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Food Item</th>
                  <th scope="col">Price</th>
                  <th scope="col">Product ID</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/pizza.jpg') }}" alt="people"> Pizza </td>
                  <td>$19.99</td>
                  <td>67384917</td>
                </tr>
                <tr>
                  <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/french-fries.jpg') }}" alt="people"> French Fries </td>
                  <td>$14.59</td>
                  <td>789393819</td>
                </tr>
                <tr>
                  <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/cereals.jpg') }}" alt="people"> Multigrain Hot Cereal </td>
                  <td>$25.22</td>
                  <td>137893137</td>
                </tr>
                <tr>
                  <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/egg-sandwich.jpg') }}" alt="people"> Fried Egg Sandwich </td>
                  <td>$11.23</td>
                  <td>235193138</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header new">
          <h6>Monthly Revenue</h6>
          <select class="form-control new" id="exampleSelect">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March </option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="1">June</option>
            <option value="2">July</option>
            <option value="3">August</option>
            <option value="4">September</option>
            <option value="5">October</option>
            <option value="4">November</option>
            <option value="5">December</option>
          </select>
        </div>
        <div class="ms-panel-body">
          <span class="progress-label"> <strong>Week 1</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>
          <span class="progress-label"> <strong>Week 2</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
          </div>
          <span class="progress-label"> <strong>Week 3</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
          </div>
          <span class="progress-label"> <strong>Week 4</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Food Orders -->
    <div class="col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Trending Orders</h6>
        </div>
        <div class="ms-panel-body">
          <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="{{  asset ('styleRestoIT/assets/img/costic/food-5.jpg') }}" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Meat Stew</h6>
                    <span class="green-text"><strong>$25.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">15</span></p>
                    <p>Income <span class="red-text">$175</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="{{  asset ('styleRestoIT/assets/img/costic/food-2.jpg') }}" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Pancake</h6>
                    <span class="green-text"><strong>$50.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">75</span></p>
                    <p>Income <span class="red-text">$275</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="{{  asset ('styleRestoIT/assets/img/costic/food-4.jpg') }}" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Burger</h6>
                    <span class="green-text"><strong>$45.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">85</span></p>
                    <p>Income <span class="red-text">$575</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="{{  asset ('styleRestoIT/assets/img/costic/food-3.jpg') }}" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Saled</h6>
                    <span class="green-text"><strong>$85.00</strong></span>
                  </div>
                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">175</span></p>
                    <p>Income <span class="red-text">$775</span></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- END/Food Orders -->
    <!-- Recent Orders Requested -->
    <div class="col-xl-7 col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header">
          <div class="d-flex justify-content-between">
            <div class="ms-header-text">
              <h6>Order Timing Chart</h6>
            </div>
          </div>

        </div>
        <div class="ms-panel-body pt-0">
          <div class="d-flex justify-content-between ms-graph-meta">
            <ul class="ms-list-flex mt-3 mb-5">
              <li>
                <span>Total Orders</span>
                <h3 class="ms-count">703,49</h3>
              </li>
              <li>
                <span>New Orders</span>
                <h3 class="ms-count">95,038</h3>
              </li>
              <li>
                <span>Repeat Orders</span>
                <h3 class="ms-count">28,387</h3>
              </li>
              <li>
                <span>Cancel Orders</span>
                <h3 class="ms-count">260</h3>
              </li>
            </ul>
          </div>
          <canvas id="youtube-subscribers"></canvas>
        </div>
      </div>
    </div>

    <!-- Favourite Products -->
    <div class="col-xl-5 col-md-12">
      <div class="ms-panel ms-widget ms-crypto-widget">
        <div class="ms-panel-header">
          <h6>Favourite charts</h6>
        </div>
        <div class="ms-panel-body p-0">
          <ul class="nav nav-tabs nav-justified has-gap px-4 pt-4" role="tablist">
            <li role="presentation" class="fs-12"><a href="#btc" aria-controls="btc" class="active show" role="tab" data-toggle="tab"> Mon </a></li>
            <li role="presentation" class="fs-12"><a href="#xrp" aria-controls="xrp" role="tab" data-toggle="tab"> Tue </a></li>
            <li role="presentation" class="fs-12"><a href="#ltc" aria-controls="ltc" role="tab" data-toggle="tab"> Wed </a></li>
            <li role="presentation" class="fs-12"><a href="#eth" aria-controls="eth" role="tab" data-toggle="tab"> Thu </a></li>
            <li role="presentation" class="fs-12"><a href="#zec" aria-controls="zec" role="tab" data-toggle="tab"> Fri </a></li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active show fade in" id="btc">
              <div class="table-responsive">
                <table class="table table-hover thead-light">
                  <thead>
                    <tr>
                      <th scope="col">Restaurant Names</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Orders</th>
                      <th scope="col">Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hunger House</td>
                      <td>8528</td>
                      <td class="ms-text-success">+17.24%</td>
                      <td>7.65%</td>
                    </tr>
                    <tr>
                      <td>Food Lounge</td>
                      <td>4867</td>
                      <td class="ms-text-danger">-12.24%</td>
                      <td>9.12%</td>
                    </tr>
                    <tr>
                      <td>Delizious</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                    <tr>
                      <td>Netherfood</td>
                      <td>1614</td>
                      <td class="ms-text-danger">-20.75%</td>
                      <td>12.25%</td>
                    </tr>
                    <tr>
                      <td>Rusmiz</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="xrp">
              <div class="table-responsive">
                <table class="table table-hover thead-light">
                  <thead>
                    <tr>
                      <th scope="col">Restaurant Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Orders</th>
                      <th scope="col">Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hunger House</td>
                      <td>8528</td>
                      <td class="ms-text-success">+17.24%</td>
                      <td>7.65%</td>
                    </tr>
                    <tr>
                      <td>Food Lounge</td>
                      <td>4867</td>
                      <td class="ms-text-danger">-12.24%</td>
                      <td>9.12%</td>
                    </tr>
                    <tr>
                      <td>Delizious</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                    <tr>
                      <td>Netherfood</td>
                      <td>1614</td>
                      <td class="ms-text-danger">-20.75%</td>
                      <td>12.25%</td>
                    </tr>
                    <tr>
                      <td>Rusmiz</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="ltc">
              <div class="table-responsive">
                <table class="table table-hover thead-light">
                  <thead>
                    <tr>
                      <th scope="col">Restaurant Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Orders</th>
                      <th scope="col">Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hunger House</td>
                      <td>8528</td>
                      <td class="ms-text-success">+17.24%</td>
                      <td>7.65%</td>
                    </tr>
                    <tr>
                      <td>Food Lounge</td>
                      <td>4867</td>
                      <td class="ms-text-danger">-12.24%</td>
                      <td>9.12%</td>
                    </tr>
                    <tr>
                      <td>Delizious</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                    <tr>
                      <td>Netherfood</td>
                      <td>1614</td>
                      <td class="ms-text-danger">-20.75%</td>
                      <td>12.25%</td>
                    </tr>
                    <tr>
                      <td>Rusmiz</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="eth">
              <div class="table-responsive">
                <table class="table table-hover thead-light">
                  <thead>
                    <tr>
                      <th scope="col">Restaurant Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Orders</th>
                      <th scope="col">Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hunger House</td>
                      <td>8528</td>
                      <td class="ms-text-success">+17.24%</td>
                      <td>7.65%</td>
                    </tr>
                    <tr>
                      <td>Food Lounge</td>
                      <td>4867</td>
                      <td class="ms-text-danger">-12.24%</td>
                      <td>9.12%</td>
                    </tr>
                    <tr>
                      <td>Delizious</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                    <tr>
                      <td>Netherfood</td>
                      <td>1614</td>
                      <td class="ms-text-danger">-20.75%</td>
                      <td>12.25%</td>
                    </tr>
                    <tr>
                      <td>Rusmiz</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="zec">
              <div class="table-responsive">
                <table class="table table-hover thead-light">
                  <thead>
                    <tr>
                      <th scope="col">Restaurant Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Orders</th>
                      <th scope="col">Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hunger House</td>
                      <td>8528</td>
                      <td class="ms-text-success">+17.24%</td>
                      <td>7.65%</td>
                    </tr>
                    <tr>
                      <td>Food Lounge</td>
                      <td>4867</td>
                      <td class="ms-text-danger">-12.24%</td>
                      <td>9.12%</td>
                    </tr>
                    <tr>
                      <td>Delizious</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                    <tr>
                      <td>Netherfood</td>
                      <td>1614</td>
                      <td class="ms-text-danger">-20.75%</td>
                      <td>12.25%</td>
                    </tr>
                    <tr>
                      <td>Rusmiz</td>
                      <td>7538</td>
                      <td class="ms-text-success">+32.04%</td>
                      <td>14.29%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Favourite Products -->
      <!-- Total Earnings -->
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Total Earnings</h6>
        </div>
        <div class="ms-panel-body p-0">
          <div class="ms-quick-stats">
            <div class="ms-stats-grid">
              <i class="fa fa-star"></i>
              <p class="ms-text-dark">$8,033</p>
              <span>Today</span>
            </div>
            <div class="ms-stats-grid">
              <i class="fa fa-university"></i>
              <p class="ms-text-dark">$3,039</p>
              <span>Yesterday</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Earnings -->















































    









<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




<style>
  .highcharts-figure, .highcharts-data-table table {
min-width: 360px; 
max-width: 800px;
margin: 1em auto;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #EBEBEB;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}
.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}
.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}
.highcharts-data-table tr:hover {
background: #f1f7ff;
}

</style>
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header header-mini">
        <div class="d-flex justify-content-between">
          <div>
            <h6>Project Sales</h6>
            <p>Monitor how much sales your product does</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Basic line chart showing trends in a dataset. This chart includes the
                <code>series-label</code> module, which adds a label to each line for
                enhanced readability.
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container', {

title: {
text: 'Revenu of all your restaurant, 2020'
},

subtitle: {
text: 'Source: thesolarfoundation.com'
},

yAxis: {
title: {
  text: 'Number of Employees'
}
},

xAxis: {
  categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
   
},

legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'middle'
},

plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },

series: [

  @foreach ($charts as $chart)
  {
name: '{{ $chart[0] }}',
data: [  {{ $chart[1][0] }}, {{ $chart[1][1] }}, {{ $chart[1][2] }}, {{ $chart[1][3] }}, {{ $chart[1][4] }}, {{ $chart[1][5] }}, {{ $chart[1][6] }}, {{ $chart[1][7] }}, {{ $chart[1][8] }}, {{ $chart[1][9] }}, {{ $chart[1][10] }}, {{ $chart[1][11] }},]
}, 
  @endforeach
/* {
name: 'Installation',
data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175,1236,5465,5465,54654]
}, 
{
name: 'Manufacturing',
data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434,1236,5465,5465,54654]
}, 
{
name: 'Sales & Distribution',
data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387,1236,5465,5465,54654]
},
{
name: 'Project Development',
data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227,1236,5465,5465,54654]
},
{
name: 'Other',
data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111,1236,5465,5465,54654]
}, */


],

responsive: {
rules: [{
  condition: {
      maxWidth: 500
  },
  chartOptions: {
      legend: {
          layout: 'horizontal',
          align: 'center',
          verticalAlign: 'bottom'
      }
  }
}]
}

});
        </script>
        



      </div>
      <div class="ms-panel-body">
        <canvas id="pm-chart"></canvas>
      </div>
    </div>
  </div>



<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  






































































    <!-- Recent Placed Orders< -->
    <div class="col-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Recently Placed Orders</h6>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table class="table table-hover thead-primary">
              <thead>
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Order Name</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Location</th>
                  <th scope="col">Order Status</th>
                  <th scope="col">Delivered Time</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>French Fries</td>
                  <td>Jhon Leo</td>
                  <td>New Town</td>
                  <td><span class="badge badge-primary">Pending</span>
                  </td>
                  <td>10:05</td>
                  <td>$10</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Mango Pie</td>
                  <td>Kristien</td>
                  <td>Old Town</td>
                  <td><span class="badge badge-dark">Cancelled</span>
                  </td>
                  <td>14:05</td>
                  <td>$9</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>FrieD Egg Sandwich</td>
                  <td>Jack Suit</td>
                  <td>Oxford Street</td>
                  <td><span class="badge badge-success">Delivered</span>
                  </td>
                  <td>12:05</td>
                  <td>$19</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Lemon Yogurt Parfait</td>
                  <td>Alesdro Guitto</td>
                  <td>Church hill</td>
                  <td><span class="badge badge-success">Delivered</span>
                  </td>
                  <td>12:05</td>
                  <td>$18</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Spicy Grill Sandwich</td>
                  <td>Jacob Sahwny</td>
                  <td>palace Road</td>
                  <td><span class="badge badge-success">Delivered</span>
                  </td>
                  <td>12:05</td>
                  <td>$21</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Chicken Sandwich</td>
                  <td>Peter Gill</td>
                  <td>Street 21</td>
                  <td><span class="badge badge-primary">Pending</span>
                  </td>
                  <td>12:05</td>
                  <td>$15</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Recent Orders< -->

    
   
    












    <div class="col-md-12">
    <div class="ms-panel">
      <div class="ms-panel-header">
        <h6>Minimal Portfolio</h6>
      </div>
      <div class="ms-panel-body">
        <div class="ms-portfolio ms-portfolio-minimal card-columns">
          <a class="card ms-portfolio-item" href="#">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-4.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
          <a href="#" class="card ms-portfolio-item">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-1.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
          <a href="#" class="card ms-portfolio-item">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-2.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
          <a href="#" class="card ms-portfolio-item">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-5.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
          <a href="#" class="card ms-portfolio-item">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-6.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
          <a href="#" class="card ms-portfolio-item">
            <img class="" src="{{ asset ('styleRestoIT/assets/img/costic/portfolio-3.jpg') }}" alt="Card image cap">
            <div class="ms-portfolio-item-content">
              <h4>Minimal Cup with Coffee</h4>
              <p>Portfolio - Showcase</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>








  </div>
</div>






  
@endsection