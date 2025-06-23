<div class="p-[10px]">
    <table class="table table-striped" id="locationsTable">
        <thead class="table-active">
               <tr>
                  <th scope="col">
                      <div class="flex">
                      <label class="form-label text-[15px] font-[500]">{{ __('Location') }}</label>
                      <i class='bx bxs-info-circle text-[18px]'></i>

                      </div>
                  </th>
                  <th scope="col">
                      <div class="flex">
                      <label class="form-label text-[15px] font-[500]">{{ __('Address on Card') }}</label>
                      <i class='bx bxs-info-circle text-[18px]'></i>
                      </div>
                  </th>
                  <th scope="col">
                      <div class="flex">
                      <label class="form-label text-[15px] font-[500]">{{ __('Display') }}</label>
                      <i class='bx bxs-info-circle text-[18px]'></i>
                      </div>
                  </th>
                  <th scope="col">
                    <div class="flex">
                    <label class="form-label text-[15px] font-[500]">{{ __('Message') }}</label>
                    <i class='bx bxs-info-circle text-[18px]'></i>
                    </div>
                </th>
                  <th>

                  </th>
                </tr>
        </thead>

        <tbody id="locations_tbody">

        </tbody>
         <tfoot>
              <tr>
                  <td colspan="4">
                      <button id="add_location_btn" class="btn btn-outline-danger float-end cursor-pointer border flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#add_location_modal">
                          <i class='bx bx-plus text-[18px]'></i>
                      </button>
                  </td>
              </tr>
         </tfoot>
      </table>
    <!-- location main end-->

    <table class="table table-striped mt-3" id="MyLocationsTable">
        <thead class="table-active">
               <tr>
                <th>

                </th>
                  <th scope="col">
                      <div class="flex">
                      <label class="form-label text-[15px] font-[500]">{{ __('My Locations') }}</label>
                      <i class='bx bxs-info-circle text-[18px]'></i>

                      </div>
                  </th>
                </tr>
        </thead>

        <tbody id="myLocations_tbody">
        </tbody>

    </table>
    <!-- location main end-->



    <!-- beacon main -->
    {{-- <div> --}}
        {{-- <div class="flex items-center gap-[5px] py-3">
            <h3 class="text-[1.1em] font-[600]">{{ __('Beacons') }} </h3>
            <i class='bx bxs-info-circle text-[18px] '></i>
        </div> --}}

        {{-- <p class="text-[15px] font-[300]">{{ __('Display beacon based messages when customers are near your beacon(s).') }} <a href="#" class="text-[#23527c] hover:underline"
        >{{ __('Learn more about beacon based messages.') }}</a>
        </p> --}}


        {{-- <div class="form-group py-2">
            <div class="flex items-center gap-[5px]">
                <label class="form-label">{{ __('Name of Beacon') }}</label>
                <i class='bx bxs-info-circle text-[18px] '></i>
            </div>
            <input class="form-control">
        </div> --}}

        {{-- <div class="form-group py-2">
            <div class="flex items-center gap-[5px]">
                <label class="form-label">{{ __('UUID') }}</label>
                <i class='bx bxs-info-circle text-[18px] '></i>
            </div>
            <input class="form-control">
        </div> --}}

        {{-- <div class="form-group py-2">
            <div class="flex items-center gap-[5px]">
                <label class="form-label" for="major">{{ __('Major') }}</label>
                <i class='bx bxs-info-circle text-[18px] '></i>
            </div>
            <input type="number" class="block w-full px-3 py-2 text-base font-normal leading-1.5 text-body-color bg-body-bg bg-clip-padding-box border border-border-width border-border-color rounded-[0.375rem] transition duration-150 ease-in-out" id="major" name="major">
        </div> --}}

        {{-- <div class="form-group py-2">
            <div class="flex items-center gap-[5px]">
                <label class="form-label" for="minor">{{ __('Minor') }}</label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input class="block w-full px-3 py-2 text-base font-normal leading-1.5 text-body-color bg-body-bg bg-clip-padding-box border border-border-width border-border-color rounded-[0.375rem] transition duration-150 ease-in-out" type="number" id="minor" name="minor">

        </div> --}}

    {{-- </div> --}}
    <!-- beacon main end -->



</div>





@push('script')
<script>
    function location_readById(id) {
    $.ajax({
        type: "GET",
        url: "{{ route('location.readById')}}",
        dataType: "json",
        data: {
            id: id,
            "_token": "{{ csrf_token() }}"
        },
        success: function(response) {
            var locations = response;
            var location_tablerow = '<tr data-location-id="' + locations.id + '"><td><div class="form-group" hidden><input name="locations_id[]" value="'+locations.id+'" class="form-control text-[#555555] font-[100] text-[15px]""></div>'+locations.location_search+'</td><td>'+locations.location_name+'</td><td><div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"></div></td><td>'+locations.location_description+'</td><td><span class="btn delete-btn" id="delete_location_btn" onclick="deleteLocation('+locations.id+')"><i class="bi bi-trash3"></i></span></td></tr>';
            $("#locationsTable #locations_tbody").append(location_tablerow);
            var checked_checkbox = document.getElementById('location_'+locations.id+'');
            checked_checkbox.disabled = true;
        },
        error: function(e, f, g) {
            console.log(e, f, g);
        }
    });
    }

    function myLocation_read() {
    $.ajax({
        type: "GET",
        url: "{{ route('location.read')}}",
        dataType: "json",
        data: {
            "_token": "{{ csrf_token() }}"
        },
        success: function(response) {
            var locations_list = response.data;
            $("#myLocations_tbody").empty();
            var html = "";
            if(locations_list.length > 0){
                for(var i=0; i<locations_list.length; i++){
                    html = html + '<tr> <td><div class="form-group" hidden><input name="id" value="{{ '+locations_list[i].id+' ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px]""></div><div class="form-check"> <input class="form-check-input"   onchange="changeLocationStatus('+locations_list[i].id+')" type="checkbox" value="" id="location_'+locations_list[i].id+'"> </div></td><td>'+locations_list[i].location_search+'</td></tr>';
                }
                $("#myLocations_tbody").append(html);
            }
        },
        error: function(e, f, g) {
            console.log(e, f, g);
        }
    });
    }


    myLocation_read();

    function changeLocationStatus(id){
        var checkbox = document.getElementById('location_'+id+'');

        if (checkbox.checked) {
            location_readById(id);
        }
        // else {
        //     alert('Checkbox is unchecked');
        // }
    }




    function deleteLocation(id){
        if(id>0){
            var checked_checkbox = document.getElementById('location_'+id+'');
            checked_checkbox.disabled = false;
            checked_checkbox.checked = false;

            var rowToDelete = document.querySelector('tr[data-location-id="' + id + '"]');
            if (rowToDelete) {
                rowToDelete.remove();
            } else {
                console.log('Row not found for location ID ' + id);
            }
        }
    }
</script>
    <script>
         $("#add_location_btn").on("click", function(e) {
            e.preventDefault();
        });

        $("#save-btn").on("click", function(e) {
            e.preventDefault();
            var form = document.forms["add_location_form"];
            var id = document.querySelector('input[name="id"]').value;
            var location_name = document.querySelector('input[name="location_name"]').value;
            var location_description = document.querySelector('textarea[name="location_description"]').value;
            var location_search = document.querySelector('input[name="location_search"]').value;
            var latitude = document.querySelector('input[name="latitude"]').value;
            var longitude = document.querySelector('input[name="longitude"]').value;

            if(longitude == null || longitude==""){
                toastr.error("{{__('Longitude is required')}}");
                return false;
            }
            else if(latitude == null || latitude==""){
                toastr.error("{{__('Latitude is required')}}");
                return false;
            }
            else if(location_search == null || location_search==""){
                toastr.error("{{__('Location Search is required')}}");
                return false;
            }
            else if(location_name == null || location_name==""){
                toastr.error("{{__('Location Name is required')}}");
                return false;
            }
            else{

            }
            $.ajax({
                type: "get",
                url: "{{route('location.store')}}",
                data: {
                    id: id,
                    location_name: location_name,
                    location_description: location_description,
                    location_search: location_search,
                    latitude: latitude,
                    longitude: longitude,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status == "200") {
                        $("#add_location_modal").modal("hide");
                        myLocation_read();
                        toastr.success("Record Save Successfully");
                        // var inputElement = document.getElementsByName(longitude)[0];
                        // inputElement.value = null;

                    } else {
                        toastr.error("Operation Failed");
                    }
                },
                error: function(e, f, g) {
                    toastr.error("Error: " + e.responseJSON.message);
                }
            });

            // alert("ok");
        });
    </script>
@endpush

<script>
    let map;
    let autocomplete;
    let marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 0, lng: 0 },
            zoom: 2
        });

        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'),
            { types: ['geocode'] }
        );

        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                console.log("Place details not available for input: '" + place.name + "'");
                return;
            }
            map.setCenter(place.geometry.location);
            map.setZoom(14); // You can adjust the zoom level as needed
            addMarker(place.geometry.location);
        });
        map.addListener('click', function (event) {
            addMarker(event.latLng);
        });
    }

    function addMarker(location) {
        if (marker) {
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true,
            title: 'Drag me!'
        });
        document.getElementById('lat').value = location.lat();
        document.getElementById('lng').value = location.lng();
        geocodeLatLng(location);
        marker.addListener('dragend', function () {
            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();
            geocodeLatLng(marker.getPosition());
        });
    }

    function geocodeLatLng(location) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: location }, function (results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    document.getElementById('autocomplete').value = results[0].formatted_address;
                }
            }
        });
    }
</script>

<!-- Add Location Modal Start -->
<div class="modal fade " id="add_location_modal" tabindex="-1" role="dialog" aria-labelledby="createBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBookingModalLabel">Create Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form class="needs-validation row" id="add_location_form">
                @csrf
                <input name="id" type="text" hidden>
                <div class="modal-body">
                    <p class="text-[15px] font-[300]">{{ __('Let your customers know where your card be used. You can also trigger') }} <a href="#">{{ __('lock screen messages') }}</a> {{ __('when your customers are near your location(s).') }}
                    </p>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Location Name') }}</label>
                                    <input name="location_name" type="text" class="form-control" placeholder="{{ __('Location Name') }}" >
                                    <div class="invalid-feedback">{{ __('Location Name is required') }}.</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Search for location by address') }}</label>
                                    <input name="location_search" id="autocomplete" type="text" class="form-control" placeholder="{{ __('Search for location by address') }}" >
                                    <div class="invalid-feedback">{{ __('Search for location by address is required') }}.</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Longitude') }}</label>
                                    <input name="longitude" id="lng" type="text" class="form-control" placeholder="{{ __('Longitude') }}" >
                                    <div class="invalid-feedback">{{ __('Longitude is required') }}.</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Latitude') }}</label>
                                    <input name="latitude" id="lat" type="text" class="form-control" placeholder="{{ __('Latitude') }}" >
                                    <div class="invalid-feedback">{{ __('Latitude is required') }}.</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group py-2">
                                    <div class="flex items-center gap-[5px]">
                                        <label class="form-label">{{ __('Address to display') }}</label>
                                        <i class='bx bxs-info-circle text-[18px] '></i>
                                    </div>
                                    <textarea name="location_description" rows="5" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{ __('Address that will be displayed on your card') }}">{{ $pass->address_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between mt-3 ml-2">
                    <button type="button" class="btn btn-danger" style="color: white; background-color:rgb(220, 53, 69);" data-bs-dismiss="modal">{{__('Close')}}</button>
                    <b-button variant="primary" v-if="!load" class="btn-lg " disabled>
                        <b-spinner small type="grow"></b-spinner>
                    </b-button>
                    <button type="submit" class="btn btn-lg btn-primary  "  style="color: white; background-color:rgb(0, 123, 255);" id="save-btn" data-bs-dismiss="modal">{{__('Save')}} </button>
                </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Add Location Modal End -->
