<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editActivity{{$activity->id}}Modal">
    Edit
  </button>

  <!-- Modal -->
  <div class="modal fade" id="editActivity{{$activity->id}}Modal" tabindex="-1" aria-labelledby="editActivity{{$activity->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editActivity{{$activity->id}}ModalLabel">Edit Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {!! Form::model($activity, ['url'=>"/activities/$activity->id", 'method'=>'put']) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label("title", "Title") !!}
                {!! Form::text("title", null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label("description", "Description") !!}
                {!! Form::textarea("description", null, ['class'=>'form-control','rows'=>2]) !!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
