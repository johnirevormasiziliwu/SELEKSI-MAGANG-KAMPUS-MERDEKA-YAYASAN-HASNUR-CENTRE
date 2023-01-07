<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Monitoring</title>

    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- js Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        body {
            font-family: sans-serif;
        }

        .atribut {
           margin-left: 60px;
           margin-top: -50px
        }

        .name {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.7);
        }
        .email {
            font-family: sans-serif;
            font-size: 12px;
            color: gray
        }
        td {
            font-family: sans-serif;
            color: gray


        }

        .judul {
            font-family: sans-serif;
            color: rgba(0, 0, 0, 0.7);
            background-color: #eeeeee;

        }

        h3 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 20px;
            margin-top: -40px;
            margin-bottom: 20px;

        }

    </style>
</head>
<body>

{{-- star navbar --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Project Monitoring</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav" style="margin-left:800px;">
      @auth

      <li class="nav-item dropdown  " >
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user mr-2"></i> Welcome, {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Welcome, {{ auth()->user()->name }}
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>

      @endauth
  </ul>
    </div>
</div>
  </nav>
{{-- end navbar --}}

{{-- start content --}}
<div class="jumbotron">
        <h3>Project Monitoring</h3>
          <div class="row">
            <div class="col-6">
              <form action="/monitoring">
                    @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search.." name="search" aria-describedby="basic-addon2" value="{{ request('search') }}">
                  <div class="input-group-append">
                    <button class="btn btn-outline-info" type="sumbit">Search</button>
                  </div>
                </div>

              </form>
            </div>
            <div class="col-6 justify-content-end">

                    @if (session()->has('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    @endif

                    @if (session()->has('update_success'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('update_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    @endif

                    @if (session()->has('delete_success'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    @endif

            </div>
          </div>

            <section class="conten bg-white rounded-lg ">
               <div class="card-body">
                <a href="{{ route('create') }}" class="btn btn-outline-info mb-3 float-right">Add New Monitoring</a>
                <table class="table table-borderless">
                    <thead class="judul">
                        <tr>
                            <th>PROJECT NAME</th>
                            <th>CLIENT</th>
                            <th>PROJECT LEADER</th>
                            <th>START DATE</th>
                            <th>END DATE</th>
                            <th>PROGRESS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="body">
                        @foreach ($monitorings as $monitoring)
                        <tr>
                            <td>{{ $monitoring->title }}</td>
                            <td>{{ $monitoring->client }}</td>
                            <td class="leader">

                                <img src="{{ url('storage/' . $monitoring->image) }}" width="50px" class="rounded-circle " alt="">

                                       <div class="atribut">
                                       <div class="name">
                                        {{ $monitoring->name }}
                                        </div>

                                        <div class="email">
                                            {{ $monitoring->email }}
                                        </div>

                                       </div>

                                </td>
                            <td>{{ $monitoring->start_date }}</td>
                            <td>{{ $monitoring->end_date }}</td>
                            <td>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width:{{ $monitoring->progress }}%" aria-valuenow="{{ $monitoring->progress }}" aria-valuemin="0" aria-valuemax="100">

                                        {{ $monitoring->progress }}%
                                    </div>

                                </div>

                            </td>
                            <td class="mr-3">
                                <a href="{{ route('edit', $monitoring) }}" class="btn btn-warning btn-sm ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#delete{{ $monitoring->id }}">
                                    <i class="fa fa-trash-alt"></i>
                                  </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
            </section>
        </div>
      </div>
    </body>
</html>




  <!-- Modal -->
  @foreach ($monitorings as $monitoring)

 <div class="modal fade" id="delete{{ $monitoring->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white">Are you sure delete data ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('delete', $monitoring) }}" method="POST">
            @csrf
            @method('delete')
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-danger">Yes, Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end Content --}}
  @endforeach

