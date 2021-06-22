

<div class="card mb-3">
    <img src="{{asset('images/edu.png')}}" class="card-img-top" alt="..."  style=" height:200px">
    <div class="card-body">
      <h5 class="card-title">List of Students</h5>

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">CNE</th>
            <th scope="col">First name</th>
            <th scope="col">Second name</th>
            <th scope="col">Age</th>
            <th scope="col">Categorie</th>
            <th scope="col">Speciality</th>
            <th scope="col">Operations</th>

          </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
          <tr>
            
          <td>{{$student->cne}}</td>
            <td>{{$student->firstName}}</td>
            <td>{{$student->secondName}}</td>
            <td>{{$student->age}}</td>
            <td>
                                    @foreach($student->category as $value)
                                        {{$value}},
                                    @endforeach
                                </td>
            <td>{{$student->speciality}}</td>
            <td>
            <a href="{{url('/edit/'.$student->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
           <td> <form action= "{{ url('/delete/' .$student->id)}}" method = "post" >
                @csrf
                @method('DELETE')
                   <input type = 'submit' class = "btn btn-danger btn-sm" value= "Delete">

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>




