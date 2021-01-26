@extends('user.partial.index')
@section('contents')

<div class="box box-primary col-md-10">
  <div class="box-header with-border">
    <h3 class="box-title">Pendaftaran Pelatih</h3>
    <a href="{{route('pelatih.index')}}" class="btn btn-sm btn-info pull-right"> <span class="fa fa-table"> List Data Pelatih </span> </a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form role="form" enctype="multipart/form-data" action='{{route('pelatih.store')}}' method='post'>
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-6">

          <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label class="control-label" for=""> Nama </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" value="{{old('nama')}}" name='nama' id='nama' class="form-control" placeholder="Nama">
            </div>
            <span class="help-block">{{ $errors->first('nama') }}</span>
          </div>

          <div class="form-group {{ $errors->has('kelamin') ? 'has-error' : '' }}">
            <label class="control-label" for="">Gender</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                <select class="form-control select2 select2-hidden-accessible" id='kelamin' name='kelamin' style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value=''>Gender</option>
                  @foreach (['L'=>'Laki Laki','P'=>'Perempuan'] as $kdGender => $gender)
                    <option value="{{$kdGender}}" {{$kdGender==old('kelamin')?'selected':''}} >{{$gender}}</option>
                  @endforeach
                </select>
            </div>
            <span class="help-block">{{ $errors->first('kelamin') }}</span>
          </div>

          <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
            <label class="control-label" for=""> Hp </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i> +628 </span>
                <input type="text" value="{{old('telp')}}" name='telp' id='telp' class="form-control" maxlength='11' placeholder="Hp">
            </div>
            <span class="help-block">{{ $errors->first('telp') }}</span>
          </div>

          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label" for=""> Email </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                <input type="email" value="{{old('email')}}" name='email' id='email' class="form-control" placeholder="Email">
            </div>
            <span class="help-block">{{ $errors->first('email') }}</span>
          </div>


        </div>
        <div class="col-md-6">

          <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
            <label class="control-label" for=""> ALamat Sekarang </label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                <textarea name="alamat" id='alamat' class="form-control" placeholder="Alamat" rows="8" cols="80">{{old('alamat')}}</textarea>
            </div>
            <span class="help-block">{{ $errors->first('alamat') }}</span>
          </div>

        </div>
      </div>

        <div class="form-group {{ $errors->has('validasi') ? 'has-error' : '' }}">
        <label class="control-label" for=""> Validasi Data </label> <br/>
        <div>
          <input type="checkbox" {{old('validasi')=='valid' ? 'checked' : ''}} name="validasi" value='valid' class="minimal" style="position: relative; opacity: 0;"> &nbsp;
          <span> Saya menyatakan bahwa data yang saya isikan benar sebenar data yang ada, jika terdapat kesalah pemasukan data itu merupakan tanggung jawab saya serta saya akan bertanggung jawab atas semua data yang saya isi  </span>
        </div>
        <span class="help-block">{{ $errors->has('validasi') ? 'Centrang Pernyataan Diatas Jika Anada Setuju' : '' }}</span>
        </div>

        <div class="form-group">
          <div class="btn btn-sm btn-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>

    </form>
  </div>
</div>
@endsection
@section('script')
  <script type="text/javascript">

  </script>
@endsection
