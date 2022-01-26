<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadSubmission{{$activity->id}}Modal">
    Upload Submission
  </button>

  <!-- Modal -->
  <div class="modal fade" id="uploadSubmission{{$activity->id}}Modal" tabindex="-1" aria-labelledby="uploadSubmission{{$activity->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadSubmission{{$activity->id}}ModalLabel">Upload Submission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/public/upload-activity/' . $activity->id,'method'=>'post','files'=>'true']) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label("lname", "Last Name") !!}
                {!! Form::text("lname", null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label("fname", "First Name") !!}
                {!! Form::text("fname", null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::file("file") !!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Upload</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
