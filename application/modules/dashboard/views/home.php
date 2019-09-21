<div class="page-content-wrapper">

<div class="page-content">

<style>
img {

  display: block;

  margin-left: auto;

  margin-right: auto;

}

.shadow{

    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);

}

</style>

<div class="row" style="padding-bottom: 30px;padding-top: 30px;">

    <div class="col-md-12">

        <div class="card text-white bg-info shadow">

                <div class="card-body row">

                    <div class="col-md-4">

                        <img src="<?php echo STATIC_ADMIN_IMAGE.'company.png'?>">

                    </div>

                    <div class="col-md-8" style="padding-top: 10px;">

                         <h2 class="card-text"><?php echo $organization; ?></h2> 

                    </div>

                </div>

        </div>

    </div>

</div>

<div class="row" style="padding-left:50px;">

    <div class="col-md-4" onclick="location.href='user';">

        <div class="card text-white bg-primary col-md-10 shadow">

                <div class="card-body" style="padding-top: 15px;">

                    <img src="<?php echo STATIC_ADMIN_IMAGE.'salesman.png'?>">

                    <h2 class="card-text"><center>Total Salesman:<br><?php echo $salesman; ?></center></h2>

                </div>

        </div>

    </div>

    <div class="col-md-4" onclick="location.href='user';">

        <div class="card text-white bg-primary col-md-10 shadow">

                <div class="card-body" style="padding-top: 15px;">

                    <img src="<?php echo STATIC_ADMIN_IMAGE.'cashier.png'?>">

                    <h2 class="card-text"><center>Total Cashier:<br><?php echo $cashier; ?></center></h2>

                </div>

        </div>

    </div>

    <div class="col-md-4" onclick="location.href='student';">

        <div class="card text-white bg-primary col-md-10 shadow">

                <div class="card-body" style="padding-top: 15px;">

                    <img src="<?php echo STATIC_ADMIN_IMAGE.'customer.png'?>">

                    <h2 class="card-text"><center>Total Customer:<br><?php echo $customer; ?></center></h2>

                </div>

        </div>

    </div>

</div>
</div>
</div>
</div>
</div>
</div>