
@extends('app.app')

@section('content')
<div class="main-content" style="background-color:#FFFFFF !important;width:100%;padding: 20px;box-shadow: 0 1px 20px 0 rgba(64, 64, 65, 0.15);border-radius:7px;margin:20px 0px;">
<div class="row" id="customerForm">
    <div class="col-12">
      
      <table class="table" id="bookingTabel">
        <thead>
          <tr>
            <th>Booking Date</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Car Number</th>
            <th>Service</th>
            <th>Status</th>
            <th>Duration</th>
            <th class="text-center" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
            <td id="{{ $list['id'] }}">{{ $list['createdDate'] }}</td>
            <td>{{ $list['customer'] }}</td>
            <td>{{ $list['email'] }}</td>
            <td>{{ $list['carNo'] }}</td>
            <td>{{ $list['service'] }}</td>
            <td>{{ $list['status'] }}</td>
            <td>{{ $list['durationDay'] }} {{$list['durationType'] }}</td>
            <td class="text-center" style="width:5%;padding: 8px 0px !important;">
              <button class="edit-btn btn-sm" data-toggle="modal" data-target="#bookingeditModal{{$list['id']}}">
                <a>Edit<a>
              </button>
              <div class="modal fade" id="bookingeditModal{{$list['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="exampleModalLabel">Edit Booking</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="alert alert-success alert-block" id="showeditMsg{{$list['id']}}" style="width: 50%;display:none;">
                                    <button type="button" class="close" data-dismiss="alert" style="color:#fff;">×</button> 
                                    <span class="global-font-size" id="editMsg{{$list['id']}}"></span>
                                </div>
                                <section id="loading{{$list['id']}}">
                                    <div id="loading-content{{$list['id']}}"></div>
                                </section>
                                <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                                <label class="entry-label">Customer Name <span class="mt-10 required-i">*</span></label>
                                <select class="menu-select form-control" style="width: 100%;" name="customerId" 
                                id="customerId{{$list['id']}}">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer['id'] }} " 
                                    {{ $list['customerId'] == $customer['id'] ? 'selected' : ''}}
                                    >{{ $customer['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="entry-label">Service <span class="mt-10 required-i">*</span></label>
                                <select class="menu-select form-control" style="width: 100%;" name="service" 
                                id="service{{$list['id']}}">
                                @foreach ($services as $service)
                                    <option value="{{ $service['name'] }} " 
                                    {{ $list['service'] == $service['name'] ? 'selected' : ''}}>{{ $service['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                            <label class="entry-label">Duration <span class="mt-10 required-i">*</span></label>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="durationDay" value="{{$list['durationDay']}}" id="durationDay{{$list['id']}}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="menu-select form-control" style="width: 100%;" name="durationType" 
                                    id="durationType{{$list['id']}}">
                                        <option value="1" {{ $list['durationType'] == 1 ? 'selected' : ''}}>Week</option>
                                        <option value="2" {{ $list['durationType'] == 2 ? 'selected' : ''}}>Day</option>
                                    </select>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="entry-label">Car Number <span class="mt-10 required-i">*</span></label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="carNo" value="{{$list['carNo']}}" id="carNo{{$list['id']}}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="entry-label">Note <span class="mt-10 required-i">*</span></label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="note" id="note{{$list['id']}}" value="{{$list['note']}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="entry-label">Status <span class="mt-10 required-i">*</span></label>
                                    <select class="menu-select form-control" style="width: 100%;" name="status" 
                                    id="status_book{{$list['id']}}">
                                        <option value=1 {{ $list['status'] == 1 ? 'selected' : ''}}>Pending</option>
                                        <option value=2 {{ $list['status'] == 2 ? 'selected' : ''}}>Complete</option>
                                        <option value=3 {{ $list['status'] == 3 ? 'selected' : ''}}>Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn save-btn" id="editbooking{{$list['id']}}">Save</button>
                            <button type="button" class="btn cancel-btn" id="editCancel{{$list['id']}}" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
              </div>
            </td>
            <td class="text-center" style="width:11%;padding: 8px 0px !important;">
              <button class="deactivate-btn btn-sm">
                  <a data-toggle="modal" data-target="#bookingactive{{$list['id']}}">
                      Delete 
                  </a>
              </button>
              <div class="modal fade" id="bookingactive{{$list['id']}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Confirm</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-success alert-block" id="showdeactiveMsg{{$list['id']}}" style="width: 50%;display:none;">
                        <button type="button" class="close" data-dismiss="alert" style="color:#fff;">×</button> 
                        <span class="global-font-size" id="deactiveMsg{{$list['id']}}"></span>
                      </div>
                      <section id="loading-deactive{{$list['id']}}">
                        <div id="loading-content-deactive{{$list['id']}}"></div>
                      </section>
                      <p>Are you sure you want to <span class="text-danger">delete?</span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" id="deactive{{$list['id']}}">Delete</button>
                      <button type="button" class="btn btn-default" id="deactiveCancel{{$list['id']}}" data-dismiss="modal">Cancel</button> 
                    </div>
                  </div>
                </div>
              </div>
            </td>
          @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="bookingcreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel">Create New Booking</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                      <div class="alert alert-success alert-block" id="showcreateMsg" style="width: 50%;display:none;">
                        <button type="button" class="close" data-dismiss="alert" style="color:#fff;">×</button> 
                        <span class="global-font-size" id="createMsg"></span>
                      </div>
                      <section id="loading">
                        <div id="loading-content"></div>
                      </section>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                                <label class="entry-label">Customer Name <span class="mt-10 required-i">*</span></label>
                                <select class="menu-select form-control" style="width: 100%;" name="customerId" 
                                id="customerId">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer['id'] }} " >{{ $customer['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="entry-label">Service <span class="mt-10 required-i">*</span></label>
                                <select class="menu-select form-control" style="width: 100%;" name="service" 
                                id="service_book">
                                @foreach ($services as $service)
                                    <option value="{{ $service['name'] }} " >{{ $service['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                            <label class="entry-label">Duration <span class="mt-10 required-i">*</span></label>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="durationDay" id="durationDay" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="menu-select form-control" style="width: 100%;" name="durationType" 
                                    id="durationType">
                                        <option value=1 >Week</option>
                                        <option value=2 >Day</option>
                                    </select>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="entry-label">Car Number <span class="mt-10 required-i">*</span></label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="carNo" id="carNo" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="entry-label">Note <span class="mt-10 required-i">*</span></label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="note" id="note" required>
                                </div>
                            </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn save-btn" id="savebooking">Save</button>
                      <button type="button" class="btn cancel-btn" id="saveCancel" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
</div>
@endsection

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script>
  var primaryid = 0;

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  jQuery(document).ready(function(){
    $formData = new FormData();

    $('#bookingTabel').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "autoFill": false,
        "dom": '<"toolbar">frtip',
        language: {
            search: '<button class="btn" style="float:right;margin: 5px 10px 10px 10px;border-radius: 7px;background-color:#a4abb3;color: #FFFFFF;font-size: 12px;" data-toggle="modal" data-target="#bookingcreateModal"><i class="fa fa-book" aria-hidden="true"></i> Create New</button>', //To remove Search Label
            searchPlaceholder: 'search'
        },
        "aoColumns": [{
            "bSortable": true
        },
        {
            "bSortable": true
        },
        {
            "bSortable": true
        },
        {
            "bSortable": true
        },
        {
            "bSortable": true

        },
        {
            "bSortable": true

        },
        {
            "bSortable": true

        },
        {
            "bSortable": false

        },{
            "bSortable": false

        }]
    });

    $("div.toolbar").html('<span><img style="width: 11%;padding: 5px;" class="nav-icon" style="width:11%;"><i class="fa fa-book" aria-hidden="true"></i>Booking</span>');

    var file;

    jQuery('#savebooking').click(function(e){
      $("#saveCancel").prop("disabled", true);
      $("#savebooking").prop("disabled", true);
      showLoading('loading','loading-content');

      if(document.getElementById('customerId').value){
        $formData.append('customerId',document.getElementById('customerId').value);
      }else{
        alert("Please choose customer!");
        requiredAfterCreate();
        return;
      }
      
      if(document.getElementById('durationDay').value){
        $formData.append('durationDay',document.getElementById('durationDay').value);
      }else{
        alert("Please enter duration day!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('durationType').value){
        $formData.append('durationType',document.getElementById('durationType').value);
      }else{
        alert("Please enter duration type!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('carNo').value){
        $formData.append('carNo',document.getElementById('carNo').value);
      }else{
        alert("Please enter car number!");
        requiredAfterCreate();
        return;
      }
      console.log(document.getElementById('service_book').value);
      $formData.append('note',document.getElementById('note').value);
      $formData.append('service',document.getElementById('service_book').value);
      $formData.append('status',document.getElementById('status_book').value);
      
      e.preventDefault();
      $.ajax({
          url: "/booking/create",
          type:"POST",
          data:$formData,
          processData: false,
          contentType: false,
          processData: false,
          success:function(response){
            hideLoading('loading','loading-content');
            $("#createMsg").text(response);
            $('#showcreateMsg').show();
            setTimeout(function() {
              $("#bookingcreateModal").modal('hide');
              location.reload();
            }, 1000);
          },
          error: function (response) {
            hideLoading('loading','loading-content');
            $("#createMsg").text(response);
            $('#showcreateMsg').show();
          }
      });
    });
    
    var table = $('#bookingTabel').DataTable();
    $('#bookingTabel tbody').on('click', 'tr', function () {
      primaryid = table.row(this).data()[0];

      //  Deactivate
      jQuery('#deactive'+primaryid).click(function(e){
        $("#deactiveCancel"+primaryid).prop("disabled", true);
        $("#deactive"+primaryid).prop("disabled", true);
        showLoading('loading-deactive'+primaryid, 'loading-content-deactive'+primaryid);

        e.preventDefault();
        $.ajax({
          url: "/booking/deactive",
          type:"POST",
          data:{
            id:primaryid
          },
          success:function(response){
            hideLoading('loading-deactive'+primaryid,'loading-content-deactive'+primaryid);
            $("#deactiveMsg"+primaryid).text(response);
            $('#showdeactiveMsg'+primaryid).show();
            setTimeout(function() {
              $("#bookingdeactive").modal('hide');
              location.reload();
            }, 1000);
          },
          error: function (response) {
            hideLoading('loading-deactive'+primaryid, 'loading-content-deactive'+primaryid);
            $("#deactiveMsg"+primaryid).text(response);
            $('#showdeactiveMsg'+primaryid).show();
          }
        });
      });

      // Edit
      jQuery('#editbooking'+primaryid).click(function(e){
        $("#editCancel"+primaryid).prop("disabled", true);
        $("#editbooking"+primaryid).prop("disabled", true);
        showLoading('loading'+primaryid,'loading-content'+primaryid);
        
        $formData.append('id',primaryid);
        if(document.getElementById('customerId'+primaryid).value){
        $formData.append('customerId',document.getElementById('customerId'+primaryid).value);
        }else{
            alert("Please choose customer!");
            requiredAfterCreate();
            return;
        }
      
      if(document.getElementById('durationDay'+primaryid).value){
        $formData.append('durationDay',document.getElementById('durationDay'+primaryid).value);
      }else{
        alert("Please enter duration day!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('durationType'+primaryid).value){
        $formData.append('durationType',document.getElementById('durationType'+primaryid).value);
      }else{
        alert("Please enter duration type!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('carNo'+primaryid).value){
        $formData.append('carNo',document.getElementById('carNo'+primaryid).value);
      }else{
        alert("Please enter car number!");
        requiredAfterCreate();
        return;
      }
      
      $formData.append('note',document.getElementById('note'+primaryid).value);
      $formData.append('service',document.getElementById('service'+primaryid).value);

        e.preventDefault();
        $.ajax({
          url: "/booking/update",
          type:"POST",
          data:$formData,
          processData: false,
          contentType: false,
          processData: false,
          success:function(response){
            hideLoading('loading'+primaryid,'loading-content'+primaryid);
            $("#editMsg"+primaryid).text(response);
            $('#showeditMsg'+primaryid).show();
            setTimeout(function() {
              $("#bookingeditModal").modal('hide');
              location.reload();
            }, 1000);
          },
          error: function (response) {
            hideLoading('loading'+primaryid,'loading-content'+primaryid);
            $("#editMsg"+primaryid).text(response);
            $('#showeditMsg'+primaryid).show();
          }
        });
      });
    });
  });

  function showLoading(id1, id2) {
    $('#'+id1).addClass('loading');
    $('#'+id2).addClass('loading-content');
  }

  function hideLoading(id1, id2) {
    $('#'+id1).removeClass('loading');
    $('#'+id2).removeClass('loading-content');
  }

  function requiredAfterCreate() {
    $('#loading').removeClass('loading');
    $('#loading-content').removeClass('loading-content');
    $("#saveCancel").prop("disabled", false);
    $("#savebooking").prop("disabled", false);
  }
    
</script>


