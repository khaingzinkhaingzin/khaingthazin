@extends("layouts.master")

@section("content")
   <div class="box mt-5 container">
        <div class="box-header with-border">
          <h3 class="text-center">All Students</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" 
            data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" 
            data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->


          <div class="row">
            <div class="form-group mr-3">
              <select name="grade" id="grade">
                <option value="">choose grade</option>
                  @foreach($grades as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group mr-5">
              <select name="class_name" id="class_name">
                <option value="">choose class</option>
                  @foreach($classes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
              </select>
            </div>

          </div>
        </div>
        <div class="box-body">

            <a href="{{ url('student/create') }}" class="btn btn-success btn-sm">
              create a new student</a>

            <a href="{{ '/student' }}" class="btn btn-success btn-sm">show all students</a>

            <hr>

            <table class="table table-bordered" id="student-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Grade</th>
                  <th>Class</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
            </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
@stop
@push('scripts')
<script>
$(function() {
    $('#student-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('student.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'father_name', name: 'father_name' },
            { data: 'address', name: 'address' },
            { data: 'phone_no', name: 'phone_no' },
            { data: 'grade', name: 'grade' },
            { data: 'class', name: 'class' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
        ]
    });
});
</script>

<script>
  
  $(document).ready(function() {
    $("#grade").on('change', function() {
      var grade = $(this).val();
      if(grade) {
        $.ajax({
          url: '/grades/' + grade,
          type: "GET",
          dataType: "json",
          success: function(result) {
            $("#student-table").empty();
            $("#student-table").append("<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone No.</th></tr>");
            $.each(result, function(key, value) {
              $("#student-table").append("<tr><td>" + value.name + "</td><td>" + value.father_name +"</td><td>" + value.address + "</td><td>" + value.phone_no + "</td></tr>");

            });
          },       
        });
      }
    });
  });

</script>

<script>
  
  $(document).ready(function() {
    $("#class_name").on('change', function() {
      var class_id = $(this).val();
      if(class_id) {
        $.ajax({
          url: '/classes/' + class_id,
          type: "GET",
          dataType: "json",
          success: function(result) {
            // console.log(result);
            $("#student-table").empty();
              $("#student-table").append("<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone No.</th></tr>");
            $.each(result, function(key, value) {
              $("#student-table").append("<tr><td>" + value.name + "</td><td>" + value.father_name +"</td><td>" + value.address + "</td><td>" + value.phone_no + "</td></tr>");
            });
          },       
        });
      }
    });
  });

</script>
@endpush