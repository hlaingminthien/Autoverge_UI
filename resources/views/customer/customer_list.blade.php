
@extends('app.app')

@section('content')
<div class="main-content" style="background-color:#FFFFFF !important;width:100%;padding: 20px;box-shadow: 0 1px 20px 0 rgba(64, 64, 65, 0.15);border-radius:7px;margin:20px 0px;">
<div class="row" id="customerForm">
    <div class="col-12">
      
      <table class="table" id="customerTabel">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>NRC</th>
            <th class="text-center" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
            <td id="{{ $list['id'] }}">{{ $list['id'] }}</td>
            <td>{{ $list['name'] }}</td>
            <td>{{ $list['phoneNo'] }}</td>
            <td>{{ $list['email'] }}</td>
            <td>{{ $list['address'] }}</td>
            <td>{{ $list['nrc'] }}</td>
            <td class="text-center" style="width:5%;padding: 8px 0px !important;">
              <button class="edit-btn btn-sm" data-toggle="modal" data-target="#customereditModal{{$list['id']}}">
                <a>Edit<a>
              </button>
              <div class="modal fade" id="customereditModal{{$list['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="exampleModalLabel">Edit Customer</span>
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
                                        <label class="entry-label">Name <span class="mt-10 required-i">*</span></label>
                                        <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                        name="name" value="{{$list['name']}}" id="name{{$list['id']}}" required>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="entry-label">Phone Number <span class="mt-10 required-i">*</span></label>
                                            <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                            name="phoneNo" value="{{$list['phoneNo']}}" id="phoneNo{{$list['id']}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="entry-label">Email <span class="mt-10 required-i">*</span></label>
                                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                            name="email" value="{{$list['email']}}" id="email{{$list['id']}}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="entry-label">Address <span class="mt-10 required-i">*</span></label>
                                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                            name="address" value="{{$list['address']}}" id="address{{$list['id']}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                          <label class="entry-label">NRC <span class="mt-10 required-i">*</span></label>
                                          <input type="text" name="nrc" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                          value="{{$list['nrc']}}" id="nrc{{$list['id']}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn save-btn" id="editcustomer{{$list['id']}}">Save</button>
                            <button type="button" class="btn cancel-btn" id="editCancel{{$list['id']}}" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
              </div>
            </td>
            <td class="text-center" style="width:11%;padding: 8px 0px !important;">
              <button class="deactivate-btn btn-sm">
                  <a data-toggle="modal" data-target="#customeractive{{$list['id']}}">
                      Delete 
                  </a>
              </button>
              <div class="modal fade" id="customeractive{{$list['id']}}">
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
      <div class="modal fade" id="customercreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel">Create New customer</span>
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
                              <label class="entry-label">Name <span class="mt-10 required-i">*</span></label>
                              <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                              name="name" id="name" required>
                          </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="entry-label">Phone Number <span class="mt-10 required-i">*</span></label>
                                <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                name="phoneNo" id="phoneNo" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <label class="entry-label">Email <span class="mt-10 required-i">*</span></label>
                                  <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                  name="email" id="email" required>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label class="entry-label">Address <span class="mt-10 required-i">*</span></label>
                                  <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                  name="address" id="address" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                <label class="entry-label">NRC <span class="mt-10 required-i">*</span></label>
                                <input type="text" name="nrc" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                id="nrc" required>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn save-btn" id="savecustomer">Save</button>
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

    $('#customerTabel').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "autoFill": false,
        "dom": '<"toolbar">frtip',
        language: {
            search: '<button class="btn" style="float:right;margin: 5px 10px 10px 10px;border-radius: 7px;background-color:#a4abb3;color: #FFFFFF;font-size: 12px;" data-toggle="modal" data-target="#customercreateModal"><i class="fas fa-pen"></i> Create New</button>', //To remove Search Label
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

        },{
            "bSortable": false

        },{
            "bSortable": false

        }]
    });

    $("div.toolbar").html('<span><img style="width: 11%;padding: 5px;" class="nav-icon" style="width:11%;"><i class="fa fa-sign-language" aria-hidden="true"></i>Customer</span>');

    var file;

    jQuery('#savecustomer').click(function(e){
      $("#saveCancel").prop("disabled", true);
      $("#savecustomer").prop("disabled", true);
      showLoading('loading','loading-content');

      if(document.getElementById('name').value){
        $formData.append('name',document.getElementById('name').value);
      }else{
        alert("Please enter name!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('phoneNo').value){
        $formData.append('phoneNo',document.getElementById('phoneNo').value);
      }else{
        alert("Please enter phone number!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('email').value){
        $formData.append('email',document.getElementById('email').value);
      }else{
        alert("Please enter email!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('address').value){
        $formData.append('address',document.getElementById('address').value);
      }else{
        alert("Please enter address!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('nrc').value){
        $formData.append('nrc',document.getElementById('nrc').value);
      }else{
        alert("Please enter nrc!");
        requiredAfterCreate();
        return;
      }
      
      e.preventDefault();
      $.ajax({
          url: "/customer/create",
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
              $("#customercreateModal").modal('hide');
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
    
    var table = $('#customerTabel').DataTable();
    $('#customerTabel tbody').on('click', 'tr', function () {
      primaryid = table.row(this).data()[0];

      //  Deactivate
      jQuery('#deactive'+primaryid).click(function(e){
        $("#deactiveCancel"+primaryid).prop("disabled", true);
        $("#deactive"+primaryid).prop("disabled", true);
        showLoading('loading-deactive'+primaryid, 'loading-content-deactive'+primaryid);

        e.preventDefault();
        $.ajax({
          url: "/customer/deactive",
          type:"POST",
          data:{
            id:primaryid
          },
          success:function(response){
            hideLoading('loading-deactive'+primaryid,'loading-content-deactive'+primaryid);
            $("#deactiveMsg"+primaryid).text(response);
            $('#showdeactiveMsg'+primaryid).show();
            setTimeout(function() {
              $("#customerdeactive").modal('hide');
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
      jQuery('#editcustomer'+primaryid).click(function(e){
        $("#editCancel"+primaryid).prop("disabled", true);
        $("#editcustomer"+primaryid).prop("disabled", true);
        showLoading('loading'+primaryid,'loading-content'+primaryid);
        
        $formData.append('id',primaryid);
            if(document.getElementById('name'+primaryid).value){
              $formData.append('name',document.getElementById('name'+primaryid).value);
            }else{
              alert("Please enter name!");
              requiredAfterCreate();
              return;
            }
            if(document.getElementById('phoneNo'+primaryid).value){
              $formData.append('phoneNo',document.getElementById('phoneNo'+primaryid).value);
            }else{
              alert("Please enter phone number!");
              requiredAfterCreate();
              return;
            }
            if(document.getElementById('email'+primaryid).value){
              $formData.append('email',document.getElementById('email'+primaryid).value);
            }else{
              alert("Please enter email!");
              requiredAfterCreate();
              return;
            }
            if(document.getElementById('address'+primaryid).value){
              $formData.append('address',document.getElementById('address'+primaryid).value);
            }else{
              alert("Please enter address!");
              requiredAfterCreate();
              return;
            }
            if(document.getElementById('nrc'+primaryid).value){
              $formData.append('nrc',document.getElementById('nrc'+primaryid).value);
            }else{
              alert("Please enter nrc!");
              requiredAfterCreate();
              return;
            }


        e.preventDefault();
        $.ajax({
          url: "/customer/update",
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
              $("#customereditModal").modal('hide');
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
    $("#saveItem").prop("disabled", false);
  }
    
</script>


