
@extends('app.app')

@section('content')
<div class="main-content" style="background-color:#FFFFFF !important;width:100%;padding: 20px;box-shadow: 0 1px 20px 0 rgba(64, 64, 65, 0.15);border-radius:7px;margin:20px 0px;">
<div class="row" id="usersForm">
    <div class="col-12">
      <input name="userid" value="{{$userid}}" id="userid" hidden>

      <table class="table" id="userTabel">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
            <td id="{{ $list['id'] }}">{{ $list['id'] }}</td>
            <td>{{ $list['fullName'] }}</td>
            <td>{{ $list['userName'] }}</td>
            <td>{{ $list['phoneNo'] }}</td>
            <td>{{ $list['email'] }}</td>
            <td class="text-center" style="width:5%;padding: 8px 0px !important;">
              <button class="edit-btn btn-sm" data-toggle="modal" data-target="#usereditModal{{$list['id']}}">
                <a>Edit<a>
              </button>
              <div class="modal fade" id="usereditModal{{$list['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="exampleModalLabel">Edit User</span>
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
                                    name="fullName" value="{{$list['fullName']}}" id="fullName{{$list['id']}}" required>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label class="entry-label">User Level <span class="mt-10 required-i">*</span></label>
                                    <select class="menu-select form-control" style="width: 100%;" name="userRole" 
                                    id="userRole{{$list['id']}}">
                                      <option value="1" {{ $list['userRole'] == 'admin' ? 'selected' : ''}}>
                                      Admin
                                      </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                    <label class="entry-label">Email</label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="email" value="{{$list['email']}}" id="email{{$list['id']}}">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label class="entry-label">Phone Number</label>
                                    <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                    name="phoneNo" value="{{$list['phoneNo']}}" id="phoneNo{{$list['id']}}">
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn save-btn" id="editUser{{$list['id']}}">Save</button>
                            <button type="button" class="btn cancel-btn" id="editCancel{{$list['id']}}" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
              </div>
            </td>
            <td class="text-center" style="width:11%;padding: 8px 0px !important;">
              @if($list['isActive'] === true)
              <button class="deactivate-btn btn-sm">
                  <a data-toggle="modal" data-target="#useractive{{$list['id']}}">
                      Deactivate 
                  </a>
              </button>
              <div class="modal fade" id="useractive{{$list['id']}}">
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
                      <p>Are you sure you want to <span class="text-danger">deactive?</span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" id="deactive{{$list['id']}}">Deactivate</button>
                      <button type="button" class="btn btn-default" id="deactiveCancel{{$list['id']}}" data-dismiss="modal">Cancel</button> 
                    </div>
                  </div>
                </div>
              </div>
              @else
              <button class="activate-btn btn-sm">
                  <a data-toggle="modal" data-target="#useractive{{$list['id']}}">
                      Activate 
                  </a>
              </button>
              <div class="modal fade" id="useractive{{$list['id']}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Confirm</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-success alert-block" id="showactiveMsg{{$list['id']}}" style="width: 50%;display:none;">
                        <button type="button" class="close" data-dismiss="alert" style="color:#fff;">×</button> 
                        <span class="global-font-size" id="activeMsg{{$list['id']}}"></span>
                      </div>
                      <section id="loading-active{{$list['id']}}">
                        <div id="loading-content-active{{$list['id']}}"></div>
                      </section>
                      <progress id="progressBar{{$list['id']}}" value="0" max="100" style="width:300px;display:none;"></progress>
                      <p>Are you sure you want to <span class="text-danger">active?</span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" id="active{{$list['id']}}">Activate</button>
                      <button type="button" class="btn btn-default" id="activeCancel{{$list['id']}}" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="usercreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel">Create New User</span>
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
                            <label class="entry-label">Full Name <span class="mt-10 required-i">*</span></label>
                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="name" id="name" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="entry-label">Username <span class="mt-10 required-i">*</span></label>
                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="userName" hidden>
                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="userName" id="userName" autocomplete="off" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label class="entry-label">Password <span class="mt-10 required-i">*</span></label>
                            <input type="password" class="entry-input form-control" style="height: 40% !important;"
                            aria-describedby="inputGroup-sizing-default" name="password" hidden>
                            <input type="password" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="password" id="password" autocomplete="off" required>
                            <i class="fas fa-eye" style="float: right;
                              margin-right: 17px;
                              margin-top: -26px;
                              position: relative;
                              z-index: 2;" id="autoEye" onclick="showpw()"></i>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="entry-label">User Level <span class="mt-10 required-i">*</span></label>
                            <select class="menu-select form-control" style="width: 100%;" name="userRole" 
                            id="userRole">
                              <option value="1">Admin</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label class="entry-label">Phone Number</label>
                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="phoneNo" id="phoneNo">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label class="entry-label">Email</label>
                            <input type="text" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="email" id="email">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn save-btn" id="saveUser">Save</button>
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

    $('#userTabel').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "autoFill": false,
        "dom": '<"toolbar">frtip',
        language: {
            search: '<button class="btn" style="float:right;margin: 5px 10px 10px 10px;border-radius: 7px;background-color:#a4abb3;color: #FFFFFF;font-size: 12px;" data-toggle="modal" data-target="#usercreateModal"><i class="fas fa-pen"></i> Create New</button>', //To remove Search Label
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
            "bSortable": false
        },
        {
            "bSortable": false
        },
        {
            "bSortable": true

        }]
    });

    $("div.toolbar").html('<span><img style="width: 15%;padding: 5px;" class="nav-icon" style="width:11%;"><i class="fa fa-users" aria-hidden="true"></i>User</span>');

    $formData = new FormData();
    jQuery('#saveUser').click(function(e){
      $("#saveCancel").prop("disabled", true);
      $("#saveUser").prop("disabled", true);
      showLoading('loading','loading-content');

      if(document.getElementById('name').value){
        $formData.append('fullName',document.getElementById('name').value);
      }else{
        alert("Please enter full name!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('userName').value){
        $formData.append('userName',document.getElementById('userName').value);
      }else{
        alert("Please enter user name!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('password').value){
        $formData.append('password',document.getElementById('password').value);
      }else{
        alert("Please enter password!");
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
      if(document.getElementById('phoneNo').value){
        $formData.append('phoneNo',document.getElementById('phoneNo').value);
      }else{
        alert("Please enter phone number!");
        requiredAfterCreate();
        return;
      }
      $formData.append('userRole',document.getElementById('userRole').value);
      $formData.append('isActive',true);
      e.preventDefault();
      $.ajax({
          url: "/users/create",
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
              $("#usercreateModal").modal('hide');
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
    
    var table = $('#userTabel').DataTable();
    $('#userTabel tbody').on('click', 'tr', function () {
      primaryid = table.row(this).data()[0];

      //  Activate
      jQuery('#active'+primaryid).click(function(e){
        $("#activeCancel"+primaryid).prop("disabled", true);
        $("#active"+primaryid).prop("disabled", true);
        showLoading('loading-active'+primaryid,'loading-content-active'+primaryid);

        e.preventDefault();
        $.ajax({
          url: "/users/active",
          type:"POST",
          data:{
            id:primaryid
          },
          success:function(response){
            $("#activeMsg"+primaryid).text(response);
            $('#showactiveMsg'+primaryid).show();
            setTimeout(function() {
              hideLoading('loading-active'+primaryid,'loading-content-active'+primaryid);
              $("#useractive").modal('hide');
              location.reload();
            }, 1000);
          },
          error: function (response) {
            hideLoading('loading-active'+primaryid,'loading-content-active'+primaryid);
            $("#activeMsg"+primaryid).text(response);
            $('#showactiveMsg'+primaryid).show();
          }
        });
      });

      //  Deactivate
      jQuery('#deactive'+primaryid).click(function(e){
        $("#deactiveCancel"+primaryid).prop("disabled", true);
        $("#deactive"+primaryid).prop("disabled", true);
        showLoading('loading-deactive'+primaryid, 'loading-content-deactive'+primaryid);

        e.preventDefault();
        $.ajax({
          url: "/users/deactive",
          type:"POST",
          data:{
            id:primaryid
          },
          success:function(response){
            hideLoading('loading-deactive'+primaryid,'loading-content-deactive'+primaryid);
            $("#deactiveMsg"+primaryid).text(response);
            $('#showdeactiveMsg'+primaryid).show();
            setTimeout(function() {
              $("#userdeactive").modal('hide');
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
      jQuery('#editUser'+primaryid).click(function(e){
        $("#editCancel"+primaryid).prop("disabled", true);
        $("#editUser"+primaryid).prop("disabled", true);
        showLoading('loading'+primaryid,'loading-content'+primaryid);
        
        if(document.getElementById('fullName'+primaryid).value){
          $formData.append('fullName',document.getElementById('fullName'+primaryid).value);
        }else{
          alert("Please enter full name!");
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
        if(document.getElementById('phoneNo'+primaryid).value){
          $formData.append('phoneNo',document.getElementById('phoneNo'+primaryid).value);
        }else{
          alert("Please enter phone number!");
          requiredAfterCreate();
          return;
        }

        $formData.append('userRole',document.getElementById('userRole'+primaryid).value);
        $formData.append('id',primaryid);


        e.preventDefault();
        $.ajax({
          url: "/users/update/",
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
              $("#usereditModal").modal('hide');
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


