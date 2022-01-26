<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadSubmissionModal">
    Upload a Submission
  </button>

  <!-- Modal -->
  <div class="modal fade" id="uploadSubmissionModal" tabindex="-1" aria-labelledby="uploadSubmissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadSubmissionModalLabel">Upload a Submission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>"/public/activities/$activity->id/upload", 'method'=>'post','files'=>'true']) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label("lname", "Last Name") !!}
                {!! Form::text("lname", null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label("fname", "First Name") !!}
                {!! Form::text("fname", null, ['class'=>'form-control']) !!}
            </div>
            <hr>
            {!! Form::file("file") !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
