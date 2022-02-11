<?php require_once "createasset.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/x-icon" href="favicon_io/favicon.ico">
    <title>Assets</title>
  <link rel="stylesheet" href="css1/bootstrap.min.css">
  <link rel="stylesheet" href="assetnew.css">
</head>
<body id="bg03">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  mx-auto">
						<header class="mt-5 mb-5 text-center">
							<h3>Create Assets</h3>
						</header>
                            <form action="createasset.php" method="POST" autocomplete="" enctype="multipart/form-data" class="tm-form-white tm-font-big">
							<div class="tm-bg-white tm-form-pad-big">
	
							<div class="form-group mb-5">
										<label for="UserName" class="black-text mb-1 big">UserName</label>
										<input id="UserName" name="UserName" type="text" class="validate tm-input-white-bg" required value="<?php echo (isset($UserName)) ? $UserName : '' ;?>">
									</div>
									<div class="form-group mb-5">
										<label for="PIN" class="black-text mb-1 big">PIN</label>
										<input id="PIN" name="PIN" type="text" class="validate tm-input-white-bg"required value="<?php echo (isset($PIN)) ? $PIN : '' ;?>">
									</div>
									<div class="form-group">
										<label for="AssetType" class="black-text mb-4 big">Asset Type</label>
										<select class="custom-select col-xl-5 col-lg-5 col-md-5 col-sm-5" id="AssetType" required value="<?php echo (isset($AssetType)) ? $AssetType : '' ;?>">
												<option selected>Select</option>
												<option selected>Equities</option>
												<option selected>Fixed Income</option>
												<option selected>Mutual Funds</option>
												<option selected>Commodities</option>
												<option selected>Art Works</option>
												<option selected>Vehicles</option>
												<option selected>Other Investments</option>
										</select>
									</div>
										<div class="form-group">
											<label for="AssetSubType" class="black-text mb-4 big">Asset Sub-Type</label>
											<select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="AssetSubType" required value="<?php echo (isset($AssetSubType)) ? $AssetSubType : '' ;?>">
												<option selected>Shares</option>
												<option selected>FixedRateBonds</option>
												<option selected>Exchange Traded Funds</option>
												<option selected>Car</option>
												<option selected>MotorCycle</option>
												<option selected>Others</option>
											</select>
										</div>
									<div class="form-group mb-5">
										<label for="AssetNo" class="black-text mb-1 big">AssetNo</label>
										<input id="AssetNo" name="AssetNo" type="text" class="validate tm-input-white-bg" required value="<?php echo (isset($AssetNo)) ? $AssetNo : '' ;?>">
									</div>
									<div class="form-group mb-5">
									<label for="Denomination" class="black-text mb-1 big">Denomination</label>
									<input id="Denomination" name="Denomination" type="text" class="validate tm-input-white-bg mb-4" required value="<?php echo (isset($Denomination)) ? $Denomination : '' ;?>">
									</div>
									<div class="form-group mb-5">
											<label for="FaceValue" class="black-text mb-1 big">Face Value</label>
											<input id="FaceValue" name="FaceValue" type="text" class="validate tm-input-white-bg mb-4" required value="<?php echo (isset($FaceValue)) ? $FaceValue : '' ;?>">
									</div>
									<div class="form-group">
											<label for="name">FromDate</label>
											<input id="FromDate" name="FromDate" type="date" class="validate tm-input-white-bg mb-4" required value="<?php echo (isset($FromDate)) ? $FromDate : '' ;?>">
									</div>
									<div class="form-group">
											<label for="name">MaturityDate</label>
											<input id="MaturityDate" name="MaturityDate" type="date" class="validate tm-input-white-bg mb-4" required value="<?php echo (isset($MaturityDate)) ? $MaturityDate : '' ;?>">
									</div>
									<div class="form-group mb-5">
											<label for="Remarks" class="black-text mb-1 big">Remarks</label>
											<input id="Remarks" name="Remarks" type="text" class="validate tm-input-white-bg mb-4" required value="<?php echo (isset($Remarks)) ? $Remarks : '' ;?>">
									</div>
									<div class="form-group">
										<input class="form-control button" type="submit" name="signup" value="Create">
									</div>
										<!--<div class="row">
											<div class="col-12 col-sm-4">
												<button type="submit" class="btn btn-primary">Create
												</button>
											</div>
										</div>-->
								</div>
                            </form>
                        
			</div>
		</div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html>
