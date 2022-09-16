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
      <h2>Students List</h2>

    </div>
    <div class="col-md-6">
      <div class="float-right">
        <a href="{{route('students.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add a new Student</a>
      </div>
    </div>
<br>
<div class="col-md-12">
  @if (session('success'))
  <div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
  @endif
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th width="5%">S.NO</th>
        <th>Student's Name</th>
        <th width="10%">Class</th>
        <th width="18%">Roll No</th>
        <th>Father's Name</th>
      </tr>
    </thead>
    <tbody>
      @php
      $sno=1
      @endphp
      @forelse ($students as $student)
      <tr>
        <th>{{$sno}}</th>
        <td>{{$student->name}}</td>
        <td>{{$student->class}}</td>
        <td>{{$student->roll_no}}</td>
        <td>{{$student->father_name}}</td>
        <td>
          <div class="action_btn">
            <div class="action_btn">
              <a href="{{route('students.edit',$student)}}" class="btn btn-warning">Edit</a>
            </div>
            <div class="action_btn margin-left-10">
              <form class="" action="{{route('students.destroy',$student->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
                @php
 $sno+=1
 @endphp
              </form>

            </div>

          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5"><center>No data found </center></td>
      </tr>
      @endforelse
    </tbody>

  </table>

</div>


  </div>

</div>
@endsection
