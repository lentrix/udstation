<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addActivityModal">
    Add Activity
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addActivityModalLabel">Add Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/activities', 'method'=>'post']) !!}
        <div class="modal-body">
            {!! Form::hidden("module_id", $module->id) !!}
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
          <button type="submit" class="btn btn-primary">Save Activity</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
