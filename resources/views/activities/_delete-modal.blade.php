<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteActivityModal{{$activity->id}}">
    Delete
  </button>

  <!-- Modal -->
  <div class="modal fade" id="deleteActivityModal{{$activity->id}}" tabindex="-1" aria-labelledby="deleteActivityModal{{$activity->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteActivityModal{{$activity->id}}Label">Delete Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>"/activities/$activity->id",'method'=>'delete']) !!}
        <div class="modal-body">
            Please confirm deletion of activity titled: "{{$activity->title}}".
            All file submissions associated with this activity will also be deleted.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Activity</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
