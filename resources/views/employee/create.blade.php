<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h3>Create Employee</h3>
        <form id="emp_form">
            <div class="form-group mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Select Division</label>
                <select name="division" id="division" class="form-control">
                    <option value="">Select Division</option>
                    @foreach ($divisions as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">Select District</label>
                <select name="district" id="district" class="form-control">
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#division").change(function(){
            var divisionId = $(this).val();
            $("#district").empty();
            var str = '<option value="">Select District</option>';
            $.ajax({
                url:'http://127.0.0.1:8000/api/districts/'+divisionId,
                dataType: "json",
                type: 'GET',
                success: function(res){
                    // console.log(res.districts)
                    var districts = res.districts;
                    // console.log(districts.length);
                    var len = districts.length;
                    
                    for(var i=0; i<len; i++){
                        // console.log(districts[i].name)
                        str += '<option value=" '+districts[i].id+' ">'+districts[i].name+'</option>';
                        // console.log(str);
                    }
                    $("#district").html(str);
                }
            });
            // console.log(divisionId);
          });
          $("#emp_form").submit(function(e){
            e.preventDefault();
            // alert("Submitted")
            // alert($("#name").val())
            var name = $("#name").val();
            var division = $("#division").val();
            var district = $("#district").val();
            // alert(district)
            $.ajax({
                url: 'http://127.0.0.1:8000/api/emp-store',
                dataType: 'json',
                type: 'post',
                data: {
                    emp_name: name,
                    emp_division: division,
                    emp_district: district
                },
                success: function(res){
                    console.log(res);
                    $('#emp_form')[0].reset();
                }
            });
          });
        })
    </script>
</body>

</html>


