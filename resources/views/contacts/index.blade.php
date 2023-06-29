@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Inside a Blade view -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <h2>Contact List</h2>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Create Contact</a>
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search by name or email">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="btnSearch">Search</button>
                </div>
            </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="editform" method="POST">
        <div class="modal-body">
                @csrf
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="edit_name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="edit_email" name="email"required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="edit_phone" name="phone" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="submit" onclick="btnSubmit()" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function dataAll(){
            $.get('api/getcontact', function(response) {
                $('#tbody').empty()
                $.each(response,function(index, element) {
                    var html = '<tr>'
                    +'<td>'+ response[index].name +'</td>'
                    +'<td>'+ response[index].email +'</td>'
                    +'<td>'+ response[index].phone +'</td>'
                    +'<td>'
                    // + '<a href="contact/edit'+ response[index].id +'" class="btn btn-primary btn-sm">Edit</a>'
                    + '<a onclick="dataEdit('+ response[index].id +')" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm mr-3">Edit</a>'
                    + '<a onclick="SwalDelete('+ response[index].id +')" class="btn btn-danger btn-sm mr-3">Delete</a>'
                    +'</td>'
                    +'<tr>'
                    $('#tbody').append(html)
                });
            }, 'json');
        }
        function dataEdit(id){
            $.get('api/getcontactbyid/'+id, function(response) {
                $('#edit_id').val(response.id)
                $('#edit_name').val(response.name)
                $('#edit_email').val(response.email)
                $('#edit_phone').val(response.phone)
                // $('#editform').attr('action','contacts/update/' + response.id)
            }, 'json');
        }

        function dataDelete(id){
            $.get('contacts/destroy/' +id, function(response) {
                swal("Success", response.message, "success").then((value) => {
                    window.location = window.location
                });
            }, 'json');
        }

        function SwalDelete(id) {
            swal({
                title: "Are you sure?",
                text: "Once data deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    dataDelete(id);
                } else {
                    swal("Your data is safe!", {
                        icon: "info",
                    });
                }
            });
        }
    
        function btnSubmit(){
            $.post('contacts/update/' + $('#edit_id').val(), 
            {
                _token: $('input[name="_token"]').val(),
                name: $('#edit_name').val(),
                email: $('#edit_email').val(),
                phone: $('#edit_phone').val()
            }, function(response) {
                // console.log(response);
                swal("Success", response.message, "success").then((value) => {
                    window.location = window.location
                });
            }, 'json');
        }
        function dataSearch(){
            var string = $('#search').val()
            if (string.length > 0) {    
                $.get('contacts/search/'+string, function(response) {
                    $('#tbody').empty()
                    $.each(response,function(index, element) {
                        var html = '<tr>'
                        +'<td>'+ response[index].name +'</td>'
                        +'<td>'+ response[index].email +'</td>'
                        +'<td>'+ response[index].phone +'</td>'
                        +'<td>'
                        // + '<a href="contact/edit'+ response[index].id +'" class="btn btn-primary btn-sm">Edit</a>'
                        + '<a onclick="dataEdit('+ response[index].id +')" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm mr-3">Edit</a>'
                        + '<a onclick="SwalDelete('+ response[index].id +')" class="btn btn-danger btn-sm mr-3">Delete</a>'
                        +'</td>'
                        +'<tr>'
                        $('#tbody').append(html)
                    });
                }, 'json');
            }else{
                dataAll()
            }
        }
        $(document).ready(function() {
            dataAll()
            $('#btnSearch').click(function() {
                dataSearch()
            });
        });

    </script>
@endsection
