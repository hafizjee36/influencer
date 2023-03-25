<?php  header('Access-Control-Allow-Origin: *');?>
<div class="row top_tiles">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php echo form_open('twitter.html'); ?>
                <div class="form-group">
                    <label>Username</label>
                        <input name="username" value="<?php echo $this->input->post('username'); ?>" type="text" class="form-control ">
                    
                </div>
                <div class="form-group">
                    <label>Tiktok Cashtag/Hashtag</label>
                    <input name="hashtag" value="<?php echo $this->input->post('hashtag'); ?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input  name="date" value="<?php echo $this->input->post('date'); ?>" id="date_picker" class="date_picker form-control" type="text">
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                  
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-md-6" hidden>
                <?php foreach($results->statuses as $key =>$r){
                echo'<pre>'.print_r($r->entities);
            }?>
            </div>
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
        </div>
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
        labels: ["Tweets", "Likes","Retweets","Replies"],
        datasets: [{
            label: 'Earning ($)',
            data: [<?=$tweets?>, <?=$likes?>, <?=$retweets?>, <?=$replies?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0,255,0,0.6)',
                'rgba(54, 162, 235, 0.4)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0,255,0,0.6)',
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
    //Pie
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
                    <?=$tweets?>,
                    <?=$likes?>,
                    <?=$retweets?>,
                    <?=$replies?>,
                ],
                backgroundColor: [
                    "#e13b58",
                    "#17a2b8",
                    "#169F85",
                    "#40409b",
                ],
            }, {
                data: [
                    <?=$tweets?>,
                    <?=$likes?>,
                    <?=$retweets?>,
                    <?=$replies?>,
                ],
                backgroundColor: [
                    "#e13b58",
                    "#17a2b8",
                    "#169F85",
                    "#40409b",
                ],
            }, {
                data: [
                    <?=$tweets?>,
                    <?=$likes?>,
                    <?=$retweets?>,
                    <?=$replies?>,
                ],
                backgroundColor: [
                    "#e13b58",
                    "#17a2b8",
                    "#169F85",
                    "#40409b",
                ],
            },{
                data: [
                    <?=$tweets?>,
                    <?=$likes?>,
                    <?=$retweets?>,
                    <?=$replies?>,
                ],
                backgroundColor: [
                    "#e13b58",
                    "#17a2b8",
                    "#169F85",
                    "#40409b",
                ],
            }],
            labels: [
                "Tweets",
                "Likes",
                "Retweets",
                "Replies",
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