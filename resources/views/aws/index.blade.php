<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Delivery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/aws.css">
</head>
<body>
<div class="text-center">
    <h1>Package Delivery</h1>
</div>
<div class="container" id="app">
    <div class="form-group">
        <label for="source_address">Source address</label>
        <input type="text" class="form-control" id="source_address" aria-describedby="source_address_help" placeholder="Enter Source Address" v-model="source_address">
        <small id="source_address_help" class="form-text text-muted">Address where the package is sent from</small>
    </div>
    <div class="form-group">
        <label for="destination_address">Destination address</label>
        <input type="text" class="form-control" id="destination_address" aria-describedby="destination_address_help" placeholder="Enter Destination Address" v-model="destination_address">
        <small id="destination_address_help" class="form-text text-muted">Address where the package is sent to</small>
    </div>
    <div class="form-group">
        <label for="package_cost">Cost of Package</label>
        <input type="number" step="0.01" class="form-control" id="package_cost" placeholder="Enter Cost" v-model="cost">
    </div>
    <button class="btn btn-dark" @click="create()">Create</button>
    <div class="row mt-5 mb-5">
        <div class="col-sm-10">
            <div v-if="error !== ''" class="alert alert-danger" v-cloak>
                @{{error}}
            </div>
            <div v-if="success !== ''" class="alert alert-success" v-cloak>
                @{{success}}
            </div>
        </div>
    </div>
    <div class="row" v-if="packages.length > 0" v-for="(package, index) in packages">
        <div class="col-sm-12 display-4">Package @{{ index }}</div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Source Address</label>
                <input type="text" class="form-control" v-model="package.source_address">
            </div>
       </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Destination Address</label>
                <input type="text" class="form-control" v-model="package.destination_address">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Cost</label>
                <input type="text" class="form-control" v-model="package.cost" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Time order was placed</label>
                <input type="text" class="form-control" v-model="package.time_order_placed" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Time order was delivered</label>
                <input type="text" class="form-control" v-model="package.time_delivered" readonly>
            </div>
        </div>
        <button class="btn btn-dark m-1" @click="update(package)">Update</button>
        <button class="btn btn-danger m-1" @click="remove(package)">Delete</button>
        <hr class="divider divider-slash" />
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const initial_packages = {!! $packages !!};
</script>
<script src="/js/aws.js"></script>
</body>
</html>
