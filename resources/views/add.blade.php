<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  @extends('layouts.app')

  @section('content')
  <div class="container">
    <br>
      <div class="row justify-content-center">
          <div class="col-md-6">
              <h2>Add Students Details</h2>
          </div>
          <div class="col-md-6">
              <div class="float-right">
                  <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
              </div>
          </div>
          <br>
          <div class="col-md-12">
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-error" role="alert">
                      {{ session('error') }}
                  </div>
              @endif
        <form action="{{ route('students.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Student's Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="class">Class</label>
            <input name="class" class="form-control" id="class" rows="5"></input>
          </div>
          <div class="form-group">
            <label for="roll_no">Roll No</label>
            <input name="roll_no" class="form-control" id="roll_no" rows="5"></input>
          </div>
          <div class="form-group">
            <label for="father">Father's Name</label>
            <input name="father" class="form-control" id="father" rows="5"></input>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
          </div>
      </div>
  </div>
  @endsection
