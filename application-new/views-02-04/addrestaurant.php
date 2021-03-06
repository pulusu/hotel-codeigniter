    <?php  $this->load->view('adminheader');	?>
	
	  <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                                <div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form role="form" method="POST" action="" enctype="multipart/form-data" onkeypress="return disableEnterKey(event);">
                <input type="hidden" name="_token" value="p6sWQTqui5d2E1BCdRVPxoHDx9xcfSDFwvbEhwE9">
                <input type="hidden" id="latitude" name="latitude" value="" readonly required>
                <input type="hidden" id="longitude" name="longitude" value="" readonly required>

                <h4 class="m-t-0 header-title">
                    <b>Create Shop</b>
                </h4>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input id="name" type="text" class="form-control" name="name" value="<?php if (!empty($people)){echo $people['name']; }?>" required autofocus>

                                                    </div>

                        <div class="form-group">
                <label for="email">Email Address</label>
				<input id="email" type="text" class="form-control" name="email" value="<?php if (!empty($people)){echo $people['email']; }?>" required autofocus>

                                                    </div>

                        <div class="form-group">
                            <label for="parent_id">Cuisine</label>

								<select class="form-control" multiple id="cuisine_id" name="cuisine_id[]">
							<?php foreach($csns as $c){ ?>
							<option value="<?php echo $c['id']; ?>"  <?=$c['status'] == 'onboarding' ? ' selected="selected"' : '';?>><?php echo $c['name']; ?></option>
							<?php }?>
							</select>

                                                    </div>

                        <div class="form-group">
                            <label for="phone">Contact Details</label>

                            <input id="phone" type="text" class="form-control" name="phone" value="<?php if (!empty($people)){echo $people['phone']; }?>" required autofocus>

                                                    </div>
<?php if (empty($people)){?> 
                        <div class="form-group">
                            <label for="password">Password</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                                                    </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div><?php } ?>

                        <div class="form-group">
                            <label for="parent_id">Status</label>
                            <select class="form-control"  id="status" name="status">
							<?php if (!empty($people)){?> 
                                <option value="onboarding" <?=$people['status'] == 'onboarding' ? ' selected="selected"' : '';?>>Onboarding</option>
                                <option value="banned" <?=$people['status'] == 'banned' ? ' selected="selected"' : '';?>>Banned</option>    
							<option value="active" <?=$people['status'] == 'active' ? ' selected="selected"' : '';?>>Active</option><?php }else{ ?>
								<option value="onboarding">Onboarding</option>
                                <option value="banned" >Banned</option>    
							<option value="active">Active</option>
								<?php }?>

							
                            </select>

                                                    </div>

                        <div class="form-group">
                            <label for="password-confirm">Resturant Open Timing</label>

                            <input id="everyday" type="checkbox" checked class="form-control" name="everyday" value="1" >
                        </div>

                                                <div class="row  everyday "   " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Everyday</label>
                                    <input type="checkbox" class="chk form-control"  checked   name="day[ALL]" value="ALL" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[ALL]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[ALL]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"   >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Sunday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[SUN]" value="SUN" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[SUN]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[SUN]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Monday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[MON]" value="MON" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[MON]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[MON]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Tuesday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[TUE]" value="TUE" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[TUE]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[TUE]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Wednesday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[WED]" value="WED" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[WED]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[WED]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Thursday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[THU]" value="THU" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[THU]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[THU]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Friday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[FRI]" value="FRI" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[FRI]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[FRI]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="row   singleday " style="display:none"  " >
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Saturday</label>
                                    <input type="checkbox" class="chk form-control"   name="day[SAT]" value="SAT" >
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_opening">Resturant Opens</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[SAT]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="hours_closing">Resturant Closes</label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[SAT]" value="00:00" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="avatar">Shop Image / Logo</label>
							<div  id="dropify-file">
                            <input type="file" accept="image/*" name="avatar" value="<?php if (!empty($people)){echo $people['shop_logo']; }?>" class="dropify" id="avatar" aria-describedby="fileHelp"></div>
							
<div id="dropify-idp" class="dropify-wrapper has-preview"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div>
<div class="dropify-loader" style="display: none;"></div>
<div class="dropify-errors-container"><ul></ul></div>
<button type="button" id="dropify-clearr" class="dropify-clear">Remove</button><div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="<?php echo base_url(); ?>uploads/images/<?php if (!empty($people)){echo $people['shop_logo']; }?>"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"><?php if (!empty($people)){echo $people['shop_logo']; }?></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="parent_id">Pure Veg</label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" checked name="pure_veg">No
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="pure_veg">Yes
                                    </label>

                                                                    </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="offer_min_amount">Min Amount</label>
					<input tabindex="2" id="offer_min_amount" min="0" class="form-control controls" required type="number" placeholder="Enter Min Amount For Offer" name="offer_min_amount" value="<?php if (!empty($people)){echo $people['min_amount']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="offer_percent">Offer Percentage</label>
                                    <input tabindex="2" id="offer_percent" min="0" class="form-control controls" type="number"  placeholder="Enter amount in Percent" name="offer_percent" value="<?php if (!empty($people)){echo $people['offer_percentage']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="estimated_delivery_time">Estimated delivery time(Minutes)</label>
                                    <input tabindex="2" id="estimated_delivery_time" class="form-control controls" required type="number" placeholder="Enter Max Delivery Time" name="estimated_delivery_time" value="<?php if (!empty($people)){echo $people['estimated_delivery_time']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" id="description" name="description" required><?php if (!empty($people)){echo $people['description']; }?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="maps_address">Location</label>
                                    <input tabindex="2" id="pac-input" class="form-control controls" type="text" placeholder="Enter Shop Location" name="maps_address" value="<?php if (!empty($people)){echo $people['address']; }?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group form-group-default required m-t-5">
                                    <label>Address</label>
                                    <textarea class="form-control" placeholder="Enter Address" id="address" name="address" required><?php if (!empty($people)){echo $people['address']; }?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div id="map" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <a href="shops" class="btn btn-danger btn-block">
                            Cancel
                        </a>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
            </div>
        </div>
    </div>

    <footer class="footer footer-static footer-light navbar-border">
         <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-xs-block d-md-inline-block">
                © 2018 Storkks 
            </span>
        </p>
            
    </footer>
    <script>
    var resizefunc = [];
    </script>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/morris.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/unslider-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/app-menu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/customizer.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/jquery.raty.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/datatable-advanced.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/rating.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/star.rating.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/froala_editor.pkgd.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/dropify.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/bootstrap-clockpicker.min.js" type="text/javascript"></script>
    <!-- END STACK JS-->
        
     <!-- BEGIN PAGE LEVEL JS-->
   
   <script type="text/javascript">
    function disableEnterKey(e)
    {
        var key;
        if(window.e)
            key = window.e.keyCode; // IE
        else
            key = e.which; // Firefox

        if(key == 13)
            return e.preventDefault();
    }
    $('.clockpicker').clockpicker({
        donetext: "Done"
    });
    $('.dropify').dropify();
    $('#everyday').change(function() {
        if($(this).is(":checked")) {
            $('.everyday').show();
            $('.singleday').hide();
            $('.singleday .chk').prop('checked',false);
            $('.everyday .chk').prop('checked',true);
        }else{
            $('.everyday').hide();
            $('.singleday').show();
            $('.everyday .chk').prop('checked',false);
            $('.singleday .chk').prop('checked',true);
        }
    });
</script>
<script>
    var map;
    var input = document.getElementById('pac-input');
    var latitude = document.getElementById('latitude');
    var longitude = document.getElementById('longitude');
    var address = document.getElementById('address');

    function initMap() {

        var userLocation = new google.maps.LatLng(
                13.0796758,
                80.2696968
            );

        map = new google.maps.Map(document.getElementById('map'), {
            center: userLocation,
            zoom: 15
        });

        var service = new google.maps.places.PlacesService(map);
        var autocomplete = new google.maps.places.Autocomplete(input);
        var infowindow = new google.maps.InfoWindow();

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow({
            content: "Shop Location",
        });

        var marker = new google.maps.Marker({
            map: map,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });

        marker.setVisible(true);
        marker.setPosition(userLocation);
        infowindow.open(map, marker);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(location) {
                var userLocation = new google.maps.LatLng(
                    location.coords.latitude,
                    location.coords.longitude
                );
                marker.setPosition(userLocation);
                map.setCenter(userLocation);
                map.setZoom(13);
            });
        }

        google.maps.event.addListener(map, 'click', updateMarker);
        google.maps.event.addListener(marker, 'dragend', updateMarker);

        function updateMarker(event) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': event.latLng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        input.value = results[0].formatted_address;
                        updateForm(event.latLng.lat(), event.latLng.lng(), results[0].formatted_address);
                    } else {
                        alert('No Address Found');
                    }
                } else {
                    alert('Geocoder failed due to: ' + status);
                }
            });

            marker.setPosition(event.latLng);
            map.setCenter(event.latLng);
        }

        autocomplete.addListener('place_changed', function(event) {
            marker.setVisible(false);
            var place = autocomplete.getPlace();

            if (place.hasOwnProperty('place_id')) {
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }
                updateLocation(place.geometry.location);
            } else {
                service.textSearch({
                    query: place.name
                }, function(results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        updateLocation(results[0].geometry.location, results[0].formatted_address);
                        input.value = results[0].formatted_address;
                    }
                });
            }
        });

        function updateLocation(location) {
            map.setCenter(location);
            marker.setPosition(location);
            marker.setVisible(true);
            infowindow.open(map, marker);
            updateForm(location.lat(), location.lng(), input.value);
        }

        function updateForm(lat, lng, addr) {
            console.log(lat,lng, addr);
            latitude.value = lat;
            longitude.value = lng;
            address.value = addr;
        }
    }
</script>
<?php if (!empty($people)){ ?> 
<script>
$(document).ready(function(){
      $("#dropify-file").hide();
    $("#dropify-clearr").click(function(){
        $("#dropify-idp").hide();
        $("#dropify-file").show();
    });
});
</script><?php }else{ ?>
<script>
$(document).ready(function(){
         $("#dropify-idp").hide();
        $("#dropify-file").show();
});
</script>
<?php }?>

     <script src="<?php echo base_url(); ?>admin-assets/js/dashboard-ecommerce.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po&libraries=places&callback=initMap" async defer></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/scripts.js" type="text/javascript"></script>

</body>
</html>