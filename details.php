<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register's Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>

<body>
    <div class="container">
        <div style="float: right;">
            <button class="btn btn-dark" id="logoutt">Log Out</button>
        </div>
        <div class="mt-5">
            <table class="table table-hover" id="table" border="1">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" id="male" value="male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" id="female" value="female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img">Upload Image</label>
                            <input type="file" class="form-control-file" id="img" name="img" required>
                        </div>
                        <div class="form-group">
                            <label for="ageGroup">Select Age Group</label>
                            <select class="form-control" id="agegroup" name="agegroup" required>
                                <option value="" disabled selected>Select...</option>
                                <option value="children">Children</option>
                                <option value="adult">Adult</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="modalfooter">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updatee" form="userForm">Update</button>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<!-- Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: 'ajax1.php',
            type: 'get',
            dataType: 'json',
            data: {
                action: 'view',
            },
            success: function(res) {

                for (var i = 0; i < res.length; i++) {
                    var td = `<tr>`;
                    td += `<td>${res[i][0]}</td>`;
                    td += `<td>${res[i][1]}</td>`;
                    td += `<td>${res[i][2]}</td>`;
                    td += `<td><button data-id=${res[i][0]} class='btn btn-info btn-sm view mx-1' >View</button><button data-id=${res[i][0]} class='btn btn-warning btn-sm mx-1 update' >Update</button><button data-id=${res[i][0]} class='btn btn-danger btn-sm mx-1 deletee'  >Delete</button></td>`;
                    td += `</tr>`;
                    $('#tbody').append(td);
                }
                //    $('#table').DataTable()  
                let table = new DataTable('#table', {
                    responsive: true,
                    dom: 'Bfrtip', // Defines the position of the buttons
                    buttons: [
                        'copy', 'excel', 'print'
                    ]
                });
            },
            error: function(xhr, status) {

            }
        });
    });

    
    $('#logoutt').on('click', function() {
        $.ajax({
            url: 'ajax1.php',
            type: 'post',
            data: {
                action: 'sessionout'
            },
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                window.location.href = 'index.php';
            },
            error: function(xhr, status, error) {
                // Handle error here
                console.error('Logout failed:', error);
            }
        })
    });

    $(document).on('click', '.view', function() {
        var id = $(this).attr('data-id');
        $("#userForm")[0].reset();
        $('#modalfooter').css('display', 'none');
        $('#mymodal').modal('show');

        $.ajax({
            url: 'ajax1.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'viewid',
                id: id
            },
            success: function(res) {
                if (res) {
                    $('#name').val(res.name);
                    $('#id').val(res.id);
                    $('#email').val(res.email);
                    $('#password').val(res.password);

                    // Set gender radio buttons
                    if (res.gender) {
                        $('input[name="gender"][value="' + res.gender + '"]').prop('checked', true);
                    }

                    if (res.agegroup) {
                        $('#agegroup').val(res.agegroup);
                    }
                }
            },
            error: function(error, xhr, xhrFields) {

            }
        });

    });

    $(document).on('click', '.update', function() {
        var id = $(this).attr('data-id');
        $("#userForm")[0].reset();
        $('#modalfooter').css('display', 'block');
        $('#mymodal').modal('show');

        $.ajax({
            url: 'ajax1.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'viewid',
                id: id
            },
            success: function(res) {
                if (res) {
                    $('#name').val(res.name);
                    $('#id').val(res.id);
                    $('#email').val(res.email);
                    $('#password').val(res.password);

                    // Set gender radio buttons
                    if (res.gender) {
                        $('input[name="gender"][value="' + res.gender + '"]').prop('checked', true);
                    }

                    if (res.agegroup) {
                        $('#agegroup').val(res.agegroup);
                    }
                }
            },
            error: function(error, xhr, status) {
                console.log(error);
                
            }
        });


    });

    $(document).on('click','.deletee',function(){
        var id  = $(this).attr('data-id');
        if (confirm("Are you sure you want to delete this item "+id+" ?")) {
        $.ajax({
            url:'ajax1.php',
            type:'post',
            dataType:"json",
            data:{
                action:'delete',
                id:id
            },success:function(res){

                if (res.status === 'success') {
                    alert(res.msg);
                    location.reload();  
                } else if(res.status === 'error') {
                    alert(res.msg);
                }
            }
        });
    }

    });

    $(document).on('click', '#updatee', function() {
        var id = $(this).attr('data-id');
        var formData = new FormData($('#userForm')[0]);
        formData.append('action', 'update');


        var isValid = true;

        if ($('.gender:checked').length === 0) { // Check if no gender is selected
            isValid = false;
            alert('Please select a gender.');
        }

        // Check for a specific required select input (change '#ageGroup' to your specific select ID)
        if ($('#agegroup').val() === null || $('#agegroup').val() === '') {
            isValid = false;
            alert('Please select an age group.');
        }

        // If validation fails, exit the function
        if (!isValid) {
            return;
        }
        if(confirm('are you want update the recorde')){
        $.ajax({
            url: 'ajax1.php',
            type: 'post',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                // response = JSON.parse(res);
                if (res.status === 'success') {
                    $("#userForm")[0].reset();
                    $('#mymodal').modal('hide');
                    alert(res.msg);

                } else if (res.status === 'error') {
                    alert(res.msg);
                }
            },
            error: function(error, xhrFields, xhr) {
                console.log(error);

            }
        })
    }

    });
</script>

</html>