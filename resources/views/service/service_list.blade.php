
@extends('app.app')

@section('content')
<div class="main-content" style="background-color:#FFFFFF !important;width:100%;padding: 20px;box-shadow: 0 1px 20px 0 rgba(64, 64, 65, 0.15);border-radius:7px;margin:20px 0px;">
<div class="row" id="serviceForm">
    <div class="col-12">
      
      <table class="table" id="serviceTabel">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Fee</th>
            <th class="text-center" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
            <td id="{{ $list['id'] }}">{{ $list['id'] }}</td>
            <td>{{ $list['name'] }}</td>
            <td>{{ $list['fee'] }}</td>
            <td class="text-center" style="width:5%;padding: 8px 0px !important;">
              <button class="edit-btn btn-sm" data-toggle="modal" data-target="#serviceeditModal{{$list['id']}}">
                <a>Edit<a>
              </button>
              <div class="modal fade" id="serviceeditModal{{$list['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title" id="exampleModalLabel">Edit service</span>
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
                                            <label class="entry-label">Fee <span class="mt-10 required-i">*</span></label>
                                            <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                                            name="fee" value="{{$list['fee']}}" id="fee{{$list['id']}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn save-btn" id="editservice{{$list['id']}}">Save</button>
                            <button type="button" class="btn cancel-btn" id="editCancel{{$list['id']}}" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
              </div>
            </td>
            <td class="text-center" style="width:11%;padding: 8px 0px !important;">
              <button class="deactivate-btn btn-sm">
                  <a data-toggle="modal" data-target="#serviceactive{{$list['id']}}">
                      Delete 
                  </a>
              </button>
              <div class="modal fade" id="serviceactive{{$list['id']}}">
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
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="servicecreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel">Create New service</span>
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
                            <label class="entry-label">Fee <span class="mt-10 required-i">*</span></label>
                            <input type="number" class="entry-input form-control" aria-describedby="inputGroup-sizing-default"
                            name="fee" id="fee" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn save-btn" id="saveservice">Save</button>
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
    $('#serviceTabel').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "autoFill": false,
        "dom": '<"toolbar">frtip',
        language: {
            search: '<button class="btn" style="float:right;margin: 5px 10px 10px 10px;border-radius: 7px;background-color:#a4abb3;color: #FFFFFF;font-size: 12px;" data-toggle="modal" data-target="#servicecreateModal"><i class="fas fa-pen"></i> Create New</button>', //To remove Search Label
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
            "bSortable": false
        },
        {
            "bSortable": false

        }]
    });

    $("div.toolbar").html('<span><img style="width: 15%;padding: 5px;" src="{{ asset("dist/img/web icons/Side Menu Bar Icons/Hover/Group 338@2x.png") }}" class="nav-icon" style="width:11%;">service</span>');

    var file;

    jQuery('#saveservice').click(function(e){
      $("#saveCancel").prop("disabled", true);
      $("#saveservice").prop("disabled", true);
      showLoading('loading','loading-content');

      if(document.getElementById('name').value){
        $formData.append('name',document.getElementById('name').value);
      }else{
        alert("Please enter name!");
        requiredAfterCreate();
        return;
      }
      if(document.getElementById('fee').value){
        $formData.append('fee',document.getElementById('fee').value);
      }else{
        alert("Please enter fee!");
        requiredAfterCreate();
        return;
      }
      
      e.preventDefault();
      $.ajax({
          url: "/service/create",
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
              $("#servicecreateModal").modal('hide');
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
    
    var table = $('#serviceTabel').DataTable();
    $('#serviceTabel tbody').on('click', 'tr', function () {
      primaryid = table.row(this).data()[0];

      //  Deactivate
      jQuery('#deactive'+primaryid).click(function(e){
        $("#deactiveCancel"+primaryid).prop("disabled", true);
        $("#deactive"+primaryid).prop("disabled", true);
        showLoading('loading-deactive'+primaryid, 'loading-content-deactive'+primaryid);

        e.preventDefault();
        $.ajax({
          url: "/service/deactive",
          type:"POST",
          data:{
            id:primaryid
          },
          success:function(response){
            hideLoading('loading-deactive'+primaryid,'loading-content-deactive'+primaryid);
            $("#deactiveMsg"+primaryid).text(response);
            $('#showdeactiveMsg'+primaryid).show();
            setTimeout(function() {
              $("#servicedeactive").modal('hide');
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
      jQuery('#editservice'+primaryid).click(function(e){
        $("#editCancel"+primaryid).prop("disabled", true);
        $("#editservice"+primaryid).prop("disabled", true);
        showLoading('loading'+primaryid,'loading-content'+primaryid);
        $formData.append('id',primaryid);
        if(document.getElementById('name'+primaryid).value){
          $formData.append('name',document.getElementById('name'+primaryid).value);
        }else{
          alert("Please enter name!");
          requiredAfterCreate();
          return;
        }
        if(document.getElementById('fee'+primaryid).value){
          $formData.append('fee',document.getElementById('fee'+primaryid).value);
        }

        e.preventDefault();
        $.ajax({
          url: "/service/update",
          type:"POST",
          data:$formData,
          processData: false,
          contentType: false,
          processData: false,
          success:function(response){
            // hideLoading('loading'+primaryid,'loading-content'+primaryid);
            // $("#editMsg"+primaryid).text(response);
            // $('#showeditMsg'+primaryid).show();
            // setTimeout(function() {
            //   $("#serviceeditModal").modal('hide');
            //   location.reload();
            // }, 1000);
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


