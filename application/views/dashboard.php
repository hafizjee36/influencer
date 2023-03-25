<?php  header('Access-Control-Allow-Origin: *');?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">            
            <!-- <div class="x_title"> -->
                <h2>Welcome! <?=$this->session->userdata('first_name').' '.$this->session->userdata('last_name')?></h2>
                <!-- <div class="clearfix"></div> -->
            <!-- </div> -->
            <!-- <div class="x_content"></div> -->
        </div>
    </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-twitter"></i></div>
      <div class="count"><?=$tot_influen?></div>
      <h3>Twitter</h3>
      <!-- <p class="text-center"><a href="<?=base_url('student')?>">View</a></p> -->
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-instagram"></i></div>
      <div class="count"><?=$tot_influen?></div>
      <h3>Instagram</h3>
      <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-tiktok"></i></div>
      <div class="count"><?=$tot_influen?></div>
      <h3>Tiktok</h3>
      <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-telegram"></i></div>
      <div class="count"><?=$tot_influen?></div>
      <h3>Telegram</h3>
      <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="x_panel"> 
            <canvas id="barChart" width="400" height="300"></canvas>
         </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel"> 
            <canvas id="PieChart" width="400" height="300"></canvas>
        </div>
    </div>
    <div class="col-md-12 image">
        
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $.ajax({
              url: 'https://www.instagram.com/explore/tags/psl/?__a=1',
              type: 'GET',
              crossDomain: true,
              dataType: 'json',
              headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Methods': 'GET,POST,PUT,DELETE,OPTIONS',
                'Access-Control-Allow-Headers': 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'
              },
              success: function(data) {
                console.log(data);
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
              }
            });

        // $.get('https://www.instagram.com/explore/tags/summer/?__a=1', function (data, status) {
        //     console.log('data',data);
        //     for(var i = 0; i < 6; i++) {
        //         var $this = data.graphql.hashtag.edge_hashtag_to_media.edges[i].node;
        //         $('#image').append('<img src="'+  $this.thumbnail_resources[2].src +'">');
        //     }
        // });
    })
</script>
<script>
var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Instagram", "Twitter","Tiktok","Telegram"],
        datasets: [{
            label: 'Earning ($)',
            data: [102, 240, 320, 454],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0,0,0,0.3)',
                'rgba(54, 162, 235, 0.4)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0,0,0,0.6)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    //User Appointment
    var randomScalingFactorCancel = function() {
        return Math.round(5);
    };
    var randomColorFactorComplete = function() {
        return Math.round(8);
    };
    var randomColorFactorPending = function() {
        return Math.round(20);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    randomScalingFactorCancel(),
                    randomColorFactorComplete(),
                    randomColorFactorPending(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#28a745",
                    "#17a2b8",
                ],
            }, {
                data: [
                    randomScalingFactorCancel(),
                    randomColorFactorComplete(),
                    randomColorFactorPending(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#28a745",
                    "#17a2b8",
                ],
            }, {
                data: [
                    randomScalingFactorCancel(),
                    randomColorFactorComplete(),
                    randomColorFactorPending(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#28a745",
                    "#17a2b8",
                ],
            }],
            labels: [
                "Not Booked",
                "Completed",
                "Pending",
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var piee = document.getElementById("PieChart").getContext("2d");
        window.myPie = new Chart(piee, config);
    };
</script>