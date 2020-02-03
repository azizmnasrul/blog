<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar CRUD Laravel 5.8</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2 style="text-align:center">Tambah Pengguna</h2><br/>
      @if (session('status'))
      <div class="alert alert-info">
        <p>{{ session('status') }}</p>
      </div>
      @endif
      {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
      
      <form method="post" action="{{url('users')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Nama Lengkap:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
          </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="BornCity">Kota Kelahiran:</label>
              <input type="text" class="form-control" name="born_city" value="{{ old('born_city') }}">
            </div>
        </div>
          
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="BornDate">Tanggal Kelahiran</label>
            <input type="date" class="form-control" name="born_date" value="{{ old('born_date') }}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Gender">Gender</label><br>
            <input type="radio" name="gender" {{ (old('gender') == 'male') ? 'checked' : ''}} value="male">Male
            <input type="radio" name="gender" value="female" {{ (old('gender') == 'female') ? 'checked' : ''}}>Female
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Address">Alamat</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="PhoneNumber">Nomor Telepon</label>
            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>