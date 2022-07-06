@extends('admin.app')
@section('content')
<h3>Create Info</h3>
<hr>
<div class="col-lg-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('admin/info/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="judul_info">Judul Info</label>
        <input type="text" name="judul_info" class="form-control">
        <label for="isi_info">Isi Info</label>
        <textarea id="isi_info" class="form-control" name="isi_info" rows="10" cols="50"></textarea>
        <label for="status">Status</label>
        <select class="form-control" name="status" id="status">
            <option value="1">Publish</option>
            <option value="0">Tidak Publish</option>
        </select>
        <br>
        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
        <a href="{{ url('admin/info') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    </form>
</div>


@endsection
@section('js')
<script src="{{url('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var content = document.getElementById("isi_info");
    CKEDITOR.replace(content, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection