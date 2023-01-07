<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


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
  </style>

</head>
<body>
<div class="container-fluid">
    <div class="card mt-3 mb-3">
        <div class="card-header bg-info">
            <h3 class="my-1 text-center text-bold text-white">Add New Monitoring</h3>
        </div>
        <form action="{{ route('update', $monitorings) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">PROJECT NAME</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid

                            @enderror" value="{{ old('title', $monitorings->title) }}"  placeholder="PROJECT NAME">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="client">CLIENT</label>
                            <input type="text" name="client" id="client" class="form-control @error('client') is-invalid

                            @enderror" value="{{ old('client', $monitorings->client) }}" placeholder="CLIENT">
                            @error('client')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">NAME LEADER</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid

                            @enderror" value="{{ old('name', $monitorings->name) }}" placeholder="NAME LEADER">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">EMAIL LEADER</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid

                            @enderror" value="{{ old('email', $monitorings->email) }}" placeholder="EMAIL LEADER">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="start_date">START DATE</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid

                            @enderror" value="{{ old('start_date', $monitorings->start_date) }}">
                            @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="end_date">END DATE</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid

                            @enderror" value="{{ old('end_date', $monitorings->end_date) }}" >
                            @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <label for="image" class="form-label">Uploda Image</label>
                        <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="progress" class="form-label">PROGRESS</label>

                            <input type="text" name="progress" id="progress" value="{{ $monitorings->progress }}%" class="form-control @error('progress') is-invalid

                            @enderror"  >

                            @error('progress')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <label for="image"  class="form-label">Post Image</label>

                        <input type="hidden" name="oldImage" value="{{ $monitorings->image }}">

                        @if ($monitorings->image)
                            <img src="{{ asset('storage/' . $monitorings->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-warning     ml-3">Update Data</button>
        </div>
        </form>
    </div>
</div>

</body>
</html>

 <!-- Script untuk image -->

 <script>
    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }

  }
 </script>

