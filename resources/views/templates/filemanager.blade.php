<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Media</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/filemanager.css') }}">
</head>
<body>

    <div class="container-top">
        <div class="inner">
            <div class="left">
                <form action="{{ route('filemanager.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="input-file">
                    <button type="button" class="input-file-btn">Choose File...</button>
                    <span id="file-name">No File Choosen</span>
                    <button type="submit" class="upload-btn">Upload</button>
                </form>
                <small>Max Size: 5MB</small>
            </div>
            <div class="right">
                <form action="">
                    <label for="query">Search</label>
                    <input type="text" name="query" id="search" required>
                </form>
            </div>
        </div>
        <div class="outter">
            <div class="action-btn-div">
                <button class="btn" id="add-btn">Add Selected</button>
                <button class="btn" id="select-btn">Select All</button>
                <button class="btn" id="delete-btn">Delete</button>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    <div class="images-container">
        <div class="inner">
            <form action="{{ route('filemanager.delete') }}" id="delete-form" method="POST">
                @csrf
                @php $i = 0; @endphp
            @foreach($images as $image)
                <div>
                    <input type="checkbox" id="img_{{ $i }}" name="img[]" value="{{ $image['name'] }}">
                    <img src="{{ $image['url'] }}" id="img_{{ $i }}" class="file-img">
                </div>
                @php $i++ @endphp
            @endforeach
            </form>
        </div>
    </div>

    <div class="pagination pb-3">
        <div class="inner text-center">
            {{$images->links()}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/filemanager.js') }}"></script>
</body>
</html>
