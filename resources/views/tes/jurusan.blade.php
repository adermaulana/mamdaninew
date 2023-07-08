<h1 class="mt-3">Tertarik Dengan Jurusan Apa?</h1>
<hr>
@error('jurusan_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror 
@foreach($jurusan as $data)
<div  class="form-check mt-3 mb-3">
    <input class="form-check-input jurusan-checkbox" name="jurusan_id[]" type="checkbox" value="{{ $data->id }}" id="flexCheckChecked">
    <h6 class="form-check-label" for="flexCheckChecked">
    {{ $data->name }}
    </h6>  
</div>
@endforeach 
<hr>